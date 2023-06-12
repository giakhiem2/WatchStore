<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once("config_vnpay.php");

// Tính tổng giá trị đơn hàng từ trang "checkout" và nhân với 23000
$totalAmount = 0;
foreach ($selectedProducts as $index => $selectedProduct) {
    $product = $selectedProduct['product'];
    $quantity = $selectedProduct['quantity'];
    $totalPrice = $product['price'] * $quantity;
    $totalAmount += $totalPrice;
}

$totalAmount *= 23000;


// Lưu tổng giá trị đơn hàng vào session
$_SESSION['totalAmount'] = $totalAmount;

$vnp_TxnRef = time(); // Mã đơn hàng (có thể tùy chỉnh theo yêu cầu)
$vnp_OrderInfo = 'thanh toan';
$vnp_OrderType = 'billpayment';
$vnp_Amount = $totalAmount;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
// Add Params of 2.0.1 Version
$vnp_ExpireDate = $expire;

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $vnp_ExpireDate
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

$returnData = array(
    'code' => '00',
    'message' => 'success',
    'data' => $vnp_Url
);

if (isset($_POST['redirect'])) {
    header('Location: ' . $vnp_Url);
    die();
} else {
    echo json_encode($returnData);
}
?>
