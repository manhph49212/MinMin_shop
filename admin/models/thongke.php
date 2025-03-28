<?php

class thongke
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function thuNhapTheoTuan()
    {
        try {
            $ngayHienTai = date('Y-m-d'); // Lấy ngày hiện tại
            $tuanHienTai = date('YW', strtotime($ngayHienTai)); // Lấy tuần hiện tại (Y = năm, W = tuần trong năm)
            
            // Câu lệnh SQL để lấy tổng thu nhập của tuần hiện tại
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap
                    FROM don_hangs
                    WHERE YEARWEEK(ngay_dat, 1) = :tuan_hien_tai"; // Lọc đơn hàng theo tuần trong năm (1: Tuần bắt đầu từ thứ 2)
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tuan_hien_tai', $tuanHienTai); // Gán tuần hiện tại vào câu lệnh SQL
            $stmt->execute();
    
            $ketQua = $stmt->fetch();
            return $ketQua['tong_thu_nhap'] ?? 0; // Trả về 0 nếu không có đơn hàng nào trong tuần
            
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    public function soLuongDonHangTheoTuan()
{
    try {
        $ngayHienTai = date('Y-m-d'); // Lấy ngày hiện tại
        $tuanHienTai = date('YW', strtotime($ngayHienTai)); // Lấy tuần hiện tại (Y = năm, W = tuần trong năm)
        
        // Câu lệnh SQL để lấy số lượng đơn hàng trong tuần hiện tại
        $sql = "SELECT COUNT(*) AS so_luong_don_hang
                FROM don_hangs
                WHERE YEARWEEK(ngay_dat, 1) = :tuan_hien_tai"; // Lọc đơn hàng theo tuần trong năm (1: Tuần bắt đầu từ thứ 2)
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tuan_hien_tai', $tuanHienTai); // Gán tuần hiện tại vào câu lệnh SQL
        $stmt->execute();

        $ketQua = $stmt->fetch();
        return $ketQua['so_luong_don_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào trong tuần
        
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return 0; // Trả về 0 nếu có lỗi
    }
}

public function soLuongKhachHangTheoTuan()
{
    try {
        $ngayHienTai = date('Y-m-d'); // Lấy ngày hiện tại
        $tuanHienTai = date('YW', strtotime($ngayHienTai)); // Lấy tuần hiện tại (Y = năm, W = tuần trong năm)

        // Câu lệnh SQL để lấy số lượng khách hàng trong tuần hiện tại
        $sql = "SELECT COUNT(DISTINCT nguoi_dung_id) AS so_luong_khach_hang
                FROM don_hangs
                WHERE YEARWEEK(ngay_dat, 1) = :tuan_hien_tai"; // Lọc đơn hàng theo tuần trong năm (1: Tuần bắt đầu từ thứ 2)

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tuan_hien_tai', $tuanHienTai); // Gán tuần hiện tại vào câu lệnh SQL
        $stmt->execute();

        $ketQua = $stmt->fetch();
        return $ketQua['so_luong_khach_hang'] ?? 0; // Trả về 0 nếu không có khách hàng nào trong tuần

    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return 0; // Trả về 0 nếu có lỗi
    }
}

public function soLuongSanPhamTheoTuan()
{
    try {
        // Lấy năm và tuần hiện tại
        $ngayHienTai = date('Y-m-d');  // Ngày hiện tại
        $namHienTai = date('Y'); // Lấy năm hiện tại
        $tuanHienTai = date('W'); // Lấy số tuần hiện tại trong năm

        // Câu lệnh SQL để tính tổng số lượng sản phẩm trong tuần hiện tại
        // Giả sử bảng chi_tiet_don_hangs lưu thông tin chi tiết đơn hàng và bảng don_hangs lưu thông tin đơn hàng
        $sql = "SELECT SUM(ctdh.so_luong) AS tong_so_luong_san_pham
                FROM chi_tiet_don_hangs ctdh
                INNER JOIN don_hangs dh ON ctdh.don_hang_id = dh.id
                WHERE YEAR(dh.ngay_dat) = :namHienTai
                AND WEEK(dh.ngay_dat, 1) = :tuanHienTai";  // Điều kiện lọc theo năm và tuần

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':namHienTai', $namHienTai); // Gán giá trị năm hiện tại vào câu lệnh SQL
        $stmt->bindParam(':tuanHienTai', $tuanHienTai); // Gán giá trị tuần hiện tại vào câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả
        $ketQua = $stmt->fetch();
        return $ketQua['tong_so_luong_san_pham'] ?? 0; // Trả về tổng số lượng sản phẩm hoặc 0 nếu không có sản phẩm nào bán ra trong tuần

    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return 0; // Trả về 0 nếu có lỗi
    }
}






}