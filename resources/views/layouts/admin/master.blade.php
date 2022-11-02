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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {{--    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/mdtimepicker/mdtimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin_resource/images/favicon.svg') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet"/>
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="background: white">
            @include('partial.admin.header')
        </div>
    </div>
    <div class="row" style="height: 100vh;">
        <div class="col-2 m-0 p-0">
            @include('partial.admin.sidebar')
        </div>
        <div class="col-10 m-0 p-0">
            @yield('content')
        </div>
    </div>
    @include('partial.admin.footer')
</div>


{{--Scripts js common--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('admin_resource/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin_resource/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_resource/vendors/apexcharts/apexcharts.js') }}"></script>
{{--<script src="{{ asset('admin_resource/js/pages/dashboard.js') }}"></script>--}}
<script src="{{ asset('admin_resource/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="{{ asset('admin_resource/vendors/mdtimepicker/mdtimepicker.js') }}"></script>


{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

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
