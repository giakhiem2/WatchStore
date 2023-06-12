<?php
require_once('../../db/dbhelper.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    //xóa file ảnh vật lí
    $sql2 = 'select * from product where product_id=' . $product_id;
    $products = executeSingleResult($sql2);
    unlink('../' . $products['image']);
    
    if ($products) {
        // Lấy các URL hình ảnh từ bảng 'img_products'
        $sql = "SELECT image FROM img_products WHERE product_id = '$product_id'";
        $images = executeResult($sql);
        
        // Duyệt qua các hình ảnh và xóa các tệp vật lý
        foreach ($images as $image) {
            $image_dir = "../img_products";
            $image_url = $image_dir . "/" . $image['image'];
            
            // Xóa tệp hình ảnh vật lý
            if (file_exists($image_url)) {
                unlink($image_url);
            }
        }
    


    $sql = 'delete from product where product_id = "' . $product_id . '"';
    execute($sql);
    $sql = 'DELETE FROM img_products WHERE product_id = "' . $product_id . '"';
    execute($sql);
    header('Location: ../product.php');
}
}