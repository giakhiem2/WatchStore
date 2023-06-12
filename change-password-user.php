<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    // Xử lý thay đổi mật khẩu
    $notification = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $email = $_SESSION['SESSION_EMAIL'];
        $getUserQuery = "SELECT * FROM users WHERE email='$email'";
        $getUserResult = mysqli_query($conn, $getUserQuery);

        if (mysqli_num_rows($getUserResult) > 0) {
            $row = mysqli_fetch_assoc($getUserResult);
            $storedPassword = $row['password'];

            // Kiểm tra mật khẩu hiện tại
            if (password_verify($currentPassword, $storedPassword)) {
                // Kiểm tra mật khẩu mới và xác nhận mật khẩu
                if ($newPassword === $confirmPassword) {
                    // Hash mật khẩu mới
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                    $updatePasswordQuery = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";
                    $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);

                    if ($updatePasswordResult) {
                        $notification = 'Mật khẩu đã được thay đổi thành công.';
                    } else {
                        $notification = 'Có lỗi xảy ra khi thay đổi mật khẩu.';
                    }
                } else {
                    $notification = 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
                }
            } else {
                $notification = 'Mật khẩu hiện tại không chính xác.';
            }
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>
    <?php
        if (!empty($notification)) {
            echo "<p>$notification</p>";
        }
    ?>
    <form method="POST" action="">
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <input type="submit" value="Change Password">
    </form>
</body>

</html>