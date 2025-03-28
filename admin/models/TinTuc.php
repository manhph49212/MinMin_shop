<?php

class TinTuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Danh sách tin tức 
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM tin_tucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm dữ liệu mới vào CSDL
    public function postData($ten_tin_tuc, $noi_dung, $trang_thai)
{
    try {
        // Use placeholders for the query
        $sql = "INSERT INTO tin_tucs (ten_tin_tuc, noi_dung, trang_thai)
                VALUES (:ten_tin_tuc, :noi_dung, :trang_thai)";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters to the placeholders
        $stmt->bindParam(':ten_tin_tuc', $ten_tin_tuc);
        $stmt->bindParam(':noi_dung', $noi_dung);
        $stmt->bindParam(':trang_thai', $trang_thai);

        // Execute the statement
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}



    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id =:id';
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
            $sql = 'DELETE FROM tin_tucs WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function updateData($id, $ten_tin_tuc, $noi_dung, $trang_thai)
    {
        try {
            $sql = 'UPDATE tin_tucs SET ten_tin_tuc = :ten_tin_tuc, noi_dung = :noi_dung, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_tin_tuc', $ten_tin_tuc);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    //Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }

    public function search($searchTerm)
    {
        $sql = "SELECT * FROM tin_tucs WHERE id LIKE :searchTerm OR ten_tin_tuc LIKE :searchTerm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
}
