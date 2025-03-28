<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8"/>
    <title>Quản lý sản phẩm | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
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
                            <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
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
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h4>
                        <input type="text" id="searchInput" class="form-control"
                               placeholder="Tìm..."
                               style="width: 300px; margin-right: 10px;">
                        <a href="?act=form-them-san-pham" class="btn btn-soft-success material-shadow-none">
                            <i class="ri-add-circle-line align-middle me-1"></i>
                            Thêm sản phẩm
                        </a>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="h-100" style="padding-left: 10px;">
                                <table class="table table-borderless table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thời gian nhập</th>
                                    </tr>
                                    </thead>
                                    <!-- Update the table body id -->
                                    <tbody id="sanPhamTableBody">
                                    <?php foreach ($sanPhams as $sanPham) : ?>
                                        <tr>
                                            <td><?= $sanPham['id'] ?></td>
                                            <td><?= $sanPham['ten_san_pham'] ?></td>
                                            <td><?= $sanPham['ten_danh_muc'] ?></td>
                                            <td><img src="<?= $sanPham['hinh_anh'] ?>" alt=""
                                                     style="width: 50px; height: 50px;"></td>
                                            <td><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VNĐ</td>
                                            <td><?= $sanPham['so_luong'] ?></td>
                                            <td><?= strlen($sanPham['mo_ta']) > 50 ? substr($sanPham['mo_ta'], 0, 50) . '...' : $sanPham['mo_ta'] ?></td>
                                            <td>
                                                <?php if ($sanPham['trang_thai'] == 1) { ?>
                                                <span class="badge bg-success-subtle text-success">Hiển thị</span></td>
                                            <?php } else { ?>
                                                <span class="badge bg-danger-subtle text-danger">Không hiển thị</span> <?php } ?>
                                            <td><?= date('H:i:s d-m-Y', strtotime($sanPham['ngay_nhap'])) ?></td>
                                            <td>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <a href="?act=chi-tiet-san-pham&id=<?php echo $sanPham['id']; ?>"
                                                       class="link-success">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="?act=form-sua-san-pham&id=<?= $sanPham['id'] ?>"
                                                       class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                    <form action="?act=xoa-san-pham" method="POST"
                                                          onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                                        <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('sanPhamTableBody');
        let timeoutId;

        function performSearch() {
            const searchTerm = searchInput.value.trim();

            if (timeoutId) {
                clearTimeout(timeoutId);
            }

            timeoutId = setTimeout(() => {
                fetch(`?act=search-san-pham&search=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = ''; // Clear current results

                        data.forEach((sanPham) => {
                            const row = `
                                <tr>
                                    <td>${sanPham.id}</td>
                                    <td>${sanPham.ten_san_pham}</td>
                                    <td>${sanPham.ten_danh_muc}</td>
                                    <td><img src="${sanPham.hinh_anh}" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                    <td>${new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(sanPham.gia_san_pham)}</td>
                                    <td>${sanPham.so_luong}</td>
                                    <td>${sanPham.mo_ta.length > 50 ? sanPham.mo_ta.substring(0, 50) + '...' : sanPham.mo_ta}</td>
                                    <td>${sanPham.trang_thai == 1 ? '<span class="badge bg-success-subtle text-success">Hiển thị</span>' : '<span class="badge bg-danger-subtle text-danger">Không hiển thị</span>'}</td>
                                    <td>${sanPham.ngay_nhap}</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="?act=chi-tiet-san-pham&id=${sanPham.id}" class="link-success">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="?act=form-sua-san-pham&id=${sanPham.id}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                            <form action="?act=xoa-san-pham" method="POST" onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                                <input type="hidden" name="id" value="${sanPham.id}">
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

        // Search input event listener
        searchInput.addEventListener('input', performSearch);
    });
</script>

</body>
</html>
