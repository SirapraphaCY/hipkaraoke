<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>เพิ่มห้อง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <?php include('./sidebarAdmin.php') ?>
    <script>
        function showAR(str) {
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
                    document.getElementById("showAR").innerHTML = innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showAR.php?room_type=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">เพิ่มห้อง</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">

                                <form class="row g-3" method="post" action="./addroom.php">
                                    <div class="col-md-12 mt-3">
                                        <label for="inputName" class="form-label">ชื่อห้อง</label>
                                        <input type="text" class="form-control" id="room_name" name="room_name">
                                    </div>

                                    <!-- <div class="col-12 mt-3">
                                        <div class="row">

                                            <label for="inputName" class="form-label">ประเภท</label>
                                            <select name="roomtype_id" id="roomtype_id" class="form-select" required>
                                                <?php
                                                // $sql = "SELECT * FROM room_type_detail";
                                                // $result = mysqli_query($conn, $sql);
                                                // while ($row = mysqli_fetch_array($result)) {
                                                //     echo '<option id="form" value="' . $row["roomtype_id"] . '">' . $row["name_type"] . '</option>';
                                                // }
                                                ?>
                                            </select>

                                        </div>
                                    </div> -->

                                    <!-- ------------------ใหม่จากปอนด์----------------------- -->
                                    <div class="col-md-12 mt-3">
                                        <select style="width: 100%; padding:5px; border-color:rgb(220,220,220); border-radius:5px" id="room_type" name="roomtype_id" onchange="showAR(this.value)">
                                            <option>กรุณาเลือกประเภท</option>
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM room_type_detail");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $roomtype_id  = $row["roomtype_id"];
                                                $name_type  = $row["name_type"];
                                            ?>
                                                <option name="roomtype_id" value="<?php echo $roomtype_id ?>">
                                                    <?php echo $name_type ?>
                                                </option>
                                            <?php   }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- </div> -->
                                    <div class="showAR" id="showAR"></div>


                                    <!-- --------------------------------------radio button-------------------------------------- -->
                                    <div class="col mt-3">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <fieldset class="row mb-3">
                                                    <legend class="col-form-label col-sm-2 pt-0">สถานะ</legend>
                                                    <div class="col-sm-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                ว่าง
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="status" value="1">
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
                                            <button class="btn btn-primary me-md-2" type="submit">เพิ่มห้อง</button>
                                            <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./roomTypeAM.php'">ยกเลิก
                                            </button>
                                        </div>
                                    </div>
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