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
    <link rel="stylesheet" href="{{ asset('user_resource/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet"/>
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet"/>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="{{ asset('user_resource/js/jquery.slicknav.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

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
<script src="{{ asset('user_resource/js/printThis.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('user_resource/js/plugins.js') }}"></script>
<script src="{{ asset('user_resource/js/main.js') }}"></script>
{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
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
