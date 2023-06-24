<?php
require_once 'db/dbhelper.php';
if (isset($_POST['product']) && isset($_POST['quantity'])) {
    // Trích xuất thông tin sản phẩm từ dữ liệu gửi đi
    $product = json_decode($_POST['product'], true);
    $quantity = $_POST['quantity'];

    // Thực hiện xử lý tiếp theo, ví dụ: lưu thông tin sản phẩm vào giỏ hàng
    // ...

    // Chuyển hướng sau khi xử lý thành công
    header('Location: cart.php');
    exit();
}
?>
<?php
session_start();
if(isset($_SESSION['SESSION_EMAIL'])){
    $email = $_SESSION['SESSION_EMAIL'];
    $query = executeSingleResult("SELECT * FROM users WHERE email='$email'");
    $id = $query['id'];
}
if(isset($_GET['product'])){
    $product_id = $_GET['product'];
    $check = executeSingleResult("SELECT * FROM product WHERE product_id = $product_id");
    $price = $check['price'];
    execute("INSERT INTO cart (userid, productid, quantity, price, created_at) VALUES ($id, $product_id, 1, $price, NOW())");
    header('Location: cart.php');
    exit;
}
if (isset($_POST['quantity'])) {
    $quantities = $_POST['quantity'];

    // Lặp qua mảng số lượng và cập nhật giá trị số lượng cho từng sản phẩm trong giỏ hàng
    foreach ($quantities as $product_id => $quantity) {
        // Kiểm tra và xử lý số lượng theo nhu cầu của bạn
        // ...
    }

    // Chuyển hướng sau khi xử lý thành công
    header('Location: cart.php');
    exit();
}

// Kiểm tra xem có thông tin sản phẩm cần xóa không
if (isset($_GET['remove_product'])) {
    $remove_product_id = $_GET['remove_product'];
    
    // Thực hiện xóa sản phẩm khỏi giỏ hàng dựa trên product_id và userid
    execute("DELETE FROM cart WHERE userid = $id AND productid = $remove_product_id");
    
    // Chuyển hướng lại trang giỏ hàng để cập nhật thông tin
    header("Location: cart.php");
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
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Lấy danh sách sản phẩm trong giỏ hàng
$carts = executeResult("SELECT * FROM cart WHERE userid = $id");

// Tạo một mảng tạm để lưu trữ thông tin sản phẩm
$Carts = [];

// Gộp các sản phẩm có cùng product_id lại thành một sản phẩm duy nhất
foreach ($carts as $cart) {
    $product_id = $cart['productid'];
    $quantity = $cart['quantity'];
    $price = $cart['price'];

    // Kiểm tra xem sản phẩm đã tồn tại trong mảng tạm hay chưa
    $found = false;
    foreach ($Carts as &$Cart) {
        if ($Cart['productid'] == $product_id) {
            // Sản phẩm đã tồn tại trong mảng tạm, tăng số lượng và giá tiền
            $Cart['quantity'] += $quantity;
            $Cart['price'] += $quantity * $price;
            $found = true;
            break;
        }
    }

    if (!$found) {
        // Thêm sản phẩm vào mảng tạm
        $newItem = array(
            'productid' => $product_id,
            'quantity' => $quantity,
            'price' => $quantity * $price
        );
        $Carts[] = $newItem;
    }
}

// Kiểm tra xem giỏ hàng có sản phẩm hay không trước khi hiển thị thông tin
if (!empty($Carts)) {
    // Hiển thị thông tin sản phẩm đã gộp trong bảng
    foreach ($Carts as $index => $Cart) {
        $product_id = $Cart['productid'];
        $quantity = $Cart['quantity'];
        $totalPrice = $Cart['price'];

        // Kiểm tra xem sản phẩm đã tồn tại trong cơ sở dữ liệu hay không
        $product = executeSingleResult("SELECT * FROM product WHERE product_id = $product_id");

        if ($product) {
            // Hiển thị thông tin sản phẩm
            ?>
            <tr>
                <td>
                    <?php if (isset($product['image'])) : ?>
                        <img src="image/<?php echo $product['image']; ?>" width="50px" height="50px" style="border-radius: 50px;" alt="">
                    <?php endif; ?>
                </td>
                <td><?php echo $product['price']; ?>$</td>
                <td>
                    <input type="number" value="<?php echo $quantity; ?>" min="1" max="<?php echo $product['quantity']; ?>" name="quantity[<?php echo $product_id; ?>]" id="quantity-<?php echo $product_id; ?>" data-index="<?php echo $product_id; ?>" onchange="updateTotal(this)">
                </td>
                <td id="totalPrice-<?php echo $index; ?>"><?php echo $totalPrice; ?>$</td>
                <td>
                    <a href="cart.php?remove_product=<?php echo $product_id; ?>" class="btn_1">Remove</a>
                </td>
            </tr>
            <?php
        }
    }
}
?>


                    </tbody>
                    </table>
            </div>
            <div class="bottom_button">
                <a class="btn_1" href="shop.php">Continue Shopping</a>
                <div class="cupon_text float-right">
                    <a class="btn_1" href="checkout.php">Purchase</a>
                    
                </div>
            </div>
        </div>
    </div>
</section>

      <!--================End Cart Area =================-->
      
  </main>>
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
  
  <!-- Scrollup, nice-select, sticky -->
  <script src="./assets/js/jquery.scrollUp.min.js"></script>
  <script src="./assets/js/jquery.nice-select.min.js"></script>
  <script src="./assets/js/jquery.sticky.js"></script>
  <script src="./assets/js/jquery.magnific-popup.js"></script>

  <!-- contact js -->
  <script src="./assets/js/contact.js"></script>
  <script src="./assets/js/jquery.form.js"></script>
  <script src="./assets/js/jquery.validate.min.js"></script>
  <script src="./assets/js/mail-script.js"></script>
  <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
  
  <!-- Jquery Plugins, main Jquery -->	
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/main.js"></script>
  
<script>
    function updateTotal(inputElement) {
  var newQuantity = inputElement.value;
  var index = inputElement.dataset.index;

  // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'update_quantity.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Xử lý phản hồi từ server (nếu cần)
      // Cập nhật tổng giá tiền và các thành phần khác tại đây (nếu cần)
    }
  };
  xhr.send('index=' + index + '&newQuantity=' + newQuantity);
}
</script>

    <script>
function updateTotal(input) {
    var quantity = parseInt(input.value);
    var price = parseFloat(input.parentNode.previousElementSibling.innerText.replace('$', ''));
    var totalPriceElement = input.parentNode.nextElementSibling;
    var totalPrice = quantity * price;
    totalPriceElement.innerText = totalPrice + '$';
}
</script>
<script>
    function removeProduct(productId) {
        if (confirm('Are you sure you want to remove this product?')) {
            // Send an AJAX request to the server to remove the product from the cart
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page after successful removal
                    location.reload();
                }
            };
            xhttp.open('GET', 'remove_product.php?product=' + productId, true);
            xhttp.send();
        }
    }
</script>



</body>
</html>