@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
        ul.timeline-3 {
            list-style-type: none;
            position: relative;
        }

        ul.timeline-3:before {
            content: " ";
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline-3 > li {
            margin: 20px 0;
            padding-left: 20px;
        }

        ul.timeline-3 > li:before {
            content: " ";
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
    </style>
@stop
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Lịch sử ứng tuyển của ứng viên {{$user->name}} tại công
                    ty {{\Illuminate\Support\Facades\Auth::user()->name}}
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <h4>Thông tin ứng cử viên </h4>
                                            <div class="row">
                                                <div class="col-4 d-flex justify-content-center align-items-center">
                                                    <img
                                                        src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                                        alt="" style="width: 100px; height: 100px;">
                                                </div>
                                                <div class="col-8">
                                                    <p>Họ và tên: {{$user->name}}</p>
                                                    <p>Email: {{$user->email}}</p>
                                                    <p>Số điện thoại: {{$user->phone}}</p>
                                                    <p>Địa chỉ: {{$user->city->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h4 style="margin-left: 1.2rem;">Lịch sử ứng tuyển</h4>
                                        <ul class="timeline-3">
                                            @foreach($histories as $history)
                                                <li>
                                                    <div class="row d-flex flex-row ml-2">
                                                        <div class="ml-2 d-inline-block">
                                                            <img
                                                                src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                                                style="width: 40px ; height: 40px; border-radius: 50%"
                                                                alt="user" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="">
                                                            <h5 class="ml-2">{{$history['jobName']}}</h5>
                                                            <p class="ml-2">{{$user->name}}</p>
                                                            <p class="ml-2">{{$history['timestamp']}}</p>
                                                            <p class="ml-2">
                                                                @if($history['userStatus']=='Đang phỏng vấn')
                                                                    <span
                                                                        class="badge badge-warning">Đang phỏng vấn</span>
                                                                @elseif($history['userStatus']=='Đã phỏng vấn - Chờ phản hồi')
                                                                    <span class="badge badge-info">Đã phỏng vấn - Chờ phản hồi</span>
                                                                @elseif($history['userStatus']=='Chờ xử lý')
                                                                    <span
                                                                        class="badge badge-primary">Chờ xử lý</span>
                                                                @elseif($history['userStatus']=='Chấp nhận offer')
                                                                    <span
                                                                        class="badge badge-success">Chấp nhận offer</span>
                                                                @elseif($history['userStatus']=='Không phù hợp')
                                                                    <span
                                                                        class="badge badge-danger">Không phù hợp</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
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

    </script>
@stop
