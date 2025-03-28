<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8"/>
    <title>Chi tiết sản phẩm | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <?php require_once "views/layouts/libs_css.php"; ?>
    <style>
        .star-rating {
            display: inline-flex;
            gap: 2px;
        }

        .star {
            font-size: 20px;
            color: darkgray;
        }

        .star.active {
            color: gold;
        }
    </style>
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
                            <h4 class="mb-sm-0">Chi tiết sản phẩm</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Sản phẩm</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin sản phẩm</h4>
                        <a href="?act=san-pham" class="btn btn-primary">Danh sách sản phẩm</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?= $sanPham['hinh_anh'] ?>" alt=""
                                     style="width: 100%; height: auto;">
                            </div>
                            <div class="col-md-6">
                                <h1><?= $sanPham['ten_san_pham'] ?></h1>
                                <p><?php hienthisao($averageRating); ?></p>
                                <p>Danh mục: <?= $sanPham['ten_danh_muc'] ?></p>
                                <p><?= number_format($sanPham['gia_san_pham'] ?? 0, 0, ',', '.') ?> VNĐ</p>
                                <p><?= number_format($sanPham['gia_khuyen_mai'] ?? 0, 0, ',', '.') ?> VNĐ</p>
                                <p>Số lượng: <?= $sanPham['so_luong'] ?></p>
                                <p>Mô tả: <?= $sanPham['mo_ta'] ?></p>
                                <p>Trạng thái:
                                    <?php if ($sanPham['trang_thai'] == 1) { ?>
                                    <span class="badge bg-success-subtle text-success">Hiển thị</span></p>
                                <?php } else { ?>
                                    <span class="badge bg-danger-subtle text-danger">Không hiển thị</span> <?php } ?>
                                <p>Ngày nhập: <?= date('H:i:s d-m-Y', strtotime($sanPham['ngay_nhap'])) ?></p>
                                <p>Mô tả chi tiết: <?= $sanPham['mo_ta_chi_tiet'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Bình luận</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="comment mb-3">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mt-0"><?= htmlspecialchars($comment['ten_nguoi_dung']) ?></h5>
                                            <p><?php hienthisao($comment['danh_gia']) ?></p>
                                            <p><?= htmlspecialchars($comment['noi_dung']) ?></p>
                                            <small class="text-muted"><?= date('H:i:s d-m-Y', strtotime($comment['ngay_binh_luan'])) ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Sản phẩm không có bình luận</p>
                        <?php endif; ?>
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
<?php
function hienthisao($rating)
{
    $rating = isset($rating) ? min(5, max(0, floatval($rating))) : 0;

    echo '<div class="star-rating">';
    for ($i = 1; $i <= 5; $i++) {
        $activeClass = $i <= $rating ? 'active' : '';
        echo '<span class="star ' . $activeClass . '">★</span>';
    }
    echo '</div>';
}

?>
</body>
</html>