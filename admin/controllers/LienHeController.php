<?php

class LienHeController
{
    //connect to models
    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
    }

    //display func
    public function index()
    {
        //get from database
        $LienHes = $this->modelLienHe->getAll();

        //get data to view
        require_once './views/lienhe/listLienHe.php';
    }

    //display lien_hes editor
    public
    function edit()
    {
        //get id
        $id = $_GET['lien_he_id'];

        //get lien_hes detail
        $LienHes = $this->modelLienHe->getDetailData($id);

        //get data to edit
        require_once './views/lienhe/editLienHe.php';
    }

    //update lien_hes in database
    public
    function update()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['lien_he_id'];
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];
            $ngay_tao = $_POST['ngay_tao'];

            $this->modelLienHe->updateData($id, $email, $noi_dung, $trang_thai, $ngay_tao);
            unset($_SESSION['errors']);
            header('Location: ?act=lien-he');
            exit();

        }
    }


//delete from database
    public
    function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['lien_he_id'];

            //delete lien_hes
            $this->modelLienHe->deleteData($id);

            header('Location: ?act=lien-he');
            exit();
        }
    }

    public function ajaxSearch()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->modelLienHe->search($searchTerm);

            // Return results as JSON
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}