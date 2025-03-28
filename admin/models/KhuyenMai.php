<?php

class KhuyenMai
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "minmin");

        if ($this->db->connect_error) {
            die("Kết nối thất bại: " . $this->db->connect_error);
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM khuyen_mais order by id desc";
        $result = $this->db->query($query);

        $khuyenmai = [];
        while ($row = $result->fetch_assoc()) {
            $khuyenmai[] = $row;
        }

        return $khuyenmai;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM khuyen_mais WHERE id = $id";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function create($data)
    {
        $ten_khuyen_mai = $this->db->real_escape_string($data['ten_khuyen_mai']);
        $ma_khuyen_mai = $this->db->real_escape_string($data['ma_khuyen_mai']);
        $gia_tri = $this->db->real_escape_string($data['gia_tri']);
        $ngay_bat_dau = $this->db->real_escape_string($data['ngay_bat_dau']);
        $ngay_ket_thuc = $this->db->real_escape_string($data['ngay_ket_thuc']);
        $mota = $this->db->real_escape_string($data['mo_ta']);
        $trang_thai = $this->db->real_escape_string($data['trang_thai']);

        $query = "INSERT INTO khuyen_mais (ten_khuyen_mai, ma_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc, mo_ta, trang_thai) 
                  VALUES ('$ten_khuyen_mai', '$ma_khuyen_mai', '$gia_tri', '$ngay_bat_dau', '$ngay_ket_thuc', '$mota', '$trang_thai')";
        return $this->db->query($query);
    }

    public function update($id, $data)
    {
        $ten_khuyen_mai = $this->db->real_escape_string($data['ten_khuyen_mai']);
        $ma_khuyen_mai = $this->db->real_escape_string($data['ma_khuyen_mai']);
        $gia_tri = $this->db->real_escape_string($data['gia_tri']);
        $ngay_bat_dau = $this->db->real_escape_string($data['ngay_bat_dau']);
        $ngay_ket_thuc = $this->db->real_escape_string($data['ngay_ket_thuc']);
        $mota = $this->db->real_escape_string($data['mo_ta']);
        $trang_thai = $this->db->real_escape_string($data['trang_thai']);

        $query = "UPDATE khuyen_mais SET 
                    ten_khuyen_mai = '$ten_khuyen_mai',
                    ma_khuyen_mai = '$ma_khuyen_mai',
                    gia_tri = '$gia_tri',
                    ngay_bat_dau = '$ngay_bat_dau',
                    ngay_ket_thuc = '$ngay_ket_thuc',
                    mo_ta = '$mota',
                    trang_thai = '$trang_thai'
                  WHERE id = $id";
        return $this->db->query($query);
    }

    public function delete($id)
    {
        $query = "DELETE FROM khuyen_mais WHERE id = $id";
        return $this->db->query($query);
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function search($searchTerm)
    {
        $sql = "SELECT * FROM khuyen_mais WHERE id LIKE ? OR ten_khuyen_mai LIKE ?";
        $stmt = $this->db->prepare($sql);
        $searchTerm = "%$searchTerm%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
