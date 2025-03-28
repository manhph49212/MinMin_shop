<?php

class SanPhamController
{
    public function index()
    {
        $sanPhamModel = new SanPham();
        $sanPhams = $sanPhamModel->getAll();
        require_once 'views/sanpham/list_san_pham.php';
    }

    public function create()
    {
        $danhMucModel = new DanhMuc();
        $danhMucs = $danhMucModel->getAll();
        require_once 'views/sanpham/create_san_pham.php';
    }

    public function show()
    {
        $sanPhamModel = new SanPham();
        $sanPham = $sanPhamModel->getById($_GET['id']);

        $commentModel = new Comment();
        $comments = $commentModel->getByProductId($_GET['id']);

        // Calculate average rating
        $averageRating = 0;
        if (!empty($comments)) {
            $totalRating = array_sum(array_column($comments, 'danh_gia'));
            $averageRating = $totalRating / count($comments);
        }

        require_once 'views/sanpham/detail_san_pham.php';
    }

    public function store()
    {
        $sanPhamModel = new SanPham();
        $data = [
            'ten_san_pham' => $_POST['ten_san_pham'],
            'gia_san_pham' => $_POST['gia_san_pham'],
            'gia_khuyen_mai' => $_POST['gia_khuyen_mai'],
            'so_luong' => $_POST['so_luong'],
            'mo_ta' => $_POST['mo_ta'],
            'mo_ta_chi_tiet' => $_POST['mo_ta_chi_tiet'],
            'danh_muc_id' => $_POST['danh_muc_id'],
            'trang_thai' => $_POST['trang_thai'],
            'hinh_anh' => '',
        ];

        // Handle file upload
        if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
            $targetDir = "uploads/sanpham/";
            $targetFile = $targetDir . basename($_FILES["hinh_anh"]["name"]);
            if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $targetFile)) {
                $data['hinh_anh'] = $targetFile;
            }
        }

        $sanPhamModel->insert($data);
       
        header('Location: ?act=san-pham');
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sanPhamModel = new SanPham();

            // Handle file upload
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                $targetDir = "uploads/sanpham/";
                $targetFile = $targetDir . basename($_FILES["hinh_anh"]["name"]);
                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $targetFile)) {
                    $_POST['hinh_anh'] = $targetFile;
                }
            } else {
                // If no new image is uploaded, keep the existing image
                $_POST['hinh_anh'] = $_POST['existing_image'];
            }

            // Remove the existing_image field from POST data
            unset($_POST['existing_image']);

            // Update the product
            $sanPhamModel->update($_POST);
            header('Location: ?act=san-pham');
        }
    }

    public function edit()
    {
        $sanPhamModel = new SanPham();
        $sanPham = $sanPhamModel->getById($_GET['id']);

        $danhMucModel = new DanhMuc();
        $danhMucs = $danhMucModel->getAll();

        require_once 'views/sanpham/edit_san_pham.php';
    }

    public function destroy()
    {
        $sanPhamModel = new SanPham();
        $sanPhamModel->delete($_POST['id']);
        header('Location: ?act=san-pham');
    }

 
}