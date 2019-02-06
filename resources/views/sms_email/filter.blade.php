@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Tüm Kişiler</div>
        <div class="card-body">
            <div class="row my-2 d-flex justify-content-center align-content-center align-items-center">
                <div class="col-4">
                    <div class="form-group">
                        <label for="note">Mesaj metni:</label>
                        <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                    </div>
                </div>
                <div class="col-1">
                    <button id="submit_button" class="btn btn-primary" type="submit">Gönder</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="people-table" class="people-table table table-striped">
                        <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>Statüsü</th>
                                <th>Katılım Durumu</th>
                                <th>Aldığı Kuslar</th>
                                <th>Ülke</th>
                                <th>Konuştuğu Diller</th>
                                <th>Kitap Durmu</th>
                                <th>Üniversiteye Gitme Durumu</th>
                                <th>Ayrılma Nedeni</th>
                                <th>Not</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $person)
                            <tr>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->surname }}</td>
                                <td>{{ $person->status }}</td>
                                <td>{{ $person->join_status }}</td>
                                <td>{{ $person->taken_courses }}</td>
                                <td>{{ $person->country }}</td>
                                <td>{{ $person->languages }}</td>
                                <td>{{ $person->book_status }}</td>
                                <td>{{ $person->university_status }}</td>
                                <td>{{ $person->why_abadon_us_status }}</td>
                                <td>{{ $person->note }}</td>
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
        col_2: 'select',
        col_3: 'select',
        col_7: 'select',
        col_widths: [
            '170px', '170px', '100px',
            '100px', '120px', '100px',
            '140px', '140px', '140px',
            '140px', '140px'
        ],
        col_types: [
            'string', 'string', 'string',
            'string', 'string', 'string',
            'string', 'string', 'string', 
            'string', 'string'
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.people-table'), filtersConfig);
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
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a target='_blank'  href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
    $(".flt option:nth-child(1)").text("Temizle");
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