@extends('layouts.admin.master')

@section('title', 'Thêm mới công nghệ')

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
                        <h3>Thêm mới công nghệ</h3>
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
                                            <form class="form form-vertical" name="addSkillForm"
                                                  id="addCompanyForm" method="POST"
                                                  action="{{ route('admin.add-technology') }}"
                                                  enctype="multipart/form-data"
                                            >
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">Tên công nghệ</label>
                                                                <input type="text" id="first-name-vertical"
                                                                       class="form-control {{ $errors->has('technologyName') ? 'is-invalid' : '' }}"
                                                                       name="technologyName"
                                                                       placeholder="Nhập vào tên công nghệ"
                                                                       value="{{ old('technologyName') }}"
                                                                       autocomplete="chrome-off"
                                                                >
                                                                <span class="text-danger">{{ $errors->first('technologyName') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-start">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                                Thêm mới
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
        let loadFile = function (event) {
            let output = document.getElementById('logoImg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script src="{{ asset('admin_resource/js/pages/addCompany.js') }}"></script>
@stop
