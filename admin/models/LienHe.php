<?php

class LienHe
{
    public $conn;

    //connect to database
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //list danh muc
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM lien_hes";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'loi: ' . $e->getMessage();
        }
    }

    public function updateData($id, $email, $noi_dung, $trang_thai)
    {
        try {
            $sql = 'UPDATE lien_hes SET email = :email, noi_dung = :noi_dung, trang_thai= :trang_thai WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    //getDetailData
    public function getDetailData($id)
    {
        try {
            $sql = "SELECT * FROM lien_hes WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'loi: ' . $e->getMessage();
        }
    }


    //delete from database
    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM lien_hes WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'loi: ' . $e->getMessage();
        }
    }

    //disconnect from database
    public function __destruct()
    {
        $this->conn = null;
    }

    public function search($searchTerm)
    {
        $sql = "SELECT * FROM lien_hes WHERE id LIKE :searchTerm OR email LIKE :searchTerm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
}