@extends('layouts.user.master') @section('title', 'Người dùng') @section('style-libraries') @stop @section('styles')
    {{--custom css item suggest search--}}
    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }


        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }


        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }


        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

        .user-header {
            border-bottom: 2px solid #0062cc;
        }


        .badge-skill {
            background-color: #ebf3ff;
            color: #002152;
        }

        #info {
            background-color: #029c7c;
        }

        #info1 {
            background-color: #029c7c;
        }

        .info2 {
            background-color: #28bb9c;
        }


        li {
            list-style-type: none;
        }


        #work img {
            height: 50px;

        }

        b {
            font-size: 22pt;
            color: #263831;
        }


    </style>
@stop @section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="container-fluid mx-5">
                <div class="banner-hero banner-image-single"><img
                            src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/page/candidates/img.png"
                            alt="jobbox"><a class="btn-editor" href="#"></a></div>
                <div class="box-company-profile">
                    <div class="image-compay">
                        <img
                                src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                style="width: 130px;"
                                alt="jobbox">
                    </div>
                    <div class="row mt-50">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">{{$user->name}}</h5>
                            <h6>
                                {{$user->title->name}}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="box-nav-tabs nav-tavs-profile mb-5">
                            <ul class="nav" role="tablist">
                                <li><a class="btn btn-border aboutus-icon mb-20 active" href="#tab-all-job"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-all-job"
                                       aria-selected="true">My Profile</a></li>
                                <li><a class="btn btn-border recruitment-icon mb-20" href="#tab-interview-job"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-interview-job"
                                       aria-selected="false">My Jobs</a></li>
                                <li><a class="btn btn-border people-icon mb-20" href="#tab-pass-job"
                                       data-bs-toggle="tab" role="tab" aria-controls="tab-pass-job"
                                       aria-selected="false">Saved Jobs</a></li>
                            </ul>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="mt-20 mb-20"><a class="link-red" href="#">Delete Account</a></div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <div class="content-single">
                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="tab-all-job" role="tabpanel"
                                     aria-labelledby="tab-interview-job">
                                    <h3 class="mt-0 color-brand-1 mb-50">Tất cả công việc đã ứng tuyển</h3>
                                    <div class="row display-list">
                                        @foreach($jobs as $job)
                                            <a href="{{route('job.detail', $job->id)}}">
                                                <div class="col-xl-12 col-12">
                                                    <div class="card-grid-2 hover-up">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card-grid-2-image-left">
                                                                    <div class="image-box">
                                                                        <img
                                                                                src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                                                                style="width: 64px; border-radius: 10px"
                                                                                alt="jobBox"
                                                                        >
                                                                    </div>
                                                                    <div class="right-info">
                                                                        <p class="name-job">{{$job->company->name}}</p>
                                                                        <span class="location-small">{{$job->company->country->country_name}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-block-info">
                                                            <h4><p>{{$job->title}}</p></h4>
                                                            <div class="mt-5">
                                                                <span class="card-briefcase">{{$job->jobType->name}}</span>
                                                            </div>
                                                            <p class="font-sm color-text-paragraph mt-10">{!! $job->company->company_desc !!}</p>
                                                            <div class="card-2-bottom mt-20">
                                                                <div class="row">
                                                                    <div class="col-lg-7 col-7">
                                                                    <span class="card-text-price">
                                                                        <x-money amount="{{$job->salary}}"
                                                                                 currency="VND"/>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    {!! $jobs->links() !!}
                                    <div class="paginations">
                                        <ul class="pager">
                                            <li><a class="pager-prev" href="#"></a></li>
                                            <li><a class="pager-number" href="#">1</a></li>
                                            <li><a class="pager-number" href="#">2</a></li>
                                            <li><a class="pager-number" href="#">3</a></li>
                                            <li><a class="pager-number" href="#">4</a></li>
                                            <li><a class="pager-number" href="#">5</a></li>
                                            <li><a class="pager-number active" href="#">6</a></li>
                                            <li><a class="pager-number" href="#">7</a></li>
                                            <li><a class="pager-next" href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-interview-job" role="tabpanel"
                                     aria-labelledby="tab-interview-job">
                                    <h3 class="mt-0 color-brand-1 mb-50">Công việc đang phỏng vấn</h3>
                                    <div class="row display-list">
                                        <div class="col-xl-12 col-12">
                                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card-grid-2-image-left">
                                                            <div class="image-box">
                                                                <img src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-5.png"
                                                                     alt="jobBox">
                                                            </div>
                                                            <div class="right-info">
                                                                <p class="name-job">Linkedin</p>
                                                                <span class="location-small">New York, US</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                        <div class="pl-15 mb-15 mt-30">
                                                            <p class="btn btn-grey-small mr-5">Adobe XD</p>
                                                            <p class="btn btn-grey-small mr-5">Figma</p></div>
                                                    </div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h4><p>React Native Web Developer</p></h4>
                                                    <div class="mt-5">
                                                        <span class="card-briefcase">Fulltime</span>
                                                    </div>
                                                    <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor
                                                        sit amet, consectetur adipisicing elit. Recusandae
                                                        architecto eveniet, dolor quo repellendus pariatur
                                                    </p>
                                                    <div class="card-2-bottom mt-20">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-7">
                                                                <span class="card-text-price">$500</span>
                                                            </div>
                                                            <div class="col-lg-5 col-5 text-end">
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
                                    </div>
                                    <div class="paginations">
                                        <ul class="pager">
                                            <li><a class="pager-prev" href="#"></a></li>
                                            <li><a class="pager-number" href="#">1</a></li>
                                            <li><a class="pager-number" href="#">2</a></li>
                                            <li><a class="pager-number" href="#">3</a></li>
                                            <li><a class="pager-number" href="#">4</a></li>
                                            <li><a class="pager-number" href="#">5</a></li>
                                            <li><a class="pager-number active" href="#">6</a></li>
                                            <li><a class="pager-number" href="#">7</a></li>
                                            <li><a class="pager-next" href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-pass-job" role="tabpanel"
                                     aria-labelledby="tab-interview-job">
                                    <h3 class="mt-0 color-brand-1 mb-50">Công việc được phê duyệt</h3>
                                    <div class="row display-list">
                                        <div class="col-xl-12 col-12">
                                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card-grid-2-image-left">
                                                            <div class="image-box">
                                                                <img src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/brands/brand-5.png"
                                                                     alt="jobBox">
                                                            </div>
                                                            <div class="right-info">
                                                                <p class="name-job">Linkedin</p>
                                                                <span class="location-small">New York, US</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                        <div class="pl-15 mb-15 mt-30">
                                                            <p class="btn btn-grey-small mr-5">Adobe XD</p>
                                                            <p class="btn btn-grey-small mr-5">Figma</p></div>
                                                    </div>
                                                </div>
                                                <div class="card-block-info">
                                                    <h4><p>React Native Web Developer</p></h4>
                                                    <div class="mt-5">
                                                        <span class="card-briefcase">Fulltime</span>
                                                    </div>
                                                    <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor
                                                        sit amet, consectetur adipisicing elit. Recusandae
                                                        architecto eveniet, dolor quo repellendus pariatur
                                                    </p>
                                                    <div class="card-2-bottom mt-20">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-7">
                                                                <span class="card-text-price">$500</span>
                                                            </div>
                                                            <div class="col-lg-5 col-5 text-end">
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
                                    </div>
                                    <div class="paginations">
                                        <ul class="pager">
                                            <li><a class="pager-prev" href="#"></a></li>
                                            <li><a class="pager-number" href="#">1</a></li>
                                            <li><a class="pager-number" href="#">2</a></li>
                                            <li><a class="pager-number" href="#">3</a></li>
                                            <li><a class="pager-number" href="#">4</a></li>
                                            <li><a class="pager-number" href="#">5</a></li>
                                            <li><a class="pager-number active" href="#">6</a></li>
                                            <li><a class="pager-number" href="#">7</a></li>
                                            <li><a class="pager-next" href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-20">
            <div class="container">
                <div class="box-newsletter">
                    <div class="row">
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                    src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/template/newsletter-left.png"
                                    alt="joxBox"></div>
                        <div class="col-lg-12 col-xl-6 col-12">
                            <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                           placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                                    src="http://wp.alithemes.com/html/jobbox/demos/assets/imgs/template/newsletter-right.png"
                                    alt="joxBox"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@stop
@section('scripts')
    <script>
    </script>

@stop