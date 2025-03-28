<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Tên máy chủ (hoặc localhost)
$username = "root"; // Tên đăng nhập cơ sở dữ liệu
$password = ""; // Mật khẩu cơ sở dữ liệu (mặc định với XAMPP là chuỗi rỗng)
$dbname = "minmin"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error); // Dừng chương trình nếu kết nối không thành công
}

// Xử lý đăng nhập khi người dùng gửi biểu mẫu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username']; // Lấy tên đăng nhập từ form
    $password = $_POST['password']; // Lấy mật khẩu từ form

    // Ngăn chặn SQL injection bằng cách thoát các ký tự đặc biệt
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Truy vấn kiểm tra thông tin người dùng
    $sql = "SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = '$username' AND mat_khau = '$password' AND trang_thai = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Nếu tìm thấy người dùng, lấy dữ liệu của người đó
        $user = $result->fetch_assoc();

        // Khởi tạo phiên làm việc và lưu thông tin người dùng vào session
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['ten_nguoi_dung'] = $user['ten_nguoi_dung'];
        $_SESSION['vai_tro'] = $user['vai_tro'];

        // Điều hướng người dùng đến trang khác dựa trên vai trò
        if ($user['vai_tro'] == 0) {

            echo "Admin "; // In ra "Admin", có thể điều hướng đến trang admin
        } else {
            // In ra "User", có thể điều hướng đến trang người dùng
            header("location: http://localhost/base_du_an_1/");
        }
        exit(); // Dừng chương trình sau khi đăng nhập thành công
    } else {
        $error_message = "Sai tên đăng nhập hoặc mật khẩu!"; // Thông báo lỗi nếu đăng nhập thất bại
    }
}

// Xử lý đăng ký khi người dùng gửi biểu mẫu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $Username = $_POST['registerUsername']; // Lấy tên đăng nhập từ form đăng ký
    $Email = $_POST['registerEmail']; // Lấy email từ form đăng ký
    $Password = $_POST['registerPassword']; // Lấy mật khẩu từ form đăng ký

    // Ngăn chặn SQL injection bằng cách thoát các ký tự đặc biệt
    $Username = $conn->real_escape_string($Username);
    $Email = $conn->real_escape_string($Email);
    $Password = $conn->real_escape_string($Password);

    // Truy vấn để chèn người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, email, mat_khau, vai_tro, trang_thai) VALUES ('$Username', '$Email', '$Password', 1, 1)";

    // Kiểm tra xem câu truy vấn có thành công không
    if ($conn->query($sql) === TRUE) {
        $success_message = "Đăng ký thành công! Bạn có thể đăng nhập ngay."; // Thông báo thành công
    } else {
        $error_message = "Đăng ký thất bại: " . $conn->error; // Thông báo lỗi nếu đăng ký không thành công
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập & Đăng Ký</title>
    <style>
        /* CSS cho các form đăng nhập và đăng ký */
        .form-container {
            display: block;
            position: fixed;
            right: 20px;
            top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container h2 {
            margin: 0 0 15px;
            text-align: center;
            color: #333;
        }

        .form-container label {
            display: block;
            margin: 5px 0;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px;
        }

        /* Ẩn form đăng ký */
        .register-form {
            display: none;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <!-- Form đăng nhập -->
        <h2>Đăng Nhập</h2>
        <?php
        if (isset($error_message)) {
            echo "<div class='error-message'>$error_message</div>"; // Hiển thị thông báo lỗi đăng nhập
        }
        ?>
        <form action="" method="POST" id="login-form">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Đăng Nhập</button>
        </form>
        <p><a href="javascript:void(0);" onclick="toggleForm('register')">Chưa có tài khoản? Đăng ký ngay</a></p>
    </div>

    <div class="form-container register-form" id="register-form">
        <!-- Form đăng ký -->
        <h2>Đăng Ký</h2>
        <?php
        if (isset($success_message)) {
            echo "<div class='success-message'>$success_message</div>"; // Hiển thị thông báo thành công khi đăng ký thành công
        } elseif (isset($error_message)) {
            echo "<div class='error-message'>$error_message</div>"; // Hiển thị thông báo lỗi nếu đăng ký thất bại
        }
        ?>
        <form action="" method="POST">
            <label for="registerUsername">Tên đăng nhập:</label>
            <input type="text" id="registerUsername" name="registerUsername" required>
            <label for="registerEmail">Email:</label>
            <input type="email" id="registerEmail" name="registerEmail" required>
            <label for="registerPassword">Mật khẩu:</label>
            <input type="password" id="registerPassword" name="registerPassword" required>
            <button type="submit" name="register">Đăng Ký</button>
        </form>
        <p><a href="javascript:void(0);" onclick="toggleForm('login')">Đã có tài khoản? Đăng nhập ngay</a></p>
    </div>

    <script>
        function toggleForm(formType) {
            if (formType === 'register') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';
            } else {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-form').style.display = 'none';
            }
        }
    </script>

</body>

</html>