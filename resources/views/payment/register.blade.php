@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-3">
                        <div>
                            <label>Para Birimi:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="currency_unit_tl">Türk
                                Lirası
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="currency_unit_usd">Dolar
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="debt_amount">Ödenecek Miktar:</label>
                            <input type="text" class="form-control" id="debt_amount" name="debt_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="paid_amount">Ödenen Miktar:</label>
                            <input type="text" class="form-control" id="paid_amount" name="paid_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="remaining_amount">Kalan Miktar:</label>
                            <input type="text" class="form-control" id="remaining_amount" disabled name="remaining_amount">
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment1_amount">Taksit-1 Miktarı:</label>
                            <input type="text" class="form-control" id="installment1_amount" name="installment1_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment1_date">Taksit-1 Tarihi:</label>
                            <input type="date" class="form-control" id="installment1_date" name="installment1_date">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment2_amount">Taksit-2 Miktarı:</label>
                            <input type="text" class="form-control" id="installment2_amount" name="installment2_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment2_date">Taksit-2 Tarihi:</label>
                            <input type="date" class="form-control" id="installment2_date" name="installment2_date">
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment3_amount">Taksit-3 Miktarı:</label>
                            <input type="text" class="form-control" id="installment3_amount" name="installment3_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment3_date">Taksit-3 Tarihi:</label>
                            <input type="date" class="form-control" id="installment3_date" name="installment3_date">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment4_amount">Taksit-4 Miktarı:</label>
                            <input type="text" class="form-control" id="installment4_amount" name="installment4_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment4_date">Taksit-4 Tarihi:</label>
                            <input type="date" class="form-control" id="installment4_date" name="installment4_date">
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment5_amount">Taksit-5 Miktarı:</label>
                            <input type="text" class="form-control" id="installment5_amount" name="installment5_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment5_date">Taksit-5 Tarihi:</label>
                            <input type="date" class="form-control" id="installment5_date" name="installment5_date">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment6_amount">Taksit-6 Miktarı:</label>
                            <input type="text" class="form-control" id="installment6_amount" name="installment6_amount">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="installment6_date">Taksit-6 Tarihi:</label>
                            <input type="date" class="form-control" id="installment6_date" name="installment6_date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
{{-- disabled future dates for "birthdate field" --}}
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
@endsection

@section('css')
{{-- country dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection