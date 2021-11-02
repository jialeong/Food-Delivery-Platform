<?php
session_start();
include "db_conn.php";

if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $admin_email = validate($_POST['admin_email']);
    $admin_password = validate($_POST['admin_password']);

    if (empty($admin_email)) {
        header("Location: login_page.php?admin_error=Admin email address is required");
        exit();
    }else if (empty($admin_password)) {
        header("Location: login_page.php?admin_error=Admin password is required");
        exit();
    }else {
        $sql = "SELECT * FROM admin_login WHERE admin_email='$admin_email' AND admin_password='$admin_password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['admin_email'] === $admin_email && $row['admin_password'] === $admin_password) {
                $_SESSION['admin_email'] = $row['admin_email'];
                header("Location: admin_home.html");
                exit();
            }else {
                header("Location: login_page.php?admin_error=Incorrect email address or password");
                exit();
            }
        }else {
            header("Location: login_page.php?admin_error=Incorrect email address or password");
            exit();
        }
    }
}else {
    header("Location: login_page.php");
    exit();
}

?>