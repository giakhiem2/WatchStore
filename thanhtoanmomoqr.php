<?php
header('Content-type: text/html; charset=utf-8');
session_start();

// Kiểm tra xem đã lưu trữ thông tin đơn hàng trong session hay chưa
if (isset($_SESSION['selectedProducts'])) {
    $selectedProducts = $_SESSION['selectedProducts'];
    // Lấy giá trị tổng giá tiền từ yêu cầu POST
$totalAmount = $_POST['totalAmount'];

    // Tính tổng giá trị đơn hàng
    $totalAmount = 0;
    foreach ($selectedProducts as $index => $selectedProduct) {
        $product = $selectedProduct['product'];
        $quantity = $selectedProduct['quantity'];
        $totalPrice = $product['price'] * $quantity * 23000;
        $totalAmount += $totalPrice;
    }
    
    // Lưu tổng giá trị đơn hàng vào session
    $_SESSION['totalAmount'] = $totalAmount;
} else {
    $totalAmount = 0;
}if (isset($_POST['totalAmount'])) {
    $totalAmount = $_POST['totalAmount'] * 23000;
} else {
    // Nếu không có giá trị totalAmount, chuyển hướng về trang checkout.php
    header('Location: checkout.php');
    exit();
}
// Lưu giá trị totalAmount vào session để sử dụng trong quá trình xử lý thanh toán
$_SESSION['totalAmount'] = $totalAmount;
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    // execute post
    $result = curl_exec($ch);
    // close connection
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo QR";
$orderId = time() . "";
$redirectUrl = "http://localhost/watchstore/confirmation.php";
$ipnUrl = "http://localhost/watchstore/admin/order.php";
$extraData = "";

$requestId = time() . "";
$requestType = "captureWallet";

// Tạo chữ ký cho MoMo
$rawHash = "accessKey=" . $accessKey . "&amount=" . $totalAmount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $totalAmount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);
// Gửi yêu cầu thanh toán MoMo và nhận kết quả
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);

// Kiểm tra xem có nhận được URL thanh toán từ MoMo hay không
if (isset($jsonResult['payUrl'])) {
    $payUrl = $jsonResult['payUrl'];

    // Chuyển hướng đến URL thanh toán của MoMo
    header('Location: ' . $payUrl);
    exit();
} else {
    // Xử lý khi không nhận được URL thanh toán từ MoMo
    header('Location: checkout.php');
    exit();
}
?>
