@extends('layouts.master')
@section('content')
<div class="row my-3">
    <div class="col-12 d-flex justify-content-center">
        <form id="sms_send" method="post" action="{{ route('sms_send') }}">
            @csrf
            
            <button id="sms_send_button" class="btn btn-primary" type="submit">Gönder</button>
        </form>
    </div>
</div>
@endsection