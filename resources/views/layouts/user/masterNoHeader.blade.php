<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}

    <!-- CSS here -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user_resource/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/style_1.css') }}">
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet"/>
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
<div id="app">

    @yield('content')

</div>

<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('user_resource/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('user_resource/js/popper.min.js') }}"></script>
<script src="{{ asset('user_resource/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="{{ asset('user_resource/js/printThis.js') }}"></script>
{{--Scripts link to file or js custom--}}
<script>
    $(document).ready(function () {
        toastr.options.timeOut = 5000;
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>
@yield('scripts')
</body>
</html>
