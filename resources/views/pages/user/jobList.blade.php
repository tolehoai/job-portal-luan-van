@extends('layouts.user.master') @section('title', 'Admin') @section('style-libraries') @stop @section('styles')
    {{--custom css item suggest search--}}
    <style>
        .banner-hero.banner-single {
            padding: 40px 20px 60px 20px;
            background: #F2F6FD;
            border-radius: 16px;
            position: relative;
            height: 500px;
        }

        .banner-hero.banner-single::before {
            content: "";
            position: absolute;
            bottom: 10px;
            left: -3px;
            height: 170px;
            width: 218px;
            background: url('http://wp.alithemes.com/html/jobbox/demos/assets/imgs/page/job-single/left-job-head.svg') no-repeat left bottom;
            background-size: contain;
            display: inline;
            top: auto;
            right: auto;
        }

        .banner-hero.banner-single::after {
            content: "";
            position: absolute;
            bottom: 10px;
            right: 5px;
            height: 170px;
            width: 213px;
            background: url('http://wp.alithemes.com/html/jobbox/demos/assets/imgs/page/job-single/right-job-head.svg') no-repeat left bottom;
            background-size: contain;
        }

        h3 {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 28px;
            line-height: 35px;
            color: #05264E;
        }

        .banner-hero .block-banner .form-find {
            background: #ffffff;
            box-shadow: 0px 18px 40px rgb(25 15 9 / 10%);
            border-radius: 8px;
            display: inline-block;
            width: 50%;
        }

        .banner-hero .block-banner .form-find form {
            display: flex;
            width: 100%;
        }

        .banner-hero .block-banner .form-find .box-industry {
            width: 100%;
            max-width: 180px;
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
            max-height: 210px;
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
        }

        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
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
    </style>
@stop @section('content')

    <div class="job-listing-areapb-120 mx-5">
        <div class="container-fluid">
            {{--            Header--}}
            <div class="banner-hero banner-single banner-single-bg px-2 mb-5">
                <div class="block-banner text-center">
                    <h3 class="wow animate__ animate__fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <span class="color-brand-2" style="color: #fb246a;">{{$jobs->total()}} Jobs</span> Available Now
                    </h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__ animate__fadeInUp animated"
                         data-wow-delay=".1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni, <br
                                class="d-none d-xl-block">atque delectus molestias quis?
                    </div>

                    <div class="form-find text-start mt-40 wow animate__ animate__fadeInUp animated"
                         data-wow-delay=".2s"
                         style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; width: 900px !important;">
                        <form action="{{route('jobs')}}" method="GET" class="search-box" id="searchJobForm">
                            <div class="input-form" style="width:450px !important;">
                                <input type="text" name="filter[name]" placeholder="Tên công việc hoặc công ty"
                                       value="{{request()->get('filter')['name'] ?? ''}}"
                                       tabindex="0">
                            </div>
                            <div class="select-form d-flex align-items-center" style="width: auto !important;">
                                <select id="city" name="filter[city]">
                                    <option value="">Chọn thành phố</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}"
                                        >{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="search-form">
                                <a id="btnSearchJob" style="cursor:pointer;" tabindex="0">Tìm việc</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--            End Header--}}

            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                              d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"></path>
                                    </svg>
                                </div>
                                <h4>Lọc công việc</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <form action="{{route('jobs')}}" method="GET" class="search-box" id="searchJobForm">
                        <div class="job-category-listing mb-50 w-100">
                            <!-- single one -->
                            <div class="single-listing">

                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Loại công việc</h4>
                                    </div>
                                    @foreach($jobTypes as $jobType)
                                        <label class="container">{{$jobType->name}}
                                            <input type="checkbox" name="filter[job_type_id][]"
                                                   value="{{$jobType->id}}"
                                            >
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Nơi làm việc</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select id="cityFilter" name="filter[city]">
                                        <option value="">Chọn thành phố</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                            >{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="small-section-tittle2 pt-80">
                                    <h4>Công nghệ</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select id="technologyFilter" name="filter[technology_id]">
                                        <option value="">Chọn công nghệ</option>
                                        @foreach($technologies as $technology)
                                            <option value="{{$technology->id}}"
                                            >{{$technology->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!--  Select job items End-->
                                <div class="small-section-tittle2 pt-80">
                                    <h4>Mức lương</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select id="technologyFilter" name="filter[salary]">
                                        <option value="">Chọn mức lương</option>
                                        <option value="0,5000000">Dưới 5 triệu</option>
                                        <option value="5000000,10000000">Từ 5-10 triệu</option>
                                        <option value="10000000,15000000">Từ 10-20 triệu</option>
                                        <option value="20000000,40000000">Từ 20-40 triệu</option>
                                        <option value="40000000,max">Trên 40 triệu</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="search-form d-flex justify-content-between w-100">
                            <button type="submit" id="btnFilterJob"
                                    class="btn btn-primary text-center mx-auto mb-30 mt-0"
                                    style="cursor:pointer;" tabindex="0">Tìm việc
                            </button>
                        </div>
                    </form>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35 mt-5>
                                        <span>{{$jobs->total()}} công việc được tìm thấy</span>
                                        <!-- Select job items start -->
                                        <div class=" select-job-items
                                    ">
                                    <span>Sort by</span>
                                    <select name="select" style="display: none;">
                                        <option value="">None</option>
                                        <option value="">job list</option>
                                        <option value="">job list</option>
                                        <option value="">job list</option>
                                    </select>
                                    <div class="nice-select" tabindex="0"><span class="current">None</span>
                                        <ul class="list">
                                            <li data-value="" class="option selected focus">None</li>
                                            <li data-value="" class="option">job list</li>
                                            <li data-value="" class="option">job list</li>
                                            <li data-value="" class="option">job list</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--  Select job items End-->
                            </div>
                        </div>
                </div>
                <!-- Count of Job list End -->
                <!-- single-job-content -->
                @foreach ($jobs as $job)
                    <div class="single-job-items mb-30">
                        <a href="{{route('job.detail', $job->id)}}">
                            <div class="job-items row">
                                <div class="col-2">
                                    <div class="company-img">
                                        <img
                                                src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                                alt=""
                                                style="width: 100px;"
                                        >
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="job-tittle job-tittle2">
                                                    <span>
                                                        <h4>{{$job->title}}</h4>
                                                    </span>
                                        <ul>
                                            <li>
                                                {{$job->technology->name}}
                                            </li>
                                        </ul>
                                        <span class="text-gray"><i
                                                    class="fas fa-map-marker-alt text-gray"></i></span>
                                        @foreach ($job->city as $city)
                                            <p class="d-inline-block">{{$city->name}}@if (!$loop->last)
                                                    ,
                                                @endif </p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-column align-items-end">
                                    <div class="items-link items-link2 f-right">
                                        <button type="button"
                                                class="genric-btn primary circle arrow mb-2"
                                                style="background: #8b92dd">{{$job->jobLevel->name}}</button>
                                    </div>
                                    <b>
                                        <x-money amount="{{$job->salary}}" currency="VND"/>
                                    </b>
                                    <div>{{$job->jobType->name}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            </section>
            {!! $jobs->withQueryString()->links() !!}
            <!-- Featured_job_end -->
        </div>
    </div>
    </div>
    </div>

@stop @section('scripts')
    <script>
        $(document).ready(function () {
            $('#btnSearchJob').click(function () {
                $('#searchJobForm').submit();
            })
            $('#city').select2({
                theme: "material"
            });
            $('#cityFilter').select2({
                theme: "material"
            });
            $('#technologyFilter').select2({
                theme: "material"
            });
        })
    </script>

@stop