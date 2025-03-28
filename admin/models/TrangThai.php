<?php
class TrangThai
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM trang_thai_don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM trang_thai_don_hangs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO trang_thai_don_hangs (ten_trang_thai) 
                VALUES (:ten_trang_thai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE trang_thai_don_hangs SET ten_trang_thai = :ten_trang_thai
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function search($searchTerm)
    {
        $sql = "SELECT * FROM trang_thai_don_hangs WHERE id LIKE :searchTerm OR ten_trang_thai LIKE :searchTerm";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['searchTerm' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
}
