@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('payment_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="payment_id" value="{{ $payment->id }}">
        <div class="card my-3">
            <div class="card-header">Ödeme Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-12 col-md-4 col-xl-2">
                        <div class="form-group">
                            <label for="name">Adı:</label>
                            <input type="text" class="form-control" value="{{ $student_name }} {{ $student_surname }}"
                                id="name" name="name" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-2">
                        <div class="form-group">
                            <label for="paid_description">*Ödeme Açıklamsı:</label>
                            <select id="paid_description" class="form-control" name="paid_description[]" multiple required>
                                <option></option>
                                <option>A1</option>
                                <option>A2</option>
                                <option>B1</option>
                                <option>B2</option>
                                <option>C1</option>
                                <option>C1+</option>
                                <option>YÖS</option>
                                <option>Diğer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-3">
                        <div>
                            <label>*Kitap aldı mı?:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="book_status_yes" @if($payment->book_status=="Evet") checked @endif class="form-check-input" value="Evet"
                                    name="book_status" required>Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="book_status_no" @if($payment->book_status=="Hayır") checked @endif class="form-check-input" value="Hayır"
                                    name="book_status" required>Hayır
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-xl-10 px-0 my-3 mx-2">
                        <div class="card-header">Borç Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div>
                                        <label>*Para Birimi:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="turkish_lira" type="radio" class="form-check-input"
                                                @if($payment->currency_unit=="Türk Lirası") checked @endif value="Türk Lirası" name="currency_unit" required>Türk Lirası
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="dolar" type="radio" class="form-check-input" @if($payment->currency_unit=="Dolar")
                                            checked @endif value="Dolar" name="currency_unit" required>Dolar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="debt_amount">*Borç Miktarı:</label>
                                        <input type="number" class="form-control" id="debt_amount" value="{{ $payment->debt_amount }}"
                                            min="0" step="0.01" name="debt_amount" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="paid_amount">*Peşin Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="cash_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->cash_paid_amount }}" name="cash_paid_amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="paid_amount_by_installments">*Taksitle Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="paid_amount_by_installments" min="0"
                                            step="0.01" name="paid_amount_by_installments" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="total_remaining_amount">Toplam Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="total_remaining_amount" value="{{ $payment->total_remaining_amount }}"
                                            name="total_remaining_amount" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-4 px-0 my-3">
                        <div class="card-header">Taksitlendirme Yardımcısı</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="form-group">
                                    <label for="calculator">Kalan Taksitlendirme Miktarı:<br><small>(Bu değer 0
                                            olmalıdır)</small></label>
                                    <input id="calculator" type="number" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-12 col-md-3 col-xl-2">
                        <div class="form-group">
                            <label for="installment_number">Taksit Sayısı:</label>
                            <select class="form-control" id="installment_number" name="installment_number">
                                <option></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-9 col-lg-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Taksit-1</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment1_amount" min="0" step="0.01"
                                            value="{{ $payment->installment1_amount }}" name="installment1_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment1_paid_amount">Taksit-1 Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="installment1_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->installment1_paid_amount }}" name="installment1_paid_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment1_remaining_amount">Taksit-1 Kalan Miktar:</label>
                                        <input type="text" class="form-control" id="installment1_remaining_amount" value="{{ $payment->installment1_remaining_amount }}"
                                            name="installment1_remaining_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment1_date">Taksit-1 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment1_date" name="installment1_date" value="{{ $payment->installment_date_format(1) }}" placeholder="gg.aa.yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-9 col-lg-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Taksit-2</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment2_amount" min="0" step="0.01"
                                            value="{{ $payment->installment2_amount }}" name="installment2_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment2_paid_amount">Taksit-2 Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="installment2_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->installment2_paid_amount }}" name="installment2_paid_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment2_remaining_amount">Taksit-2 Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="installment2_remaining_amount" value="{{ $payment->installment2_remaining_amount }}"
                                            name="installment2_remaining_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment2_date">Taksit-2 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment2_date" name="installment2_date" value="{{ $payment->installment_date_format(2) }}" placeholder="gg.aa.yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-9 col-lg-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Taksit-3</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment3_amount" min="0" step="0.01"
                                            value="{{ $payment->installment3_amount }}" name="installment3_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment3_paid_amount">Taksit-3 Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="installment3_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->installment3_paid_amount }}" name="installment3_paid_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment3_remaining_amount">Taksit-3 Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="installment3_remaining_amount" value="{{ $payment->installment3_remaining_amount }}"
                                            name="installment3_remaining_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment3_date">Taksit-3 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment3_date" name="installment3_date" value="{{ $payment->installment_date_format(3) }}" placeholder="gg.aa.yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-9 col-lg-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Taksit-4</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment4_amount" min="0" step="0.01"
                                            value="{{ $payment->installment4_amount }}" name="installment4_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment4_paid_amount">Taksit-4 Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="installment4_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->installment4_paid_amount }}" name="installment4_paid_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment4_remaining_amount">Taksit-4 Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="installment4_remaining_amount" value="{{ $payment->installment4_remaining_amount }}"
                                            name="installment4_remaining_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment4_date">Taksit-4 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment4_date" name="installment4_date" value="{{ $payment->installment_date_format(4) }}" placeholder="gg.aa.yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-9 col-lg-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Taksit-5</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment5_amount" min="0" step="0.01"
                                            value="{{ $payment->installment5_amount }}" name="installment5_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment2_paid_amount">Taksit-5 Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="installment5_paid_amount" min="0" step="0.01"
                                            value="{{ $payment->installment5_paid_amount }}" name="installment5_paid_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment5_remaining_amount">Taksit-5 Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="installment5_remaining_amount" value="{{ $payment->installment5_remaining_amount }}"
                                            name="installment5_remaining_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-3">
                                    <div class="form-group">
                                        <label for="installment5_date">Taksit-5 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment5_date" name="installment5_date" value="{{ $payment->installment_date_format(5) }}" placeholder="gg.aa.yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="note">Not:</label>
                            <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button id="submit_button" class="btn btn-primary" type="submit">Düzenle</button>
            </div>
        </div>
    </form>
</main>
@endsection
@section('js')
{{-- installment number dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        installment_number_option_length = document.getElementById("installment_number").options.length;
        for (i = 0; i < installment_number_option_length; i++) {
            if (document.getElementById("installment_number").options[i].value =="{{ $payment->installment_number }}") {
                document.getElementById("installment_number").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- paid description dropdown is having "selected attirubute" according to value coming --}}
<script>
        paid_description="{{ $payment->paid_description }}";
        paid_description_array=paid_description.split(",")
        $(document).ready(function () {
            paid_description_option_length = document.getElementById("paid_description").options.length;
            for (i = 0; i < paid_description_option_length; i++) {
                for(z = 0; z < paid_description_array.length; z++){
                    if (document.getElementById("paid_description").options[i].value == paid_description_array[z]) {
                        document.getElementById("paid_description").options[i].setAttribute('selected', true);
                    }
                }
            }
        });
</script>
{{-- date picker--}}
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#installment1_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
    $('#installment2_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
    $('#installment3_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
    $('#installment4_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
    $('#installment5_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
</script>
<script>
        debt_amount=document.getElementById('debt_amount');
        cash_paid_amount=document.getElementById('cash_paid_amount');
        paid_amount_by_installments=document.getElementById('paid_amount_by_installments');
        total_remaining_amount=document.getElementById('total_remaining_amount');
        calculator=document.getElementById('calculator');
        installment_number=document.getElementById('installment_number');
        installment1_amount=document.getElementById('installment1_amount');
        installment2_amount=document.getElementById('installment2_amount');
        installment3_amount=document.getElementById('installment3_amount');
        installment4_amount=document.getElementById('installment4_amount');
        installment5_amount=document.getElementById('installment5_amount');
        installment1_paid_amount=document.getElementById('installment1_paid_amount');
        installment2_paid_amount=document.getElementById('installment2_paid_amount');
        installment3_paid_amount=document.getElementById('installment3_paid_amount');
        installment4_paid_amount=document.getElementById('installment4_paid_amount');
        installment5_paid_amount=document.getElementById('installment5_paid_amount');
        installment1_remaining_amount=document.getElementById('installment1_remaining_amount');
        installment2_remaining_amount=document.getElementById('installment2_remaining_amount');
        installment3_remaining_amount=document.getElementById('installment3_remaining_amount');
        installment4_remaining_amount=document.getElementById('installment4_remaining_amount');
        installment5_remaining_amount=document.getElementById('installment5_remaining_amount');
        installment1_date=document.getElementById('installment1_date');
        installment2_date=document.getElementById('installment2_date');
        installment3_date=document.getElementById('installment3_date');
        installment4_date=document.getElementById('installment4_date');
        installment5_date=document.getElementById('installment5_date');
    setInterval(function(){ 
        installment1_remaining_amount.value=installment1_amount.value-installment1_paid_amount.value;
        installment2_remaining_amount.value=installment2_amount.value-installment2_paid_amount.value;
        installment3_remaining_amount.value=installment3_amount.value-installment3_paid_amount.value;
        installment4_remaining_amount.value=installment4_amount.value-installment4_paid_amount.value;
        installment5_remaining_amount.value=installment5_amount.value-installment5_paid_amount.value;
        paid_amount_by_installments.value=Number(installment1_paid_amount.value) + Number(installment2_paid_amount.value) + Number(installment3_paid_amount.value) + Number(installment4_paid_amount.value) + Number(installment5_paid_amount.value);
        total_remaining_amount.value=debt_amount.value - cash_paid_amount.value - paid_amount_by_installments.value;
        calculator.value=debt_amount.value - cash_paid_amount.value - installment1_amount.value - installment2_amount.value - installment3_amount.value - installment4_amount.value - installment5_amount.value;
        if(installment_number.value==""){
            $('#installment1_amount').attr("readonly", true);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $("#installment1_amount").val("");
            $("#installment2_amount").val("");
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $('#installment1_paid_amount').attr("readonly", true);
            $('#installment2_paid_amount').attr("readonly", true);
            $('#installment3_paid_amount').attr("readonly", true);
            $('#installment4_paid_amount').attr("readonly", true);
            $('#installment5_paid_amount').attr("readonly", true);
            $('#installment6_paid_amount').attr("readonly", true);
            $("#installment1_paid_amount").val("");
            $("#installment2_paid_amount").val("");
            $("#installment3_paid_amount").val("");
            $("#installment4_paid_amount").val("");
            $("#installment5_paid_amount").val("");
            $("#installment1_paid_amount").val("");
            $("#installment1_remaining_amount").val("");
            $("#installment2_remaining_amount").val("");
            $("#installment3_remaining_amount").val("");
            $("#installment4_remaining_amount").val("");
            $("#installment5_remaining_amount").val("");
            $('#installment1_date').attr("readonly", true);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $("#installment1_date").val("");
            $("#installment2_date").val("");
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            if(total_remaining_amount.value>=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        }else if(installment_number.value==1){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $("#installment2_amount").val("");
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $('#installment1_paid_amount').attr("readonly", false);
            $('#installment2_paid_amount').attr("readonly", true);
            $('#installment3_paid_amount').attr("readonly", true);
            $('#installment4_paid_amount').attr("readonly", true);
            $('#installment5_paid_amount').attr("readonly", true);
            $("#installment2_paid_amount").val("");
            $("#installment3_paid_amount").val("");
            $("#installment4_paid_amount").val("");
            $("#installment5_paid_amount").val("");
            $("#installment2_remaining_amount").val("");
            $("#installment3_remaining_amount").val("");
            $("#installment4_remaining_amount").val("");
            $("#installment5_remaining_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $("#installment2_date").val("");
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && total_remaining_amount.value>=0 && calculator.value==0 && installment1_remaining_amount.value>=0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number.value==2){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $('#installment1_paid_amount').attr("readonly", false);
            $('#installment2_paid_amount').attr("readonly", false);
            $('#installment3_paid_amount').attr("readonly", true);
            $('#installment4_paid_amount').attr("readonly", true);
            $('#installment5_paid_amount').attr("readonly", true);
            $("#installment3_paid_amount").val("");
            $("#installment4_paid_amount").val("");
            $("#installment5_paid_amount").val("");
            $("#installment3_remaining_amount").val("");
            $("#installment4_remaining_amount").val("");
            $("#installment5_remaining_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && total_remaining_amount.value>=0 && calculator.value==0 && installment1_remaining_amount.value>=0 && installment2_remaining_amount.value>=0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number.value==3){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $('#installment1_paid_amount').attr("readonly", false);
            $('#installment2_paid_amount').attr("readonly", false);
            $('#installment3_paid_amount').attr("readonly", false);
            $('#installment4_paid_amount').attr("readonly", true);
            $('#installment5_paid_amount').attr("readonly", true);
            $("#installment4_paid_amount").val("");
            $("#installment5_paid_amount").val("");
            $("#installment6_paid_amount").val("");
            $("#installment4_remaining_amount").val("");
            $("#installment5_remaining_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && total_remaining_amount.value>=0 && calculator.value==0 && installment1_remaining_amount.value>=0 && installment2_remaining_amount.value>=0 && installment3_remaining_amount.value>=0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if (installment_number.value==4){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", false);
            $('#installment5_amount').attr("readonly", true);
            $("#installment5_amount").val("");
            $('#installment1_paid_amount').attr("readonly", false);
            $('#installment2_paid_amount').attr("readonly", false);
            $('#installment3_paid_amount').attr("readonly", false);
            $('#installment4_paid_amount').attr("readonly", false);
            $('#installment5_paid_amount').attr("readonly", true);
            $("#installment5_paid_amount").val("");
            $("#installment5_remaining_amount").val("");
            $("#installment6_remaining_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", true);
            $("#installment5_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && installment4_amount.value!="" && installment4_date.value!="" && total_remaining_amount.value>=0 && calculator.value==0 && installment1_remaining_amount.value>=0 && installment2_remaining_amount.value>=0 && installment3_remaining_amount.value>=0 && installment4_remaining_amount.value>=0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number.value==5){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", false);
            $('#installment5_amount').attr("readonly", false);
            $('#installment1_paid_amount').attr("readonly", false);
            $('#installment2_paid_amount').attr("readonly", false);
            $('#installment3_paid_amount').attr("readonly", false);
            $('#installment4_paid_amount').attr("readonly", false);
            $('#installment5_paid_amount').attr("readonly", false);
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", false);
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && installment4_amount.value!="" && installment4_date.value!=""  && installment5_amount.value!="" && installment5_date.value!="" && total_remaining_amount.value>=0 && calculator.value==0 && installment1_remaining_amount.value>=0 && installment2_remaining_amount.value>=0 && installment3_remaining_amount.value>=0 && installment4_remaining_amount.value>=0 && installment5_remaining_amount.value>=0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } 
    }, 1000);
</script>
@endsection
@section('title', "Ödeme Düzenle")