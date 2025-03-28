<?php
// Lấy dữ liệu từ form
$email = $_POST["email"];
$noi_dung = $_POST["noi_dung"];

// Gọi file cấu hình
require_once('./commons/env.php');

// Kết nối cơ sở dữ liệu
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Chuẩn bị câu lệnh SQL (Không cần 'id' nữa vì nó sẽ auto increment)
$sql = "INSERT INTO lien_hes (email, noi_dung, trang_thai, ngay_tao) VALUES (?, ?, 1, NOW())";

// Sử dụng prepared statement để bảo mật
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $noi_dung); // "ss" là kiểu dữ liệu: s = string
// Thực thi câu lệnh
// After executing the query, check how many rows were affected
if ($stmt->execute()) {
    // Get the last inserted ID
    $inserted_id = $stmt->insert_id; 
    echo "Inserted ID: " . $inserted_id;

    // You can then fetch the row with this inserted ID if needed
    // Or use this $inserted_id in another query to find the row
    echo "<script>alert('Thêm dữ liệu thành công!'); window.location.href = '/base_du_an_1/';</script>";
} else {
    echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
}



// Đóng kết nối
$stmt->close();
$conn->close();
?>
