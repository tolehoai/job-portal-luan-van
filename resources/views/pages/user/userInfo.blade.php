@extends('layouts.user.master') @section('title', 'Admin') @section('style-libraries') @stop @section('styles')
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


        .badge-skill {
            background-color: #ebf3ff;
            color: #002152;
        }

        #info {
            background-color: #029c7c;
        }

        #info1 {
            background-color: #029c7c;
        }

        .info2 {
            background-color: #28bb9c;
        }


        li {
            list-style-type: none;
        }


        #work img {
            height: 50px;

        }

        b {
            font-size: 22pt;
            color: #263831;
        }


    </style>
@stop @section('content')
    <div id="main py-4">
        <p id="btnPrintCV">Print</p>
        <main class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="emp-profile">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img">
                                    <img src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                         alt="profile" class="img-lg mb-3" style="width: 250px;">
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
                                        <h4 class="m-0 p-0">Thông tin</h4>
                                        <button type="button" class="genric-btn primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                            Chỉnh sửa thông tin
                                        </button>
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
                                            <h4 class="m-0 p-0">Giới thiệu bản thân</h5>
                                                @if($user->desc != null)
                                                    <button id="btnEditDesc" class="genric-btn primary">Chỉnh sửa
                                                    </button> @endif
                                        </div>
                                    </div>
                                </div>
                                @if($user->desc != null)
                                    {{$user->desc}}
                                @else
                                    <p class="font-italic" id="addDescText" style="cursor: pointer">+ Thêm giới thiệu
                                        bản thân
                                    </p>
                                @endif
                                <form method="POST" action="{{route('user.update')}}" name="addDescForm"
                                      class="descForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="desc">Nhập giới thiệu bản thân</label>
                                        <textarea class="form-control" id="desc" name="desc"
                                                  rows="3">{{$user->desc!=null?$user->desc:''}}</textarea>
                                        <div class="float-right pt-1">
                                            <button type="submit" class="genric-btn primary">Gửi</button>
                                            <button type="button" class="genric-btn danger" id="cancelDescText">Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            {{-- Ky nang--}}
                            <div class="userDesc col-md-12 ">
                                <div class="user-header mb-3">
                                    <div class="profile-head mt-2">
                                        <div class="d-flex justify-content-between pt-5">
                                            <h4 class="m-0 p-0">Kỹ năng</h4>
                                            @if(count($user->skill->all())!=0)
                                                <button id="btnEditSkill" class="genric-btn primary">Chỉnh sửa</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if(count($user->skill->all())!=0)
                                    @foreach($user->skill as $skill)
                                        <div class="badge badge-skill p-2 m-1">
                                            {{$skill->name}}
                                        </div>
                                    @endforeach
                                @else
                                    <p class="font-italic" id="addSkillText" style="cursor: pointer">+ Thêm kỹ năng</p>
                                @endif
                                <form method="POST" action="{{route('user.addSkill')}}" name="addSkillForm"
                                      class="skillForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="userDesc">Chọn kỹ năng</label>
                                        <select id="skill" name="skills[]" multiple="multiple"
                                                style="width: 100% !important;">
                                            @foreach($skills as $skill)
                                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="float-right pt-1">
                                            <button type="submit" class="genric-btn primary">Gửi</button>
                                            <button type="button" class="genric-btn danger" id="cancelSkillText">Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- Kinh nghiem--}}
                            <div class="userDesc col-md-12 ">
                                <div class="user-header mb-3">
                                    <div class="profile-head mt-2">
                                        <div class="d-flex justify-content-between pt-5">
                                            <h4 class="m-0 p-0">Kinh nghiệm làm việc</h4>
                                            <button id="btnEditExperience" class="genric-btn primary">Thêm mới
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{route('user.addExperience',$user->id)}}"
                                      name="addExperienceForm" class="experienceForm" id="experienceForm">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="company_name">Tên công ty</label>
                                            <input type="text" class="form-control" id="company_name"
                                                   name="company_name"
                                                   placeholder="Nhập tên công ty">
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-10">
                                                <label for="experience_title">Chọn chức danh</label>
                                                <select id="experience_title" name="title_id" style="width: 100%;">
                                                    @foreach($titles as $title)
                                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-check form-group">
                                            <input type="checkbox" class="form-check-input primary-checkbox"
                                                   id="is_current_job" name="is_current_job" value="1"
                                                   onclick="validate()">
                                            <label class="form-check-label" for="is_current_job">Đang làm việc ở
                                                đây</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class='col-6'>
                                                    <div class="form-group">
                                                        <div class='input-group date'>
                                                            <div id="datepicker-popup"
                                                                 class="input-group date datepicker">
                                                                <input type="text" class="form-control" id="start_date"
                                                                       name="start_date" placeholder="Ngày bắt đầu">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-6'>
                                                    <div class="form-group">
                                                        <div class='input-group date'>
                                                            <div id="datepicker-popup"
                                                                 class="input-group date datepicker">
                                                                <input type="text" class="form-control" id="end_date"
                                                                       name="end_date" placeholder="Ngày kết thúc">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Mô tả công việc</label>
                                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                        </div>
                                        <div class="float-right pt-1">
                                            <button type="submit" class="genric-btn primary">Gửi</button>
                                            <button type="button" class="genric-btn danger" id="cancelExperienceText">
                                                Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if(count($experiences->all())!=0)
                                    @foreach($experiences as $experience)
                                        <div class="working-experience-item mb-3 pb-3 border-bottom">
                                            <div class="info" data-users--edit-experience-target="info">
                                                <b style="font-size: 1.5rem">{{$experience->company_name}}</b>
                                                <div class="date-range">
                                                    {{date('d/m/Y', strtotime($experience->start_date))}} -
                                                    @if($experience->end_date == null)
                                                        Hiện tại
                                                    @else
                                                        {{date('d-m-Y', strtotime($experience->end_date))}}
                                                    @endif
                                                </div>
                                                <div class="job-title text-break">
                                                    <h5>{{$experience->title->name}}</h5>
                                                </div>
                                                <div class="job-title text-break pt-2 font-italic">
                                                    {{$experience->desc}}
                                                </div>
                                                <a class="my-profile__link updateExperienceBtn" style="cursor: pointer">
                                                    + Chỉnh sửa kinh nghiệm
                                                </a>
                                            </div>
                                        </div>
                                        {{-- form --}}
                                        <form method="POST" action="{{route('user.editExperience',$experience->id)}}"
                                              name="editExperienceForm "
                                              class="editExperienceForm mb-3 pb-5 border-bottom">
                                            @csrf
                                            <h5>Chỉnh sửa thông tin kinh nghiệm tại công
                                                ty {{$experience->company_name}}</h5>

                                            <div class="form-group">
                                                <label for="company_name">Tên công ty</label>
                                                <input type="text" class="form-control" id="company_name"
                                                       name="company_name"
                                                       value="{{$experience->company_name}}"
                                                       placeholder="Nhập tên công ty">
                                            </div>
                                            <div class="form-group form-group-select">
                                                <div class="mt-10">
                                                    <label for="experience_title_class">Chọn chức danh</label>
                                                    <select id="experience_title_class" class="experience_title_class"
                                                            name="title_id"
                                                            style="width: 100%;">
                                                        <option value="{{$experience->title_id}}">{{$experience->title->name}}
                                                        </option>
                                                        @foreach($titles as $title)
                                                            <option value="{{$title->id}}">{{$title->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-check form-group">
                                                <input type="checkbox" class="form-check-input primary-checkbox"
                                                       class="is_current_job_edit" name="is_current_job" value="1"
                                                       @if($experience->is_current_job == 1) checked @endif >
                                                <label class="form-check-label" for="is_current_job">Đang làm việc ở
                                                    đây</label>
                                            </div>
                                            <div class="form-group form-group-datetime">
                                                <div class="row">
                                                    <div class='col-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date'>
                                                                <div id="datepicker-popup"
                                                                     class="input-group date datepicker">
                                                                    <input type="text" class="form-control"
                                                                           class="start_date_edit"
                                                                           name="start_date" id="startDatetimeEdit"
                                                                           placeholder="Ngày bắt đầu"
                                                                           value="{{$experience->start_date}}">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class='col-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date'>
                                                                <div class="datepicker-popup"
                                                                     class="input-group date datepicker">
                                                                    <input type="text" class="form-control"
                                                                           class="end_date_edit"
                                                                           name="end_date" id="endDatetimeEdit"
                                                                           placeholder="Ngày kết thúc"
                                                                           value="{{$experience->end_date}}">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Mô tả công việc</label>
                                                <textarea class="form-control" id="desc" name="desc"
                                                          rows="3">{{$experience->desc}}</textarea>
                                            </div>
                                            <div class="float-right pt-1">
                                                <button type="submit" class="genric-btn primary">Gửi</button>
                                                <button type="button" class="genric-btn danger"
                                                        class="cancelEditExperienceText"
                                                        onclick="hideAllForm()">
                                                    Hủy bỏ
                                                </button>
                                            </div>

                                        </form>
                                    @endforeach
                                @else
                                    <p class="font-italic" id="addExperienceText" style="cursor: pointer">+ Thêm kinh
                                        nghiệm làm
                                        việc</p>
                                @endif

                            </div>

                            {{-- Hoc van--}}
                            <div class="userDesc col-md-12 ">
                                <div class="user-header mb-3">
                                    <div class="profile-head mt-2">
                                        <div class="d-flex justify-content-between pt-5">
                                            <h4 class="m-0 p-0">Học vấn</h4>
                                            <button id="btnEditEducation" class="genric-btn primary">Thêm mới
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{route('user.addEducation',$user->id)}}"
                                      name="addEducationForm" class="educationForm" id="educationForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="university_name">Tên trường</label>
                                        <input type="text" class="form-control" id="university_name"
                                               name="university_name"
                                               placeholder="Nhập tên trường">
                                    </div>
                                    <div class="form-group">
                                        <label for="major">Ngành học</label>
                                        <input type="text" class="form-control" id="major" name="major"
                                               placeholder="Nhập tên ngành học">
                                    </div>
                                    <div class="form-group">
                                        <label for="gpa">Điểm GPA</label>
                                        <input type="text" class="form-control" id="gpa" name="gpa"
                                               placeholder="Nhập số điểm GPA">
                                    </div>
                                    <div class="form-check form-group">
                                        <input type="checkbox" class="form-check-input primary-checkbox"
                                               id="is_graduate"
                                               name="is_graduate" value="0">
                                        <label class="form-check-label" for="is_current_job">
                                            Đang theo học ở đay
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class='col-6'>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <div id="datepicker-popup" class="input-group date datepicker">
                                                            <input type="text" class="form-control"
                                                                   id="education_start_date" name="start_date"
                                                                   placeholder="Ngày bắt đầu">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-6'>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <div id="datepicker-popup" class="input-group date datepicker">
                                                            <input type="text" class="form-control"
                                                                   id="education_end_date"
                                                                   name="end_date" placeholder="Ngày kết thúc">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Mô tả học vấn</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                        <small class="form-text text-muted">Gợi ý: Mô tả ngành học và kiến thức</small>
                                    </div>
                                    <div class="float-right pt-1">
                                        <button type="submit" class="genric-btn primary">Gửi</button>
                                        <button type="button" class="genric-btn danger" id="cancelEducationText">
                                            Hủy bỏ
                                        </button>
                                    </div>
                                </form>
                                @if(count($educations->all())!=0)
                                    @foreach($educations as $education)

                                        <div class="working-experience-item mb-3 pb-3 border-bottom">
                                            <div class="info" data-users--edit-experience-target="info">
                                                <b style="font-size: 1.5rem">{{$education->university_name}}</b>
                                                <div class="date-range">
                                                    {{date('d/m/Y', strtotime($education->start_date))}} - @if($education->end_date
                                        == null)
                                                        Hiện tại
                                                    @else
                                                        {{date('d-m-Y', strtotime($education->end_date))}}
                                                    @endif
                                                </div>
                                                <div class="job-title text-break">
                                                    <h5>{{$education->major}}</h5>
                                                </div>
                                                <div class="job-title text-break pt-2 font-italic">
                                                    {{$education->desc}}
                                                </div>
                                                <a class="my-profile__link updateEducationBtn" style="cursor: pointer">
                                                    + Chỉnh sửa học vấn
                                                </a>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{route('user.editEducation',$education->id)}}"
                                              name="editEducationForm"
                                              class="editEducationForm mb-3 pb-5 border-bottom">
                                            @csrf
                                            <h5>Chỉnh sửa thông tin học vấn tại {{$education->university_name}}</h5>

                                            <div class="form-group">
                                                <label for="university_name">Tên trường</label>
                                                <input type="text" class="form-control" id="university_name"
                                                       name="university_name"
                                                       placeholder="Nhập tên trường"
                                                       value="{{$education->university_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="major">Ngành học</label>
                                                <input type="text" class="form-control" id="major" name="major"
                                                       placeholder="Nhập tên ngành học" value="{{$education->major}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="gpa">Điểm GPA</label>
                                                <input type="text" class="form-control" id="gpa" name="gpa"
                                                       placeholder="Nhập số điểm GPA" value="{{$education->gpa}}">
                                            </div>
                                            <div class="form-check form-group">
                                                <input type="checkbox" class="form-check-input primary-checkbox"
                                                       id="is_graduate"
                                                       name="is_graduate" value="0"
                                                       @if(!$education->is_graduate) checked @endif >
                                                <label class="form-check-label" for="is_current_job">
                                                    Đang theo học ở đây
                                                </label>
                                            </div>
                                            <div class="form-group form-group-datetime">
                                                <div class="row">
                                                    <div class='col-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date'>
                                                                <div id="datepicker-popup"
                                                                     class="input-group date datepicker">
                                                                    <input type="text" class="form-control"
                                                                           class="start_date_edit"
                                                                           name="start_date" id="startDatetimeEdit"
                                                                           placeholder="Ngày bắt đầu"
                                                                           value="{{$education->start_date}}">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class='col-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date'>
                                                                <div class="datepicker-popup"
                                                                     class="input-group date datepicker">
                                                                    <input type="text" class="form-control"
                                                                           class="end_date_edit"
                                                                           name="end_date" id="endDatetimeEdit"
                                                                           placeholder="Ngày kết thúc"
                                                                           value="{{$education->end_date}}">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Mô tả học vấn</label>
                                                <textarea class="form-control" id="desc" name="desc"
                                                          rows="3">{{$education->desc}}</textarea>
                                                <small class="form-text text-muted">Gợi ý: Mô tả ngành học và kiến
                                                    thức</small>
                                            </div>
                                            <div class="float-right pt-1">
                                                <button type="submit" class="genric-btn primary">Gửi</button>
                                                <button type="button" class="genric-btn danger" id="cancelEducationText"
                                                        onclick="hideAllForm()">
                                                    Hủy bỏ
                                                </button>
                                            </div>
                                        </form>
                                    @endforeach
                                @else
                                    <p class="font-italic" id="addEducationText" style="cursor: pointer">+ Thêm thông
                                        tin học
                                        vấn</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6" id="cv">
                    <div class="row">
                        <div class="col-4 m-0 p-0" style="background: #28bb9c">
                            <div id="info">
                                <div id="info1" class="d-flex flex-column">
                                    <div class="d-flex justify-content-center pt-5">
                                        <img src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                             class="rounded-circle" alt="Ảnh" height="150px">
                                    </div>
                                    <div class="d-flex align-items-center flex-column pt-4">
                                        <h5 class="text-white">{{$user->name}}</h5>
                                        <h6 class="text-white">{{$user->title->name}}</h6>
                                    </div>
                                </div>
                                <div class="info2 p-3" style="font-size: 0.8rem !important;">
                                    <div class="text-white px-2">
                                        <br>
                                        <b class="mt-5 text-white" style="font-size: 0.9rem;">THÔNG TIN LIÊN HỆ</b>
                                        <ul class="bt-2">
                                            <li>Email: {{$user->email}}</li>
                                            <li>SĐT: {{$user->phone}}</li>
                                        </ul>
                                        <br>
                                        <b class="pt-3 text-white" style="font-size: 0.9rem">KỸ NĂNG</b>
                                        <p class="text-white mx-1 my-0" style="font-size: 0.9rem">
                                        <ul>
                                            @foreach($user->skill as $skill)
                                                <li>{{$skill->name}}</li>
                                            @endforeach
                                        </ul>
                                        </p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div id="work">
                                <div id="hocvan" class="pb-4 pt-5">
                                    <div class="d-flex align-items-center pb-4">
                                        <img style="width: 35px; height: 35px"
                                             src="{{ asset('user_resource/img/cv/gioitinh.png') }}"

                                             class="mr-2"
                                        >
                                        <br>
                                        <b style="font-size: 1.5rem">GIỚI THIỆU BẢN THÂN</b>
                                    </div>
                                    <span style="font-size: 0.9rem">{{$user->desc}}</span>
                                </div>

                                <div id="hocvan" class="pb-4">
                                    <div class="d-flex align-items-center pb-4">
                                        <img style="width: 35px; height: 35px"
                                             src="{{ asset('user_resource/img/cv/hocvan.png') }}"
                                             alt="học vấn"
                                             class="mr-2"
                                        >
                                        <br>
                                        <b style="font-size: 1.5rem">HỌC VẤN</b>
                                    </div>
                                    @foreach($educations as $education)
                                        <div class="pb-3">
                                            <h5 class="title mb-0"
                                                style="font-size: 1.1rem">{{$education->university_name}}</h5>
                                            <span style="font-size: 0.7rem">{{date('d/m/Y', strtotime($education->start_date))}} - {{$education->end_date!=null ? date('d/m/Y', strtotime($education->end_date)) : 'Hiện tại'}}</span>
                                            <div id="content_hocvan">
                                                <span style="font-size: 0.9rem">Chuyên ngành: {{$education->major}}</span>
                                                <br>
                                                @if($education->gpa !=null)
                                                    <span style="font-size: 0.9rem">Điểm trung bình: {{$education->gpa}}</span>
                                                    <br>
                                                @endif
                                                <span style="font-size: 0.9rem"
                                                      class="font-italic"> {{$education->desc}}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div id="kinhnghiem">
                                    <div class="d-flex align-items-center pb-4">
                                        <img class="imagecontent mr-2" style="width: 35px; height: 35px"
                                             src="{{ asset('user_resource/img/cv/vieclam.png') }}"
                                             alt="học vấn">
                                        <br>
                                        <b style="font-size: 1.5rem">KINH NGHIỆM VIỆC LÀM</b>
                                    </div>

                                    @foreach($experiences as $experience)
                                        <div class="pb-3">
                                            <h5 class="title mb-0"
                                                style="font-size: 1.1rem">{{$experience->company_name}}</h5>
                                            <span style="font-size: 0.7rem">{{date('d/m/Y', strtotime($experience->start_date))}} - {{$experience->end_date!=null ? date('d/m/Y', strtotime($experience->end_date)) : 'Hiện tại'}}</span>
                                            <div id="content_hocvan">
                                                <span style="font-size: 0.9rem">Vị trí: {{$experience->title->name}}</span>
                                                <br>
                                                <span style="font-size: 0.9rem"
                                                      class="font-italic"> {{$experience->desc}}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route( 'user.update')}}" method="POST"
                  enctype="multipart/form-data"
            >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="changeInformationModal">
                        <div class="col-lg-12 col-md-12">
                            @csrf
                            <div class="mt-10">
                                <label for="name">Họ và tên</label>
                                <input type="text" name="name" placeholder=" Nhập vào họ và tên "
                                       onfocus=" this.placeholder='' "
                                       onblur=" this.placeholder='Nhập vào họ và tên' "
                                       required="" class=" single-input "
                                       value=" {{$user->name}}">
                            </div>
                            <div class="mt-10">
                                <label for="title_id">Chọn chức danh</label>
                                <select id="title" name="title_id" style="width: 100%;">
                                    <option value="{{$user->title->id}}">{{$user->title->name}}</option>
                                    @foreach($titles as $title)
                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-10">
                                <label for="title_id">Số điện thoại</label>
                                <input type="text" name="phone" placeholder="Nhập vào số điện thoại"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Nhập vào số điện thoại'" required=""
                                       class="single-input" value="{{$user->phone}}">
                            </div>
                            <div class="mt-10">
                                <label for="formFile" class="form-label">Ảnh đại diện</label>
                                <input class="form-control" type="file" id="formFile" name="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn primary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="genric-btn danger">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--    <div class=" modal fade " id=" exampleModal " tabindex=" -1 " role=" dialog " aria-labelledby=" exampleModalLabel "--}}
    {{--         aria-hidden=" true ">--}}
    {{--        <div class=" modal-dialog " role=" document ">--}}
    {{--            <form action=" {{route( 'user.update')}} " method=" POST "--}}
    {{--                  enctype=" multipart/form-data "--}}
    {{--            >--}}
    {{--                <div class=" modal-content ">--}}
    {{--                    <div class=" modal-header ">--}}
    {{--                        <h5 class=" modal-title " id=" exampleModalLabel ">Chỉnh sửa thông tin</h5>--}}
    {{--                        <button type=" button " class=" close " data-dismiss=" modal " aria-label=" Close ">--}}
    {{--                            <span aria-hidden=" true ">&times;</span>--}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body" id="changeInformationModal">--}}
    {{--                        <div class="col-lg-12 col-md-12">--}}
    {{--                            @csrf--}}
    {{--                            <div class="mt-10">--}}
    {{--                                <label for="name">Họ và tên</label>--}}
    {{--                                <input type="text" name="name" placeholder=" Nhập vào họ và tên "--}}
    {{--                                       onfocus=" this.placeholder='' "--}}
    {{--                                       onblur=" this.placeholder='Nhập vào họ và tên' "--}}
    {{--                                       required=" " class=" single-input "--}}
    {{--                                       value=" {{$user->name}}">--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-10">--}}
    {{--                                <label for="title_id">Chọn chức danh</label>--}}
    {{--                                <select id="title" name="title_id" style="width: 100%;">--}}
    {{--                                    <option value="{{$user->title->id}}">{{$user->title->name}}</option>--}}
    {{--                                    @foreach($titles as $title)--}}
    {{--                                        <option value="{{$title->id}}">{{$title->name}}</option>--}}
    {{--                                    @endforeach--}}
    {{--                                </select>--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-10">--}}
    {{--                                <label for="title_id">Số điện thoại</label>--}}
    {{--                                <input type="text" name="phone" placeholder="Nhập vào số điện thoại"--}}
    {{--                                       onfocus="this.placeholder = ''"--}}
    {{--                                       onblur="this.placeholder = 'Nhập vào số điện thoại'" required=""--}}
    {{--                                       class="single-input" value="{{$user->phone}}">--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-10">--}}
    {{--                                <label for="formFile" class="form-label">Ảnh đại diện</label>--}}
    {{--                                <input class="form-control" type="file" id="formFile" name="avatar">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="button" class="genric-btn primary" data-dismiss="modal">Đóng</button>--}}
    {{--                        <button type="submit" class="genric-btn danger">Lưu</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}

@stop @section('scripts')
    <script>
        $(document).ready(function () {


            $("#btnPrintCV").click(function () {
                $("#cv").printThis({
                    importCSS: true,            // import parent page css
                    importStyle: false,         // import style tags
                    printContainer: true,       // print outer container/$.selector
                });
            })


            $(".educationForm").hide();

            $("#addEducationText, #btnEditEducation").click(function () {
                $(".educationForm").show(500);
            });
            $("#cancelEducationText").click(function () {
                $(".educationForm").hide(500);
            });

            $(".descForm").hide();

            $("#addDescText, #btnEditDesc").click(function () {
                $(".descForm").show(500);
            });
            $("#cancelDescText").click(function () {
                $(".descForm").hide(500);
            });

            $(".skillForm").hide();
            $("#addSkillText, #btnEditSkill").click(function () {
                $(".skillForm").show(500);
            });
            $("#cancelSkillText").click(function () {
                $(".skillForm").hide(500);
            });

            $(".experienceForm").hide();
            $("#addExperienceText, #btnEditExperience").click(function () {
                $(".experienceForm").show(500);
            });
            $("#cancelExperienceText").click(function () {
                $(".experienceForm").hide(500);
            });

            $('#skill').select2({
                placeholder: "Chọn kỹ năng",
                allowClear: true
            });

            $('#title').select2({
                dropdownParent: $('#changeInformationModal')
            });

            $('#experience_title').select2();
            $('.experience_title_class').select2();


            if ($("#start_date").length) {
                $('#start_date').datepicker({
                    format: 'dd-mm-yyyy',
                    timeFormat: 'HH:mm:ss',
                    onShow: function () {
                        this.setOptions({
                            maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                            maxTime: $('#tdate').val() ? $('#tdate').val() : false
                        });
                    }
                });
            }

            if ($("#end_date").length) {
                $('#end_date').datepicker({
                    format: 'dd-mm-yyyy',
                    timeFormat: 'HH:mm:ss',
                    onShow: function () {
                        this.setOptions({
                            maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                            maxTime: $('#tdate').val() ? $('#tdate').val() : false
                        });
                    }
                });
            }

            if ($("#education_start_date").length) {
                $('#education_start_date').datepicker({
                    format: 'dd-mm-yyyy',
                    timeFormat: 'HH:mm:ss',
                    onShow: function () {
                        this.setOptions({
                            maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                            maxTime: $('#tdate').val() ? $('#tdate').val() : false
                        });
                    }
                });
            }

            if ($("#education_end_date").length) {
                $('#education_end_date').datepicker({
                    format: 'dd-mm-yyyy',
                    timeFormat: 'HH:mm:ss',
                    onShow: function () {
                        this.setOptions({
                            maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                            maxTime: $('#tdate').val() ? $('#tdate').val() : false
                        });
                    }
                });
            }


            $('.start_date_edit').datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });


            $('.end_date_edit').datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });


        });

        function validate() {
            if (document.getElementById('is_current_job').checked) {
                $("#end_date").prop("disabled", true);
                $("#end_date").val('');
            } else {

                $("#end_date").prop("disabled", false);
            }
        }


        $(".updateExperienceBtn").click(function (e) {

            $(".editExperienceForm").hide(500)
            $(".experienceForm").hide(500)
            $(".working-experience-item").show(500)
            let form = $(this).parent().parent().next()
            let selectTitle = form.find('.form-group-select').find('#experience_title_class');
            let startDatetimeEdit = form.find('.form-group-datetime').find('#startDatetimeEdit');
            let endDatetimeEdit = form.find('.form-group-datetime').find('#endDatetimeEdit');
            startDatetimeEdit.datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });
            endDatetimeEdit.datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });
            selectTitle.select2();
            form.show(500);
            $(this).parent().parent().hide(500);
        })

        $(".updateEducationBtn").click(function (e) {

            $(".editEducationForm").hide(500)
            $(".educationForm").hide(500)
            $(".working-experience-item").show(500)
            let form = $(this).parent().parent().next()
            let startDatetimeEdit = form.find('.form-group-datetime').find('#startDatetimeEdit');
            let endDatetimeEdit = form.find('.form-group-datetime').find('#endDatetimeEdit');
            startDatetimeEdit.datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });
            endDatetimeEdit.datepicker({
                format: 'dd-mm-yyyy',
                timeFormat: 'HH:mm:ss',
                onShow: function () {
                    this.setOptions({
                        maxDate: $('#tdate').val() ? $('#tdate').val() : false,
                        maxTime: $('#tdate').val() ? $('#tdate').val() : false
                    });
                }
            });
            form.show(500);
            $(this).parent().parent().hide(500);
        })

        $(".editEducationForm").hide();
        $(".editExperienceForm").hide();

        function hideAllForm() {
            $(".editEducationForm").hide(500);
            $(".editExperienceForm").hide(500);
            $(".working-experience-item").show(500)
        }
    </script>

@stop