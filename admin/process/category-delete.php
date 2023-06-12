<?php
require_once('../../db/dbhelper.php');

if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];

    //xóa file ảnh vật lí
    $sql2 = 'select * from category where category_id=' . $category_id;
    $categorys = executeSingleResult($sql2);
    unlink('../'. $categorys['image']);
    $sql = 'delete from category where category_id = "'. $category_id .'"';
    execute($sql);
    header('Location: ../category.php');
}
?>