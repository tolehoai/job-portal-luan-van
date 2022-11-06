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
    <!-- this is content -->
    <div id="main">
        <div class="page-heading p-3">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Danh sách công ty</h3>
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
                                    <a href="{{route('admin.add-company')}}" class="btn btn-success">Thêm mới công
                                        ty</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                        <tr>
                                            <th style="width: 130px">Số thứ tự</th>
                                            <th>Tên công ty</th>
                                            <th style="width: 200px">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($companys as $company)
                                            <tr>
                                                <td style="text-align: center">{{$companys->currentPage() * $companys->perPage() - $companys->perPage() + 1 +$loop->index}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img
                                                                src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">{{$company->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                       href="{{route('admin.edit-company', $company->id)}}">Chỉnh
                                                        sửa
                                                    </a>
                                                    <a class="deleteCityBtn d-inline-block">
                                                        <form class="deleteCityForm"
                                                              action="{{route('admin.delete-city')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="cityId" value="{{$company->id}}">
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {!! $companys->withQueryString()->links() !!}
            <!-- Table head options end -->
        </div>
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
            // your custom javascript
        });
    </script>
@stop
