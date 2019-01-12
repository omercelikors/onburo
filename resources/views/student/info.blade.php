@extends('layouts.master')

@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Öğrenci Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <span class="float-right">Yeni Kayıt</span><i class="fas fa-plus-circle float-right pr-2"></i>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table class="my-table table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>Kur Tipi</th>
                                <th>Kur Vakti</th>
                                <th>Kur Öğretmeni</th>
                                <th>Kitap</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>gessf</td>
                                <td>eedfsed</td>
                                <td>sdefsef</td>
                                <td>sfdesf</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>sessf</td>
                                <td>sedfsed</td>
                                <td>edefsef</td>
                                <td>zfdesf</td>
                                <td>sgffg</td>
                                <td>sgfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>gessf</td>
                                <td>eedfsed</td>
                                <td>sdefsef</td>
                                <td>sfdesf</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>sessf</td>
                                <td>sedfsed</td>
                                <td>edefsef</td>
                                <td>zfdesf</td>
                                <td>sgffg</td>
                                <td>sgfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>gessf</td>
                                <td>eedfsed</td>
                                <td>sdefsef</td>
                                <td>sfdesf</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>sessf</td>
                                <td>sedfsed</td>
                                <td>edefsef</td>
                                <td>zfdesf</td>
                                <td>sgffg</td>
                                <td>sgfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>gessf</td>
                                <td>eedfsed</td>
                                <td>sdefsef</td>
                                <td>sfdesf</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td>sgfsgf</td>
                            </tr>
                            <tr>
                                <td>sessf</td>
                                <td>sedfsed</td>
                                <td>edefsef</td>
                                <td>zfdesf</td>
                                <td>sgffg</td>
                                <td>sgfsferd</td>
                                <td>sgfsgf</td>
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
          results_per_page: ['Records: ', [10,25,50,100]]
        },
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        status_bar: false,
        col_0: 'multiple',
        col_1: 'select',
        col_2: 'checklist',
        col_widths: [
            '280px', '250px', '150px',
            '250px', '250px', '150px',
            '150px'
        ],
        col_types: [
            'string', 'string', 'string',
            'string', 'string', 'string',
            'string'
        ],
        extensions:[{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.my-table'), filtersConfig);
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

    /* document.querySelector('.firstPage').value = "|<";
    document.querySelector('.previousPage').value = "<";
    document.querySelector('.nextPage').value = ">";
    document.querySelector('.lastPage').value = ">|";
    document.querySelector('.reset').value = "Yeni"; */
</script>
@endsection
@section('css')
<link href="{{ asset('css/extensions/tablefilter.css') }}" rel="stylesheet">
@endsection