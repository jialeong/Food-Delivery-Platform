<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <meta name="author" content="CHIU SIEW CHIN">
    <link rel="stylesheet" href="assets/css/Food Delivery Platform Style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>

<body class="Background_Color">
    <form action="login.php" method="post">
        <div class="Top_Name"><b>USER LOGIN</b></div>

        <div class="User_Login_Container">
            <div class="Restaurant_Name">Wan Lai Food Stall</div>

            <div class="Welcome_Statement">
                <p class="text-primary">Welcome back, we are ready to serve you &#128521;</p>
            </div>

			<?php if (isset($_GET['error'])) { ?>
     			<p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
     		<?php } ?>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Your Email Address">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="user_password" name="user_password" placeholder="Enter Your Password">
            </div>

            <div class="Login_Button">
                <button class="btn btn-success" type="submit" id="user_btnLogin" onclick="validate()"
                    value="user_login">LOGIN</button>
            </div>

            <div class="Register_Account_Button">
                <button class="btn btn-primary"><a href="signup.php">Register New Account</a></button>
            </div>

            <div class="Forget_Password_Button">
                <button class="btn btn-danger"><a href="requestReset.php">Forgot The Password</a></button>
            </div>
        </div>
    </form>

    <form action="admin_login.php" method="post">
        <div class="Admin_Top_Name"><b>ADMIN LOGIN</b></div>

        <div class="Admin_Login_Container">
            <div class="Restaurant_Name">Wan Lai Food Stall</div>

            <div class="Welcome_Statement">
                <p class="text-primary">Welcome back admin, the system is ready to <br> serve &#128512;</p>
            </div>

            <?php if (isset($_GET['admin_error'])) { ?>
     			<p class="alert alert-danger"><?php echo $_GET['admin_error']; ?></p>
     		<?php } ?>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter Your Email Address">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="admin_password" name="admin_password" placeholder="Enter Your Password">
            </div>

            <div class="Login_Button">
                <button class="btn btn-success" type="submit" id="admin_btnLogin" onclick="admin_validate()"
                value="admin_login">LOGIN</button>
            </div>

            <div class="Admin_Forget_Password_Button">
                <button class="btn btn-danger"><a href="admin_requestReset.php"">Forgot The Password</a></button>
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
