<?php
require_once('../db/dbhelper.php');

?>

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

<body>


    <!-- page-wrapper Start-->
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
                <form action="process/coupon-add-process.php" method="post" 
                                        enctype="multipart/form-data">
                   
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Coupon Code</label>
                        <input type="text" class="form-control" id="couponInput" name="coupon_code"  >
                    </div>
                    <div class="form-group" >
                    <label for="exampleInputPassword1">Coupon Type</label>
                        <select name="coupon_type" class="form-control">
                        <option value="">Select</option>
                        <?php
                        if($coupon_type == 'Percentage'){
                            echo'<option value="Percentage" selected>Percentage</option>
                                <option value="Dollar">Dollar</option>';
                        }elseif($coupon_type == 'Dollar'){
                            echo '<option
                            value="Percentage">Percentage</option>
                                <option value="Dollar" selected>Dollar</option>';
                        }else{
                            echo '<option
                            value="Percentage">Percentage</option>
                                <option value="Dollar">Dollar</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">CartMinValue</label>
                        <input type="number" class="form-control" name="cart_min_value" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Discount</label>
                        <input type="number" class="form-control" name="discount" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="number" class="form-control" name="quantity" >
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Started</label>
                        <input type="date" class="form-control" name="started" >
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ended</label>
                        <input type="date" class="form-control" name="ended" >
                    </div>
                                                          
                   <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2019 © Bigdeal All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->

        </div>

    </div>

    <!-- latest jquery-->
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
    <script>
  document.getElementById("generate").addEventListener("click", function() {
    // Gọi mã PHP bằng Ajax để lấy mã coupon từ máy chủ
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById("couponInput").value = xhr.responseText;
      }
    };
    xhr.open("GET", "generate_coupon.php", true);
    xhr.send();
  });
</script>

</body>

</html>