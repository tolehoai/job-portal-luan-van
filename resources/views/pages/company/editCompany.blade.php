@extends('layouts.company.master')
@section('title', 'Chỉnh sửa thông tin công ty - '. $company->name)
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
                    Chỉnh sửa thông tin công ty
                </h3>
            </div>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" name="addCompanyForm"
                                      id="addCompanyForm" method="POST"
                                      action="{{ route('company.edit') }}"
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
                                                           value="{{$company->name}}"
                                                           autocomplete="chrome-off"
                                                    >
                                                    <span class="text-danger">{{ $errors->first('companyName') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Quốc gia</label>
                                                    <select
                                                            class="form-control form-select {{ $errors->has('countrySelect') ? 'is-invalid' : '' }}"
                                                            id="countrySelect"
                                                            name="countrySelect">
                                                        <option
                                                                value="{{$company->country->id}}">{{$company->country->country_name}}</option>
                                                        @foreach ($countrys as $country)
                                                            <option
                                                                    value="{{$country['id']}}">{{$country['country_name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span
                                                            class="text-danger">{{ $errors->first('countrySelect') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Số lượng nhân viên</label>
                                                    <input type="number" id="numberOfPersonal"
                                                           class="form-control {{ $errors->has('numberOfPersonal') ? 'is-invalid' : '' }}"
                                                           name="numberOfPersonal"
                                                           placeholder="Nhập số lượng nhân sự"
                                                           value="{{$company->number_of_personal}}"
                                                           autocomplete="chrome-off"
                                                    >
                                                    <span
                                                            class="text-danger">{{ $errors->first('numberOfPersonal') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Mô tả công ty</label>
                                                    <textarea
                                                            class="form-control {{ $errors->has('companyDesc') ? 'is-invalid' : '' }}"
                                                            id="companyDesc"
                                                            name="companyDesc"
                                                            rows="3"
                                                    >
                                                        {{$company->company_desc}}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('companyDesc') }}</span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Tổng quan công ty</label>
                                                    <textarea
                                                        class="form-control {{ $errors->has('companyOverview') ? 'is-invalid' : '' }}"
                                                        id="companyOverview"
                                                        name="companyOverview"
                                                        rows="3"
                                                    >{{$company->company_overview}}
                                                    </textarea>
                                                    <span class="text-danger">{{ $errors->first('companyOverview') }}</span>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" id="companyAddress"
                                                           class="form-control {{ $errors->has('companyAddress') ? 'is-invalid' : '' }}"
                                                           name="companyAddress"
                                                           placeholder="Nhập địa chỉ công ty"
                                                           value="{{$company->address}}"
                                                           autocomplete="chrome-off"
                                                    >
                                                    <span
                                                            class="text-danger">{{ $errors->first('companyAddress') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" id="companyPhone"
                                                           class="form-control {{ $errors->has('companyPhone') ? 'is-invalid' : '' }}"
                                                           name="companyPhone"
                                                           placeholder="Nhập số điện thoại công ty"
                                                           value="{{$company->phone}}"
                                                           autocomplete="chrome-off"
                                                    >
                                                    <span
                                                            class="text-danger">{{ $errors->first('companyPhone') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Văn phòng</label>
                                                    <fieldset class="form-group">
                                                        <select
                                                                class="form-control form-select {{ $errors->has('officeSelect') ? 'is-invalid' : '' }}"
                                                                id="officeSelect"
                                                                name="officeSelect[]"
                                                                multiple="multiple"
                                                        >
                                                            @foreach ($company->office as $office)
                                                                <option
                                                                        value="{{$office['id']}}"
                                                                        selected
                                                                >
                                                                    {{$office['name']}}
                                                                </option>
                                                            @endforeach

                                                            @foreach ($cities as $city)
                                                                <option
                                                                        value="{{$city['id']}}"
                                                                >
                                                                    {{$city['name']}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                    <span
                                                            class="text-danger">{{ $errors->first('officeSelect') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Giờ bắt đầu làm việc</label>
                                                    <input type="text" id="startTimeWork"
                                                           class="form-control bg-transparent {{ $errors->has('startTimeWork') ? 'is-invalid' : '' }}"
                                                           name="startTimeWork"
                                                           value="{{$company->start_work_time}}"
                                                           placeholder="Chọn thời gian bắt đầu làm vệc"
                                                    />
                                                    <span
                                                            class="text-danger">{{ $errors->first('startTimeWork') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Giờ kết thúc làm việc</label>
                                                    <input type="text" id="endTimeWork"
                                                           class="form-control bg-transparent {{ $errors->has('endTimeWork') ? 'is-invalid' : '' }}"
                                                           name="endTimeWork"
                                                           value="{{$company->end_work_time}}"
                                                           placeholder="Chọn thời gian kết thúc làm vệc"
                                                    />
                                                    <span class="text-danger">{{ $errors->first('endTimeWork') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">Chọn hình ảnh
                                                        logo công ty</label>
                                                    <input
                                                            class="form-control {{ $errors->has('imgLogo') ? 'is-invalid' : '' }}"
                                                            type="file" id="imgLogo"
                                                            name="imgLogo" accept="image/*"
                                                            onchange="loadFile(event)">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('imgLogo') }}</span>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">Chọn ảnh bìa công
                                                        ty</label>
                                                    <input
                                                            class="form-control {{ $errors->has('imgCover') ? 'is-invalid' : '' }}"
                                                            type="file" id="imgCover"
                                                            name="imgCover" accept="image/*"
                                                            onchange="loadFileCover(event)">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('imgCover') }}</span>

                                            </div>
                                            <div class="col-lg-6 grid-margin stretch-card">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Logo hiện tại</th>
                                                            <th>Logo mới</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <img
                                                                        src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                                        style="width: 200px; height: auto"
                                                                        alt="image"
                                                                />
                                                            </td>
                                                            <td>
                                                                <img id="logoImg" style="width: 200px; height: auto"/>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 grid-margin stretch-card">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Cover hiện tại</th>
                                                            <th>Cover mới</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <table style="width:100%">
                                                            <tr>
                                                                <th>Cover hiện tại:</th>
                                                                <td>
                                                                    <img
                                                                            src="{{$company->cover !== null ? asset($company->cover->path) : asset('storage/cover/default.png')}}"
                                                                            alt="image"
                                                                            style="height: 120px; width: auto"
                                                                    />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Cover mới:</th>
                                                                <td>
                                                                    <img id="coverImg"
                                                                         style="height: 120px; width: auto"/>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        </tbody>
                                                    </table>
                                                </div>
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
@stop
@section('scripts')
    <script>
        //your js code here
        let loadFile = function (event) {
            let output = document.getElementById('logoImg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        let loadFileCover = function (event) {
            let output = document.getElementById('coverImg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script src="{{ asset('company_resource/js/pages/editCompany.js') }}"></script>
@stop
