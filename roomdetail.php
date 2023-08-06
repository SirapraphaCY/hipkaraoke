<!DOCTYPE html>
<html lang="en">
<?php
require "./connection/connecdb.php";
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดห้อง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css"> -->
    <link rel="stylesheet" href="./css_style/homepage_style.css">
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"><img src="./img/logo1.png" width="150" alt="logo"></a>

                    <ul class="navbar-nav mb-lg-0 text-light nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="./homepage.php">หน้าแรก</a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ประเภทห้อง
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">ROOM S</a></li>
                                <li><a class="dropdown-item" href="#">ROOM M</a></li>

                                <li><a class="dropdown-item" href="#">ROOM VIP1-VIP2</a></li>
                                <li><a class="dropdown-item" href="#">ROOM VIP3-VIP4</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" onclick="location.href='./bookingRoomAll.php'"
                                id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">จองห้อง</button>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./bookingMenu.php">อาหาร&เครื่องดื่ม</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">รายการที่จอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
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
        <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                    <source src="./img/VDO9.mp4" type="video/mp4" widt>
                </video> -->
    </header>


    <div class="container mt-5">
        <?php
        $detail = $_GET["detail"];
        //    echo $detail;
        $sql = mysqli_query($conn, "SELECT * FROM room_type_detail  WHERE roomtype_id = " . $_GET["detail"] . ""); 
        // $sql = mysqli_query($conn, "SELECT * FROM room_type_detail  WHERE roomtype_id = roomtype_id ");
        

        $row = mysqli_fetch_array($sql);
        $roomtype_id = $row['roomtype_id'];
        $name_type = $row['name_type'];
        $detail = $row['detail'];
        $price = $row['price'];
        $num_people = $row['num_people'];
        $roomName = $row['roomName'];
        $equipment = $row['equipment'];
        
        ?>

        <div class="row justify-content-center text-center border border-1 ">
            <div class="col-3 border ">
                <i class="fas fa-users mt-2 fs-2" style="color:#F16725;"></i><br>
                จำนวนคน<br>
                <span><?php echo $num_people; ?></span>
            </div>
            <div class="col-3 border">
                <i class="bi bi-aspect-ratio-fill mt-2 fs-2" style="color:#F16725;"></i><br>
                ขนาดห้อง <br>
                <span><?php echo $name_type; ?></span>
            </div>
            <div class="col-3 border">
                <i class="bi bi-cash-coin mt-2 fs-2" style="color:#F16725;"></i><br>
                ราคา/ชม. <br>
                <span><?php echo $price; ?></span>
            </div>
            <div class="col-3 border">
                <i class="fas fa-headphones mt-2 fs-2" style="color:#F16725;"></i><br>
                ไมค์(<?php echo $equipment ?>)<br>
                <span><?php echo $detail; ?></span>
            </div>



            <div class=" text-center">
                <div class="card-body shadow p-5 mb-5 rounded mt-3 ">
                    <!-- <img src="./img/s1.svg" class="w-100" alt="" srcset=""> -->

                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./img/Room/size1.svg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./img/Room/size2.svg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./img/Room/size3.svg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>

                    <h3 class="card-title mt-4"><?php echo $roomName ?> </h3>

                    <div class="container w-75">
                        <hr>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <!-- <div class="col-2 border border-dark p-2">
                            <span class="fs-2" style="color:#F16725;">ราคา</span><br>
                            <span class="fs-2 fw-bolder"> 119 บาท</span><br>
                            <span class="fs-4">per hours</span>
                        </div> &nbsp;&nbsp;&nbsp;
                        <div class="col-2 border border-dark p-2">
                            <span class="fs-2" style="color:#F16725;">เวลา</span><br>
                            <span class="fs-4 fw-bolder">18:00 <br> - <br> 23.59</span>
                        </div> -->
                        <p class="text-center mt-5">*ถ้าจองห้องแล้ว กรณีขอยกเลิกทางร้านจะไม่คืนเงิน<br>
                            *การเข้าใช้บริการต้อเข้ามาเช็คอินก่อน 5-10 นาที ถ้ามาไม่ทันจะปล่อยห้องให้ว่างทันที
                        </p>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                    <button type="button" onclick="location.href='./homepage.php'" class="btn btn-outline-dark"><i
                            class="bi bi-chevron-left"></i> ย้อนกลับ</button>
                    <?php
                echo 
                " <a href='./bookingdatetime.php?detail=" . $roomtype_id . "' class='btn btn-outline-danger'>ทำการจอง <i
                class='bi bi-chevron-right'></i> </a >" ?>
                </div><br>
            </div>
        </div>
    </div>


    <footer class="fixed mt-3">
        <p class="text-center mt-3">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>