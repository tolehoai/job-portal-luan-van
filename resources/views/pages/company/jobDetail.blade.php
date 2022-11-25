@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .bootstrap-timepicker-widget.dropdown-menu {
            z-index: 1050 !important;
        }

        .modal .picker .picker__holder {
            overflow: visible;
        }

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

        table .badge {
            border-radius: 6px;
            display: inline-block;
            font-size: 14px;
            min-width: 105px;
            padding: 8px 20px;
            font-weight: 800 !important;
            text-align: center;
        }

        .bg-success-light {
            background-color: rgba(15, 183, 107, .12) !important;
            color: #26af48 !important;
        }

        .bg-danger-light {
            background-color: rgb(255 218 218/49%) !important;
            color: red !important;
        }

        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
    </style>
@stop
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="mr-md-3 mr-xl-5">
                                <h2>Chi tiết công việc</h2>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <a href="{{route('company.addJob')}}" class="badge badge-success font-md">Thêm mới công
                                    việc</a>
                                <a href="{{route('company.jobList')}}" class="badge badge-primary font-md ml-2">Trở
                                    về</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="box-border-single">
                                    <div class="row mt-10">
                                        <div class="col-lg-8 col-md-12">
                                            <h3>{{$job->title}}</h3>
                                            <div class="mt-0 mb-15"><span
                                                    class="btn btn-info">{{$job->jobType->name}}</span></div>
                                        </div>
                                    </div>

                                    <div class="job-overview">
                                        <h4 class="border-bottom pb-15 mt-4 mb-3">Tổng quan</h4>
                                        <div class="sidebar-text-info ml-10 my-2">
                                            <span class="text-description industry-icon mb-10">Kỹ năng: </span>
                                            <strong class="small-heading">
                                                @foreach($job->skill as $skill)
                                                    {{$skill->name}}@if (!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                            </strong>
                                        </div>
                                        <div class="sidebar-text-info ml-10 my-2"><span
                                                class="text-description joblevel-icon mb-10">Trình độ công việc: </span><strong
                                                class="small-heading">{{$job->jobLevel->name}}</strong></div>
                                        <div class="sidebar-text-info ml-10"><span
                                                class="text-description salary-icon mb-10">Mức lương: </span><strong
                                                class="small-heading">
                                                <x-money amount="{{$job->salary}}" currency="VND"/>
                                            </strong></div>
                                        <div class="sidebar-text-info ml-10 my-2"><span
                                                class="text-description jobtype-icon mb-10">Hình thức công việc: </span><strong
                                                class="small-heading">{{$job->jobType->name}}</strong></div>
                                        <div class="sidebar-text-info ml-10"><span
                                                class="text-description salary-icon mb-10">Lĩnh vực việc làm: </span><strong
                                                class="small-heading">
                                                {{$job->technology->name}}
                                            </strong></div>
                                        <div class="sidebar-text-info ml-10 my-2"><span
                                                class="text-description jobtype-icon mb-10">Vị trí làm việc: </span><strong>
                                                @foreach ($job->city as $city)
                                                    <strong class="d-inline-block">{{$city->name}}@if (!$loop->last)
                                                            ,
                                                        @endif </strong>
                                                @endforeach
                                            </strong></div>
                                    </div>
                                    <div class="content-single mt-3">
                                        <h4>Mô tả công việc</h4>
                                        <p>{!! $job->job_desc !!}</p>
                                        <h4>Yêu cầu công việc</h4>
                                        <p>{!! $job->job_requirements !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4>Danh sách ứng viên của công việc này</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Level</th>
                                            <th>CV</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img
                                                        src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                                        alt="" style="width: 40px; height: 40px;">
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$job->jobLevel->name}}</td>
                                                <td>
                                                    <a href="{{route('cv', [$user->id, $job->id])}}">Xem CV</a>
                                                <td>{{$user->pivot->status}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($users->count() == 0)
                                        <div class="alert alert-info text-center info-text" role="alert">
                                            Không có ứng viên nào ứng tuyển công việc này
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4>Danh sách ứng viên được gợi ý</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>CV</th>
                                            <th>Kỹ năng</th>
                                            <th>Đã ứng tuyển</th>
                                            <th>Gửi mail gợi ý</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suggestUsers as $suggestUser)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img
                                                        src="{{$suggestUser->image !== null ? asset($suggestUser->image->path) : asset('storage/images/default.png')}}"
                                                        alt="" style="width: 40px; height: 40px;">
                                                </td>
                                                <td>{{$suggestUser->name}}</td>
                                                <td>{{$suggestUser->email}}</td>
                                                <td>{{$suggestUser->phone}}</td>
                                                <td>{{$suggestUser->city->name}}</td>
                                                <td>
                                                    <a href="{{route('cv', [$suggestUser->id, $job->id])}}">Xem CV</a>
                                                </td>
                                                <td>
                                                    @foreach($suggestUser->skill as $skill)
                                                        <span class="badge badge-primary my-1">{{$skill->name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($suggestUser->job->contains($job->id))
                                                        <span
                                                            class="badge badge-pill bg-success-light">Đã ứng tuyển / {{$user->pivot->status}}</span>

                                                    @else
                                                        <span
                                                            class="badge badge-pill bg-danger-light">Chưa ứng tuyển</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST"
                                                          action="{{route('company.sendInvitationMail', [$job->id,$suggestUser->id])}}">
                                                        @csrf
                                                        <button
                                                            type="submit"
                                                            class="btn btn-success m-1 p-1">
                                                            Gửi mail
                                                        </button>
                                                    </form>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($suggestUsers->count() == 0)
                                        <div class="alert alert-info text-center info-text" role="alert">
                                            Không có ứng viên nào được gợi ý
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-center pt-2 mt-2">
                                        {!! $suggestUsers->withQueryString()->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stop
        @section('scripts')
            <script>
                //your js code here
                $(document).ready(function () {
                });
            </script>

@stop
