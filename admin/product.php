<?php
require_once('../db/dbhelper.php');
$sql = "SELECT product.*, category.category_name 
FROM product
LEFT JOIN category ON product.category_id = category.category_id";

// Kiểm tra xem có dữ liệu tìm kiếm được gửi từ form không
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    // Thêm điều kiện tìm kiếm vào câu truy vấn SQL
    $sql .= " WHERE product.product_name LIKE '%$search%'";
}

$sql .= " ORDER BY product.product_id DESC";
$products = executeResult($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Bigdeal - Premium Admin Template</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                <!-- Container-fluid starts-->

                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Products Category</h5>
                                </div>

                                <div class="card-body">
                                    <div class="btn-popup pull-right">
                                        <a href="product-add.php">
                                            <button type="button" class="btn btn-primary">Add Product</button>
                                        </a>
                                    </div>

                                    <div class="col-md-6">
                                        <form action="" method="GET" class="form-inline">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control" placeholder="Search by product name">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="product-physical">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product ID</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Category</th>

                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($products != null) {
                                                        foreach ($products as $prod) {
                                                    ?>
                                                            <tr>

                                                                <td><?php echo $prod['product_id']; ?></td>
                                                                <td scope="row">
                                                                    <img src="<?php echo $prod['image']; ?>" width="50px" height="50px" style="border-radius:50px;" alt="">
                                                                </td>
                                                                <td><?php echo $prod['product_name']; ?></td>
                                                                <td><?php echo $prod['quantity']; ?></td>
                                                                <td><?php echo $prod['category_name']; ?></td>


                                                                <td>
                                                                    <a href="product-edit.php?product_id=<?php echo $prod['product_id']; ?>" class="btn btn-sm btn-outline-info">Edit</a>
                                                                    <a onclick="return confirm('Do you want to delete this product ?');" href="process/product-delete-process.php?product_id=<?php echo $prod['product_id']; ?>" class="btn btn-sm btn-outline-danger">delete</a>
                                                                </td>


                                                            </tr>
                                                    <?php }
                                                    } ?>
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

</body>

</html>