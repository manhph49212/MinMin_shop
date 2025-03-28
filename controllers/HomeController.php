<?php 

class HomeController
{
    public $modelSanPham;
    public $modelTintuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
      
    }
    public function trangchu()
    {
        $danhMucs = $this->modelSanPham->danhmuc();
        $sanPhams = $this->modelSanPham->trangchu();
        $banners = $this->modelSanPham->banner();
        $comments = $this->modelSanPham->getAll();
        require_once './views/trangchu.php';
    }
    public function sanpham()
    {
        $danhMucs = $this->modelSanPham->danhmuc();
        $sanPhams = $this->modelSanPham->sanpham();
        $comments = $this->modelSanPham->getAll();
        require_once './views/san_pham.php';
    }
    public function tintuc(){
        $tintucs = $this->modelSanPham->tintuc();
        $danhMucs = $this->modelSanPham->danhmuc();
        $comments = $this->modelSanPham->getAll();
        require_once './views/tintuc.php';
    }
    public function khuyenmai(){
        $khuyenmais = $this->modelSanPham->khuyenmai();
        $danhMucs = $this->modelSanPham->danhmuc();
        $comments = $this->modelSanPham->getAll();
        require_once './views/khuyenmai.php';
    }
    public function lienhe(){
        $lienhes = $this->modelSanPham->lienhe();
        $danhMucs = $this->modelSanPham->danhmuc();
        $comments = $this->modelSanPham->getAll();
        require_once './views/lienhe.php';
    }
    public function copyCode($maKhuyenMai) {
        // Kiểm tra hoặc xử lý dữ liệu nếu cần, ví dụ: lưu log, gửi email, v.v.
        // Trả lại mã khuyến mãi cho view hoặc xử lý thêm
        echo json_encode(['success' => true, 'code' => $maKhuyenMai]);
    }
    public function chiTietTinTuc($id)
    {
        $danhMucs = $this->modelSanPham->danhmuc();
        $tintuc = $this->modelSanPham->layTinTucTheoId($id);
        $comments = $this->modelSanPham->getAll();
        if (!$tintuc) {
            echo "Tin tức không tồn tại.";
        } else {
            require_once './views/chitiettintuc.php';
        }
    }

    // Hiển thị danh sách tin tức
//    public function danhSachTinTuc()
//    {
//        $tintucs = $this->modelSanPham->layTatCaTinTuc();
//        require_once './views/danhsachtintuc.php'; // Gửi dữ liệu đến view danh sách
//    }

public function chiTietSanPham($id)
{
    if (isset($_SESSION['dn'])) {
        $idNguoiDung = $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];
    }

    // Get the product details
    $danhMucs = $this->modelSanPham->danhmuc();
    $sanPham = $this->modelSanPham->getSanPhamById($id);
    $comments = $this->modelSanPham->getByProductId($id); // Get comments by product id
    $giohangs = $this->modelSanPham->getGioHangById($id); // Get cart by product id
    $sanPhamLienQuan = $this->modelSanPham->getSanPhamLienQuan($sanPham['danh_muc_id'], $id);
    $sanPhamId = $_GET['id'];

    // Check if the form has been submitted
    if (isset($_POST['btn-submit'])) {
        $soluong = $_POST['so_luong']; // Quantity entered by the user
        $soLuongSanPham = $this->modelSanPham->getSoLuong($sanPhamId)->fetch()['so_luong']; // Available stock

        // Check if the requested quantity exceeds available stock
        if ($soluong > $soLuongSanPham) {
            echo "<script>alert ('Localhost cho biết: Số lượng sản phẩm ở kho không đủ!')</script>";
        } else {
            // Get all cart items
            $sanPhamIds = $this->modelSanPham->getSanPhamid()->fetchAll();
            $data = true;
            foreach ($sanPhamIds as $value) {
                // Check if the product already exists in the cart
                if ($value['san_pham_id'] == $sanPhamId) {
                    // Get the current quantity in the cart
                    $soLuongSanPhamTrongGio = $this->modelSanPham->getSanPhamGioHang($sanPhamId)->fetch()['so_luong'];

                    // Calculate new quantity in the cart
                    $soLuongMoi = $soluong + $soLuongSanPhamTrongGio;

                    // Check if the updated quantity exceeds available stock
                    if ($soLuongMoi > $soLuongSanPham) {
                        echo "<script>alert ('Localhost cho biết: Số lượng sản phẩm trong giỏ hàng cộng với số lượng muốn thêm đã vượt quá số lượng có sẵn trong kho!')</script>";
                    } else {
                        // Update the cart with the new quantity
                        $this->modelSanPham->updateSoLuong($sanPhamId, $soLuongMoi);
                        echo "<script>alert ('Localhost cho biết: Thêm giỏ hàng thành công!')</script>";
                    }
                    $data = false;
                    break;
                }
            }

            // If the product is not in the cart, add it
            if ($data) {
                // Check if the quantity requested exceeds available stock before adding
                if ($soluong <= $soLuongSanPham) {
                    $this->modelSanPham->addGioHang($soluong, $sanPhamId, $idNguoiDung);
                    echo "<script>alert ('Localhost cho biết: Thêm giỏ hàng thành công!')</script>";
                } else {
                    echo "<script>alert ('Localhost cho biết: Số lượng sản phẩm muốn thêm vượt quá số lượng có sẵn trong kho!')</script>";
                }
            }
        }
    }

    if (!$sanPham) {
        die('Sản phẩm không tồn tại.');
    }

    // Render the view
    require_once "views/chi_tiet_san_pham.php";
}

    public function chiTietNguoiDung($tennguoidung)
{
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    // Lấy thông tin người dùng theo tên
    $nguoidung = $this->modelSanPham->layNguoiDungTheoTen($tennguoidung);
    if (!$nguoidung) {
        echo "Người dùng không tồn tại.";
    } else {
        require_once './views/nguoidung.php';
    }
}
public function timKiem($keyword)
{
    $sanPhams = $this->modelSanPham->timKiemSanPham($keyword);
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    require_once './views/timkiem.php';
}

public function locSanPham($danhMucId = null)
{
    if ($danhMucId) {
        $sanPhams = $this->modelSanPham->locTheoDanhMuc($danhMucId);
    } else {
        $sanPhams = $this->modelSanPham->sanpham();
    }
    $danhMucs = $this->modelSanPham->danhmuc();
    require_once './views/timkiem.php';
}

public function sapXep($kieuSapXep = 'moi-nhat', $danhMucId = null)
{
    $sanPhams = $this->modelSanPham->sapXepSanPham($kieuSapXep, $danhMucId);
    $danhMucs = $this->modelSanPham->danhmuc();
    
    require_once './views/timkiem.php';
}
public function addComment() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra dữ liệu đầu vào
        if (isset($_POST['noi_dung'], $_POST['san_pham_id'])) {
            $content = htmlspecialchars(trim($_POST['noi_dung'])); // Xử lý chuỗi đầu vào
            $sanPhamId = intval($_POST['san_pham_id']); // Lấy ID sản phẩm từ form
            $idNguoiDung= $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];
            // Kiểm tra các giá trị hợp lệ
            if (empty($content)) {
                echo "Nội dung bình luận không được để trống.";
                return;
            }
           

            // Kiểm tra xem sản phẩm có tồn tại không
            $sanPham = $this->modelSanPham->laySanPhamTheoId($sanPhamId);
            if (!$sanPham) {
                echo "Sản phẩm không tồn tại.";
                return;
            }

            // Thêm bình luận
            $ngayBinhLuan = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
            if ($this->modelSanPham->addComment($content, $idNguoiDung, $sanPhamId, $ngayBinhLuan)) {
                // Chuyển hướng đến trang chi tiết sản phẩm
                header('Location:?act=chitietsp&id=' . $sanPhamId);
                exit();
            } else {
                echo "Có lỗi xảy ra khi thêm bình luận.";
            }
        } else {
            echo "Dữ liệu gửi không hợp lệ.";
        }
    }
}
public function giohang($id){
    
    $giohangs = $this->modelSanPham->getGioHang();
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    if(isset($_SESSION['dn'])){
    $idNguoiDung= $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];
    $giohangs = $this->modelSanPham->getGioHangById($idNguoiDung);
    }
    require_once './views/gio_hang.php';
}
public function destroy($id)
{
    $this->modelSanPham->delete($id);
    header('Location: ?act=giohang');
}
   
public function edit($id)
{
    // Lấy danh mục sản phẩm (nếu cần thiết)
    $danhMucs = $this->modelSanPham->danhmuc();
     $comments = $this->modelSanPham->getAll();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = $this->modelSanPham->layNguoiDungTheoTen($id);
        $currentPassword = $user['mat_khau']; // Mật khẩu hiện tại từ cơ sở dữ liệu

        // Kiểm tra nếu người dùng nhập mật khẩu cũ
        if (isset($_POST['mat_khau_hien_tai']) && !empty($_POST['mat_khau_hien_tai'])) {
            // So sánh mật khẩu cũ với mật khẩu hiện tại trong cơ sở dữ liệu
            if (!password_verify($_POST['mat_khau_hien_tai'], $currentPassword)) {
                // Mật khẩu cũ không đúng
                echo "<script>alert ('Localhost cho biết: Mật khẩu hiện tại không chính xác!')</script>";
                return;
            }
        }

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu
        if (isset($_POST['mat_khau']) && !empty($_POST['mat_khau'])) {
            if ($_POST['mat_khau'] !== $_POST['xac_nhan']) {
                // Mật khẩu mới và xác nhận không khớp
                echo "<script>alert ('Localhost cho biết: Mật khẩu mới và xác nhận mật khẩu không khớp!')</script>";
                return;
            }

            // Mã hóa mật khẩu mới nếu có thay đổi
            $hashedPassword = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
        } else {
            // Giữ mật khẩu cũ nếu người dùng không thay đổi mật khẩu
            $hashedPassword = $currentPassword;
        }

        // Lấy ID người dùng từ session
        $idNguoiDung = $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];

        // Chuẩn bị dữ liệu để cập nhật
        $data = [
            'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
            'ho_va_ten' => $_POST['ho_va_ten'],
            'email' => $_POST['email'],
            'so_dien_thoai' => $_POST['so_dien_thoai'],
            'mat_khau' => $hashedPassword, // Sử dụng mật khẩu đã mã hóa
            'ngay_sinh' => $_POST['ngay_sinh'],
            'gioi_tinh' => $_POST['gioi_tinh'],
            'id' => $idNguoiDung // Thêm tham số 'id' vào mảng dữ liệu
        ];
        // Cập nhật thông tin người dùng
        $this->modelSanPham->update($idNguoiDung, $data);
        $_SESSION['dn'] = $_POST['ten_nguoi_dung'];

        header('Location: ?act=nguoidung');
        exit;
    } else {
        $user = $this->modelSanPham->layNguoiDungTheoTen($id);
        require_once './views/nguoidung.php';
    }
}
public function thanhtoan($id){
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    $idNguoiDung= $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];
    $thongTinNguoiDung = $this->modelSanPham->getAllThanhToan($idNguoiDung);
    $giohangs = $this->modelSanPham->getGioHang();
    if(isset($_SESSION['dn'])){
        $giohangs = $this->modelSanPham->getGioHangById($idNguoiDung);
    }
    if(isset($_POST['btn-submit'])) {
            $ma_don_hang = 'DH'. rand(10000,99999);
            $nguoi_dung_id =  $idNguoiDung;
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan']; // Sử dụng mật khẩu đã mã hóa
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $trang_thai_id = 1;
            $phuong_thuc_thanh_toan_id = 1;
            $tong_tien = $_POST['tong_tien'];
            $ngay_dat = date('Y-m-d');
            $ghi_chu = $_POST['ghi_chu'];
            $donHangId = $this->modelSanPham->themDonHang($ma_don_hang, $nguoi_dung_id, $ten_nguoi_nhan, $so_dien_thoai, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai_id, $phuong_thuc_thanh_toan_id, $tong_tien,   $ngay_dat,  $ghi_chu);
            if($donHangId){
                $gioHangs = $this->modelSanPham->getGioHangById($idNguoiDung);
                foreach($gioHangs as $gh){
                    $this->modelSanPham->themChiTietDonHang($donHangId, $gh['san_pham_id'], $gh['nguoi_dung_id'], $gh['gia_khuyen_mai'],  $gh['so_luong'], $gh['so_luong'] * $gh['gia_khuyen_mai']);
                    $this->modelSanPham->updateSoLuongTonKho($gh['san_pham_id'], $gh['so_luong_san_pham'] - $gh['so_luong']);
                }
            }
           

            header ('location: ?act=thanhcong');
    }
    require_once './views/thanhtoan.php';
}
public function thanhcong(){
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    require_once './views/thanhcong.php';
}
public function donHang($id){
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
    $idNguoiDung= $this->modelSanPham->idNguoiDung($_SESSION['dn'])->fetch()['id'];
    $donHang = $this->modelSanPham->getAllDonHang($idNguoiDung);
    $capNhatDonHang=$this->modelSanPham->updateDonHang($id);
    require_once './views/donhang.php';
}
public function chitietdonhang($id){
    $danhMucs = $this->modelSanPham->danhmuc();
    $comments = $this->modelSanPham->getAll();
  $chiTietDonHang = $this->modelSanPham->chitietdonhang($id);
  $donHang = $this->modelSanPham->laydonhang($id);
  require_once './views/chitietdonhang.php';
}
public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            // Kiểm tra trạng thái hiện tại từ cơ sở dữ liệu
            $order = $this->modelSanPham->findById($id);

            if ($order) {
                if ($order['trang_thai_id'] == 1) {
                    // Hủy đơn hàng
                    $this->modelSanPham->destroy($id);
                } elseif ($order['trang_thai_id'] == 5) {
                    // Xác nhận đơn hàng
                    $this->modelSanPham->xacnhan($id);
                }
            }

            // Redirect về trang danh sách đơn hàng
            header('Location:?act=donhang');
            exit();
        }
    }

}
