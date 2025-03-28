    <?php

    class DonHangController
    {
        public $modelDonHang;

        public function __construct()
        {
            $this->modelDonHang = new DonHang();
        }

        public function index()
        {
            $donHangs = $this->modelDonHang->getAll();
            require_once './views/donhang/list_don_hang.php';
        }
        public function show($id)
        {
            // Lấy chi tiết đơn hàng và trạng thái
            $donHangs = $this->modelDonHang->getDetail($id)->fetchAll();
            $trangThais = $this->modelDonHang->getStatus();
        
            // Kiểm tra nếu có submit form cập nhật
            if (isset($_POST['btn-update'])) {
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $email_nguoi_nhan = $_POST['email_nguoi_nhan']; // Corrected variable
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
                $ghi_chu = $_POST['ghi_chu'];
                $trang_thai_id = $_POST['trang_thai']; // Lấy trạng thái mới từ form
        
                // Cập nhật trạng thái đơn hàng
                if ($this->modelDonHang->edit($id, $ten_nguoi_nhan, $so_dien_thoai, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id)) {
                    // Chuyển hướng về trang hiển thị đơn hàng
                    header("Location: ?act=show-don-hang&id=$id");
                    exit;
                }else{
                    echo "Không có đơn hàng nào tồn tại";
                }
            }
        
            // Tải view hiển thị đơn hàng
            require_once './views/donhang/show_don_hang.php';
        }
        
        public function update($id)
{
    // Lấy chi tiết đơn hàng và trạng thái
    $donHangs = $this->modelDonHang->getEdit($id);
    $trangThais = $this->modelDonHang->getStatus(); // Lấy trạng thái từ model

    // Kiểm tra nếu có submit form cập nhật
    if (isset($_POST['btn-update'])) {
        // Lấy dữ liệu từ form
        $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
        $ghi_chu = $_POST['ghi_chu'];
        $trang_thai_id = $_POST['trang_thai'];

        // Cập nhật trạng thái đơn hàng
        $result = $this->modelDonHang->edit(
            $id, 
            $ten_nguoi_dung, 
            $so_dien_thoai, 
            $email_nguoi_nhan, 
            $dia_chi_nguoi_nhan, 
            $ghi_chu, 
            $trang_thai_id
        );
       

        if ($result) {
            // Chuyển hướng về trang hiển thị đơn hàng
            header("Location: ?act=don-hang");
            exit; // Dừng thực thi tiếp để tránh lỗi
        } else {
            echo "Lỗi khi cập nhật đơn hàng.";
        }
    }

    // Tải view hiển thị đơn hàng
    require_once './views/donhang/edit_don_hang.php'; // Truyền dữ liệu vào view
}

        
        
        

    }
