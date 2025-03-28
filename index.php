<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ
require_once './controllers/DanhMucController.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './models/SanPham.php';
//require_once './admin/models/TinTuc.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match


match ($act) {
    // Trang chủ
    '/'                  => (new HomeController())->trangchu(),
    'tintucs'            => (new HomeController())->tintuc(),
    'khuyenmais'         => (new HomeController())->khuyenmai(),
    'lienhes'            => (new HomeController())->lienhe(),
    'chitiet'            => (new HomeController())->chiTietTinTuc($_GET['id'] ?? 0),
    'chitietsp'          => (new HomeController())->chiTietSanPham($_GET['id'] ?? 0),
    'sanphams'           => (new HomeController())->sanpham(),
    'nguoidung'          => (new HomeController())->chiTietNguoiDung($_GET['ten_nguoi_dung'] ?? 0),
    'timkiem'            => (new HomeController())->timKiem($search),
    'loc'                => (new HomeController())->locSanPham($_GET['danh_muc_id'] ?? null),
    'sapxep'             => (new HomeController())->sapXep($_GET['kieu'] ?? 'moi-nhat'),
    'binhluan'           => (new HomeController())->addComment(),
    'giohang'            => (new HomeController())->giohang($_GET['id'] ?? 0),
    'delete-gio-hang'    => (new HomeController())->destroy($_GET['id'] ?? 0),
    'sua-nguoi-dung'     => (new HomeController())->edit($_GET['id'] ?? 0),
    'thanhtoan'          => (new HomeController())->thanhtoan($_GET['id'] ?? 0),
    'thanhcong'          => (new HomeController())->thanhcong(),
    'donhang'            => (new HomeController())->donhang($_GET['id'] ?? 0),
    'chitietdonhang'     => (new HomeController())->chitietdonhang($_GET['id'] ?? 0),
    'delete-don-hang'    =>(new HomeController())->delete($_GET['id'] ?? 0),
};
