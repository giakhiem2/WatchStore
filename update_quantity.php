<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['index']) && isset($_POST['newQuantity'])) {
    $index = $_POST['index'];
    $newQuantity = $_POST['newQuantity'];

    // Cập nhật số lượng sản phẩm trong session
    if (isset($_SESSION['selectedProducts'][$index])) {
      $_SESSION['selectedProducts'][$index]['quantity'] = $newQuantity;
    }

    // Gửi phản hồi về client (nếu cần)
    echo 'Success';
  }
}
?>
