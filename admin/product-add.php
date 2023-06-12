<?php
require_once('../db/dbhelper.php');
$sql = 'select * from category';
$categorys = executeResult($sql);
date_default_timezone_set('UTC');
$currentDateTime = date('Y-m-d H:i:s');




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
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                <form action="process/product-add-process.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Avatar</label>
                        <input type="file"  class="form-control" id="image" name="image"> <!-- image[] -->
                    </div>
                    <div class="form-group">
                        <label for="image">LibraryImage</label>
                        <input type="file"  class="form-control" id="images" name="images[]" multiple > <!-- image[] -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name Product</label>
                        <input type="text" class="form-control" name="product_name" id="product_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select class="form-control" name="category">
                            <?php
                            if ($categorys != null) {
                                foreach ($categorys as $cate) {
                            ?>
                                    <option value="<?php echo $cate['category_id'] ?>"><?php echo $cate['category_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pro paramater</label>
                        <input type="text" class="form-control" name="pro_paramater" id="pro_paramater">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Brand</label>
                        <input type="text" class="form-control" name="brand" id="brand">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Machine Series</label>
                        <input type="text" class="form-control" name="machine_series" id="machine_series">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Rope Material</label>
                        <input type="text" class="form-control" name="rope_material" id="rope_material">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Shell Material</label>
                        <input type="text" class="form-control" name="shell_material" id="shell_material">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Glass Material</label>
                        <input type="text" class="form-control" name="glass_material" id="glass_material">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Face Size</label>
                        <input type="text" class="form-control" name="face_size" id="face_size">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Origin</label>
                        <input type="text" class="form-control" name="origin" id="origin">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Shape</label>
                        <input type="text" class="form-control" name="shape" id="shape">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Color</label>
                        <input type="text" class="form-control" name="color" id="color">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Face Color</label>
                        <input type="text" class="form-control" name="face_color" id="face_color">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Style</label>
                        <input type="text" class="form-control" name="style" id="style">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Created At</label>
                        <input type="datetime" class="form-control" name="created_at" id="created_at">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Updated At</label>
                        <input type="datetime" class="form-control" name="edited_at" id="edited_at">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deleted At</label>
                        <input type="datetime" class="form-control" name="deleted_at" id="deleted_at">
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

</body>

</html>