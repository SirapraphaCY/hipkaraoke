<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <title>แก้ไขข้อมูลห้อง</title>
    <?php include('./sidebarAdmin.php') ?>

    <script>
        function showAR2(str) {
            if (str == "") {
                document.getElementById("room_type").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("show").innerHTML = innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showAR2.php?room_type=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">แก้ไขข้อมูลห้อง</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">
                                <?php $room_id = $_GET['room_id']; ?>
                                <form class="row g-3" method="POST" action="./EditSuccess.php?rid=<?php echo $room_id; ?>" enctype='multipart/form-data'>

                                    <?php

                                    $sql = mysqli_query($conn, "SELECT * FROM room_detail 
                                    JOIN room_type_detail ON room_detail.roomtype_id = room_type_detail.roomtype_id 
                                    WHERE room_id ='" . $room_id . "'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        // $room_id = $row["room_id"];
                                        $roomtype_id  = $row["roomtype_id"];
                                        $name_type      = $row["name_type"];
                                        $statusRoomid   = $row["statusRoomid"];
                                        $room_name       = $row["room_name"];
                                        $price            = $row["price"];
                                        $checked0 = "";
                                        $checked1 = "";
                                        if ($statusRoomid == '0') {
                                            $checked0 = "checked=checked";
                                        }
                                        if ($statusRoomid == '1') {
                                            $checked1 = "checked=checked";
                                        } ?>


                                        <div class="col-md-12 mt-3">
                                            <label for="room_name" class="form-label">ชื่อห้อง</label>
                                            <input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $room_name ?>">
                                        </div>


                                        
                                        <div class="col-md-12 mt-3">
                                            <select style="width: 100%; padding:5px; border-color:rgb(220,220,220); border-radius:5px" id="room_type" name="roomtype_id" onchange="showAR2(this.value)">
                                                <option>กรุณาเลือกประเภท</option>

                                                <?php
                                                $sql1= "SELECT * FROM room_type_detail";
                                                $sql3 = mysqli_query($conn, $sql1);
                                                //mysqli_query($conn, "SELECT * FROM room_type_detail");{
                                                while ($row = mysqli_fetch_array($sql3)) {
                                                    if ($roomtype_id == $row["roomtype_id"]){
                                                        $checked = "selected";
                                                } else { 
                                                    $checked = "";
                                                }
                                                echo '<option id="form" value="' . $row["roomtype_id"] . '"' . $checked . '>' . $row["name_type"] .  '</option>';
                                                }
                                                ?>
                                                    <option name="roomtype_id" value="<?php echo $roomtype_id ?>"> 
                                                        <?php //echo $name_type ?></option>
                                                <?php 
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- </div> -->
                                        <div class="show" id="show"></div>
                                        



                                        <!-- <div class="col-md-12 mt-3">
                                            <label for="inputName" class="form-label">ราคาห้อง</label>
                                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>">
                                        </div> -->



                                        <!-- --------------------------------------radio button-------------------------------------- -->
                                        <div class="col mt-3">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">สถานะ</legend>
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="statusRoomid" type="radio" id="gridRadios1" value="0" <?php echo $checked0 ?>>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                    ว่าง
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="statusRoomid" id="gridRadios2" value="1" <?php echo $checked1 ?>>
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    ไม่ว่าง
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <button class="btn btn-primary me-md-2" type="submit">บันทีก</button>
                                                <button class="btn btn-danger btn-rounded" type="button" onclick="location.href='./roomTypeAM.php'">ยกเลิก
                                                </button>
                                            </div>
                                        </div>

                                    <?php
                                   // }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>