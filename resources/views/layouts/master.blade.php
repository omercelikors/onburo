<!DOCTYPE html>
<html>

<head>
    {{--
    <link rel="shortcut icon" href="{{ asset('css/img/logo.png') }}"> --}}
    <title>@yield('title')</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta charset="utf-8">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('author')">
    <meta name="keywords" content="@yield('keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('css')
    {{-- root css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-sliders-h"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                @role('recorder')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">ÖĞRENCİ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher_info_show') }}">ÖĞRETMEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('candidate_student_info_show') }}">ADAY ÖĞRENCİ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company_employee_info_show') }}">ŞİRKET ÇALIŞANI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SINIF</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payment_info_show') }}">ÖDEME</a>
                </li>
                @endrole
                @role('admin|recorder')
                <li class="nav-item">
                    <a class="nav-link" href="#">BİLGİ VE ANALİZ</a>
                </li>
                @endrole
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu p-0">
                        <a class="btn text-dark py-0 pl-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{
                            __('ÇIKIŞ') }}</a>
                    </div>
                </li>
            </ul>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
    @yield('content')
    {{-- root js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
