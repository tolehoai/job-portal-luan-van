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
                                    <form action="#" class="search-box">
                                        <div class="input-form">
                                            <input type="text" placeholder="Tên công việc hoặc công ty">
                                        </div>
                                        <div class="select-form">
                                            <div class="select-itms">
                                                <select name="select" id="cityList">
                                                    <option value="">Tất cả thành phố</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->slug}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="search-form">
                                            <a href="#">Tìm việc</a>
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
                                <a href="job_listing.html" class="border-btn2">Tất cả danh mục</a>
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
                                <a href="#" class="border-btn2 border-btn4">Tạo CV ngay</a>
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
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="job_details.html"><img
                                                    src="{{ asset('user_resource/img/icon/nfq.jpg') }}" alt=""
                                                    style="width:102px"></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="job_details.html">
                                            <h4>Technical Architect (PHP, JavaScript)</h4>
                                        </a>
                                        <span>NFQ Asia</span>
                                        <ul>
                                            <!-- <li>NFQ Asia</li> -->
                                            <li><i class="fas fa-map-marker-alt"></i>24 Nguyen Binh Khiem Street,
                                                District
                                                1, Ho Chi Minh
                                            </li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="job_details.html"><img
                                                    src="{{ asset('user_resource/img/icon/fpt.jpg') }}" alt=""
                                                    style="width:102px"></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="job_details.html">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="job_details.html"><img
                                                    src="{{ asset('user_resource/img/icon/mbbank.jpg') }}" alt=""
                                                    style="width:102px"></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="job_details.html">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="job_details.html"><img
                                                    src="{{ asset('user_resource/img/icon/nab.jpg') }}" alt=""
                                                    style="width:102px"></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="job_details.html">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
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
            $('#cityList').niceSelect();
        });
    </script>
@stop



