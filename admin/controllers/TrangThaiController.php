<?php

class TrangThaiController
{
    private $trangthaiModel;

    public function __construct()
    {
        $this->trangthaiModel = new TrangThai();
    }

    public function index()
    {
        $trangthais = $this->trangthaiModel->getAll();
        require_once 'views/trangthais/index.php';
    }

    // public function show($id)
    // {
    //     $tintuc = $this->trangthaiModel->getById($id);
    //     require_once 'views/trangthais/show.php';
    // }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_trang_thai' => $_POST['ten_trang_thai'],

            ];
            $this->trangthaiModel->create($data);
            header('Location: ?act=trangthais');
        } else {
            require_once 'views/trangthais/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_trang_thai' => $_POST['ten_trang_thai'],

            ];
            $this->trangthaiModel->update($id, $data);
            header('Location: ?act=trangthais');
        } else {
            $trangthai = $this->trangthaiModel->getById($id);
            require_once 'views/trangthais/edit.php';
        }
    }

    public function delete($id)
    {
        $this->trangthaiModel->delete($id);
        header('Location: ?act=trangthais');
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->trangthaiModel->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}
