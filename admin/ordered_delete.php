<?php
include "database.php";

$connection = new mysqli("localhost", "root", "", "web_iphone_new");


if ($connection->connect_error) {
    die("Kết nối không thành công: " . $connection->connect_error);
}

$ordered_id = $_GET['ordered_id']; 
$query = "DELETE FROM tbl_ordered  WHERE ordered_id = '$ordered_id' "  ;


$result1 = $connection -> query($query);

header("Location: ordered_read.php")



   





?>