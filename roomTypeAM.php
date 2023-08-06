<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require "./connection/connecdb.php";
?>

<head>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <?php include('./sidebarAdmin.php'); ?>
    <title>จัดการสถานะห้อง</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        /* table tablelist  */
        #tablelist {
            border-collapse: collapse;
            width: 100%;
            /* border-radius: 80px;  */
            table-layout: fixed;
            text-align: center;
        }

        #tablelist,
        td .tablelist,
        th .tablelist {
            border: 1px;
            padding: 5px;
        }

        thead .tablelist {
            background-color: #FA7E23;
            height: 50px;
            text-align: center;
            color: #FDFEFE;
            font-size: 1.2em;
            /* font-weight: bold; */

        }

        tr.tablelist {
            font-size: 1.1em;
            color: #000000;
            font-weight: normal;
        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            #tablelist,
            thead.tablelist,
            tbody.tablelist,
            th.tablelist,
            td.tablelist,
            tr.tablelist {
                display: block;
                text-align: left;

            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead.tablelist tr .tablelist {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr.tablelist {
                margin: 0 0 1rem 0;
            }

            tr.tablelist:nth-child(odd) {
                background: #f2f2f2;
            }

            td.tablelist {
                /* Behave  like a "row" */
                border: none;
                /* border-bottom: 1px solid #eee; */
                position: relative;
                padding-left: 50%;
                /* background-color: #FA7E23; */
            }

            td.tablelist:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 0;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }


            td.tablelist:nth-of-type(1):before {
                content: "ลำดับ";
            }

            td.tablelist:nth-of-type(2):before {
                content: "ชื่อห้อง";
            }

            td.tablelist:nth-of-type(3):before {
                content: "รายละเอียดห้อง";
            }


            td.tablelist:nth-of-type(4):before {
                content: "ประเภท";
            }

            td.tablelist:nth-of-type(5):before {
                content: "ราคา";
            }

            td.tablelist:nth-of-type(6):before {
                content: "สถานะ";
            }

            td.tablelist:nth-of-type(7):before {
                content: "จัดการ";
            }

        }
    </style>


    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script> -->
    <!-- <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <script>
        function showRoom(str) {
            if (str == "") {
                document.getElementById("room_type_detail").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("show").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showRoom.php?room_type_detail=" + str, true);
            xmlhttp.send();
        }

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
            xmlhttp.open("GET", "./showAR.php?room_type=" + str, true);
            xmlhttp.send();
        }

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
                    document.getElementById("showAR2").innerHTML = innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showAR2.php?room_type=" + str, true);
            xmlhttp.send();
        }
    </script>

</head>

<body>
    <!-- <form action="./editRoomTypeAM.php?room_id=<?php echo $room_id; ?>" method="POST" enctype="multipart/form-data"> -->
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">จัดการสถานะห้อง</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มห้อง
                            </button>

                            <form class="row g-3" method="POST" action="./addroom.php" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มห้อง</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">ชื่อห้อง : </label>
                                                        <input type="text" class="form-control" id="room_name" name="room_name">
                                                    </div>
                                                    <div class="mb-3">
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
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="showAR" id="showAR"></div>

                                                    <div class="mb-3">
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
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มห้อง</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <select class="form-select form-select-sm col-6" aria-label="form-select-sm example" id="room_type_detail" onchange="showRoom(this.value)">
                                    <option value="100">ประเภททั้งหมด</option>

                                    <?php
                                    $sql1 = mysqli_query($conn, "SELECT * FROM room_type_detail");
                                    while ($row = mysqli_fetch_array($sql1)) {
                                        echo "<option value = " . $row['roomtype_id'] . ">" . $row['name_type'] . "</option>";
                                    }
                                    ?>
                                </select>


                                <div class=" col-6">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" name="searchName" id="searchName" placeholder="ค้นหาชื่อห้อง..." aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="show" id="show">



                            <!-- ------------------------ตารางห้อง------------------------- -->
                            <table id="tablelist" class="table-hover mt-2">
                                <thead class="tablelist">
                                    <th class="tablelist">ลำดับ</th>
                                    <th class="tablelist">ชื่อห้อง</th>
                                    <th class="tablelist" style="text-align: left;">รายละเอียดห้อง</th>
                                    <th class="tablelist">ประเภท</th>
                                    <th class="tablelist">ราคา</th>
                                    <th class="tablelist">สถานะ</th>
                                    <th class="tablelist">จัดการ</th>
                                </thead>
                                <tbody class="tablelist">
                                    <?php
                                    //  $room_id = $_GET['room_id']; 
                                    $sql = mysqli_query($conn, "SELECT * FROM room_type_detail 
                                                INNER JOIN room_detail 
                                                ON room_type_detail.roomtype_id = room_detail.roomtype_id 
                                                INNER JOIN status_room
                                                ON room_detail.statusRoom_id = status_room.statusRoomid ");
                                    $n = 1;

                                    while ($row = mysqli_fetch_array($sql)) {
                                        $room_id = $row['room_id'];
                                        $name_type = $row['name_type'];
                                        $room_name = $row['room_name'];
                                        $detail = $row['detail'];
                                        $price = $row['price'];
                                        $equipment = $row['equipment'];
                                        $status = $row['status_name'];

                                    ?>

                                        <tr class="tablelist">
                                            <td class="tablelist"><?php echo $n ?></td>
                                            <td class="tablelist"> <?php echo $room_name ?></td>
                                            <td class="tablelist" style="text-align: left;">
                                                ไมค์(<?php echo $equipment ?>)<br>
                                                <?php echo $detail ?>
                                            </td>
                                            <td class="tablelist"><?php echo $name_type ?></td>
                                            <td class="tablelist"><?php echo $price ?></td>
                                            <td class="tablelist"><?php echo $status ?></td>


                                            <td class="tablelist">
                                                <a href='#exampleModal1<?php echo $room_id ?>' class='btn btn-sm btn-warning' data-bs-toggle='modal'>
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>
                                                <div class="modal fade" id="exampleModal1<?php echo $room_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form action="./EditSuccess.php?room_id=<?php echo $room_id ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลห้อง</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                    $sql11 = mysqli_query($conn, "SELECT * FROM room_detail 
                                                                        JOIN room_type_detail ON room_detail.roomtype_id = room_type_detail.roomtype_id 
                                                                        WHERE room_id ='" . $room_id . "'");
                                                                    while ($row11 = mysqli_fetch_array($sql11)) {
                                                                        // $room_id = $row["room_id"];
                                                                        $roomtype_id  = $row11["roomtype_id"];
                                                                        $name_type      = $row11["name_type"];
                                                                        $statusRoomid   = $row11["statusRoom_id"];
                                                                        $checked0 = "";
                                                                        $checked1 = "";
                                                                        if ($statusRoomid == '0') {
                                                                            $checked0 = "checked=checked";
                                                                        }
                                                                        if ($statusRoomid == '1') {
                                                                            $checked1 = "checked=checked";
                                                                        } ?>
                                                                        <div class="mb-3" style="text-align: left;">
                                                                            <label for="room_name" class="form-label">ชื่อห้อง : </label>
                                                                            <input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $room_name ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <select style="width: 100%; padding:5px; border-color:rgb(220,220,220); border-radius:5px" id="room_type" name="roomtype_id" onchange="showAR2(this.value)">
                                                                                <option>กรุณาเลือกประเภท</option>

                                                                                <?php
                                                                                $sql1 = "SELECT * FROM room_type_detail";
                                                                                $sql3 = mysqli_query($conn, $sql1);
                                                                                while ($row = mysqli_fetch_array($sql3)) {
                                                                                    if ($roomtype_id == $row["roomtype_id"]) {
                                                                                        $checked = "selected";
                                                                                    } else {
                                                                                        $checked = "";
                                                                                    }
                                                                                    echo '<option id="form" value="' . $row["roomtype_id"] . '"' . $checked . '>' . $row["name_type"] .  '</option>';
                                                                                }
                                                                                ?>
                                                                            <?php
                                                                        }
                                                                            ?>

                                                                            </select>
                                                                        </div>
                                                                        <div class="showAR2" id="showAR2"></div>

                                                                        <div class="mb-3" style="text-align: left;">
                                                                            <fieldset class="row mb-3">
                                                                                <legend class="col-form-label col-sm-2 pt-0">สถานะ</legend>
                                                                                <div class="col-sm-10">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" name="statusRoom_id" type="radio" id="gridRadios1" value="0" <?php echo $checked0 ?>>
                                                                                        <label class="form-check-label" for="gridRadios1">
                                                                                            ว่าง
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="statusRoom_id" id="gridRadios2" value="1" <?php echo $checked1 ?>>
                                                                                        <label class="form-check-label" for="gridRadios2">
                                                                                            ไม่ว่าง
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                            <button type="submit" class="btn btn-primary">อัพเดต</button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <a href="./deleteRoom.php?room_id=<?php echo $room_id ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                                <!-- <a href='./editRoomTypeAM.php?room_id=" . $room_id . "'  class ='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a> -->
                                            </td>
                                        </tr>
                                    <?php

                                        $n++;
                                    }
                                    ?>

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>



    <!-- </form> -->


    <!-- <script src="./js/bootstrap.min.js"></script> -->

    <div id="searchData"> </div>
    <script>
        $(document).ready(function() {
            $("#searchName").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#show tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>