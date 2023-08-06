<?php
include "./connection/connecdb.php";
$getData = $_GET['booklist'];
$bank = $_GET['bank'];
// echo $bank;
// exit;
// $statusRoomid = $_POST['statusRoomid '];
// echo $getData;
// echo $statusRoomid;

// if (isset($_FILES["file_image"]["name"])) {

//     // function imageResize($imageResourceId, $width, $height)
//     // {
//     //     $targetWidth = $width < 1280 ? $width : 1280;
//     //     $targetHeight = ($height / $width) * $targetWidth;
//     //     $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
//     //     imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
//     //     return $targetLayer;
//     // }

//     if (($_FILES["file_image"]["name"]) != null) {
//         if (is_array($_FILES)) {
//             $file = $_FILES['file_image']['tmp_name'];
//             // $sourceProperties = getimagesize($file);
//             $fileNewName = time();
//             $folderPath = 'fileupload/imgslip/';
//             $ext = pathinfo($_FILES['file_image']['name'], PATHINFO_EXTENSION);
//             // $imageType = $sourceProperties[2];
//              $path = ($folderPath . $fileNewName . "." . $ext);
//             move_uploaded_file($file, $folderPath);


//             // echo $path;
//             // echo $imageResourceId;
//             // exit;
//         }
//     }
// }

// $fileName = $_FILES['o_slip']['name'];
// $fileTmpname = $_FILES['o_slip']['tmp_name'];
// $fileExt     = explode(".", $fileName);
// $fileAcExt   = strtolower(end($fileExt));
// $newFilename = time() . "." . $fileAcExt;
// $fileDes     = 'fileupload/imgslip/' . $newFilename;

// move_uploaded_file($fileTmpname, $fileDes);
// $o_slip    = $fileDes;



$check = "SELECT * FROM booking INNER JOIN booking_detail ON booking.booking_id = booking_detail.booking_id WHERE booking_detail.bookDE_id = $getData ";
$queryCheck = mysqli_query($conn, $check);
$rowC = mysqli_fetch_array($queryCheck);
$bookingId = $rowC['booking_id'];


$sqlstatus = "UPDATE booking_detail SET statusRoomid = '1'   WHERE 	bookDE_id  = '" . $getData . "' ";
$querystatus = mysqli_query($conn, $sqlstatus);

$fileName = $_FILES['file_image']['name'];
$fileTmpname = $_FILES['file_image']['tmp_name'];
$fileExt     = explode(".", $fileName);
$fileAcExt   = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes     = 'fileupload/imgslip/' . $newFilename;

move_uploaded_file($fileTmpname, $fileDes);
$path    = $fileDes;







if ($_FILES['file_image']['error']) {
    $sqlstatus1 = "UPDATE booking SET  bank_id = '" . $bank . "'   WHERE 	booking_id  = '" . $bookingId . "' ";
    $querystatus = mysqli_query($conn, $sqlstatus1);
    // echo $querystatus ;
    // exit;
    // $query = mysqli_query($conn, $sql);

    echo "ไม่สามารถ UPLOAD ภาพได้";
    // header('location:bookinglist.php');
} else {

    $sqlstatus1 = "UPDATE booking SET   slip = '" . $path . "'   WHERE 	booking_id  = '" . $bookingId . "' ";
    $querystatus = mysqli_query($conn, $sqlstatus1);
    // $msg = "บันทึกข้อมูลสำเร็จ";
    // echo $querystatus ;
    // exit;
    header('location:bookinglist.php');
}

// $sqlstatus1 = "UPDATE booking SET  bank_id = '" . $bank . "'   WHERE 	booking_id  = '" . $bookingId . "' ";
// $querystatus = mysqli_query($conn, $sqlstatus1);
// // echo $querystatus;
header('location:bookinglist.php');
