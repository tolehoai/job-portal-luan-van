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
    <link rel="stylesheet" href="{{ asset('user_resource/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user_resource/css/style.css') }}">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
<div id="app">
    @include('partial.user.header')

    @yield('content')

    @include('partial.user.footer')
</div>

{{--Scripts js common--}}

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('user_resource/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('user_resource/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('user_resource/js/popper.min.js') }}"></script>
<script src="{{ asset('user_resource/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('user_resource/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('user_resource/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user_resource/js/slick.min.js') }}"></script>
<script src="{{ asset('user_resource/js/price_rangs.js') }}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('user_resource/js/wow.min.js') }}"></script>
<script src="{{ asset('user_resource/js/animated.headline.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('user_resource/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('user_resource/js/contact.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.form.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user_resource/js/mail-script.js') }}"></script>
<script src="{{ asset('user_resource/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('user_resource/js/plugins.js') }}"></script>
<script src="{{ asset('user_resource/js/main.js') }}"></script>
{{--Scripts link to file or js custom--}}
@yield('scripts')
</body>
</html>
