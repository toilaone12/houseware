<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><span class="text-warning">Home</span> & <span class="text-secondary">Ease</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Trang chủ -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần tài khoản
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
            aria-expanded="true" aria-controls="collapseAccount">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
        </a>
        <div id="collapseAccount" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('account.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('account.formInsert')}}">Đăng ký</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần danh mục
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-layer-group"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('category.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('category.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần chức vụ
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
            aria-expanded="true" aria-controls="collapseRole">
            <i class="fa-solid fa-user-tie"></i>
            <span>Chức vụ</span>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('role.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('role.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần màu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColor"
            aria-expanded="true" aria-controls="collapseColor">
            <i class="fa-solid fa-droplet"></i>
            <span>Màu</span>
        </a>
        <div id="collapseColor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('color.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('color.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần phí vận chuyển
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFee"
            aria-expanded="true" aria-controls="collapseFee">
            <i class="fa-solid fa-truck"></i>
            <span>Phí vận chuyển</span>
        </a>
        <div id="collapseFee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('fee.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('fee.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần quảng cáo
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner"
            aria-expanded="true" aria-controls="collapseBanner">
            <i class="fa-regular fa-images"></i>
            <span>Quảng cáo</span>
        </a>
        <div id="collapseBanner" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('banner.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('banner.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần mã giảm giá
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupon"
            aria-expanded="true" aria-controls="collapseCoupon">
            <i class="fa-solid fa-percent"></i>
            <span>Mã giảm giá</span>
        </a>
        <div id="collapseCoupon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('coupon.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('coupon.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Phần đồ gia dụng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="true" aria-controls="collapseProduct">
            <i class="fa-solid fa-tv"></i>
            <span>Đồ gia dụng</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng chính:</h6>
                <a class="collapse-item" href="{{route('product.list')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('product.formInsert')}}">Thêm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
