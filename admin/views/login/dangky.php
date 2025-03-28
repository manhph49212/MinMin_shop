<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
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
    <h2>Đăng ký tài khoản</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="?act=dang_ky" method="POST">
        <div class="form-group">
            <label for="ten_nguoi_dung">Tên người dùng:</label>
            <input type="text" class="form-control" name="ten_nguoi_dung"  placeholder="Tên người dùng" required>
        </div>

        <div class="form-group">
            <label for="ho_va_ten">Họ và tên:</label>
            <input type="text" class="form-control" name="ho_va_ten" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="sdt">Số điện thoại:</label>
            <input type="text" class="form-control" name="sdt" required>
        </div>

        <div class="form-group">
            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" required>
        </div>

        <div class="form-group">
            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" class="form-control" name="mat_khau" required>
        </div>

        <div class="form-group">
            <label for="ngay_sinh">Ngày sinh:</label>
            <input type="date" class="form-control" name="ngay_sinh" required>
        </div>

        <div class="form-group">
            <label>Giới tính:</label><br>
            <label class="radio-inline"><input type="radio" name="gioi_tinh" value="1"> Nam</label>
            <label class="radio-inline"><input type="radio" name="gioi_tinh" value="0"> Nữ</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
    </form>
    <div class="toggle-form">
        <a href="?act=login">Chuyển sang Đăng nhập</a>
    </div>
</div>
</body>
</html>
