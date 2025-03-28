<?php
class Account
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Các phương thức khác của Account (getByEmail, getByPhone, getByUsername)...

    public function isExist($ten_nguoi_dung, $email, $sdt)
    {
        // Kiểm tra trùng tên người dùng
        $stmt1 = $this->conn->prepare("SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung");
        $stmt1->execute(['ten_nguoi_dung' => $ten_nguoi_dung]);
        if ($stmt1->fetch()) {
            return "Tên người dùng đã tồn tại!";
        }

        // Kiểm tra trùng email
        $stmt2 = $this->conn->prepare("SELECT * FROM nguoi_dungs WHERE email = :email");
        $stmt2->execute(['email' => $email]);
        if ($stmt2->fetch()) {
            return "Email đã tồn tại!";
        }

        // Kiểm tra trùng số điện thoại
        $stmt3 = $this->conn->prepare("SELECT * FROM nguoi_dungs WHERE sdt = :sdt");
        $stmt3->execute(['sdt' => $sdt]);
        if ($stmt3->fetch()) {
            return "Số điện thoại đã tồn tại!";
        }

        return false; // Nếu không có lỗi
    }
    public function register($data)
    {
        // Câu lệnh SQL để chèn dữ liệu vào bảng nguoi_dungs
        $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, ho_va_ten, email, sdt, dia_chi, mat_khau, ngay_sinh, gioi_tinh, thoi_gian_tao, vai_tro, trang_thai)
                VALUES (:ten_nguoi_dung, :ho_va_ten, :email, :sdt, :dia_chi, :mat_khau, :ngay_sinh, :gioi_tinh, :thoi_gian_tao, :vai_tro, :trang_thai)";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với dữ liệu được truyền vào
        $stmt->execute($data);
    }

    // Các phương thức khác (create, getByEmail, getByPhone...)
}