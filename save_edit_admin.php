<meta charset="UTF-8">
<?php
session_start();
//1. เชื่อมต่อ database: 
require "./connection/connecdb.php";  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$cus_id = $_POST['cus_id'];
$username = $_POST['username'];
$idline = $_POST['idline'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// echo $cus_id;
// echo $username;
// echo $idline;
// echo $phone;
// exit;

$fileName = $_FILES['img_upload']['name'];
$fileTmpname = $_FILES['img_upload']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = './fileupload/userprofile/' . $newFilename;
move_uploaded_file($fileTmpname, $fileDes);
$pic    = $fileDes;


if ($_FILES['img_upload']['error']) {
    $sql = "UPDATE customer set username = '".$username."', email = '".$email."' , idline = '".$idline."' , phone = '".$phone."' WHERE cus_id = '".$cus_id."'";

    $query = mysqli_query($conn, $sql);
    echo "ไม่สามารถ UPLOAD ภาพได้";
    header('location:profileEditAM.php');

} else {
    $sql = "UPDATE customer set username = '".$username."', email = '".$email."' , idline = '".$idline."' , phone = '".$phone."', picturePF = '".$pic."' WHERE cus_id = '".$cus_id."'";
    $query = mysqli_query($conn, $sql);
    $msg = "บันทึกข้อมูลสำเร็จ";
    header('location:profileEditAM.php');
}



//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

//$sql = "UPDATE customer SET  username = '" . $username . "',phone = '" . $phone . "',email = '" . $email . "',idline = '" . $idline . "' WHERE cus_id ='" . $cus_id . "'";





//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($query) {
    echo "<script type='text/javascript'>";
    echo "alert('Update Succesfuly');";
    echo "window.location = './profileEditAM.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "window.location = './profileEditAM.php'; ";
    echo "</script>";
}
// mysqli_close($conn); //ปิดการเชื่อมต่อ database 
?>