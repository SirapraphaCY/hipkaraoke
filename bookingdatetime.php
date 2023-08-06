<!DOCTYPE html>
<html>
<?php
require('./connection/connecdb.php');
session_start();
?>


<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>วันเวลาที่จอง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css"> -->
    <link rel="stylesheet" href="./css_style/homepage_style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link href='./packages/core/main.css' rel='stylesheet' />
    <link href='./packages/daygrid/main.css' rel='stylesheet' />
    <link href='./packages/timegrid/main.css' rel='stylesheet' />
    <link href='./packages/list/main.css' rel='stylesheet' />

    <!-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        #calendar {
            width: 100%;
            height: auto;
        }
    </style>

    <script src='./packages/core/main.js'></script>
    <script src='./packages/interaction/main.js'></script>
    <script src='./packages/daygrid/main.js'></script>
    <script src='./packages/timegrid/main.js'></script>
    <script src='./packages/list/main.js'></script>

    <?php
    require "./connection/connecdb.php";

    $patitin_data = array();
    $color = "";

    $query = "SELECT * FROM booking_detail INNER JOIN customer ON booking_detail.cus_id = customer.cus_id WHERE statusRoomid = '1' ";

    $result = $conn->query($query);

    while ($rs = $result->fetch_object()) {

        if ($rs->statusRoomid  == '1') {
            $color = '#FF6255';
            // if($rs->username == ){

        } else {
            $color = '#20FF8C';
        }

        $patitin_data[] = [
            'id' => $rs->bookDE_id,
            'title' => $rs->timeplays,
            'start' => $rs->date,
            //  'title' => $rs->username,
            // 'end' => $rs->date,
            'color' => $color,
        ];
    }
    $json = json_encode($patitin_data);
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            const dateNow = new Date()
            let yearNow = (dateNow.getFullYear())
            let monthNow = (dateNow.getMonth() + 1).toString()
            let dayNow = (dateNow.getDate()).toString()
            if (monthNow.length < 2)
                monthNow = '0' + monthNow;
            if (dayNow.length < 2)
                dayNow = '0' + dayNow;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridDay,listMonth'
                },
                defaultDate: yearNow + "-" + monthNow + "-" + dayNow,
                navLinks: true, // can click day/week names to navigate views
                // display business hours
                editable: true,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: <?php echo json_encode($patitin_data); ?>
            });

            calendar.render();
        });
    </script>

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
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>
                        <?php
                        include "./connection/connecdb.php";

                        $getSlip = "SELECT *  FROM customer WHERE cus_id ='" . $_SESSION['cus_id'] . "'  ";
                        $result2 = mysqli_query($conn, $getSlip);
                        $row = mysqli_fetch_array($result2);
                        $cus_id     = $_SESSION['cus_id'];
                        $username = $row['username'];
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
    </header>

    <section class="container mt-4">
        <h3 class="text-uppercase fw-bold">Hip Karaoke | กรุณาเลือกวันเวลา</h3>
    </section>
    <?php
    $detail = $_GET["detail"];
    // echo $detail;
    $sql = mysqli_query($conn, "SELECT * FROM room_type_detail   
    WHERE roomtype_id = $detail ");
    $row = mysqli_fetch_array($sql);

    $name_type = $row['name_type'];
    $price = $row['price'];
    $num_people = $row['num_people'];
    $roomName = $row['roomName'];
    $equipment = $row['equipment'];



    $sql2 = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id ='" . $_SESSION['cus_id'] . "' ");
    $row2 = mysqli_fetch_array($sql2);
    $cus_id = $row2['cus_id'];
    // echo $cus_id;

    // $username = $row2['username'];

    $sql1 = mysqli_query($conn, "SELECT * FROM booking WHERE booking_id = booking_id ");
    $row1 = mysqli_fetch_array($sql1);
    ?>
    <div class="container mt-4">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <p class="mb-0 fs-5 fw-bold">รายละเอียดห้องของคุณ <?php echo $row2['username']; ?></p><br>
                        <p class="card-text fs-6">
                            <strong>ชื่อห้อง :</strong>
                            <?php echo $row['roomName']; ?>
                            <br>
                            <strong>ขนาดห้อง :</strong>
                            <?php echo $row['name_type']; ?>
                            <br>
                            <strong>จำนวนคน :</strong>
                            <?php echo $row['num_people']; ?> คน
                            <br>
                            <strong>รายละเอียด :</strong>
                            ไมค์(<?php echo $equipment ?>)
                            <span><?php echo $row['detail']; ?></span>
                            <br>
                            <strong>ราคา/ชม. :</strong>
                            <?php echo $row['price']; ?>
                        </p>
                        <!-- <a href="#" class="stretched-link">Continue reading</a> -->



                        <div class="select-day">

                            <form class="row" action="bookingdatetime.php" method="GET">
                                <?php
                                $sqlCheck = "SELECT * FROM booking_detail";
                                $date = mysqli_query($conn, $sqlCheck);
                                ?>
                                <p class="mb-0 fs-5 fw-bold">กรุณาเลือกวันที่ต้องการจอง :</p><br>
                                <div class="col-12 fw-bold">
                                    <label class="form-label fs-6">วันที่ : </label>

                                    <div class="input-group">
                                        <input name="detail" class="form-control" type="hidden" value="<?php echo  $row['roomtype_id']; ?>" required>
                                        <input name="bookingdate" class="form-control" type="date" id="date" name="date" min='1899-01-01' max='3000-12-12' id="date" placeholder="dd-mm-yyyy" required>

                                        <script>
                                            var today = new Date();
                                            var dd = today.getDate();
                                            var mm = today.getMonth() + 1; //January is 0!
                                            var yyyy = today.getFullYear();
                                            if (dd < 10) {
                                                dd = '0' + dd
                                            }
                                            if (mm < 10) {
                                                mm = '0' + mm
                                            }
                                            today = yyyy + '-' + mm + '-' + dd;

                                            document.getElementById("date").setAttribute("min", today);
                                        </script>

                                        <input class="btn btn-success fw-bold" type="submit" value="เลือกเวลา" required>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>




                    <div class="h-100 bg-body rounded-3">
                        <!-- <div id="calendar" required></div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">


                        <div class="select-time fs-6" id="demo">
                            <form action="./addbookingdetail.php?detail=<?php echo $row['roomtype_id']; ?>" method="POST">
                                <?php
                                if (isset($_GET['bookingdate'])) {
                                    $date = $_GET['bookingdate'];
                                ?>


                                    <input style="display: none;" type="hidden" name="bookingdate" value="<?php echo $date ?>"><br>
                                    <!-- <label class="form-label fw-bold mt-3" required>เลือกเวลา</label> -->
                                    <p class="fs-6 fw-bold"> วันที่เลือกจอง : <?php echo date("d/m/y", strtotime($date)) ?></p>


                                    <?php

                                    $startTime = [];
                                    $selectDate = $_GET['bookingdate'];
                                    $detail = $_GET['detail'];

                                    $sqlDate = "SELECT * FROM booking_detail WHERE booking_detail.date = '$detail'";
                                    $resultDate = mysqli_query($conn, $sqlDate);
                                    while ($queryDate = mysqli_fetch_assoc($resultDate)) {
                                        $checktime = $queryDate['timeplays'];

                                        // $queryDate = mysqli_fetch_assoc($resultDate)['timeplays'];

                                        $select = explode(",", $checktime);
                                        foreach ($select as $element) {
                                            array_push($startTime, explode("-", $element)[0]);
                                        }
                                    }

                                    $time = ["18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "23:59"];
                                    for ($i = 0; $i < count($time) - 1; $i++) {
                                    ?>
                                        <div class="card card-body">
                                            <div class="form-check form-check-inline">
                                                <label for="timeplay">
                                                    <input class="form-check-input" type="checkbox" name="timeplay[]" value="<?php echo in_array($time[$i], $startTime) ? 'readonly disabled' : $time[$i] ?>">
                                                    <?php echo $time[$i] ?> - <?php echo $time[$i + 1] ?>
                                                </label>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    $i++;
                                    ?>

                                <?php } ?><br>

                                <div class="fw-bold">
                                    <label class="form-label">จำนวนคน</label>
                                    <input type="number" class="form-control" min="1" id="num_people" name="num_people" required>
                                </div>

                                <div class="fw-bold ">
                                    <label class="form-label ">หมายเหตุ</label>
                                    <textarea class="form-control" placeholder="ถ้าไม่มีให่ใส่เครื่องหมาย -" style="height: 100px" id="note" name="note" required></textarea>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <a class="btn btn-danger fw-bold" href="./bookingRoomAll.php">ย้อนกลับ</a>
                                    <button type="button" class="btn btn-primary fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdrop">ทำการจอง</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">ต้องการสั่งอาหารด้วยหรือไม่</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <i class="bi bi-egg-fried fs-3"></i> -->
                                                    <img src="./img/foodorder/fast-food.png" class="center" alt="" srcset="">
                                                </div>
                                                <style>
                                                    .center {
                                                        display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width: 50%;
                                                        object-fit: cover;
                                                    }
                                                </style>
                                                <div class="modal-footer">

                                                    <button type="submit" name="mn" value="no" class="btn btn-danger">ไม่ต้องการ</button>
                                                    <button type="submit" name="mn" value="yes" class="btn btn-primary">ต้องการ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</html>