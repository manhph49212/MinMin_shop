<?php
class ThongKeController
{
    public $modelThongKe;

    public function __construct()
    {
        $this->modelThongKe = new ThongKe();
    }

    public function index()
    {
        // Gọi các phương thức để lấy thống kê
        $thuNhapTheoTuan = $this->modelThongKe->thuNhapTheoTuan();
        $soLuongDonHang = $this->modelThongKe->soLuongDonHangTheoTuan();
        $soLuongKhachHang = $this->modelThongKe->soLuongKhachHangTheoTuan();
        $soLuongSanPhamTheoTuan = $this->modelThongKe->soLuongSanPhamTheoTuan();  // Gọi phương thức số lượng sản phẩm theo tuần

        // Truyền kết quả đến view
        require_once "views/dashboard.php";
    }
    
    
}
?>