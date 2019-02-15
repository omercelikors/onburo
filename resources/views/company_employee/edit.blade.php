@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('company_employee_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="company_employee_id" value="{{ $company_employee->id }}">
        <div class="card my-3">
            <div class="card-header">Şirket Çalışanı Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-10 px-0 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" value="{{ $company_employee->name }}" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" value="{{ $company_employee->surname }}" id="surname" name="surname">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="e_mail">*E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" value="{{ $company_employee->e_mail }}" name="e_mail">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" value="{{ $company_employee->telephone }}"name="telephone">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="birthdate">*Doğum Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="birthdate" name="birthdate" autocomplete="off" value="{{ $company_employee->birthdate() }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="5" id="note" name="note">{{ $company_employee->note }}</textarea>
                                    </div>
                                </div>
                            </div>
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
{{-- date picker --}}
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#birthdate').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        maxDate: today
    });
</script>
@endsection

@section('css')

@endsection

@section('title', "Şirket Çalışanı Düzenle")