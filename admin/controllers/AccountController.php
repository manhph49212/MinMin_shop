<?php


class AccountController
{
    private $accountModel;

    public function __construct()
    {
        $this->accountModel = new Account();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form đăng ký
            $ten_nguoi_dung = htmlspecialchars(trim($_POST['ten_nguoi_dung']));
            $ho_va_ten = htmlspecialchars(trim($_POST['ho_va_ten']));
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $sdt = htmlspecialchars(trim($_POST['sdt']));
            $dia_chi = htmlspecialchars(trim($_POST['dia_chi']));
            $mat_khau = $_POST['mat_khau'];
            $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);
            $ngay_sinh = htmlspecialchars(trim($_POST['ngay_sinh']));
            $gioi_tinh = htmlspecialchars(trim($_POST['gioi_tinh']));
            $thoi_gian_tao = date('Y-m-d H:i:s');
            $vai_tro = 1; // Mặc định vai trò là 1
            $trang_thai = 1; // Mặc định trạng thái là 1

            // Kiểm tra sự tồn tại của tên người dùng, email và số điện thoại
            $error = $this->accountModel->isExist($ten_nguoi_dung, $email, $sdt);
            if ($error) {
                $errorMessage = $error; // Lưu lỗi để hiển thị
                require_once 'views/login/dangky.php';
                return;
            }

            // Chuẩn bị dữ liệu để lưu vào database
            $data = [
                'ten_nguoi_dung' => $ten_nguoi_dung,
                'ho_va_ten' => $ho_va_ten,
                'email' => $email,
                'sdt' => $sdt,
                'dia_chi' => $dia_chi,
                'mat_khau' => $hashedPassword,
                'ngay_sinh' => $ngay_sinh,
                'gioi_tinh' => $gioi_tinh,
                'thoi_gian_tao' => $thoi_gian_tao,
                'vai_tro' => $vai_tro,
                'trang_thai' => $trang_thai
            ];

            // Tạo tài khoản mới
            $this->accountModel->register($data);
            header('Location: ?act=login');
        } else {
            require_once 'views/login/dangky.php';
        }
    }
}
?>