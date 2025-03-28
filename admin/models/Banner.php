<?php
class Banner
{
    private $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM banners';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function postData($tieu_de, $trang_thai,$hinh_anh)
    {
        try {
            $sql = 'INSERT INTO banners(tieu_de,trang_thai, hinh_anh)
            VALUES (:tieu_de, :trang_thai, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':hinh_anh', $hinh_anh);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM banners WHERE id =:id';
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
            $sql = 'DELETE FROM banners WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function updateData($id, $tieu_de, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'UPDATE banners SET tieu_de = :tieu_de, trang_thai = :trang_thai, hinh_anh = :hinh_anh WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
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
        $sql = "SELECT * FROM banners WHERE id LIKE :searchTerm OR tieu_de LIKE :searchTerm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
}