<?php
require_once('../../db/dbhelper.php');
$image = $product_name = $quantity = $category = $price = $pro_paramater = $brand = $object
    = $machine_series = $rope_material = $shell_material = $glass_material = $face_size = $origin
    = $shape = $color = $face_color = $style = $created_at = $edited_at = $deleted_at = '';
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
    }
if (isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
}
if (isset($_POST['pro_paramater'])) {
    $pro_paramater = $_POST['pro_paramater'];
}
if (isset($_POST['brand'])) {
    $brand = $_POST['brand'];
}
if (isset($_POST['object'])) {
    $object = $_POST['object'];
}
if (isset($_POST['machine_series'])) {
    $machine_series = $_POST['machine_series'];
}
if (isset($_POST['rope_material'])) {
    $rope_material = $_POST['rope_material'];
}
if (isset($_POST['shell_material'])) {
    $shell_material = $_POST['shell_material'];
}
if (isset($_POST['glass_material'])) {
    $glass_material = $_POST['glass_material'];
}
if (isset($_POST['face_size'])) {
    $face_size = $_POST['face_size'];
}
if (isset($_POST['origin'])) {
    $origin = $_POST['origin'];
}
if (isset($_POST['shape'])) {
    $shape = $_POST['shape'];
}
if (isset($_POST['color'])) {
    $color = $_POST['color'];
}
if (isset($_POST['face_color'])) {
    $face_color = $_POST['face_color'];
}
if (isset($_POST['style'])) {
    $style = $_POST['style'];
}
if (isset($_POST['created_at']) && isset($_POST['edited_at']) && isset($_POST['deleted_at'])) {
    $created_at = $_POST['created_at'];
    $edited_at = $_POST['edited_at'];
    $deleted_at = $_POST['deleted_at'];
    $currentDateTime = date('Y-m-d H:i:s');
    $created_at = $currentDateTime;
    $edited_at = $currentDateTime;
    $deleted_at = $currentDateTime;
}



if (isset($_FILES["image"])) {
    $target_dir = "../../image/";
    $target_dir2 = "../../img_products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $upload_ok = 1;
    $image_file_type =
        strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //kiem tra dinh dang file anh
    if (
        $image_file_type != "jpg" && $image_file_type != "png"
        && $image_file_type != "jpeg" && $image_file_type != "gif"
    ) {
        echo 'Only JPG, JPEG, PNG, GIF files are allowed';
        $upload_ok = 0;
    }

    //kiem tra trung ten anh
    if (file_exists($target_file)) {
        echo 'The file category_id already exits. Pls change your file category_id!';
        $upload_ok = 0;
    }

    //lay file anh
    if ($upload_ok == 1) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        //echo 'upload successfully!';     
    }
    $image = '../image/' . $_FILES["image"]["name"];
}




// ...

// Thực hiện câu truy vấn INSERT vào bảng product
$sql = 'INSERT INTO product (image, product_name, quantity, category_id, price, pro_paramater, 
brand, machine_series, rope_material, shell_material, glass_material, face_size, 
origin, shape, color, face_color, style, created_at, edited_at, deleted_at) 
VALUES ("' . $image . '", "' . $product_name . '", "' . $quantity . '", "' . $category . '", "' . $price . '", "' . $pro_paramater . '", 
"' . $brand . '", "' . $machine_series . '", "' . $rope_material . '", "' . $shell_material . '", "' . $glass_material . '", "' . $face_size . '", 
"' . $origin . '", "' . $shape . '", "' . $color . '", "' . $face_color . '", "' . $style . '", "' . $created_at . '", "' . $edited_at . '", "' . $deleted_at . '")';



$query = mysqli_query($con,$sql);
$product_id = mysqli_insert_id($con);


if ($upload_ok == 1 && isset($product_id)) {
    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
        $image_name = $_FILES["images"]["name"][$key];
        $target_file = $target_dir2 . basename($image_name);
        $target_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra định dạng file ảnh
        if ($target_file_type != "jpg" && $target_file_type != "png" && $target_file_type != "jpeg" && $target_file_type != "gif") {
            echo 'Only JPG, JPEG, PNG, GIF files are allowed';
            $upload_ok = 0;
            break;
        }

        // Kiểm tra trùng tên ảnh
        if (file_exists($target_file)) {
            echo 'The file ' . $image_name . ' already exists. Please change the file name!';
            $upload_ok = 0;
            break;
        }

        // Lưu file ảnh
        if ($upload_ok == 1) {
            if (move_uploaded_file($tmp_name, $target_file)) {
                echo 'Upload successfully!';

                // Thêm thông tin hình ảnh vào bảng img_products
                mysqli_query($con,"INSERT INTO img_products (product_id, image) VALUES ('$product_id', '$target_file')");

                
                

               
            } else {
                echo 'Failed to upload the file!';
            }
        }
    }
}
header('Location: ../product.php');