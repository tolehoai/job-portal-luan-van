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
                        <h3>Danh sách người dùng</h3>
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
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                            <tr>
                                                <th style="width: 50px">Số thứ tự</th>
                                                <th style="width: 70%">Người dùng</th>
                                                <th style="width: 40px">Hành động</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td style="text-align: center">{{$users->currentPage() * $users->perPage() - $users->perPage() + 1 +$loop->index}}</td>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img
                                                                    src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">{{ $user->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <div class=" mb-0">
                                                            <a class="btn btn-primary d-inline-block"
                                                               href="{{route('admin.userDetail',$user->id)}}"
                                                            >
                                                                Xem chi tiết
                                                            </a>
                                                            <a class="deleteUserBtn d-inline-block">
                                                                <form class="deleteUserForm"
                                                                      action="{{route('user.delete',$user->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </a>
                                                        </div>

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
                </div>
            </section>
            {!! $users->withQueryString()->links() !!}
            <!-- Table head options end -->
        </div>
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
