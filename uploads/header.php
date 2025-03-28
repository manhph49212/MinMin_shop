<header id="site-header" class="main-header tp_menu">
    <div class="container-fluid">
        <div class="header-top wrap-flex-align">
            <div class="wrap-logo hidden-xs hidden-sm col-md-2 wrap-logo__pc">
                <a href="/MinMin_shop/" title="Logo">
                    <img style="max-width: 200px" alt="Logo"  src="./uploads/sanpham/logo.png" />
                </a>
            </div>
            <div id="nav-menu" class="hidden-sm hidden-xs ">
                <nav role="navigation" class="main-nav-menu">
                    <ul class="menu__list menu__list--top tp_menu">
                       
                        <li class="menu__item mega tp_menu_item" itemprop="name"><a itemprop="url" href="?act=sanphams" title="TOP" class="menu__link tp_menu_item menu_426744">Quần áo</a>
                            <div class="menu__content ">
                                <div class="container-fluid">
                                    <div class="menu-flex">
                                    <?php foreach($danhMucs as $danhMuc) : ?>
                                        <ul class="menu__list menu__list--second">
                                            <li class="menu__item third">
                                                <a href="?act=loc&danh_muc_id=<?= $danhMuc['id'] ?>" class="menu__link"><?= $danhMuc['ten_danh_muc'] ?></a>
                                            </li>
                                        </ul>
                                        <?php endforeach; ?>
                                        <ul class="menu__list menu_list_img">
                                            <li class="menu__item"><a class="menu__link" href="/top-pc426744.html" title=""><img data-sizes="auto" class="lazyload" src="https://web.nvnstatic.net/img/lazyLoading.gif?v=3"
                                                        data-src="https://pos.nvncdn.com/f8f19b-53936/pc/20240906_A7NQssny.gif" alt="TOP">
                                                    <p><strong></strong></p>
                                                    <p></p>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                       
                        
                        
                        <li itemprop="name" class="menu__item mega tp_menu_item "><a itemprop="url" href="/MinMin_shop/?act=lienhes" title="CLEAR" class="menu__link tp_menu_item menu_26173">Liên hệ</a>
                            <div class="menu__content ">
                                <div class="container-fluid">
                                    <div class="menu-flex">
                                        <ul class="menu__list menu__list--second">
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    </li>
    <li itemprop="name" class="menu__item mega tp_menu_item "><a itemprop="url" href="/MinMin_shop/?act=sanphams" title="NEWS" class="menu__link tp_menu_item menu_30901">Sản Phẩm</a></li>
    <li itemprop="name" class="menu__item mega tp_menu_item "><a itemprop="url" href="/MinMin_shop/?act=tintucs" title="NEWS" class="menu__link tp_menu_item menu_30901">Tin tức</a></li>
    <li itemprop="name" class="menu__item mega tp_menu_item "><a itemprop="url" href="/MinMin_shop/?act=khuyenmais" title="VOUCHER" class="menu__link tp_menu_item menu_30901">Khuyến mại</a></li>
    </ul>
    </nav>
    </div>
    <div class="header-wrap-icon col-md-2">
        <div class="search-box hidden-sm hidden-xs wpo-wrapper-search hidden">
            <form id="searchauto" action="/search" class="searchform searchform-categoris ultimate-search navbar-form">

                <div class="wpo-search-inner form-group">
                    <input id="inputSearchAuto" name="q" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Bạn cần tìm gì...">

                </div>
                <button type="submit" class="icon-search btn" id="search-header-btn">
                    <span class="search-menu" aria-hidden="true">
                        <img src="https://web.nvnstatic.net/tp/T0295/img/icon-header-3.png?v=3" alt="cart">
                    </span>
                </button>
            </form>
        </div>
        <div class="group-icon">
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md">
                <div class="row">
                    <div class="col-sm-4 col-xs-3 group-icon iconLogo">
                        <span id="site-menu-handle" class="hamburger-menu hidden-lg hidden-md" aria-hidden="true"><span class="bar"></span></span>
                    </div>
                    <div class="col-sm-4 col-xs-5 logo-xs">
                        <div class="wrap-logo">
                            <a href="/" title="Logo">
                                <img style="max-width: 130px" alt="Logo" src="https://pos.nvncdn.com/f8f19b-53936/store/20230912_8LolIRlM.png" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-4 group-icon iconSearch">
                        <span id="site-search-handle" class="icon-search" aria-label="Open search" title="Tìm kiếm">
                            <a href="/search">
                                <span class="search-menu" aria-hidden="true">
                                    <img src="https://web.nvnstatic.net/tp/T0295/img/icon-header-3.png?v=3" alt="search">
                                </span>
                            </a>
                        </span>
                        <span id="site-account-handle" class="icon-account" aria-label="Open account" title="Tài khoản">
                            <a href="/user/signin" title="Đăng nhập">
                                <span class="account-menu" aria-hidden="true">
                                    <img src="https://web.nvnstatic.net/tp/T0295/img/icon-header-1.png?v=3" alt="cart">
                                </span>
                            </a> </span>
                        <span id="site-cart-handle" class="icon-cart" aria-label="Open cart" title="Giỏ hàng">
                            <a href="?act=giohang">
                                <span class="cart-menu" aria-hidden="true">
                                    <img src="https://web.nvnstatic.net/tp/T0295/img/icon-header-2.png?v=3" alt="cart">
                                    <span class="count-holder">
                                        <span class="count">0</span>
                                    </span>
                                </span>
                            </a>
                        </span>
                        <span class="search-order">
                            <a href="/order/search">
                                <img src="https://web.nvnstatic.net/tp/T0295/img/searchorder.png?v=3" alt="">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="hidden-xs hidden-sm group-icon group-icon__pc">


               

                <span id="site-account-handle" class="icon-account" aria-label="Open account" title="Tài khoản">
                    <a href="/user/signin" title="Đăng nhập"><span class="account-menu" aria-hidden="true"><img src="https://web.nvnstatic.net/tp/T0295/img/icon-header-1.png?v=3" alt="cart"></span></a> </span>
                <span class="icon-cart" aria-label="Open cart" title="Giỏ hàng">
                    <a href="?act=giohang">
                        <i class="far fa-shopping-cart"></i>
                    </a>
                </span>
              
                <!-- Đặt thẻ select trong cùng một khu vực với avatar -->

    <?php if(isset($_SESSION['dn'])) { ?>  
        <div class="user-actions">
            <img class="rounded-circle header-profile-user" style="width:30px; height:30px; object-fit: cover; margin-right: 10px;" src="<?= $comments[0]['avatar'] ?>"> 
            <select onchange="window.location.href=this.value;" class="form-control" style="display: inline-block; width: auto;">
                <option value="">Chào <?php echo $_SESSION['dn']; ?></option>
                <option value="?act=nguoidung">Cập nhật mật khẩu</option>
                <option value="?act=sanphamyeuthich">Sản phẩm yêu thích</option>
                <option value="?act=donhang">Lịch sử mua hàng</option>
                <option value="admin/?act=logout">Đăng xuất</option>
            </select>
        </div>
    <?php } else { ?>
       <a href="admin/?act=logout"> <img class="rounded-circle header-profile-user" style="width:30px; height:30px; object-fit: cover;" src="uploads/sanpham/free-user-icon-3296-thumb-removebg-preview.png" ></a>
    <?php } ?>
</a>



                   
                
            </div>
        </div>
    </div>
    </div>
    </div>
</header>
<style>
    /* Style cho select để nó đẹp hơn */
.user-actions select {
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    color: #333;
    cursor: pointer;
}
.rounded-circle {
    border-radius: 50% !important;
}

/* Điều chỉnh font-size hoặc các thuộc tính khác nếu cần */
.user-actions span {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}
/* Căn chỉnh các phần tử trong .user-actions */
.user-actions {
    display: flex;  /* Dùng flexbox để căn chỉnh ngang */
    align-items: center;  /* Căn giữa các phần tử theo chiều dọc */
    gap: 10px;  /* Khoảng cách giữa các phần tử (avatar và select) */
}

/* Style cho select để nó đẹp hơn */
.user-actions select {
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;  /* Giảm font-size để dropdown không quá lớn */
    color: #333;
    cursor: pointer;
    margin-left: 5px;  /* Thêm khoảng cách giữa lời chào và dropdown */
}

/* Điều chỉnh font-size hoặc các thuộc tính khác nếu cần */
.user-actions span {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}


</style>