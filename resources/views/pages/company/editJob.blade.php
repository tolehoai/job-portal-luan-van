@extends('layouts.company.master')
@section('title', 'Chỉnh sửa công việc')
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                               @if($job->is_active) checked @endif  value="1"
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
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="salary">Mức lương (đơn vị VNĐ)</label>
                                        <input type="text" class="form-control" id="salary" name="salary"
                                               value="{{old('salary', $job->salary)}}"
                                               placeholder="Nhập vào mức lương">
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="experience_year_id">Số năm kinh nghiệm</label>
                                        <select class="form-control" id="experience_year_id" name="experience_year_id">
                                            @foreach($experienceYears as $experienceYear)
                                                <option value="{{ $experienceYear->id }}"
                                                        @if($experienceYear->id == $job->experience_year_id) selected @endif
                                                >{{ $experienceYear->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('experience_year_id') }}</span>
                                    </div>
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
                                            <span class="text-danger">{{ $errors->first('job_level_id') }}</span>
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
                                            <span class="text-danger">{{ $errors->first('job_type_id') }}</span>
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
                                                <span class="text-danger">{{ $errors->first('technology_id') }}</span>
                                            </fieldset>
                                        </div>
                                    </div>
                                    @foreach ($skills as $skill)

                                    @endforeach
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
                                                            value="{{$skill->id}}"
                                                            @foreach($job->skill as $jobSkill)
                                                                @if($jobSkill['id'] == $skill->id)
                                                                    selected
                                                            @endif
                                                            @endforeach
                                                        >
                                                            {{$skill->name}}
                                                        </option>

                                                    @endforeach
                                                    @foreach($otherSkill as $jobSkill)
                                                        <option
                                                            value="{{$jobSkill}}"
                                                            selected
                                                        >
                                                            {{$jobSkill}}
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
                                                    @if(in_array($office['id'], $job->city->pluck('id')->toArray())) selected @endif
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
                                        class="form-control {{ $errors->has('job_desc') ? 'is-invalid' : '' }}"
                                        id="job_desc"
                                        name="job_desc"
                                        rows="3"
                                    >{{$job->job_desc}}</textarea>
                                    <span class="text-danger">{{ $errors->first('job_desc') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Yêu cầu công việc</label>
                                    <textarea
                                        class="form-control {{ $errors->has('job_requirement ') ? 'is-invalid' : '' }}"
                                        id="job_requirement"
                                        name="job_requirement"
                                        rows="3"
                                    >{{$job->job_requirements}}</textarea>
                                    <span class="text-danger">{{ $errors->first('job_requirement') }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
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
            placeholder: "Chọn kỹ năng công việc",
            tags: true
        });

        //CKEDITOR
        ClassicEditor
            .create(document.querySelector('#job_desc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#job_requirement'))
            .catch(error => {
                console.error(error);
            });
        //End CKEDITOR

        // new AutoNumeric('#jobSalary', 'integer');
    </script>
@stop
