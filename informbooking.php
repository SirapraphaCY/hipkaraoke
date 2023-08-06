<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ห้องมูลการจอง</title>
    <link rel="icon" href="./img/logo1.svg" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css">
    <link rel="stylesheet" href="./css_style/homepage_style.css?v">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>


    <script>
        function deletefood(food_detail_id) {
            if (confirm("คุณต้องการลบรายการนี้ทั้งหมดใช่หรือไม่")) {
                document.getElementById("tr_" + food_detail_id).remove();
                delete food_detail[food_detail_id]
            }
            cal()
        }
        let food_detail = {};

        function cal() {
            let total = 0;
            for (i in food_detail) {
                let price = parseInt(document.getElementById("price_" + i).innerHTML)
                total += price * food_detail[i]
            }
            document.getElementById("sumprice").value = total;
            console.log(food_detail)
        }

        function addcart(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                value.innerHTML = parseInt(value.innerHTML) + 1;
                food_detail[food_detail_id] = food_detail[food_detail_id] + 1;
            } else {
                let cart = document.getElementById("allcart");
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                let count = 0;
                xmlhttp.onreadystatechange = function() {

                    if (xmlhttp.responseText != "" && count == 0) {
                        count++;
                        cart.innerHTML += xmlhttp.responseText;
                        food_detail[food_detail_id] = 1;
                        cal()
                    }

                }
                let num = cart.childElementCount + 1;
                xmlhttp.open("GET", "./cart.php?addtocart&food_detail_id=" + food_detail_id + "&numrow=" + num, true);
                xmlhttp.send();
            }
            cal()
        }

        function delfood(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                if (value.innerHTML == 1) {
                    // let con = confirm("คุณต้องการลบสินค้าใช่หรือไม่");
                    // if (con) {
                    document.getElementById("tr_" + food_detail_id).remove();
                    delete food_detail[food_detail_id]
                    // }
                } else {
                    value.innerHTML = parseInt(value.innerHTML) - 1;
                    food_detail[food_detail_id] = food_detail[food_detail_id] - 1;
                }
            }
            cal()
        }

        function plusfood(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                value.innerHTML = parseInt(value.innerHTML) + 1;
                food_detail[food_detail_id] = food_detail[food_detail_id] + 1
            }
            cal()
        }

        function deletefood(food_detail_id) {
            if (confirm("คุณต้องการลบรายการนี้ทั้งหมดใช่หรือไม่")) {
                document.getElementById("tr_" + food_detail_id).remove();
                delete food_detail[food_detail_id]
            }
            cal()
        }

        function savetocart() {
            // let cus_id = "";
            let str_food_detail = "";
            let str_numfood_items = "";
            let num = 0;
            for (i in food_detail) {
                if (num == 0) {
                    str_food_detail += i;
                    str_numfood_items += food_detail[i];
                } else {
                    str_food_detail += "," + i;
                    str_numfood_items += "," + food_detail[i];

                }
                num++;
            }
            let total = document.getElementById("sumprice").value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();

            } else {
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }

            let count = 0;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.responseText != "" && count == 0) {
                    count++;
                    console.log(xmlhttp.responseText)
                    document.getElementById("allcart").innerHTML = "";
                    let str_pd = "";
                    let str_qty = "";
                    let pd_buf = "";
                    let i = 0;
                    for (pd_buf in food_detail) {
                        if (i == 0) {
                            str_pd += pd_buf
                            str_qty += food_detail[pd_buf]
                        } else {
                            str_pd += "," + pd_buf
                            str_qty += "," + food_detail[pd_buf]
                        }
                        i++;
                    }

                    console.log(xmlhttp.responseText)
                    window.location = "./informbooking.php?pd_id=" + xmlhttp.responseText;
                    loadData()
                }

            }

            xmlhttp.open("GET", "./cart.php?savetocart&food_detail_id=" + str_food_detail + "&qty=" + str_numfood_items +
                "&total=" + total, true);
            xmlhttp.send();
        }
    </script>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container-fluid">
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
                            <a class="nav-link" href="./bookinglist.php">รายการที่จอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                การตั้งค่าความเป็นส่วนตัว
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./profilecustomer.php">ข้อมูลส่วนตัว</a></li>
                                <li><a class="dropdown-item" href="./historyuser.php">ประวัติการใช้งาน</a></li>
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

    <section class="hip container mt-3 fw-bold">
        <P class="fs-3 text-uppercase">Hip Karaoke | ข้อมูลการจองห้อง</P>
    </section>


    <?php
    require './connection/connecdb.php';

    $customer = $_SESSION['cus_id'];
    $username = $_SESSION['username'];

    $getData = $_GET['pd_id'];
    $sqlBookD = "SELECT * FROM booking_detail 
    JOIN booking ON booking.booking_id = booking_detail.booking_id 
    JOIN order_food ON booking.booking_id = order_food.booking_id 
    JOIN room_type_detail ON booking_detail.room_typeid = room_type_detail.roomtype_id
    WHERE booking.booking_id = booking_detail.booking_id  
    ORDER BY booking_detail.booking_id  DESC LIMIT 1";
    $resultBookD = mysqli_query($conn, $sqlBookD);
    $rowBookD = mysqli_fetch_array($resultBookD);
    $bookDE_id = $rowBookD['bookDE_id'];
    $date = $rowBookD['date'];
    $timeplays = $rowBookD['timeplays'];
    // $end_time = $rowBookD['end_time'];
    $num = $rowBookD['num'];
    $roomtype = $rowBookD['room_typeid'];
    $nametype = $rowBookD['name_type'];
    $bkdatetime = $rowBookD['bkdatetime'];


    // echo $date;
    // echo $getData;
    ?>
    <div class="container mt-2">
        <div class="card-body shadow-sm rounded ">
            <div class="row">
                <div class="col-md-4">
                    <P class="fs-3 text-uppercase fw-bold">
                        การจองของคุณ <?php echo $username; ?>
                    </P>
                </div>
                <div class="col-md-4 offset-md-4 text-end">
                    <?php echo date("d/m/y (H:i) ", strtotime($rowBookD['bkdatetime'])) ?>
                </div>
            </div>

            <div class="row fw-bold">
                <div class="col-sm-3 text-center">
                    <div class="border-end">
                        <div class="card-body">
                            <span class="fs-4">ขนาดห้อง</span>
                            <p class="fs-4">
                                <?php echo $rowBookD['name_type']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <div class="border-end">
                        <div class="card-body">
                            <span class="fs-4">วันที่เลือกจอง</span>
                            <p class="fs-4">
                                <?php echo date("d/m/y", strtotime($rowBookD['date'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <div class="border-end">
                        <div class="card-body">
                            <span class="fs-4">เวลาจอง</span>
                            <p class="fs-4">
                                <?php echo $rowBookD['timeplays'] ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 text-center">
                    <div>
                        <div class="card-body">
                            <span class="fs-4">จำนวนคน</span>
                            <p class="fs-4">
                                <?php echo $rowBookD['num']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row justify-content-between">

                <div class="col-4 text-end">
                    <span class="fs-4"></span>
                </div>
            </div>
            <!-- <button type="button" onclick="location.href='./roomdetail.php'" class="btn btn-outline-danger mt-2">
                <i class="bi bi-door-open fs-5"></i>แก้ไขประเภทห้อง
            </button> -->



            <P class="fs-3 text-uppercase mt-2 fw-bold">อาหารและเครื่องดื่ม <?php //echo $username; 
                                                                            ?></P>


            <div class="d-flex justify-content-center">
                <table class="table table-borderles">
                    <thead>
                        <th>ชื่อเมนู</th>
                        <th>จำนวน</th>
                        <th>ราคา(ชิ้น)</th>
                        <th>รวม</th>
                    </thead>

                    <?php
                    include "./connection/connecdb.php";
                    $getData = $_GET['pd_id'];
                    $sqlFood = "SELECT*FROM booking_detail 
                    JOIN order_food
                    ON order_food.bookDE_id = booking_detail.bookDE_id
                    JOIN food_detail 
                    ON order_food.food_detail_id = food_detail.food_detail_id 
                    WHERE booking_detail.bookDE_id =  $getData ";
                    $resultFood = mysqli_query($conn, $sqlFood);

                    //  $foodDE = $resultFood['food_detail_id'];

                    //  echo $foodDE;
                    //  echo $foodName;

                    $count = 0;
                    $sum = 0;
                    $i = 1;
                    while ($row = mysqli_fetch_array($resultFood)) {
                        $count += intval($row['qty']);
                        $sum += intval($row['sumfoodprice']);
                    ?>
                        <tr id="tr_<?php echo $row["food_detail_id"] ?>">
                            <td colspan="" ><?php echo $row['food_name']; ?></td>

                            <td >x<?php echo $row['qty']; ?></td>
                            <!-- <td><?php echo $row['price']; ?></td> -->
                            <!-- <input type="text" class="sum" id="sumprice" style="border: none;" placeholder="0"  readonly> -->

                            <td id="price_<?php echo $row["food_detail_id"] ?>"><?php echo $row['pd_price'] ?></td>
                            <td><?php echo $row['price'] * $row['qty'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <?php
                        include "./connection/connecdb.php";
                        $getData = $_GET['pd_id'];
                        $sqlFood = "SELECT*FROM booking_detail 
                        JOIN order_food
                        ON order_food.bookDE_id = booking_detail.bookDE_id
                        JOIN food_detail 
                        ON order_food.food_detail_id = food_detail.food_detail_id 
                        WHERE booking_detail.bookDE_id =  $getData ";
                        $resultFood = mysqli_query($conn, $sqlFood);
                        $row = mysqli_fetch_array($resultFood);

                        $sumfood = $row['sumfoodprice'];
                        ?>
                        <td  colspan="3"></td>
                        <td> รวมราคา : <?php echo $row['sumfoodprice']; ?></td>
                    </tr>
                </table>

            </div>

            <!-- <button type="button" onclick="location.href='./bookingMenu.php'" class="btn btn-outline-danger mt-2">
                <i class="bi bi-cart3 fs-5"></i> เพิ่มเมนู
            </button> -->
            <!-- <div class="container">
                <hr>
            </div>  -->

            <section class="hip container">
                <P class="fs-2 text-uppercase mt-4">การชำระเงิน</P>
            </section>
            <!-- <div class="d-flex justify-content-center"> -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">ชำระแบบมัดจำ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">ชำระทั้งหมด</label>
            </div>
            <!-- </div> -->

            <section class="hip container">
                <P class="fs-5 text-uppercase mt-4 text-danger fw-bold">เงื่อนไข</P>
            </section>
            <div class="container">
                <p class="text-start border border-danger border-2 p-5">
                    1. เมื่อจองห้องคาราโอเกะแล้ว ต้องชำระเงินการจอง ภายใน 24 ชั่วโมง หากพ้นกำหนดจะถือว่าสละสิทธิ์
                    ระบบจะตัดสิทธิ์การจองโดยอัตโนมัติ<br>
                    2. ทางร้าน ขอสงวนสิทธิ์ในการคืนเงินมัดจำในทุกๆกรณี<br>
                    3. กรุณาชำระเงินภายใน 24 ชั่วโมง หากไม่ชำระเงินภายในเวลาที่กำหนด ระบบจะทำการยกเลิกการจองอัตโนมัติ
                </p>
            </div>

        </div>




        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
            <button type="button" onclick="location.href='./homepage.php'" class="btn btn-dark"><i class="bi bi-chevron-left"></i> ย้อนกลับ</button>
            <!-- <button type="button" onclick="location.href='./bookingpayment.php'" class="btn btn-outline-danger">ยืนยันข้อมูล<i class="bi bi-chevron-right"></i></button> -->


            <?php
            echo
            " <a href='./bookingpayment.php?pd_id=" . $bookDE_id . "' class='btn btn-success'>ยืนยันข้อมูล <i
                class='bi bi-chevron-right'></i> </a >"
            ?>

        </div><br>
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