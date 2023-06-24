<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    //insert

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "nhanhoai2605@gmail.com"; //enter you email address   
    $mail->Password = 'csnnvpqdiddbhdbi'; //enter you email password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("nhanhoai2605@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    // Thực hiện lưu thông tin vào cơ sở dữ liệu
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'watchstore';
    
    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Chuẩn bị và thực thi câu lệnh INSERT
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, body) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $body);
    $stmt->execute();

    // Đóng câu lệnh và kết nối cơ sở dữ liệu
    $stmt->close();
    $conn->close();
}else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>