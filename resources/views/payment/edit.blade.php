@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('payment_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="name">Adı:</label>
                            <input type="text" class="form-control" value="{{ $student_name }}" id="name" name="name"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-8">
                        <legend style="width:12%;">Borç Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div>
                                    <label>*Para Birimi:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="turkish_lira" type="radio" class="form-check-input" @if($payment->currency_unit=="Türk
                                        Lirası") checked @endif value="Türk Lirası" name="currency_unit">Türk
                                        Lirası
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="dolar" type="radio" class="form-check-input" @if($payment->currency_unit=="Dolar")
                                        checked @endif value="Dolar" name="currency_unit">Dolar
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="debt_amount">*Borç Miktarı:</label>
                                    <input type="number" class="form-control" id="debt_amount" value="{{ $payment->debt_amount }}"
                                        name="debt_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="paid_amount">*Ödenen Miktar:</label>
                                    <input type="number" class="form-control" id="paid_amount" value="{{ $payment->paid_amount }}"
                                        name="paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="total_remaining_amount">Toplam Kalan Miktar:</label>
                                    <input type="number" class="form-control" id="remaining_amount" value="{{ $payment->total_remaining_amount }}"
                                        name="total_remaining_amount" readonly>
                                </div>
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
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-1 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment1_amount" value="{{ $payment->installment1_amount }}"
                                        name="installment1_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_paid_amount">Taksit-1 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment1_paid_amount" value="{{ $payment->installment1_paid_amount }}"
                                        name="installment1_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_remaining_amount">Taksit-1 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment1_remaining_amount" value="{{ $payment->installment1_remaining_amount }}"
                                        name="installment1_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_date">Taksit-1 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment1_date" value="{{ $payment->date_format_2(1) }}"
                                        name="installment1_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-2 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment2_amount" value="{{ $payment->installment2_amount }}"
                                        name="installment2_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_paid_amount">Taksit-2 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment2_paid_amount" value="{{ $payment->installment2_paid_amount }}"
                                        name="installment2_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_remaining_amount">Taksit-2 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment2_remaining_amount" value="{{ $payment->installment2_remaining_amount }}"
                                        name="installment2_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_date">Taksit-2 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment2_date" value="{{ $payment->date_format_2(2) }}"
                                        name="installment2_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-3 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment3_amount" value="{{ $payment->installment3_amount }}"
                                        name="installment3_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment3_paid_amount">Taksit-3 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment3_paid_amount" value="{{ $payment->installment3_paid_amount }}"
                                        name="installment3_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment3_remaining_amount">Taksit-3 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment3_remaining_amount" value="{{ $payment->installment3_remaining_amount }}"
                                        name="installment3_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_date">Taksit-3 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment3_date" value="{{ $payment->date_format_2(3) }}"
                                        name="installment3_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-4 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment4_amount" value="{{ $payment->installment2_amount }}"
                                        name="installment4_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_paid_amount">Taksit-4 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment4_paid_amount" value="{{ $payment->installment4_paid_amount }}"
                                        name="installment4_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_remaining_amount">Taksit-4 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment4_remaining_amount" value="{{ $payment->installment4_remaining_amount }}"
                                        name="installment4_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_date">Taksit-4 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment4_date" value="{{ $payment->date_format_2(4) }}"
                                        name="installment4_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-5 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment5_amount" value="{{ $payment->installment5_amount }}"
                                        name="installment5_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_paid_amount">Taksit-5 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment5_paid_amount" value="{{ $payment->installment5_paid_amount }}"
                                        name="installment5_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment5_remaining_amount">Taksit-5 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment5_remaining_amount" value="{{ $payment->installment5_remaining_amount }}"
                                        name="installment5_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment5_date">Taksit-5 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment5_date" value="{{ $payment->date_format_2(5) }}"
                                        name="installment5_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Taksit-6 Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_amount">Taksit-6 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment6_amount" value="{{ $payment->installment6_amount }}"
                                        name="installment6_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_paid_amount">Taksit-6 Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="installment6_paid_amount" value="{{ $payment->installment6_paid_amount }}"
                                        name="installment6_paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_remaining_amount">Taksit-6 Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="installment6_remaining_amount" value="{{ $payment->installment6_remaining_amount }}"
                                        name="installment6_remaining_amount" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_date">Taksit-6 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment6_date" value="{{ $payment->date_format_2(6) }}"
                                        name="installment6_date" readonly>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div>
                            <label>Not:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="2" id="note" name="note">{{ $payment->note }}</textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <fieldset>
                            <legend>Kalan Taksit Miktarı Hesaplama</legend>
                            Kalan Taksit Miktarı: <input id="calculator" type="number" disabled>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button id="submit_button" class="btn btn-primary" type="submit" disabled>Düzenle</button>
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
            if (document.getElementById("installment_number").options[i].value ==
                "{{ $payment->installment_number }}") {
                document.getElementById("installment_number").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
@endsection