@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('payment_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-12 col-md-4 col-xl-2">
                        <div class="form-group">
                            <label for="name">*Öğrenci Adı:</label>
                            <select class="form-control" id="name" name="name" required>
                                <option value=""></option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-2">
                        <div class="form-group">
                            <label for="paid_description">*Ödeme Açıklamsı:</label>
                            <select id="paid_description" class="form-control" name="paid_description" required>
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
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-xl-11 px-0 my-3 mx-2">
                        <div class="card-header">Borç Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div>
                                        <label>*Para Birimi:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="turkish_lira" type="radio" class="form-check-input" value="Türk Lirası"
                                                name="currency_unit" required>Türk Lirası
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="dolar" type="radio" class="form-check-input" value="Dolar" name="currency_unit"
                                                required>Dolar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="debt_amount">*Borç Miktarı:</label>
                                        <input type="number" class="form-control" id="debt_amount" min="0" step="0.01"
                                            name="debt_amount" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="cash_paid_amount">*Peşin Ödenen Miktar:</label>
                                        <input type="number" class="form-control" id="cash_paid_amount" min="0" step="0.01"
                                            name="cash_paid_amount" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="cash_paid_amount_date">*Peşin Ödeme Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="cash_paid_amount_date" name="cash_paid_amount_date" autocomplete="off"
                                                value="{{ $current_date }}" placeholder="gg.aa.yyyy" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="total_remaining_amount">Toplam Kalan Miktar:</label>
                                        <input type="number" class="form-control" id="total_remaining_amount" name="total_remaining_amount"
                                            readonly>
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
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-1</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment1_amount" min="0" step="0.01"
                                            name="installment1_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment1_date">Taksit-1 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment1_date" name="installment1_date" autocomplete="off"
                                                placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-2</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment2_amount" min="0" step="0.01"
                                            name="installment2_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment2_date">Taksit-2 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment2_date" name="installment2_date" autocomplete="off"
                                                placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-3</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment3_amount" min="0" step="0.01"
                                            name="installment3_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment3_date">Taksit-3 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment3_date" name="installment3_date" class="all_installments"
                                                autocomplete="off" placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-4</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment4_amount" min="0" step="0.01"
                                            name="installment4_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment4_date">Taksit-4 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment4_date" name="installment4_date" autocomplete="off"
                                                placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-5</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment5_amount" min="0" step="0.01"
                                            name="installment5_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment5_date">Taksit-5 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment5_date" name="installment5_date" autocomplete="off"
                                                placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-6 col-xl-4 px-0 my-3 mx-3">
                        <div class="card-header">Taksit-6</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment6_amount">Taksit-6 Miktarı:</label>
                                        <input type="number" class="form-control" id="installment6_amount" min="0" step="0.01"
                                            name="installment6_amount">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="installment6_date">Taksit-6 Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="installment6_date" name="installment6_date" autocomplete="off"
                                                placeholder="gg.aa.yyyy">
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
                <button id="submit_button" class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- date picker--}}
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#cash_paid_amount_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment1_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment2_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment3_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment4_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment5_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#installment6_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
</script>

<script>
        debt_amount=document.getElementById('debt_amount');
        cash_paid_amount=document.getElementById('cash_paid_amount');
        total_remaining_amount=document.getElementById('total_remaining_amount');
        calculator=document.getElementById('calculator');
        agency_paid_amount=document.getElementById('agency_paid_amount');
        installment_number=document.getElementById('installment_number');
        installment1_amount=document.getElementById('installment1_amount');
        installment2_amount=document.getElementById('installment2_amount');
        installment3_amount=document.getElementById('installment3_amount');
        installment4_amount=document.getElementById('installment4_amount');
        installment5_amount=document.getElementById('installment5_amount');
        installment6_amount=document.getElementById('installment6_amount');
        installment1_date=document.getElementById('installment1_date');
        installment2_date=document.getElementById('installment2_date');
        installment3_date=document.getElementById('installment3_date');
        installment4_date=document.getElementById('installment4_date');
        installment5_date=document.getElementById('installment5_date');
        installment6_date=document.getElementById('installment6_date');
        setInterval(function(){ 
        total_remaining_amount.value=debt_amount.value-cash_paid_amount.value;
        calculator.value=debt_amount.value-cash_paid_amount.value-installment1_amount.value-installment2_amount.value-installment3_amount.value-installment4_amount.value-installment5_amount.value-installment6_amount.value;
        
        if(total_remaining_amount.value==0 || installment_number.value==""){
            $('#installment1_amount').attr("readonly", true);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            $("#installment_number").val("");
            $("#installment1_amount").val("");
            $("#installment2_amount").val("");
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", true);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment1_date").val("");
            $("#installment2_date").val("");
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            $("#installment6_date").val("");
            if(total_remaining_amount.value==0){
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
            $('#installment6_amount').attr("readonly", true);
            $("#installment2_amount").val("");
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment2_date").val("");
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            $("#installment6_date").val("");
            if(total_remaining_amount.value!=0 && calculator.value==0){
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
            $('#installment6_amount').attr("readonly", true);
            $("#installment3_amount").val("");
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment3_date").val("");
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            $("#installment6_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && total_remaining_amount.value!=0 && calculator.value==0){
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
            $('#installment6_amount').attr("readonly", true);
            $("#installment4_amount").val("");
            $("#installment5_amount").val("");
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment4_date").val("");
            $("#installment5_date").val("");
            $("#installment6_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && total_remaining_amount.value!=0 && calculator.value==0){
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
            $('#installment6_amount').attr("readonly", true);
            $("#installment5_amount").val("");
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            $("#installment5_date").val("");
            $("#installment6_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && installment4_amount.value!="" && installment4_date.value!="" && total_remaining_amount.value!=0 && calculator.value==0){
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
            $('#installment6_amount').attr("readonly", true);
            $("#installment6_amount").val("");
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", false);
            $('#installment6_date').attr("readonly", true);
            $("#installment6_date").val("");
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && installment4_amount.value!="" && installment4_date.value!=""  && installment5_amount.value!="" && installment5_date.value!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number.value==6) {
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", false);
            $('#installment5_amount').attr("readonly", false);
            $('#installment6_amount').attr("readonly", false);
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", false);
            $('#installment6_date').attr("readonly", false);
            if(installment1_amount.value!="" && installment1_date.value!="" && installment2_amount.value!="" && installment2_date.value!="" && installment3_amount.value!="" && installment3_date.value!="" && installment4_amount.value!="" && installment4_date.value!=""  && installment5_amount.value!="" && installment5_date.value!="" && installment6_amount!="" && installment6_date.value!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        }
    }, 1000);
</script>
@endsection

@section('css')

@endsection
@section('title', "Ödeme Kaydet")