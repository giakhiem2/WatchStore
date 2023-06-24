<?php
require_once('../../db/dbhelper.php');

if(isset($_GET['id'])){
    $contact_id = $_GET['id'];

    //xóa file ảnh vật lí
    
    $sql = 'delete from contact where id = "'. $contact_id .'"';
    execute($sql);
    header('Location: ../mess.php');
}