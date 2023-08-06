<!DOCTYPE html>
<html lang="en">
<?php
require "./connection/connecdb.php";
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าแรก</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css"> -->
    <link rel="stylesheet" href="./css_style/homepage_style.css?v">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <script src="./node_modules/jquery/dist/jquery.min.js"></script> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


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
                        <li class="nav-item">
                            <a class="nav-link" href="./homepage.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" onclick="location.href='./bookingRoomAll.php'" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">จองห้อง</button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>

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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $username ?>
                                <!-- <?php echo $picturePF ?> -->
                                <img src="<?php echo $PF ?>" class="circular--square" alt="...">
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

    <main>
        <section class="text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto ">
                    <h1 class="fw-light ">Hip Karaoke</h1>
                    <p class="lead text-muted">
                        ร้านฮิปคาราโอเกะ เป็นร้านคาราโอเกะที่ให้ลูกค้ามาผ่อนคลายจากการทำงาน หรือพบปะสังสรรค์กับเพื่อนๆ
                        ครอบครัว ฉลองเลื่อนตำแหน่ง วันเกิด รับปริญญา งานแต่ง งานหมั้น งานจัดเลี้ยง ทุกโอกาส ทุกเทศกาล
                    </p>
                    <p>
                        <a href="./bookingRoomAll.php" class="btn btn-primary my-2">จองห้อง</a>
                    </p>
                </div>
            </div>
        </section>



        <div class="album py-3 bg-light">
            <div class="container" id="custom-cards">
                <h2 class="pb-2  border-bottom"> ข่าวสาร </h2>

                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-2">

                    <?php
                    $sqlNews = mysqli_query($conn, "SELECT * FROM news");

                    while ($rowNews = mysqli_fetch_array($sqlNews)) {
                        $newsid = $rowNews['newsid'];
                        $imgnews = $rowNews['imgnews'];
                        $datenow = $rowNews['datenow'];
                        $subject = $rowNews['subject'];
                        $content = $rowNews['content'];

                    ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" style="background-image: url('<?php echo $imgnews ?>'); background-repeat: no-repeat; background-size: auto;" focusable="false">
                                </svg>
                                <div class="card-body">
                                    <h4 class="fw-bold"><?php echo $rowNews['subject']; ?></h4>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                        <?php echo $rowNews['content']; ?>
                                    </span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <ul class="d-flex list-unstyled mt-auto">
                                            <li class="d-flex align-items-center me-3">
                                                <small><?php echo $rowNews['datenow']; ?></small>
                                            </li>
                                        </ul>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-warning text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $newsid ?>">ดู</button>
                                        </div>

                                        <div class="modal fade" id="exampleModal<?php echo $newsid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold" id="exampleModalLabel"><?php echo $rowNews['subject']; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <img src="<?php echo $imgnews ?>" style="object-fit: cover;" width="100%" alt="">
                                                       <p class="mt-2 fs-4"><?php echo $rowNews['content']; ?></p>
                                                    </div>
                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <small class="text-muted">9 mins</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col">
                            <a href='#' style="text-decoration: none;">
                                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?php echo $imgnews ?>'); background-repeat: no-repeat; background-size: auto;">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 mt-5">
                                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo $rowNews['subject']; ?></h2>
                                        <ul class="d-flex list-unstyled mt-auto">
                                            <li class="d-flex align-items-center me-3">
                                                <small><?php echo $rowNews['datenow']; ?></small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <?php
    // $sql = mysqli_query($conn, "SELECT * FROM room_type_detail");


    // if($row = mysqli_fetch_array($sql)) {
    //     $roomtype_id = $row['roomtype_id'];
    //     $name_type = $row['name_type'];

    // 
    ?>

    <!-- <div class="container our-work ">
        <ul class="grid p-0"> -->
    <!-- ห้อง S 
    //              ห้อง V1-2
    //              ห้อง V3-4
    //              ห้อง M
    //         -->
    <?php
    //         echo"
    //      <li class='small' style='background-image: url(./img/home1.svg);'>
    //         <a href='./roomdetail.php?detail=" .$roomtype_id . "'>
    //                 <div class='shadow_swhow_mini'>
    //                     <div class='deroul_titre text-light text-center fs-4'>
    //                         ห้องประเภท $name_type <br>
    //                         <i class='bi bi-search fs-2'></i>
    //                     </div>
    //                 </div>
    //             </a>
    //         </li>    

    //         <li class='large' style='background-image: url(./img/home2.svg);'>
    //             <a href='./roomdetail.php?detail=" .$roomtype_id . "'>
    //                 <div class='shadow_swhow_mini'>
    //                     <div class='deroul_titre text-light text-center fs-4'>
    //                         ห้องประเภท $name_type <br>
    //                         <i class='bi bi-search fs-2'></i>
    //                     </div>
    //                 </div>
    //             </a>
    //         </li>


    //         <li class='large' style='background-image: url(./img/home3.svg);'>
    //             <a href='./roomdetail.php?detail=" .$roomtype_id . "'>
    //                 <div class='shadow_swhow_mini'>
    //                     <div class='deroul_titre text-light text-center fs-4'>
    //                         ห้องประเภท $name_type <br>
    //                         <i class='bi bi-search fs-2'></i>
    //                     </div>
    //                 </div>
    //             </a>
    //         </li>

    //         <li class='small' style='background-image: url(./img/home4.svg);'>
    //             <a href='./roomdetail.php?detail=" .$roomtype_id . "'>
    //                 <div class='shadow_swhow_mini'>
    //                     <div class='deroul_titre text-light text-center fs-4'>
    //                         ห้องประเภท $name_type <br>
    //                         <i class='bi bi-search fs-2'></i>
    //                     </div>
    //                 </div>
    //             </a>
    //         </li> 
    //         </ul>
    //         </div>";
    //          }  
    ?>


    <!-- <div class="container-fuild">
        <hr>
    </div> -->
    <footer class="sticky-bottom mt-3">
        <p class="text-center mt-3">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>