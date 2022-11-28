<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img
                        src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                        alt="image"
                    />
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome {{$company->name}}
                    </p>
                    <p class="designation">
                        Nhà tuyển dụng
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('company.dashboard')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Trang quản lý</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('company.info')}}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Thông tin công ty</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
               aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Quản lý công việc</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                              href="{{route('company.jobList')}}">Danh sách công
                            việc</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('company.job')}}">Thêm mới công việc</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
               aria-controls="form-elements">
                <i class="fab fa-wpforms menu-icon"></i>
                <span class="menu-title">Quản lý ứng cử viên</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('company.candidate')}}">Danh sách ứng cử
                            viên</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
