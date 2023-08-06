<?php
include "./connection/connecdb.php";
$bank_id = $_GET['bank_id'];
$bank_name_id = $_POST['bank_name_id'];
// $bank_name = $_POST['bank_name'];
$bank_account = $_POST['bank_account'];
$numbank = $_POST['numbank'];
// $bank_img = $_POST['bank_img'];

// echo $bank_id;
// echo $bank_account;
// exit;
// $file = pathinfo(basename($_FILES['bank_img']['name']), PATHINFO_EXTENSION);
// if ($file != "") {
//     $newmane = '/' . uniqid() . "." . $file;
//     $path = "fileupload/imgbank";
//     $path_copy = $path . "/" . $newmane;
//     $uplold = move_uploaded_file($_FILES['bank_img']['tmp_name'], $path_copy);
//     if ($uplold == FALSE) {
//         echo "ไม่สามารถ upload ภาพได้";
//         exit();
//     }
//     $pro_picture = $newmane;
//     $bank_img = "fileupload/imgbank" . $pro_picture;
// }
$fileName = $_FILES['bank_img']['name'];
$fileTmpname = $_FILES['bank_img']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = './fileupload/imgbank/' . $newFilename;

move_uploaded_file($fileTmpname, $fileDes);
$bank_img    = $fileDes;


if ($_FILES['bank_img']['error']) {
    $sql = "UPDATE bank SET numbank = '". $numbank. "', bank_account = '". $bank_account."',  
        bank_img = '". $bank_img. "' where bank_id = '".$bank_id."'";

    $query = mysqli_query($conn, $sql);
    echo "ไม่สามารถ UPLOAD ภาพได้";
    header('location:BankManage.php');

} else {

    $sql = "UPDATE bank SET numbank = '". $numbank. "', bank_account = '". $bank_account."',  
    bank_img = '". $bank_img. "' where bank_id = '".$bank_id."'";
    $query = mysqli_query($conn, $sql);
    $msg = "บันทึกข้อมูลสำเร็จ";
    header('location:BankManage.php');
}

// $sql = "UPDATE bank SET bank_name = '". $bank_name. "', numbank = '". $numbank. "', bank_account = '". $bank_account."',  
//         bank_name_id = '". $bank_name_id. "', bank_img = '". $bank_img. "'
//         WHERE bank_name_id = '$bank_name_id' ";

// $query = mysqli_query($conn, $sql);
// header('location:BankManage.php');
?>