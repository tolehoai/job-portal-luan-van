@extends('layouts.company.master')
@section('title', 'Trang quản lý - Nhà tuyển dụng')
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
                    {{$company->name}}
                </h3>
            </div>

            <div class="row">
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom text-center pb-4">
                                <img
                                    src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                    alt="profile"
                                    class="img-lg rounded-circle mb-3">
                                <p>{!! $company->company_desc !!}</p>
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

                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" id="jobChartTitle">
                                Số lượng công việc mới trong tuần
                            </h4>
                            <div class="row">
                                <div class="col-md-12 d-flex flex-column">
                                    <label>Chọn loại biểu đồ</label>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Chọn loại biểu đồ
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" id="jobByWeek" style="cursor: pointer">Theo ngày</a>
                                            <a class="dropdown-item" id="jobByMonth" style="cursor: pointer">Theo tháng</a>
                                            <a class="dropdown-item" id="jobByWeekAndMonth" style="cursor: pointer">Tất cả</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <canvas id="myJobChart"></canvas>
                                <canvas id="myJobChartMonth"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Tổng quan
                            </h4>
                            <div>
                                <p class="d-inline-block">Tổng số công việc: </p>
                                <span>{{$companyStatistic['totalJob']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên: </p>
                                <span>{{$companyStatistic['totalCandidate']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên đang chờ xử lý: </p>
                                <span>{{$companyStatistic['totalJobPending']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên đã được phỏng vấn: </p>
                                <span>{{$companyStatistic['totalJobProcessing']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên đã được nhận việc: </p>
                                <span>{{$companyStatistic['totalJobAcceptOffer']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên đã hủy offer: </p>
                                <span>{{$companyStatistic['totalJobRejectOffer']}}</span>
                                <br>
                                <p class="d-inline-block">Tổng số ứng viên đã bị từ chối: </p>
                                <span>{{$companyStatistic['totalJobNotSuitable']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Trạng thái của ứng cử viên
                            </h4>
                            <div class="chart-container">
                                <canvas id="myCandidateStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Thống kê về kỹ năng được ứng tuyển nhiều nhất
                            </h4>
                            <div class="chart-container">
                                <canvas id="mySkillChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    </div>
@stop
@section('scripts')
    <script>
        //technology chart
        var labelSkillConvert = '{!! json_encode($skillChartData['labels']) !!}';
        var labelSkillConvert = JSON.parse(labelSkillConvert);
        var dataSkillConvert = '{!! json_encode($skillChartData['data']) !!}';
        var dataSkillConvert = JSON.parse(dataSkillConvert);
        const skillChart = document.getElementById('mySkillChart');
        new Chart(skillChart, {
            type: 'pie',
            data: {
                labels: labelSkillConvert,
                datasets: [{
                    label: 'Kỹ năng được ứng tuyển nhiều nhất',
                    data: dataSkillConvert,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                }],

            },
            //display label and number of each status at the top of this chart
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        color: 'white',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function (value, context) {
                            return context.chart.data.labels[context.dataIndex] + ' ' + value;
                        },
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                fontColor: '#333',
                                fontSize: 16
                            }
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });
        //candidate chart
        var labelCandidateStatusConvert = '{!! json_encode($candidateChartData['labels']) !!}';
        var labelCandidateStatusConvert = JSON.parse(labelCandidateStatusConvert);
        var dataCandidateConvert = '{!! json_encode($candidateChartData['data']) !!}';
        var dataCandidateConvert = JSON.parse(dataCandidateConvert);
        console.log(labelJobConvert, dataJobConvert);
        const candidateStatusChart = document.getElementById('myCandidateStatusChart');
        new Chart(candidateStatusChart, {
            type: 'bar',
            data: {
                labels: labelCandidateStatusConvert,
                datasets: [{
                    label: 'Trạng Thái Của Ứng Cử Viên',
                    data: dataCandidateConvert,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                }],

            },
            //display label and number of each status at the top of this chart
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        color: 'white',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function (value, context) {
                            return context.chart.data.labels[context.dataIndex] + ' ' + value;
                        },
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                fontColor: '#333',
                                fontSize: 16
                            }
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });
        //job chart
        var labelJobConvert = '{!! json_encode($jobChartData['labels']) !!}';
        var labelJobConvert = JSON.parse(labelJobConvert);
        var dataJobConvert = '{!! json_encode($jobChartData['data']) !!}';
        var dataJobConvert = JSON.parse(dataJobConvert);
        console.log(labelJobConvert, dataJobConvert);
        const jobChart = document.getElementById('myJobChart');
        new Chart(jobChart, {
            type: 'bar',
            data: {
                labels: labelJobConvert,
                datasets: [{
                    label: 'Số lượng công việc mới trong tuần',
                    data: dataJobConvert,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(61,196,255, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(61,196,255)'
                    ],
                }],

            },
            //display label and number of each status at the top of this chart
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        color: 'white',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function (value, context) {
                            return context.chart.data.labels[context.dataIndex] + ' ' + value;
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });

        //job chart
        var labelJobMonthConvert = '{!! json_encode($jobChartDataInMonth['labels']) !!}';
        var labelJobMonthConvert = JSON.parse(labelJobMonthConvert);
        var dataJobMonthConvert = '{!! json_encode($jobChartDataInMonth['data']) !!}';
        var dataJobMonthConvert = JSON.parse(dataJobMonthConvert);
        console.log(labelJobConvert, dataJobConvert);
        const jobChartMonth = document.getElementById('myJobChartMonth');
        new Chart(jobChartMonth, {
            type: 'bar',
            data: {
                labels: labelJobMonthConvert,
                datasets: [{
                    label: 'Số lượng công việc mới trong tháng',
                    data: dataJobMonthConvert,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(61,196,255, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(61,196,255)'
                    ],
                }],

            },
            //display label and number of each status at the top of this chart
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        color: 'white',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function (value, context) {
                            return context.chart.data.labels[context.dataIndex] + ' ' + value;
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });

        //hide chart with id myJobChartMonth
        $('#myJobChartMonth').hide();

        //when click on element with id jobByWeek, it will show the chart with id myJobChart and hide the chart with id myJobChartMonth with animation

        $('#jobByWeek').click(function () {
            $('#myJobChart').show();
            $('#myJobChartMonth').hide();
            //change title of element with id jobChartTitle is 'Số lượng công việc mới trong tuần'
            $('#jobChartTitle').text('Số lượng công việc mới trong tuần');
        });
        //when click on option with id jobByMonth, it will show the chart with id myJobChartMonth and hide the chart with id myJobChart
        $('#jobByMonth').click(function () {
            $('#myJobChartMonth').show();
            $('#myJobChart').hide();
            //change title of element with id jobChartTitle is 'Số lượng công việc mới trong tháng'
            $('#jobChartTitle').text('Số lượng công việc mới trong tháng');
        });
        //when click on element with id jobByWeekAndMonth, it will show the chart with id myJobChart and the chart with id myJobChartMonth
        $('#jobByWeekAndMonth').click(function () {
            $('#myJobChartMonth').show();
            $('#myJobChart').show();
            //change title of element with id jobChartTitle is 'Số lượng công việc mới trong tuần và tháng'
            $('#jobChartTitle').text('Số lượng công việc mới trong tuần và tháng');
        });
    </script>

@stop
