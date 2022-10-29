<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('company_resource/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('company_resource/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('company_resource/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('company_resource/css/style.css')}}">
    <!-- endinject -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/admin_resource/vendors/mdtimepicker/mdtimepicker.css">
    <link rel="shortcut icon" href="http://www.urbanui.com/"/>
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
<div class="container-scroller">

    @include('partial.company.header')

    <div class="container-fluid page-body-wrapper">
        @include('partial.company.sidebar')

        @yield('content')

    </div>

</div>


<!-- plugins:js -->
<script src="{{asset('company_resource/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('company_resource/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('company_resource/js/off-canvas.js')}}"></script>
<script src="{{asset('company_resource/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('company_resource/js/misc.js')}}"></script>
<script src="{{asset('company_resource/js/settings.js')}}"></script>
<script src="{{asset('company_resource/js/todolist.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('admin_resource/vendors/mdtimepicker/mdtimepicker.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('company_resource/js/dashboard.js')}}"></script>
<!-- End custom js for this page-->
@yield('scripts')
</body>
</html>