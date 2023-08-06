<?php
    require "./connection/connecdb.php"; 
        $newsId = $_GET['newsid'];
        // echo $news;
        $sql = "DELETE FROM news WHERE newsid = '" .$newsId."'";
      
        $query = mysqli_query($conn, $sql); 
        header('location:news.php');
        // if($query){
        //     $msg = "ลบข้อมูลสำเร็จ"; 
        //     echo $msg; 
        //     echo "<br/><a href='./foodAM.php'>กลับ</a>";
        // }else{
        //     $msg = "ไม่สามารถป้อนข้อมูลได้ [".'' .$query.' '."]"; 
        //     echo $msg; 
        //     echo "<a href='./foodAM.php'>กลับ</a>";
        // }
