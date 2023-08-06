<?php
require "./connection/connecdb.php";
session_start();
 $username = $_POST['username'];
 $password = $_POST['password'];
 $passwordenc = md5($password);
//  echo $firstName;
//  echo  $passwordenc;


 $sql = "SELECT * FROM customer WHERE username='$username' AND password='$passwordenc'";
 $result = $conn->query($sql);
 $row = mysqli_fetch_array($result);

 if ($result->num_rows > 0)	{
    if($row['type']=="user"){
    $_SESSION['username'] = $username;
    $_SESSION['cus_id'] = $row['cus_id'];
    echo "<script>window.open('./homepage.php','_self')</script>";
    }
 }
 if ($row['type']=="admin"  ){
    $_SESSION['username'] = $username;
    $_SESSION['cus_id'] = $row['cus_id'];
    echo "<script>window.open('./reserveListCustomer.php','_self')</script>";
 }else{
   echo "<script>alert('ชื่อผู้ใช้งานและรหัสผ่านไม่ถูกต้อง!')</script>";  
   echo "<script>window.open('./index.php','_self')</script>";  
 }
 ?>