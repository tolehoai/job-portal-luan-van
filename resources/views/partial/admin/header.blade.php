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
            <h6 class="dropdown-header">Welcome Marie N!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i>
                <span class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-kanban-board.html"><i
                    class="mdi mdi-calendar-check-outline text-muted font-size-16 align-middle me-1"></i>
                <span class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i>
                <span class="align-middle">Balance : <b>$6951.02</b></span></a>
            <a class="dropdown-item d-flex align-items-center" href="contacts-settings.html"><i
                    class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span><span class="badge badge-soft-success ms-auto">New</span></a>
            <a class="dropdown-item" href="auth-lockscreen-cover.html"><i
                    class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
            <a class="dropdown-item" href="auth-signout-cover.html"><i
                    class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Logout</span></a>
        </div>
    </div>
</div>
