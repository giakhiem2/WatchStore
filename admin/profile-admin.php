<?php
// Khai báo thông tin admin mẫu
$adminInfo = array(
    'username' => 'admin',
    'password' => 'admin123',
    'avatar' => 'default_avatar.jpg'
);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trang Thông Tin Admin</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #333;
    }

    h2 {
        color: #666;
    }

    img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 10px;
    }

    .btn-change-avatar {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-change-avatar:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <h1>Trang Thông Tin Admin</h1>

    <h2>Thông tin Admin:</h2>
    <img src="<?php echo $adminInfo['avatar']; ?>" alt="Avatar">
    <button class="btn-change-avatar" href="change-avt-admin.php">Change avatar</button>

    <p>Tên: <?php echo $adminInfo['username']; ?></p>
    <p>Mật khẩu: <?php echo $adminInfo['password']; ?></p>


</body>

</html>