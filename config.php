<?php

$conn = mysqli_connect("localhost", "root", "", "watchstore");

if (!$conn){
    echo "Connection Failded";
}
?>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'watchstore';

// Tạo kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
}
?>