<?php 

// $server = "localhost";
// $user = "hipkarao_hipkaraoke";
// $password = "edypXZ7Pr";
// $db_name = "hipkarao_hipkaraoke";
// $conn = new mysqli(@$server,$user,$password,$db_name);

// if($conn -> connect_errno){
//     printf("ไม่สารมารถเชื่อมต่อฐานข้อมุลได้",$conn->connect_error);
//     exit();
// }

// mysqli_set_charset($conn,'utf8');
// $conn = mysqli_connect("localhost","hipkarao_hipkaraoke","edypXZ7Pr","hipkarao_hipkaraoke");

// if(mysqli_connect_error($conn)){
//     echo 'Failed to connec to database: ' . mysqli_connect_error();

// }
// mysqli_query($conn, "SET NAMES 'utf8' ");




// $conn = mysqli_connect('localhost','root','','hipkarao_hipkaraoke');

// if(mysqli_connect_error($conn)){
//     echo 'Failed to connec to database: ' . mysqli_connect_error();

// }
// mysqli_query($conn, "SET NAMES 'utf8' ");
// date_default_timezone_set("Asia/Bangkok"); 

$server = "localhost";
$user = "root";
$password = "";
$db_name = "hipkarao_hipkaraoke";
$conn = new mysqli(@$server,$user,$password,$db_name);

if($conn -> connect_errno){
    printf("ไม่สารมารถเชื่อมต่อฐานข้อมุลได้",$conn->connect_error);
    exit();
}

mysqli_set_charset($conn,'utf8');


// $server = "localhost";
// $user = "hipkarao_hipkaraoke";
// $password = "edypXZ7Pr";
// $db_name = "hipkarao_hipkaraoke";
// $conn = new mysqli(@$server,$user,$password,$db_name);

// if($conn -> connect_errno){
//     printf("ไม่สารมารถเชื่อมต่อฐานข้อมุลได้",$conn->connect_error);
//     exit();
// }

// mysqli_set_charset($conn,'utf8');
