@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('payment_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="name">*Öğrenci Adı:</label>
                            <select class="form-control" id="name" name="name">
                                <option value=""></option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-8 mr-2">
                        <legend style="width:12%;">Borç Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div>
                                    <label>*Para Birimi:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="turkish_lira" type="radio" class="form-check-input" value="Türk Lirası"
                                            name="currency_unit">Türk
                                        Lirası
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="dolar" type="radio" class="form-check-input" value="Dolar" name="currency_unit">Dolar
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="debt_amount">*Borç Miktarı:</label>
                                    <input type="number" class="form-control" id="debt_amount" min="0" step="0.01" name="debt_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="paid_amount">*Peşin Ödenen Miktar:</label>
                                    <input type="number" class="form-control" id="paid_amount" min="0" step="0.01" name="paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="total_remaining_amount">Toplam Kalan Miktar:</label>
                                    <input type="number" class="form-control" id="total_remaining_amount" name="total_remaining_amount"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-3">
                        <legend style="width:73%;">Taksitlendirme Yardımcısı</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="form-group">
                                <label for="calculator">Kalan Taksitlendirme Miktarı <small>(Bu değer 0 olmalıdır)</small>:</label>
                                <input id="calculator" type="number" class="form-control" readonly>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
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
                    <fieldset class="col-4 mr-4">
                        <legend style="width:15%;">Taksit-1</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment1_amount" min="0" step="0.01" name="installment1_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment1_date">Taksit-1 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment1_date" name="installment1_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-4">
                        <legend style="width:15%;">Taksit-2</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment2_amount" min="0" step="0.01" name="installment2_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment2_date">Taksit-2 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment2_date" name="installment2_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-4 mr-4">
                        <legend style="width:15%;">Taksit-3</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment3_amount" min="0" step="0.01" name="installment3_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment3_date">Taksit-3 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment3_date" name="installment3_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-4">
                        <legend style="width:15%;">Taksit-4</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment4_amount" min="0" step="0.01" name="installment4_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment4_date">Taksit-4 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment4_date" name="installment4_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-4 mr-4">
                        <legend style="width:15%;">Taksit-5</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment5_amount" min="0" step="0.01" name="installment5_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment5_date">Taksit-5 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment5_date" name="installment5_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-4">
                        <legend style="width:15%;">Taksit-6</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment6_amount">Taksit-6 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment6_amount" min="0" step="0.01" name="installment6_amount">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="installment6_date">Taksit-6 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment6_date" name="installment6_date">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-4">
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
                <button id="submit_button" class="btn btn-primary" type="submit" >Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- disabled past dates for "installments datefield" --}}
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("installment1_date").setAttribute("min", today);
    document.getElementById("installment2_date").setAttribute("min", today);
    document.getElementById("installment3_date").setAttribute("min", today);
    document.getElementById("installment4_date").setAttribute("min", today);
    document.getElementById("installment5_date").setAttribute("min", today);
    document.getElementById("installment6_date").setAttribute("min", today);
</script>
<script>
     setInterval(function(){ 
        name=document.getElementById('name').value;
        turkish_lira=document.getElementById('turkish_lira');
        dolar=document.getElementById('dolar');
        debt_amount=document.getElementById('debt_amount').value;
        paid_amount=document.getElementById('paid_amount').value;
        total_remaining_amount=document.getElementById('total_remaining_amount');
        calculator=document.getElementById('calculator');
        installment_number=document.getElementById('installment_number').value;
        installment1_amount=document.getElementById('installment1_amount').value;
        installment2_amount=document.getElementById('installment2_amount').value;
        installment3_amount=document.getElementById('installment3_amount').value;
        installment4_amount=document.getElementById('installment4_amount').value;
        installment5_amount=document.getElementById('installment5_amount').value;
        installment6_amount=document.getElementById('installment6_amount').value;
        installment1_date=document.getElementById('installment1_date').value;
        installment2_date=document.getElementById('installment2_date').value;
        installment3_date=document.getElementById('installment3_date').value;
        installment4_date=document.getElementById('installment4_date').value;
        installment5_date=document.getElementById('installment5_date').value;
        installment6_date=document.getElementById('installment6_date').value;
        total_remaining_amount.value=debt_amount-paid_amount;
        calculator.value=(debt_amount-paid_amount-installment1_amount)-installment2_amount-installment3_amount-installment4_amount-installment5_amount-installment6_amount;
        
        if(total_remaining_amount.value==0){
            $('#installment1_amount').attr("readonly", true);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment_number").value = "";
            document.getElementById("installment1_amount").value = "";
            document.getElementById("installment2_amount").value = "";
            document.getElementById("installment3_amount").value = "";
            document.getElementById("installment4_amount").value = "";
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", true);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment1_date").value = "";
            document.getElementById("installment2_date").value = "";
            document.getElementById("installment3_date").value = "";
            document.getElementById("installment4_date").value = "";
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        }else if(installment_number==""){
            $('#installment1_amount').attr("readonly", true);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment1_amount").value = "";
            document.getElementById("installment2_amount").value = "";
            document.getElementById("installment3_amount").value = "";
            document.getElementById("installment4_amount").value = "";
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", true);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment1_date").value = "";
            document.getElementById("installment2_date").value = "";
            document.getElementById("installment3_date").value = "";
            document.getElementById("installment4_date").value = "";
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        }else if(installment_number==1){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", true);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment2_amount").value = "";
            document.getElementById("installment3_amount").value = "";
            document.getElementById("installment4_amount").value = "";
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", true);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment2_date").value = "";
            document.getElementById("installment3_date").value = "";
            document.getElementById("installment4_date").value = "";
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(installment1_amount!="" && installment1_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!=""  && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number==2){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", true);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment3_amount").value = "";
            document.getElementById("installment4_amount").value = "";
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", true);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment3_date").value = "";
            document.getElementById("installment4_date").value = "";
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(installment1_amount!="" && installment1_date!="" && installment2_amount!="" && installment2_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number==3){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", true);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment4_amount").value = "";
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", true);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment4_date").value = "";
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(installment1_amount!="" && installment1_date!="" && installment2_amount!="" && installment2_date!="" && installment3_amount!="" && installment3_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if (installment_number==4){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", false);
            $('#installment5_amount').attr("readonly", true);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment5_amount").value = "";
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", true);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment5_date").value = "";
            document.getElementById("installment6_date").value = "";
            if(installment1_amount!="" && installment1_date!="" && installment2_amount!="" && installment2_date!="" && installment3_amount!="" && installment3_date!="" && installment4_amount!="" && installment4_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number==5){
            $('#installment1_amount').attr("readonly", false);
            $('#installment2_amount').attr("readonly", false);
            $('#installment3_amount').attr("readonly", false);
            $('#installment4_amount').attr("readonly", false);
            $('#installment5_amount').attr("readonly", false);
            $('#installment6_amount').attr("readonly", true);
            document.getElementById("installment6_amount").value = "";
            $('#installment1_date').attr("readonly", false);
            $('#installment2_date').attr("readonly", false);
            $('#installment3_date').attr("readonly", false);
            $('#installment4_date').attr("readonly", false);
            $('#installment5_date').attr("readonly", false);
            $('#installment6_date').attr("readonly", true);
            document.getElementById("installment6_date").value = "";
            if(installment1_amount!="" && installment1_date!="" && installment2_amount!="" && installment2_date!="" && installment3_amount!="" && installment3_date!="" && installment4_amount!="" && installment4_date!=""  && installment5_amount!="" && installment5_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value!=0 && calculator.value==0){
                $('#submit_button').attr("disabled", false);
            } else {
                $('#submit_button').attr("disabled", true);
            }
        } else if(installment_number==6) {
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
            if(installment1_amount!="" && installment1_date!="" && installment2_amount!="" && installment2_date!="" && installment3_amount!="" && installment3_date!="" && installment4_amount!="" && installment4_date!=""  && installment5_amount!="" && installment5_date!="" && installment6_amount!="" && installment6_date!="" && name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!="" && total_remaining_amount.value!=0 && calculator.value==0){
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