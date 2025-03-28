<?php

class BannerController
{
    private $bannerModel;
    public function __construct()
    {
        $this->bannerModel = new Banner();
    }
    public function index()
    {
        $banners = $this->bannerModel->getAll();
        // var_dump($Banners);
        require_once './views/banner/list_banner.php';
    }
    public function create()
    {
            require_once 'views/banner/create_banner.php';
        }
       
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload ảnh
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                // Chỉ định thư mục lưu ảnh
                $uploadDir = 'uploads/banner/';
                $fileName = basename($_FILES['hinh_anh']['name']);
                $uploadFile = $uploadDir . $fileName;

                // Di chuyển file tải lên vào thư mục đích
                if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $uploadFile)) {
                    $avatarPath = $uploadFile;
                } else {
                    $avatarPath = null; // Xử lý khi upload thất bại
                }
            }

            // Chuẩn bị dữ liệu để lưu vào database
            $data = [
                'tieu_de' => $_POST['tieu_de'],
                'hinh_anh' => isset($avatarPath) ? $avatarPath : null, // Lưu đường dẫn ảnh hoặc null nếu không có ảnh
                'trang_thai' => $_POST['trang_thai']
            ];

            // Tạo người dùng mới
            $this->bannerModel->postData($data['tieu_de'],$data['hinh_anh'], $data['trang_thai']);
            header('Location:?act=banners');
        } 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieu_de = $_POST['tieu_de'];
            $trang_thai = $_POST['trang_thai'];
            $hinh_anh = $_FILES['hinh_anh'];
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Banner là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Hình ảnh là bắt buộc';
            }
            if (empty($errors)) {
                $this->bannerModel->postData($tieu_de, $trang_thai, $hinh_anh);
                unset($_SESSION['errors']);
                header('Location:?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-banner');
                exit(); 
            }
        }
    }
    public function edit()
    {
        $id = $_GET['banner_id'];
        $banner = $this->bannerModel->getDetailData($id);
        require_once './views/banner/edit_banner.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $trang_thai = $_POST['trang_thai'];
            $hinh_anh = $_FILES['hinh_anh'];
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Banner là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Banner là bắt buộc';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Hình ảnh là bắt buộc';
            }
            if (empty($errors)) {
                $this->bannerModel->updateData($id, $tieu_de, $trang_thai,$hinh_anh);
                unset($_SESSION['errors']);
                header('Location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-banner');
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['banner_id'];
            $this->bannerModel->deleteData($id);
            header('Location: ?act=banners');
            exit();
        }
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->bannerModel->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}
