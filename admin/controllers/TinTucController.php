<?php

class TinTucController
{
    // Kết nối đến file model
    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }

    public function index()
    {
        $tinTucs = $this->modelTinTuc->getAll();


        require_once './views/tintuc/list_tin_tuc.php';

    }

    public function create()
    {
        require_once './views/tintuc/create_tin_tuc.php';
    }

    public function store()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_tin_tuc = $_POST['ten_tin_tuc'];
        $noi_dung = $_POST['noi_dung'];
        $trang_thai = $_POST['trang_thai'];
       
        $errors = [];
        if (empty($ten_tin_tuc)) {
            $errors['ten_tin_tuc'] = 'Tên danh mục là bắt buộc';
        }
        if(empty($noi_dung)){
            $errors['noi_dung'] = 'Nội dung là bắt buộc';
        }
        if (empty($trang_thai)) {
            $errors['trang_thai'] = 'Trạng thái là bắt buộc';
        }
        if (empty($errors)) {
            $this->modelTinTuc->postData($ten_tin_tuc, $noi_dung, $trang_thai);
           
            unset($_SESSION['errors']);
            header('Location: ?act=tin-tucs');
            exit();
        } else {
            $_SESSION['errors'] = $errors;
            header('Location: ?act=form-them-tin-tucs');
            exit();
        }
    }
}




    // Hàm sửa
    public function edit()
    {
        $id = $_GET['tin_tuc_id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once './views/tintuc/edit_tin_tuc.php';
    }

    // Hàm cập nhật
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_tin_tuc = $_POST['ten_tin_tuc'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];
            if (empty($ten_tin_tuc)) {
                $errors['ten_tin_tuc'] = 'Tên tin tức là bắt buộc';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelTinTuc->updateData($id, $ten_tin_tuc, $noi_dung, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-tin-tucs');
                exit();
            }
        }
    }

    // Xóa
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['tin_tuc_id'];
            $this->modelTinTuc->deleteData($id);
            header('Location: ?act=tin-tucs');
            exit();
        }
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->modelTinTuc->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}
