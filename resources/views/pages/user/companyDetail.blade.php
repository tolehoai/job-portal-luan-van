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

        .image-compay {
            position: absolute;
            top: -80px;
            left: -10px;
        }


    </style>
@stop @section('content')
    <div>
        <div>
            <main class="main">
                <section class="section-box-2">
                    <div class="container">
                        <div class="banner-hero banner-image-single"><img
                                style="height: 305px !important; width: 100% !important; object-fit: cover !important;"
                                src="{{$company->cover !== null ? asset($company->cover->path) : asset('storage/cover/default.png')}}"
                                alt="jobBox"></div>
                        <div class="box-company-profile">
                            <div class="image-compay"><img
                                    src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                    style="width: 100px; height: 100px; border-radius: 10%;" alt="jobBox"></div>

                        </div>
                        <div class="row mt-10 ml-4">
                            <div class="col-lg-8 col-md-12">
                                <h5 class="f-18">{{$company->name}}<span
                                        class="card-location font-regular ml-20">{{$company->country->country_name}}</span>
                                </h5>
                                <p class="mt-2 font-md color-text-paragraph-2 mb-15">{!! $company->company_desc !!}</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <section class="section-box mt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="content-single">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                         aria-labelledby="tab-about">
                                        <h4>Tổng quan công ty</h4>
                                        <p>{!! $company->company_overview !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-related-job content-page">
                                <h5 class="mb-3">Công việc mới nhất</h5>
                                <div class="box-list-jobs display-list">
                                    @foreach($latestJob as $job)

                                        <a href="{{route('job.detail', $job->id)}}"
                                           class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                            <div class="card-grid-2 my-1" style="height: 100%">
                                                <div class="hover-up d-flex flex-column justify-content-between">
                                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                                        <div class="image-box">
                                                            <img
                                                                src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                                style="width: 52px; border-radius: 10px" alt="jobBox">
                                                        </div>
                                                        <div class="right-info">
                                                            <span class="name-job">{{$job->title}}</span>
                                                            <span class="">{{$job->jobType->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="card-2-bottom mt-30">
                                                            <div class="row d-flex align-items-center mb-3">
                                                                <div class="col-lg-7 col-7 ">
                                                                    <h6 class="card-text-price m-0 pl-4">
                                                                        <x-money amount="{{$job->salary}}"
                                                                                 currency="VND"/>
                                                                    </h6>
                                                                </div>
                                                                <div class="col-lg-5 col-5 text-right">
                                                                    <div class="btn btn-apply-now mr-3"
                                                                         data-bs-toggle="modal"
                                                                         data-bs-target="#ModalApplyJobForm">Xem chi
                                                                        tiết
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
                                        <div class="sidebar-info d-inline-block" style="padding-left: 0 !important;"><span
                                                class="sidebar-company">{{$job->company->name}}</span><span
                                                class="card-location">{{$job->company->country->country_name}}</span><a
                                                class="link-underline mt-15"
                                                href="{{route('jobs', ['filter[name]' => $job->company->name])}}">{{$jobOfCompany}}
                                                công
                                                việc khác đang tuyển</a>
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
                                <div class="sidebar-heading">
                                    <div class="avatar-sidebar">
                                        <div class="sidebar-info pl-0"><span class="sidebar-company">Đánh giá</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-list-job">
                                    <div class="d-flex align-items-end">
                                        <div class="my-rating d-inline-block"
                                             data-rating="{{$companyRatingScore}}"></div>
                                        <span class="live-rating"
                                              style="font-size: 0.9rem">{{round($companyRatingScore,2)}} /5.0</span>
                                    </div>
                                    <small>Tổng số {{$companyRatingTotal}} lượt đánh giá</small>
                                    <div class="mt-3">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <!-- Button trigger modal -->
                                            <button class="btn btn-apply-now m-1 p-1"
                                                    type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                Đánh giá công ty
                                            </button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-apply-now m-1 p-1">Đăng nhập để
                                                đánh
                                                giá</a>
                                        @endif

                                    </div>
                                </div>
                                <div class="sidebar-list-job">
                                    @foreach($companyRating as $rating)
                                        <div class="d-flex align-items-center">

                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="author-image">
                                                <div class="author-infor d-flex align-items-center">
                                                    <img class="avatar"
                                                         src="{{$rating->user->image !== null ? asset($rating->user->image->path) : asset('storage/images/default.png')}}"
                                                         style="width: 50px; height: 50px; border-radius: 50%;"
                                                         alt="">
                                                    <div class="ml-2">
                                                        <h6 class="mt-0 mb-0">{{$rating->user->name}}</h6>
                                                        <p class="mb-0 color-text-paragraph-2 font-sm">
                                                            {{$rating->created_at!=null ? $rating->created_at->format('d/m/Y') : ''}}
                                                        </p>
                                                        <div class="my-rating-1 d-inline-block"
                                                             data-rating="{{$rating->rating}}"></div>
                                                        <span class="live-rating"
                                                              style="font-size: 0.9rem">{{$rating->rating}} /5.0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="author-des">
                                                <p class="font-md color-text-paragraph">{{$rating->comment}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="sidebar-border-bg bg-right"><span class="text-grey">ĐANG CÓ RẤT NHIỀU CÔNG VIỆC HẤP DẪN TẠI</span><span
                                    class="text-hiring">IT JOB</span>
                                <p class="font-xxs color-text-paragraph mt-5">Chúng tôi giúp các nhà phát triển tuyệt
                                    vời
                                    như bạn phát triển sự nghiệp của mình. Chúng tôi làm điều này bằng cách giới thiệu
                                    các
                                    công việc CNTT tốt nhất. Chúng tôi cũng có rất nhiều nội dung và tài nguyên trên
                                    blog
                                    của chúng tôi để giúp bạn phát triển.

                                    Các công ty IT hàng đầu Việt Nam chọn IT-Job để tuyển dụng những ứng viên IT xuất
                                    sắc
                                    nhất.</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

        {{--        Modal--}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{route('user.rating', $company->id)}}" method="POST" id="ratingForm">
                    <div class="modal-content" style="width: 500px">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đánh giá công ty {{$company->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="d-flex flex-column align-items-center">
                                <img class="avatar"
                                     src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                     style="width: 150px; border-radius: 15%;"
                                     alt="">
                                <div class="ml-2">
                                    <h6 class="mt-0 mb-0">{{$company->name}}</h6>
                                    <p class="mb-0 color-text-paragraph-2 font-sm">
                                        {{$company->created_at!=null ? $company->created_at->format('d/m/Y') : ''}}
                                    </p>
                                </div>

                                <div class="form-group w-100 d-flex align-items-center flex-column pt-3">
                                    <label for="rating">Đánh giá</label>
                                    <div class="my-rating-2" data-rating="0"></div>
                                    <div class="d-flex">
                                        <span class="live-rating-2 d-inline-block" style="font-size: 0.9rem"></span>
                                        <span style="font-size: 0.9rem" class="d-inline-block">/5.0</span>
                                    </div>
                                </div>
                                <div class="form-group w-100 d-flex align-items-center flex-column pt-3">
                                    <label for="comment">Bình luận</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="rating" id="rating">
                                @csrf
                                <button type="submit" class="btn btn-primary" id="ratingBtn">Đánh giá</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
        </main>
    </div>
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

            $(".my-rating").starRating({
                starSize: 35,
                hoverColor: '#FFC107',
                activeColor: '#FFC107',
                useGradient: false,
                readOnly: true,
                strokeWidth: 0,
                starShape: 'rounded',
            });

            $(".my-rating-1").starRating({
                starSize: 15,
                hoverColor: '#FFC107',
                activeColor: '#FFC107',
                useGradient: false,
                readOnly: true,
                strokeWidth: 0,
                starShape: 'rounded',
            });

            $(".my-rating-2").starRating({
                starSize: 35,
                hoverColor: '#FFC107',
                activeColor: '#FFC107',
                useGradient: false,
                strokeWidth: 0,
                ratedColors: ['#ff4343', '#f7a138', '#ffe337', '#b1d77b', '#18ba58'],
                starShape: 'rounded',
                disableAfterRate: false,
                onHover: function (currentIndex, currentRating, $el) {
                    $('.live-rating-2').text(currentIndex);
                },
                onLeave: function (currentIndex, currentRating, $el) {
                    $('.live-rating-2').text(currentRating);
                },
                callback: function (currentRating, $el) {
                    $('#rating').val(currentRating);
                }
            });

        });
    </script>

@stop
