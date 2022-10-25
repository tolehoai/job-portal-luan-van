@extends('layouts.admin.master')

@section('title', 'Admin')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group {
            padding: 2px 5px;
        }
    </style>
@stop


@section('content')
    <!-- this is content -->
    <div id="main">
        <div class="page-heading p-3">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Thêm danh sách công ty</h3>
                    </div>
                </div>
            </div>
            <!-- Table head options start -->
            <section class="section">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    Nhập thông tin công ty
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Vertical Form</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-vertical" name="addCompanyForm"
                                                  id="addCompanyForm" method="POST"
                                                  action="{{ route('admin.add-company') }}"
                                                  enctype="multipart/form-data"
                                            >
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">Tên công ty</label>
                                                                <input type="text" id="first-name-vertical"
                                                                       class="form-control {{ $errors->has('companyName') ? 'is-invalid' : '' }}"
                                                                       name="companyName"
                                                                       placeholder="Nhập vào tên công ty"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('companyName') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Quốc gia</label>
                                                                <fieldset class="form-group">
                                                                    <select class="form-control form-select {{ $errors->has('countrySelect') ? 'is-invalid' : '' }}"
                                                                            id="countrySelect"
                                                                            name="countrySelect">
                                                                        @foreach ($countrys as $country)
                                                                            <option value="{{$country['id']}}">{{$country['country_name']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                                <span class="text-danger">{{ $errors->first('countrySelect') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Số lượng nhân viên</label>
                                                                <input type="number" id="numberOfPersonal"
                                                                       class="form-control {{ $errors->has('numberOfPersonal') ? 'is-invalid' : '' }}"
                                                                       name="numberOfPersonal"
                                                                       placeholder="Nhập số lượng nhân sự"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('numberOfPersonal') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mô tả công ty</label>
                                                                <textarea
                                                                        class="form-control {{ $errors->has('companyDesc') ? 'is-invalid' : '' }}"
                                                                        id="companyDesc"
                                                                        name="companyDesc"
                                                                        rows="3">
                                                                </textarea>
                                                                <span class="text-danger">{{ $errors->first('companyDesc') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class=" form-group">
                                                                <label>Địa chỉ</label>
                                                                <input type="text" id="companyAddress"
                                                                       class="form-control {{ $errors->has('companyAddress') ? 'is-invalid' : '' }}"
                                                                       name="companyAddress"
                                                                       placeholder="Nhập địa chỉ công ty"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('companyAddress') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" id="companyPhone"
                                                                       class="form-control {{ $errors->has('companyPhone') ? 'is-invalid' : '' }}"
                                                                       name="companyPhone"
                                                                       placeholder="Nhập số điện thoại công ty"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('companyPhone') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" id="companyEmail"
                                                                       class="form-control {{ $errors->has('companyEmail') ? 'is-invalid' : '' }}"
                                                                       name="companyEmail"
                                                                       placeholder="Nhập email công ty"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('companyEmail') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Mật khẩu</label>
                                                                <input type="password" id="companyPassword"
                                                                       class="form-control {{ $errors->has('companyPassword') ? 'is-invalid' : '' }}"
                                                                       name="companyPassword"
                                                                       placeholder="Nhập mật khẩu cho công ty"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('companyPassword') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Giờ bắt đầu làm việc</label>
                                                                <input type="text" id="startTimeWork"
                                                                       class="form-control bg-transparent {{ $errors->has('startTimeWork') ? 'is-invalid' : '' }}"
                                                                       name="startTimeWork"
                                                                       placeholder="Chọn thời gian bắt đầu làm vệc"
                                                                />
                                                                <span class="text-danger">{{ $errors->first('startTimeWork') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Giờ kết thúc làm việc</label>
                                                                <input type="text" id="endTimeWork"
                                                                       class="form-control bg-transparent {{ $errors->has('endTimeWork') ? 'is-invalid' : '' }}"
                                                                       name="endTimeWork"
                                                                       placeholder="Chọn thời gian kết thúc làm vệc"
                                                                />
                                                                <span class="text-danger">{{ $errors->first('endTimeWork') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="formFile" class="form-label">Chọn hình ảnh
                                                                    logo công ty</label>
                                                                <input class="form-control {{ $errors->has('imgLogo') ? 'is-invalid' : '' }}"
                                                                       type="file" id="imgLogo"
                                                                       name="imgLogo" accept="image/*"
                                                                       onchange="loadFile(event)">
                                                            </div>
                                                            <span class="text-danger">{{ $errors->first('imgLogo') }}</span>
                                                            <img id="logoImg" style="width: 200px; height: auto"/>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                                Submit
                                                            </button>
                                                            <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Table head options end -->
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
    {{--quick defined--}}

    <script>
        //your js code here
        let loadFile = function (event) {
            let output = document.getElementById('logoImg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script src="{{ asset('admin_resource/js/pages/addCompany.js') }}"></script>
@stop
