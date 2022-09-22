<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_resource/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin_resource/images/favicon.svg') }}" type="image/x-icon">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
<div id="app">
    @include('partial.admin.header')

    @yield('content')

    @include('partial.admin.footer')
</div>

{{--Scripts js common--}}
<script src="{{ asset('admin_resource/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin_resource/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_resource/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('admin_resource/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('admin_resource/js/main.js') }}"></script>
{{--Scripts link to file or js custom--}}
@yield('scripts')
</body>
</html>
