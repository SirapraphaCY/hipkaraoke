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
            content: "ชื่อ";
        }

        td.tablelist:nth-of-type(3):before {
            content: "วันที่จองคิว";
        }


        td.tablelist:nth-of-type(4):before {
            content: "ห้อง / ประเภท";
        }

        td.tablelist:nth-of-type(8):before {
            content: "สถานะ";
        }

        td.tablelist:nth-of-type(6):before {
            content: "รวมทั้งหมด";
        }

        td.tablelist:nth-of-type(5):before {
            content: "ราคาที่จ่ายมัดจำ";
        }

        td.tablelist:nth-of-type(7):before {
            content: "เหลือที่ต้องจ่าย";
        }

        td.tablelist:nth-of-type(9):before {
            content: "ดูรายละเอียด";
        }

        td.tablelist:nth-of-type(10):before {
            content: "จัดการ";
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
        height: 50px;
        /* text-align: center; */
        color: #FDFEFE;

    }

    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        tr.tablefood:nth-child(odd) {
            background: #f2f2f2;
        }

    }
</style>
<?php require "./connection/connecdb.php";

if (isset($_GET["getData"])) {
    $type = $_GET["getData"];
    // if ($type == "all") 
?>
    <table role="table" id="tablelist" class="table-hover">
        <thead role="rowgroup" class="tablelist">
            <th role="columnheader" class="tablelist">ลำดับ</th>
            <th role="columnheader" class="tablelist">ชื่อ</th>
            <th role="columnheader" class="tablelist" style="text-align: left;">วันที่จองคิว</th>
            <th role="columnheader" class="tablelist" style="text-align: left;">ห้อง / ประเภท</th>

            <th role="columnheader" class="tablelist">รวมทั้งหมด</th>
            <th role="columnheader" class="tablelist">ราคาที่จ่ายมัดจำ</th>
            <th role="columnheader" class="tablelist">เหลือที่ต้องจ่าย</th>
            <th role="columnheader" class="tablelist">สถานะ</th>
            <th role="columnheader" class="tablelist">รายละเอียด</th>
            <th role="columnheader" class="tablelist">จัดการ</th>
        </thead>
        <tbody role="rowgroup" class="tablelist">
            <?php
            $sql = "SELECT * FROM booking_detail
                JOIN customer 
                ON booking_detail.cus_id = customer.cus_id
                JOIN booking 
                ON booking_detail.booking_id = booking.booking_id
                JOIN room_detail
                ON booking_detail.room_id = room_detail.room_id
                JOIN room_type_detail
                ON room_detail.roomtype_id = room_type_detail.roomtype_id 
                WHERE booking_detail.statusRoomid != 0
                ORDER BY booking_detail.bookDE_id DESC";
            $resultTable = mysqli_query($conn, $sql);
            $num11 = 1;
            while ($row = mysqli_fetch_array($resultTable)) {

                $priceroom = $row['price'] * $row['hours'];
                $sumfood = $row['sumfoodprice'];
                $bookDE_id = $row['bookDE_id'];
                $st = $row['statusRoomid'];
                // echo  $st;
                // echo $sumfood;
                // exit;
                // $hours = $row['hours'];
                // $sumroom = $row['price'] * $row['hours'];
                // echo $sumroom;
                // echo $priceroom;    
                // echo $hours;
                // exit;
            ?>
                <tr role="row" class="tablelist">
                    <td role="cell" class="tablelist"><?php echo $num11 ?></td>
                    <td role="cell" class="tablelist"><?php echo $row["username"] ?></td>
                    <td role="cell" class="tablelist" style="text-align: left;"><?php echo date("d/m/y H:i", strtotime($row["bkdatetime"]))  ?></td>
                    <td role="cell" class="tablelist" style="text-align: left;">
                        <?php echo $row["room_name"] ?><br>
                        ประเภท : <?php echo $row["name_type"] ?>
                    </td>


                    <td role="cell" class="tablelist"><?php echo $priceroom + $sumfood  ?></td>
                    <td role="cell" class="tablelist"><?php echo $priceroom ?></td> <!-- ราคาห้องที่จ่ายมัดจำ * ชม ที่จอง -->

                    <td role="cell" class="tablelist"><?php echo $row['sumfoodprice']; ?></td>
                    <td role="cell" class="tablelist">

                        <!-- สถานะ:  -->
                        <?php


                        if ($st == 1) {
                            echo ' 
                            <span class="badge rounded-pill bg-warning text-dark" style="font-size: 0.7em;" >
                                ชำระเงินมัดจำ
                            </span> ';
                        } elseif ($st == 2) {
                            echo ' 
                            <span class="badge rounded-pill bg-success" style="font-size: 0.7em;">
                                กำลังใช้งาน
                            </span> ';
                        } else {
                            echo ' 
                            <span class="badge rounded-pill bg-secondary" style="font-size: 0.7em;" >
                                เสร็จสิ้น
                            </span> ';
                        }
                        ?> <br>

                    </td>

                    <td role="cell" class="tablelist">
                        <button type="button" class="btn btn-info btn-sm" style="font-size: 0.8em;" onclick="getDetail(<?php echo $row['bookDE_id'] ?>)"> ตรวจสอบ</button>
                    </td>
                    <td role="cell" class="tablelist">
                        <?php

                        if ($st == 1) {
                            echo " 
                                <a href='./updatebooking.php?bookDE_id=" . $bookDE_id . "' class='btn btn-success' >เช็คอิน</a>
                                <a href='./cancelupdate.php?bookDE_id=" . $bookDE_id . "' class='btn btn-danger' >ยกเลิกจอง</a>
                            ";
                        } elseif ($st == 2) {
                            echo "  
                            <a href='./updatebooking2.php?bookDE_id=" . $bookDE_id . "'  class='btn btn-secondary' >เช็คเอาท์</a>
                            ";
                        } else {
                            echo "
                           <p class='fst-italic'>เสร็จสิ้น</p>
                           ";
                        }
                        ?>

                        <!-- <a href='./updatebooking.php?bookDE_id=<?php echo $bookDE_id ?> ' class=' btn btn-success'>เช็คอิน</a> -->

                        <!-- <a href="#" class="btn btn-danger"><i class="bi bi-x-circle"></i> ยกเลิกการจอง</a> -->
                    </td>

                </tr>
            <?php
                $num11++;
            }
            ?>
        </tbody>
    </table>
<?php
}
// modal ตรวจสอบการจองห้อง //

if (isset($_GET["getDetail"])) {
    $bookDE = $_GET["bookDE_id"];
    $sqlDetail = "SELECT * FROM customer JOIN booking_detail
        ON booking_detail.cus_id = customer.cus_id
        JOIN order_food 
        ON order_food.bookDE_id = booking_detail.bookDE_id 
        JOIN food_detail
        ON order_food.food_detail_id = food_detail.food_detail_id 
        WHERE booking_detail.bookDE_id = $bookDE";
    $result = mysqli_query($conn, $sqlDetail);

    $getUser = "SELECT *  FROM customer JOIN booking_detail
        ON booking_detail.cus_id = customer.cus_id 
        JOIN room_detail
        ON booking_detail.room_id= room_detail.room_id
        JOIN room_type_detail
        ON booking_detail.room_typeid = room_type_detail.roomtype_id
        JOIN booking ON booking.booking_id = booking_detail.booking_id
        WHERE booking_detail.bookDE_id = $bookDE ";
    $result2 = mysqli_query($conn, $getUser);
    $rowName = mysqli_fetch_array($result2);
    $o_slip = $rowName['slip'];

?>
    <button id="btn_<?php echo $bookDE ?>" style="display: none;" type="button" class="btn btn-primary btn_format" data-toggle="modal" data-target="#modal<?php echo $bookDE ?>"></button>
    <div class="modal fade bd-example-modal-xl" id="modal<?php echo $bookDE ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLongTitle">รายการจองของคุณ : <?php echo $rowName["username"] ?></h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <p class="fs-5">
                                    วัน/เวลาที่ทำการจอง :
                                    <?php echo date("d/m/y H:i", strtotime($rowName['bkdatetime'])) ?><br>
                                    Username : <?php echo $rowName['username']; ?> <br>
                                    Tel : <?php echo $rowName['phone']; ?> <br>
                                    E-mail : <?php echo $rowName['email']; ?> <br>
                                </p>
                            </div>
                        </div>
                    </div>

                    <section class="container">
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
                                <th class="tablebookdetail">เวลาเริ่มและสิ้นสุด</th>
                                <th class="tablebookdetail">ราคาห้อง</th>
                                <th class="tablebookdetail">จำนวนชั่วโมง</th>
                                <th class="tablebookdetail">ราคาห้องรวม (บาท)</th>
                                <!-- <th scope="col">ราคามัดจำ (50%)(บาท)</th> -->
                            </thead>
                            <tbody class="tablebookdetail">
                                <?php
                                $bookDE = $_GET["bookDE_id"];
                                $sqlFrom = "SELECT * FROM  customer JOIN booking_detail
                                    ON booking_detail.cus_id = customer.cus_id
                                    JOIN order_food 
                                    ON order_food.bookDE_id = booking_detail.bookDE_id 
                                    JOIN food_detail
                                    ON order_food.food_detail_id = food_detail.food_detail_id 
                                    WHERE booking_detail.bookDE_id = $bookDE ";
                                $resultFrom = mysqli_query($conn, $sqlFrom);

                                $sqlFrom1 = "SELECT *  FROM customer JOIN booking_detail
                                    ON booking_detail.cus_id = customer.cus_id 
                                    JOIN room_detail
                                    ON booking_detail.room_id= room_detail.room_id
                                    JOIN room_type_detail
                                    ON booking_detail.room_typeid = room_type_detail.roomtype_id
                                    JOIN booking ON booking.booking_id = booking_detail.booking_id
                                    WHERE booking_detail.bookDE_id = $bookDE  ";
                                $result22 = mysqli_query($conn, $sqlFrom1);

                                $num22 = 1;

                                while ($row = mysqli_fetch_array($result22)) {
                                    $room_name = $row['room_name'];
                                    $nametype = $row['name_type'];
                                    $date    = $row['bkdatetime'];
                                    $phone = $row['phone'];
                                    $email = $row['email'];
                                    // $o_slip = $row['slip'];
                                ?>
                                    <tr role="row" class="tablebookdetail">
                                        <td class="tablebookdetail"><?php echo $row['room_name']; ?></td>
                                        <td class="tablebookdetail"><?php echo $row['name_type']; ?></td>
                                        <td class="tablebookdetail"><?php echo $rowName['num']; ?></td>
                                        <td class="tablebookdetail"><?php echo $rowName['note']; ?></td>
                                        <td class="tablebookdetail"><?php echo date("d/m/y", strtotime($row['date'])) ?></td>
                                        <td class="tablebookdetail"><?php echo $row['timeplays']; ?></td>
                                        <td class="tablebookdetail"><?php echo $row['price']; ?></td>
                                        <td class="tablebookdetail"><?php echo $row['hours']; ?></td>
                                        <td class="tablebookdetail text-danger"><?php echo $row['price'] * $row['hours']; ?></td>
                                        <!-- <td class="text-red">0</td> -->
                                    </tr>
                                <?php
                                    $num22++;
                                } ?>
                            </tbody>
                        </table>
                    </div><br>

                    <section class="container">
                        <P class="fs-5 fw-bold">อาหารและเครื่องดื่ม</P>
                    </section>

                    <div class="container">
                        <?php
                        $bookDE = $_GET["bookDE_id"];
                        $no = "SELECT * FROM booking_detail WHERE bookDE_id =  $bookDE";
                        $resultNo = mysqli_query($conn, $no);
                        $rowNo = mysqli_fetch_array($resultNo);
                        if ($rowNo['sumfoodprice'] > 0) {
                        ?>
                            <table id="tablefood">
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
                                    WHERE order_food.bookDE_id = '$bookDE' ";
                                    $resultFood = mysqli_query($conn, $sqlFood);
                                    // echo $bookDE ;
                                    // $rowfodd = 
                                    // $food_name = $rowfodd['food_name'];

                                    while ($rowfood = mysqli_fetch_array($resultFood)) {


                                    ?>
                                        <tr role="row" class="tablefood">

                                            <td class="tablefood" role="cell" style="text-align: left;"><?php echo $rowfood['food_name']; ?></td>
                                            <td class="tablefood" role="cell">x <?php echo  $rowfood['qty']; ?></td>
                                            <td class="tablefood" role="cell"><?php echo $rowfood['pd_price']; ?></td>
                                            <td class="tablefood" role="cell"><?php echo $rowfood['pd_price'] * $rowfood['qty'] ?></td>
                                        </tr>

                                    <?php


                                    }
                                    ?>

                                </tbody>

                            </table>

                            <p class="text-end text-danger">รวมค่าอาหาร : <?php echo $rowNo['sumfoodprice']; ?></p>



                            <!-- <div class="container"> -->
                            <div class="border p-3">
                                <p class="fs-5 border-bottom fw-bold">สรุปราคาทั้งหมด</p>
                                <div class="row justify-content-between">
                                    <?php
                                    $pprice = "SELECT * FROM booking_detail 
                                        INNER JOIN room_type_detail ON booking_detail.room_typeid = room_type_detail.roomtype_id 
                                        WHERE booking_detail.bookDE_id = '$bookDE' ";
                                    $resultPrice = mysqli_query($conn, $pprice);
                                    $rowPrice = mysqli_fetch_array($resultPrice);
                                    $price_food = $rowPrice['sumfoodprice'];
                                    $price_room = $rowPrice['hours'] * $rowPrice['price'];
                                    ?>
                                    <div class="col-11">
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
                                <P class="fs-5 fw-bold">ข้อมูลการชำระเงิน</P>
                                <img src="<?php echo $rowName['slip']; ?>" class="center" alt="">
                                <style>
                                    .center {
                                        /* display: block;
                                    margin-left: auto;
                                    margin-right: auto; */
                                        width: 30%;
                                        object-fit: cover;
                                    }
                                </style>
                            </section>
                    </div>


                <?php

                        } else {
                            // <!-- <h6>ไม่มีการสั่งอาหาร</h6><br> -->
                            echo "<h6>ไม่มีการสั่งอาหาร</h6>";

                ?>

                    <!-- </div> -->

                </div>


                <div class="container">
                    <div class="border p-3">
                        <p class="fs-5 border-bottom fw-bold">สรุปราคาทั้งหมด</p>
                        <div class="row justify-content-between">
                            <?php
                            // include "./connection/connecdb.php";
                            // $bookDE = $_GET["bookDE_id"];
                            $sqlFood = "SELECT * FROM booking_detail 
                            INNER JOIN room_type_detail ON booking_detail.room_typeid = room_type_detail.roomtype_id 
                            WHERE booking_detail.bookDE_id = '$bookDE' ";
                            $resultFood = mysqli_query($conn, $sqlFood);
                            $row = mysqli_fetch_array($resultFood);

                            $sumfood = $row['sumfoodprice'];
                            $priceroom = $row['price'] * $row['hours'];

                            // $hours =  ;
                            // echo $priceroom;
                            // echo $sumfood;

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


                    <section class="container mt-2">
                        <P class="fs-5 fw-bold">ข้อมูลการชำระเงิน</P>
                        <img src="<?php echo $rowName['slip']; ?>" class="center" alt="">
                        <style>
                            .center {
                                /* display: block;
                                    margin-left: auto;
                                    margin-right: auto; */
                                width: 30%;
                                object-fit: cover;
                            }
                        </style>
                    </section>
                </div>
            </div>
        </div>
<?php
                        }
                    }

?>