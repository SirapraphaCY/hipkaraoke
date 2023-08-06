<?php
require "./connection/connecdb.php";
$food_name = $_POST['food_name'];
$pd_price = $_POST['pd_price'];
$pd_qty = $_POST['pd_qty'];
$foodtype_id = $_POST['foodtype_id'];
//$picture = $_POST['picture'];

// date_default_timezone_get('Asia/Bangkok');
// $date = date("DMY");
$file = pathinfo(basename($_FILES['picture']['name']), PATHINFO_EXTENSION);
if ($file != "") {
    $newmane = '/' .uniqid().".". $file;
    $path = "./fileupload/imgfood";
    $path_copy = $path . "/" . $newmane;
    $uplold = move_uploaded_file($_FILES['picture']['tmp_name'], $path_copy);
    if ($uplold == FALSE) {
        echo "ไม่สามารถ upload ภาพได้";
        exit();
    }
    $pro_picture = $newmane;
    $picture = "./fileupload/imgfood" . $pro_picture;
}

$sql = "INSERT INTO food_detail(food_name, pd_price, pd_qty,foodtype_id, picture) 
VALUES ('" . $food_name . "','" . $pd_price . "','" . $pd_qty . "','" . $foodtype_id . "','" . $picture . "')";
$query = mysqli_query($conn, $sql);
header('location:foodAM.php');
?>