<?php


require_once('db/dbhelper.php');
$sql = "SELECT * FROM cart";
$cart = mysqli_query($con, $sql);
if (!$cart) {
  die("Error: " . mysqli_error($con));
}
$coupon_str = $_POST['coupon_str'];
$res = mysqli_query($con, "select * from coupon where coupon_code= '$coupon_str' and status = 'Valid'");
$count = mysqli_num_rows($res);
$jsonArr = array();
$totalPrice = 0;
while ($c = mysqli_fetch_assoc($cart)) {
  $product = $c['productid'];
  $quantity = $c['quantity'];
  $price = $c['price'];
  $totalPrice += $quantity * $price;
}
if ($count > 0) {
  $coupon_details = mysqli_fetch_assoc($res);
  $coupon_type = $coupon_details['coupon_type'];
 
  $discount = $coupon_details['discount'];
  $qty = $coupon_details['quantity'];
  $cart_min_value = $coupon_details['cart_min_value'];


  if ($cart_min_value > $totalPrice) {
    $jsonArr = array('is_error' => 'yes', 'result' => $totalPrice . "$",'dd' => 'Cart total value must be ' . $cart_min_value);
  } else {
    if ($coupon_type == 'Dollar') {
      $totalAmount = $totalPrice - $discount;

    } else {
      $totalAmount = $totalPrice - (($totalPrice * $discount) / 100);
    }
   
   $dd = $totalPrice - $totalAmount;
   
   // Gửi giá trị $dd về trang gọi ajax

   
    
    $jsonArr = array('is_error' => 'no', 'result' => $totalAmount . "$" ,  'dd' => "Discount: " . $dd ."$");
   
  }
}else{
  $jsonArr = array('is_error' => 'yes', 'result' => $totalPrice ."$",'dd' => 'Coupon Code not found!');
}


  echo json_encode($jsonArr);
