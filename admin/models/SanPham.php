<?php

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                ORDER BY san_phams.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insert($data)
    {
        try {
            $sql = "INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, mo_ta, mo_ta_chi_tiet, danh_muc_id, trang_thai, hinh_anh) 
            VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :mo_ta, :mo_ta_chi_tiet, :danh_muc_id, :trang_thai, :hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE san_phams SET ten_san_pham = :ten_san_pham, gia_san_pham = :gia_san_pham, gia_khuyen_mai = :gia_khuyen_mai, 
                 so_luong = :so_luong, mo_ta = :mo_ta, mo_ta_chi_tiet = :mo_ta_chi_tiet, danh_muc_id = :danh_muc_id, ngay_nhap = :ngay_nhap,
                 trang_thai = :trang_thai, hinh_anh = :hinh_anh WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}