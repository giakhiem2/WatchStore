<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/flaticon.css">
    <link rel="stylesheet" href="./assets/css/slicknav.css">
    <link rel="stylesheet" href="./assets/css/animate.min.css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/slick.css">
    <link rel="stylesheet" href="./assets/css/nice-select.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    // Xử lý cập nhật thông tin người dùng
    $notification = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin từ biểu mẫu
        $name = $_POST['name'];
        $email = $_POST['email']; // Chỉnh sửa tại đây
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Kiểm tra xem email đã thay đổi hay chưa
        if ($email !== $_SESSION['SESSION_EMAIL']) {
            // Kiểm tra xem email mới đã tồn tại trong cơ sở dữ liệu chưa
            $emailExistsQuery = "SELECT * FROM users WHERE email='$email'";
            $emailExistsResult = mysqli_query($conn, $emailExistsQuery);
            if (mysqli_num_rows($emailExistsResult) > 0) {
                $notification = 'Email đã tồn tại trong hệ thống.';
            }
        }

        // Kiểm tra độ dài và định dạng số điện thoại
        if (strlen($phone) !== 10 || !preg_match('/^[0-9]+$/', $phone)) {
            $notification = 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số và không chứa chữ cái.';
        } else {
            // Tiến hành cập nhật thông tin người dùng
            $updateQuery = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE email='{$_SESSION['SESSION_EMAIL']}'";
            $result = mysqli_query($conn, $updateQuery);
            if ($result) {
                // Cập nhật thành công
                $_SESSION['SESSION_EMAIL'] = $email; // Cập nhật SESSION_EMAIL mới

                $notification = 'Thông tin người dùng đã được cập nhật thành công.';
            } else {
                // Xử lý lỗi cập nhật cơ sở dữ liệu
                $notification = "Có lỗi xảy ra khi cập nhật thông tin người dùng: " . mysqli_error($conn);
            }
        }
    }

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "<div style='max-width: 1170px; padding-top: 50px; margin: auto; display: flex; items-align: center'>";
        echo "<div style='width: 50%; margin: 40px auto; padding: 0 24px !important' class='login_part section_padding'>";
        echo "<div class='login_part_form' style='padding: 0 !important'>";
        echo '<div class="login_part_text text-center">
      <div class="login_part_text_iner">
          <h2>New to our Shop?</h2>
          <p>There are advances being made in science and technology
              everyday, and a good example of this is the</p>
          <a href="register.php" class="btn_3">Create an Account</a>
      </div>
  </div>';
        echo "</div>";
        echo "</div>";
        echo "<div style='width: 50%; margin: 40px auto'>";
        echo "<h2 style='padding: 0px 24px'>User Information</h2>";
        // Hiển thị thông báo
        if (!empty($notification)) {
            echo "<p>$notification</p>";
        }
        echo "<div class='login_part section_padding' style='padding: 0px 24px !important'>";
        echo "<div class='login_part_form' style='width: 100%; padding: 0px !important; height: 488px'>";
        echo "<div class='login_part_form_iner'>";
        echo "<form method='POST' action='' class='contact_form'>";
        echo "Name: <input type='text' name='name' class='form-control' value='" . $row['name'] . "' required><br>";
        echo "Email: <input type='email' name='email' class='form-control' value='" . $row['email'] . "' required><br>";
        echo "Phone: <input type='text' name='phone' class='form-control' value='" . $row['phone'] . "' required><br>";
        echo "Address: <input type='text' name='address' class='form-control' value='" . $row['address'] . "' required><br>";
        echo '<a href="change-password-user.php" style="display: block; text-align: center; margin-top: 10px" ">
        <div class="btn_3" style="width: 100%; margin-top: 40px">
    Change password</div>
    
        </a>';
        echo '<div class="creat_account d-flex align-items-center"></div>';
        echo '<button type="submit" value="submit" class="btn_3" style="width: 100%; margin-top: 40px">
    Update</button>';
    echo '<a href="logout.php" style="display: block; text-align: center; margin-top: 10px" onclick="onLogout()">
    <div class="btn_3" style="width: 100%; margin-top: 40px">
Logout</div>

    </a>';
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <script>
    function onLogout() {
        localStorage.setItem("avatar", "isLogin-false");
    }
    </script>
    <!-- Hiển thị nút "Quay về Checkout" -->
    <a href="checkout.php" style="display: block; text-align: center; margin-top: 10px">
        <div class="btn_3" style="width: 100%; margin-top: 40px">
            Quay về Checkout
        </div>
    </a>
</body>
