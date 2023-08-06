<?php
    require "./connection/connecdb.php"; 

        $foodId = $_GET['food_detail_id'];
        // echo $_GET['food'];
        $sql = "DELETE FROM food_detail WHERE food_detail_id = '" . $foodId ."'";
      
        $query = mysqli_query($conn, $sql); 
        header('location:foodAM.php');
        // if($query){
        //     $msg = "ลบข้อมูลสำเร็จ"; 
        //     echo $msg; 
        //     echo "<br/><a href='./foodAM.php'>กลับ</a>";
        // }else{
        //     $msg = "ไม่สามารถป้อนข้อมูลได้ [".'' .$query.' '."]"; 
        //     echo $msg; 
        //     echo "<a href='./foodAM.php'>กลับ</a>";
        // }
    
?>