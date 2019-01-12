@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('E-posta Adresini Doğrula') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Doğrulama linki e-posta adresinize gönderildi.') }}
                        </div>
                    @endif

                    {{ __('İlerlemeden önce e-postanızı kontrol ediniz.') }}
                    {{ __('Eğer e-posta almadıysanız') }}, <a href="{{ route('verification.resend') }}">{{ __('tekrar e-posta gönderilmesi için tıklayınız.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
