<!-- <main class=" main-index">
    <h1 class="hidden">Mallow</h1>

    <div class="wrapper-home-banner-top-new style-2">

        <!-- Nhóm 1 -->
        <div class="tp_product_new productNew-53936">
        <div class="wrapper-heading-home animation-tran container clearfix">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="site-animation">
                    <div class="seperate-icon"><img data-sizes="auto" class="lazyload"
                                                    src="https://web.nvnstatic.net/img/lazyLoading.gif?v=3"
                                                    data-src="https://web.nvnstatic.net/tp/T0295/img/seperate-icon.png?v=3">
                    </div>
                </div>
            </div>
        </div>
        <!-- Thêm vào sau phần tiêu đề kết quả tìm kiếm trong timkiem.php -->
        <div class="filter-sort-container container">
            <div class="row mb-4">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownFilter"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bộ lọc
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                            <?php foreach ($danhMucs as $danhMuc): ?>
                                <li>
                                    <a href="?act=loc&danh_muc_id=<?= htmlspecialchars($danhMuc['id']) ?>&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                                        <?= htmlspecialchars($danhMuc['ten_danh_muc']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownSort"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sắp xếp
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSort">
                            <li>
                                <a href="?act=sapxep&kieu=moi-nhat&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">Mới
                                    nhất</a></li>
                            <li>
                                <a href="?act=sapxep&kieu=ten-az&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">Tên
                                    A-Z</a></li>
                            <li>
                                <a href="?act=sapxep&kieu=gia-tang-dan&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">Giá
                                    tăng dần</a></li>
                            <li>
                                <a href="?act=sapxep&kieu=gia-giam-dan&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">Giá
                                    giảm dần</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .filter-sort-container {
                margin-bottom: 20px;
            }

            .filter-sort-container .btn {
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 8px 15px;
            }

            .filter-sort-container .dropdown-menu {
                min-width: 200px;
                padding: 5px 0;
            }

            .filter-sort-container .dropdown-menu li a {
                padding: 8px 20px;
                color: #333;
            }

            .filter-sort-container .dropdown-menu li a:hover {
                background-color: #f5f5f5;
            }

            .mb-4 {
                margin-bottom: 20px;
            }
        </style>
        <div class="container">
            <div class="row">
                <?php if (!empty($sanPhams)): ?>
                    <?php foreach ($sanPhams as $sanPham): ?>
                        <div class="pro-loop animation-tran productItems product-ivt col-md-3 col-sm-4 col-xs-6"
                             data-storeId="53936" data-id="<?= htmlspecialchars($sanPham['id']) ?>">
                            <div class="product-block product-resize site-animation" data-anmation="22">
                                <div class="product-img image-resize"
                                     data-product-id="<?= htmlspecialchars($sanPham['id']) ?>">
                                    <a href="?act=chitietsp&id=<?= htmlspecialchars($sanPham['id']) ?>"
                                       title="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
                                        <picture>
                                            <img data-sizes="auto" class="img-loop img-default lazyload"
                                                 alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>"
                                                 src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>"
                                                 data-src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>"
                                                 data-img="<?= htmlspecialchars($sanPham['hinh_anh']) ?>"/>
                                        </picture>
                                    </a>
                                    <div class="button-add tp_button">
                                        <button onclick="location.href='?act=chitietsp&id=<?= $sanPham['id'] ?>'" title="Xem nhanh" class="action quick-view"
                                                data-id="<?= htmlspecialchars($sanPham['id']) ?>">
                                            <span>Xem nhanh</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                 x="0px" y="0px" viewBox="0 0 59.2 59.2"
                                                 style="enable-background:new 0 0 59.2 59.2;" xml:space="preserve">
                                            <g>
                                                <path d="M51.062,21.561c-11.889-11.889-31.232-11.889-43.121,0L0,29.501l8.138,8.138c5.944,5.944,13.752,8.917,21.561,8.917   s15.616-2.972,21.561-8.917l7.941-7.941L51.062,21.561z M49.845,36.225c-11.109,11.108-29.184,11.108-40.293,0l-6.724-6.724   l6.527-6.527c11.109-11.108,29.184-11.108,40.293,0l6.724,6.724L49.845,36.225z"/>
                                                <path d="M28.572,21.57c-3.86,0-7,3.14-7,7c0,0.552,0.448,1,1,1s1-0.448,1-1c0-2.757,2.243-5,5-5c0.552,0,1-0.448,1-1   S29.125,21.57,28.572,21.57z"/>
                                                <path d="M29.572,16.57c-7.168,0-13,5.832-13,13s5.832,13,13,13s13-5.832,13-13S36.741,16.57,29.572,16.57z M29.572,40.57   c-6.065,0-11-4.935-11-11s4.935-11,11-11s11,4.935,11,11S35.638,40.57,29.572,40.57z"/>
                                            </g>
                                        </svg>
                                        </button>
                                        <button title="Mua ngay" class="action add-to-cart"
                                                onclick="location.href='?act=chitietsp&id=<?= htmlspecialchars($sanPham['id']) ?>'">
                                            <span>Mua ngay</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                 x="0px" y="0px" width="27.948px" height="27.948px"
                                                 viewBox="0 0 27.948 27.948"
                                                 style="enable-background:new 0 0 27.948 27.948;" xml:space="preserve">
                                            <g>
                                                <path d="M9.689,19.484h15.503v1.936H8.133L4.99,7.153h-4.3V5.218h5.854L9.689,19.484z M11.45,22.708   c-1.447,0-2.62,1.172-2.62,2.619c0,1.446,1.173,2.621,2.62,2.621c1.447,0,2.62-1.175,2.62-2.621   C14.07,23.88,12.897,22.708,11.45,22.708z M22.25,22.708c-1.445,0-2.619,1.172-2.619,2.619c0,1.446,1.174,2.621,2.619,2.621   c1.447,0,2.621-1.175,2.621-2.621C24.872,23.88,23.698,22.708,22.25,22.708z M10.668,18.035L8.37,6.133h3.76L20.463,0l3.729,5.064   l-0.161,1.069h3.227l-2.687,11.902H10.668z M23.584,5.477l-0.892,0.656h0.794L23.584,5.477z M13.038,6.132h1.958l-0.117-0.16   l0.379-0.279l0.324,0.439h0.48L15.57,5.463l0.38-0.279l0.697,0.948h0.544l-0.89-1.207l0.381-0.279l1.095,1.486h0.626l-1.301-1.768   l0.379-0.28l1.507,2.048h0.544l-1.697-2.308l0.379-0.278l1.902,2.586h1.668l1.639-1.205l-3.07-4.176L13.038,6.132z M21.75,5.305   l-2.088-2.839l-0.382,0.279l2.089,2.839L21.75,5.305z M21.02,5.845l-2.09-2.84l-0.379,0.279l2.092,2.839L21.02,5.845z"/>
                                            </g>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-detail clearfix">
                                    <div class="box-pro-detail">
                                        <h3 class="pro-name">
                                            <a href="?act=chitietsp&id=<?= htmlspecialchars($sanPham['id']) ?>"
                                               title="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>"
                                               class="tp_product_name">
                                                <?= htmlspecialchars($sanPham['ten_san_pham']) ?>
                                            </a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="overflowed pro-price">
                                                <span class="tp_product_price"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="action"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-xs-12 text-center">
                        <p>Không tìm thấy sản phẩm nào.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


