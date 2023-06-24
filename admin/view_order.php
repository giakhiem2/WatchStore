<?php
require_once('../db/dbhelper.php');
$sql = "SELECT * FROM `order_details`";
$order_detailss = executeResult($sql);
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>view_order</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="order-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">product_id </th>
                                            <th scope="col">image</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">price</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Status</th>
                                            
                                            <th scope="col">Delivery Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    if ($order_detailss != null) {
        foreach ($order_detailss as $order_details) {
    ?>
        <tr>
            <td><?php echo $order_details['order_id']; ?></td>
            <td><?php echo $order_details['product_id']; ?></td>
            <td scope="row">
            <img src="<?php echo $order_details['image']; ?>" width="50px" height="50px" style="border-radius:50px;" alt="">
            </td>
            <td><?php echo $order_details['quantity']; ?></td>
            <td><?php echo $order_details['price']; ?></td>
            <td><?php echo $order_details['order_date']; ?></td>
            <td><?php echo $order_details['status']; ?></td>
            <td><?php echo $order_details['delivery_address']; ?></td>

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
            </div>
        </div>
    </div>
    
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
</body>

</html>