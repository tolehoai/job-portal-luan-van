@extends('layouts.admin.master')

@section('title', 'Danh sách công nghệ')

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
                        <h3>Danh sách công nghệ</h3>
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
                                    <a href="{{route('admin.add-technology')}}" class="btn btn-success">Thêm mới công
                                        nghệ</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th style="width: 100px">Số thứ tự</th>
                                            <th>Tên công nghệ</th>
                                            <th style="width: 200px">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($technologies as $technology)
                                            <tr>
                                                <td style="text-align: center">{{$technologies->currentPage() * $technologies->perPage() - $technologies->perPage() + 1 +$loop->index}}</td>
                                                <td>{{ $technology->name }}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                       href="{{route('admin.edit-technology', $technology->id)}}">Chỉnh
                                                        sửa</a>
                                                    <a class="deleteTechnologyBtn d-inline-block">
                                                        <form class="deleteTechnologyForm"
                                                              action="{{route('admin.delete-technology')}}"
                                                              method="POST">
                                                            @csrf
                                                            <input type="hidden" name="technologyId"
                                                                   value="{{$technology->id}}">
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
            {!! $technologies->withQueryString()->links() !!}
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
            $(document).ready(function () {

                $(".deleteTechnologyBtn").click(function (e) {
                    e.preventDefault();
                    // let form = $(e.target);
                    let formData = $(e.target).closest('.deleteTechnologyForm');
                    Swal.fire({
                        title: 'Xác nhận xóa?',
                        text: "Bạn có chắc chắn muốn xóa công nghệ này",
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
