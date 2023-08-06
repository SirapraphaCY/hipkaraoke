<?php 
    include "./connection/connecdb.php";
        $food_detail_id = $_GET['room_detail'];
        $f
         = $_POST['room_name'];
        // $price = $_POST['price'];
        $roomtype_id = $_POST['roomtype_id'];
        // echo $food_name;
        // echo $price;
        // echo $numfood_items;
        // echo $foodtype_id;
        $sql = "update room_detail set room_name = '".$room_name. "', price = '" .$price. "' , num_people = '" .$num_people. "',roomtype_id = '" .$roomtype_id. "'  where room_detail_id = '".$room_detail_id. "'";
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
?>