<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<link rel="shortcut icon" href="assets/images/image-removebg-preview (1).png">
<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSS -->
    <?php
    require_once "layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";

        require_once "layouts/siderbar.php";
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
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Good Morning, <?php echo $_SESSION['dn'] ?></h4>
                                                <p class="text-muted mb-0">Thống kê đơn hàng của dự án minmin</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                                    <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Thu nhập theo tuần</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                        stonks
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> 
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                     <span class="counter-value" data-target="<?= isset($thuNhapTheoTuan) ? $thuNhapTheoTuan : 'Không có dữ liệu' ?>"></span> VNĐ
                                                                </h4> 
                                                                                                                       
                                                                <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Lượt mua theo tuần</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span><?= isset($soLuongDonHang) ? $soLuongDonHang : 'Không có dữ liệu' ?> lượt mua</span>
                                                    </h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Số lượng khách hàng hôm nay</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= isset($soLuongKhachHang) ? $soLuongKhachHang : 'Không có dữ liệu' ?>"></span> khách hàng</h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Thống kê đơn hàng theo tuần</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                       
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= isset($soLuongSanPhamTheoTuan) ? $soLuongSanPhamTheoTuan : 'Không có dữ liệu' ?>"></span> đơn</h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div> <!-- end row-->
                                <div class="row">
    <div class="col-xl-12">
        <!-- Chart Container -->
        <div class="card">
            <div class="card-body">
                <h4 class="fs-16 mb-1">Thống kê theo tuần</h4>
                <canvas id="weeklyStatsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // Assuming you have PHP variables for weekly data with two decimal places:
    var incomeData = <?php echo json_encode($thuNhapTheoTuan); ?>; // Example: weekly income data
    var purchaseData = <?php echo json_encode($soLuongDonHang); ?>; // Example: weekly purchase data
    var customerData = <?php echo json_encode($soLuongKhachHang); ?>; // Example: weekly customer data
    var orderData = <?php echo json_encode($soLuongSanPhamTheoTuan); ?>; // Example: weekly order data

    // Prepare the data for the chart
    var weeklyStatsData = {
        labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'], // Weekly labels, adjust as necessary
        datasets: [{
            label: 'Thu nhập (VNĐ)',
            data: incomeData, // Data for income per week
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 1
        },
        {
            label: 'Lượt mua',
            data: purchaseData, // Data for purchases per week
            borderColor: 'rgba(153, 102, 255, 1)',
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderWidth: 1
        },
        {
            label: 'Số lượng khách hàng',
            data: customerData, // Data for customer count per week
            borderColor: 'rgba(255, 159, 64, 1)',
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderWidth: 1
        },
        {
            label: 'Đơn hàng',
            data: orderData, // Data for orders per week
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderWidth: 1
        }]
    };

    // Configure the chart
    var ctx = document.getElementById('weeklyStatsChart').getContext('2d');
    var weeklyStatsChart = new Chart(ctx, {
        type: 'line', // Choose line chart, can be bar, radar, etc.
        data: weeklyStatsData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

                             
                                    
              

    <!-- JAVASCRIPT -->
    <?php
    require_once "layouts/libs_js.php";
    ?>

