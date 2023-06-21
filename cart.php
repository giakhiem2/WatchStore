<?php
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
// Check if the selected products are stored in the session
if (isset($_SESSION['selectedProducts'])) {
  $selectedProducts = $_SESSION['selectedProducts'];
} else {
  $selectedProducts = array();
}

// Check if a new product and quantity are passed from the "add to cart" functionality
if (isset($_GET['product']) && isset($_GET['quantity'])) {
  $product = json_decode($_GET['product'], true);
  $quantity = $_GET['quantity'];
  

  // Check if the product with the same product_id already exists in the selected products array
  $productIndex = getProductIndexById($selectedProducts, $product['product_id']);

  if ($productIndex !== false) {
    // If the product exists, increase the quantity by one
    $selectedProducts[$productIndex]['quantity'] += 1;
  } else {
    // If the product doesn't exist, add it to the selected products array with quantity one
    $newProduct = array(
      'product' => $product,
      'quantity' => $quantity
    );
    $selectedProducts[] = $newProduct;
  }

  // Update the selected products in the session
  $_SESSION['selectedProducts'] = $selectedProducts;
}

// Check if the remove_index parameter is set
if (isset($_GET['remove_index'])) {
  $removeIndex = $_GET['remove_index'];

  // Remove the product from the selectedProducts array using the index
  if (isset($selectedProducts[$removeIndex])) {
      unset($selectedProducts[$removeIndex]);
  }

  // Re-index the array to fix any gaps in the keys
  $selectedProducts = array_values($selectedProducts);

  // Update the session with the modified array
  $_SESSION['selectedProducts'] = $selectedProducts;
}

// Function to get the index of a product in the selected products array based on the product_id
function getProductIndexById($selectedProducts, $productId) {
  foreach ($selectedProducts as $index => $selectedProduct) {
    if ($selectedProduct['product']['product_id'] === $productId) {
      return $index;
    }
  }
  return false;
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
                        // Iterate over the selected products and display them in the table
                        foreach ($selectedProducts as $index => $selectedProduct) {
                            $product = $selectedProduct['product'];
                            $quantity = $selectedProduct['quantity'];
                            $totalPrice = $product['price'] * $quantity;
                        ?>
                            <tr>
                                <td>
                                    <?php if (isset($product['image'])) : ?>
                                        <img src="image/<?php echo $product['image']; ?>" width="50px" height="50px" style="border-radius: 50px;" alt="">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $product['price']; ?>$</td>
                                <td>
                                    <input type="number" value="<?php echo $quantity; ?>" min="1" max="<?php echo $product['quantity']; ?>" name="quantity" data-index="<?php echo $index; ?>" onchange="updateTotal(this)">
                                </td>
                                <td id="totalPrice-<?php echo $index; ?>"><?php echo $totalPrice; ?>$</td>
                                <td>
                                    <a href="cart.php?remove_index=<?php echo $index; ?>" class="btn_1">Remove</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
            <div class="bottom_button">
                <a class="btn_1" href="shop.php">Continue Shopping</a>
                <div class="cupon_text float-right">
                    <a class="btn_1" href="checkout.php">Purchase</a>
                    <a class="btn_1" href="javascript:location.reload(true)">Update</a>
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
  <<script>
    function updateTotal(input) {
        var index = input.getAttribute('data-index');
        var quantity = input.value;
        var price = <?php echo $product['price']; ?>;
        var total = quantity * price;
        document.getElementById('totalPrice-' + index).textContent = total.toFixed(2) + '$';
        // Cập nhật tổng tiền trên server (gửi yêu cầu AJAX đến server để cập nhật)
        updateTotalOnServer(index, total);
    }

    function updateTotalOnServer(index, total) {
        // Gửi yêu cầu AJAX đến server để cập nhật tổng tiền dựa trên index và total
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_total.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Xử lý phản hồi từ server (nếu cần)
            }
        };
        xhr.send('index=' + index + '&total=' + total);
    }
</script>
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
</body>
</html>