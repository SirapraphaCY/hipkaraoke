<?php 
    include "./connection/connecdb.php"; 
    // if(isset($_POST)) {
        // $foodtype_id = $_GET['foodtype_id'];
        $id = $_GET['foodtype_id'];
        $type_name = $_POST['type_name'];
       
        // echo $id;
       
        // echo $type_name;
        // exit;

        $sql = "UPDATE food_type SET type_names = '".$type_name."' 
        WHERE foodtype_id =  '".$id."'" ;
        // $sql = "UPDATE food_type SET type_name = '$type_name' WHERE foodtype_id = '$type_name' ";
        // $sql ="UPDATE `food_type` SET type_name='$type_name' WHERE foodtype_id = '$type_name'";
        $query = mysqli_query($conn,$sql); 
        // $query = mysqli_query($conn,$sql1);
        header('location:foodTypeAM.php');
    // }

   
?>