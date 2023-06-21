<?php
// Kiểm tra xem người dùng đã đăng nhập chưa và có phải là người quản trị hay không
// Code kiểm tra đăng nhập và quyền truy cập chưa được bao gồm ở đây

// Lấy thông tin người quản trị từ cơ sở dữ liệu hoặc từ bất kỳ nguồn dữ liệu nào khác
$admin = [
    'id' => 1,
    'username' => 'admin',
    'avatar' => 'path_to_avatar.jpg'
];

// Xử lý khi người dùng cập nhật avatar mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $targetDirectory = 'path_to_upload_directory/'; // Đường dẫn thư mục upload
    $targetFile = $targetDirectory . basename($_FILES['avatar']['name']);

    // Kiểm tra kiểu file và kích thước
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB

    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo 'Chỉ được phép tải lên các file JPG, JPEG, PNG.';
    } elseif ($_FILES['avatar']['size'] > $maxFileSize) {
        echo 'File tải lên vượt quá kích thước tối đa cho phép.';
    } else {
        // Di chuyển file tải lên vào thư mục đích
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
            // Lưu đường dẫn avatar mới vào cơ sở dữ liệu hoặc bất kỳ nơi nào khác
            $admin['avatar'] = $targetFile;
            echo 'Avatar đã được cập nhật thành công.';
        } else {
            echo 'Có lỗi xảy ra khi tải lên file.';
        }
    }
}
?>

<!-- Hiển thị hồ sơ người quản trị và biểu mẫu thay đổi avatar -->
<!DOCTYPE html>
<html>

<head>
    <title>Admin Profile</title>
</head>

<body>
    <h1>Admin Profile</h1>

    <img src="<?php echo $admin['avatar']; ?>" alt="Avatar" width="200" height="200">

    <form method="POST" enctype="multipart/form-data">
        <label for="avatar">Chọn avatar mới:</label>
        <input type="file" name="avatar" id="avatar" accept="image/*"><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>

</html>