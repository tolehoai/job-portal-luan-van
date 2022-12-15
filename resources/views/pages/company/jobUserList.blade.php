@extends('layouts.company.master')
@section('title', 'Danh sách ứng cử viên')
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
                                <h2>Danh sách ứng cử viên của công việc {{$job->title}}</h2>
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
                                        <div class="modal fade" id="offerCandidate{{ $loop->index }}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form
                                                    action="{{route('changeCandidateStatus', [ $job->id,$user->id])}}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">
                                                                Nhập thông tin offer cho ứng cử
                                                                viên - {{$user->name}}</h5>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Mức
                                                                    lương</label>
                                                                <input type="text" class="form-control"
                                                                       id="offer_salary"
                                                                       name="offer_salary"
                                                                       placeholder="Nhập vào mức lương">
                                                                <input type="hidden" name="status"
                                                                       value="Chờ phản hồi">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputPassword1">Ngày bắt
                                                                    đầu
                                                                    làm việc</label>
                                                                <input type="text" class="form-control"
                                                                       id="offer_start_date"
                                                                       name="offer_start_date"
                                                                       placeholder="Nhập vào ngày bắt đầu làm việc">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal">Huỷ
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary">
                                                                Lưu
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                                                        <button type="button"
                                                                class="badge badge-primary text-white m-1 p-1"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $loop->index}}"
                                                                style="cursor: pointer">
                                                            Mời phỏng vấn
                                                        </button>
                                                        <input type="submit" class="btn btn-danger m-1 p-1"
                                                               value="Không phù hợp" name="status"
                                                               style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">
                                                        </button>


                                                        <div class="modal fade" id="rejectCandidate" tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{route('changeCandidateStatus', [$user->id, $job->id])}}"
                                                                    method="POST"
                                                                >
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Xác nhận ứng viên này không phù hợp</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Bạn có chắn chắn không muốn ứng viên này
                                                                            tham gia vào vị trí tuyển dụng này không?
                                                                            <input type="hidden" name="status"
                                                                                   value="Không phù hợp">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Huỷ bỏ
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">
                                                                                Xác nhận
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $loop->index}}"
                                                             tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{route('changeCandidateStatus', [ $job->id,$user->id])}}"
                                                                    method="POST"
                                                                >
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Mời phỏng vấn - {{$user->name}}</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Thời
                                                                                    gian
                                                                                    phỏng vấn</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="interview_datetime"
                                                                                       name="interview_datetime"
required
                                                                                       placeholder="Nhập vào ngày phỏng vấn">
                                                                                <input type="hidden" name="status"
                                                                                       value="Đang phỏng vấn">
                                                                            </div>
                                                                            <!-- Default switch -->
                                                                            <div class="form-group">
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" value=""
                                                                                           id="interviewType"
                                                                                            checked
                                                                                    >
                                                                                    <label for="interviewType">
                                                                                        Phỏng vấn online / offline
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="interviewOnline">
                                                                                <label
                                                                                    for="exampleInputPassword1">Link
                                                                                    phỏng
                                                                                    vấn</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="interview_address"
                                                                                       name="interview_address"

                                                                                       placeholder="Nhập vào đường link phỏng vấn online">
                                                                            </div>
                                                                            <div class="form-group" id="interviewOffline">
                                                                                <label
                                                                                    for="exampleInputPassword1">Địa điểm
                                                                                    phỏng vấn</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="office_address"
                                                                                       name="office_address"
                                                                                       value="{{$company->address}}"
                                                                                       placeholder="Nhập vào địa chỉ công ty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Đóng
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">
                                                                                Lưu
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    @endif
                                                    @if($user->pivot->status == 'Đang phỏng vấn')
                                                        <button type="button" class="btn btn-success m-1 p-1"
                                                                data-toggle="modal"
                                                                data-target="#offerCandidate{{ $loop->index }}"
                                                                style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">
                                                            Đậu phỏng vấn
                                                        </button>
                                                        <input type="submit" class="btn btn-danger m-1 p-1"
                                                               value="Không phù hợp" name="status"
                                                               style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">

                                                    @endif
                                                    @if($user->pivot->status == 'Đậu phỏng vấn')
                                                        <input type="submit" class="btn btn-success m-1 p-1"
                                                               value="Gửi offer" name="status"
                                                               style="font-size: 0.8125rem !important;border-radius: 0.125rem !important;">
                                                        <input type="submit" class="btn btn-danger m-1 p-1"
                                                               value="Từ chối offer" name="status"
                                                               style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">
                                                    @endif
                                                    @if($user->pivot->status == 'Chờ phản hồi')
                                                        <input type="submit" class="btn btn-success m-1 p-1"
                                                               value="Chấp nhận offer" name="status"
                                                               style="font-size: 0.8125rem !important; border-radius: 0.125rem !important;">
                                                        <input type="submit" class="btn btn-danger m-1 p-1"
                                                               value="Từ chối offer" name="status"
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
    <!-- Modal -->

@stop
@section('scripts')
    <script>
        //your js code here
        $(document).ready(function () {
            $('#interviewOffline').hide();
            $('#interviewType').change(function () {
                if ($(this).is(':checked')) {
                    $('#interviewOnline').show();
                    $('#interviewOffline').hide();
                } else {
                    $('#interviewOnline').hide();
                    $('#interviewOffline').show();
                }
            });
        });
    </script>

@stop
