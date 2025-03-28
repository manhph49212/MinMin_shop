<?php

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function trangchu()
    {
        try {
            $sql = 'SELECT * FROM san_phams LIMIT 16';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function sanpham()
    {
        try {
            $sql = 'SELECT * FROM san_phams';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    // public function getSanPhamById($id)
    // {
    //     try {
    //         $sql = 'SELECT * FROM san_phams WHERE id = :id';
    //         print_r($sql);
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':idz', $id, PDO::PARAM_INT);
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về kết quả một dòng dữ liệu
    //     } catch (PDOException $e) {
    //         echo 'Lỗi: ' . $e->getMessage();
    //     }
    // }
    public function danhmuc()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function banner()
    {
        try {
            $sql = 'SELECT * FROM banners';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function tintuc()
    {
        try {
            $sql = 'SELECT * FROM tin_tucs';
            $stmt = $this->conn->query($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi lấy tin tức: ' . $e->getMessage();
        }

    }
    public function khuyenmai()
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->query($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi lấy khuyến mại: ' . $e->getMessage();
        }

    }
    public function lienhe()
    {
        try {
            $sql = 'SELECT * FROM lien_hes';
            $stmt = $this->conn->query($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            if (!$results) {
                echo "No products found.";
            }
            return $results;
        } catch (PDOException $e) {
            echo 'Lỗi lấy khuyến mại: ' . $e->getMessage();
        }

    }
    public function layTinTucTheoId($id)
    {
        $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Truy vấn tất cả tin tức
    public function layTatCaTinTuc()
    {
        $sql = 'SELECT * FROM tin_tucs';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSanPhamById($id)
    {
        $sql = "SELECT * FROM san_phams WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSanPhamLienQuan($idDanhMuc, $idSanPham)
    {
        $sql = "SELECT * FROM san_phams 
            WHERE danh_muc_id = ? AND id != ? 
            LIMIT 16"; // Lấy tối đa 4 sản phẩm liên quan
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idDanhMuc, $idSanPham]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        $query = "
    SELECT 
        binh_luans.id, 
        binh_luans.noi_dung, 
        binh_luans.ngay_binh_luan, 
        nguoi_dungs.ten_nguoi_dung, 
        san_phams.ten_san_pham,
        binh_luans.san_pham_id,
        nguoi_dungs.avatar
    FROM binh_luans 
    LEFT JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id 
    LEFT JOIN san_phams ON binh_luans.san_pham_id = san_phams.id ORDER BY binh_luans.id DESC
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả bình luận
    }

    public function layNguoiDungTheoTen($tennguoidung)
    {
        $sql = 'SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_nguoi_dung', $tennguoidung, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data)
    {
        try {
            $sql = "UPDATE nguoi_dungs SET 
            ten_nguoi_dung = :ten_nguoi_dung, 
            ho_va_ten = :ho_va_ten, 
            email = :email, 
            sdt = :sdt, 
            mat_khau = :mat_khau, 
            ngay_sinh = :ngay_sinh, 
            gioi_tinh = :gioi_tinh
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $data['id'] = $id;
            $stmt->execute($data);

        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    public function timKiemSanPham($keyword)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE ten_san_pham LIKE :keyword';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function locTheoDanhMuc($danhMucId)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function sapXepSanPham($kieuSapXep, $danhMucId = null)
    {
        try {
            $sql = 'SELECT * FROM san_phams';
            if ($danhMucId) {
                $sql .= ' WHERE danh_muc_id = :danh_muc_id';
            }
            switch ($kieuSapXep) {
                case 'moi-nhat':
                    $sql .= ' ORDER BY ngay_nhap DESC';
                    break;
                case 'ten-az':
                    $sql .= ' ORDER BY ten_san_pham ASC';
                    break;
                case 'gia-tang-dan':
                    $sql .= ' ORDER BY gia_san_pham ASC';
                    break;
                case 'gia-giam-dan':
                    $sql .= ' ORDER BY gia_san_pham DESC';
                    break;
            }
            $stmt = $this->conn->prepare($sql);
            if ($danhMucId) {
                $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }
    public function addComment($content, $nguoiDungId, $sanPhamId, $ngayBinhLuan)
    {
        $stmt = $this->conn->prepare("
        INSERT INTO binh_luans (noi_dung, nguoi_dung_id, san_pham_id, ngay_binh_luan) 
        VALUES (:noi_dung, :nguoi_dung_id, :san_pham_id, :ngay_binh_luan)
    ");
        $stmt->bindParam(':noi_dung', $content, PDO::PARAM_STR);
        $stmt->bindParam(':nguoi_dung_id', $nguoiDungId, PDO::PARAM_INT);
        $stmt->bindParam(':san_pham_id', $sanPhamId, PDO::PARAM_INT);
        $stmt->bindParam(':ngay_binh_luan', $ngayBinhLuan, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function laySanPhamTheoId($sanPhamId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_phams WHERE id = :sanPhamId");
        $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByProductId($productId)
    {
        $query = "
       SELECT 
           binh_luans.*, 
           nguoi_dungs.ten_nguoi_dung,
           nguoi_dungs.avatar
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
    public function getGioHang()
    {
        $sql = 'SELECT san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, gio_hangs.* FROM gio_hangs
        JOIN san_phams
        on gio_hangs.san_pham_id = san_phams.id';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGioHangById($id)
    {
        // SQL query to fetch the cart items based on user ID (nguoi_dung_id)
        $query = "
        SELECT san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, gio_hangs.so_luong, san_phams.so_luong as so_luong_san_pham, gio_hangs.* 
        FROM gio_hangs
        JOIN san_phams ON gio_hangs.san_pham_id = san_phams.id
        WHERE gio_hangs.nguoi_dung_id = :id
    ";

        // Prepare the query
        $stmt = $this->conn->prepare($query);

        // Bind the parameter to prevent SQL injection
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch all results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function idNguoiDung($ten_nguoi_dung)
    {
        $sql = "SELECT id from nguoi_dungs where ten_nguoi_dung = '$ten_nguoi_dung'";
        return $this->conn->query($sql);
    }
    public function addGioHang($soluong, $sanPhamId, $idNguoiDung)
    {
        $sql = "INSERT INTO gio_hangs(so_luong, san_pham_id, nguoi_dung_id)
          VALUES ('$soluong', '$sanPhamId', '$idNguoiDung')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    public function getSoLuong($id)
    {
        $sql = "SELECT so_luong from san_phams where id = '$id'";
        return $this->conn->query($sql);
    }
    public function getSanPhamid()
    {
        $sql = "SELECT san_pham_id FROM gio_hangs";
        return $this->conn->query($sql);
    }
    public function getSanPhamGioHang($id)
    {
        $sql = "SELECT so_luong FROM gio_hangs WHERE san_pham_id = '$id'";
        return $this->conn->query($sql);
    }
    public function updateSoLuong($sanPhamId, $soluong)
    {
        $sql = "UPDATE gio_hangs SET so_luong = '$soluong' WHERE san_pham_id ='$sanPhamId'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getAllThanhToan($id)
    {
        $sql = "SELECT * FROM nguoi_dungs where nguoi_dungs.id = '$id'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function themDonHang($ma_don_hang, $nguoi_dung_id, $ten_nguoi_nhan, $so_dien_thoai, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai_id, $phuong_thuc_thanh_toan_id, $tong_tien, $ngay_dat, $ghi_chu)
    {
        $sql = "INSERT INTO don_hangs(ma_don_hang, nguoi_dung_id, ten_nguoi_nhan, so_dien_thoai, email_nguoi_nhan, dia_chi_nguoi_nhan, trang_thai_id, phuong_thuc_thanh_toan_id, tong_tien,   ngay_dat, ghi_chu)
            VAlUES('$ma_don_hang', '$nguoi_dung_id', '$ten_nguoi_nhan', '$so_dien_thoai', '$email_nguoi_nhan', '$dia_chi_nguoi_nhan', '$trang_thai_id', '$phuong_thuc_thanh_toan_id', '$tong_tien',  '$ngay_dat', '$ghi_chu')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function getAllDonHang($id)
    {
        $sql = "SELECT 
            don_hangs.ma_don_hang, 
            don_hangs.ten_nguoi_nhan, 
            don_hangs.dia_chi_nguoi_nhan, 
            trang_thai_don_hangs.ten_trang_thai, 
            don_hangs.trang_thai_id,
            don_hangs.id 
            FROM don_hangs
            JOIN trang_thai_don_hangs
            ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.nguoi_dung_id = '$id' 
            ORDER BY don_hangs.id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function themChiTietDonHang($don_hang_id, $san_pham_id, $so_luong_san_pham, $don_gia, $so_luong, $thanh_tien)
    {
        $sql = "INSERT INTO chi_tiet_don_hangs(don_hang_id, san_pham_id, so_luong_san_pham, don_gia, so_luong, thanh_tien)
              VALUES ('$don_hang_id', '$san_pham_id', '$so_luong_san_pham', '$don_gia', '$so_luong', '$thanh_tien')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    public function updateSoLuongTonKho($san_pham_id, $so_luong)
    {
        $sql = "UPDATE san_phams SET so_luong = '$so_luong' where id = '$san_pham_id'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    public function updateDonHang($id)
{
    $sql = "UPDATE don_hangs
SET trang_thai_id = 10
WHERE DATEDIFF(CURDATE(), ngay_dat) >= 3 
AND trang_thai_id = 5";
    $stmt = $this->conn->prepare($sql);  // Prepare the SQL query for execution
    return $stmt->execute();  // Execute the query
}
    public function chitietdonhang($id)
    {
        $sql = "SELECT san_phams.ten_san_pham, chi_tiet_don_hangs.so_luong, chi_tiet_don_hangs.thanh_tien, san_phams.gia_khuyen_mai, san_phams.hinh_anh FROM chi_tiet_don_hangs
        JOIN san_phams
        on chi_tiet_don_hangs.san_pham_id = san_phams.id
        where chi_tiet_don_hangs.don_hang_id = '$id'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function laydonhang($id)
    {
        $sql = "SELECT * FROM don_hangs
        JOIN nguoi_dungs
        on don_hangs.nguoi_dung_id = nguoi_dungs.id
        JOIN trang_thai_don_hangs
        on don_hangs.trang_thai_id = trang_thai_don_hangs.id
        where don_hangs.id= '$id'";
        return $this->conn->query($sql)->fetch();
    }
    public function destroy($id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = 2 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->rowCount() > 0; // Trả về true nếu có hàng bị cập nhật
        } catch (PDOException $e) {
            error_log('Error in destroy method: ' . $e->getMessage());
            return false;
        }
    }

    public function xacnhan($id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = 10 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Error in xacnhan method: ' . $e->getMessage());
            return false;
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in findById method: ' . $e->getMessage());
            return false;
        }
    }
    public function getLove(){
        $sql = 'SELECT san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, san_phams.mo_ta, san_pham_yeu_thichs.* FROM san_pham_yeu_thichs
        JOIN san_phams
        on san_pham_yeu_thichs.san_pham_id = san_phams.id';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
}

