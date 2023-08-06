<?php 
    include "./connection/connecdb.php"; 
    // if(isset($_POST)) {
        // $foodtype_id = $_GET['foodtype_id'];
        // $room_name = $_GET['room_id'];
        $room_id = $_GET['room_id'];
        $roomtype_id = $_POST['room_type'];

        // echo $room_id;
        // echo $roomtype_id;
        // exit;
        // echo $room_name;
        // exit;

        // $room_name = $_POST['room_name'];

       
       
        // echo $id;
       
        // echo $type_name;
        // exit;
        // $room = "SELECT * FROM room_detail WHERE roomtype_id = $room_name AND statusRoom_id = 0
        // ORDER BY RAND()
        // LIMIT 1";
        // $ranroom = mysqli_query($conn, $room);

        

        // $sql = "UPDATE room_detail SET room_name = '$room_name' 
        // WHERE  room_id = '$room_name'";
        // $query = mysqli_query($conn, $sql);

        
        // echo $room_name; 
        // '<br>';  
        // echo  $sql;
        // exit;
        

        // -- (cus_id,booking_id,date,timeplays, num,note,room_typeid,room_id,hours) VALUES ('" . $cus_id . "','" . $booking_id . "','" . $bookingdate . "','" . $buff . "','" . $num_people . "','" . $note . "','" . $detail . "','" . $mn . "','" . $size . "')";


        $sql = "UPDATE booking_detail SET room_id = '$roomtype_id' WHERE bookDE_id = '$room_id' ";
        $query = mysqli_query($conn,$sql); 
        // $query = mysqli_query($conn,$sql1);
        header("location:bookingpayment.php?pd_id=$room_id");
    // }

   
?>