<?php
require_once('db/dbhelper.php');
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Thực hiện truy vấn tất cả các sản phẩm
    $sql = "SELECT * FROM product";
    $products = executeResult($sql);

    $results = array();

    // Duyệt qua từng sản phẩm trong danh sách $products
    foreach ($products as $product) {
        $similarity = 0;
        similar_text($product['product_name'], $keyword, $similarity);
        $results[] = array(
            'product' => $product,
            'similarity' => $similarity
        );
    }

    // Sắp xếp mảng kết quả theo độ tương đồng giảm dần
    usort($results, function ($a, $b) {
        return $b['similarity'] - $a['similarity'];
    });
}

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }

        .filter-group {
            margin-right: 10px;
        }

        .filter-select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .filter-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-btn:hover {
            background-color: #45a049;
        }

        .filter-btn+.filter-btn {
            margin-left: 5px;
        }

        .row {
            padding-top: 100px;
        }

        .nav-search {
            position: relative;
        }

        .nav-search input[type="text"] {
            width: 0;
            opacity: 0;
            transition: width 0.5s ease, opacity 0.5s ease;
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px;
            border-radius: 5px;
        }

        .nav-search .flaticon-search {
            cursor: pointer;
        }

        .nav-search:hover input[type="text"] {
            width: 200px;
            opacity: 1;
        }
    </style>

</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="shop.php">shop</a></li>
                                    <li><a href="about.php">about</a></li>
                                    <li class="hot"><a href="#">Latest</a>
                                        <ul class="submenu">
                                            <li><a href="shop.php"> Product list</a></li>
                                            <li><a href="product_details.php"> Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.php">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="blog-details.php">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="cart.php">Cart</a></li>
                                            <li><a href="elements.php">Element</a></li>
                                            <li><a href="confirmation.php">Confirmation</a></li>
                                            <li><a href="checkout.php">Product Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search">
                                        <form id="search-form" action="search.php" method="GET">
                                            <span class="flaticon-search"></span>
                                            <input type="text" id="search-input" name="keyword" placeholder="Tìm kiếm sản phẩm">
                                        </form>
                                    </div>
                                </li>
                                <li> <a href="login.php"><span class="flaticon-user"></span></a></li>
                                <li><a href="cart.php"><span class="flaticon-shopping-cart"></span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Watch Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">

                <div class="filter-bar">
                    <div class="filter-group">
                        <label for="category">Danh mục:</label>
                        <select id="category" class="filter-select">
                            <option value="">Tất cả</option>
                            <option value="1">Sản phẩm 1</option>
                            <option value="2">Sản phẩm 2</option>
                            <option value="3">Sản phẩm 3</option>
                            <!-- Thêm các tùy chọn danh mục khác nếu cần -->
                        </select>
                    </div>
                    <div class="filter-group">

                        <label for="price">Giá:</label>
                        <input type="text" id="price" name="price" placeholder="Nhập giá tìm kiếm">


                        <select id="price" class="filter-select">
                            <option value="">Tất cả</option>
                            <option value="low">Giá thấp</option>
                            <option value="medium">Giá trung bình</option>
                            <option value="high">Giá cao</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button id="filter-btn" class="filter-btn">Lọc</button>
                        <button id="reset-btn" class="filter-btn">Đặt lại</button>
                    </div>

                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                    <!-- Select items -->
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" role="tabpanel">
                            <div class="grid-list-view">
                                <div class="row">
                                    <?php
                                    // Hiển thị các sản phẩm tương tự
                                    foreach ($results as $result) {
                                        $product = $result['product'];
                                    ?>

                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-popular-items mb-50 text-center">
                                                <div class="popular-img">
                                                    <img src="image/<?php echo $product['image']; ?>" alt="">
                                                    <div class="img-cap">
                                                        <span><a href="cart.php?product=<?php echo urlencode(json_encode($product)); ?>&quantity=1">Add to Cart</a></span>
                                                    </div>
                                                    <div class="favorit-items">
                                                        <span class="flaticon-heart"></span>
                                                    </div>
                                                </div>
                                                <div class="popular-caption">
                                                    <h3><a href="product_details.php?id=<?php echo $product['product_id'] ?>"><?php echo $product['product_name']; ?></a></h3>
                                                    <span><?php echo $product['price']; ?>$</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Products End -->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do
                                            eiusmod tem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scroll up, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>