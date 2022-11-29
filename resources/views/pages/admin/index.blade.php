@extends('layouts.admin.master')

@section('title', 'Trang quản lý - Quản trị')

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

    <div id="main" class="container-fluid">
        <div class="row">
            <div class="col-12 py-2">
                <div class="page-heading">
                    <h3>Trang quản lý</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Tổng số công ty</h6>
                                                    <h6 class="font-extrabold mb-0">{{$statistic['company']}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Tổng số công việc</h6>
                                                    <h6 class="font-extrabold mb-0">{{$statistic['job']}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldAdd-User"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Tổng số người dùng</h6>
                                                    <h6 class="font-extrabold mb-0">{{$statistic['user']}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Tổng quan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="d-flex align-items-center">

                                                        <h5 class="mb-0 ms-3">Tổng số ứng viên</h5>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <h5 class="mb-0">{{$statistic['totalJobUser']}}</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-europe"></div>
                                                </div>
                                            </div>
                                            @foreach($statistic['jobUserStatus'] as $job)
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center">

                                                            <h5 class="mb-0 ms-3">{{$job->status}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <h5 class="mb-0">{{$job->total}}</h5>
                                                    </div>
                                                    <div class="col-12">
                                                        <div id="chart-america"></div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Biểu đồ tổng quan ứng cử viên mới trong hệ thống</h4>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset('admin_resource/images/faces/1.jpg') }}" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold">Website hỗ trợ tìm kiếm việc làm</h5>
                                            <h6 class="text-muted mb-0">Tô Lê Hoài</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thông tin trạng thái phỏng vấn trong hệ thống</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChartOval"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Top 5 công ty được đánh giá cao nhất</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-stripped table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th>Công ty</th>
                                                    <th>Email</th>
                                                    <th>Số lượng nhân viên</th>
                                                    <th>Đánh giá</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($topCompanyRating as $companyRating)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <img
                                                                    class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                    src="{{$companyRating->image !== null ? asset($companyRating->image->path) : asset('storage/images/default.png')}}"
                                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 10%"
                                                                    alt="User Image">
                                                            </h2>
                                                        </td>
                                                        <td>{{$companyRating->name}}</td>
                                                        <td>{{$companyRating->email}}</td>
                                                        <td>{{$companyRating->number_of_personal}}</td>
                                                        <td>{{$companyRating->rating_score}}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Top 5 công ty có nhiều vị trí việc làm nhất</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th>Công ty</th>
                                                    <th>Email</th>
                                                    <th>Số lượng nhân viên</th>
                                                    <th>Việc làm đang tuyển</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($topCompanies as $company)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <img
                                                                    class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                    src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 10%"
                                                                    alt="User Image">
                                                            </h2>
                                                        </td>
                                                        <td>{{$company->name}}</td>
                                                        <td>{{$company->email}}</td>
                                                        <td>{{$company->number_of_personal}}</td>
                                                        <td>{{$company->jobs_count}}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Top công nghệ có nhiều việc làm nhất</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myTechnologyChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Top kỹ năng có nhiều việc làm nhất</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="mySkillChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Top thành phố có nhiều việc làm nhất</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myCityChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
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
            var labelConvert = '{!! json_encode($statistic['jobUserStatusChart']['labels']) !!}';
            var labelConvert = JSON.parse(labelConvert);
            var dataConvert = '{!! json_encode($statistic['jobUserStatusChart']['data']) !!}';
            var dataConvert = JSON.parse(dataConvert);
            var labelConvertUser = '{!! json_encode($userChartData['labels']) !!}';
            var labelConvertUser = JSON.parse(labelConvertUser);
            var dataConvertUser = '{!! json_encode($userChartData['data']) !!}';
            var dataConvertUser = JSON.parse(dataConvertUser);
            var labelTechnogolyConvert = '{!! json_encode($technologyChartData['labels']) !!}';
            var labelTechnogolyConvert = JSON.parse(labelTechnogolyConvert);
            var dataTechnologyConvert = '{!! json_encode($technologyChartData['data']) !!}';
            var dataTechnologyConvert = JSON.parse(dataTechnologyConvert);
            var labelSkillConvert = '{!! json_encode($skillChartData['labels']) !!}';
            var labelSkillConvert = JSON.parse(labelSkillConvert);
            var dataSkillConvert = '{!! json_encode($skillChartData['data']) !!}';
            var dataSkillConvert = JSON.parse(dataSkillConvert);
            var labelCityConvert = '{!! json_encode($cityChartData['labels']) !!}';
            var labelCityConvert = JSON.parse(labelCityConvert);
            var dataCityConvert = '{!! json_encode($cityChartData['data']) !!}';
            var dataCityConvert = JSON.parse(dataCityConvert);
            const cityChart = document.getElementById('myCityChart');
            new Chart(cityChart, {
                type: 'bar',
                data: {
                    labels: labelCityConvert,
                    datasets: [{
                        label: 'Số lượng ứng cử viên với công nghệ',
                        data: dataCityConvert,
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
            const skillChart = document.getElementById('mySkillChart');
            new Chart(skillChart, {
                type: 'bar',
                data: {
                    labels: labelSkillConvert,
                    datasets: [{
                        label: 'Số lượng ứng cử viên với công nghệ',
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
            const technologyChart = document.getElementById('myTechnologyChart');
            new Chart(technologyChart, {
                type: 'bar',
                data: {
                    labels: labelTechnogolyConvert,
                    datasets: [{
                        label: 'Số lượng ứng cử viên với công nghệ',
                        data: dataTechnologyConvert,
                        borderWidth: 1,
                        backgroundColor: 'fillPattern',
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
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelConvertUser,
                    datasets: [{
                        label: 'Số lượng ứng cử viên đăng ký tài khoản trên hệ thống',
                        data: dataConvertUser,
                        borderWidth: 1,
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
            const ctx1 = document.getElementById('myChartOval');
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: labelConvert,
                    datasets: [{
                        label: 'Trạng thái của ứng cử viên',
                        data: dataConvert,
                        borderWidth: 1,
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
        });
    </script>
@stop
