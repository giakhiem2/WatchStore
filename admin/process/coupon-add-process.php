<?php
require_once('../../db/dbhelper.php');
$coupon_code = $coupon_type = $discount = $started = $ended = '';

if (isset($_POST['coupon_code'])) {
    $coupon_code = $_POST['coupon_code'];
}
if (isset($_POST['coupon_type'])) {
    $coupon_type = $_POST['coupon_type'];
}
if (isset($_POST['cart_min_value'])) {
    $cart_min_value = $_POST['cart_min_value'];
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
    $status = "expired";
}

$sql = "INSERT INTO coupon (coupon_code, coupon_type, cart_min_value, discount, quantity, started, ended, status) VALUES ('$coupon_code', '$coupon_type', '$cart_min_value', '$discount', '$quantity', '$started', '$ended', '$status')";
execute($sql);
header('Location: ../coupon.php');
?>