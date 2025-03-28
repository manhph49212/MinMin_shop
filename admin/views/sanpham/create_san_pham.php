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
    <?php require_once "views/layouts/siderbar.php"; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">Thêm sản phẩm</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Thêm sản phẩm</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="h-100" style="padding: 20px">
                                <form action="?act=them-san-pham" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_san_pham" class="form-label">Giá sản phẩm</label>
                                        <input type="number" class="form-control" id="gia_san_pham" name="gia_san_pham"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
                                        <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai">
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Số lượng</label>
                                        <input type="number" class="form-control" id="so_luong" name="so_luong"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả</label>
                                        <textarea class="form-control" id="mo_ta" name="mo_ta"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta_chi_tiet" class="form-label">Mô tả chi tiết</label>
                                        <textarea class="form-control" id="mo_ta_chi_tiet"
                                                  name="mo_ta_chi_tiet"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh mục</label>
                                        <select class="form-control" id="danh_muc_id" name="danh_muc_id" required>
                                            <?php foreach ($danhMucs as $danhMuc) : ?>
                                                <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Trạng thái</label>
                                        <select class="form-control" id="trang_thai" name="trang_thai">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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

<?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>