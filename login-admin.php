<?php
require_once 'db/dbhelper.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trang Đăng nhập</title>
</head>

<body>
    <?php
  // Kết nối tới cơ sở dữ liệu
  // $servername = 'localhost';
  // $username = 'root';
  // $password = '';
  // $dbname = 'watchstore';

  // $conn = new mysqli($servername, $username, $password, $dbname);

  // // Kiểm tra kết nối
  // if ($conn->connect_error) {
  //   die("Kết nối không thành công: " . $conn->connect_error);
  // }

  // Xử lý đăng nhập khi người dùng ấn nút "Đăng nhập"
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra username và password trong cơ sở dữ liệu
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    // $result = $conn->query($sql);
    $check = executeSingleResult($sql);
    if (isset($check)) {
      $_SESSION['admin_logged_in'] = $check;
      header('Location: admin/index.php');
    }

    // if ($result->num_rows > 0) {
    //   header('Location: admin/index.php');
    // }
  }
  // Đóng kết nối

  ?>

    <h2>Đăng nhập admin</h2>
    <form method="POST" action="">
        <label for="username">Tên người dùng:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Đăng nhập">
    </form>
</body>

</html>