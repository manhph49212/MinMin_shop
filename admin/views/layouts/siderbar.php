
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="../index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/image-removebg-preview (1).png" alt="" height="20">
            </span>
            <span class="logo-lg">
                <img src="assets/images/image-removebg-preview (1).png" alt="" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="../index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/image-removebg-preview (1).png" alt="" height="20">
            </span>
            <span class="logo-lg">
                <img src="assets/images/image-removebg-preview (1).png" alt="" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text"></span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="?act=logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý </span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=dashboard">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTinTuc">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lý danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a href="?act=danh-mucs" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách danh mục
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=form-them-danh-muc" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới danh mục
                                </a>
                            </li>  
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNguoiDung" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTinTuc">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-advance-ui">Quản lý người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNguoiDung">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=users" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách người dùng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=users/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới người dùng
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTinTuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTinTuc">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span data-key="t-advance-ui">Quản lý tin tức</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTinTuc">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=tin-tucs" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách tin tức
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=form-them-tin-tucs" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới tin tức
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLienHe" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTinTuc">
                        <i class="fa fa-envelope-o"></i> <span data-key="t-advance-ui">Quản lý liên hệ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLienHe">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=lien-he" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTTDonHang" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTTDonHang">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lý trạng thái đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTTDonHang">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=trangthais" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách trạng thái đơn hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=trangthais/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới trạng thái đơn hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBanner" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBanner">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span data-key="t-advance-ui">Quản lý trạng banner</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBanner">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=banners" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách banner
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=form-them-banner" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới banner
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKhuyenmai" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKhuyenmai">
                    <i class="fa fa-percent" aria-hidden="true"></i> <span data-key="t-advance-ui">Quản lý trạng khuyến mãi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKhuyenmai">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=khuyen_mai" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách khuyến mãi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=add_khuyen_mai" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới khuyến mãi
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSanPham" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSanPham">
                    <i class="fa fa-percent" aria-hidden="true"></i> <span data-key="t-advance-ui">Quản lý sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSanPham">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=san-pham" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách sản phẩm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=form-them-san-phams" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới sản phẩm
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDonHang" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDonHang">
                    <i class="fa fa-percent" aria-hidden="true"></i> <span data-key="t-advance-ui">Quản lý đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDonHang">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="?act=don-hang" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách đơn hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=form-them-don-hang" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới đơn hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </li>
                

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>