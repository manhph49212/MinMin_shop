<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Quản lý Người Dùng | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <div class="vertical-overlay"></div>

        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý khuyến mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">khuyến mãi</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Quản lý Khuyến mãi</h4>
                                        <input type="text" id="searchInput" class="form-control" placeholder="tim..."
                                            style="max-width: 300px; padding-right: 10px">
                                        <a href="?act=add_khuyen_mai" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm khuyến mãi
                                        </a>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tên Khuyến Mãi</th>
                                                            <th>Mã Khuyến Mãi</th>
                                                            <th>Giá Trị</th>
                                                            <th>Ngày Bắt Đầu</th>
                                                            <th>Ngày Kết Thúc</th>
                                                            <th>Mô Tả</th>
                                                            <th>Trạng Thái</th>
                                                            <th>Thao Tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($khuyenmai as $item): ?>
                                                            <tr>
                                                                <td><?php echo $item['id'] ?></td>
                                                                <td><?php echo $item['ten_khuyen_mai']; ?></td>
                                                                <td><?php echo $item['ma_khuyen_mai']; ?></td>
                                                                <td><?php echo $item['gia_tri']; ?></td>
                                                                <td><?php echo $item['ngay_bat_dau']; ?></td>
                                                                <td><?php echo $item['ngay_ket_thuc']; ?></td>
                                                                <td><?php echo $item['mo_ta']; ?></td>
                                                                <td>
                                                            <?php
                                                            if ($item['trang_thai'] == 1) { ?>
                                                                <span class="badge bg-success">Kích hoạt</span>
                                                                <?php
                                                            } else { ?>
                                                                <span class="badge bg-danger">Không kích hoạt</span>
                                                                <?php
                                                            }

                                                            ?>

                                                        </td>
                                                                <td>
                                                                    <a href="?act=edit_khuyen_mai&id=<?php echo $item['id']; ?>"
                                                                        class="link-success">
                                                                        <i class="ri-edit-2-line"></i>
                                                                    </a>
                                                                    <!-- Xóa -->
                                                                    <a href="?act=delete_khuyen_mai&id=<?php echo $item['id']; ?>"
                                                                        class="link-danger"
                                                                        onclick="return confirm('Bạn có chắc chắn xóa không?');">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
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
            </div>
            <!-- container-fluid -->

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

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.querySelector('tbody');
            let timeoutId;

            function performSearch() {
                const searchTerm = searchInput.value.trim();

                if (timeoutId) {
                    clearTimeout(timeoutId);
                }

                timeoutId = setTimeout(() => {
                    fetch(`?act=search-khuyen-mais&search=${encodeURIComponent(searchTerm)}`)
                        .then(response => response.json())
                        .then(data => {
                            tableBody.innerHTML = ''; // Clear current results

                            data.forEach((khuyenmai) => {
                                const row = `
                            <tr>
                                <td>${khuyenmai.id}</td>
                                <td>${khuyenmai.ten_khuyen_mai}</td>
                                <td>${khuyenmai.ma_khuyen_mai}</td>
                                <td>${khuyenmai.gia_tri}</td>
                                <td>${khuyenmai.ngay_bat_dau}</td>
                                <td>${khuyenmai.ngay_ket_thuc}</td>
                                <td>${khuyenmai.mo_ta}</td>
                                <td>${khuyenmai.trang_thai ? 'Kích Hoạt' : 'Không Kích Hoạt'}</td>
                                <td>
                                    <a href="?act=edit_khuyen_mai&id=${khuyenmai.id}" class="link-success"><i class="ri-edit-2-line"></i></a>
                                    <a href="?act=delete_khuyen_mai&id=${khuyenmai.id}" class="link-danger" onclick="return confirm('Bạn có chắc chắn xóa không?');"><i class="ri-delete-bin-line"></i></a>
                                </td>
                            </tr>
                        `;
                                tableBody.innerHTML += row;
                            });
                        })
                        .catch(error => console.error('Error:', error));
                }, 300);
            }

            searchInput.addEventListener('input', performSearch);
        });
    </script>

</body>

</html>