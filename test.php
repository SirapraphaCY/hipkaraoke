<?php

if (isset($_FILES["file_image"]["name"])) {

    function imageResize($imageResourceId, $width, $height)
    {
        $targetWidth = $width < 1280 ? $width : 1280;
        $targetHeight = ($height / $width) * $targetWidth;
        $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
        imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        return $targetLayer;
    }

    if (($_FILES["file_image"]["name"]) != null) {
        if (is_array($_FILES)) {
            $file = $_FILES['file_image']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = time();
            $folderPath = "img/";
            $ext = pathinfo($_FILES['file_image']['name'], PATHINFO_EXTENSION);
            $imageType = $sourceProperties[2];
            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                    break;
                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                    break;
                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                    break;
                default:
                    $error = urlencode('รูปแบบไฟล์ที่ไม่รองรับ');
                    exit;
                    break;
            }
            $path = ($folderPath . $fileNewName . "_thump." . $ext);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงรูปภาพก่อนอัพโหลดและ Resize PHP & JS | boychawin.com</title>
    <link rel="icon" href="https://boychawin.com/B_images/logoboychawin.com.png" type="image/png" />

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>

<body background="https://boychawin.com/B_images/logoboychawins.com.png">

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h4>แนบรูป <font color='red'> * </font>
                </h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="form-group text-center" style="position: relative;cursor:pointer ;">
                            <img src="https://jobm.edoclite.online/jobManagement/img/add1.png" onClick="triggerClick()" id="image_display" style="width: 20%;">
                            <div class="mt-2">
                                <!-- <label for="formFileLg" class="form-label">Large file input example</label> -->
                                <input type="file" name="file_image" onChange="displayImage(this)" id="file_image" class="form-control form-control-lg" id="formFileLg" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" type="submit">อัพโหลด</button>
                    </div>
                </form>

                <div class="row mt-5">
                    <div class="col ">
                        <?php if (isset($_FILES["file_image"]["name"])) {
                            echo '<img  src="' . $path . '" class="img-thumbnail" height="100" alt="" srcset="">';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function triggerClick(e) {
            document.querySelector('#file_image').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_display').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>


</body>

</html>