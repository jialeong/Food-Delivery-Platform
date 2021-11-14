<?php

include "db_conn.php";

if (isset($_POST['upload'])) { /* INSERT MENU DATA */
//    //connect to the database
//    $db = mysqli_connect("localhost", "root", "", "food delivery platform");

    $msg = '';

    // Get menu data
    $image = $_FILES['itemImage']['name'];
    $name = filter_input(INPUT_POST, 'itemName');
    $type = filter_input(INPUT_POST, 'itemType');
    $price = filter_input(INPUT_POST, 'itemPr');

    // path to store the uploaded image
    $target = "assets/img/food-and-beverage/" . basename($image);

    $sql = "INSERT INTO item(item_img, item_name, item_type, item_pr) VALUES ('$image', '$name', '$type', '$price')";

    // move the uploaded image into folder: images
    if (move_uploaded_file($_FILES['itemImage']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        echo '<script>alert("' . $msg . '");</script>';
    } else {
        $msg = "There was a problem uploading image";
        echo '<script>alert("' . $msg . '");</script>';
    }

    //stores the submitted data into database table: images
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Menu has been INSERTED.");'
        . 'window.history.back();</script>';
    }
} elseif (isset($_POST['delete'])) { /* DELETE MENU DATA */
    $id = filter_input(INPUT_POST, 'itemId');
    $sql = "SELECT item_img FROM item WHERE item_id='$id'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        /* use below 'echo' to check in console */
        //echo '<script>console.log("'.$row['item_img'].'");</script>';

        $path = "assets/img/food-and-beverage/" . $row['item_img'] . "";
        if (!unlink($path)) {
            echo '<script>alert(Error in image deletion);</script>';
        } else {
            $sql = "DELETE FROM item WHERE item_id = '" . $id . "'";

            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Menu has been DELETED.");'
                . 'window.history.back();</script>';
            } else {
                echo '<script>alert("Error: unable to delete menu.");'
                . 'window.history.back();</script>';
            }
        }
    }
} elseif (isset($_POST['update'])) { /* UPDATE MENU DATA */
//    $response = false;
    $id = filter_input(INPUT_POST, 'itemId');

    // Get updated menu data
    $image = $_FILES['itemImage']['name'];
    $name = filter_input(INPUT_POST, 'itemName');
    $type = filter_input(INPUT_POST, 'itemType');
    $price = filter_input(INPUT_POST, 'itemPr');

    // path to store the uploaded image
    $target = "assets/img/food-and-beverage/" . basename($image);

    /* DELETE IMAGE DIRECTORY */
    // get image from 'item' table 
    $sql = "SELECT item_img FROM item WHERE item_id='" . $id . "'";
    $result = $conn->query($sql);

    // check img upload successfully
    $new_img = '';

    if ($image != "") {
        if (is_file($target)) {
            echo '<script>alert("The image uploaded is already existed in the'
            . ' system and may be used by other menu.\n\nIt is recommend to'
            . 'use another image.");history.go(-1);</script>';
            $new_img == 'deny';
        } else {
            if ($row = $result->fetch_assoc()) {
                $path = "assets/img/food-and-beverage/" . $row['item_img'] . "";

                if (!unlink($path)) {
                    echo '<script>alert(Error in image deletion);'
                    . 'history.go(-1);</script>';
                    $new_img = 'deny';
                } else {
                    // move the uploaded image into folder: images
                    if (move_uploaded_file($_FILES['itemImage']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                        echo '<script>alert("' . $msg . '");</script>';

                        $sql = "UPDATE item SET "
                                . "item_img = '$image' "
                                . "WHERE item_id='$id'";

                        if (mysqli_query($conn, $sql)) {
                            $new_img = 'accept';
                        } else {
                            echo '<script>alert("Error: unable to insert image.");'
                            . 'history.go(-1);</script>';
                            $new_img = 'deny';
                        }
                    } else {
                        $msg = "There was a problem uploading image";
                        echo '<script>alert("' . $msg . '");'
                        . 'history.go(-1);</script>';
                        $new_img = 'deny';
                    }
                }
            }
        }
    } else {
        $new_img = 'empty';
    }

    if ($new_img == 'empty' or $new_img == 'accept') {
        $sql = "UPDATE item SET "
                . "item_name = '$name', "
                . "item_type = '$type',  "
                . "item_pr = '$price'"
                . "WHERE item_id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Menu has been UPDATED.");'
            . 'history.go(-1);</script>';
        } else {
            echo '<script>alert("Error: unable to delete menu.");'
            . 'history.go(-1);</script>';
        }
    }
}
// close 
mysqli_close($conn);
?>


