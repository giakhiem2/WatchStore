<?php
require_once('../../db/dbhelper.php');



if (isset($_POST['admin_id']) && isset($_POST['username']) && isset($_POST['password'])) {
    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Kiểm tra xem có tệp hình ảnh mới được chọn không
    if (!empty($_FILES["image"]["name"])) {
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
            echo 'The file category_id already exits. Please change your file category_id!';
            $upload_ok = 0;
        }

        // Di chuyển tệp hình ảnh
        if ($upload_ok == 1) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }

        $image = '../image/' . $_FILES["image"]["name"];
    }// Kiểm tra xem có tệp hình ảnh mới được chọn không
    if (!empty($_FILES["image"]["name"])) {
        // Xóa hình ảnh hiện có
        unlink($_POST['existing_image']);

        // Tiếp tục xử lý tải lên hình ảnh mới như trong mã gốc của bạn
    } else {
        // Không có tệp hình ảnh mới được chọn, giữ nguyên hình ảnh hiện có
        $image = $_POST['existing_image'];
    }


    $sql = 'UPDATE admin SET username = "' . $username . '", password = "' . $password . '", image = "' . $image . '" WHERE admin_id = ' . $admin_id;

    execute($sql);
    header('Location: ../account.php');
}