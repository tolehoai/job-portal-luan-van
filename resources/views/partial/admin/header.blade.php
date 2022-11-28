<div class="d-flex align-items-center justify-content-between">

    <div>
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-1"></i>
        </a>
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('admin_resource/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item user text-start d-flex align-items-center m-2"
                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user"
                 src="http://127.0.0.1:8000/admin_resource/images/users/avatar-3.png" style="width: 40px;"
                 alt="Header Avatar">
            <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                                <span class="user-name">
                                                                                Hello Admin
                                        <i class="mdi mdi-chevron-down"></i></span>
                                                                </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end pt-0">
            <form action="{{route('admin.logout')}}" method="POST">
                @csrf
                <button type="submit" class="align-middle btn btn-primary">Đăng xuất</button>
            </form>

        </div>
    </div>
</div>
