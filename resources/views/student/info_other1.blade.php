@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Öğrenci Bilgileri Ekstra-1</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('student_register_show') }}"><span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="student-table" class="student-table table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Sıra</th>
                                <th class="align-middle">Adı</th>
                                <th class="align-middle">Soyadı</th>
                                <th class="align-middle">Aldığı Kurslar</th>
                                <th class="align-middle">Acente Adı</th>
                                <th class="align-middle">Ülke</th>
                                <th class="align-middle">Üniversite Durumu</th>
                                <th class="align-middle">Üniversite Bölümü</th>
                                <th class="align-middle">Üniversite Seviyesi</th>
                                <th class="align-middle">Talep Edilen Eğitimler</th>
                                <th class="align-middle">Konuştuğu Diller</th>
                                <th class="align-middle">Not</th>
                                <th class="align-middle">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                            <th class="align-middle">Sıra</th>
                                <td class="align-middle">{{ $loop->index + 1 }}</td>
                                <td class="align-middle">{{ $student->name }}</td>
                                <td class="align-middle">{{ $student->surname }}</td>
                                <td class="align-middle">{{ $student->taken_courses }}</td>
                                <td class="align-middle">@isset($student->agency){{ $student->agency->name }}@endisset</td>
                                <td class="align-middle">{{ $student->country }}</td>
                                <td class="align-middle">{{ $student->university_status }}</td>
                                <td class="align-middle">{{ $student->university_department }}</td>
                                <td class="align-middle">{{ $student->education_level_status }}</td>
                                <td class="align-middle">{{ $student->demanded_education_status }}</td>
                                <td class="align-middle">{{ $student->languages }}</td>
                                <td class="align-middle">{{ $student->note }}</td>
                                <form action="{{ route('student_edit_show', ['student_id' => $student->id]) }}" method="GET">
                                    <td class="align-middle"><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
                                            onclick="student_delete({{ $student->id }})" class="btn btn-danger">Sil</button></td>
                                </form>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')

<script src="{{ asset('js/extensions/tablesort.js') }}"></script>
<script>
    var filtersConfig = {
        base_path: 'tablefilter/',
        state: {
            types: ['hash'],
            filters: true,
            page_number: true,
            page_length: true,
            sort: true
        },
        paging: {
            results_per_page: ['Records: ', [50, 100, 200]]
        },
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        status_bar: false,
        col_5: 'select',
        col_7: 'select',
        col_8: 'select',
        col_widths: [
            '50px', '150px', '150px', '90px',
            '90px', '90px', '90px',
            '100px', '100px', '100px',
            '100px', '160px', '160px'
        ],
        col_types: [
            'number', 'string', 'string', 'string',
            'string', 'string', 'string',
            'string', 'string', 'string',
            'string', 'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.student-table'), filtersConfig);
    tf.init();
    document.querySelector('.tot span:nth-child(1)').innerHTML = "Satır ";
    document.querySelector('.mdiv span:nth-child(3)').innerHTML = "Sayfa ";
    document.querySelector('.mdiv span:nth-child(5)').innerHTML = " /";
    document.querySelector('.rdiv span:nth-child(1)').innerHTML = "Göster";
    document.querySelector('.firstPage').style.cursor = "pointer";
    document.querySelector('.previousPage').style.cursor = "pointer";
    document.querySelector('.nextPage').style.cursor = "pointer";
    document.querySelector('.lastPage').style.cursor = "pointer";
    document.querySelector('.reset').style.cursor = "pointer";
    document.querySelector('.loader').innerHTML = "Yükleniyor...";
    document.querySelector('.fltrow td:last-child').style.display = "none";
    document.querySelector('.helpCont').innerHTML =
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a target='_blank' href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
    $(".flt option:nth-child(1)").text("Temizle");
</script>
<script>
    function student_delete(student_id) {
        swal({
                title: "Emin misiniz?",
                text: "Öğrenci silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/student-delete', {
                            params: {
                                id: student_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Öğrenci silindi!",
                                icon: "success",
                                timer: 2000,
                                buttons: false,
                            });
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        })
                        .catch(function (error) {
                            console.log(error);
                            swal({
                                text: "Öğrenci bir hatadan dolayı silinemedi!",
                                button: "Evet",
                            });
                        });
                } else {
                    swal({
                        text: "Öğrenci silinmedi!",
                        button: "Evet",
                    });

                }
            });
    }
</script>
<script>
    $( ".rdiv input" ).trigger( "click" );
</script>
@endsection
@section('css')
<link href="{{ asset('css/extensions/tablefilter.css') }}" rel="stylesheet">
<style>
        .helpFooter {
            display: none;
            visibility: hidden;
        }

        select {
            cursor: pointer;
        }
</style>
@endsection

@section('title', "Öğrenci Bilgi Ekstra-1")
