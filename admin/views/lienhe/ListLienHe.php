<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8"/>
    <title>Dashboard | MinMin Shop</title>
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

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">Quản lý liên hệ</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Liên hệ</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Quản lý liên hệ</h4>
                        <input type="text" id="searchInput" class="form-control" placeholder="tìm.."
                               style="max-width: 300px;">
                    </div><!-- end card header -->
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <!-- Tables Without Borders -->
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($LienHes

                                                   as $index => $lienHe) : ?>
                                        <tr>
                                            <th scope="row"><?= $index + 1 ?></th>
                                            <td><?= $lienHe['email'] ?></td>
                                            <td class="noi-dung"><?= $lienHe['noi_dung'] ?></td>
                                            <td><?= $lienHe['ngay_tao'] ?></td>
                                            <td>
                                                <?php if ($lienHe['trang_thai'] == 1) { ?>
                                                <span class="badge bg-success-subtle text-success">Đã xử lí</span></td>
                                            <?php } else { ?>
                                                <span class="badge bg-danger-subtle text-danger">Chờ xử lí</span> <?php } ?>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="?act=form-sua-lien-he&lien_he_id=<?= $lienHe['id'] ?>"
                                                       class="link-success"><i
                                                                class="ri-edit-2-line"></i></a>
                                                    <form action="?act=xoa-lien-he" method="post"
                                                          onsubmit="return confirm('Xoá?')">
                                                        <input type="hidden" name="lien_he_id"
                                                               value="<?= $lienHe['id'] ?>"></input>
                                                        <button href="javascript:void(0);" class="link-danger"
                                                                style="border: none; background: none"><i
                                                                    class="ri-delete-bin-5-line"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
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
        function truncateTextByClass(className, maxLength) {
            const elements = document.querySelectorAll(`.${className}`);

            elements.forEach(element => {
                const originalText = element.innerText;

                if (originalText.length > maxLength) {
                    element.innerText = originalText.slice(0, maxLength) + '...';
                }
            });
        }

        // Truncate "noi-dung" cells to a specific length (e.g., 10 characters)
        truncateTextByClass("noi-dung", 100);


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
                    fetch(`?act=search-lien-he&search=${encodeURIComponent(searchTerm)}`)
                        .then(response => response.json())
                        .then(data => {
                            tableBody.innerHTML = ''; // Clear current results

                            data.forEach((lienHe) => {
                                const row = `
                            <tr>
                                <td>${lienHe.id}</td>
                                <td>${lienHe.email}</td>
                                <td class="noi-dung">${lienHe.noi_dung}</td>
                                <td>${lienHe.ngay_tao}</td>
                                <td>${lienHe.trang_thai == 1 ? '<span class="badge bg-success-subtle text-success">Đã xử lí</span>' : '<span class="badge bg-danger-subtle text-danger">Chờ xử lí</span>'}</td>
                                <td>
                                    <div class="hstack gap-3 fs-15">
                                        <a href="?act=form-sua-lien-he&lien_he_id=${lienHe.id}" class="link-success"><i class="ri-edit-2-line"></i></a>
                                        <form action="?act=xoa-lien-he" method="post" onsubmit="return confirm('Xoá?')">
                                            <input type="hidden" name="lien_he_id" value="${lienHe.id}">
                                            <button href="javascript:void(0);" class="link-danger" style="border: none; background: none"><i class="ri-delete-bin-5-line"></i></button>
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