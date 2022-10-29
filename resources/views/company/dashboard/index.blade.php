@extends('layouts.company.master')
@section('title', 'Admin')
@section('style-libraries')
@stop
@section('styles')
    {{--custom css item suggest search--}}
    <style>
    </style>
@stop
@section('content')
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close fa fa-times"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>
                Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles primary"></div>
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                   aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                   aria-controls="chats-section">CHATS</a>
            </li>
        </ul>
        <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                 aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                    <form class="form w-100">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                            <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                    id="add-task-todo">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
                <div class="list-wrapper px-3">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Team review meeting at 3.00 PM
                                </label>
                            </div>
                            <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Prepare for presentation
                                </label>
                            </div>
                            <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Resolve all the low priority tickets due today
                                </label>
                            </div>
                            <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Schedule meeting for next week
                                </label>
                            </div>
                            <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Project review
                                </label>
                            </div>
                            <i class="remove fa fa-times-circle"></i>
                        </li>
                    </ul>
                </div>
                <div class="events py-4 border-bottom px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="fa fa-times-circle text-primary mr-2"></i>
                        <span>Feb 11 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                    <p class="text-gray mb-0">build a js based app</p>
                </div>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="fa fa-times-circle text-primary mr-2"></i>
                        <span>Feb 7 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                    <p class="text-gray mb-0 ">Call Sarah Graves</p>
                </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="d-flex align-items-center justify-content-between border-bottom">
                    <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                    <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                        All</small>
                </div>
                <ul class="chat-list">
                    <li class="list active">
                        <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                        <div class="info">
                            <p>Thomas Douglas</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                    class="offline"></span></div>
                        <div class="info">
                            <div class="wrapper d-flex">
                                <p>Catherine</p>
                            </div>
                            <p>Away</p>
                        </div>
                        <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                        <small class="text-muted my-auto">23 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                        <div class="info">
                            <p>Daniel Russell</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">14 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                        <div class="info">
                            <p>James Richardson</p>
                            <p>Away</p>
                        </div>
                        <small class="text-muted my-auto">2 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="{{asset('company_resource/images/faces/face5.jpg')}}"
                                                  alt="image"><span
                                    class="online"></span></div>
                        <div class="info">
                            <p>Madeline Kennedy</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">5 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="{{asset('company_resource/images/faces/face6.jpg')}}"
                                                  alt="image"><span
                                    class="online"></span></div>
                        <div class="info">
                            <p>Sarah Graves</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">47 min</small>
                    </li>
                </ul>
            </div>
            <!-- chat tab ends -->
        </div>
    </div>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    {{$company->name}}
                </h3>
            </div>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fa fa-user mr-2"></i>
                                        New users
                                    </p>
                                    <h2>54000</h2>
                                    <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                        Avg Time
                                    </p>
                                    <h2>123.50</h2>
                                    <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                        Downloads
                                    </p>
                                    <h2>3500</h2>
                                    <label class="badge badge-outline-success badge-pill">12% increase</label>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-check-circle mr-2"></i>
                                        Update
                                    </p>
                                    <h2>7500</h2>
                                    <label class="badge badge-outline-success badge-pill">57% increase</label>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-chart-line mr-2"></i>
                                        Sales
                                    </p>
                                    <h2>9000</h2>
                                    <label class="badge badge-outline-success badge-pill">10% increase</label>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                        Pending
                                    </p>
                                    <h2>7500</h2>
                                    <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                     alt="profile"
                                     class="img-lg rounded-circle mb-3">
                                <p>{{$company->company_desc}}</p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success">Hire Me</button>
                                    <button class="btn btn-success">Follow</button>
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">Địa chỉ</span>
                                    <span class="float-right text-muted">{{$company->address}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Email</span>
                                    <span class="float-right text-muted">{{$company->email}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Số điện thoại</span>
                                    <span class="float-right text-muted">{{$company->phone}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Số lượng nhân viên</span>
                                    <span class="float-right text-muted">{{$company->number_of_personal}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Giờ bắt đầu làm việc</span>
                                    <span class="float-right text-muted">{{$company->start_work_time}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Giờ kết thúc làm việc</span>
                                    <span class="float-right text-muted">{{$company->end_work_time}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <h4 class="card-title">
                                <i class="fas fa-gift"></i>
                                Orders
                            </h4>
                            <canvas id="orders-chart" width="681" height="340"
                                    style="display: block; height: 272px; width: 545px;"
                                    class="chartjs-render-monitor"></canvas>
                            <div id="orders-chart-legend" class="orders-chart-legend">
                                <ul class="legend0">
                                    <li><span class="legend-label" style="background-color:#392c70"></span>Delivered
                                    </li>
                                    <li><span class="legend-label" style="background-color:#d1cede"></span>Estimated
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách ứng viên</h4>
                            <p class="card-description">
                                Add class <code>.table-striped</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            First name
                                        </th>
                                        <th>
                                            Progress
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Deadline
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face1.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            Herman Beck
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $ 77.99
                                        </td>
                                        <td>
                                            May 15, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face2.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            Messsy Adam
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                     style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $245.30
                                        </td>
                                        <td>
                                            July 1, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face3.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            John Richards
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $138.00
                                        </td>
                                        <td>
                                            Apr 12, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face4.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            Peter Meggik
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $ 77.99
                                        </td>
                                        <td>
                                            May 15, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face5.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            Edward
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                     style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $ 160.25
                                        </td>
                                        <td>
                                            May 03, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face6.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            John Doe
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%"
                                                     aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $ 123.21
                                        </td>
                                        <td>
                                            April 05, 2015
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset('company_resource/images/faces/face7.jpg')}}" alt="image">
                                        </td>
                                        <td>
                                            Henry Tom
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            $ 150.00
                                        </td>
                                        <td>
                                            June 16, 2015
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@stop