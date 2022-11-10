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
                            @php ($badgeColor = ["badge-primary","badge-success","badge-danger","badge-warning", "badge-info"])
                            @foreach ($jobs as $job)
                                <div class="job-item p-4 mb-4 card">
                                    <div class="row g-4 d-flex align-items-center card-body p-0">
                                        <div class="col-sm-12 col-md-4 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                 src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                 alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4 pl-3">
                                                <h5 class="mb-3 pl-1">{{$job->title}}</h5>
                                                <div class="d-flex flex-column ">
                                                    <span class="text-truncate me-3"><i
                                                            class="fa fa-map-marker-alt text-primary me-2"></i>
                                                 @foreach ($job->city as $city)
                                                            <p class="d-inline-block">{{$city->name}}, </p>
                                                        @endforeach
                                                </span>
                                                    <div class="d-flex">
                                                        <div class="badge badge-info badge-pill p-1 m-1">
                                                            <p class="d-inline-block m-0 p-0">
                                                                {{$job->jobType->name}}
                                                            </p>
                                                        </div>

                                                        <div
                                                            class="badge {{$badgeColor[$loop->index]}} badge-pill p-1 m-1">
                                                            <i class="far fa-money-bill-alt text-white me-2"></i>
                                                            <x-money amount="{{$job->salary}}" currency="VND"/>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @foreach ($job->technology as $technology)
                                                <div
                                                    class="badge badge-info badge-pill p-2 m-1">
                                                    {{$technology->name}}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex mb-3 flex-column align-items-center">
                                                <button
                                                    class="btn btn-success btn-rounded btn-fw">{{$job->jobLevel->name}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
