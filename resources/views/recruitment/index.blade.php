@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Temin Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('recruitment.create') }}"><span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="recruitment-table" class="recruitment-table table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Sıra</th>
                                <th class="align-middle">Adı</th>
                                <th class="align-middle">Soyadı</th>
                                <th class="align-middle">Telefon</th>
                                <th class="align-middle">E-posta</th>
                                <th class="align-middle">Note</th>
                                <th class="align-middle">Üniversite</th>
                                <th class="align-middle">Bölüm</th>
                                <th class="align-middle">Öğrenim Dili</th>
                                <th class="align-middle">Derece</th>
                                <th class="align-middle">Başvuru Durumu</th>
                                <th class="align-middle">Kayıt Yapan</th>
                                <th class="align-middle">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recruitments as $recruitment)
                            <tr>
                                <td class="align-middle">{{ $loop->index + 1 }}</td>
                                <td class="align-middle">{{ $recruitment->name }}</td>
                                <td class="align-middle">{{ $recruitment->surname }}</td>
                                <td class="align-middle">{{ $recruitment->telephone }}</td>
                                <td class="align-middle">{{ $recruitment->e_mail }}</td>
                                <td class="align-middle">{{ $recruitment->notes }}</td>
                                <td class="align-middle">{{ $recruitment->university }}</td>
                                <td class="align-middle">{{ $recruitment->branch }}</td>
                                <td class="align-middle">{{ $recruitment->learning_language }}</td>
                                <td class="align-middle">{{ $recruitment->degree }}</td>
                                <td class="align-middle">{{ $recruitment->application_status }}</td>
                                <td class="align-middle">{{ $recruitment->registration_by }}</td>
                                <form action="{{ route('recruitment.edit', ['recruitment' => $recruitment->id]) }}" method="GET">
                                    <td class="align-middle"><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
                                            onclick="recruitment_delete({{ $recruitment->id }})" class="btn btn-danger">Sil</button></td>
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
        col_5:'select',
        col_6:'select',
        col_7:'select',
        col_8:'select',
        col_9:'select',
        col_10:'select',
        col_11:'select',
        col_12:'select',
        col_widths: [
            '50px', '100px', '100px','150px', '200px', '200px', '200px'
            '200px','100px', '100px', '100px','120px', '100px'
        ],
        col_types: [
            'number', 'string', 'string','string', 'string', 'string', 'string'
            'string','string', 'string', 'string','string',  'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.recruitment-table'), filtersConfig);
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
    function recruitment_delete(recruitment_id) {
        swal({
                title: "Emin misiniz?",
                text: "Temin silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/recruitment-delete', {
                            params: {
                                id: recruitment_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Temin silindi!",
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
                                text: "Temin bir hatadan dolayı silinemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Temin silinmedi!",
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
@section('title', "Aday Öğrenci Bilgi")
