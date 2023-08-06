<?php
require "./connection/connecdb.php";
// if (isset($_GET('roomtype_id'))) {
$roomtype_id = $_GET['roomtype_id'];
// echo  $roomtype_id;
// exit;
$name_type = $_POST['name_type'];
$detail = $_POST['detail'];
$price = $_POST['price'];
$num_people = $_POST['num_people'];
$roomName = $_POST['roomName'];
$equipment = $_POST['equipment'];
// echo $roomtype_id;
// exit;

// $file = pathinfo(basename($_FILES['img_upload']['name']), PATHINFO_EXTENSION);
// if ($file != "") {
//     $newname = '/' . uniqid() . "." . $file;
//     $path = "fileupload/imgroom";
//     $path_copy = $path . "/" . $newmane;
//     $upload = move_uploaded_file($_FILES['img_upload']['tmp_name'], $path_copy);

//     if ($upload == FALSE) {
//         echo "ไม่สามารถ UPLOAD ภาพได้";
//         exit();
//     }
//     $pro_picture = $newname;
//     $pic = "fileupload/imgroom/" . $pro_picture;
// } else {
//     $pic = "fileupload/imgroom/img_001.jpg";
// }
$fileName = $_FILES['img']['name'];
$fileTmpname = $_FILES['img']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = './fileupload/imgroom/' . $newFilename;

move_uploaded_file($fileTmpname, $fileDes);
$img    = $fileDes;


if ($_FILES['img']['error']) {
    $sql = "UPDATE room_type_detail SET name_type='$name_type', num_people='$num_people', price = '$price', detail='$detail', equipment='$equipment', roomName = '$roomName'
    WHERE roomtype_id='$roomtype_id'";

    $query = mysqli_query($conn, $sql);
    echo "ไม่สามารถ UPLOAD ภาพได้";
    header('location:Manageroom_types.php');
} else {

    $sql = "UPDATE room_type_detail SET name_type='$name_type', num_people='$num_people', price = '$price', detail='$detail', equipment='$equipment', roomName = '$roomName', img='$img'
    WHERE roomtype_id='$roomtype_id'";
    $query = mysqli_query($conn, $sql);
    // $msg = "บันทึกข้อมูลสำเร็จ";
    header('location:Manageroom_types.php');
}



// echo $roomtype_id;
// echo $name_type;
// echo $equipment;
// echo $detail;
// echo $price;
// echo $num_people;

// $sql = "UPDATE room_type_detail SET name_type = '".$name_type."', equipment='".$equipment."', num_people='".$num_people."', price='".$price."', detail='".$detail."'
//  WHERE roomtype_id = '".$roomtype_id."' ";

// $sql = "UPDATE room_type_detail SET name_type='$name_type', num_people='$num_people', price = '$price', detail='$detail', equipment='$equipment', roomName = '$roomName', img='$pic'
//          WHERE roomtype_id='$roomtype_id'";

// $result = mysqli_query($conn, $sql);
// $query = mysqli_query($conn, $sql);
// exit();
// if ($result) {
//     echo "<script type='text/javascript'>";
//     echo "alert('Update Succesfuly');";
//     echo "window.location = './Manageroom_types.php'; ";
//     echo "</script>";
// } else {
//     echo "<script type='text/javascript'>";
//     echo "alert('Error back to Update again');";
//     echo "window.location = './editRTS.php'; ";
//     echo "</script>";
// }
// mysqli_close($conn); 
// }
// header('location:Manageroom_types.php');
