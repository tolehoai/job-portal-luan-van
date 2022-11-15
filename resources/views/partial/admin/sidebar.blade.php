<div class="sidebar-wrapper" id="sidebar-menu">
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="{{route('admin.dashboard')}}" class="sidebar-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Trang quản lý</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-egg-fill"></i>
                    <span>Công ty</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{route('admin.companyList')}}">Danh sách công ty</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.add-company')}}">Thêm mới công ty</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-egg-fill"></i>
                    <span>Kỹ năng</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{route('admin.skill')}}">Danh sách kỹ năng</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.add-skill')}}">Thêm mới kỹ năng</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Công nghệ</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{route('admin.technologies')}}">Danh sách công nghệ</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.add-technology')}}">Thêm mới công nghệ</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Thành phố</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{route('admin.cities')}}">Danh sách thành phố</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.add-city')}}">Thêm mới thành phố</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="{{route('admin.jobs')}}" class="sidebar-link">
                    <i class="bi bi-map-fill"></i>
                    <span>Công việc</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{route('admin.jobs')}}">Danh sách công việc</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  ">
                <a href="ui-file-uploader.html" class="sidebar-link">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>File Uploader</span>
                </a>
            </li>

        </ul>
    </div>
</div>
