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
    {{-- root css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- date time picker css --}}
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
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
                @role('recorder|admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ÖĞRENCİ</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('home') }}">ÖĞRENCİ</a>
                        <a class="dropdown-item" href="{{ route('student_other1_show') }}">ÖĞR.EKSTRA-1</a>
                        <a class="dropdown-item" href="{{ route('student_other2_show') }}">ÖĞR.EKSTRA-2</a>
                        <a class="dropdown-item" href="{{ route('student_other3_show') }}">ÖĞR.EKSTRA-3</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher_info_show') }}">ÖĞRETMEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('classroom_info_show') }}">SINIF</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payment_info_show') }}">ÖDEME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('polling_paper_show') }}">YOKLAMA KAĞIDI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sms_send_show') }}">SMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('agency_info_show') }}">ACENTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('candidate_student_info_show') }}">ADAY ÖĞRENCİ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company_employee_info_show') }}">ŞİRKET ÇALIŞANI</a>
                </li>
                @endrole
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all_analysis_show') }}">BİLGİ VE ANALİZ</a>
                </li>
                @endrole
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu exit_item p-0">
                        <a class="btn py-0 pl-1" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    {{-- date time picker js --}}
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js"type="text/javascript"></script>
    <script src="{{ asset('js/extensions/messages.tr-tr.min.js') }}"></script>
    @yield('js')
</body>

</html>
