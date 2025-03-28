<?php

class DanhMuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function postData($ten_danh_muc, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO danh_mucs(ten_danh_muc,trang_thai)
            VALUES (:ten_danh_muc, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function updateData($id, $ten_danh_muc, $trang_thai)
    {
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function search($searchTerm)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id LIKE :searchTerm OR ten_danh_muc LIKE :searchTerm';
            $stmt = $this->conn->prepare($sql);
            $searchTerm = "%$searchTerm%";
            $stmt->bindParam(':searchTerm', $searchTerm);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}