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
                                <th>Adı</th>
                                <th>Kur Tipi</th>
                                <th>Kur Vakti</th>
                                <th>Başlangıç Tarihi</th>
                                <th>Bitiş Tarihi</th>
                                <th>Sınıf Öğretmeni</th>
                                <th>Milliyeti</th>
                                <th>Kitap Durumu</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->classroom->course_type }}</td>
                                <td>{{ $student->classroom->time }}</td>
                                <td>{{ $student->classroom->starting_date }}</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td>sgffg</td>
                                <td>agfsferd</td>
                                <td><button class="btn btn-primary mx-2">Düzenle</button><button class="btn btn-warning">Sil</button></td>
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
        col_1: 'select',
        col_2: 'select',
        col_5: 'select',
        col_7: 'select',
        col_widths: [
            '200px', '100px', '120px',
            '190px', '190px', '200px',
            '200px', '100px', '160px'
        ],
        col_types: [
            'string', 'string', 'string',
            'date', 'date', 'string',
            'string', 'string', 'string'
        ],
        extensions: [{
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
    document.querySelector('.loader').innerHTML = "Yükleniyor...";
    // document.querySelector('select option').innerHTML = "Temizle";
    document.querySelector('.fltrow td:last-child').style.display = "none";
    document.querySelector('.helpCont').innerHTML ="Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
</script>
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
@section('css')
<link href="{{ asset('css/extensions/tablefilter.css') }}" rel="stylesheet">
@endsection