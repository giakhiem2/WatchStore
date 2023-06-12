<?php
require_once('../../db/dbhelper.php');
$image = $category_name = $created_at = $edited_at = $deleted_at ='';
if(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];
}
if(isset($_POST['category_name'])){
    $category_name = $_POST['category_name'];
}
if(isset($_POST['created_at']) && isset($_POST['edited_at']) && isset($_POST['deleted_at'])){
    $created_at = $_POST['created_at'];
    $edited_at = $_POST['edited_at'];
    $deleted_at = $_POST['deleted_at'];
    $currentDateTime = date('Y-m-d H:i:s');
    $created_at = $currentDateTime;
    $edited_at = $currentDateTime;
    $deleted_at = $currentDateTime;
}





if(isset($_FILES["image"])){
    $target_dir = "../../image/"; 
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $upload_ok = 1;
    $image_file_type = 
            strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //kiem tra dinh dang file anh
    if($image_file_type != "jpg" && $image_file_type != "png"
        && $image_file_type != "jpeg" && $image_file_type != "gif"){
            echo 'Only JPG, JPEG, PNG, GIF files are allowed';
            $upload_ok = 0; 
        }

    //kiem tra trung ten anh
    if(file_exists($target_file)){
        echo 'The file category_id already exits. Pls change your file category_id!';
        $upload_ok = 0;
    }

    //lay file anh
    if($upload_ok==1){
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        //echo 'upload successfully!';     
    }
    $image = '../image/'. $_FILES["image"]["name"];
    
}

$sql = 'insert into category (image, category_name, created_at, edited_at, deleted_at) values ("'.$image.'" ,"'.$category_name.'" 
,"'.$created_at.'" ,"'.$edited_at.'" ,"'.$deleted_at.'")';
execute($sql);
header('Location: ../category.php');
