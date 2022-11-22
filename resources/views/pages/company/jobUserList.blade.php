@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .bootstrap-timepicker-widget.dropdown-menu {
            z-index: 1050 !important;
        }

        .modal .picker .picker__holder {
            overflow: visible;
        }
    </style>
@stop
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="mr-md-3 mr-xl-5">
                                <h2>Job User List</h2>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <th>Số điện thoại</th>
                                        <th>Level</th>
                                        <th>CV</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>

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
                                            <td>{{$user->phone}}</td>
                                            <td>{{$job->jobLevel->name}}</td>
                                            <td>
                                                <a href="{{route('cv', [$user->id, $job->id])}}">Xem CV</a>
                                            <td>{{$user->pivot->status}}</td>
                                            <td>
                                                <form method="POST"
                                                      action="{{route('changeCandidateStatus',[$job->id, $user->id])}}"
                                                      id="changeActionForm"
                                                >
                                                    @csrf
                                                    @if($user->pivot->status == 'Chờ xử lý')

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="badge badge-primary text-white"
                                                                data-toggle="modal" data-target="#exampleModal"
                                                                style="cursor: pointer">
                                                            Mời phỏng vấn
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Mời phỏng vấn</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class='input-group date'
                                                                             id='datetimepicker1'>
                                                                            Ngày phỏng vấn:
                                                                            <input type="text" name="date"
                                                                                   class="form-control"
                                                                                   id="datetimepicker1"
                                                                                   placeholder="Chọn ngày phỏng vấn"
                                                                                   required>
                                                                            <span class="input-group-addon">
                                                                                <span
                                                                                    class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                            Giờ phỏng vấn:
                                                                            <input type="text" name="time"
                                                                                   class="form-control"
                                                                                   id="interviewTime"
                                                                                   placeholder="Chọn ngày phỏng vấn"
                                                                                   required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary">
                                                                            Save changes
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="status" value="Đang phỏng vấn">
                                                    @endif
                                                    @if($user->pivot->status == 'Đang phỏng vấn')
                                                        <input type="submit" class="btn btn-success m-1 p-1"
                                                               value="Đậu phỏng vấn" name="status"
                                                               style="font-size: 0.8125rem !important;border-radius: 0.125rem !important;">
                                                        <input type="submit" class="btn btn-danger m-1 p-1"
                                                               value="Không phù hợp" name="status"
                                                               style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">
                                                    @endif
                                                </form>
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
    </div>

@stop
@section('scripts')
    <script>
        //your js code here
        $(document).ready(function () {
            $('#datetimepicker1').datepicker({
                container: $('body'),
            });
            $('#interviewTime').timepicker({
                container: $('body'),
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '10',
                maxTime: '6:00pm',
                defaultTime: '11',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
            });
        });
    </script>

@stop
