<?php
class LoginController {
    private $loginModel;

    function __construct() {
        $this->loginModel = new LoginModel();
    }

    function login() {
//        if (session_status() == PHP_SESSION_NONE) {
//            session_start();
//        }

        if (isset($_POST['login'])) {
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $mat_khau = $_POST['mat_khau'];

            // Kiểm tra tài khoản
            $user = $this->loginModel->checkAcc($ten_nguoi_dung, $mat_khau);

            if ($user) {
                $_SESSION['dn'] = $ten_nguoi_dung;
                $_SESSION['vai_tro'] = $user['vai_tro'];

                // Điều hướng theo vai trò
                if ($user['vai_tro'] == 0) {
                    header("Location: ?act=dashboard");
                    exit();  // Đảm bảo không tiếp tục thực thi mã phía dưới
                } else {
                    header("Location: http://localhost/base_du_an_1/");
                    exit();
                }
            } else {
                echo '<script>alert("Lỗi: Tài khoản hoặc mật khẩu sai!");</script>';
            }
        }

        require_once 'views/login/login.php';
    }

    function logout() {
        session_unset();
        session_destroy();
        header("location: ?act=login");
    }
}
?>
