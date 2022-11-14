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
    <div class="main-panel">
        <div class="content-wrapper mx-4">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h3 class="page-title my-3">
                    Danh sách công việc
                </h3>
                <a href="{{route('company.addJob')}}" class="btn btn-primary">Thêm mới công việc</a>
            </div>
            <div class="row gx-3">
                <div class="col-xl-3 col-lg-3 col-md-4 card mt-2">
                    <div class="row card-body">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45 d-flex">
                                <div class="ion d-inline-block p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                              d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"></path>
                                    </svg>
                                </div>
                                <h4 class="d-inline-block p-1">Lọc công việc</h4>
                            </div>
                            <!-- Job Category Listing start -->
                            <div class="job-category-listing">
                                <!-- single one -->
                                <div class="single-listing">
                                    <div class="small-section-tittle2">
                                        <h6>Hình thức làm việc</h6>
                                    </div>
                                    <!-- Select job type start -->
                                    @foreach ($jobTypes as $jobType)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$jobType->slug}}"
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{$jobType->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- Job Category Listing End -->
                        </div>
                    </div>

                </div>
                <div class="col-9 grid-margin stretch-card p-2">
                    <div class="card">
                        <div class="card-body">
                            @php ($badgeColor = ["bg-light-primary","bg-light-success","bg-light-danger","bg-light-warning", "bg-light-info"])
                            @foreach ($jobs as $job)
                                <div class="job-item p-4 mb-4 card border border-1">
                                    <div class="row g-4 d-flex align-items-center card-body p-0">
                                        <div class="col-sm-12 col-md-6 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                 src="{{$job->company->image !== null ? asset($job->company->image->path) : asset('storage/images/default.png')}}"
                                                 alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4 pl-3 d-flex flex-column">
                                                <h5 class="mb-3 pl-1">{{$job->title}}</h5>
                                                <div class="d-flex flex-column ">
                                                    <span class="text-truncate me-3"><i
                                                                class="fa fa-map-marker-alt text-primary me-2"></i>
                                                         @foreach ($job->city as $city)
                                                            <p class="d-inline-block">{{$city->name}}, </p>
                                                        @endforeach
                                                </span>
                                                    <div class="d-flex">
                                                        <div class="badge bg-light-warning p-1 m-1">
                                                            <p class="d-inline-block m-0 p-0">
                                                                {{$job->jobType->name}}
                                                            </p>
                                                        </div>

                                                        <div
                                                                class="badge {{$badgeColor[$loop->index]}} p-1 m-1">
                                                            <i class="far fa-money-bill-alt me-2"></i>
                                                            <x-money amount="{{$job->salary}}" currency="VND"/>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                    class="badge bg-light-primary p-2 m-1">
                                                {{$job->technology->name}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex mb-3 flex-column align-items-center">
                                                <button class="btn btn-light-success btn-rounded btn-fw">
                                                    <b>{{$job->jobLevel->name}}</b>
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
        {!! $jobs->withQueryString()->links() !!}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
    {{--quick defined--}}
    <script>
        $(function () {
            $(document).ready(function () {

            });

        });
    </script>
@stop
