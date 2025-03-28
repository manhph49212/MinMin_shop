<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <!-- Include necessary CSS and JS files -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
<div id="layout-wrapper">
    <?php require_once "views/layouts/header.php";
    require_once "views/layouts/siderbar.php" ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">Sửa sản phẩm</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sửa sản phẩm</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="h-100" style="padding: 20px">
                                <form action="?act=sua-san-pham" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham"
                                               value="<?= $sanPham['ten_san_pham'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_san_pham" class="form-label">Product Price</label>
                                        <input type="number" class="form-control" id="gia_san_pham" name="gia_san_pham"
                                               value="<?= $sanPham['gia_san_pham'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
                                        <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                        value="<?= $sanPham['gia_khuyen_mai']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="so_luong" name="so_luong"
                                               value="<?= $sanPham['so_luong'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Description</label>
                                        <textarea class="form-control" id="mo_ta"
                                                  name="mo_ta"><?= $sanPham['mo_ta'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta_chi_tiet" class="form-label">Detailed Description</label>
                                        <textarea class="form-control" id="mo_ta_chi_tiet"
                                                  name="mo_ta_chi_tiet"><?= $sanPham['mo_ta_chi_tiet'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Category</label>
                                        <select class="form-control" id="danh_muc_id" name="danh_muc_id" required>
                                            <?php foreach ($danhMucs as $danhMuc) : ?>
                                                <option value="<?= $danhMuc['id'] ?>" <?= $sanPham['danh_muc_id'] == $danhMuc['id'] ? 'selected' : '' ?>>
                                                    <?= $danhMuc['ten_danh_muc'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ngay_nhap" class="form-label">Date and Time of Entry</label>
                                        <input type="datetime-local" class="form-control" id="ngay_nhap" name="ngay_nhap" value="<?= date('Y-m-d\TH:i', strtotime($sanPham['ngay_nhap'])) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label">Status</label>
                                        <select class="form-control" id="trang_thai" name="trang_thai">
                                            <option value="1" <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?>>
                                                Active
                                            </option>
                                            <option value="2" <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?>>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                                        <?php if ($sanPham['hinh_anh']) : ?>
                                            <img src="<?= $sanPham['hinh_anh'] ?>" alt="Product Image"
                                                 style="width: 100px; height: 100px;">
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Product</button>
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