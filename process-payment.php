<?php
// Xử lý thông báo kết quả thanh toán từ cổng thanh toán (ví dụ: Momo)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra tính hợp lệ của thông báo (kiểm tra chữ ký, mã bảo mật, vv.)

    // Trích xuất thông tin đơn hàng từ thông báo
    $paymentMethod = $_POST['payment_method'];
    $orderNumber = $_POST['order_number'];
    $totalAmount = $_POST['total_amount'];
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $createdAt = date('Y-m-d H:i:s');

    // Kết nối tới cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Tạo câu truy vấn INSERT
    $sql = "INSERT INTO orders (payment_method, order_number, total_amount, customer_name, customer_email, created_at)
            VALUES ('$paymentMethod', '$orderNumber', $totalAmount, '$customerName', '$customerEmail', '$createdAt')";

    // Thực thi câu truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Thêm đơn hàng thành công";
    } else {
        echo "Lỗi khi thêm đơn hàng: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>