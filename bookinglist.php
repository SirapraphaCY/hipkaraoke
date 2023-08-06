<!DOCTYPE html>
<html lang="en">
<?php
include "./connection/connecdb.php";

session_start();
$getSlip = "SELECT *  FROM customer WHERE cus_id ='" . $_SESSION['cus_id'] . "'  ";
$result2 = mysqli_query($conn, $getSlip);
$row = mysqli_fetch_array($result2);
$cus_id     = $_SESSION['cus_id'];
$username = $row['username'];
$PF = $row['picturePF'];
// echo $PF;
// exit;
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ข้อมูลการจอง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css">
    <link rel="stylesheet" href="./css_style/homepage_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


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
            background-color: #363636;
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
                content: "ประเภท";
            }

            td.tablelist:nth-of-type(3):before {
                content: "วันที่เข้าใช้บริการ";
            }


            td.tablelist:nth-of-type(4):before {
                content: "ราคาทั้งหมด";
            }

            td.tablelist:nth-of-type(5):before {
                content: "เหลือ";
            }

            td.tablelist:nth-of-type(6):before {
                content: "สถานะ";
            }

            td.tablelist:nth-of-type(7):before {
                content: "สถานะ";
            }
        }

        /* table tablelist  */


        /*table tablebookdetail */

        #tablebookdetail {
            border-collapse: collapse;
            width: 100%;
            /* border-radius: 80px;  */
            /* table-layout: fixed; */
            font-size: 1.1rem;
            text-align: center;
        }

        #tablebookdetail,
        td .tablebookdetail,
        th .tablebookdetail {
            border: 1px;
            padding: 5px;
        }

        thead .tablebookdetail {
            background-color: #FA7E23;
            height: 50px;
            text-align: center;
            color: #FDFEFE;

        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            #tablebookdetail,
            thead.tablebookdetail,
            tbody.tablebookdetail,
            th.tablebookdetail,
            td.tablebookdetail,
            tr.tablebookdetail {
                display: block;
                text-align: left;


            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead.tablebookdetail tr .tablebookdetail {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr.tablebookdetail {
                margin: 0 0 1rem 0;
            }

            tr.tablebookdetail:nth-child(odd) {
                background: #f2f2f2;
            }

            td.tablebookdetail {
                /* Behave  like a "row" */
                border: none;
                /* border-bottom: 1px solid #eee; */
                position: relative;
                padding-left: 50%;
            }

            td.tablebookdetail:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 0;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            td.tablebookdetail:nth-of-type(1):before {
                content: "ชื่อห้อง";
            }

            td.tablebookdetail:nth-of-type(2):before {
                content: "ประเภท";
            }

            td.tablebookdetail:nth-of-type(3):before {
                content: "จำนวนคน";
            }


            td.tablebookdetail:nth-of-type(4):before {
                content: "หมายเหตุ";
            }

            td.tablebookdetail:nth-of-type(8):before {
                content: "จำนวนชั่วโมง";
            }

            td.tablebookdetail:nth-of-type(6):before {
                content: "เวลาเริ่มและสิ้นสุด";
            }

            td.tablebookdetail:nth-of-type(5):before {
                content: "วันที่เลือกจอง";
            }

            td.tablebookdetail:nth-of-type(7):before {
                content: "ราคาห้อง";
            }

            td.tablebookdetail:nth-of-type(9):before {
                content: "ราคาห้องรวม";
            }

        }

        /*table tablebookdetail */


        /* tablefood */

        #tablefood {
            border-collapse: collapse;
            width: 100%;
            font-size: 1.1rem;
            /* text-align: center; */
        }

        #tablefood,
        td.tablefood,
        th.tablefood {
            border: 1px;
            padding: 3px;
        }

        thead.tablefood {
            background-color: #FA7E23;
            height: 40px;
            /* text-align: center; */
            color: #FDFEFE;

        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            tr.tablefood:nth-child(odd) {
                background: #f2f2f2;
            }

        }

        #overflowTest {
            /* background: #4CAF50; */
            /* color: white; */
            padding: 15px;
            width: 100%;
            height: 500px;
            overflow: scroll;
            /* border: 1px solid #ccc; */
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

                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">
                                ข้อมูลการจอง

                            </a>
                        </li>


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
    </header>

    <section class="hip container mt-5">
        <h3 class="text-uppercase fw-bold">Hip Karaoke | ข้อมูลการจองห้อง</h3>
    </section>

    <div class="container">
        <div id="overflowTest">
            <table class="table align-middle" id="tablelist">
                <thead class="tablelist">
                    <th class="tablelist">ลำดับ</th>
                    <th class="tablelist" style="text-align: left;">ประเภท</th>
                    <th class="tablelist" style="text-align: left;">วันที่เข้าใช้บริการ</th>
                    <th class="tablelist">ราคาทั้งหมด</th>
                    <th class="tablelist">เหลือ</th>
                    <th class="tablelist">สถานะ</th>
                    <th class="tablelist"></th>
                </thead>
                <tbody class="tablelist">
                    <?php
                    $getSlip = "SELECT *  FROM customer JOIN booking_detail
                    ON booking_detail.cus_id = customer.cus_id 
                    JOIN room_detail
                    ON booking_detail.room_id= room_detail.room_id
                    JOIN room_type_detail
                    ON booking_detail.room_typeid = room_type_detail.roomtype_id
                    JOIN booking ON booking.booking_id = booking_detail.booking_id 
                    WHERE customer.cus_id =  $_SESSION[cus_id] AND booking_detail.statusRoomid != 0 
                    ORDER BY booking_detail.bookDE_id DESC  ";
                    $result2 = mysqli_query($conn, $getSlip);
                    $num = 1;
                    while ($row = mysqli_fetch_array($result2)) {
                        $bookDE_id = $row['bookDE_id'];
                        $username = $row['username'];
                        $phone = $row['phone'];
                        $email = $row['email'];

                        $room_name = $row['room_name'];
                        $name_type = $row['name_type'];
                        $o_slip = $row['slip'];
                        $price = $row['price']; //ราคาประเภทห้องตามขนาด
                        $priceroom = $row['price'] * $row['hours']; //ราคาห้อง * ชม
                        $sumfood = $row['sumfoodprice']; // ราคารวมอาหาร
                        $sumtotal =  $priceroom + $sumfood; //suntotal = ค่าอาหารทั้งหมด + ราคา*ชม
                        $amout = $sumtotal - $price;
                        // echo $sumtotal;

                        // echo $priceroom;
                        // echo $sumfood;
                        // exit;
                    ?>
                        <tr class="tablelist">
                            <!-- <th><?php echo   $pic  ?></th> -->
                            <td class="tablelist"><?php echo $num; ?></td>
                            <td class="tablelist" style="text-align: left;">
                                ประเภท: <?php echo $row["name_type"] ?><br>
                                ห้อง : <?php echo $row["room_name"] ?>
                            </td>
                            <td class="tablelist" style="text-align: left;">
                                <?php echo date("d/m/y", strtotime($row["timeplays"])) ?><br>
                                เวลา : <?php echo $row["timeplays"] ?> <br>
                                จำนวน : (<?php echo $row["hours"] ?> ชม.)
                            </td>
                            <td class="tablelist">
                                <?php echo $sumtotal  ?>
                            </td>
                            <td class="tablelist">
                                <?php echo $amout  ?>
                            </td>

                            <td class="tablelist">
                                <?php
                                $st = $row['statusRoomid'];

                                if ($st == 1) {
                                    echo ' 
                                    <span class="badge rounded-pill bg-warning text-dark" >
                                        ชำระเงินมัดจำแล้ว
                                    </span> ';
                                } elseif ($st == 2) {
                                    echo ' 
                                    <span class="badge rounded-pill bg-success" >
                                        เช็คอินเข้าแล้ว
                                    </span> ';
                                } elseif($st == 0) {
                                    // echo ' 
                                    // <span class="badge rounded-pill bg-secondary" >
                                    //     cancle
                                    // </span> ';
                                    
                                }else{
                                    echo ' 
                                    <span class="badge rounded-pill bg-secondary" >
                                        ใช้บริการเสร็จสิ้น
                                    </span> ';
                                }
                                ?>
                            </td>
                            <td class="tablelist">
                                <?php
                                if ($st == $row['statusRoomid']) {
                                ?>
                                    <a href="#staticBackdrop1<?php echo  $bookDE_id; ?>" class="btn btn-info btn-sm" data-bs-toggle="modal"><i class="bi bi-search"></i>แสดงข้อมูล</a>
                                    <div class="modal fade" id="staticBackdrop1<?php echo  $bookDE_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <!-- <div class="modal-header">
                                                        <h5 class="modal-title fw-bold p-3 text-start"  id="exampleModalLongTitle">รายการจองของคุณ :
                                                            <?php echo $row["username"] ?>
                                                        </h5>
                                                    </div> -->
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-body text-start">
                                                                    <h5>
                                                                        วัน/เวลาที่ทำการจอง :
                                                                        <?php echo date("d/m/y H:i", strtotime($row['bkdatetime'])) ?><br>
                                                                        Username : <?php echo $row['username']; ?> <br>
                                                                        Tel : <?php echo $row['phone']; ?> <br>
                                                                        E-mail : <?php echo $row['email']; ?> <br>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <section class="container" style="text-align: left;">
                                                            <P class="fs-5 fw-bold">รายการจอง</P>
                                                        </section>


                                                        <div class="container">
                                                            <table id="tablebookdetail">
                                                                <thead class="tablebookdetail">
                                                                    <th class="tablebookdetail">ชื่อห้อง</th>
                                                                    <th class="tablebookdetail">ประเภทห้อง</th>
                                                                    <th class="tablebookdetail">จำนวนคน</th>
                                                                    <th class="tablebookdetail">หมายเหตุ</th>
                                                                    <th class="tablebookdetail">วันที่เลือกจอง</th>
                                                                    <th class="tablebookdetail" style="text-align: left;">เวลาเริ่มและสิ้นสุด</th>
                                                                    <th class="tablebookdetail">ราคาห้อง</th>
                                                                    <th class="tablebookdetail">จำนวนชั่วโมง</th>
                                                                    <th class="tablebookdetail">ราคาห้องรวม (บาท)</th>
                                                                    <!-- <th scope="col">ราคามัดจำ (50%)(บาท)</th> -->
                                                                </thead>
                                                                <tbody class="tablebookdetail">
                                                                    <tr class="tablebookdetail">
                                                                        <td class="tablebookdetail"><?php echo $row['room_name']; ?>
                                                                        </td>
                                                                        <td class="tablebookdetail"><?php echo $row['name_type']; ?>
                                                                        </td>
                                                                        <td class="tablebookdetail"><?php echo $row['num']; ?></td>
                                                                        <td class="tablebookdetail"><?php echo $row['note']; ?></td>
                                                                        <td class="tablebookdetail">
                                                                            <?php echo date("d/m/y", strtotime($row['date'])) ?>
                                                                        </td>
                                                                        <td class="tablebookdetail"><?php echo $row['timeplays']; ?>
                                                                        </td>
                                                                        <td class="tablebookdetail"><?php echo $row['price']; ?>
                                                                        </td>
                                                                        <td class="tablebookdetail"><?php echo $row['hours']; ?>
                                                                        </td>
                                                                        <td class="tablebookdetail text-danger">
                                                                            <?php echo $row['price'] * $row['hours']; ?></td>
                                                                        <!-- <td class="text-red">0</td> -->
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><br>

                                                        <section class="container" style="text-align: left;">
                                                            <P class="fs-5 fw-bold">อาหารและเครื่องดื่ม</P>
                                                        </section>
                                                        <?php
                                                        // $bookDE = $_GET["bookDE_id"];
                                                        // $no = "SELECT * FROM booking_detail WHERE bookDE_id =  $bookDE";
                                                        // $resultNo = mysqli_query($conn, $no);
                                                        // $rowNo = mysqli_fetch_array($resultNo);
                                                        if ($sumfood > 0) {


                                                        ?>
                                                            <div class="container">
                                                                <table id="tablefood" style="text-align: left;">
                                                                    <thead class="tablefood">
                                                                        <th class="tablefood">ชื่อเมนู</th>
                                                                        <th class="tablefood">จำนวน</th>
                                                                        <th class="tablefood">ราคา / ชิ้น</th>
                                                                        <th class="tablefood">รวม</th>
                                                                    </thead>
                                                                    <tbody class="tablefood">
                                                                        <?php
                                                                        // $bookDE = $_GET["bookDE_id"];
                                                                        // echo  $bookDE;
                                                                        $sqlFood = "SELECT * FROM booking_detail 
                                                                    INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id 
                                                                    INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id 
                                                                    WHERE order_food.bookDE_id = '$bookDE_id' ";
                                                                        $resultFood = mysqli_query($conn, $sqlFood);
                                                                        // $rowfood = mysqli_fetch_array($resultFood)
                                                                        while ($rowfood = mysqli_fetch_array($resultFood)) {
                                                                        ?>
                                                                            <tr role="row" class="tablefood">
                                                                                <td class="tablefood" role="cell" style="text-align: left;">
                                                                                    <?php echo $rowfood['food_name']; ?></td>
                                                                                <td class="tablefood" role="cell">x
                                                                                    <?php echo  $rowfood['qty']; ?></td>
                                                                                <td class="tablefood" role="cell">
                                                                                    <?php echo $rowfood['pd_price']; ?></td>
                                                                                <td class="tablefood" role="cell">
                                                                                    <?php echo $rowfood['pd_price'] * $rowfood['qty'] ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="container">
                                                                <h5>--- ไม่มีการสั่งอาหาร ---</h5>
                                                            </div>


                                                        <?php } ?>
                                                        <!-- <div class="container"> -->
                                                        <p class="text-end text-danger">รวมค่าอาหาร :
                                                            <?php echo $row['sumfoodprice']; ?>
                                                        </p>

                                                        <div class="container">
                                                            <div class="border p-2  ">
                                                                <p class="fs-5 border-bottom fw-bold text-start">สรุปราคาทั้งหมด</p>
                                                                <div class="row justify-content-between">
                                                                    <?php
                                                                    $pprice = "SELECT * FROM booking_detail 
                                                                    INNER JOIN room_type_detail 
                                                                    ON booking_detail.room_typeid = room_type_detail.roomtype_id 
                                                                    INNER JOIN booking
                                                                    ON booking_detail.booking_id = booking.booking_id
                                                                     WHERE booking_detail.bookDE_id = '$bookDE_id' ";
                                                                    $resultPrice = mysqli_query($conn, $pprice);
                                                                    while ($rowPrice = mysqli_fetch_array($resultPrice)) {
                                                                        $price_food = $rowPrice['sumfoodprice'];
                                                                        $price_room = $rowPrice['hours'] * $rowPrice['price'];
                                                                        $slip = $rowPrice['slip'];
                                                                        // echo $slip;

                                                                    ?>
                                                                        <div class="col-11 text-start">
                                                                            <p class="fs-6 lh-base">
                                                                                รวมทั้งหมด
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <p class="fs-6 lh-base text-danger">
                                                                                <?php echo $price_food +  $price_room ?> บาท
                                                                            </p>

                                                                        </div>
                                                                </div>
                                                            </div><br>

                                                            <section class="container mt-2">
                                                                <P class="fs-5 fw-bold text-start">หลักฐานการชำระเงิน</P>
                                                                <img src="<?php echo $rowPrice['slip']; ?>" class="center" alt="">
                                                                <style>
                                                                    .center {
                                                                        display: block;
                                                                        margin-left: auto;
                                                                        margin-right: auto;
                                                                        width: 25%;
                                                                        object-fit: cover;
                                                                    }
                                                                </style>
                                                            </section>
                                                        </div>
                                                    <?php } ?>



                                                    <!-- </div> -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                        <!-- <button type="button" class="btn btn-primary">ยืนยันการชำระเงิน</button> -->
                                                    </div>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>

        </div>
                            <?php
                            $num++;
                                } if ($st == 1) {
                                    // echo" $bookDE_id ";
                                    echo"
                                    <a href='./cancelupdate2.php?bookDE_id=".$bookDE_id."' class='btn btn-danger btn-sm'>ยกเลิกการจอง</a> 
                                    ";
                                
                        }
                    }
?>
<!-- <a href='./cancelupdate2.php?bookDE_id=<?php echo $bookDE_id ?>' class='btn btn-danger btn-sm'>ยกเลิกการจอง</a> -->

</td>
</tr>
</tbody>
</table>
    </div>
    </div> <br>

    <div class="container">
        <h3 class="text-uppercase fw-bold">Hip Karaoke | ราการที่ถูกยกเลิก</h3>
        <div id="overflowTest">
            <table class="table align-middle" id="tablelist">
                <thead class="tablelist">
                    <th class="tablelist">ลำดับ</th>
                    <th class="tablelist" style="text-align: left;">ประเภท</th>
                    <th class="tablelist" style="text-align: left;">วันที่เข้าใช้บริการ</th>
                    <th class="tablelist">ราคาทั้งหมด</th>
                    <th class="tablelist">เหลือ</th>
                    <th class="tablelist">สถานะ</th>
                    <th class="tablelist"></th>
                </thead>
                <tbody class="tablelist">
                    <?php
                    $getSlip11 = "SELECT *  FROM customer JOIN booking_detail
                    ON booking_detail.cus_id = customer.cus_id 
                    JOIN room_detail
                    ON booking_detail.room_id= room_detail.room_id
                    JOIN room_type_detail
                    ON booking_detail.room_typeid = room_type_detail.roomtype_id
                    JOIN booking ON booking.booking_id = booking_detail.booking_id 
                    WHERE customer.cus_id =  $_SESSION[cus_id] AND booking_detail.statusRoomid = 0 
                    ORDER BY booking_detail.bookDE_id DESC  ";
                    $result11 = mysqli_query($conn, $getSlip11);
                    $num = 1;
                    while ($row11 = mysqli_fetch_array($result11)) {
                        $bookDE_id = $row11['bookDE_id'];
                        $username = $row11['username'];
                        $phone = $row11['phone'];
                        $email = $row11['email'];

                        $room_name = $row11['room_name'];
                        $name_type = $row11['name_type'];
                        $o_slip = $row11['slip'];
                        $priceroom = $row11['price'] * $row11['hours'];
                        $sumfood = $row11['sumfoodprice'];

                        // echo $priceroom;
                        // echo $sumfood;
                        // exit;
                    ?>
                        <tr class="tablelist">
                            <!-- <th><?php echo   $pic  ?></th> -->
                            <td class="tablelist"><?php echo $num; ?></td>
                            <td class="tablelist" style="text-align: left;">
                                ประเภท: <?php echo $row11["name_type"] ?><br>
                                ห้อง : <?php echo $row11["room_name"] ?>
                            </td>
                            <td class="tablelist" style="text-align: left;">
                                <?php echo date("d/m/y", strtotime($row11['date'])) ?><br>
                                เวลา : <?php echo $row11["timeplays"] ?> <br>
                                จำนวน : (<?php echo $row11["hours"] ?> ชม.)
                            </td>
                            <td class="tablelist">
                                <?php echo $priceroom + $sumfood  ?>
                            </td>
                            <td class="tablelist">
                                <?php echo $sumfood  ?>
                            </td>

                            <td class="tablelist">
                                <?php
                                $st1 = $row11['statusRoomid'];

                                if ($st1 == 0) {
                                    echo ' 
                                    <span class="badge rounded-pill bg-danger" >
                                       ถูกยกเลิกแล้ว
                                    </span> ';
                                } elseif ($st1 == 1) {
                                    echo ' 
                                    <span class="badge rounded-pill bg-success" >
                                        เช็คอินเข้าแล้ว
                                    </span> ';
                                } else {
                                    echo ' 
                                    <span class="badge rounded-pill bg-secondary" >
                                        ใช้บริการเสร็จสิ้น
                                    </span> ';
                                }
                                ?>
                            </td>
                            <td class="tablelist">
                                <?php
                                if ($st1 == 0) {
                                ?>
                                    <a href="#staticBackdrop1<?php echo  $bookDE_id; ?>" class="btn btn-info btn-sm" data-bs-toggle="modal"><i class="bi bi-search"></i> แสดงข้อมูล</a>
                                    <div class="modal fade" id="staticBackdrop1<?php echo  $bookDE_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="card-body ">
                                                            <div class="row border border-1 rounded-1">

                                                                <form class="row">
                                                                    <div class="col-12">
                                                                        <br>
                                                                        <p class="fs-5 fw-bold">รายการที่จอง</p>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-2 col-form-label">ชื่อห้อง :
                                                                                <?php echo $room_name ?></label>
                                                                            <label class="col-sm-3 col-form-label">ประเภทห้องห้อง :
                                                                                <?php echo $name_type ?></label>
                                                                        </div>

                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <th>ชื่อเมนู</th>
                                                                                <th>จำนวน</th>
                                                                                <th>ราคา / ชิ้น</th>
                                                                                <th>รวม</th>

                                                                                <?php

                                                                                $food = "SELECT *  FROM order_food JOIN booking_detail
                                                                                        ON order_food.bookDE_id = booking_detail.bookDE_id 
                                                                                        JOIN food_detail
                                                                                        ON order_food.food_detail_id= food_detail.food_detail_id 
                                                                                        WHERE order_food.bookDE_id =  $bookDE_id;";
                                                                                $resultFood = mysqli_query($conn, $food);
                                                                                $num2 = 1;
                                                                                while ($rowFood = mysqli_fetch_array($resultFood)) {


                                                                                ?>
                                                                                    <tr>
                                                                                        <td style="border: none;">
                                                                                            <?php echo $rowFood['food_name']; ?></td>
                                                                                        <td style="border: none;">x
                                                                                            <?php echo $rowFood['qty']; ?></td>
                                                                                        <td style="border: none;">
                                                                                            <?php echo $rowFood['pd_price']; ?></td>
                                                                                        <td style="border: none;">
                                                                                            <?php echo $rowFood['pd_price'] * $rowFood['qty'];; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php
                                                                                    $num2++;
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                        </div>

                                                                </form>

                                                                <form>
                                                                    <p class="fs-5 fw-bold">ข้อมูลการชำระเงิน</p>
                                                                    <div class="mb-1 row">
                                                                        <label class="col-form-label">จ่ายมัดจำค่าห้อง :
                                                                            <?php echo $priceroom ?> บาท</label>
                                                                    </div>

                                                                    <div class="mb-1 row">
                                                                        <label class="col-sm-3 col-form-label">เหลือที่ต้องจ่าย :
                                                                            <?php echo $sumfood ?> บาท</label>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-2 col-form-label">ภาพอัพสลิป :</label>
                                                                        <div class="col-12">
                                                                            <img src="<?php echo $o_slip ?>" class="center" alt="" srcset="">
                                                                            <style>
                                                                                .center {
                                                                                    display: block;
                                                                                    margin-left: auto;
                                                                                    margin-right: auto;
                                                                                    width: 20%;
                                                                                    object-fit: cover;
                                                                                }
                                                                            </style>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                        <!-- <button type="button" class="btn btn-primary">ยืนยันการชำระเงิน</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php

                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>

                </tbody>
            </table><br>
        </div>
    </div><br>



    <footer class="sticky-bottom">
        <p class="text-center mt-3">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- <script src="./js/bootstrap.min.js"></script> -->
<script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</html>