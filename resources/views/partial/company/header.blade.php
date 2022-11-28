<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html"><img
                src="http://127.0.0.1:8000/user_resource/img/logo/logo.png" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img
                src="http://127.0.0.1:8000/user_resource/img/logo/logo.png" alt=""></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img
                        src="{{$company->image !== null ? asset($company->image->path) : asset('storage/images/default.png')}}"
                        alt="image"
                    />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                     aria-labelledby="profileDropdown">
                    <a href="{{route('company.info')}}" class="dropdown-item">
                        <i class="fas fa-cog text-primary"></i>
                        Thông tin
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{route('company.logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-power-off text-primary"></i>
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>
