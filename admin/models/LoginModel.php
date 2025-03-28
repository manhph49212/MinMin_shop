<?php

class loginModel
{
    public $conn;


    function __construct()
    {
        $this->conn = connectDB();
        define("ACTIVE", 1);
    }

    function checkAcc($ten_nguoi_dung, $mat_khau)
    {

        $sql = "SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if (password_verify($mat_khau, $user['mat_khau']) && $user['trang_thai'] == ACTIVE) {
                return $user;
            } else {
                return false;
            }
        }
        return false;
    }
}

?>