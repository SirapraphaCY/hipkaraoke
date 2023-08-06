<?php
include "./connection/connecdb.php";
$food_detail_id = $_GET['food_detail_id'];
$food_name = $_POST['food_name'];
$pd_price = $_POST['pd_price'];
$pd_qty = $_POST['pd_qty'];
$foodtype_id = $_POST['foodtype_id'];


$fileName = $_FILES['picture']['name'];
$fileTmpname = $_FILES['picture']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = './fileupload/imgfood/' . $newFilename;

move_uploaded_file($fileTmpname, $fileDes);
$picture    = $fileDes;


if ($_FILES['picture']['error']) {
    $sql = "UPDATE food_detail SET food_name = '" . $food_name . "' , pd_price = '" . $pd_price . "' , pd_qty = '" . $pd_qty . "' ,foodtype_id = '" . $foodtype_id . "' 
    where food_detail_id = '" . $food_detail_id . "'";

    $query = mysqli_query($conn, $sql);
    echo "ไม่สามารถ UPLOAD ภาพได้";
    header('location:foodAM.php');

} else {

    $sql = "update food_detail set food_name = '" . $food_name . "' , pd_price = '" . $pd_price . "' , pd_qty = '" . $pd_qty . "' ,foodtype_id = '" . $foodtype_id . "' ,picture = '" . $picture . "' 
    where food_detail_id = '" . $food_detail_id . "'";
    $query = mysqli_query($conn, $sql);
    $msg = "บันทึกข้อมูลสำเร็จ";
    header('location:foodAM.php');
}



