<?php
require "./connection/connecdb.php";
$bank_name = $_POST['bank_name'];
$numbank = $_POST['numbank'];
$bank_img = $_POST['bank_img'];
$bank_account = $_POST['bank_account'];
$bank_name_id = $_POST['bank_name_id'];

// $path = "fileupload/imgbank";
// $target_file = $path . basename($_FILES["bank_img"]["name"]);
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// if ($imageFileType != "") {
//     $new_image_name = 'img' . uniqid() . "." . $imageFileType;
// } else {
//     echo "การ Upload รูปภาพล้มเหลว";
// }

$file = pathinfo(basename($_FILES['bank_img']['name']), PATHINFO_EXTENSION);
if ($file != "") {
    $newmane = '/' .uniqid().".". $file;
    $path = "fileupload/imgbank";
    $path_copy = $path . "/" . $newmane;
    $uplold = move_uploaded_file($_FILES['bank_img']['tmp_name'], $path_copy);
    if ($uplold == FALSE) {
        echo "ไม่สามารถ upload ภาพได้";
        exit();
    }
    $pro_picture = $newmane;
    $bank_img = "fileupload/imgbank" . $pro_picture;
}


$sql = "INSERT INTO bank(bank_account, numbank, bank_img, bank_name_id) 
VALUES ('" . $bank_account . "','" . $numbank.  "','" . $bank_img . "', '" . $bank_name . "')";
$query = mysqli_query($conn, $sql);
header('location:BankManage.php');
