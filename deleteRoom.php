<?php
include "./connection/connecdb.php";
// $sql = mysqli_query($conn, "Select * FROM room_detail WHERE room_id=" . $_GET['room_id'] . "");
// while ($row = mysqli_fetch_array($sql)) {
//     $roomid = $row['room_id'];
// }
$room_id = $_GET['room_id'];
$sql = "DELETE FROM room_detail WHERE room_id = '" . $room_id . "'";

// echo $room_id;
// exit;

$query = mysqli_query($conn, $sql);
header('location:roomTypeAM.php');

// echo "ooo";
// echo "<script>window.alert('ลบสำเร็จ')</scritp>";
// echo "<script>window.location='roomTypeAM.php'</scritp>";

?>