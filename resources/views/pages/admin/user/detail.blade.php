@extends('layouts.admin.master')

@section('title', 'Chi tiết người dùng')

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
                        <h3>Thông tin người dùng</h3>
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
                                    <div class="col-6" id="cv">
                                        <div class="row">
                                            <div class="col-4 m-0 p-0" style="background: #28bb9c">
                                                <div id="info">
                                                    <div id="info1" class="d-flex flex-column">
                                                        <div class="d-flex justify-content-center pt-5">
                                                            <img
                                                                src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                                                class="rounded-circle" alt="Ảnh" height="150px">
                                                        </div>
                                                        <div class="d-flex align-items-center flex-column pt-4">
                                                            <h5 class="text-white text-center">{{$user->name}}</h5>
                                                            <h6 class="text-white text-center"
                                                                style="font-size: 0.9rem !important;">@if($user->title)
                                                                    {{$user->title->name}}
                                                                @endif</h6>
                                                        </div>
                                                    </div>
                                                    <div class="info2 p-3" style="font-size: 0.8rem !important;">
                                                        <div class="text-white px-2">
                                                            <br>
                                                            <b class="mt-5 text-white" style="font-size: 0.9rem;">THÔNG
                                                                TIN LIÊN HỆ</b>
                                                            <ul class="bt-2">
                                                                <li>Email: {{$user->email}}</li>
                                                                <li>SĐT: {{$user->phone}}</li>
                                                            </ul>
                                                            <br>
                                                            <b class="pt-3 text-white" style="font-size: 0.9rem">KỸ
                                                                NĂNG</b>
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
                                                <span
                                                    style="font-size: 0.9rem">Chuyên ngành: {{$education->major}}</span>
                                                                    <br>
                                                                    @if($education->gpa !=null)
                                                                        <span
                                                                            style="font-size: 0.9rem">Điểm trung bình: {{$education->gpa}}</span>
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
                                                            <img class="imagecontent mr-2"
                                                                 style="width: 35px; height: 35px"
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
                                                <span
                                                    style="font-size: 0.9rem">Vị trí: {{$experience->title->name}}</span>
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
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            </section>

        </div>
        @stop

        @section('scripts')

            {{--quick defined--}}
            <script>
                $(function () {
                    $(document).ready(function () {

                        $(".deleteUserBtn").click(function (e) {
                            e.preventDefault();
                            // let form = $(e.target);
                            let formData = $(e.target).closest('.deleteUserForm');
                            Swal.fire({
                                title: 'Xác nhận xóa?',
                                text: "Bạn có chắc chắn muốn xóa người dùng này",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Xác nhận',
                                cancelButtonText: 'Hủy',
                                showCloseButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    formData.submit();
                                }
                            })
                        })
                    });

                });
            </script>
@stop
