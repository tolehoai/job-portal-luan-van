@extends('layouts.user.master')

@section('title', 'Admin')

@section('style-libraries')

@stop

@section('styles')
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

        .profile-img .file {
            position: relative;
            overflow: hidden;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
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

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
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

        .profile-work {
            padding: 14%;
            margin-top: -15%;
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
    </style>
@stop

@section('content')
    <div id="main py-4">
        <main class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="emp-profile">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img">
                                    <img src="https://i.ibb.co/Fxy91Tb/295496107-2066395933525478-7766139268625854526-n.jpg"
                                         style="width: 250px;"/>
                                </div>
                            </div>
                            <div class="col-md-12 user-header mb-3">
                                <div class="profile-head mt-2">
                                    <h5>
                                        {{$user->name}}
                                    </h5>
                                    <h6>
                                        {{$user->title->name}}
                                    </h6>
                                    <div class="d-flex justify-content-between pt-5">
                                        <h5 class="m-0 p-0">Thông tin</h5>
                                        <a href="#" class="genric-btn primary">Chỉnh sửa thông tin</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black">Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black">Số điện thoại</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$user->phone}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black">Chức danh</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$user->title->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="userDesc col-md-12 ">
                                <div class="user-header mb-3">
                                    <div class="profile-head mt-2">
                                        <div class="d-flex justify-content-between pt-5">
                                            <h5 class="m-0 p-0">Giới thiệu bản thân</h5>
                                            @if($user->desc != null)
                                                <button id="btnEditDesc" class="genric-btn primary">Chỉnh sửa</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($user->desc != null)
                                    {{$user->desc}}
                                @else
                                    <p class="font-italic" id="addDescText" style="cursor: pointer">+ Thêm giới thiệu
                                        bản thân</p>
                                @endif
                                <form method="POST" action="{{route('user.addDesc')}}" name="addDescForm"
                                      class="descForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="userDesc">Nhập giới thiệu bản thân</label>
                                        <textarea class="form-control"
                                                  id="userDesc"
                                                  name="userDesc"
                                                  rows="3">{{$user->desc!=null?$user->desc:''}}</textarea>
                                        <div class="float-right pt-1">
                                            <button type="submit" class="genric-btn primary">Gửi</button>
                                            <button type="button" class="genric-btn danger" id="cancelDescText">Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="userDesc col-md-12 ">
                                <div class="user-header mb-3">
                                    <div class="profile-head mt-2">
                                        <div class="d-flex justify-content-between pt-5">
                                            <h5 class="m-0 p-0">Kỹ năng</h5>
                                            @if($user->desc != null)
                                                <button id="btnEditDesc" class="genric-btn primary">Chỉnh sửa</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($user->desc != null)
                                    {{$user->desc}}
                                @else
                                    <p class="font-italic" id="addDescText" style="cursor: pointer">+ Thêm kỹ năng</p>
                                @endif
                                <form method="POST" action="{{route('user.addDesc')}}" name="addDescForm"
                                      class="descForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="userDesc">Nhập giới thiệu bản thân</label>
                                        <textarea class="form-control"
                                                  id="userDesc"
                                                  name="userDesc"
                                                  rows="3">{{$user->desc!=null?$user->desc:''}}</textarea>
                                        <div class="float-right pt-1">
                                            <button type="submit" class="genric-btn primary">Gửi</button>
                                            <button type="button" class="genric-btn danger" id="cancelDescText">Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-6">
                    Your CV here
                </div>
            </div>

        </main>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".descForm").hide();
            $("#addDescText, #btnEditDesc").click(function () {
                $(".descForm").show(500);
            });
            $("#cancelDescText").click(function () {
                $(".descForm").hide(500);
            });
        });
    </script>

@stop



