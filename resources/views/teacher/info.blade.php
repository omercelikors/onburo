@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Öğretmen Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('teacher_register_show') }}"><span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="teacher-table" class="teacher-table table table-striped">
                        <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>E-posta</th>
                                <th>Telefon</th>
                                <th>Doğum Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                            <tr>
                                <td class="align-middle">{{ $teacher->name }}</td>
                                <td class="align-middle">{{ $teacher->surname }}</td>
                                <td class="align-middle">{{ $teacher->e_mail }}</td>
                                <td class="align-middle">{{ $teacher->telephone }}</td>
                                <td class="align-middle">{{ $teacher->birthdate() }}</td>
                                <form action="{{ route('teacher_edit_show', ['teacher_id' => $teacher->id]) }}" method="GET">
                                    <td class="align-middle"><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
                                            onclick="teacher_delete({{ $teacher->id }})" class="btn btn-danger">Sil</button></td>
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
            results_per_page: ['Records: ', [10, 25, 50, 100]]
        },
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        status_bar: false,
        col_widths: [
            '200px', '200px', '250px',
            '150px', '100px', '200px'
        ],
        col_types: [
            'string', 'string', 'string',
            'number', { type: 'date', format: ['{dd}.{mm}.{yyyy}'] }, 'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.teacher-table'), filtersConfig);
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
    function teacher_delete(teacher_id) {
        swal({
                title: "Emin misiniz?",
                text: "Öğretmen silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/teacher-delete', {
                            params: {
                                id: teacher_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Öğretmen silindi!",
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
                                text: "Öğretmen bir hatadan dolayı silinemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Öğretmen silinmedi!",
                        button: "Tamam",
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
@section('title', "Öğretmen Bilgi")