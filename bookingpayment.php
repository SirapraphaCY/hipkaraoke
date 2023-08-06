<!DOCTYPE html>
<html lang="en">

<?php

require "./connection/connecdb.php";

$sql = mysqli_query($conn, "SELECT * FROM customer 
INNER JOIN booking_detail 
ON customer.cus_id = booking_detail.cus_id 
INNER JOIN room_detail 
ON booking_detail.room_id = room_detail.room_id
INNER JOIN room_type_detail
ON room_detail.roomtype_id = room_type_detail.roomtype_id
WHERE customer.cus_id");

// $result = $conn->query($sql);
$row = mysqli_fetch_array($sql);
// $username   = $row['username'];




?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปคำสั่งซื้อ</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css">
    <link rel="stylesheet" href="./css_style/homepage_style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        /* table tablelist  */
        #tablelist {
            border-collapse: collapse;
            width: 100%;
            /* border-radius: 80px;  */
            /* table-layout: fixed; */
            text-align: center;
        }

        #tablelist,
        td .tablelist,
        th .tablelist {
            border: 1px;
            padding: 5px;
        }

        thead .tablelist {
            /* background-color: #FA7E23; */
            height: 50px;
            text-align: center;
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
                /* border-bottom: 1px solid #000000; */
                position: relative;
                padding-left: 50%;
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
                content: "ชื่อห้อง";
            }

            td.tablelist:nth-of-type(2):before {
                content: "ประเภทห้อง";
            }

            td.tablelist:nth-of-type(3):before {
                content: "จำนวนคน";
            }


            td.tablelist:nth-of-type(4):before {
                content: "ห้หมายเหตุ";
            }

            td.tablelist:nth-of-type(8):before {
                content: "วันที่เลือกจอง";
            }

            td.tablelist:nth-of-type(6):before {
                content: "เวลาเริ่มและสิ้นสุด";
            }

            td.tablelist:nth-of-type(5):before {
                content: "ราคาห้อง";
            }

            td.tablelist:nth-of-type(7):before {
                content: "จำนวนชั่วโมง";
            }

            td.tablelist:nth-of-type(9):before {
                content: "ราคาห้องรวม";
            }

        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">

            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"><img src="./img/logo1.png" width="150" alt="logo"></a>

                    <ul class="navbar-nav mb-lg-0 text-light nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="./homepage.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" onclick="location.href='./bookingRoomAll.php'" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">จองห้อง</button>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">อาหาร&เครื่องดื่ม</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
                        <?php
                        include "./connection/connecdb.php";
                        $getSlip = "SELECT *  FROM customer JOIN booking_detail
                        ON booking_detail.cus_id = customer.cus_id 
                        ORDER BY booking_detail.bookDE_id DESC ";
                        $result2 = mysqli_query($conn, $getSlip);
                        $row = mysqli_fetch_array($result2);
                        $username = $row['username'];
                        // $pic = $row['slip'];
                        $PF = $row['picturePF'];
                        // echo $PF;
                        // exit;
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $username ?>
                                <!-- <?php echo $picturePF ?> -->
                                <!-- <div > -->
                                <img src="<?php echo $PF ?>" class="circular--square" alt="...">
                                <!-- </div> -->
                            </a>
                            <style>
                                .circular--square {
                                    border-top-left-radius: 50% 50%;
                                    border-top-right-radius: 50% 50%;
                                    border-bottom-right-radius: 50% 50%;
                                    border-bottom-left-radius: 50% 50%;
                                    width: 30px;
                                    height: 30px;
                                    object-fit: cover;
                                }
                            </style>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./profilecustomer.php">ข้อมูลส่วนตัว</a></li>
                                <!-- <li><a class="dropdown-item" href="#">ประวัติการใช้งาน</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="./img//VDO9.mp4" type="video/mp4" widt>
        </video> -->
    </header>

    <section class="hip container mt-5">
        <P class="fs-3 text-uppercase fw-bold">Hip Karaoke | สรุปข้อมูลการจอง</P>
    </section>

    <?php
    require './connection/connecdb.php';

    $getData = $_GET['pd_id'];
    // echo  $getData;
    $getFrom = "SELECT *  FROM customer JOIN booking_detail
    ON booking_detail.cus_id = customer.cus_id 
    JOIN room_type_detail
    ON booking_detail.room_typeid = room_type_detail.roomtype_id
    WHERE booking_detail.bookDE_id = $getData ";

    $sqlFrom2 = "SELECT *  FROM customer JOIN booking_detail
    ON booking_detail.cus_id = customer.cus_id 
    JOIN booking
    ON booking_detail.booking_id = booking.booking_id
    WHERE booking_detail.bookDE_id  = $getData ";
    $result2 = mysqli_query($conn, $sqlFrom2);
    $rowFrom = mysqli_fetch_array($result2);

    $bookDE_id = $rowFrom['bookDE_id'];
    ?>

    <div class="container">
        <div class="card-body shadow-sm p-5 mb-5 rounded mt-3 ">
            <div class="container mt-1 ">
                <div class="border border-1">
                    <div class="row fw-bold">
                        <div class="col-sm-6">
                            <div>
                                <div class="card-body">
                                    <p class="fs-5">
                                        วัน/เวลาที่ทำการจอง<br>
                                        <?php echo date("d/m/y H:i", strtotime($rowFrom['bkdatetime'])) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="border-start">
                                <div class="card-body">

                                    <p class="fs-5">
                                        Username : <?php echo $rowFrom['username']; ?> <br>
                                        Tel : <?php echo $rowFrom['phone']; ?> <br>
                                        E-mail : <?php echo $rowFrom['email']; ?> <br>
                                        <?php //echo date("d/m/y", strtotime($rowFrom['date'])) 
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="container mt-3">
                <P class="fs-5 fw-bold">รายการจอง</P>
            </section>

            <div class="container">
                <table class="table table-bordered text-center " id="tablelist">
                    <thead class="tablelist">
                        <th class="tablelist">ชื่อห้อง</th>
                        <th class="tablelist">ประเภทห้อง</th>
                        <th class="tablelist">จำนวนคน</th>
                        <th class="tablelist">หมายเหตุ</th>
                        <th class="tablelist">วันที่เลือกจอง</th>
                        <th class="tablelist">เวลาเริ่มและสิ้นสุด</th>
                        <th class="tablelist">ราคาห้อง</th>
                        <th class="tablelist">จำนวนชั่วโมง</th>
                        <th class="tablelist">ราคาห้องรวม (บาท)</th>
                        <!-- <th scope="col">ราคามัดจำ (50%)(บาท)</th> -->
                    </thead>
                    <tbody class="tablelist">

                        <?php
                        $getData = $_GET['pd_id'];
                        $sqlFrom = "SELECT * FROM  customer JOIN booking_detail
                        ON booking_detail.cus_id = customer.cus_id
                        JOIN order_food 
                        ON order_food.bookDE_id = booking_detail.bookDE_id 
                        JOIN food_detail
                        ON order_food.food_detail_id = food_detail.food_detail_id 
                        WHERE booking_detail.bookDE_id = $getData";
                        $resultFrom = mysqli_query($conn, $sqlFrom);

                        $sqlFrom1 = "SELECT *  FROM customer JOIN booking_detail
                        ON booking_detail.cus_id = customer.cus_id 
                        JOIN room_detail
                        ON booking_detail.room_id= room_detail.room_id
                        JOIN room_type_detail
                        ON booking_detail.room_typeid = room_type_detail.roomtype_id
                        JOIN booking ON booking.booking_id = booking_detail.booking_id
                        WHERE booking_detail.bookDE_id = $getData ";
                        $result2 = mysqli_query($conn, $sqlFrom1);

                        $num = 1;

                        while ($row = mysqli_fetch_array($result2)) {
                            $room_name = $row['room_name'];
                            $nametype = $row['name_type'];
                            $date    = $row['bkdatetime'];
                            $phone = $row['phone'];
                            $email = $row['email'];
                            $room_id = $row['room_id']
                        ?>
                            <tr class="tablelist">
                                <td class="tablelist"><?php echo $row['room_name']; ?></td>
                                <td class="tablelist"><?php echo $row['name_type']; ?></td>
                                <td class="tablelist"><?php echo $rowFrom['num']; ?></td>
                                <td class="tablelist"><?php echo $rowFrom['note']; ?></td>
                                <td class="tablelist"><?php echo date("d/m/y", strtotime($row['date'])) ?></td>
                                <td class="tablelist"><?php echo $row['timeplays']; ?></td>
                                <td class="tablelist"><?php echo $row['price']; ?></td>
                                <td class="tablelist"><?php echo $row['hours']; ?></td>
                                <td class="tablelist text-red"><?php echo $row['price'] * $row['hours']; ?></td>
                                <!-- <td class="text-red">0</td> -->
                            </tr>
                        <?php
                            $num++;
                        } ?>
                    </tbody>
                </table>



                <!-- <a href="./editroomran.php?room_id=<?php echo $room_id ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php ?>">แก้ไขห้อง</a> -->
                <a href='#exampleModal4' class='btn btn-sm btn-danger' data-bs-toggle="modal" data-bs-target="#exampleModal4">
                    แก้ไขห้อง
                </a>

                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="./editroomran.php?room_id=<?php echo $getData  ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไข <?php //echo $room_id ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="row">
                                        <div class="col">
                                            <label for="room_name" class="form-label">ชื่อห้อง : </label>
                                            <input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $room_name ?>">
                                        </div>
                                    </div> -->

                                    <div class="mb-3">


                                        <div class="mb-3" style="text-align: left;">
                                                <label for="room_name" class="form-label">ชื่อห้อง : </label>
                                                <input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $room_name ?>" disabled>
                                            </div>
                                        <div class="mb-3">
                                            <select style="width: 100%; padding:5px; border-color:rgb(220,220,220); border-radius:5px" id="room_type" name="room_type">
                                                <option>กรุณาเลือกห้อง</option>

                                                <?php
                                                $roometype = "SELECT * FROM room_detail 
                                                    JOIN room_type_detail ON room_detail.roomtype_id = room_type_detail.roomtype_id 
                                                    WHERE room_id ='" . $room_id . "'";

                                                $ssq = mysqli_query($conn, $roometype);
                                                $roww = mysqli_fetch_array($ssq);
                                                $roometypeid = $roww['roomtype_id'];
                                                // echo $roww['roomtype_id'];
                                                // exit;

                                                $ee = "SELECT * FROM room_detail 
                                                    JOIN booking_detail 
                                                    ON room_detail.room_id = booking_detail.room_id
                                                   WHERE booking_detail.bookDE_id ='" . $getData . "'";
                                                $qrey =  mysqli_query($conn, $ee);
                                                $rowrow = mysqli_fetch_array($qrey);
                                                $mm =  $rowrow['timeplays'];
                                                $e = explode(",", $mm);
                                                $timee =  $e[0];
                                                $datee = $rowrow['date'];


                                                $sql1 = "SELECT * FROM room_detail 
                                                    JOIN room_type_detail 
                                                    ON room_detail.roomtype_id = room_type_detail.roomtype_id 
                                                    -- JOIN booking_detail 
                                                    -- ON room_detail.room_id = booking_detail.room_id
                                                    WHERE room_detail.statusRoom_id  = '0'  AND room_detail.roomtype_id ='" . $roometypeid . "'   ";
                                                $sql3 = mysqli_query($conn, $sql1);

                                                while ($row = mysqli_fetch_array($sql3)) {
                                                    $roomId = $row["room_id"];

                                                    $ch = "SELECT * FROM booking_detail  WHERE   booking_detail.room_id = $roomId AND booking_detail.statusRoomid = 0 AND booking_detail.date = '$datee' AND timeplays LIKE '%$timee%';  ";
                                                    $q = mysqli_query($conn, $ch);
                                                    if ($q->num_rows == 0) {
                                                        echo '<option id="form" value="' . $row["room_id"] . '" >' . $row["room_name"] .  '</option>';

                                                        
                                                    } 
                                                    // else {


                                                        // echo '<option>ไม่มีห้องว่าง</option>';
                                                        // if ($room_id == $row["room_id"]) {
                                                        //     $checked = "selected";
                                                        // } else {
                                                        //     $checked = "";
                                                        // }

                                                    // }
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                      

                                    <div class="modal-footer">
                                        <!-- <a href="./editroomran.php?room_id=<?php echo $getData ?>" class="btn btn-primary">เปลี่ยนห้อง</a> -->
                                        <button type="submit" class="btn btn-primary">เปลี่ยนห้อง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- อาหาร -->

                <section class="container mt-5">
                    <P class="fs-5 fw-bold">อาหารและเครื่องดื่ม</P>
                </section>

                <div class="container">
                    <?php
                    $getData = $_GET['pd_id'];
                    $no = "SELECT * FROM booking_detail WHERE bookDE_id =  $getData ";
                    $resultNo = mysqli_query($conn, $no);
                    $rowNo = mysqli_fetch_array($resultNo);
                    if ($rowNo['sumfoodprice'] == 0) {
                    ?>
                        <h6>ไม่มีการสั่งอาหาร</h6><br>

                    <?php

                    } else {

                    ?>
                        <table class="table table-bordered text-center table-sm">
                            <thead>
                                <tr>

                                    <th scope="col">ชื่อเมนู</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา / ชิ้น</th>
                                    <th scope="col">รวม</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php

                                $sqlFood = "SELECT * FROM  customer JOIN booking_detail
                            ON booking_detail.cus_id = customer.cus_id
                            JOIN order_food 
                            ON order_food.bookDE_id = booking_detail.bookDE_id 
                            JOIN food_detail
                            ON order_food.food_detail_id = food_detail.food_detail_id 
                            WHERE booking_detail.bookDE_id = $getData";
                                $result2 = mysqli_query($conn, $sqlFood);
                                $num = 1;

                                // echo $notefood;
                                // exit;

                                while ($row = mysqli_fetch_array($result2)) {
                                ?>
                                    <tr>

                                        <td><?php echo $row['food_name']; ?></td>
                                        <td>x <?php echo $row['qty']; ?></td>
                                        <td><?php echo $row['pd_price']; ?></td>
                                        <td><?php echo $row['pd_price'] * $row['qty'];; ?></td>
                                    </tr>
                                <?php
                                    $num++;
                                } ?>
                                <!-- <p class="fw-bold">หมายเหตุ : </p>
                        <textarea class="textinput p-2" id="notefood" name="notefood" placeholder="รายละเอียดเพิ่มเติม เช่น ขอเพิ่มซอสพริก"></textarea> -->
                                <tr>
                                    <?php
                                    include "./connection/connecdb.php";
                                    $getData = $_GET['pd_id'];
                                    $sqlFood = "SELECT*FROM booking_detail 
                            JOIN order_food
                            ON order_food.bookDE_id = booking_detail.bookDE_id
                            JOIN food_detail 
                            ON order_food.food_detail_id = food_detail.food_detail_id 
                            JOIN room_type_detail
                            WHERE booking_detail.bookDE_id =  $getData ";
                                    $resultFood = mysqli_query($conn, $sqlFood);
                                    $row = mysqli_fetch_array($resultFood);

                                    $sumfood = $row['sumfoodprice'];
                                    ?>
                                    <td colspan="3"></td>
                                    <td class="text-danger"> รวม : <?php echo $sumfood ?> บาท</td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>

                <!-- <section class="container mt-5">
                <P class="fs-5 fw-bold">ชำระเงิน</P><?php echo $getData; ?>
            </section> -->
                <!-- <form action="./addSlip.php?booklist=<?php echo $getData ?>" method="POST" enctype="multipart/form-data"> -->
                <form action="./statusupdate.php?booklist=<?php echo $getData ?>" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <!-- <div class="row"> -->
                        <div class="border p-3">
                            <p class="fs-5 border-bottom fw-bold">สรุปราคาทั้งหมด</p>
                            <div class="row justify-content-between">


                                <?php
                                include "./connection/connecdb.php";
                                $getData = $_GET['pd_id'];
                                $sqlFood = "SELECT * FROM booking_detail
                            JOIN customer 
                            ON booking_detail.cus_id = customer.cus_id
                            JOIN booking 
                            ON booking_detail.booking_id = booking.booking_id
                            JOIN room_detail
                            ON booking_detail.room_id = room_detail.room_id
                            JOIN room_type_detail
                            ON room_detail.roomtype_id = room_type_detail.roomtype_id
                            ORDER BY booking_detail.bookDE_id  =  $getData DESC";
                                $resultFood = mysqli_query($conn, $sqlFood);
                                $row = mysqli_fetch_array($resultFood);



                                $sumfood = $row['sumfoodprice'];
                                $priceroom = $row['price'] * $row['hours'];

                                // $hours =  ;
                                // echo $priceroom;
                                // echo $sumfood;
                                // exit;
                                ?>
                                <div class="col-11">
                                    <p class="fs-6 lh-base">
                                        รวมทั้งหมด
                                    </p>
                                </div>
                                <div class="col-1">
                                    <p class="fs-6 lh-base text-danger">
                                        <?php echo $sumfood + $priceroom ?> บาท
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                            <button type="button" onclick="window.history.back('./bookingMenu.php')" class="btn btn-dark"><i class="bi bi-chevron-left"></i> ย้อนกลับ</button>
                            <!-- <button type="submit" id="submit" name="submit" class="btn btn-danger"> ยืนยันการจอง<i class="bi bi-chevron-right"></i></button> -->

                            <a href="#staticBackdrop<?php echo $getData ?> " class="btn btn-danger" data-bs-toggle="modal">
                                ชำระเงิน <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- modal ชำระเงิน -->

                    <div class="modal fade" id="staticBackdrop<?php echo $getData ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card-body ">
                                        <p class="fs-4 fw-bold">ยืนยันการชำระเงิน</p>

                                        <div class="row border rounded-1">
                                            <?php
                                            $sqlroombook = "SELECT *  FROM customer JOIN booking_detail
                                                            ON booking_detail.cus_id = customer.cus_id 
                                                            JOIN room_detail
                                                            ON booking_detail.room_id= room_detail.room_id
                                                            JOIN room_type_detail
                                                            ON booking_detail.room_typeid = room_type_detail.roomtype_id
                                                            JOIN booking ON booking.booking_id = booking_detail.booking_id
                                                            WHERE booking_detail.bookDE_id = $getData ";
                                            $resultroombook = mysqli_query($conn, $sqlroombook);
                                            $rowroombook = mysqli_fetch_array($resultroombook);

                                            $roomprice = $rowroombook['price'];
                                            // $name_type = $rowroombook['name_type'];


                                            ?>
                                            <div class="col p-3 ">
                                                <li class="d-flex justify-content-between align-items-center fs-5 fw-bold">
                                                    ยอดมัดจำที่ต้องจ่าย
                                                    <span class="text-danger"><?php echo $rowroombook['price'] ?></span>
                                                </li>
                                                <hr>
                                                <?php
                                                $sqlbank = "SELECT * FROM bank 
                                                        JOIN bank_name 
                                                        WHERE bank_name.bank_name_id = bank.bank_name_id ";
                                                $resultbank = mysqli_query($conn, $sqlbank);
                                                $numbank = 1;
                                                while ($rowbank = mysqli_fetch_array($resultbank)) {
                                                    // echo $rowbank['bank_name'];

                                                ?>
                                                    <!-- <div class="form-floating mb-3"> -->
                                                    <div class="card p-2 ">
                                                        <p class="fs-5 fw-bold"><?php echo $rowbank['bank_name'];  ?></p>
                                                        <p class="fs-6 text-dark">
                                                            ชื่อบัญชี : <?php echo $rowbank['bank_account']; ?>
                                                        </p>
                                                        <p class="fs-6 text-dark">
                                                            เลขบัญชี : <span class="fs-3 text-danger"><?php echo $rowbank['numbank']; ?></span>
                                                        </p>

                                                    </div>


                                                    <!-- </div> -->
                                                <?php
                                                    $numbank++;
                                                }
                                                ?>
                                                <p class="fs-5 fw-bold">อัปโหลดหลักฐาานการชำระเงิน</p>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 mt-5">






                                                            <form method="POST" enctype="multipart/form-data">

                                                                <div class="mb-3">
                                                                    <div class="form-group text-center " style="position: relative;cursor:pointer ;">
                                                                        <!-- <i class="bi bi-image-alt fs-1" onClick="triggerClick()" id="image_display" style="width: 20%;"></i> -->
                                                                        <img src="https://jobm.edoclite.online/jobManagement/img/add1.png" class="zoom" onClick="triggerClick()" id="image_display" style="width: 30%;">
                                                                        <p>อัปโหลดหลักฐาานการชำระเงิน</p>


                                                                        <input type="file" name="file_image" onChange="displayImage(this)" id="file_image" class="form-control" id="formFileLg" type="file" required>


                                                                    </div>
                                                                </div>
                                                            </form>

                                                            <div class="row mt-5">
                                                                <div class="col ">
                                                                    <?php
                                                                    if (isset($_FILES["file_image"]["name"])) {
                                                                        echo "<img  src='" . $path . "' class='img-thumbnail' height='100'  alt='' srcset=''>";
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
                                                        // else {
                                                        //     alert('กรุณาเลือกสลิปเงินโอน');
                                                        // }
                                                    }

                                                    function validateForm() {
                                                        let x = document.forms["myForm"]["fname"].value;
                                                        if (x == "") {
                                                            alert("Name must be filled out");
                                                            return false;
                                                        }
                                                    }
                                                </script>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>

                                        <button type="submit" class="btn btn-primary">ยืนยันการชำระเงิน</button>
                                        <!-- <input type="submit" value="Submit"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="sticky-bottom mt-5">
        <p class="text-center mt-5">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<!-- <div class="col-6 border">
                        <p class="text-start mt-4  text-danger">
                            **กรุณาชำระเงินภายใน 24 ชั่วโมง หากไม่ชำระเงิน ระบบจะทำการยกเลิกการจองอัตโนมัติ <br>
                            **ลูกค้าต้องเข้ารับบริการก่อนเวลาที่ทำการจอง 5 นาที
                            หากเลยเวลาที่กำหนดทางร้านจะยกเลิกการจองในทุกกรณี <br>
                            **เมื่อชำระเงินแล้ว กรุณาแจ้งรายละเอียดการโอนเงินหรือแนบสลิป <br>
                            **ทางร้านขอสงวนสิทธิ์ในการคืนเงินมัดจำในทุกกรณี
                        </p>
                    </div> -->