<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/UserController.php'; // Require UserController
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/TrangThaiController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DonHangController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ThongKeController.php';
require_once 'controllers/CommentController.php';
require_once 'controllers/AccountController.php';


// Require toàn bộ file Models
require_once 'models/User.php'; // Require User Model
require_once 'models/DanhMuc.php';
require_once 'models/TinTuc.php';
require_once 'models/LienHe.php';
require_once 'models/TrangThai.php';
require_once 'models/Banner.php';
require_once 'models/KhuyenMai.php';
require_once 'models/LienHe.php';
require_once 'models/SanPham.php';
require_once 'models/DonHang.php';
require_once 'models/LoginModel.php';
require_once 'models/thongke.php';
require_once 'models/Comment.php';
require_once 'models/Account.php';
// Route
$act = $_GET['act'] ?? '/';
if ($act !== 'login' && $act !== 'logout' && $act !== 'dang_ky') {
    if (!isset($_SESSION['dn'])) {
        header("Location: " . BASE_URL_ADMIN . '?act=login');
        exit;
    }
    if ($_SESSION['vai_tro'] == 1) {
        header("Location: " . BASE_URL_ADMIN . '?act=login');
        exit;
    }
}


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    // Quản lý sản phẩm
    'login' => (new loginController())->login(),
    'danh-mucs' => (new DanhMucController())->index(),
    'form-them-danh-muc' => (new DanhMucController())->create(),
    'them-danh-muc' => (new DanhMucController())->store(),
    'form-sua-danh-muc' => (new DanhMucController())->edit(),
    'sua-danh-muc' => (new DanhMucController())->update(),
    'xoa-danh-muc' => (new DanhMucController())->destroy(),
    'search-danh-muc' => (new DanhMucController())->ajaxSearch(),
    // Quản lý tin tức
    'tin-tucs' => (new TinTucController())->index(),
    'form-them-tin-tucs' => (new TinTucController())->create(),
    'them-tin-tucs' => (new TinTucController())->store(),
    'form-sua-tin-tucs' => (new TinTucController())->edit(),
    'sua-tin-tucs' => (new TinTucController())->update(),
    'xoa-tin-tucs' => (new TinTucController())->destroy(),
    'search-tin-tucs' => (new TinTucController())->ajaxSearch(),
    // Quản lý người dùng
    'users' => (new UserController())->index(),
    'users/create' => (new UserController())->create(),
    'users/edit' => (new UserController())->edit($_GET['id'] ?? 0),
    'users/delete' => (new UserController())->delete($_GET['id'] ?? 0),
    'users/show' => (new UserController())->show($_GET['id'] ?? 0),
    'search-users' => (new UserController())->ajaxSearch(),
    // Quản lý liên hệ
    'lien-he' => (new LienHeController())->index(),
    'sua-lien-he' => (new LienHeController())->update(),
    'form-sua-lien-he' => (new LienHeController())->edit(),
    'xoa-lien-he' => (new LienHeController())->destroy(),
    'search-lien-he' => (new LienHeController())->ajaxSearch(),
    // quản lý trạng thái
    'trangthais' => (new TrangThaiController())->index(),
    'trangthais/create' => (new TrangThaiController())->create(),
    'trangthais/edit' => (new TrangThaiController())->edit($_GET['id'] ?? 0),
    'trangthais/delete' => (new TrangThaiController())->delete($_GET['id'] ?? 0),
    'search-trangthais' => (new TrangThaiController())->ajaxSearch(),
    // Quản lý banner
    'banners' => (new BannerController())->index(),
    'form-them-banner' => (new BannerController())->create(),
    'them-banner' => (new BannerController())->store(),
    'form-sua-banner' => (new BannerController())->edit(),
    'sua-banner' => (new BannerController())->update(),
    'xoa-banner' => (new BannerController())->destroy(),
    'search-banners' => (new BannerController())->ajaxSearch(),
    // Quản lý khuyến mãi
    'khuyen_mai' => (new KhuyenMaiController())->index(),
    'add_khuyen_mai' => (new KhuyenMaiController())->create(),
    'edit_khuyen_mai' => (new KhuyenMaiController())->edit($_GET['id'] ?? 0),
    'delete_khuyen_mai' => (new KhuyenMaiController())->delete($_GET['id'] ?? 0),
    'search-khuyen-mais' => (new KhuyenMaiController())->ajaxSearch(),
    default => (new DashboardController())->index(),
    // Quản lý sản phẩm
    'san-pham' => (new SanPhamController())->index(),
    'form-them-san-pham' => (new SanPhamController())->create(),
    'them-san-pham' => (new SanPhamController())->store(),
    'form-sua-san-pham' => (new SanPhamController())->edit(),
    'sua-san-pham' => (new SanPhamController())->update(),
    'xoa-san-pham' => (new SanPhamController())->destroy(),
    'chi-tiet-san-pham' => (new SanPhamController())->show(),
    // 'search-san-pham' => (new SanPhamController())->ajaxSearch(),
    // Quản lý đơn hàng
    'don-hang' => (new DonHangController())->index(),
    'show-don-hang' => (new DonHangController())->show($_GET['id']),
    'form-sua-don-hang'=>(new DonHangController())->update($_GET['id']),
   
    // Đăng nhập đăng xuất
    // 'login' => (new LoginController())->login(),
    'dang_ky' => (new AccountController())->register(),
    'logout' => (new LoginController())->logout(),
    // Bình luận
    'comment' => (new CommentController())->index(),
    'show-comment' => (new CommentController())->show($_GET['id']),
    'edit-comment' => (new CommentController())->edit($_GET['id']),
    'update-comment' => (new CommentController())->update($_GET['id']),
    'delete-comment' => (new CommentController())->delete($_GET['id']),
    //Thống kê
    'dashboard' => (new ThongKeController())->index(),
    '/' => (new ThongKeController())->index()


};