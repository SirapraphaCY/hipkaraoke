<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require "./connection/connecdb.php"; ?>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script> -->
    <!-- <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <link rel="icon" href="./img/logo1.png" width="500px" />
    <?php include('./sidebarAdmin.php') ?>
    <title>จัดการประเภทห้อง</title>

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
            content: "รูปภาพ";
        }

        td.tablelist:nth-of-type(3):before {
            content: "ชื่อห้อง";
        }


        td.tablelist:nth-of-type(4):before {
            content: "ประเภท";
        }

        td.tablelist:nth-of-type(5):before {
            content: "รายละเอียด";
        }

        td.tablelist:nth-of-type(6):before {
            content: "จำนวนคน";
        }

        td.tablelist:nth-of-type(7):before {
            content: "ราคา";
        }
        td.tablelist:nth-of-type(8):before {
            content: "จัดการ";
        }

    }

    </style>


</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">จัดการประเภทห้อง</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มประเภทห้อง
                            </button>

                            <!-- <button type="button" onclick="location.href='./addRType.php'" class="btn btn-sm btn-success btn-rounded">
                                    <i class="fas fa-plus-circle"></i> เพิ่มประเภทห้อง
                                </button> -->

                            <form class="row g-3" method="POST" action="./addTRSeccess.php" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทห้อง</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">รูปภาพ : </label>
                                                        <input type="file" name="img_upload" id="img_upload" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="roomName" class="form-label">ชื่อห้อง : </label>
                                                        <input type="text" class="form-control" id="roomName" name="roomName">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name_type" class="form-label">ประเภทห้อง : </label>
                                                        <input type="text" class="form-control" id="name_type" name="name_type">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="equipment" class="form-label">จำนวนไมค์ : </label>
                                                        <input type="number" class="form-control" id="equipment" name="equipment" min="1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="detail" class="form-label">รายละเอียดของห้อง : </label>
                                                        <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="num_people" class="form-label">จำนวนคนที่บรรจุได้(คน) : </label>
                                                        <input type="number" class="form-control" id="num_people" name="num_people" min="1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">ราคา : </label>
                                                        <input type="number" class="form-control" id="price" name="price" min="1">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มประเภทห้อง</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                        <!-- ------------------------ตารางห้อง------------------------- -->
                        <table  id="tablelist" class="table-hover mt-2">
                            <thead class="tablelist">
                               
                                    <th class="tablelist">ลำดับ</th>
                                    <th class="tablelist">รูปภาพ</th>
                                    <th class="tablelist">ชื่อห้อง</th>
                                    <th class="tablelist">ประเภท</th>
                                    <th class="tablelist" style="text-align: left;">รายละเอียดห้อง</th>
                                    <th class="tablelist">จำนวนคน</th>
                                    <th class="tablelist">ราคา</th>
                                    <th class="tablelist">จัดการ</th>
                             
                            </thead>

                            <tbody class="tablelist">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM room_type_detail");
                                $n = 1;

                                while ($row = mysqli_fetch_array($sql)) {
                                    $roomtype_id = $row['roomtype_id'];
                                    $pic = $row['img'];
                                    $roomName = $row['roomName'];
                                    $name_type = $row['name_type'];
                                    $detail = $row['detail'];
                                    $price = $row['price'];
                                    $num_people = $row['num_people'];
                                    $equipment = $row['equipment'];
                                ?>
                                    <tr class="tablelist">
                                        <td class="tablelist"><?php echo $n ?></td>
                                        <td class="tablelist"><img src="<?php echo $row['img']; ?>" width="100" style="object-fit: cover;"></td>
                                        <td class="tablelist"><?php echo $roomName ?></td>
                                        <td class="tablelist"><?php echo $name_type ?></td>
                                        <td class="tablelist" style="text-align: left;">
                                            ไมค์(<?php echo $equipment ?>)<br>
                                            <?php echo $detail ?>
                                        </td>
                                        <td class="tablelist"><?php echo $num_people ?></td>
                                        <td class="tablelist"><?php echo $price ?></td>
                                        <td class="tablelist">
                                            <a href="#exampleModal1<?php echo $roomtype_id ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <div class="modal fade" id="exampleModal1<?php echo $roomtype_id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="./editRTS.php?roomtype_id=<?php echo $roomtype_id ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทห้อง <?php //echo $roomtype_id 
                                                                                                                                ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                            // $roomtype_id = $_GET['roomtype_id'];
                                                            // echo $roomtype_id;

                                                            $sql22 = mysqli_query($conn, "SELECT * FROM room_type_detail 
                                                                 WHERE roomtype_id = '$roomtype_id' ");
                                                            // session_start();
                                                            while ($row22 = mysqli_fetch_array($sql22)) {
                                                                $roomtype_id  = $row22["roomtype_id"];
                                                                $roomName     = $row22["roomName"];
                                                                $name_type = $row22['name_type'];
                                                                $equipment = $row22['equipment'];
                                                                $num_people = $row22['num_people'];
                                                                $price = $row22['price'];
                                                                $detail = $row22['detail'];
                                                                $pic = $row22["img"];
                                                            }
                                                            ?>
                                                            <?php  //echo $pic; 
                                                            ?>
                                                            <div class="modal-body"  style="text-align: left;">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label">รูปภาพ : </label>
                                                                    <input type="file" name="img" id="img" class="form-control" value="<?php echo $pic ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="roomName" class="form-label">ชื่อห้อง : </label>
                                                                    <input type="text" class="form-control" id="roomName" name="roomName" value="<?php echo $roomName ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name_type" class="form-label">ประเภทห้อง : </label>
                                                                    <input type="text" class="form-control" id="name_type" name="name_type" value="<?php echo $name_type ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="equipment" class="form-label">จำนวนไมค์ : </label>
                                                                    <input type="number" class="form-control" id="equipment" name="equipment" value="<?php echo $equipment ?>" min="1">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="detail" class="form-label">รายละเอียดของห้อง : </label>
                                                                    <textarea class="form-control" id="detail" name="detail" rows="3"><?php echo $detail ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="num_people" class="form-label">จำนวนคนที่บรรจุได้(คน) : </label>
                                                                    <input type="text" class="form-control" id="num_people" name="num_people" value="<?php echo $num_people ?>" min="1">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">ราคา : </label>
                                                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $price ?>" min="1">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                <button type="submit" class="btn btn-primary">อัพเดต</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <a href="./delRT.php?roomtype_id=<?php echo $roomtype_id ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
        </main>
    </div>
</body>

<!-- <script src="../js/bootstrap.min.js"></script> -->

</html>