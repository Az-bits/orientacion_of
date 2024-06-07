<!DOCTYPE html>
<html class="no-js" lang="es_ES">

<head>
    <title>Orientacion Vocacional</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link href="{{ asset('/plantilla-test/assets/images/logo/ov-logo.ico') }}" rel="icon">
    <link rel="shortcut icon" href="{{ asset('/plantilla-test/assets/images/logo/ov-logo.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/responsive.min.css') }}" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/global.styles.css') }}">
</head>

<body class="landing-page" data-mobile-nav-style="classic">
    @include('frontend.template.header')
    <script type="text/javascript" src="{{ asset('assets/main/js/jquery.js') }}"></script>

    @yield('content')


    @include('frontend.template.footer')

    @if ($page !== 'admin-test')
        <script src="{{ asset('material-dashboard/assets/js/plugins/jquery.validate.min.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script> --}}
        <script src="{{ asset('frontend/js/global.scripts.js') }}"></script>
        @if ($page !== 'resultado')
            <script src="{{ asset('frontend/js/particleInit.js') }}"></script>
        @endif
    @endif
    <script src="{{ asset('material-dashboard/assets/js/plugins/sweetalert.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/main/js/vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/main/js/main.js') }}"></script>

    @if ($page && $page !== 'resultado')
        {{-- @vite('public/backend/js/' . $page . '/index.js') --}}
        <script src="{{ asset('frontend/js/' . $page . '.js') }}" type="module"></script>
    @endif
</body>

</html>
