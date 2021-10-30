<?php
session_start();
include "db_conn.php";

if (isset($_POST['user_email']) && isset($_POST['user_mobile_number'])
    && isset($_POST['user_name']) && isset($_POST['user_address'])
	&& isset($_POST['user_password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$User_email = validate($_POST['user_email']);
	$User_mobile_number = validate($_POST['user_mobile_number']);

	$User_name = validate($_POST['user_name']);
	$User_address = validate($_POST['user_address']);

	$User_password = validate($_POST['user_password']);
	$Re_password = validate($_POST['re_password']);

	$user_data = 'Email Address ='. $User_email. ' & Nick Name ='. $User_name;

	//echo $user_data;


	// Validation Code
	if (empty($User_email)) {
		header("Location: signup.php?error=Email address is required&$user_data");
	    exit();
	}
	else if(empty($User_mobile_number)){
        header("Location: signup.php?error=Mobile number is required&$user_data");
	    exit();
	}
	else if(empty($User_name)){
        header("Location: signup.php?error=Nick name is required&$user_data");
	    exit();
	}
	else if(empty($User_address)){
        header("Location: signup.php?error=Delivery address is required&$user_data");
	    exit();
	}
	else if(empty($User_password)){
        header("Location: signup.php?error=Account password is required&$user_data");
	    exit();
	}else if(empty($Re_password)){
        header("Location: signup.php?error=Retype password is required&$user_data");
	    exit();
	}

	else if($User_password !== $Re_password){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{
		$sql1 = "SELECT * FROM customer_data WHERE cust_email='$User_email' ";
		$result1 = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($result1) > 0) {
			header("Location: signup.php?error=The email address is taken try another&$user_data");
	        exit();
		}else {
			$sql2 = "INSERT INTO customer_data(cust_name, cust_email, cust_phoneNo, cust_address, cust_password) VALUES('$User_name', '$User_email', '$User_mobile_number', '$User_address', '$User_password')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: signup.php?success=Your account has been created successfully");
			  exit();
			}else {
					header("Location: signup.php?error=unknown error occurred&$user_data");
				 exit();
			}
		}
	}

}else{
	header("Location: signup.php");
	exit();
}