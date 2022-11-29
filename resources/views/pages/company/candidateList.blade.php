@extends('layouts.company.master')
@section('title', 'Danh sách ứng cử viên - '. $company->name)
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
                    Danh sách ứng viên
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>CV</th>
                                        <th>Lịch sử ứng tuyển</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img
                                                    src="{{$user->image !== null ? asset($user->image->path) : asset('storage/images/default.png')}}"
                                                    alt="" style="width: 40px; height: 40px;">
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->city->name}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <a href="{{route('showOnlyCv', [$user->id])}}">Xem CV</a>
                                            </td>
                                            <td>
                                                <a href="{{route('company.showCandidateHistory',[\Illuminate\Support\Facades\Auth::id(), $user->id])}}">Xem
                                                    lịch sử ứng tuyển</a></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        @if($users->count() == 0)
                            <div class="alert alert-info text-center" role="alert">
                                Không có ứng viên nào
                            </div>
                        @endif
                        {{--                        Render pagination--}}
                        <div class="d-flex justify-content-center">
                            {!! $users->withQueryString()->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>

    </script>
@stop
