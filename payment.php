<?php
session_start();

// Kiểm tra xem đã có giá trị totalAmount trong session hay chưa
if (isset($_SESSION['totalAmount'])) {
    $totalAmount = $_SESSION['totalAmount'];
} else {
    // Nếu không có giá trị totalAmount, chuyển hướng về trang checkout.php
    header('Location: checkout.php');
    exit();
}

// Xóa giá trị totalAmount khỏi session sau khi đã lấy giá trị
unset($_SESSION['totalAmount']);
?>

<section class="checkout_area section_padding">
  <div class="container">
    <!-- Các phần thông tin khác về thanh toán -->

    <div class="order_box">
      <h2>Your Order</h2>
      <ul class="list">
        <!-- Hiển thị thông tin đơn hàng -->

        <li>
          <a href="#">Total
            <span id="totalAmount"><?php echo $totalAmount; ?>$</span>
          </a>
        </li>
      </ul>

      <!-- Các phần thanh toán -->

      <button id="checkPaymentsButton" class="btn btn-primary" type="button" disabled>Payments</button>

      <form class="payment-form" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanhtoanmomoqr.php" style="display: none;">
        <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
        <button type="submit" name="momoQR" class="btn btn-danger btn-payment">
          <span>MOMO QR</span>
        </button>
      </form>

      <form class="payment-form" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanhtoanmomoatm.php" style="display: none;">
        <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
        <button type="submit" name="momoATM" class="btn btn-danger btn-payment">
          <span>MOMO ATM</span>
        </button>
      </form>

      <div id="paypal-button-container" style="display: none;"></div>

      <script>
        togglePaymentForms();

        // Xử lý sự kiện khi nút MOMO QR được nhấp
        document.querySelector('form[name="momoQR"]').addEventListener('submit', function(event) {
          event.preventDefault();

          // Gửi yêu cầu thanh toán MOMO QR và xử lý kết quả
          // Lấy giá trị totalAmount từ input hidden và xử lý tiếp theo
          var totalAmount = parseFloat(document.querySelector('input[name="totalAmount"]').value);
          // ...
        });

        // Xử lý sự kiện khi nút MOMO ATM được nhấp
        document.querySelector('form[name="momoATM"]').addEventListener('submit', function(event) {
          event.preventDefault();

          // Gửi yêu cầu thanh toán MOMO ATM và xử lý kết quả
          // Lấy giá trị totalAmount từ input hidden và xử lý tiếp theo
          var totalAmount = parseFloat(document.querySelector('input[name="totalAmount"]').value);
          // ...
        });

        // Xử lý sự kiện khi nút PayPal được nhấp
        document.querySelector('#paypal-button-container').addEventListener('click', function() {
          // Gửi yêu cầu thanh toán PayPal và xử lý kết quả
          // Lấy giá trị totalAmount từ input hidden và xử lý tiếp theo
          var totalAmount = parseFloat(document.querySelector('input[name="totalAmount"]').value);
          // ...
        });
      </script>
    </div>
  </div>
</section>
