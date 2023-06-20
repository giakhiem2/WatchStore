
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Bigdeal - Premium Admin Template</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
</head>
<style>
    .lucky_wheel {
  text-align: center;
}

.wheel {
  position: relative;
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.wheel-border {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 5px solid #000;
  border-radius: 50%;
}

.wheel-cursor {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 20px;
  height: 20px;
  background-color: #ff0000;
  border-radius: 50%;
  z-index: 10;
}

.wheel-section {
  position: absolute;
  top: 50%;
  left: 50%;
  transform-origin: 50% 100%;
  width: 100%;
  height: 100%;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  transition: transform 3s ease-in-out;
}

.spin-button {
  margin-top: 20px;
}

#spin {
  padding: 10px 20px;
  font-size: 18px;
  background-color: #ff0000;
  color: #fff;
  border: none;
  cursor: pointer;
}

.result {
  margin-top: 20px;
  font-size: 18px;
  font-weight: bold;
}
</style>
<body>
    <!-- Các phần header, sidebar và footer giữ nguyên -->
    <!-- ... -->
    <div class="page-wrapper">

<!-- Page Header Start-->
<?php include('part/headerBackend.php'); ?>
<!-- Page Header Ends -->

<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    <?php include('part/menu-left.php'); ?>
    <!-- Page Sidebar Ends-->

    <div class="page-body">
    <!-- Container-fluid starts-->
    <section class="lucky_wheel">
  <h2>Lucky Wheel</h2>
  <div class="wheel">
    <div class="wheel-border"></div>
    <div class="wheel-cursor"></div>
    <div class="wheel-section">50% OFF</div>
    <div class="wheel-section">10% OFF</div>
    <div class="wheel-section">15% OFF</div>
    <div class="wheel-section">20% OFF</div>
    <div class="wheel-section">5% OFF</div>
    <div class="wheel-section">No Luck</div>
    <div class="spin-button">
      <button id="spin">Spin</button>
    </div>
  </div>
  <div id="result" class="result"></div>
</section>


    
    <!-- Container-fluid Ends-->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- Jsgrid js-->
<script src="../assets/js/jsgrid/jsgrid.min.js"></script>
<script src="../assets/js/jsgrid/griddata-manage-product.js"></script>
<script src="../assets/js/jsgrid/jsgrid-manage-product.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>
    <!-- Các phần script tương tự như trong mã gốc -->
    <!-- ... -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  var wheel = document.querySelector(".wheel");
  var wheelSections = wheel.getElementsByClassName("wheel-section");
  var spinButton = document.getElementById("spin");
  var result = document.getElementById("result");

  var spinning = false;
  var currentRotation = 0;
  var wheelItemAngle = 360 / wheelSections.length;

  spinButton.addEventListener("click", function () {
    if (!spinning) {
      spinning = true;
      result.textContent = "";

      // Randomly select a wheel section
      var randomIndex = Math.floor(Math.random() * wheelSections.length);
      var selectedSection = wheelSections[randomIndex];

      // Calculate the target rotation
      var targetRotation = 360 * 5 - randomIndex * wheelItemAngle;

      // Start spinning animation
      var interval = setInterval(function () {
        currentRotation += 10;
        wheel.style.transform = "rotate(" + currentRotation + "deg)";

        if (currentRotation >= targetRotation) {
          clearInterval(interval);
          spinning = false;

          // Display the result
          result.textContent = selectedSection.textContent;

          // Apply the discount code based on the result
          applyDiscount(selectedSection.textContent);
        }
      }, 10);
    }
  });

  // Function to apply the discount code
  function applyDiscount(result) {
    // You can implement your logic here to apply the discount code based on the result
    // For example, you can redirect the user to a checkout page with the discount applied
    // or display the discount code on the page for the user to copy
  }
});

</script>
</body>

</html>
