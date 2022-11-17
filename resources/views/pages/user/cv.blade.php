@extends('layouts.user.masterNoHeader')
@section('title', 'CV') @section('style-libraries')
@stop @section('styles')
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

        @media print {
            * {
                -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
                color-adjust: exact !important; /*Firefox*/
            }
        }


    </style>
@stop @section('content')
    <div id="main py-4">

        <p id="btnPrintCV">
            <button class="btn btn-primary float-right">Tải CV</button>
        </p>
        <main class="container-fluid">
            <div class="row">
                <div class="col-8 mx-auto" id="cv">
                    <p>CV được tạo bởi IT-Job - Tô Lê Hoài</p>
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
                    <p>CV được tạo bởi IT-Job - Tô Lê Hoài</p>
                </div>
            </div>
        </main>
    </div>

@stop @section('scripts')
    <script>
        $("#btnPrintCV").click(function () {
            $("#cv").printThis({
                importCSS: true,            // import parent page css
                importStyle: true,         // import style tags
                printContainer: true,       // print outer container/$.selector
            });
        })
    </script>

@stop