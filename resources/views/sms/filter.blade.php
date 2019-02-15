@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    {{-- @if (session('status'))
        <div class="alert @if(session('status')=="İşlem Başarılı!") alert-success @elseif(session('status')=="İşlem Başarısız!") alert-danger @endif">
            {{ session('status') }}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-header">Tüm Kişiler</div>
        <div class="card-body">
            <form id="sms_send" method="post" action="{{ route('sms_send') }}">
                @csrf
                <input id="people_id" type="hidden" class="form-control" name="people_id[]">
                <div class="row my-2 d-flex justify-content-center align-content-center align-items-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="originator">*Gönderici adı seçiniz:</label>
                            <select class="form-control" id="originator" name="originator" required>
                                <option></option>
                                <option>TSC-YOS</option>
                                <option>TSC-TOMER</option>
                                <option>TSC-UNI-YOS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="send_datetime">*Gönderme tarih ve zamanı:</label>
                            <div class="gj-margin-top-10">
                                <input id="send_datetime" name="send_datetime" autocomplete="off" placeholder="gg.aa.yyyy ss:dd"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="note">*Mesaj metni:</label>
                            <textarea class="form-control" rows="5" id="text" name="text" required></textarea>
                        </div>
                    </div>
                    <div class="col-1">
                        <button id="sms_send_button" class="btn btn-primary" type="submit">Gönder</button>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="people_table" class="people-table table table-striped">
                        <thead id="table_header">
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
                        <tbody id="table_body">
                            @foreach ($people as $person)
                            <tr class="info" id="{{ $person->id }}">
                                <td class="align-middle">{{ $person->name }}</td>
                                <td class="align-middle">{{ $person->surname }}</td>
                                <td class="align-middle">{{ $person->status }}</td>
                                <td class="align-middle">{{ $person->join_status }}</td>
                                <td class="align-middle">{{ $person->taken_courses }}</td>
                                <td class="align-middle">{{ $person->country }}</td>
                                <td class="align-middle">{{ $person->languages }}</td>
                                <td class="align-middle">{{ $person->book_status }}</td>
                                <td class="align-middle">{{ $person->university_status }}</td>
                                <td class="align-middle">{{ $person->why_abadon_us_status }}</td>
                                <td class="align-middle">{{ $person->note }}</td>
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
        col_8: 'select',
        col_9: 'select',
        col_widths: [
            '170px', '170px', '100px',
            '100px', '120px', '100px',
            '100px', '140px', '140px',
            '140px', '180px'
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
    document.querySelector('.helpCont').innerHTML =
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a target='_blank'  href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
    $(".flt option:nth-child(1)").text("Temizle");
</script>
<script>
    if("{{ session('status') }}"=="İşlem Başarılı!"){
        swal("Başarılı!", "İşlem Başarılı!", "success");
    }else if("{{ session('status') }}"=="İşlem Başarısız!"){
        swal("Başarısız!", "İşlem Başarısız!", "warning");
    }
</script>
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#send_datetime').datetimepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy HH:MM',
        datepicker: { minDate: today, weekStartDay: 1},
        footer: true,
        uiLibrary: 'bootstrap4',
    });
</script>
<script>
   person_id=[]
    $("#sms_send").submit(function(e){
        $('.info').each(function () {
            if ($(this).css('display') != 'none') {
                person_id.push($(this).attr('id'));
            }
        });
        $('#people_id').val(person_id);
        if($('#people_id').val()==""){
            return false;
        } else {
            return true;
        }
    });
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
@section('title', "SMS")