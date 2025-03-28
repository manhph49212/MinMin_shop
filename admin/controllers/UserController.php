<?php


class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        require_once 'views/users/index.php';
    }

    public function show($id)
    {
        $user = $this->userModel->getById($id);
        require_once 'views/users/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload ảnh
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Chỉ định thư mục lưu ảnh
                $uploadDir = 'uploads/avatars/';
                $fileName = basename($_FILES['avatar']['name']);
                $uploadFile = $uploadDir . $fileName;

                // Di chuyển file tải lên vào thư mục đích
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                    $avatarPath = $uploadFile;
                } else {
                    $avatarPath = null; // Xử lý khi upload thất bại
                }
            }

            // Chuẩn bị dữ liệu để lưu vào database
            $data = [
                'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                'ho_va_ten' => $_POST['ho_va_ten'],
                'email' => $_POST['email'],
                'sdt' => $_POST['sdt'],
                'dia_chi' => $_POST['dia_chi'],
                'mat_khau' => md5($_POST['mat_khau']),
                'ngay_sinh' => $_POST['ngay_sinh'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'avatar' => isset($avatarPath) ? $avatarPath : null, // Lưu đường dẫn ảnh hoặc null nếu không có ảnh
                'vai_tro' => $_POST['vai_tro'],
                'trang_thai' => $_POST['trang_thai']
            ];

            // Tạo người dùng mới
            $this->userModel->create($data);
            header('Location: ?act=users');
        } else {
            require_once 'views/users/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload ảnh
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Chỉ định thư mục lưu ảnh
                $uploadDir = 'uploads/avatars/';
                $fileName = basename($_FILES['avatar']['name']);
                $uploadFile = $uploadDir . $fileName;

                // Di chuyển file tải lên vào thư mục đích
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                    $avatarPath = $uploadFile;
                } else {
                    $avatarPath = null; // Xử lý khi upload thất bại
                }
            } else {
                // Giữ nguyên avatar cũ nếu không có file mới
                $avatarPath = $_POST['current_avatar']; // Lấy đường dẫn ảnh cũ từ form
            }

            // Chuẩn bị dữ liệu để lưu vào database
            $data = [
                'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                'ho_va_ten' => $_POST['ho_va_ten'],
                'email' => $_POST['email'],
                'sdt' => $_POST['sdt'],
                'dia_chi' => $_POST['dia_chi'],
                'mat_khau' => md5($_POST['mat_khau']),
                'ngay_sinh' => $_POST['ngay_sinh'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'avatar' => $avatarPath, // Lưu đường dẫn ảnh mới hoặc giữ ảnh cũ
                'vai_tro' => $_POST['vai_tro'],
                'trang_thai' => $_POST['trang_thai']
            ];

            // Cập nhật thông tin người dùng
            $this->userModel->update($id, $data);
            header('Location: ?act=users');
        } else {
            // Lấy dữ liệu người dùng để hiển thị lên form chỉnh sửa
            $user = $this->userModel->getById($id);
            require_once 'views/users/edit.php';
        }
    }

    public function delete($id)
    {
        // Lấy dữ liệu người dùng để truy cập đường dẫn ảnh
        $user = $this->userModel->getById($id);

        // Xóa file ảnh đại diện nếu có
        if ($user['avatar'] && file_exists($user['avatar'])) {
            unlink($user['avatar']);
        }

        // Xóa người dùng khỏi database
        $this->userModel->delete($id);
        header('Location: ?act=users');
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->userModel->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}