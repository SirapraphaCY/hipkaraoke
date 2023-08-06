<?php 
include "./connection/connecdb.php";
$newsid = $_GET['newsid'];
$subject = $_POST['subject'];
$content =  $_POST['content'];
// $imgnews =  $_POST['imgnews'];
// $datenow =  $_POST['datenow'];


$fileName = $_FILES['imgnews']['name'];
$fileTmpname = $_FILES['imgnews']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = 'fileupload/imgnews' . $newFilename;

move_uploaded_file($fileTmpname, $fileDes);
$imgnews    = $fileDes;


if ($_FILES['imgnews']['error']) {
    $sql = "UPDATE news SET subject = '" . $subject . "' , content = '" . $content . "' ,newsid = '" . $newsid . "' 
    WHERE newsid = '" . $newsid . "'";

    $query = mysqli_query($conn, $sql);
    echo "ไม่สามารถ UPLOAD ภาพได้";
    header('location:news.php');

} else {

    $sql = "UPDATE news SET subject = '" . $subject . "' , content = '" . $content . "' ,newsid = '" . $newsid . "',imgnews = '".$imgnews."'
    WHERE newsid = '" . $newsid . "'";
    $query = mysqli_query($conn, $sql);
    $msg = "บันทึกข้อมูลสำเร็จ";
    header('location:news.php');
}
?>