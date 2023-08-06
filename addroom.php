<?php 
    require "./connection/connecdb.php";
        $room_name = $_POST['room_name'];
        // $detail = $_POST['detail'];
        // $price = $_POST['price'];
        $roomtype_id = $_POST['roomtype_id'];
        // $statusRoomid = $_POST['statusRoomid'];

        // echo $food_name;
        // echo $price;
        // echo $numfood_items;
        // echo $foodtype_id;
        $sql = "INSERT INTO room_detail(room_name, roomtype_id) VALUES ('".$room_name. "','".$roomtype_id. "')";
        $query = mysqli_query($conn,$sql);
        header('location:roomTypeAM.php');
        // if($query){
        //     $msg = "บันทึกข้อมูลสำเร็จ";
        //     echo $msg;
        //     echo "<br/><a href='./foodAM.php'>กลับ</a>";
           
        // }else{
        //     $msg = "ไม่สามารถป้อนข้อมูลได้ [".'' .$query.' '."]"; 
        //     echo $msg; 
        //     echo "<a href='./addfoodAM.php'></a>";
        // }