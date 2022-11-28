@extends('layouts.user.master')

@section('title', 'Admin')

@section('style-libraries')

@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .landing-page {
            position: relative;
        }

        .banner1 {
            width: 350px !important;
            animation: MoveUpDown 10s linear infinite;
            position: absolute;

        }

        .pattern1 {
            width: 80px !important;
            animation: MoveUpDown1 15s linear infinite;
            position: absolute;

        }

        .banner2 {
            width: 350px !important;
            animation: MoveUpDown2 8s linear infinite;
            position: absolute;

        }

        .pattern2 {
            width: 80px !important;
            animation: MoveUpDown2 15s linear infinite;
            position: absolute;

        }

        @keyframes MoveUpDown {
            0%, 100% {
                top: 100px;
                right: 250px;
            }
            50% {
                top: 150px;
                right: 250px;
            }
        }

        @keyframes MoveUpDown2 {
            0%, 100% {
                top: 350px;
                right: 100px;
            }
            50% {
                top: 350px;
                right: 200px;
            }
        }

        .list {
            max-height: 200px;
            overflow-y: scroll !important;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .example {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }

        .list {
            max-height: 300px;
            overflow-y: scroll !important;
        }

        .nice-select,
        .nice-select.open .list {
            width: 100%;
            width: 325px;
            border-radius: 8px;
        }

        .nice-select .list::-webkit-scrollbar {
            width: 0
        }

        .nice-select .list {
            margin-top: 5px;
            top: 100%;
            border-top: 0;
            border-radius: 0 0 5px 5px;
            max-height: 200px;
            overflow-y: scroll;
            padding: 52px 0 0
        }

        .nice-select.has-multiple {
            white-space: inherit;
            height: auto;
            padding: 7px 12px;
            min-height: 53px;
            line-height: 22px
        }

        .nice-select.has-multiple span.current {
            border: 1px solid #CCC;
            background: #EEE;
            padding: 0 10px;
            border-radius: 3px;
            display: inline-block;
            line-height: 24px;
            font-size: 14px;
            margin-bottom: 3px;
            margin-right: 3px
        }

        .nice-select.has-multiple .multiple-options {
            display: block;
            line-height: 37px;
            margin-left: 30px;
            padding: 0
        }

        .nice-select .nice-select-search-box {
            box-sizing: border-box;
            position: absolute;
            width: 100%;
            margin-top: 5px;
            top: 100%;
            left: 0;
            z-index: 8;
            padding: 5px;
            background: #FFF;
            opacity: 0;
            pointer-events: none;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 0 0 1px rgba(68, 88, 112, .11);
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(.75) translateY(-21px);
            -ms-transform: scale(.75) translateY(-21px);
            transform: scale(.75) translateY(-21px);
            -webkit-transition: all .2s cubic-bezier(.5, 0, 0, 1.25), opacity .15s ease-out;
            transition: all .2s cubic-bezier(.5, 0, 0, 1.25), opacity .15s ease-out
        }

        .nice-select .nice-select-search {
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 7px 12px;
            margin: 0 10px 0 0;
            width: 100% !important;
            min-height: 36px;
            line-height: 22px;
            height: auto;
            outline: 0 !important
        }

        .nice-select.open .nice-select-search-box {
            opacity: 1;
            z-index: 10;
            pointer-events: auto;
            -webkit-transform: scale(1) translateY(0);
            -ms-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0)
        }

        .select2-container--material {
            width: 100% !important;
        }

        .select2-container--material .select2-selection--single {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            box-shadow: none;
            box-sizing: content-box;
            height: auto;
            margin: 0;
            outline: none;
            padding: 8px 0 5px 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container--material .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px;
            padding-left: 0;
        }

        .select2-container--material .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
        }

        .select2-container--material .select2-selection--single .select2-selection__placeholder {
            color: #999;
        }

        .select2-container--material .select2-selection--single .select2-selection__arrow {
            height: 26px;
            margin: 0.6rem 0 0.4rem 0;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }

        .select2-container--material .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }

        .select2-container--material[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left;
        }

        .select2-container--material[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            left: 1px;
            right: auto;
        }

        .select2-container--material.select2-container--disabled .select2-selection--single {
            background-color: #eee;
            cursor: default;
        }

        .select2-container--material.select2-container--disabled .select2-selection--single .select2-selection__clear {
            display: none;
        }

        .select2-container--material.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px;
        }

        .select2-container--material .select2-selection--multiple {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            box-shadow: none;
            box-sizing: content-box;
            cursor: text;
            height: auto;
            margin: 0;
            outline: none;
            padding: 5px 0 0 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__rendered {
            box-sizing: border-box;
            list-style: none;
            margin: 0;
            padding: 0 5px;
            width: 100%;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__rendered li {
            list-style: none;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__placeholder {
            color: #999;
            margin-top: 5px;
            float: left;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-top: 5px;
            margin-right: 10px;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__choice {
            background-color: #ffca28;
            border-radius: 16px;
            color: rgba(0, 0, 0, 0.6);
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 6px;
            padding: 0 12px;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__choice__remove {
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .select2-container--material .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #333;
        }

        .select2-container--material[dir="rtl"] .select2-selection--multiple .select2-selection__choice, .select2-container--material[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder, .select2-container--material[dir="rtl"] .select2-selection--multiple .select2-search--inline {
            float: right;
        }

        .select2-container--material[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto;
        }

        .select2-container--material[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto;
        }

        .select2-container--material.select2-container--disabled .select2-selection--multiple {
            background-color: #eee;
            cursor: default;
        }

        .select2-container--material.select2-container--disabled .select2-selection__choice__remove {
            display: none;
        }

        .select2-container--material.select2-container--open.select2-container--above .select2-selection--single, .select2-container--material.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .select2-container--material.select2-container--open.select2-container--below .select2-selection--single, .select2-container--material.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .select2-container--material.select2-container--focus .select2-selection--single {
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            outline: 0;
        }

        .select2-container--material.select2-container--focus .select2-selection--multiple {
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            outline: 0;
        }

        .select2-container--material .select2-search--dropdown .select2-search__field {
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            outline: none;
        }

        .select2-container--material .select2-search--dropdown .select2-search__field:focus:not([readonly]) {
            box-shadow: 0 1px 0 0 #ced4da;
            border-bottom: 1px solid #ced4da;
        }

        .select2-container--material .select2-search--inline .select2-search__field {
            background: transparent;
            border: none !important;
            outline: 0;
            box-shadow: none !important;
            -webkit-appearance: textfield;
        }

        .select2-container--material .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto;
        }

        .select2-container--material .select2-results__option[role=group] {
            padding: 0;
        }

        .select2-container--material .select2-results__option[aria-disabled=true] {
            color: #999;
        }

        .select2-container--material .select2-results__option[aria-selected=true] {
            background-color: #ddd;
        }

        .select2-container--material .select2-results__option .select2-results__option {
            padding-left: 1em;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__group {
            padding-left: 0;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -1em;
            padding-left: 2em;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -2em;
            padding-left: 3em;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3em;
            padding-left: 4em;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -4em;
            padding-left: 5em;
        }

        .select2-container--material .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -5em;
            padding-left: 6em;
        }

        .select2-container--material .select2-results__option--highlighted[aria-selected] {
            background-color: #3f729b;
            color: white;
        }

        .select2-container--material .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px;
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            z-index: 1051;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .select2-results {
            display: block;
        }

        .select2-results__options {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .select2-results__option {
            padding: 6px;
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-results__option[aria-selected] {
            cursor: pointer;
        }

        .select2-container--open .select2-dropdown {
            left: 0;
        }

        .select2-container--open .select2-dropdown--above {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            min-width: 190px !important;
        }

        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            min-width: 190px !important;
        }

        .select2-search--dropdown {
            display: block;
            padding: 4px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .select2-search--dropdown .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        .select2-search--dropdown.select2-search--hide {
            display: none;
        }

        .nice-select .list {
            margin-top: 5px;
            top: 100%;
            border-top: 0;
            border-radius: 0 0 5px 5px;
            max-height: 300px;
            max-width: 200px;
            overflow-y: scroll;
            padding: 52px 0 0
        }


    </style>
@stop

@section('content')
    <div id="main">
        <main>

            <!-- slider Area Start-->
            <div class="slider-area ">
                <!-- Mobile Menu -->
                <div class="slider-active">
                    <div class="single-slider slider-height d-flex align-items-center landing-page"
                         data-background="{{ asset('user_resource/img/hero/h1_hero.png') }}"
                         style="height: 1000px !important;"
                    >
                        <img src="{{ asset('user_resource/img/banner1.png')}}" class="banner1">
                        <img src="{{ asset('user_resource/img/pattern.png')}}" class="pattern1">
                        <img src="{{ asset('user_resource/img/banner2.png')}}" class="banner2">
                        <img src="{{ asset('user_resource/img/pattern2.png')}}" class="pattern2">

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-9 col-md-10">
                                    <div class="hero__caption">
                                        <h1>Tìm kiếm công việc ngay bây giờ</h1>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Box -->
                            <div class="row">
                                <div class="col-xl-8">
                                    <!-- form -->
                                    <form action="{{route('jobs')}}" method="GET" class="search-box" id="searchJobForm" style="background-color: white !important;">
                                        <div class="input-form">
                                            <input type="text" name="filter[name]"
                                                   value="{{request()->get('filter')['name'] ?? ''}}"
                                                   placeholder="Tên công việc hoặc công ty">
                                        </div>
                                        <div class="select-form d-flex justify-content-center align-items-center">
                                            <div class="select-itms">
                                                <select id="cityList" name="filter[city]">
                                                    <option value="">Tất cả thành phố</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="search-form">
                                            <a id="btnSearchJob" style="cursor:pointer;">Tìm việc</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider Area End-->
            <!-- Our Services Start -->
            <div class="our-services section-pad-t30">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <h2>Danh mục công việc</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-contnet-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-tour"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Human Resources (HR)</a></h5>
                                    <span>(653)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-cms"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Design & Development</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-report"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Data Analyst & Data Science</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-app"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Mobile Application</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-helmet"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">DevOps</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-high-tech"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Artificial Intelligence (AI)</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-real-estate"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">IoT & BigData</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-content"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Tester</a></h5>
                                    <span>(658)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- More Btn -->
                    <!-- Section Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="browse-btn2 text-center mt-50">
                                <a href="{{route('jobs')}}" class="border-btn2">Tất cả danh mục</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
            <!-- Online CV Area Start -->
            <div class="online-cv cv-bg section-overly pt-90 pb-120"
                 data-background="{{ asset('user_resource/img/gallery/cv_bg.jpg') }}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="cv-caption text-center">
                                <p class="pera2">Tạo và quản lý CV</p>
                                <a href="{{route('user')}}" class="border-btn2 border-btn4">Tạo CV ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Online CV Area End-->
            <!-- Featured_job_start -->
            <section class="featured-job-area feature-padding">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <h2>Công việc Hot</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <!-- single-job-content -->
                            @foreach($jobs as $job)
                                <a href="{{route('job.detail', $job->id)}}">
                                    <div class="single-job-items mb-30">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <img
                                                <img
                                                    src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                                    alt=""
                                                    style="width:102px">
                                            </div>
                                            <div class="job-tittle">

                                                <h4>{{$job->title}}</h4>
                                                <span>{{$job->company->name}}</span>
                                                <ul>
                                                    <!-- <li>NFQ Asia</li> -->
                                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->company->address}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link f-right">
                                            Full Time
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Featured_job_end -->
            <!-- How  Apply Process Start-->
            <div class="apply-process-area apply-bg pt-150 pb-150"
                 data-background="{{ asset('user_resource/img/gallery/how-applybg.png') }}">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle white-text text-center">
                                <span>Quy trình</span>
                                <h2>Hoạt động như thế nào</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Apply Process Caption -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-search"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>1. Tìm kiếm công việc</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                        laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-curriculum-vitae"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>2. Ứng tuyển</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                        laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-tour"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>3. Phỏng vấn</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                        laborea.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- How  Apply Process End-->
            <!-- Testimonial Start -->
            <div class="testimonial-area testimonial-padding">
                <div class="container">
                    <!-- Testimonial contents -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-10">
                            <div class="h1-testimonial-active dot-style">
                                <!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-caption ">
                                        <!-- founder -->
                                        <div class="testimonial-founder  ">
                                            <div class="founder-img mb-30">
                                                <img
                                                    src="{{ asset('user_resource/img/testmonial/testimonial-founder.png') }}"
                                                    alt="">
                                                <span>Margaret Lawson</span>
                                                <p>Creative Director</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-top-cap">
                                            <p>“I am at an age where I just want to be fit and healthy our bodies are
                                                our
                                                responsibility! So start caring for your body and it will care for you.
                                                Eat
                                                clean it will care for you and workout hard.”</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-caption ">
                                        <!-- founder -->
                                        <div class="testimonial-founder  ">
                                            <div class="founder-img mb-30">
                                                <img
                                                    src="{{ asset('user_resource/img/testmonial/testimonial-founder.png') }}"
                                                    alt="">
                                                <span>Margaret Lawson</span>
                                                <p>Creative Director</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-top-cap">
                                            <p>“I am at an age where I just want to be fit and healthy our bodies are
                                                our
                                                responsibility! So start caring for your body and it will care for you.
                                                Eat
                                                clean it will care for you and workout hard.”</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-caption ">
                                        <!-- founder -->
                                        <div class="testimonial-founder  ">
                                            <div class="founder-img mb-30">
                                                <img
                                                    src="{{ asset('user_resource/img/testmonial/testimonial-founder.png') }}"
                                                    alt="">
                                                <span>Margaret Lawson</span>
                                                <p>Creative Director</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-top-cap">
                                            <p>“I am at an age where I just want to be fit and healthy our bodies are
                                                our
                                                responsibility! So start caring for your body and it will care for you.
                                                Eat
                                                clean it will care for you and workout hard.”</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
            <!-- Support Company Start-->
            <div class="support-company-area support-padding fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="right-caption">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle2">
                                    <span>What we are doing</span>
                                    <h2>24k Talented people are getting Jobs</h2>
                                </div>
                                <div class="support-caption">
                                    <p class="pera-top">Mollit anim laborum duis au dolor in voluptate velit ess cillum
                                        dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit
                                        cillum.</p>
                                    <p>Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore
                                        eu
                                        quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt
                                        mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.</p>
                                    <a href="about.html" class="btn post-btn">Post a job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="support-location-img">
                                <img src="{{ asset('user_resource/img/service/support-img.jpg') }}assets/" alt="">
                                <div class="support-img-cap text-center">
                                    <p>Since</p>
                                    <span>1994</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Support Company End-->
            <!-- Blog Area Start -->
            <div class="home-blog-area blog-h-padding">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <span>Our latest blog</span>
                                <h2>Our recent news</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="home-blog-single mb-30">
                                <div class="blog-img-cap">
                                    <div class="blog-img">
                                        <img src="{{ asset('user_resource/img/blog/home-blog1.jpg') }}assets/" alt="">
                                        <!-- Blog date -->
                                        <div class="blog-date text-center">
                                            <span>24</span>
                                            <p>Now</p>
                                        </div>
                                    </div>
                                    <div class="blog-cap">
                                        <p>| Properties</p>
                                        <h3><a href="single-blog.html">Footprints in Time is perfect House in
                                                Kurashiki</a>
                                        </h3>
                                        <a href="#" class="more-btn">Read more »</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="home-blog-single mb-30">
                                <div class="blog-img-cap">
                                    <div class="blog-img">
                                        <img src="{{ asset('user_resource/img/blog/home-blog2.jpg') }}assets/" alt="">
                                        <!-- Blog date -->
                                        <div class="blog-date text-center">
                                            <span>24</span>
                                            <p>Now</p>
                                        </div>
                                    </div>
                                    <div class="blog-cap">
                                        <p>| Properties</p>
                                        <h3><a href="single-blog.html">Footprints in Time is perfect House in
                                                Kurashiki</a>
                                        </h3>
                                        <a href="#" class="more-btn">Read more »</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Area End -->

        </main>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            // $('#cityList').select2();
            // $('#cityList').niceSelect();
            $('#btnSearchJob').click(function () {
                $('#searchJobForm').submit();
            })
            $('#cityList').select2({
                theme: "material"
            });
        });
    </script>
@stop



