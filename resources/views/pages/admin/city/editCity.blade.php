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
                        <h3>Chỉnh sửa thành phố</h3>
                    </div>
                </div>
            </div>
            <!-- Table head options start -->
            <section class="section">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-vertical" name="editCityForm"
                                                  id="editCityForm" method="POST"
                                                  action="{{ route('admin.edit-city', $city->id) }}"
                                                  enctype="multipart/form-data"
                                            >
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">Tên thành phố</label>
                                                                <input type="text" id="first-name-vertical"
                                                                       class="form-control {{ $errors->has('cityName') ? 'is-invalid' : '' }}"
                                                                       name="cityName"
                                                                       placeholder="Nhập vào tên kỹ năng"
                                                                       value="{{ $city->name}}"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span
                                                                    class="text-danger">{{ $errors->first('cityName') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-start">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                                Cập nhật
                                                            </button>
                                                            <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Nhập lại
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        //your js code here
    </script>
    <script src="{{ asset('admin_resource/js/pages/addCompany.js') }}"></script>
@stop
