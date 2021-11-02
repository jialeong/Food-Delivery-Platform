<?php
include("db_conn.php");

if (!isset($_GET["code"])) {
    exit("<h3>Can't found page...</h3>");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($conn, "SELECT email FROM reset_password WHERE code='$code'");
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("<h3>Can't found page...</h3>");
}

if (isset($_POST["password"])) {
    $new_password = $_POST["password"];

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $query = mysqli_query($conn, "UPDATE customer_data SET cust_password='$new_password' WHERE cust_email='$email'");

    if ($query) {
        $query = mysqli_query($conn, "DELETE FROM reset_password WHERE code='$code'");
        exit("<h3>Congratulations! The password has been updated.</h3>");
    }
    else {
        exit("<h3>Something went wrong...</h3>");
    }
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
                <p class="text-primary">Please create your new password. &#128521;</p>
            </div>

            <!-- <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="emailAddr" name="email" placeholder="Enter Your Email Address">
            </div> -->

            <div class="form-group">
                <label for="email">New Password</label>
                <input type="text" class="form-control" id="reset_password" name="password" placeholder="Enter Your New Password">
            </div>

            <div class="Forgot_Passowrd_ResetNow_Button">
                <button class="btn btn-success" type="submit" name="submit" value="Reset password">Reset Password</button>
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