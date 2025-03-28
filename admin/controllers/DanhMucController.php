<?php

class DanhMucController
{
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }

    public function index()
    {
        $danhMucs = $this->modelDanhMuc->getAll();
        // var_dump($danhMucs);
        require_once './views/danhmuc/list_danh_muc.php';
    }

    public function create()
    {
        require_once './views/danhmuc/create_danh_muc.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->postData($ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-danh-muc');
                exit();
            }
        }
    }

    public function edit()
    {
        $id = $_GET['danh_muc_id'];
        $danhMuc = $this->modelDanhMuc->getDetailData($id);
        require_once './views/danhmuc/edit_danh_muc.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-danh-muc');
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];
            $this->modelDanhMuc->deleteData($id);
            header('Location: ?act=danh-mucs');
            exit();
        }
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->modelDanhMuc->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}