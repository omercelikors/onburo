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
                    <div class="col-2">
                        <div>
                            <label>*Para Birimi:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input id="turkish_lira" type="radio" class="form-check-input" name="currency_unit">Türk
                                Lirası
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input id="dolar" type="radio" class="form-check-input" name="currency_unit">Dolar
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="debt_amount">*Ödenecek Miktar:</label>
                            <input type="number" class="form-control" id="debt_amount" name="debt_amount">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="paid_amount">*Ödenen Miktar:</label>
                            <input type="number" class="form-control" id="paid_amount" name="paid_amount">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="remaining_amount">Kalan Miktar:</label>
                            <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment_number">Taksit Sayısı:</label>
                            <select class="form-control" id="installment_number" name="installment_number">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment1_amount">Taksit-1 Miktarı:</label>
                            <input type="text" class="form-control" id="installment1_amount" name="installment1_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment1_date">Taksit-1 Tarihi:</label>
                            <input type="date" class="form-control" id="installment1_date" name="installment1_date" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment2_amount">Taksit-2 Miktarı:</label>
                            <input type="text" class="form-control" id="installment2_amount" name="installment2_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment2_date">Taksit-2 Tarihi:</label>
                            <input type="date" class="form-control" id="installment2_date" name="installment2_date" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment3_amount">Taksit-3 Miktarı:</label>
                            <input type="text" class="form-control" id="installment3_amount" name="installment3_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment3_date">Taksit-3 Tarihi:</label>
                            <input type="date" class="form-control" id="installment3_date" name="installment3_date" disabled>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment4_amount">Taksit-4 Miktarı:</label>
                            <input type="text" class="form-control" id="installment4_amount" name="installment4_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment4_date">Taksit-4 Tarihi:</label>
                            <input type="date" class="form-control" id="installment4_date" name="installment4_date" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment5_amount">Taksit-5 Miktarı:</label>
                            <input type="text" class="form-control" id="installment5_amount" name="installment5_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment5_date">Taksit-5 Tarihi:</label>
                            <input type="date" class="form-control" id="installment5_date" name="installment5_date" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment6_amount">Taksit-6 Miktarı:</label>
                            <input type="text" class="form-control" id="installment6_amount" name="installment6_amount" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="installment6_date">Taksit-6 Tarihi:</label>
                            <input type="date" class="form-control" id="installment6_date" name="installment6_date" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button id="submit_button" class="btn btn-primary" type="submit" disabled>Kaydet</button>
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
        remaining_amount=document.getElementById('remaining_amount');
        calculated_remaining=debt_amount-paid_amount;
        remaining_amount.value=calculated_remaining;
        if(name!="" && (turkish_lira.checked || dolar.checked) && debt_amount != "" && paid_amount!=""){
            $('#submit_button').attr("disabled", false);
        } else {
            $('#submit_button').attr("disabled", true);
        }
     }, 1000);

     setInterval(function(){ 
        installment_number=document.getElementById('installment_number').value;
        installment1_amount=document.getElementById('installment1_amount').value;
        installment2_amount=document.getElementById('installment2_amount').value;
        installment3_amount=document.getElementById('installment3_amount').value;
        installment4_amount=document.getElementById('installment4_amount').value;
        installment5_amount=document.getElementById('installment5_amount').value;
        installment6_amount=document.getElementById('installment6_amount').value;
        if(installment_number==""){
            $('#installment1_amount').attr("disabled", true);
            $('#installment2_amount').attr("disabled", true);
            $('#installment3_amount').attr("disabled", true);
            $('#installment4_amount').attr("disabled", true);
            $('#installment5_amount').attr("disabled", true);
            $('#installment6_amount').attr("disabled", true);
        }else if(installment_number==1){
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", true);
            $('#installment3_amount').attr("disabled", true);
            $('#installment4_amount').attr("disabled", true);
            $('#installment5_amount').attr("disabled", true);
            $('#installment6_amount').attr("disabled", true);
        } else if(installment_number==2){
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", false);
            $('#installment3_amount').attr("disabled", true);
            $('#installment4_amount').attr("disabled", true);
            $('#installment5_amount').attr("disabled", true);
            $('#installment6_amount').attr("disabled", true);
        } else if(installment_number==3){
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", false);
            $('#installment3_amount').attr("disabled", false);
            $('#installment4_amount').attr("disabled", true);
            $('#installment5_amount').attr("disabled", true);
            $('#installment6_amount').attr("disabled", true);
        } else if (installment_number==4){
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", false);
            $('#installment3_amount').attr("disabled", false);
            $('#installment4_amount').attr("disabled", false);
            $('#installment5_amount').attr("disabled", true);
            $('#installment6_amount').attr("disabled", true);
        } else if(installment_number==5){
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", false);
            $('#installment3_amount').attr("disabled", false);
            $('#installment4_amount').attr("disabled", false);
            $('#installment5_amount').attr("disabled", false);
            $('#installment6_amount').attr("disabled", true);
        } else {
            $('#installment1_amount').attr("disabled", false);
            $('#installment2_amount').attr("disabled", false);
            $('#installment3_amount').attr("disabled", false);
            $('#installment4_amount').attr("disabled", false);
            $('#installment5_amount').attr("disabled", false);
            $('#installment6_amount').attr("disabled", false);
        }
     }, 1000);
</script>
@endsection

@section('css')

@endsection