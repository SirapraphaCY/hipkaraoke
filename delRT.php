<?php
include "./connection/connecdb.php";
// $sql = mysqli_query($conn, "Select * FROM room_detail WHERE room_id=" . $_GET['room_id'] . "");
// while ($row = mysqli_fetch_array($sql)) {
//     $roomid = $row['room_id'];
// }
$roomtype_id = $_GET['roomtype_id'];
// echo $roomtype_id;
// exit;
$sql = "DELETE FROM room_type_detail WHERE roomtype_id = '" . $roomtype_id . "'";

$query = mysqli_query($conn, $sql);
header('location:Manageroom_types.php');


?>
