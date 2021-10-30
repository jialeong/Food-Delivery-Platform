<?php
session_start();
include "db_conn.php";

if (isset($_POST['user_email']) && isset($_POST['user_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_email = validate($_POST['user_email']);
	$user_password = validate($_POST['user_password']);

	if (empty($user_email)) {
		header("Location: login_page.php?error=User Name is required");
	    exit();
	}else if(empty($user_password)){
        header("Location: login_page.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM customer_data WHERE cust_email='$user_email' AND cust_password='$user_password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['cust_email'] === $user_email && $row['cust_password'] === $user_password) {
            	$_SESSION['cust_email'] = $row['cust_email'];
            	$_SESSION['cust_name'] = $row['cust_name'];
            	$_SESSION['cust_id'] = $row['cust_id'];
            	header("Location: home_page.php");
		        exit();
            }else{
				header("Location: login_page.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login_page.php?error=Incorect User name or password");
	        exit();
		}
	}

}else{
	header("Location: login_page.php");
	exit();
}