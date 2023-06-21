<?php
require_once('../../db/dbhelper.php');
$coupon_code = $discount = $started = $ended = '';

if (isset($_POST['coupon_code'])) {
    $coupon_code = $_POST['coupon_code'];
}
if (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}
if (isset($_POST['started'])) {
    $started = $_POST['started'];
}
if (isset($_POST['ended'])) {
    $ended = $_POST['ended'];
}
$current_date = date("Y-m-d");
if ($current_date >= $started && $current_date <= $ended) {
    $status = "Valid";
} else {
    $status = "Invalid";
}

$sql = "INSERT INTO coupon (coupon_code, discount, quantity, started, ended, status) VALUES ('$coupon_code', '$discount', '$quantity', '$started', '$ended', '$status')";
execute($sql);
header('Location: ../coupon.php');
?>