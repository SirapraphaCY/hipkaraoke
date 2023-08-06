    <!DOCTYPE html>
    <html lang="en">

    <?php
    require "./connection/connecdb.php";
    session_start();
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>จองห้อง</title>
        <link rel="icon" href="./img/logo1.png" width="500px" />
        <!-- CSS only -->
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="../toruskit-free/dist/css/toruskit.bundle.css"> -->
        <link rel="stylesheet" href="./css_style/tapMenu.css">
        <link rel="stylesheet" href="./examples/js/theme-chooser.js">
        <link rel="stylesheet" href="./examples/json/events.json">
        <link rel="stylesheet" href="./examples/php/get-events.php">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


        <style>
            * {
                font-family: 'Kanit', sans-serif;
            }
        </style>
    </head>

    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">

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

                        // session_start();
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
        <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="./img//VDO9.mp4" type="video/mp4" widt>
        </video> -->
    </header>

        <section class="hip container mt-4">
            <h3 class="text-uppercase fw-bold">Hip Karaoke | จองห้อง</h3>
        </section>


        <?php
        //    echo $detail;
        $sql = mysqli_query($conn, "SELECT * FROM room_type_detail");

        while ($row = mysqli_fetch_array($sql)) {
            $roomtype_id = $row['roomtype_id'];
            $name_type = $row['name_type'];
            $detail = $row['detail'];
            $price = $row['price'];
            $num_people = $row['num_people'];
            $roomName = $row['roomName'];
            $equipment = $row['equipment'];
            $_SESSION['typeid'] =  $row['roomtype_id'];

        ?>

            <!-- <div class="album bg-light"> -->
            <div class="container">
                <hr>
                <div class="row featurette">
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="<?php echo $row['img']; ?>" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        </img>
                    </div>

                    <div class="col-md-7">
                        <h3 class="featurette-heading fw-bold"><?php echo $row['roomName']; ?></h3>
                        <p class="lead">
                            ขนาดห้อง : <?php echo $row['name_type']; ?><br>
                            จำนวนคน : <?php echo $num_people; ?> <br>
                            ราคา : <?php echo $price; ?> / ชั่วโมง <br>
                            ไมค์ : (<?php echo $equipment ?>) <?php echo $detail; ?><br>
                            เปิดทุกวัน : จันทร์ - อาทิตย์<br>
                            เปิดเวลา : 18:00 - 23:59 <br>
                            <!-- <span class="text-danger">
                            *ถ้าจองห้องแล้ว กรณีขอยกเลิกทางร้านจะไม่คืนเงิน<br>
                            *การเข้าใช้บริการต้อเข้ามาเช็คอินก่อน 5-10 นาที ถ้ามาไม่ทันจะปล่อยห้องให้ว่างทันที
                        </span> -->
                        </p>
                    <?php
                    echo "
                            <div>
                                <a href='./bookingdatetime.php?detail=" . $_SESSION['typeid'] . "' class='w-100 border-0 btn btn-primary btn-lg fw-bold'>
                                     ทำการจอง &raquo;
                                </a>
                            </div>
                    </div>
                </div>
                <hr>
            </div>
                    ";
                } ?>



                    <footer class="sticky-bottom mt-3">
                        <p class="text-center mt-3">Coppyright 2021&copy;Hip Karaoke</p>
                    </footer>



                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                    </script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                    </script>
                    <!-- <script src="./js/bootstrap.min.js"></script> -->
                    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                    <!-- <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    </body>

    </html>