<!DOCTYPE html>
<html>

<head>
    <title>Register User Page</title>
    <meta name="author" content="CHIU SIEW CHIN">
    <link rel="stylesheet" href="assets/css/Food Delivery Platform Style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>

<body class="Background_Color">
    <form action="signup-check.php" method="post" name="regis_form" onsubmit="return(regis_validate());">
        <div class="Register_Login_Top_Name"><b>REGISTER USER</b></div>

        <div class="Register_User_Container">
            <div class="Restaurant_Name">Wan Lai Food Stall</div>

            <div class="Welcome_Statement">
                <p class="text-primary">Welcome, please enter data in the empty box below &#128512;</p>
            </div>

            <?php if (isset($_GET['error'])) { ?>
     		     <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
               <p class="alert alert-success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Email Address<start>*</start></label>
               <div class="col-md-9 p-0">

               <?php if (isset($_GET['user_email'])) { ?>
                    <input type="email"
                           class="form-control input-full"
                           id="regis_email"
                           name="user_email"
                           placeholder="Enter Your Email Here"
                           size="30px"
     		            value="<?php echo $_GET['user_email']; ?>"><br>
               <?php }else { ?>
                    <input type="email"
                           class="form-control input-full"
                           id="regis_email"
                           name="user_email"
                           placeholder="Enter Your Email Here"
                           size="30px"><br>
               <?php } ?>

               </div>
            </div>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Mobile Number<start>*</start></label>
               <div class="col-md-9 p-0">

               <?php if (isset($_GET['user_mobile_number'])) { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_mobile_phone"
                           name="user_mobile_number"
                           placeholder="Enter Your Mobile Number Here"
                           size="30px"
                           value="<?php echo $_GET['user_mobile_number']; ?>"><br>
               <?php }else { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_mobile_phone"
                           name="user_mobile_number"
                           placeholder="Enter Your Mobile Number Here"
                           size="30px">
               <?php } ?>

               </div>
            </div>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Nick Name<start>*</start></label>
               <div class="col-md-9 p-0">

               <?php if (isset($_GET['user_name'])) { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_nick_name"
                           name="user_name"
                           placeholder="Enter Your Nick Name Here"
                           size="30px"
                           value="<?php echo $_GET['user_name']; ?>"><br>
               <?php }else { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_nick_name"
                           name="user_name"
                           placeholder="Enter Your Nick Name Here"
                           size="30px"><br>
               <?php } ?>

               </div>
            </div>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Delivery Address<start>*</start></label>
               <div class="col-md-9 p-0">

               <?php if (isset($_GET['user_address'])) { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_delivery_address1"
                           name="user_address"
                           placeholder="Enter Your Delivery Address Here"
                           size="30px"
                           value="<?php echo $_GET['user_address']; ?>"><br>
               <?php }else { ?>
                    <input type="text"
                           class="form-control input-full"
                           id="regis_delivery_address1"
                           name="user_address"
                           placeholder="Enter Your Delivery Address Here"
                           size="30px">

                           <!-- <br>

                    <input type="text"
                           class="form-control input-full"
                           id="regis_delivery_address2"
                           name="user_address"
                           size="30px">

                           <br>

                    <input type="text"
                           class="form-control input-full"
                           id="regis_delivery_address3"
                           name="user_address"
                           size="30px"> -->
               <?php } ?>

               </div>
            </div>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Account Password<start>*</start></label>
               <div class="col-md-9 p-0">
                    <input type="text"
                           class="form-control input-full"
                           id="regis_password"
                           name="user_password"
                           placeholder="Create Your Own Password"
                           size="30px">
               </div>
            </div>

            <div class="form-group form-inline">
               <label for="inlineinput" class="col-md-3 col-form-label">Retype Password<start>*</start></label>
               <div class="col-md-9 p-0">
                    <input type="text"
                           class="form-control input-full"
                           id="regis_retype_password"
                           name="re_password"
                           placeholder="Retype Your Own Password"
                           size="30px">
               </div>
            </div>

            <div class="declaration">
               <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input"
                               type="checkbox"
                               value=""
                               id="regis_checkbox">
                        <span class="form-check-sign">
                            I certify that all information I have entered above is true.
                        </span>
                    </label>
               </div>
            </div>

            <div class="Register_Now_Button">
               <button class="btn btn-primary"
                        type="submit"
                        id="regis_btnRegister_Now">REGISTER NOW
               </button>
            </div>

            <div class="Regis_Cancel_Button">
               <button class="btn btn-danger"><a href="login_page.php">CANCEL</a></button>
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
<script src="assets/js/signup_validate.js"></script>

</html>