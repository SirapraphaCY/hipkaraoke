<?php
include "./connection/connecdb.php";

$id = $_GET['foodtype_id'];
$sql = "DELETE FROM food_type WHERE foodtype_id = '".$id."'";
$query = mysqli_query($conn, $sql);
// echo $query;
// echo $sql;
// exit;
header('location:foodTypeAM.php');

?>
