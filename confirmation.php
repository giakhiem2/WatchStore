<?php
require_once('db/dbhelper.php');
$sql = "SELECT * FROM `confirmation`";
$confirmations = executeResult($sql);
?>
<?php
require_once('db/dbhelper.php');
session_start();
$email = $_SESSION['SESSION_EMAIL'];
$query = executeSingleResult("SELECT * FROM users WHERE email='$email'");
$customer_name = $query['name'];
$customer_email = $query['email'];
$phone_number = $query['phone'];
$address = $query['address'];

if (isset($_GET['partnerCode'])) {
    $code_order = rand(0, 999);
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $payment_method = "MOMO";

    $check_cart = executeResult("SELECT * FROM cart WHERE userid = {$query['id']}");

    execute("INSERT INTO orders (order_id, customer_name, email, phone_number, total_amount, order_date, status, delivery_address)
    VALUES ('$code_order', '$customer_name', '$email', '$phone_number', $amount, NOW(), 1, '$address')");

    foreach($check_cart as $cart){
        $pid = $cart['productid'];
        execute ("INSERT INTO order_details (order_id, payment_method, customer_name, customer_email, created_at, productid)
        VALUES ('$code_order','$payment_method', '$customer_name', '$customer_email', NOW(), $pid)");

        

        // Thêm thông tin vào bảng "momo"
        $insert_momo = "INSERT INTO momo(partner_Code, order_Id, amount, order_Info, order_Type, trans_Id, pay_Type, id_or) 
        VALUES ('$partnerCode', '$orderId', '$amount', '$orderInfo', '$orderType', '$transId', '$payType', '$cart[cartid]')";
        execute($insert_momo);
    }
    exit();
}
?>

<!doctype html>
<html lang="zxx">
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
                                        <li><a href="single-blog.php">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
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

<!-- Slider Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Confirmation</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!--================ confirmation part start =================-->
<section class="confirmation_part section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Delivery Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($confirmations != null) {
                                foreach ($confirmations as $confirmation) {
                                    ?>
                                    <tr>
                                        <td><?php echo $confirmation['order_id']; ?></td>
                                        <td><?php echo $confirmation['product_name']; ?></td>
                                        <td><?php echo $confirmation['quantity']; ?></td>
                                        <td><?php echo $confirmation['delivery_address']; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ confirmation part end =================-->
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
                                    <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
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
                                <li><a href="#">  Contact Us</a></li>
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
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                 
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
      
  <!-- Jquery Plugins, main Jquery -->	
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/main.js"></script>
      
</body>
</html>