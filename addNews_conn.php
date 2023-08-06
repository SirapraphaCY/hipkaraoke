<?php
require "./connection/connecdb.php";
$newsid = $_POST['newsid'];
$imgnews = $_POST['imgnews'];
$datenow = $_POST['datenow'];
$subject = $_POST['subject'];
$content = $_POST['content'];

echo $newsid;

$file = pathinfo(basename($_FILES['imgnews']['name']), PATHINFO_EXTENSION);
if ($file != "") {
    $newmane = '/' .uniqid().".". $file;
    $path = "fileupload/imgnews/";
    $path_copy = $path . "/" . $newmane;
    $uplold = move_uploaded_file($_FILES['imgnews']['tmp_name'], $path_copy);
    if ($uplold == FALSE) {
        echo "ไม่สามารถ upload ภาพได้";
        exit();
    }
    $pro_picture = $newmane;
    $imgnews = "fileupload/imgnews" . $pro_picture;
}

$sql = "INSERT INTO news(imgnews, subject, content) 
VALUES ('" . $imgnews . "','" . $subject . "','" . $content . "')";
$queryNews = mysqli_query($conn, $sql);
header('location:news.php');


?>