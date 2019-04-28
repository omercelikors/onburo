@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('university-branch.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Üniversite Branş Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-11 px-0 my-3">
                        <div class="card-header">Üniversite Branş Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                                    <div class="form-group">
                                        <label for="name">*Üniversite Branş Adı:</label>
                                        <input type="text" class="form-control"
                                            oninput="this.value = this.value.toUpperCase()" id="name" name="name"
                                            required>
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
                <button id="submit_button" class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')

@endsection

@section('css')

@endsection
@section('title', "Üniversite Branş Kaydet")