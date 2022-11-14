@extends('layouts.user.master') @section('title', 'Admin') @section('style-libraries') @stop @section('styles')
    {{--custom css item suggest search--}}
    <style>
        .banner-hero.banner-single {
            padding: 40px 20px 60px 20px;
            background: #F2F6FD;
            border-radius: 16px;
            position: relative;
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
    </style>
@stop @section('content')

    <div class="job-listing-areapb-120 mx-5">
        <div class="container-fluid">
            {{--            Header--}}
            <div class="banner-hero banner-single banner-single-bg px-2 mb-5">
                <div class="block-banner text-center">
                    <h3 class="wow animate__ animate__fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <span class="color-brand-2" style="color: #fb246a;">22 Jobs</span> Available Now</h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__ animate__fadeInUp animated"
                         data-wow-delay=".1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni, <br
                                class="d-none d-xl-block">atque delectus molestias quis?
                    </div>
                    <div class="form-find text-start mt-40 wow animate__ animate__fadeInUp animated"
                         data-wow-delay=".2s"
                         style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <form action="#" class="search-box">
                            <div class="input-form">
                                <input type="text" placeholder="Tên công việc hoặc công ty" tabindex="0">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select name="select" id="cityList" tabindex="0" style="display: none;">
                                        <option value="">Tất cả thành phố</option>
                                        <option value="an-giang">An Giang</option>
                                        <option value="ba-ria-vung-tau">Bà Rịa - Vũng Tàu</option>
                                        <option value="bac-lieu">Bạc Liêu</option>
                                        <option value="bac-kan">Bắc Kạn</option>
                                        <option value="bac-giang">Bắc Giang</option>
                                        <option value="bac-ninh">Bắc Ninh</option>
                                        <option value="ben-tre">Bến Tre</option>
                                        <option value="binh-duong">Bình Dương</option>
                                        <option value="binh-dinh">Bình Định</option>
                                        <option value="binh-phuoc">Bình Phước</option>
                                        <option value="binh-thuan">Bình Thuận</option>
                                        <option value="ca-mau">Cà Mau</option>
                                        <option value="cao-bang">Cao Bằng</option>
                                        <option value="can-tho">Cần Thơ</option>
                                        <option value="da-nang">Đà Nẵng</option>
                                        <option value="dak-lak">Đắk Lắk</option>
                                        <option value="dak-nong">Đắk Nông</option>
                                        <option value="dong-nai">Đồng Nai</option>
                                        <option value="dong-thap">Đồng Tháp</option>
                                        <option value="dien-bien">Điện Biên</option>
                                        <option value="gia-lai">Gia Lai</option>
                                        <option value="ha-giang">Hà Giang</option>
                                        <option value="ha-nam">Hà Nam</option>
                                        <option value="ha-noi">Hà Nội</option>
                                        <option value="ha-tinh">Hà Tĩnh</option>
                                        <option value="hai-duong">Hải Dương</option>
                                        <option value="hai-phong">Hải Phòng</option>
                                        <option value="hoa-binh">Hòa Bình</option>
                                        <option value="hau-giang">Hậu Giang</option>
                                        <option value="hung-yen">Hưng Yên</option>
                                        <option value="thanh-pho-ho-chi-minh">Thành phố Hồ Chí Minh</option>
                                        <option value="khanh-hoa">Khánh Hòa</option>
                                        <option value="kien-giang">Kiên Giang</option>
                                        <option value="kon-tum">Kon Tum</option>
                                        <option value="lai-chau">Lai Châu</option>
                                        <option value="lao-cai">Lào Cai</option>
                                        <option value="lang-son">Lạng Sơn</option>
                                        <option value="lam-dong">Lâm Đồng</option>
                                        <option value="long-an">Long An</option>
                                        <option value="nam-dinh">Nam Định</option>
                                        <option value="nghe-an">Nghệ An</option>
                                        <option value="ninh-binh">Ninh Bình</option>
                                        <option value="ninh-thuan">Ninh Thuận</option>
                                        <option value="phu-tho">Phú Thọ</option>
                                        <option value="phu-yen">Phú Yên</option>
                                        <option value="quang-binh">Quảng Bình</option>
                                        <option value="quang-nam">Quảng Nam</option>
                                        <option value="quang-ngai">Quảng Ngãi</option>
                                        <option value="quang-ninh">Quảng Ninh</option>
                                        <option value="quang-tri">Quảng Trị</option>
                                        <option value="soc-trang">Sóc Trăng</option>
                                        <option value="son-la">Sơn La</option>
                                        <option value="tay-ninh">Tây Ninh</option>
                                        <option value="thai-binh">Thái Bình</option>
                                        <option value="thai-nguyen">Thái Nguyên</option>
                                        <option value="thanh-hoa">Thanh Hóa</option>
                                        <option value="thua-thien-hue">Thừa Thiên - Huế</option>
                                        <option value="tien-giang">Tiền Giang</option>
                                        <option value="tra-vinh">Trà Vinh</option>
                                        <option value="tuyen-quang">Tuyên Quang</option>
                                        <option value="vinh-long">Vĩnh Long</option>
                                        <option value="vinh-phuc">Vĩnh Phúc</option>
                                        <option value="yen-bai">Yên Bái</option>
                                    </select>
                                    <div class="nice-select" tabindex="0"><span class="current">Tất cả thành phố</span>
                                        <ul class="list">
                                            <li data-value="" class="option selected">Tất cả thành phố</li>
                                            <li data-value="an-giang" class="option">An Giang</li>
                                            <li data-value="ba-ria-vung-tau" class="option">Bà Rịa - Vũng Tàu</li>
                                            <li data-value="bac-lieu" class="option">Bạc Liêu</li>
                                            <li data-value="bac-kan" class="option">Bắc Kạn</li>
                                            <li data-value="bac-giang" class="option">Bắc Giang</li>
                                            <li data-value="bac-ninh" class="option">Bắc Ninh</li>
                                            <li data-value="ben-tre" class="option">Bến Tre</li>
                                            <li data-value="binh-duong" class="option">Bình Dương</li>
                                            <li data-value="binh-dinh" class="option">Bình Định</li>
                                            <li data-value="binh-phuoc" class="option">Bình Phước</li>
                                            <li data-value="binh-thuan" class="option">Bình Thuận</li>
                                            <li data-value="ca-mau" class="option">Cà Mau</li>
                                            <li data-value="cao-bang" class="option">Cao Bằng</li>
                                            <li data-value="can-tho" class="option">Cần Thơ</li>
                                            <li data-value="da-nang" class="option">Đà Nẵng</li>
                                            <li data-value="dak-lak" class="option">Đắk Lắk</li>
                                            <li data-value="dak-nong" class="option">Đắk Nông</li>
                                            <li data-value="dong-nai" class="option">Đồng Nai</li>
                                            <li data-value="dong-thap" class="option">Đồng Tháp</li>
                                            <li data-value="dien-bien" class="option">Điện Biên</li>
                                            <li data-value="gia-lai" class="option">Gia Lai</li>
                                            <li data-value="ha-giang" class="option">Hà Giang</li>
                                            <li data-value="ha-nam" class="option">Hà Nam</li>
                                            <li data-value="ha-noi" class="option">Hà Nội</li>
                                            <li data-value="ha-tinh" class="option">Hà Tĩnh</li>
                                            <li data-value="hai-duong" class="option">Hải Dương</li>
                                            <li data-value="hai-phong" class="option">Hải Phòng</li>
                                            <li data-value="hoa-binh" class="option">Hòa Bình</li>
                                            <li data-value="hau-giang" class="option">Hậu Giang</li>
                                            <li data-value="hung-yen" class="option">Hưng Yên</li>
                                            <li data-value="thanh-pho-ho-chi-minh" class="option">Thành phố Hồ Chí
                                                Minh
                                            </li>
                                            <li data-value="khanh-hoa" class="option">Khánh Hòa</li>
                                            <li data-value="kien-giang" class="option">Kiên Giang</li>
                                            <li data-value="kon-tum" class="option">Kon Tum</li>
                                            <li data-value="lai-chau" class="option">Lai Châu</li>
                                            <li data-value="lao-cai" class="option">Lào Cai</li>
                                            <li data-value="lang-son" class="option">Lạng Sơn</li>
                                            <li data-value="lam-dong" class="option">Lâm Đồng</li>
                                            <li data-value="long-an" class="option">Long An</li>
                                            <li data-value="nam-dinh" class="option">Nam Định</li>
                                            <li data-value="nghe-an" class="option">Nghệ An</li>
                                            <li data-value="ninh-binh" class="option">Ninh Bình</li>
                                            <li data-value="ninh-thuan" class="option">Ninh Thuận</li>
                                            <li data-value="phu-tho" class="option">Phú Thọ</li>
                                            <li data-value="phu-yen" class="option">Phú Yên</li>
                                            <li data-value="quang-binh" class="option">Quảng Bình</li>
                                            <li data-value="quang-nam" class="option">Quảng Nam</li>
                                            <li data-value="quang-ngai" class="option">Quảng Ngãi</li>
                                            <li data-value="quang-ninh" class="option">Quảng Ninh</li>
                                            <li data-value="quang-tri" class="option">Quảng Trị</li>
                                            <li data-value="soc-trang" class="option">Sóc Trăng</li>
                                            <li data-value="son-la" class="option">Sơn La</li>
                                            <li data-value="tay-ninh" class="option">Tây Ninh</li>
                                            <li data-value="thai-binh" class="option">Thái Bình</li>
                                            <li data-value="thai-nguyen" class="option">Thái Nguyên</li>
                                            <li data-value="thanh-hoa" class="option">Thanh Hóa</li>
                                            <li data-value="thua-thien-hue" class="option">Thừa Thiên - Huế</li>
                                            <li data-value="tien-giang" class="option">Tiền Giang</li>
                                            <li data-value="tra-vinh" class="option">Trà Vinh</li>
                                            <li data-value="tuyen-quang" class="option">Tuyên Quang</li>
                                            <li data-value="vinh-long" class="option">Vĩnh Long</li>
                                            <li data-value="vinh-phuc" class="option">Vĩnh Phúc</li>
                                            <li data-value="yen-bai" class="option">Yên Bái</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="search-form">
                                <a href="#" tabindex="0">Tìm việc</a>
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
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Category</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <select name="select" style="display: none;">
                                    <option value="">All Category</option>
                                    <option value="">Category 1</option>
                                    <option value="">Category 2</option>
                                    <option value="">Category 3</option>
                                    <option value="">Category 4</option>
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">All Category</span>
                                    <ul class="list">
                                        <li data-value="" class="option selected">All Category</li>
                                        <li data-value="" class="option">Category 1</li>
                                        <li data-value="" class="option">Category 2</li>
                                        <li data-value="" class="option">Category 3</li>
                                        <li data-value="" class="option">Category 4</li>
                                    </ul>
                                </div>
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Job Type</h4>
                                </div>
                                <label class="container">Full Time
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Part Time
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Remote
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Freelance
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <!-- single two -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Location</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <select name="select" style="display: none;">
                                    <option value="">Anywhere</option>
                                    <option value="">Category 1</option>
                                    <option value="">Category 2</option>
                                    <option value="">Category 3</option>
                                    <option value="">Category 4</option>
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">Anywhere</span>
                                    <ul class="list">
                                        <li data-value="" class="option selected">Anywhere</li>
                                        <li data-value="" class="option">Category 1</li>
                                        <li data-value="" class="option">Category 2</li>
                                        <li data-value="" class="option">Category 3</li>
                                        <li data-value="" class="option">Category 4</li>
                                    </ul>
                                </div>
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Experience</h4>
                                </div>
                                <label class="container">1-2 Years
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">2-3 Years
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">3-6 Years
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">6-more..
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <!-- single three -->
                        <div class="single-listing">
                            <!-- select-Categories start -->
                            <div class="select-Categories pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Posted Within</h4>
                                </div>
                                <label class="container">Any
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Today
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 2 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 3 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 5 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Last 10 days
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <div class="single-listing">
                            <!-- Range Slider Start -->
                            <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                <div class="small-section-tittle2">
                                    <h4>Filter Jobs</h4>
                                </div>
                                <div class="widgets_inner">
                                    <div class="range_item">
                                        <!-- <div id="slider-range"></div> -->
                                        <span class="irs js-irs-0"><span class="irs"><span class="irs-line"
                                                                                           tabindex="-1"><span
                                                            class="irs-line-left"></span><span
                                                            class="irs-line-mid"></span><span
                                                            class="irs-line-right"></span></span><span class="irs-min"
                                                                                                       style="visibility: hidden;">tk. 0</span><span
                                                        class="irs-max"
                                                        style="visibility: visible;">tk. 1.000</span><span
                                                        class="irs-from"
                                                        style="visibility: visible; left: 0%;">tk. 0</span><span
                                                        class="irs-to" style="visibility: visible; left: 39.0411%;">tk. 500</span><span
                                                        class="irs-single" style="visibility: hidden; left: 9.47489%;">tk. 0 - tk. 500</span></span><span
                                                    class="irs-grid"></span><span class="irs-bar"
                                                                                  style="left: 3.42466%; width: 46.5753%;"></span><span
                                                    class="irs-shadow shadow-from" style="display: none;"></span><span
                                                    class="irs-shadow shadow-to" style="display: none;"></span><span
                                                    class="irs-slider from" style="left: 0%;"></span><span
                                                    class="irs-slider to type_last"
                                                    style="left: 46.5753%;"></span></span><input type="text"
                                                                                                 class="js-range-slider irs-hidden-input"
                                                                                                 value="" readonly="">
                                        <div class="d-flex align-items-center">
                                            <div class="price_text">
                                                <p>Price :</p>
                                            </div>
                                            <div class="price_value d-flex justify-content-center">
                                                <input type="text" class="js-input-from" id="amount" readonly="">
                                                <span>to</span>
                                                <input type="text" class="js-input-to" id="amount" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- Range Slider End -->
                        </div>
                    </div>
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
                                    <div class="count-job mb-35">
                                        <span>{{$jobs->total()}} công việc được tìm thấy</span>
                                        <!-- Select job items start -->
                                        <div class="select-job-items">
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
                                                            {{$job->technology->name}},
                                                        </li>
                                                    </ul>
                                                    <span class="text-gray"><i
                                                                class="fas fa-map-marker-alt text-gray"></i></span>
                                                    @foreach ($job->city as $city)
                                                        <p class="d-inline-block">{{$city->name}}, </p>
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
                    <!-- Featured_job_end -->
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