<?php
require_once('../../db/dbhelper.php');

if(isset($_GET['admin_id'])){
    $admin_id = $_GET['admin_id'];

    //xóa file ảnh vật lí
    $sql2 = 'select * from admin where admin_id=' . $admin_id;
    $admins = executeSingleResult($sql2);
    unlink('../'. $admins['image']);
    $sql = 'delete from admin where admin_id = "'. $admin_id .'"';
    execute($sql);
    header('Location: ../account.php');
}
