@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">Ödeme Bilgileri</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('payment_register_show') }}"><span class="float-right">Yeni Ödeme</span><i class="fas fa-plus-circle float-right pr-2"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 table-responsive">
                    <table id="payment-table" class="payment-table table table-striped">
                        <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Borç Miktarı</th>
                                <th>1. Taksit Kalan</th>
                                <th>1. Taksit Tarihi</th>
                                <th>2. Taksit Kalan</th>
                                <th>2. Taksit Tarihi</th>
                                <th>3. Taksit Kalan</th>
                                <th>3. Taksit Tarihi</th>
                                <th>4. Taksit Kalan</th>
                                <th>4. Taksit Tarihi</th>
                                <th>5. Taksit Kalan</th>
                                <th>5. Taksit Tarihi</th>
                                <th>6. Taksit Kalan</th>
                                <th>6. Taksit Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->person->name }}</td>
                                <td>{{ $payment->total_remaining_amount }} {{ $payment->currency_unit }}</td>
                                <td>@if(isset($payment->installment1_remaining_amount)){{ $payment->installment1_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(1) }}</td>
                                <td>@if(isset($payment->installment2_remaining_amount)){{ $payment->installment2_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(2) }}</td>
                                <td>@if(isset($payment->installment3_remaining_amount)){{ $payment->installment3_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(3) }}</td>
                                <td>@if(isset($payment->installment4_remaining_amount)){{ $payment->installment4_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(4) }}</td>
                                <td>@if(isset($payment->installment5_remaining_amount)){{ $payment->installment5_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(5) }}</td>
                                <td>@if(isset($payment->installment6_remaining_amount)){{ $payment->installment6_remaining_amount }} {{ $payment->currency_unit }}@endif</td>
                                <td>{{ $payment->installment_date_format_1(6) }}</td>
                                <form action="{{ route('payment_edit_show', ['payment_id' => $payment->id]) }}" method="GET">
                                    <td><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
                                            onclick="payment_delete({{ $payment->id }})" class="btn btn-danger">Sil</button></td>
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
            results_per_page: ['Records: ', [10, 25, 50, 100]]
        },
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        status_bar: false,
        col_widths: [
            '200px', '90px', '90px', '100px', '90px',
            '100px', '90px', '100px', '90px', '100px',
            '90px', '100px', '90px', '100px', '170px'
        ],
        col_types: [
            'string', 'number', 'number', 'date', 'number',
            'date', 'number', 'date', 'number', 'date',
            'number', 'date', 'number', 'date', 'string',
        ],
        extensions: [{
            name: 'sort'
        }]
    };
    var tf = new TableFilter(document.querySelector('.payment-table'), filtersConfig);
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
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
    $(".flt option:nth-child(1)").text("Temizle");
</script>
<script>
    function payment_delete(payment_id) {
        swal({
                title: "Emin misiniz?",
                text: "Ödeme silindiğinde tekrar geri getiremezsiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Hayır", "Evet"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    //send project id to be deleted from databese
                    axios.get('/api/payment-delete', {
                            params: {
                                id: payment_id
                            }
                        })
                        .then(function (response) {
                            console.log(response);
                            swal({
                                title: "Başarılı!",
                                text: "Ödeme silindi!",
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
                                text: "Ödeme bir hatadan dolayı silinemedi!",
                                button: "Evet",
                            });
                        });
                } else {
                    swal({
                        text: "Ödeme silinmedi!",
                        button: "Evet",
                    });

                }
            });
    }
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