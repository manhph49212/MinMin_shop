    <?php
    class DonHang
    {
        public $conn;
        public function __construct()
        {
            $this->conn = connectDB();

        }
        public function getAll()
        {
            try {
                $sql = "SELECT nguoi_dungs.ten_nguoi_dung, nguoi_dungs.sdt, don_hangs.ngay_dat, don_hangs.ma_don_hang,don_hangs.tong_tien, don_hangs.id, trang_thai_don_hangs.ten_trang_thai,don_hangs.dia_chi_nguoi_nhan FROM don_hangs JOIN trang_thai_don_hangs 
                on trang_thai_don_hangs.id = don_hangs.trang_thai_id
                JOIN nguoi_dungs on nguoi_dungs.id = don_hangs.nguoi_dung_id 
                ORDER BY don_hangs.id DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo 'Lỗi: ' . $e->getMessage();
            }
        }
        public function getDetail($id)
        {
            try {
                $sql = "SELECT * FROM don_hangs

        JOIN trang_thai_don_hangs 
        on trang_thai_don_hangs.id = don_hangs.trang_thai_id
        JOIN nguoi_dungs 
        on nguoi_dungs.id = don_hangs.nguoi_dung_id 
        JOIN chi_tiet_don_hangs
        on chi_tiet_don_hangs.don_hang_id = don_hangs.id
        JOIN san_phams
        on san_phams.id = chi_tiet_don_hangs.san_pham_id  
        JOIN phuong_thuc_thanh_toans
        on phuong_thuc_thanh_toans.id = don_hangs.phuong_thuc_thanh_toan_id
        where chi_tiet_don_hangs.don_hang_id = '$id'";
        return $this->conn->query($sql);
            } catch (PDOException $e) {
                echo 'Lỗi: ' . $e->getMessage();
            }
        }
        public function getStatus()
        {
            try {
                $sql = "SELECT * FROM trang_thai_don_hangs";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo 'Lỗi: ' . $e->getMessage();
            }
        }
        public function getEdit($id)
        {
            try {
                $sql = "SELECT * FROM don_hangs
                            JOIN trang_thai_don_hangs 
                            on trang_thai_don_hangs.id = don_hangs.trang_thai_id
                            JOIN nguoi_dungs 
                            on nguoi_dungs.id = don_hangs.nguoi_dung_id  
                            JOIN phuong_thuc_thanh_toans
                            on phuong_thuc_thanh_toans.id = don_hangs.phuong_thuc_thanh_toan_id
                            where don_hangs.id = '$id'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch();
            } catch (PDOException $e) {
                echo 'Lỗi: ' . $e->getMessage();
            }
        }
        public function edit($id, $ten_nguoi_nhan, $so_dien_thoai, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id)
        { 
            try {
                // Fixed the SQL query to use named parameters for $id
                $sql = "UPDATE don_hangs 
                        SET ten_nguoi_nhan = :ten_nguoi_nhan, 
                            so_dien_thoai = :so_dien_thoai, 
                            email_nguoi_nhan = :email_nguoi_nhan, 
                            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, 
                            ghi_chu = :ghi_chu, 
                            trang_thai_id = :trang_thai_id 
                        WHERE id = :id";  // Use :id for parameterized query
                $stmt = $this->conn->prepare($sql);
                
                $stmt->execute([
                    ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':email_nguoi_nhan' => $email_nguoi_nhan,
                    ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                    ':ghi_chu' => $ghi_chu,
                    ':trang_thai_id' => $trang_thai_id,
                    ':id' => $id // Add :id here for the WHERE clause
                ]);

        
                return true;
        
            } catch (PDOException $e) {
                echo 'Lỗi: ' . $e->getMessage();
                return false;
            }
        }
        
        
        
        


    }

    ?>