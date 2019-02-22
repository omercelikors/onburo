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
                                <th class="align-middle">Adı</th>
                                <th class="align-middle">Soyadı</th>
                                <th class="align-middle">Ödeme Açıklaması</th>
                                <th class="align-middle">Kitap Aldı Mı?</th>
                                <th class="align-middle">Anlaşılan Tutar</th>
                                <th class="align-middle">Ödenen</th>
                                <th class="align-middle">Kalan</th>
                                <th class="align-middle">Acente</th>
                                <th class="align-middle">1. Taksit</th>
                                <th class="align-middle">2. Taksit</th>
                                <th class="align-middle">3. Taksit</th>
                                <th class="align-middle">4. Taksit</th>
                                <th class="align-middle">5. Taksit</th>
                                <th class="align-middle">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td class="align-middle">{{ $payment->person->name }}</td>
                                <td class="align-middle">{{ $payment->person->surname }}</td>
                                <td class="align-middle">{{ $payment->paid_description }}</td>
                                <td class="align-middle">{{ $payment->book_status }}</td>
                                <td class="align-middle">{{ $payment->debt_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif</td>
                                <td class="align-middle">{{ number_format($payment->debt_amount-$payment->total_remaining_amount,2) }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif</td>
                                <td class="align-middle">{{ $payment->total_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif</td>
                                <td class="align-middle">@if(isset($payment->person->agency_id)){{ $payment->person->agency->name }}<br>{{ $payment->debt_amount*0.1}}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif @endif</td>
                                <td class="align-middle">@if(isset($payment->installment1_remaining_amount)){{ $payment->installment1_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif <br> {{ $payment->installment_date_format(1) }}@endif</td>
                                <td class="align-middle">@if(isset($payment->installment2_remaining_amount)){{ $payment->installment2_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif <br> {{ $payment->installment_date_format(2) }}@endif</td>
                                <td class="align-middle">@if(isset($payment->installment3_remaining_amount)){{ $payment->installment3_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif <br> {{ $payment->installment_date_format(3) }}@endif</td>
                                <td class="align-middle">@if(isset($payment->installment4_remaining_amount)){{ $payment->installment4_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif <br> {{ $payment->installment_date_format(4) }}@endif</td>
                                <td class="align-middle">@if(isset($payment->installment5_remaining_amount)){{ $payment->installment5_remaining_amount }}@if($payment->currency_unit=="Türk Lirası") TL @elseif($payment->currency_unit=="Dolar") $ @endif <br> {{ $payment->installment_date_format(5) }}@endif</td>
                                <form action="{{ route('payment_edit_show', ['payment_id' => $payment->id]) }}" method="GET">
                                    <td class="align-middle"><button type="submit" class="btn btn-primary mx-2">Düzenle</button><button type="button"
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
        col_2: 'select',
        col_3: 'select',
        col_7: 'select',
        col_widths: [
            '100px', '100px', '100px', '80px', '100px',
            '100px', '100px', '100px', '100px', '100px',
            '100px', '100px', '100px','200px'
        ],
        col_types: [
            'string', 'string', 'string', 'string', 'number',
            'number', 'number', 'string', 'string', 'string',
            'string', 'string', 'string','string'
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
        "Daha detaylı bir filitreleme için aşağıdaki operatörleri kullanarak arama yapabilirsiniz.<br><b><</b>, <b><=</b>, <b>></b>, <b>>=</b>, <b>*</b>, <b>!</b>, <b>{</b>, <b>}</b>, <b>||</b>, <b>&&</b>, <b>[empty]</b>, <b>[nonempty]</b>, <b>rgx</b> <br> <a target='_blank' href='https://github.com/koalyptus/TableFilter/wiki/4.-Filter-operators/'>Detaylı Bilgi</a>";
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
@section('title', "Ödeme Bilgi")