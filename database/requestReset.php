<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'db_conn.php';


if (isset($_POST["email"])) {

    $emailTo = $_POST["email"];

    $code = uniqid(true);
    $query = mysqli_query($conn, "INSERT INTO reset_password(code, email) VALUES ('$code', '$emailTo')");
    if (!$query) {
        exit("<h3>Error</h3>");
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'siewchinn1031@gmail.com';                     //SMTP username
        $mail->Password   = 'chiusiewchin7708801314520';                               //SMTP password
        $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('siewchinn1031@gmail.com', 'Wan Lai Food Stall');
        $mail->addAddress($emailTo);     //Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $back_loginPage = "login_page.php";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = "<h1>You requested a password reset</h1>
                            Please <a href='$url'>click here</a> to reset password";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<h3>Reset password link has been sent to your email /
        <a href='$back_loginPage'>Back to login page</a></h3>";
    } catch (Exception $e) {
        echo "<h3>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h3>";
    }
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password Page</title>
    <meta name="author" content="CHIU SIEW CHIN">
    <link rel="stylesheet" href="assets/css/Food Delivery Platform Style.css">
    <link rel="stylesheet" href="test_style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>

<body class="Background_Color">
    <form method="POST" name="forget_password_Form" onsubmit="return(ValidateEmail());">
        <div class="Forgot_Passowrd_Top_Name"><b>Forgot Password</b></div>

        <div class="Forgot_Passowrd_Container">
            <div class="Restaurant_Name">Wan Lai Food Stall</div>

            <div class="Welcome_Statement">
                <p class="text-primary">Please enter your registered email address. &#128521;</p>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="emailAddr" name="email" placeholder="Enter Your Email Address">
            </div>

            <!-- <div class="form-group">
                <label for="email">New Password</label>
                <input type="text" class="form-control" id="reset_password" placeholder="Enter Your New Password">
            </div> -->

            <div class="Forgot_Passowrd_ResetNow_Button">
                <button class="btn btn-success" type="submit" name="submit" value="Reset email">Reset Now</button>
            </div>

            <div class="Forgot_Passowrd_LoginNow_Button">
                <button class="btn btn-primary"><a href="login_page.php">Back to Login</a></button>
            </div>
        </div>
    </form>
</body>

<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- <script src="assets/js/FoodDeliveryPlatform_JavaScript.js"></script> -->

</html>