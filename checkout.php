<?php
session_start();

// Check if the cart array exists in the session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
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
</head>
<style>
.payment-form {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.payment-form button {
  width: 200px;
  text-align: center;
}

.payment-form button span {
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
}

.error {
  border-color: red; /* Đổi màu viền thành màu đỏ cho trường nhập có lỗi */
}

.error-message {
  color: red; /* Đổi màu chữ thành màu đỏ cho thông báo lỗi */
  font-size: 12px;
}
</style>

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
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
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
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Checkout Area =================-->
        <section class="checkout_area section_padding">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Billing Details</h3>
          <form class="contact_form" action="#" method="post" novalidate="novalidate">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" class="form-control" id="last" name="last" placeholder="Name" required />
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="tel" class="form-control" id="number" name="number" placeholder="Phone number" pattern="0\d{9}" required />
                <small>Please enter a valid phone number starting with 0.</small>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required />
                <small>Please enter a valid email address (example: example@gmail.com).</small>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="add1" name="add1" placeholder="Address" required />
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>Noted</h3>
                </div>
                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
              <li>
                <a href="cart.php">Product
                <span>Total</span>
</a>
</li>
<?php
// Kiểm tra xem đã lưu trữ thông tin đơn hàng trong session hay chưa
if (isset($_SESSION['selectedProducts'])) {
  $selectedProducts = $_SESSION['selectedProducts'];

  // Tính tổng giá tiền của các sản phẩm
  $totalAmount = 0;
  foreach ($selectedProducts as $index => $selectedProduct) {
    $product = $selectedProduct['product'];
    $quantity = $selectedProduct['quantity'];
    $totalPrice = $product['price'] * $quantity;
    $totalAmount += $totalPrice;

    // Hiển thị thông tin sản phẩm
    echo '<li>';
    echo '<a href="#">';

    // Kiểm tra xem ảnh sản phẩm có tồn tại hay không
    if (isset($product['image'])) {
      $imagePath = 'image/' . $product['image'];
      echo '<img src="' . $imagePath . '" width="50px" height="50px" alt="Product Image">';
    }

    echo '<span class="middle">x ' . $quantity . '</span>';
    echo '<span class="last">' . $totalPrice . '$</span>';
    echo '</a>';
    echo '</li>';
  }

  // Hiển thị tổng giá tiền
  echo '<li>';
  echo '<a href="#">Total';
  echo '<span>' . $totalAmount . '$</span>';
  echo '</a>';
  echo '</li>';
} else {
  echo '<p>No products in the cart.</p>';
}
?>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">

 <script>
   function togglePaymentForms() {
     var paymentForms = document.getElementsByClassName("payment-form");

     // Ẩn tất cả các form thanh toán
     for (var i = 0; i < paymentForms.length; i++) {
       paymentForms[i].style.display = "none";
     }

     // Hiển thị form thanh toán khi người dùng nhấp vào "Check payments"
     document.getElementById("checkPaymentsButton").addEventListener("click", function() {
       for (var i = 0; i < paymentForms.length; i++) {
         paymentForms[i].style.display = "block";
       }
     });
   }
 </script>

<script>
            function togglePaymentForms() {
              var paymentForms = document.getElementsByClassName("payment-form");
              var paypalContainer = document.getElementById("paypal-button-container");

              // Ẩn tất cả các form thanh toán
              for (var i = 0; i < paymentForms.length; i++) {
                paymentForms[i].style.display = "none";
              }

              // Ẩn phần PayPal
              paypalContainer.style.display = "none";

              // Hiển thị form thanh toán khi người dùng nhấp vào "Check payments"
              document.getElementById("checkPaymentsButton").addEventListener("click", function() {
                for (var i = 0; i < paymentForms.length; i++) {
                  paymentForms[i].style.display = "block";
                }
                // Hiển thị phần PayPal khi người dùng nhấp vào "Check payments"
                paypalContainer.style.display = "block";
              });
            }
            // Lắng nghe sự kiện khi các trường nhập thay đổi
document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');

  // Lặp qua từng trường nhập và lắng nghe sự kiện thay đổi
  inputs.forEach(function(input) {
    input.addEventListener('input', validateForm);
  });
});

// Hàm kiểm tra và cập nhật trạng thái nút Payments
function validateForm() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');
  var isValid = true;

  // Kiểm tra từng trường nhập xem có giá trị hợp lệ hay không
  inputs.forEach(function(input) {
    if (!input.checkValidity()) {
      isValid = false;
    }
  });

  // Cập nhật trạng thái nút Payments
  var paymentsButton = document.getElementById('checkPaymentsButton');
  if (isValid) {
    paymentsButton.disabled = false;
  } else {
    paymentsButton.disabled = true;
  }
}
        </script>
        
        <button id="checkPaymentsButton" class="btn btn-primary" type="submit" disabled>Payments</button>

<form class="payment-form" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanhtoanmomoqr.php" style="display: none;">
    <button type="submit" name="momo" class="btn btn-danger btn-payment">
        <span>MOMO QR</span>
    </button>
</form>

<form class="payment-form" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanhtoanmomoatm.php" style="display: none;">
    <button type="submit" name="momo" class="btn btn-danger btn-payment">
        <span>MOMO ATM</span>
    </button>
</form>

<form class="payment-form" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanhtoanvnpay.php" style="display: none;">
  <button type="submit" name="redirect" class="btn btn-danger btn-payment">
    <span>VNPAY</span>
  </button>
</form>


<p id="paymentSuccessMessage" style="display: none;">Payment successful! Thank you.</p>

<div id="paypal-button-container" style="display: none;"></div>

<script>
togglePaymentForms();

// Xử lý sự kiện khi thanh toán thành công
document.querySelector('.contact_form').addEventListener('submit', function(event) {
  event.preventDefault();

  // Gửi yêu cầu thanh toán và xử lý kết quả
  // Ở đây, tôi sẽ giả định rằng thanh toán thành công
  var paymentSuccess = true;

  if (paymentSuccess) {
    // Hiển thị thông báo khi thanh toán thành công
    document.getElementById('paymentSuccessMessage').style.display = 'block';
  }
});
</script>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!--================End Checkout Area =================-->
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

  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=ASa9LPeblkusEpBSFplrc-l9bUA2QCYViA1vgq5Dy2ghqrIvJ3LTN_I-xmw8Kdq2pD8NWYjuvwJBPPiY"></script>
<div id="paypal-button-container"></div>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // Lấy tổng giá tiền từ đơn hàng của bạn
      <?php
        if (isset($_SESSION['selectedProducts'])) {
          $selectedProducts = $_SESSION['selectedProducts'];
          $totalAmount = 0;

          foreach ($selectedProducts as $index => $selectedProduct) {
            $product = $selectedProduct['product'];
            $quantity = $selectedProduct['quantity'];
            $totalPrice = $product['price'] * $quantity;
            $totalAmount += $totalPrice;
          }

          echo 'var totalAmount = ' . $totalAmount . ';';
        }
      ?>
      
      // Thiết lập thông tin chi tiết giao dịch, bao gồm tổng giá tiền và chi tiết các mục hàng
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: totalAmount.toString()
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Thu thập tiền từ giao dịch
      return actions.order.capture().then(function(details) {
        // Hiển thị thông báo giao dịch thành công cho người mua
        alert('Transaction completed by ' + details.payer.name.given_name);
        // Thêm thông tin đơn hàng vào trang (thay thế "order-info" bằng ID hoặc lớp của phần tử chứa thông tin đơn hàng của bạn)
        document.getElementById('order-info').innerHTML = 'Thông tin đơn hàng: ' + JSON.stringify(details);
      });
    }
  }).render('#paypal-button-container');
  // Hiển thị Smart Payment Buttons trên trang web của bạn
</script>


        <script>
    var orderAmount = <?php echo $totalAmount; ?>; // Truyền giá trị đơn hàng vào biến JavaScript
    // Sử dụng biến orderAmount trong mã JavaScript khác
    // ...
</script>
<script>
    fetch('https://your-api-url.com/order-amount')
        .then(response => response.json())
        .then(data => {
            var orderAmount = data.amount; // Lấy giá trị đơn hàng từ kết quả API
            // Sử dụng giá trị đơn hàng trong mã JavaScript khác
            // ...
        });
</script>
<script>
    var orderAmountElement = document.getElementById('order-amount'); // Lấy phần tử HTML chứa giá trị đơn hàng
    var orderAmount = orderAmountElement.textContent; // Lấy giá trị đơn hàng từ nội dung phần tử HTML
    // Sử dụng giá trị đơn hàng trong mã JavaScript khác
    // ...
</script>
<script>
  // Lắng nghe sự kiện khi trang web được tải
document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');

  // Lặp qua từng trường nhập và lắng nghe sự kiện blur (khi mất trỏ chuột khỏi trường nhập)
  inputs.forEach(function(input) {
    input.addEventListener('blur', validateField);
  });

  // Lắng nghe sự kiện submit của form
  form.addEventListener('submit', function(e) {
    e.preventDefault(); // Ngăn chặn hành động submit mặc định
    validateForm(); // Kiểm tra form trước khi submit
  });
});

// Hàm kiểm tra và hiển thị thông báo lỗi cho trường nhập cụ thể
function validateField() {
  if (!this.checkValidity()) {
    this.classList.add('error'); // Thêm lớp 'error' để hiển thị thông báo lỗi
    this.nextElementSibling.textContent = this.validationMessage; // Hiển thị thông báo lỗi trong phần tử kế tiếp
  } else {
    this.classList.remove('error'); // Xóa lớp 'error' nếu trường nhập hợp lệ
    this.nextElementSibling.textContent = ''; // Xóa thông báo lỗi
  }
}

// Hàm kiểm tra và cập nhật trạng thái nút Payments
function validateForm() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');
  var isValid = true;

  // Kiểm tra từng trường nhập xem có giá trị hợp lệ hay không
  inputs.forEach(function(input) {
    if (!input.checkValidity()) {
      isValid = false;
      input.classList.add('error'); // Thêm lớp 'error' để hiển thị thông báo lỗi
      input.nextElementSibling.textContent = input.validationMessage; // Hiển thị thông báo lỗi trong phần tử kế tiếp
    } else {
      input.classList.remove('error'); // Xóa lớp 'error' nếu trường nhập hợp lệ
      input.nextElementSibling.textContent = ''; // Xóa thông báo lỗi
    }
  });

  // Cập nhật trạng thái nút Payments
  var paymentsButton = document.getElementById('checkPaymentsButton');
  if (isValid) {
    paymentsButton.disabled = false;
  } else {
    paymentsButton.disabled = true;
  }
}

</script>
<script>
  document.getElementById("checkPaymentsButton").addEventListener("click", function() {
  // Xử lý thanh toán ở đây
  console.log("Đã nhấp vào nút thanh toán");
  // ...
});
</script>
<script>
  document.getElementById("checkPaymentsButton").addEventListener("click", function() {
  var paymentForms = document.getElementsByClassName("payment-form");
  for (var i = 0; i < paymentForms.length; i++) {
    paymentForms[i].style.display = "block";
  }
});
</script>
<script>
  // Lắng nghe sự kiện khi các trường nhập thay đổi
document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');

  // Lặp qua từng trường nhập và lắng nghe sự kiện thay đổi
  inputs.forEach(function(input) {
    input.addEventListener('input', validateForm);
  });
});

// Hàm kiểm tra và cập nhật trạng thái nút Payments
function validateForm() {
  var form = document.querySelector('.contact_form');
  var inputs = form.querySelectorAll('input, textarea');
  var isValid = true;

  // Kiểm tra từng trường nhập xem có giá trị hợp lệ hay không
  inputs.forEach(function(input) {
    if (!input.checkValidity()) {
      isValid = false;
    }
  });

  // Cập nhật trạng thái nút Payments
  var paymentsButton = document.getElementById('checkPaymentsButton');
  if (isValid) {
    paymentsButton.disabled = false;
  } else {
    paymentsButton.disabled = true;
  }
}

  </script>
</body>
</html>