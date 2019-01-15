@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="POST">
        <div class="card my-3">
            <div class="card-header">Öğrenci Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="name">*Adı:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="email">*E-posta Adresi:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="telephone">*Telefon:</label>
                            <input type="number" class="form-control" id="telephone">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="birthdate">*Doğum Tarihi:</label>
                            <input type="date" class="form-control" id="birthdate">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="classrooms">*Konuştuğu Diller:</label>
                            <select class="form-control" id="nationality">
                                <option></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="classrooms">Milliyet:</label>
                            <select class="form-control" id="nationality">
                                <option></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <label>*Kur Tipi:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">A1
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">A2
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">B1
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">B2
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">C1
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="course_type">C1+
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="classrooms">*Sınıflar:</label>
                            <select class="form-control" id="classrooms">
                                <option></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>*Kitap Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="book_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="book_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Not:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="2" id="note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment_modal">Ödeme</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header">Kişisel İletişim Dinamikleri</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div>
                            <label>Cinsiyet:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Erkek
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Kız
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Evlilik Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Evli
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Bekar
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Üniversiteye Gitme Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="university_department">Üniversite Bölümü:</label>
                            <input type="text" class="form-control" id="university_department">
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Yakın Üniversite Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="relative_university_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="relative_university_status">Hayır
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="relative_name">Yakın İsmi:</label>
                            <input type="text" class="form-control" id="relative_name">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="relative_telephone">Yakın Telefonu:</label>
                            <input type="number" class="form-control" id="relative_telephone">
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Çocuk Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="children_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="children_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="children_number">Çocuk Sayısı:</label>
                            <input type="number" class="form-control" id="children_number">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="children_age_range">Çocuk Yaş Aralığı:</label>
                            <select class="form-control" id="children_age_range">
                                <option></option>
                                <option>0-10 Yaş</option>
                                <option>10-20 Yaş</option>
                                <option>20-30 Yaş</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div>
                            <label>Online Ders Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="online_lesson_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="online_lesson_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Vatandaşlık İşlem Yardımı:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="citizenship_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="citizenship_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Ev Yardımı:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="home_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="home_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="heard_by">Duyduğu Yer:</label>
                            <input type="text" class="form-control" id="heard_by">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="demanded_education">Talep Edilen Eğitimler:</label>
                            <input type="text" class="form-control" id="demanded_education">
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
    <!-- The Payment Modal -->
    <div class="modal" id="payment_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ödeme</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <div>
                                <label>Para Birimi:</label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="currency_unit">Türk Lirası
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="currency_unit">Dolar
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="debt_amount">Ödenecek Miktar:</label>
                                <input type="text" class="form-control" id="debt_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="paid_amount">Ödenen Miktar:</label>
                                <input type="text" class="form-control" id="paid_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="remaining_amount">Kalan Miktar:</label>
                                <input type="text" class="form-control" id="remaining_amount" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                <input type="text" class="form-control" id="installment1_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment1_date">Taksit-1 Tarihi:</label>
                                <input type="date" class="form-control" id="installment1_date">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                <input type="text" class="form-control" id="installment2_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment2_date">Taksit-2 Tarihi:</label>
                                <input type="date" class="form-control" id="installment2_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                <input type="text" class="form-control" id="installment3_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment3_date">Taksit-3 Tarihi:</label>
                                <input type="date" class="form-control" id="installment3_date">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                <input type="text" class="form-control" id="installment4_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment4_date">Taksit-4 Tarihi:</label>
                                <input type="date" class="form-control" id="installment4_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                <input type="text" class="form-control" id="installment5_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment5_date">Taksit-5 Tarihi:</label>
                                <input type="date" class="form-control" id="installment5_date">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment6_amount">Taksit-6 Miktarı:</label>
                                <input type="text" class="form-control" id="installment6_amount">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="installment6_date">Taksit-6 Tarihi:</label>
                                <input type="date" class="form-control" id="installment6_date">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary">Ödemeyi Kaydet</button>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
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
    document.getElementById("birthdate").setAttribute("max", today);
    document.getElementById("installment1_date").setAttribute("min", today);
    document.getElementById("installment2_date").setAttribute("min", today);
    document.getElementById("installment3_date").setAttribute("min", today);
    document.getElementById("installment4_date").setAttribute("min", today);
    document.getElementById("installment5_date").setAttribute("min", today);
    document.getElementById("installment6_date").setAttribute("min", today);
</script>
@endsection