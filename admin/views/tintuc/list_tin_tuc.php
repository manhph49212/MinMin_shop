<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8"/>
    <title>Danh mục tin tức | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>

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
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">Quản lý tin tức</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Tin tức</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách tin tức</h4>
                                    <input type="text" id="searchInput" class="form-control"
                                           placeholder="tim..." style="max-width: 300px;">
                                    <a href="?act=form-them-tin-tucs" class="btn btn-soft-success material-shadow-none">
                                        <i class="ri-add-circle-line align-middle me-1"></i> Thêm tin tức
                                    </a>
                                </div>
                                <!-- end card header -->

                                <div class="card-body">

                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Tiêu đề tin tức</th>
                                                    <th scope="col">Nội dung tin tức</th>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($tinTucs as $index => $tinTuc) : ?>


                                                    <tr>
                                                        <td class="fw-medium"><?= $index + 1 ?></td>
                                                        <td><?= $tinTuc['ten_tin_tuc'] ?></td>
                                                        <td><?= $tinTuc['noi_dung'] ?></td>
                                                        <td><img src="<?= $tinTuc['hinh_anh'] ?>" style="width:100px;" alt=""></td>
                                                        <td>
                                                            <?php
                                                            if ($tinTuc['trang_thai'] == 1) { ?>
                                                                <span class="badge bg-success">Hiển thị</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger">Không hiển thị</span>
                                                                <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="?act=form-sua-tin-tucs&tin_tuc_id=<?= $tinTuc['id'] ?>"
                                                                   class="link-success fs-15"><i
                                                                            class="ri-edit-2-line"></i></a>
                                                                <form action="?act=xoa-tin-tucs" method="POST"
                                                                      onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                                                    <input type="hidden" name="tin_tuc_id"
                                                                           value="<?= $tinTuc['id'] ?>">
                                                                    <button type="submit" class="link-danger fs-15"
                                                                            style="border: none; background: none;"><i
                                                                                class="ri-delete-bin-line"></i></button>
                                                                </form>
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

<div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
         data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
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
                fetch(`?act=search-tin-tucs&search=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = ''; // Clear current results

                        data.forEach((tinTuc) => {
                            const row = `
                            <tr>
                                <td>${tinTuc.id}</td>
                                <td>${tinTuc.ten_tin_tuc}</td>
                                <td>${tinTuc.noi_dung}</td>
                                <td>${tinTuc.trang_thai == 1 ? '<span class="badge bg-success">Hiển thị</span>' : '<span class="badge bg-danger">Không hiển thị</span>'}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="?act=form-sua-tin-tucs&tin_tuc_id=${tinTuc.id}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                        <form action="?act=xoa-tin-tucs" method="POST" onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                            <input type="hidden" name="tin_tuc_id" value="${tinTuc.id}">
                                            <button type="submit" class="link-danger fs-15" style="border: none; background: none;"><i class="ri-delete-bin-line"></i></button>
                                        </form>
                                    </div>
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