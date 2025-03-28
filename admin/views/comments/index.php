<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bình luận</title>
    <!-- Include CSS files -->
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

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- HEADER -->
    <?php
    require_once "views/layouts/header.php";
    require_once "views/layouts/siderbar.php";
    ?>

    <div class="vertical-overlay"></div>

    <!-- Start main content here -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- Page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">Danh sách bình luận</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Danh sách bình luận</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh Sách Bình Luận</h4>
                                    <a href="?act=comments/create" class="btn btn-soft-success material-shadow-none">
                                        <i class="ri-add-circle-line align-middle me-1"></i> Thêm Bình Luận
                                    </a>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Sản phẩm</th>
                                                    <th scope="col">Tên Người Dùng</th>
                                                    <th scope="col">Thời Gian Bình Luận</th>
                                                    <th scope="col">Đánh giá</th>
                                                    <th scope="col">Nội Dung</th>
                                                    <th scope="col">Hành Động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($comments as $item): ?>
                                                    <tr>
                                                        <td><?php echo $item['id']; ?></td>
                                                        <td><?php echo $item['ten_san_pham']; ?></td>
                                                        <td><?php echo $item['ten_nguoi_dung']; ?></td>
                                                        <td><?= date('H:i:s d-m-Y', strtotime($item['ngay_binh_luan'])) ?></td>
                                                        <td><?php echo hienthisao($item['danh_gia']); ?></td>
                                                        <td><?php echo $item['noi_dung']; ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-center hstack gap-3 flex-wrap">
                                                                <!-- Show Product -->
                                                                <a href="?act=chi-tiet-san-pham&id=<?php echo $item['san_pham_id']; ?>"
                                                                   class="link-success">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>

                                                                <!-- Edit -->
                                                                <a href="?act=edit-comment&id=<?php echo $item['id']; ?>"
                                                                   class="link-success">
                                                                    <i class="ri-edit-2-line"></i>
                                                                </a>

                                                                <!-- Delete -->
                                                                <a href="?act=delete-comment&id=<?php echo $item['id']; ?>"
                                                                   class="link-danger"
                                                                   onclick="return confirm('Bạn có chắc chắn xóa không?');">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
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
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<!-- Include JS files -->
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
?>
</body>

</html>
