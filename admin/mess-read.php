<?php
require_once('../db/dbhelper.php');
require_once('../PHPMailer/PHPMailer.php');
require_once('../PHPMailer/SMTP.php');

require_once('../db/dbhelper.php');


if (isset($_GET['id'])) {
    $contact_id = $_GET['id'];

    $sql = 'SELECT * FROM contact WHERE id = '. $contact_id;
    $contacts = executeSingleResult($sql);
    
    $name_contact = $contacts['name'];
    $email_contact = $contacts['email'];
    $subject = $contacts['subject'];
    $body = $contacts['body'];
    $time = $contacts['time'];
}


// ...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the reply message and subject from the form
    $replyMessage = $_POST['reply_message'];
    $replySubject = $_POST['reply_subject'];

    // Create a new PHPMailer instance
    $mailer = new PHPMailer\PHPMailer\PHPMailer();

    // Set up SMTP configuration
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';  // Replace with your SMTP host
    $mailer->SMTPAuth = true;
    $mailer->Username = 'nhanhoai2605@gmail.com';  // Replace with your SMTP username
    $mailer->Password = 'csnnvpqdiddbhdbi';  // Replace with your SMTP password
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    // Set up sender and recipient
    $mailer->setFrom('nhanhoai2605@gmail.com', 'WatchStore');  // Replace with the sender's email and name
    $mailer->addAddress($email_contact, $name_contact);  // Use the recipient's email and name from the contact form

    // Set email subject and body
    $mailer->Subject = $replySubject;
    $mailer->Body = $replyMessage;

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Bigdeal - Premium Admin Template</title>
    <!-- //hide password -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
    <style>
    /* hide passowrd */
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        padding-top: 50px;
        margin: auto;
    }
    </style>
</head>

<body>


    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <?php include('part/headerBackend.php'); ?>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            <?php include('part/menu-left.php'); ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Time:</label>
                        <?php echo $time?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Name:</label><br> <?php echo $name_contact?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email:</label><br> <?php echo $email_contact?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Subject</label><br> <?php echo $subject?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Message</label><br> <?php echo $body?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Reply Subject</label>
                        <input type="text" class="form-control" name="reply_subject">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Reply Message</label>
                        <textarea class="form-control" name="reply_message" rows="5"></textarea>

                    </div>
                    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($mailer->send()) {
            // Email sent successfully
            echo '<div class="alert alert-info" role="alert">Reply sent successfully</div>';
        } else {
            // Failed to send email
            echo '<div class="alert alert-danger" role="alert">Error: ' . $mailer->ErrorInfo . '</div>';
        }
    }
?>
                    <button type="submit" class="btn btn-primary">Reply</button>

                </form>
            </div>
            </form>

        </div>

        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2019 © Bigdeal All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->

    </div>

    </div>

    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="../assets/js/sidebar-menu.js"></script>

    <!--Customizer admin-->
    <script src="../assets/js/admin-customizer.js"></script>

    <!-- Jsgrid js-->
    <script src="../assets/js/jsgrid/jsgrid.min.js"></script>
    <script src="../assets/js/jsgrid/griddata-manage-product.js"></script>
    <script src="../assets/js/jsgrid/jsgrid-manage-product.js"></script>

    <!--right sidebar js-->
    <script src="../assets/js/chat-menu.js"></script>

    <!--script admin-->
    <script src="../assets/js/admin-script.js"></script>
    <script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    function onLogin() {
        localStorage.setItem("avatar", "isLogin-true")
    }
    </script>
</body>

</html>