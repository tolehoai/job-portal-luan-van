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
                    Chỉnh sửa công việc
                </h3>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample addJobForm"
                                  name="addJobForm"
                                  id="addJobForm" method="POST"
                                  action="{{ route('company.editJob',$job->id) }}"
                                  enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="form-group form-check form-check-info">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_active"
                                               @if($job->is_active) checked @endif value="1"
                                               value="{{old('is_active', $job->is_active)}}"
                                        >
                                        Công việc còn hiển thị
                                        <i class="input-helper"></i></label>
                                </div>
                                <div class="form-group">
                                    <label for="title">Tên công việc</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{old('title', $job->title)}}"
                                           placeholder="Nhập vào tên công việc">
                                </div>
                                <div class="form-group">
                                    <label for="salary">Mức lương (đơn vị VNĐ)</label>
                                    <input type="text" class="form-control" id="salary" name="salary"
                                           value="{{old('salary', $job->salary)}}"
                                           placeholder="Nhập vào mức lương">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="job_level_id">Vị trí công việc</label>
                                            <select class="form-control" id="job_level_id" name="job_level_id">
                                                @foreach ($jobLevels as $jobLevel)
                                                    <option
                                                            value="{{old('job_level_id',$jobLevel['id'])}}"
                                                            @if($job->job_level_id == $jobLevel['id']) selected @endif
                                                    >
                                                        {{$jobLevel['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="job_type_id">Hình thức công việc</label>
                                            <select class="form-control" id="job_type_id" name="job_type_id">
                                                @foreach ($jobTypes as $jobType)
                                                    <option
                                                            value="{{old('job_type_id',$jobType['id'])}}"
                                                            @if($job->job_type_id == $jobType['id']) selected @endif
                                                    >
                                                        {{$jobType['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="technology_id">Lĩnh vực công việc</label>
                                            <fieldset class="form-group">
                                                <select
                                                        class="form-control form-select {{ $errors->has('officeSelect') ? 'is-invalid' : '' }}"
                                                        id="technology_id"
                                                        name="technology_id"
                                                >
                                                    @foreach ($technologies as $technology)
                                                        <option
                                                                value="{{old('technology_id',$technology['id'])}}"
                                                                @if($job->technology_id == $technology['id']) selected @endif
                                                        >
                                                            {{$technology['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                                                value="{{old('technology_id',$technology['id'])}}"

                                                                value="{{$skill['id']}}"
                                                                @if(in_array($skill['id'], $job->skill->pluck('id')->toArray())) selected @endif
                                                        >
                                                            {{$skill['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                                        @if(in_array($office['id'], $job->city->pluck('id')->toArray())) selected @endif
                                                >
                                                    {{$office['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mô tả công việc</label>
                                    <textarea
                                            class="form-control {{ $errors->has('jobDesc') ? 'is-invalid' : '' }}"
                                            id="jobDesc"
                                            name="jobDesc"
                                            rows="3"
                                    >{{$job->job_desc}}</textarea>
                                    <span class="text-danger">{{ $errors->first('jobDesc') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Yêu cầu công việc</label>
                                    <textarea
                                            class="form-control {{ $errors->has('jobRequirement ') ? 'is-invalid' : '' }}"
                                            id="jobRequirement"
                                            name="jobRequirement"
                                            rows="3"
                                    >{{$job->job_requirements}}</textarea>
                                    <span class="text-danger">{{ $errors->first('jobRequirement') }}</span>
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
