<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <!-- Include necessary CSS and JS files -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php" ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Sửa đơn hàng</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Sửa đơn hàng</h4>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="h-100" style="padding: 20px">
                                    <form action="" method="post" enctype="multipart/form-data">
                                      

                                        <div class="mb-3">
                                            <label for="ten_nguoi_dung" class="form-label">Tên người nhận</label>
                                            <input type="text" class="form-control" id="ten_nguoi_dung"
                                                name="ten_nguoi_dung" value="<?= $donHangs['ten_nguoi_nhan'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                            <input type="number" class="form-control" id="so_dien_thoai"
                                                name="so_dien_thoai" value="<?= $donHangs['so_dien_thoai'] ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_nguoi_nhan" class="form-label">Email người nhận</label>
                                            <input type="email" class="form-control" id="email_nguoi_nhan"
                                                name="email_nguoi_nhan" value="<?= $donHangs['email_nguoi_nhan']  ?>" >
                                        </div>


                                        <div class="mb-3">
                                            <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ người nhận</label>
                                            <input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"
                                                value="<?= $donHangs['dia_chi_nguoi_nhan'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ghi_chu" class="form-label">Ghi chú</label>
                                            <textarea class="form-control" id="ghi_chu"
                                                name="ghi_chu" ><?= $donHangs['ghi_chu'] ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                        <select name="trang_thai" id="" class="form-select form-select-sm" aria-label="Small select example">
    <?php foreach($trangThais as $key => $trangThai) : ?>
        <!-- Kiểm tra trạng thái hiện tại -->
        <option 
            <?php 
                // Kiểm tra trạng thái hiện tại và chọn
                echo($trangThai['id'] == $donHangs['trang_thai_id']) ? 'selected' : ''; 
                
                // Kiểm tra nếu trạng thái hiện tại là 10, thì disable tất cả các tùy chọn
                if ($donHangs['trang_thai_id'] == 2) {
                    echo 'disabled';
                }
                
                // Nếu trạng thái hiện tại là 1 và trạng thái có id < 10, thì disable tất cả các tùy chọn có id nhỏ hơn 10
               
                
                // Kiểm tra nếu trạng thái hiện tại là x (ví dụ x = $donHangs['trang_thai_id']), thì vô hiệu hóa trạng thái có id = x - 1
                elseif ($trangThai['id'] < $donHangs['trang_thai_id']) {
                    echo 'disabled';
                }
            ?>
            value="<?= $trangThai['id'] ?>"><?= $trangThai['ten_trang_thai'] ?>
        </option>
    <?php endforeach; ?>
</select>

                                       <button name="btn-update" class="btn btn-success">Cập nhật</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script>
                            © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- <?php require_once "views/layouts/libs_js.php"; ?> -->
</body>

</html>