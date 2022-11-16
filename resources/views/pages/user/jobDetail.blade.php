@extends('layouts.user.master') @section('title', 'Admin') @section('style-libraries') @stop @section('styles')
    {{--custom css item suggest search--}}
    <style>
        .box-border-single {
            padding: 20px;
            display: inline-block;
            width: 100%;
            border: 1px solid #E0E6F7;
            border-radius: 8px;
        }

        .sidebar-border, .sidebar-shadow {
            border: 1px solid #E0E6F7;
            padding: 25px;
            border-radius: 8px;
            background-color: #ffffff;
            margin-bottom: 40px;
        }

        .job-overview {
            border: thin solid #E0E6F7;
            border-radius: 8px;
            padding: 20px 30px 30px 30px;
            margin-bottom: 50px;
        }

        .content-single p {
            font-size: 16px;
            line-height: 200%;
            color: #4F5E64;
            line-height: 32px;
            margin-bottom: 20px;
        }

        .content-single ul {
            padding-left: 30px;
        }

        .content-single ul li {
            font-size: 16px;
            line-height: 200%;
            color: #4F5E64;
            line-height: 32px;
            list-style-type: disc;
        }

        .sidebar-border .sidebar-heading .avatar-sidebar figure img, .sidebar-shadow .sidebar-heading .avatar-sidebar figure img {
            width: 85px;
            height: 85px;
            border-radius: 16px;
        }

        .sidebar-border .sidebar-heading, .sidebar-shadow .sidebar-heading {
            display: inline-block;
            width: 100%;
        }

        .sidebar-border .sidebar-heading .avatar-sidebar .sidebar-info, .sidebar-shadow .sidebar-heading .avatar-sidebar .sidebar-info {
        }

        .sidebar-border .sidebar-heading .avatar-sidebar .sidebar-info .sidebar-company, .sidebar-shadow .sidebar-heading .avatar-sidebar .sidebar-info .sidebar-company {
            font-size: 18px;
            font-family: "Plus Jakarta Sans", sans-serif;
            line-height: 18px;
            font-weight: bold;
            display: block;
            padding-top: 5px;
        }

        .link-underline {
            font-size: 12px;
            line-height: 18px;
            color: #05264E;
            font-weight: 400;
            text-decoration: underline;
            display: block;
        }

        .sidebar-list-job {
            border-top: 1px solid rgba(6, 18, 36, 0.1);
            display: inline-block;
            width: 100%;
            padding: 25px 0px 0px 0px;
            margin: 20px 0px 0px 0px;
        }

        .sidebar-list-job ul li {
            display: inline-block;
            width: 100%;
            padding-bottom: 20px;
        }

        .card-list-4 {
            position: relative;
            display: flex;
            width: 100%;
            padding: 0px 0px 15px 0px;
            margin-bottom: 0px;
            border-bottom: 1px solid #E0E6F7;
        }

        .hover-up {
            transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
        }

        .card-list-4 .image {
            min-width: 60px;
            padding-right: 10px;
        }

        a, button, img, input, span, h4 {
            transition: all 0.3s ease 0s;
        }

        .card-list-4 .info-text {
            width: 100%;
            margin-top: -4px;
        }

        .color-brand-1 {
            color: #05264E !important;
        }

        .font-bold {
            font-weight: bold;
        }

        .font-md {
            font-size: 16px !important;
            line-height: 24px !important;
        }


        .card-list-4 .card-price {
            font-size: 16px;
            line-height: 26px;
            padding-top: 0px;
            display: inline-block;
            color: #3C65F5;
        }


        .card-list-4 .card-price span {
            font-size: 12px;
            line-height: 12px;
            color: #4F5E64;
            font-weight: 500;
        }


        .card-list-4 .card-price {
            font-size: 16px;
            line-height: 26px;
            padding-top: 0px;
            display: inline-block;
            color: #3C65F5;
        }

        .card-grid-2 {
            border-radius: 8px;
            border: 1px solid #E0E6F7;
            overflow: hidden;
            margin-bottom: 24px;
            margin-top: 24px;
            position: relative;
            background: #F8FAFF;
        }

        .hover-up {
            transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
        }

        .card-grid-2 .card-grid-2-image-left {
            padding: 30px 20px 15px 20px;
            display: flex;
            position: relative;
        }

        .card-grid-2 .card-grid-2-image-left .image-box {
            min-width: 52px;
            padding-right: 15px;
        }

        .card-grid-2 .card-grid-2-image-left .right-info .name-job {
            font-size: 18px;
            line-height: 26px;
            color: #05264E;
            font-weight: bold;
            display: block;
        }

        .card-grid-2 .card-grid-2-image-left .right-info .location-small {
            display: inline-block;
            font-size: 12px;
            color: #A0ABB8;
        }

        .content-page .card-grid-2 .card-block-info {
            padding: 0px 20px 30px 20px;
            position: relative;
        }

        .btn-apply-now {
            background-color: #E0E6F7;
            color: #3C65F5;
            padding: 12px 10px;
            min-width: 95px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: capitalize;
        }

        .btn-grey-small {
            background-color: #EFF3FC;
            font-size: 12px;
            padding: 7px 10px;
            border-radius: 5px;
            color: #4F5E64 !important;
        }

        h6 {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 26px;
            color: #05264E;
        }

        .pic {
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .card-block {
            width: 200px;
            border: 1px solid lightgrey;
            border-radius: 5px !important;
            background-color: #FAFAFA;
            margin-bottom: 30px;
        }

        .radio {
            display: inline-block;
            border-radius: 0;
            box-sizing: border-box;
            cursor: pointer;
            color: #000;
            font-weight: 500;
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            -o-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            filter: grayscale(100%);
        }


        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .radio.selected {
            box-shadow: 0px 8px 16px 0px #EEEEEE;
            -webkit-filter: grayscale(0%);
            -moz-filter: grayscale(0%);
            -o-filter: grayscale(0%);
            -ms-filter: grayscale(0%);
            filter: grayscale(0%);
        }


    </style>
@stop @section('content')
    {{--Modal Session--}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <form id="applyJobForm" name="applyJobForm" method="POST" action="{{route('user.applyJob', $job->id)}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chọn CV để ứng tuyển vào vị trí này</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card text-center justify-content-center shaodw-lg  card-1 border-0 bg-white px-sm-2">
                                        <div class="card-body show  ">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-12 mx-auto">
                                                    <h5><b>Chọn CV</b></h5>
                                                    <p>Bạn có thể upload CV hoặc sử dụng CV được tạo tự động từ
                                                        trang web của chúng tôi
                                                    </p>
                                                </div>
                                                <div class="col-8 mx-auto">
                                                    <div class="radio-group row justify-content-between px-3 text-center a d-flex">
                                                        <div class="mr-sm-2 mx-1 card-block  py-0 text-center radio selected ">
                                                            <div class="flex-row">
                                                                <div class="col">
                                                                    <div class="pic"><img
                                                                                class="irc_mut img-fluid"
                                                                                src="{{asset('storage/cv.png')}}"
                                                                                width="100" height="100">
                                                                    </div>
                                                                    <p>Chọn CV từ hệ thống</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-sm-2 mx-1 card-block  py-0 text-center radio  ">
                                                            <div class="flex-row">
                                                                <div class="col">
                                                                    <div class="pic"><img
                                                                                class="irc_mut img-fluid"
                                                                                src="{{asset('storage/upload-cv.png')}}"
                                                                                width="100" height="100">
                                                                    </div>
                                                                    <input class="form-control" type="file"
                                                                           id="formFile"
                                                                           name="cv">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="useWebCV" name="useWebCV" value="true" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{--          New Design--}}
    <main class="main">
        <section class="section-box mt-50">

            <div class="container-fluid mb-4">
                <div class="row" style="margin: 0 80px 0 80px">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="box-border-single">
                            <div class="row mt-10">
                                <div class="col-lg-8 col-md-12">
                                    <h3>{{$job->title}}</h3>
                                    <div class="mt-0 mb-15"><span>{{$job->jobType->name}}</span></div>
                                </div>
                                <div class="col-lg-4 col-md-12 d-flex flex-end flex-column">
                                    @if(Auth::user())
                                        @if($job->user->where('id', Auth::user()->id)->first())
                                            <button type="button" class="btn btn-primary hover-up" data-toggle="modal"
                                                    data-target="#exampleModal" disabled>
                                                <i class="fa fa-check"></i> Đã ứng tuyển
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary hover-up" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                <i class="fa fa-check"></i> Ứng tuyển ngay
                                            </button>
                                        @endif
                                    @else
                                        <button type="button" class="btn btn-primary hover-up" data-toggle="modal"
                                                data-target="#exampleModal">
                                            <i class="fa fa-check"></i> Ứng tuyển ngay
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="banner-hero banner-image-single mt-10 mb-20"><img
                                        src="{{$job->company->cover !== null ? asset($job->company->cover->path) : asset('storage/cover/default.png')}}"
                                        alt="jobBox"
                                        style="height: 400px; width: 100%; object-fit: cover; border-radius: 16px;">
                            </div>
                            <div class="job-overview">
                                <h5 class="border-bottom pb-15 mb-30">Tổng quan</h5>
                                <div class="row">
                                    <div class="col-md-6 d-flex">

                                        <div class="sidebar-text-info ml-10">
                                            <span class="text-description industry-icon mb-10">Kỹ năng: </span>
                                            <strong class="small-heading">
                                                @foreach($job->skill as $skill)
                                                    {{$skill->name}}/
                                                @endforeach
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex mt-sm-15">

                                        <div class="sidebar-text-info ml-10"><span
                                                    class="text-description joblevel-icon mb-10">Trình độ công việc: </span><strong
                                                    class="small-heading">{{$job->jobLevel->name}}</strong></div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-6 d-flex">

                                        <div class="sidebar-text-info ml-10"><span
                                                    class="text-description salary-icon mb-10">Mức lương: </span><strong
                                                    class="small-heading">
                                                <x-money amount="{{$job->salary}}" currency="VND"/>
                                            </strong></div>
                                    </div>
                                    <div class="col-md-6 d-flex">

                                        <div class="sidebar-text-info ml-10"><span
                                                    class="text-description jobtype-icon mb-10">Hình thức công việc: </span><strong
                                                    class="small-heading">{{$job->jobType->name}}</strong></div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-12 d-flex">
                                        <div class="sidebar-text-info ml-10"><span
                                                    class="text-description salary-icon mb-10">Lĩnh vực việc làm: </span><strong
                                                    class="small-heading">
                                                {{$job->technology->name}}
                                            </strong></div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-md-12 d-flex mt-sm-15">
                                        <div class="sidebar-text-info ml-10"><span
                                                    class="text-description jobtype-icon mb-10">Vị trí làm việc: </span><strong
                                                    class="small-heading">
                                                @foreach ($job->city as $city)
                                                    <p class="d-inline-block">{{$city->name}}@if (!$loop->last)
                                                            ,
                                                        @endif </p>
                                                @endforeach
                                            </strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-single">
                                <h4>Mô tả công việc</h4>
                                <p>{!! $job->job_desc !!}</p>
                                <h4>Yêu cầu công việc</h4>
                                <p>{!! $job->job_requirements !!}</p>
                            </div>
                        </div>
                        @if(count($relatesJob)>0)
                            <h4 class="mt-4">Công việc {{$job->technology->name}} tương tự</h4>
                            <div class="box-border-single">
                                <div class="row">
                                    @foreach($relatesJob as $relateJob)
                                        <a href="{{route('job.detail', $relateJob->id)}}"
                                           class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4"
                                        >
                                            <div class="card-grid-2" style="height: 100%">
                                                <div class="hover-up d-flex flex-column justify-content-between">
                                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                                        <div class="image-box">
                                                            <img src="{{$relateJob->company->image !== null ? asset($relateJob->company->image->path) : asset('storage/images/default.png')}}"
                                                                 style="width: 52px; border-radius: 10px"
                                                                 alt="jobBox">
                                                        </div>
                                                        <div class="right-info">
                                                            <span class="name-job">{{$relateJob->company->name}}</span>
                                                            <span class="location-small">{{$relateJob->company->country->country_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="card-block-info d-flex flex-column justify-content-between">
                                                            <div>
                                                                <h6 class="ml-4">{{$relateJob->title}}</h6>
                                                                <div class="mt-1 ml-2"><span
                                                                            class="card-briefcase">{{$relateJob->jobType->name}}</span>
                                                                </div>
                                                                <div class="font-sm color-text-paragraph mt-15 px-4 py-2"
                                                                     style="max-height: 150px; width: 100%"
                                                                >
                                                                    {!! Str::limit($relateJob->job_desc, 250)  !!}
                                                                </div>
                                                                <div class="mt-30 mx-4" style="height: 100px">
                                                                    @foreach($relateJob->skill as $skill)
                                                                        <span class="btn btn-grey-small mr-1">{{$skill->name}}</span>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="card-2-bottom mt-30">
                                                            <div class="row d-flex align-items-center mb-3">
                                                                <div class="col-lg-7 col-7 ">
                                                                    <h6 class="card-text-price m-0 pl-4">
                                                                        <x-money amount="{{$relateJob->salary}}"
                                                                                 currency="VND"/>
                                                                    </h6>
                                                                </div>
                                                                <div class="col-lg-5 col-5 text-center">
                                                                    <div class="btn btn-apply-now"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#ModalApplyJobForm">Apply now
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <div class="sidebar-heading mb-4">
                                <div class="avatar-sidebar d-flex align-items-center">

                                    <figure class="d-inline-block m-0 p-0 mr-2">
                                        <img alt="jobBox"
                                             src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                        >
                                    </figure>
                                    <div class="sidebar-info d-inline-block"><span
                                                class="sidebar-company">{{$job->company->name}}</span><span
                                                class="card-location">{{$job->company->country->country_name}}</span><a
                                                class="link-underline mt-15"
                                                href="#">{{count($jobOfCompany)}} công việc khác đang tuyển</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <div class="box-map">
                                    <img alt="jobBox"
                                         src="{{$job->company->cover !== null ? asset($job->company->cover->path) : asset('storage/cover/default.png')}}"
                                         style="width: 100%; height: 150px; object-fit: cover; border-radius: 16px">

                                </div>
                                <ul class="ul-disc mt-3">
                                    <li><b>Địa chỉ: </b>{{$job->company->address}}</li>
                                    <li><b>Số điện thoại: </b>{{$job->company->phone}}</li>
                                    <li><b>Email: </b>{{$job->company->email}}</li>
                                    <li><b>Giờ làm
                                            việc: </b>{{date_format(date_create($job->company->start_work_time),"H:i")}}
                                        - {{date_format(date_create($job->company->end_work_time),"H:i")}}
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Top 5 công việc mới nhất của công ty</h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    @foreach($jobOfCompany as $job)
                                        <a href="{{route('job.detail', $job->id)}}">
                                            <li>
                                                <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                                     style="visibility: hidden; animation-name: none;">
                                                    <div class="image">
                                                        <img
                                                                src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/cover/default.png')}}"
                                                                alt="jobBox"
                                                                style="width: 52px; border-radius: 10px; height: auto">
                                                    </div>
                                                    <div class="info-text">
                                                        <h5 class="font-md font-bold color-brand-1">{{$job->title}}</h5>
                                                        <div class="mt-0">
                                                            <span class="card-briefcase pl-0">{{$job->jobType->name}}</span></span>
                                                            <h6 class="card-price">
                                                                <x-money amount="{{$job->salary}}" currency="VND"/>
                                                            </h6>
                                                        </div>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-12 text-end">
                                                                    <span class="card-briefcase pl-0">
                                                                        @foreach($job->city as $city)
                                                                            {{$city->name}}@if (!$loop->last)
                                                                                ,
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Danh mục</h6>
                            <div class="sidebar-list-job">
                                <a class="btn btn-grey-small mr-2 mb-2"
                                   href="jobs-grid.html">{{$job->technology->name}}</a>
                                @foreach($job->skill as $skill)
                                    <a class="btn btn-grey-small mr-2 mb-2"
                                       href="jobs-grid.html">{{$skill->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@stop @section('scripts')
    <script>
        $(document).ready(function () {
            $('.radio-group .radio').click(function () {
                let checkbox = $("#useWebCV");
                if (checkbox.is(':checked')) {
                    checkbox.prop('checked', false);

                } else {
                    checkbox.prop('checked', true);
                }
                $('.selected .fa').removeClass('fa-check');
                $('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
        });
    </script>

@stop