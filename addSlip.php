<?php
include "./connection/connecdb.php";


$bookDE = $_GET['booklist'];
$pic = "";
// echo $bookDE;
// echo $pic ;
// exit;

$file = pathinfo(basename($_FILES['img_upload']['name']),PATHINFO_EXTENSION);
if ($file != "") {
    $new_image_name = 'img' . uniqid() . "." . $file;
    $image_path = "fileupload/userprofile";
    $upload_path = $image_path . "/" . $new_image_name;

    $upload = move_uploaded_file($_FILES['img_upload']['tmp_name'], $upload_path);
    if ($upload == FALSE) {
        echo "ไม่สามารถ UPLOAD ภาพได้";
        exit();
    }
    $pro_image = $new_image_name;
    $pic = "fileupload/userprofile/" . $pro_image;
    $sql = "UPDATE booking_detail SET bookDE_id = '$bookDE', slip='$pic' where bookDE_id ='$bookDE'";
    mysqli_query($conn, $sql);
} else {
    $pic = "fileupload/userprofile/img_001.jpg";
}

?>
<script>
    window.location = "./bookinglist.php";
</script>
