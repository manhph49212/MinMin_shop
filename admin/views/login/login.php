<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            padding: 40px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .toggle-form {
            text-align: center;
            margin-top: 20px;
        }
        .toggle-form a {
            color: #2980b9;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .toggle-form a:hover {
            color: #21618c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Đăng nhập</h2>
    <?php
    // Hiển thị thông báo lỗi (nếu có)
    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="?act=login" method="POST">
        <div class="form-group">
            <label for="ten_nguoi_dung">Tên người dùng:</label>
            <input type="text" class="form-control" name="ten_nguoi_dung" placeholder="Tên người dùng" required>
        </div>

        <div class="form-group">
            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
    </form>
    <div class="toggle-form">
        <a href="?act=dang_ky">Chuyển sang Đăng ký</a>
    </div>
</div>
</body>
</html>
