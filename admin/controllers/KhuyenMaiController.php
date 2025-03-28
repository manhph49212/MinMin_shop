<?php

class KhuyenMaiController
{
    private $khuyenmaiModel;

    public function __construct()
    {
        $this->khuyenmaiModel = new KhuyenMai();
    }

    public function index()
    {
        $khuyenmai = $this->khuyenmaiModel->getAll();
        require_once "views/khuyenmai/list.php";
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'ten_khuyen_mai' => $_POST["ten_khuyen_mai"],
                'ma_khuyen_mai' => $_POST["ma_khuyen_mai"],
                'gia_tri' => $_POST["gia_tri"],
                'ngay_bat_dau' => $_POST["ngay_bat_dau"],
                'ngay_ket_thuc' => $_POST["ngay_ket_thuc"],
                'mo_ta' => $_POST["mo_ta"],
                'trang_thai' => $_POST["trang_thai"],
            ];

            $this->khuyenmaiModel->create($data);
            header("Location: index.php?act=khuyen_mai");
            exit();
        } else {
            require_once "views/khuyenmai/create.php";
        }
    }

    public function edit($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'ten_khuyen_mai' => $_POST["ten_khuyen_mai"],
                'ma_khuyen_mai' => $_POST["ma_khuyen_mai"],
                'gia_tri' => $_POST["gia_tri"],
                'ngay_bat_dau' => $_POST["ngay_bat_dau"],
                'ngay_ket_thuc' => $_POST["ngay_ket_thuc"],
                'mo_ta' => $_POST["mo_ta"],
                'trang_thai' => $_POST["trang_thai"],
            ];

            $this->khuyenmaiModel->update($id, $data);
            header("Location: index.php?act=khuyen_mai");
            exit();
        } else {
            $khuyenmai = $this->khuyenmaiModel->getById($id);
            require_once "views/khuyenmai/edit.php";
        }
    }

    public function delete($id)
    {
        $this->khuyenmaiModel->delete($id);
        header("Location: index.php?act=khuyen_mai");
        exit();
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->khuyenmaiModel->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}
