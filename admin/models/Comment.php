<?php

class Comment
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối với cơ sở dữ liệu
    }

    // Lấy tất cả bình luận
    public function getAll()
    {
        $query = "
    SELECT 
        binh_luans.id, 
        binh_luans.noi_dung, 
        binh_luans.danh_gia, 
        binh_luans.ngay_binh_luan, 
        nguoi_dungs.ten_nguoi_dung, 
        san_phams.ten_san_pham,
        binh_luans.san_pham_id
    FROM binh_luans 
    LEFT JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id 
    LEFT JOIN san_phams ON binh_luans.san_pham_id = san_phams.id ORDER BY binh_luans.id DESC
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả bình luận
    }

    // Lấy bình luận theo ID
    public function getById($id)
    {
        $query = "SELECT * FROM binh_luans WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về bình luận
    }

    // Cập nhật bình luận
    public function update($id, $noi_dung, $danh_gia)
    {
        $query = "UPDATE binh_luans SET noi_dung = :noi_dung, danh_gia = :danh_gia WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
        $stmt->bindParam(':danh_gia', $danh_gia, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Xóa bình luận
    public function delete($id)
    {
        $query = "DELETE FROM binh_luans WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getByProductId($productId)
    {
        $query = "
        SELECT 
            binh_luans.*, 
            nguoi_dungs.ten_nguoi_dung 
        FROM binh_luans 
        LEFT JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id 
        WHERE binh_luans.san_pham_id = :productId 
        ORDER BY binh_luans.ngay_binh_luan DESC
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}