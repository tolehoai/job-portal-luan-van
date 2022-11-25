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
                    Danh sách công việc
                </h3>
                <a href="{{route('company.addJob')}}" class="btn btn-primary btn-fw">Thêm mới công việc</a>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($jobs as $job)
                                <div class="job-item p-4 mb-4 card">
                                    <div class="row g-4 d-flex align-items-center card-body p-0">
                                        <div class="col-sm-12 col-md-6 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                 src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                 alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4 pl-3">
                                                <h5 class="mb-3 pl-1">{{$job->title}}</h5>
                                                <div class="d-flex flex-column ">
                                                    <span class="text-truncate me-3"><i
                                                            class="fa fa-map-marker-alt text-primary me-2"></i>
                                                 @foreach ($job->city as $city)
                                                            <p class="d-inline-block">{{$city->name}}@if (!$loop->last)
                                                                    ,
                                                                @endif </p>
                                                        @endforeach
                                                </span>
                                                    <div class="d-flex">
                                                        <div class="badge badge-info badge-pill p-1 m-1">
                                                            <p class="d-inline-block m-0 p-0">
                                                                {{$job->jobType->name}}
                                                            </p>
                                                        </div>
                                                        <div class="badge badge-warning badge-pill p-1 m-1">
                                                            <p class="d-inline-block m-0 p-0">
                                                                {{$job->technology->name}}
                                                            </p>
                                                        </div>

                                                        <div
                                                            class="badge badge-primary badge-pill p-1 m-1">
                                                            <i class="far fa-money-bill-alt text-white me-2"></i>
                                                            <x-money amount="{{$job->salary}}" currency="VND"/>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-3 flex-column align-items-center">
                                                <button
                                                    class="btn btn-success btn-rounded btn-fw">{{$job->jobLevel->name}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <a href="{{route('company.editJob', $job->id)}}" type="button"
                                               class="btn-primary btn-fw my-1 p-2 mr-2">Chỉnh sửa</a>
                                            <a class="btn-danger btn-fw my-1 deleteJobBtn d-inline-block">
                                                <form class="deleteJobForm"
                                                      action="{{route('company.deleteJob', $job->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </a>
                                        </div>
                                        <div class="col-md-2" style="font-size: 0.8rem">
                                            @if($job->user->count()>0)
                                                <a href="{{route('showJobCV',$job->id)}}"> {{$job->user->count()}}
                                                    Ứng cử viên</a>
                                            @else
                                                Chưa có ứng cử viên
                                            @endif
                                            <br>
                                            <a href="{{route('company.jobDetail', $job->id)}}">Chi tiết công việc</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {!! $jobs->links() !!}
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
        $(".deleteJobBtn").click(function (e) {
            e.preventDefault();
            // let form = $(e.target);
            let formData = $(e.target).closest('.deleteJobForm');
            Swal.fire({
                title: 'Xác nhận xóa?',
                text: "Bạn có chắc chắn muốn xóa công việc này",
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
    </script>
@stop
