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
    
    <!-- Angular JS -->
    
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
    <style>
        .invalid{
            color: red;
        }
    </style>
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

                <form action="process/product-add-process.php" method="post" enctype="multipart/form-data" id="form-1" onsubmit="Validator()">
                    <div class="form-group">
                        <label for="image">Avatar</label>
                        <input type="file"  class="form-control" id="image" name="image"> <!-- image[] -->
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="images">LibraryImage</label>
                        <input type="file"  class="form-control" id="images" name="images[]" multiple > <!-- image[] -->
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Name Product</label>
                        <input type="text" class="form-control" name="product_name" id="product_name">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Danh mục</label>
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
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                        <span class="form-message"></span>
                    </div>
                    <div class="pro_paramater">
                        <label for="pro_paramater">Pro paramater</label>
                        <input type="text" class="form-control" name="pro_paramater" id="pro_paramater">
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="machine_series">Machine Series</label>
                        <input type="text" class="form-control" name="machine_series" id="machine_series">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="rope_material">Rope Material</label>
                        <input type="text" class="form-control" name="rope_material" id="rope_material">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="shell_material">Shell Material</label>
                        <input type="text" class="form-control" name="shell_material" id="shell_material">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="glass_material">Glass Material</label>
                        <input type="text" class="form-control" name="glass_material" id="glass_material">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="face_size">Face Size</label>
                        <input type="text" class="form-control" name="face_size" id="face_size">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" class="form-control" name="origin" id="origin">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="shape">Shape</label>
                        <input type="text" class="form-control" name="shape" id="shape">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" name="color" id="color">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="face_color">Face Color</label>
                        <input type="text" class="form-control" name="face_color" id="face_color">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="style">Style</label>
                        <input type="text" class="form-control" name="style" id="style">
                        <span class="form-message"></span>
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
    <script src="js/validation.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#image'),
                Validator.isRequired('#images'),
                Validator.isRequired('#product_name'),
                Validator.minLength('#product_name', 6),
                Validator.isRequired('#quantity'),
                Validator.positiveNumber('#quantity'),
                Validator.isRequired('#price'),
                Validator.positiveNumber('#price'),
                Validator.isRequired('#pro_paramater'),
                Validator.isRequired('#machine_series'),
                Validator.isRequired('#rope_material'),
                Validator.isRequired('#shell_material'),
                Validator.isRequired('#glass_material'),
                Validator.isRequired('#face_size'),
                Validator.isRequired('#origin'),
                Validator.isRequired('#shape'),
                Validator.isRequired('#color'),
                Validator.isRequired('#face_color'),
                Validator.isRequired('#style'),
                
            ]
        });
    </script>
</body>

</html>