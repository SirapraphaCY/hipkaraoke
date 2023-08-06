<?php
    include "./connection/connecdb.php"; 
    // if(isset($_POST)) { 
        $room_id = $_GET['room_id'];
        // echo  $room_id;  

        $roomtype_id = $_POST['roomtype_id'];
        $room_name = $_POST['room_name'];
        $statusRoomid = $_POST['statusRoom_id']; 
       

         $sql = "UPDATE room_detail SET room_name = '$room_name' ,statusRoom_id = '$statusRoomid',  roomtype_id = '$roomtype_id'
         WHERE  room_id = '$room_id'";
       
        $query = mysqli_query($conn,$sql); 

        header('location:roomTypeAM.php');
    // }
?>