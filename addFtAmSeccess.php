<?php 
    require "./connection/connecdb.php";
    if(isset($_POST)) {
        $type_name = $_POST['type_name'];

        // echo $type_name;
        // exit;
    
        $sql = "INSERT INTO food_type (foodtype_id, type_names) VALUES ('$foodtype_id', '$type_name')"; 

        $query = mysqli_query($conn,$sql);
    }
        header('location:foodTypeAM.php');
?>