@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Üniversite Branş Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('university-branch.create') }}"><span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="branch-table" class="branch-table table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle">Üniversite Branş Adı</th>
                                <th class="align-middle">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td class="align-middle">{{ $branch->name }}</td>
                                    <form action="{{ route('university-branch.edit', ['branch' => $branch->id]) }}" method="GET">
                                        <td class="align-middle"><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
                                                onclick="branch_delete({{ $branch->id }})" class="btn btn-danger">Sil</button></td>
                                    </form>
                                </tr>
                            @endforeach
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
        col_widths: [
            '500px', '200px'

        ],
        col_types: [
            'string', 'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.branch-table'), filtersConfig);
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
    function branch_delete(branch_id) {
        swal({
                title: "Emin misiniz?",
                text: "Branş silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/branch-delete', {
                            params: {
                                id: branch_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Branş silindi!",
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
                                text: "Branş bir hatadan dolayı silinemedi!",
                                button: "Tamam",
                            });
                        });
                } else {
                    swal({
                        text: "Branş silinmedi!",
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
@section('title', "Üniversite Branş Bilgi")
