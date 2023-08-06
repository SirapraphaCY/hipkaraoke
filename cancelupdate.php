<?php 
include "./connection/connecdb.php";

$bookDEcorect = $_GET['bookDE_id'];
// echo $bookDEcorect;

$sqlstatus = "UPDATE booking_detail SET statusRoomid = '0'   WHERE 	bookDE_id  = '" . $bookDEcorect . "' ";
$querystatus = mysqli_query($conn, $sqlstatus);

// $sqlstatus1 = "UPDATE booking_detail SET statusRoomid = '1'   WHERE 	bookDE_id  = '" . $bookDEcorect . "' ";
// $querystatus = mysqli_query($conn, $sqlstatus1);

header('location:reserveListCustomer.php');

?>