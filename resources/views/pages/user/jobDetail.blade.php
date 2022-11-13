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

    </style>
@stop @section('content')

    {{--          New Design--}}
    <main class="main">
        <section class="section-box mt-50">

            <div class="container-fluid">
                <div class="row" style="margin: 0 80px 0 80px">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="box-border-single">
                            <div class="row mt-10">
                                <div class="col-lg-8 col-md-12">
                                    <h3>{{$job->title}}</h3>
                                    <div class="mt-0 mb-15"><span
                                                class="card-briefcase">{{$job->jobType->name}}</span><span
                                                class="card-time">3 mins ago</span></div>
                                </div>
                                <div class="col-lg-4 col-md-12 text-lg-end">
                                    <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up"
                                         data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="banner-hero banner-image-single mt-10 mb-20"><img
                                        src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/page/job-single-2/img.png"
                                        alt="jobBox"></div>
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
                                                    <p class="d-inline-block">{{$city->name}}, </p>
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
                            <div class="author-single"><span>AliThemes</span></div>
                            <div class="single-apply-jobs">
                                <div class="row align-items-center">
                                    <div class="col-md-5"><a class="btn btn-default mr-15" href="#">Apply now</a><a
                                                class="btn btn-border" href="#">Save job</a></div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-4">Công việc {{$job->technology->name}} tương tự</h4>
                        <div class="box-border-single">
                            <div class="row">
                                @foreach($relateJob as $job)
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box">
                                                    <img src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                                         style="width: 52px; border-radius: 10px"
                                                         alt="jobBox">
                                                </div>
                                                <div class="right-info"><a class="name-job"
                                                                           href="company-details.html">{{$job->company->name}}</a>
                                                    <span class="location-small">{{$job->company->country->country_name}}</span>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6 class="ml-4">{{$job->title}}</h6>
                                                <div class="mt-1 ml-2"><span
                                                            class="card-briefcase">{{$job->jobType->name}}</span>
                                                </div>
                                                <div class="font-sm color-text-paragraph mt-15 px-4 py-2"
                                                     style="max-height: 150px"
                                                >
                                                    {!! Str::limit($job->job_desc, 250)  !!}
                                                </div>
                                                <div class="mt-30 mx-4" style="height: 100px">
                                                    @foreach($job->skill as $skill)
                                                        <a class="btn btn-grey-small mr-1"
                                                           href="jobs-grid.html">{{$skill->name}}</a>
                                                    @endforeach
                                                </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <div class="col-lg-7 col-7 ">
                                                            <h6 class="card-text-price m-0 pl-4">
                                                                <x-money amount="{{$job->salary}}" currency="VND"/>
                                                            </h6>
                                                        </div>
                                                        <div class="col-lg-5 col-5 text-center">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                                 data-bs-target="#ModalApplyJobForm">Apply now
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.3150609575905!2d-87.6235655!3d41.886080899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2ca8b34afe61%3A0x6caeb5f721ca846!2s205%20N%20Michigan%20Ave%20Suit%20810%2C%20Chicago%2C%20IL%2060601%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1658551322537!5m2!1svi!2s"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <ul class="ul-disc">
                                    <li><b>Địa chỉ: </b>{{$company->address}}</li>
                                    <li><b>Số điện thoại: </b>{{$company->phone}}</li>
                                    <li><b>Email: </b>{{$company->email}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Similar jobs</h6>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">UI
                                                        / UX Designer fulltime</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>3</span><span> mins ago</span></span>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$250<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">New York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Java
                                                        Software Engineer</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>5</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$500<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Tokyo, Japan</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Frontend
                                                        Developer</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>8</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$650<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Hanoi, Vietnam</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Cloud
                                                        Engineer</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>12</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$380<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Losangl, Au</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">DevOps
                                                        Engineer</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>34</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$140<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">Paris, France</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Figma
                                                        design UI/UX</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>45</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$290<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">New York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Product
                                                        Manage</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>50</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$650<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">New York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up"
                                             style="visibility: hidden; animation-name: none;">
                                            <div class="image"><a href="job-details.html"><img
                                                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-4.png"
                                                            alt="jobBox"></a></div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">UI
                                                        / UX Designer</a></h5>
                                                <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                            class="card-time"><span>58</span><span> mins ago</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="card-price">$270<span>/Hour</span></h6>
                                                        </div>
                                                        <div class="col-6 text-end"><span class="card-briefcase">New York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-border">
                            <h6 class="f-18">Tags</h6>
                            <div class="sidebar-list-job"><a class="btn btn-grey-small bg-14 mb-10 mr-5"
                                                             href="jobs-grid.html">App</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Digital</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5"
                                        href="jobs-grid.html">Marketing</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Conten
                                    Writer</a><a class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Sketch</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">PSD</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Laravel</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">React JS</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">HTML</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Finance</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Manager</a><a
                                        class="btn btn-grey-small bg-14 mb-10 mr-5" href="jobs-grid.html">Business</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>







    {{--          End new Design--}}
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Chi tiết công việc</h1>
        </div>
    </div>
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img
                                            src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                            alt=""
                                            style="width: 100px;"></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{$job->title}}</h4>
                                </a>
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        {{$job->technology->name}},
                                    </li>
                                    <li>
                                        <b>
                                            <x-money amount="{{$job->salary}}" currency="VND"/>
                                        </b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Mô tả công việc</h4>
                            </div>
                            <p>{!! $job->job_desc !!}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Yêu cầu công việc</h4>
                            </div>
                            <p>{!! $job->job_requirements !!}</p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Tổng quan công việc</h4>
                        </div>
                        <ul>
                            <li>
                                <div>Địa điểm :</div>
                                <div>
                                    @foreach ($job->city as $city)
                                        <span class="m-0 p-0 float-right">{{$city->name}}</span><br>
                                    @endforeach
                                </div>
                            </li>
                            <li>Hình thức làm việc : <span>Full time</span></li>
                            <li>Salary : <span>$7,800 yearly</span></li>
                            <li>Application date : <span>12 Sep 2020</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                        </div>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>Colorlib</span>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.</p>
                        <ul>
                            <li>Name: <span>Colorlib </span></li>
                            <li>Web : <span> colorlib.com</span></li>
                            <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop @section('scripts')
    <script>
        $(document).ready(function () {

        })
    </script>

@stop