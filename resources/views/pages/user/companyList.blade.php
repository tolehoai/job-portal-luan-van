@extends('layouts.user.master') @section('title', 'Admin') @section('style-libraries') @stop @section('styles')
    {{--custom css item suggest search--}}
    <style>
        .our-services .single-services {
            border: 1px solid #dafcef !important;
            padding: 44px 0;
            -webkit-transition: .4s;
            -moz-transition: .4s;
            -o-transition: .4s;
            transition: .4s;
        }

    </style>
@stop @section('content')

    <div class="job-listing-areapb-120 mx-5">
        <div class="container-fluid">
            {{--            Header--}}
            <div class="banner-hero banner-single banner-single-bg px-2 mb-5">
                <div class="block-banner text-center">
                    <h3 class="wow animate__ animate__fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <h2 style="color: #fb246a;">Danh sách công ty </h2>
                    </h3>
                </div>
            </div>
            {{--            End Header--}}

            <div class="row">
                <!-- Left content -->
                <!-- Right content -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <!-- Section Tittle -->
                                <div class="row d-flex justify-contnet-center">
                                    <div class="col-lg-12">
                                        <div class="section-tittle text-center mb-70">
                                            <h6>Chúng tôi có <span
                                                    class="d-inline-block">{{ $companies->count() }}</span> công ty</h6>
                                        </div>
                                    </div>
                                    @foreach($companies as $company)

                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <a href="{{route('company.detail', $company->id)}}">
                                                <div class="single-services text-center mb-30">
                                                    <div class="company-logo">

                                                        <img
                                                            src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                            style="width: 200px; height: 200px; border-radius: 15%;"
                                                            alt="{{ $company->name }}">

                                                    </div>
                                                    <div class="services-cap mt-3">
                                                        <h5>{{$company->name}}</h5>
                                                        <a href="###"><p style="color: #fb246a">{{$company->jobs->count()}} việc làm</p></a>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                {!! $companies->withQueryString()->links() !!}
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
    </div>

@stop @section('scripts')
    <script>
        $(document).ready(function () {
            $('#btnSearchJob').click(function () {
                $('#searchJobForm').submit();
            })
            $('#city').select2({
                theme: "material"
            });
            $('#cityFilter').select2({
                theme: "material"
            });
            $('#technologyFilter').select2({
                theme: "material"
            });
            $('#salaryFilter').niceSelect();
            $('#sortJob').niceSelect();
        })
    </script>

@stop
