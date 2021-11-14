<?php
include "db_conn.php";
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "food delivery platform";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

$sql = "SELECT * FROM item";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $item_array[] = $row;
    }
    echo json_encode($item_array);
} else {
    echo "0 results";
}

//write to json file
$fp = fopen('itemdata.json', 'w');
fwrite($fp, json_encode($item_array));
fclose($fp);

$conn->close();
?>

