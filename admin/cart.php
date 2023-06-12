<?php
require_once('../db/dbhelper.php');
$sql = 'select * from cart';
$carts = executeResult($sql);
?>
<?php
session_start();

// Lấy thông tin từ trang "checkout"
$name = $_POST['last'];
$phoneNumber = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['add1'];

// Tạo một mảng chứa thông tin đơn hàng
$order = array(
  'name' => $name,
  'phoneNumber' => $phoneNumber,
  'email' => $email,
  'address' => $address
);

// Lưu thông tin đơn hàng vào session
$_SESSION['order'] = $order;
?>