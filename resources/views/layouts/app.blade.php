<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--Styles -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/iconsfont.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link type="image/x-icon" href="{{ asset('storage/logo.ico') }}" rel="shortcut icon">

</head>
<body>
<div class="fixed_button"><a href="{{ route('orders.index') }}" class="btn btn-sm btn-warning">Оставьте заявку</a></div>
<div class="content">
    @include('inc.header')
    <main class="contentMain">
        @yield('content')
    </main>
</div>

<footer class="footer py-3 bg-light bg-dark">
    @include('inc.footer')
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/phoneMask.js') }}"></script>
@stack('script')
</body>
</html>
