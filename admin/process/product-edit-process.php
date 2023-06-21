<?php
require_once('../../db/dbhelper.php');
if ( isset($_POST['product_id'])  && isset($_POST['product_name']) && isset($_POST['quantity']) && isset($_POST['category']) && isset($_POST['price'])
 && isset($_POST['pro_paramater'])  && isset($_POST['machine_series']) && isset($_POST['rope_material']) && isset($_POST['shell_material']) && isset($_POST['glass_material'])
&& isset($_POST['face_size']) && isset($_POST['origin']) && isset($_POST['shape']) && isset($_POST['color']) && isset($_POST['face_color']) && isset($_POST['style'])
&& isset($_POST['created_at']) && isset($_POST['edited_at']) && isset($_POST['deleted_at'])) {

$product_id = $_POST['product_id'];

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$category_id = $_POST['category'];
$price = $_POST['price'];
$pro_paramater = $_POST['pro_paramater'];

$machine_series = $_POST['machine_series'];
$rope_material = $_POST['rope_material'];
$shell_material = $_POST['shell_material'];
$glass_material = $_POST['glass_material'];
$face_size = $_POST['face_size'];
$origin = $_POST['origin'];
$shape = $_POST['shape'];
$color = $_POST['color'];
$face_color = $_POST['face_color'];
$style = $_POST['style'];
$created_at = $_POST['created_at'];
$edited_at = $_POST['edited_at'];
$deleted_at = $_POST['deleted_at'];

// Kiểm tra xem có tệp hình ảnh mới được chọn không
if (!empty($_FILES["image"]["name"])) {
    // Xóa hình ảnh hiện có
    unlink($_POST['existing_image']);
    // Tiếp tục xử lý tải lên hình ảnh mới như trong mã gốc của bạn

    $target_dir = "../../image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra định dạng tệp hình ảnh
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo 'Only JPG, JPEG, PNG, GIF files are allowed';
        $upload_ok = 0;
    }

    // Kiểm tra trùng tên tệp hình ảnh
    if (file_exists($target_file)) {
        echo 'The file already exists. Please change your file!';
        $upload_ok = 0;
    }

    // Di chuyển tệp hình ảnh
    if ($upload_ok == 1) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $image = '../image/' . $_FILES["image"]["name"];
} else {
    // Không có tệp hình ảnh mới được chọn, giữ nguyên hình ảnh hiện có
    $image = $_POST['existing_image'];
}




$sql = "UPDATE product SET image = '$image',product_name = '$product_name',quantity = '$quantity',
    category_id = '$category_id',price = '$price',pro_paramater = '$pro_paramater', machine_series = '$machine_series'
    ,rope_material = '$rope_material',shell_material = '$shell_material',glass_material = '$glass_material',face_size = '$face_size'
    ,origin = '$origin',shape = '$shape',color = '$color', face_color = '$face_color',style = '$style'
    ,created_at = '$created_at',edited_at = '$edited_at',deleted_at = '$deleted_at' WHERE product_id = '$product_id'";


$query = mysqli_query($con, $sql);
$product_id = mysqli_insert_id($con);

if (isset($_FILES['images'])) {
    $upload_ok = 1;
    $target_dir = "../../img_products/";
    if ($upload_ok == 1 && isset($product_id)) {

        if (!empty($_FILES["images"]["name"][0])) {
            
            foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                
                $image_name = $_FILES["images"]["name"][$key];
                $target_file = $target_dir . basename($image_name);
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
                        mysqli_query($con, "INSERT INTO img_products (product_id, image) VALUES ('$product_id', '$target_file')");
                    } else {
                        echo 'Failed to upload the file!';
                        continue;
                    }
                }
            }
        }
    }
}

    header('Location: ../product.php');
}