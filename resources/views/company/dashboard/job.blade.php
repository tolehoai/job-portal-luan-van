@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
    </style>
@stop
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Thêm mới công việc
                </h3>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên công việc</label>
                                    <input type="text" class="form-control" id="exampleInputName1"
                                           placeholder="Nhập vào tên công việc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Mức lương</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3"
                                           placeholder="Nhập vào mức lương">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Văn phòng</label>
                                    <input type="password" class="form-control" id="exampleInputPassword4"
                                           placeholder="Chọn văn phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Hình thức làm việc</label>
                                    <input type="password" class="form-control" id="exampleInputPassword4"
                                           placeholder="Chọn hình thức làm việc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Mô tả công việc</label>
                                    <input type="password" class="form-control" id="exampleInputPassword4"
                                           placeholder="Nhập mô tả công việc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Yêu cầu công việc</label>
                                    <input type="password" class="form-control" id="exampleInputPassword4"
                                           placeholder="Nhập yêu cầu công việc">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
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
