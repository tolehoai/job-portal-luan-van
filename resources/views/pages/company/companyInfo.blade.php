@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .banner-hero.banner-image-single {
            padding: 20px 0px 20px 0px;
        }

        .banner-hero {
            padding: 0px 65px 0px 15px;
            position: relative;
            max-width: 1770px;
            margin: 0 auto;
        }

        .banner-hero.banner-image-single img {
            width: 100%;
            border-radius: 16px;
        }

        a, button, img, input, span, h4 {
            transition: all 0.3s ease 0s;
        }

        img {
            max-width: 100%;
        }
    </style>
@stop
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="banner-hero banner-image-single"><img
                                        src="{{$company->cover !== null ? asset($company->cover->path) : asset('storage/cover/default.png')}}"
                                        alt="jobBox"
                                        style="height: 400px; width: 100%; object-fit: cover; border-radius: 16px;">
                            </div>
                            <div class="company-info d-flex align-items-end">
                                <div class="company-info-logo pr-3">
                                    <img
                                            src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                            alt="profile" class="img-lg rounded mb-3"
                                            style="width: 92px"
                                    >
                                </div>
                                <div class="company-info-content">
                                    <h3 class="page-title">
                                        {{$company->name}}
                                    </h3>
                                    <p>{!! $company->company_desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="company-detail">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Thông tin chi tiết:</h5>
                                    <a href="{{ route('company.edit') }}" class="btn btn-success btn-fw btn-icon-text">
                                        Chỉnh sứa thông tin
                                        <i class="fas fa-pencil-alt btn-icon-append"></i>
                                    </a>
                                </div>
                                <div class="company-info">
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Địa chỉ: </p>
                                        <p class="d-inline-block">{{$company->address}}</p>
                                    </address>
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Email: </p>
                                        <p class="d-inline-block">{{$company->email}}</p>
                                    </address>
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Số điện thoại: </p>
                                        <p class="d-inline-block">{{$company->phone}}</p>
                                    </address>
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Số lượng nhân viên: </p>
                                        <p class="d-inline-block">{{$company->number_of_personal}}</p>
                                    </address>
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Giờ bắt đầu làm việc: </p>
                                        <p class="d-inline-block">{{$company->start_work_time}}</p>
                                    </address>
                                    <address>
                                        <p class="font-weight-bold d-inline-block">Giờ kết thúc làm việc: </p>
                                        <p class="d-inline-block">{{$company->end_work_time}}</p>
                                    </address>
                                </div>
                            </div>
                            <h5>Danh sách văn phòng:</h5>
                            <div class="col-lg-6 grid-margin stretch-card m-0 p-0">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên văn phòng</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($company->office as $office)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$company->name}} - {{$office->name}} Office</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="far fa-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@stop
@section('scripts')
@stop
