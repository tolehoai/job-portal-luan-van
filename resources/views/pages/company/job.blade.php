@extends('layouts.company.master')
@section('title', 'Thêm mới công việc - '. $company->name)
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
                            <form class="forms-sample addJobForm"
                                  name="addJobForm"
                                  id="addJobForm" method="POST"
                                  action="{{ route('company.addJob') }}"
                                  enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="form-group">
                                    <label for="jobName">Tên công việc</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('jobName ') ? 'is-invalid' : '' }}"
                                           id="jobName" name="jobName"
                                           placeholder="Nhập vào tên công việc"
                                            value=""
                                    >
                                    <span class="text-danger">{{ $errors->first('jobName') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="jobSalary">Mức lương (đơn vị VNĐ)</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('jobSalary ') ? 'is-invalid' : '' }}"
                                           id="jobSalary" name="jobSalary"
                                           placeholder="Nhập vào mức lương">
                                    <span class="text-danger">{{ $errors->first('jobSalary') }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobLevel">Vị trí công việc</label>
                                            <select class="form-control {{ $errors->has('jobLevel ') ? 'is-invalid' : '' }}"
                                                    id="jobLevel" name="jobLevel">
                                                @foreach ($jobLevels as $jobLevel)
                                                    <option
                                                            value="{{$jobLevel['id']}}"
                                                    >
                                                        {{$jobLevel['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('jobLevel') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobType">Hình thức công việc</label>
                                            <select class="form-control {{ $errors->has('jobType ') ? 'is-invalid' : '' }}"
                                                    id="jobType" name="jobType">
                                                @foreach ($jobTypes as $jobType)
                                                    <option
                                                            value="{{$jobType['id']}}"
                                                    >
                                                        {{$jobType['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('jobType') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="technologySelect">Lĩnh vực công việc</label>
                                            <fieldset
                                                    class="form-group {{ $errors->has('technologySelect ') ? 'is-invalid' : '' }}">
                                                <select
                                                        class="form-control form-select {{ $errors->has('officeSelect') ? 'is-invalid' : '' }}"
                                                        id="technologySelect"
                                                        name="technologySelect"
                                                >
                                                    @foreach ($technologies as $technology)
                                                        <option
                                                                value="{{$technology['id']}}"
                                                        >
                                                            {{$technology['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('technologySelect') }}</span>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="skillSelect">Kỹ năng công việc</label>
                                            <fieldset class="form-group">
                                                <select
                                                        class="form-control form-select {{ $errors->has('officeSelect') ? 'is-invalid' : '' }}"
                                                        id="skillSelect"
                                                        name="skillSelect[]"
                                                        multiple="multiple"
                                                >
                                                    @foreach ($skills as $skill)
                                                        <option
                                                                value="{{$skill['id']}}"
                                                        >
                                                            {{$skill['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('skillSelect') }}</span>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jobSalary">Văn phòng</label>
                                    <fieldset class="form-group">
                                        <select
                                                class="form-control form-select {{ $errors->has('officeSelect') ? 'is-invalid' : '' }}"
                                                id="officeSelect"
                                                name="officeSelect[]"
                                                multiple="multiple"
                                        >
                                            @foreach ($offices as $office)
                                                <option
                                                        value="{{$office['id']}}"
                                                >
                                                    {{$office['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('officeSelect') }}</span>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mô tả công việc</label>
                                    <textarea
                                            class="form-control {{ $errors->has('jobDesc') ? 'is-invalid' : '' }}"
                                            id="jobDesc"
                                            name="jobDesc"
                                            rows="3"
                                    ></textarea>
                                    <span class="text-danger">{{ $errors->first('jobDesc') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Yêu cầu công việc</label>
                                    <textarea
                                            class="form-control {{ $errors->has('jobRequirement ') ? 'is-invalid' : '' }}"
                                            id="jobRequirement"
                                            name="jobRequirement"
                                            rows="3"
                                    ></textarea>
                                    <span class="text-danger">{{ $errors->first('jobRequirement') }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm mới công việc</button>
                                <button class="btn btn-light">Huỷ bỏ</button>
                            </form>
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
        $("#officeSelect").select2({
            placeholder: "Chọn thành phố có văn phòng"
        });
        $("#technologySelect").select2({
            placeholder: "Chọn lĩnh vực công việc"
        });
        $("#skillSelect").select2({
            placeholder: "Chọn kỹ năng công việc"
        });

        //CKEDITOR
        ClassicEditor
            .create(document.querySelector('#jobDesc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#jobRequirement'))
            .catch(error => {
                console.error(error);
            });
        //End CKEDITOR

        // new AutoNumeric('#jobSalary', 'integer');
    </script>
@stop
