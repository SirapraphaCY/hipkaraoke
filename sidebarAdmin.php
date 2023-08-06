<?php


// session_start();
$sql = mysqli_query($conn, "SELECT * FROM customer ");
$row = mysqli_fetch_array($sql);

$username = $row['username'];
$email = $row['email'];
$img = $row['picturePF'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>SidebarAM</title> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css_style/sidebarnew_style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <!-- toggled -->
        <a id="show-sidebar" class="btn btn-lg active btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"><img src="./img/logo1.png" alt="logo" width="130" srcset=""></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="circular" src="<?php echo $row['picturePF']; ?>" alt="User picture">
                    </div>
                    <style>
                        .circular {
                            /* border-top-left-radius: 50% 50%;
                            border-top-right-radius: 50% 50%;
                            border-bottom-right-radius: 50% 50%;
                            border-bottom-left-radius: 50% 50%;
                            width: 30px;
                            height: 30px;*/
                            object-fit: cover; 
                            border-radius: 50%;
                        }
                    </style>

                    <div class="user-info">
                        <span class="user-name"><?php echo $username; ?><a href="./profileEditAM.php"><i class="bi bi-pencil-square btn" style="color: #F16725;"></i></a></span>
                        <span class="user-role"><?php echo $email; ?></span>
                    </div>
                </div>

                <!------------------------------------------------ sidebar-header  -------------------------------------->


                <ul class="mt-3">
                    <?php
                    // include "./connection/connecdb.php";
                    $querystatus1 = "SELECT statusRoomid, COUNT(bookDE_id) as s1total
                        FROM booking_detail
                        WHERE bookDE_id = bookDE_id";
                    $rs1 = mysqli_query($conn, $querystatus1);
                    $rows1 = mysqli_fetch_array($rs1);
                    // //    echo $rows1['s1total'];
                    // if ($rows1['s1total'] == 1) {
                    // 
                    ?>
                    <li>
                        <a href="./reserveListCustomer.php">
                            <i class="fas fa-calendar-check"></i>

                            <span>รายการจอง</span>
                            <!-- <span class="badge badge-pill rounded-pill badge-danger"><?php echo $rows1['s1total'] ?></span> -->
                        </a>
                    </li>

                    <?php
                    // } else {

                    ?>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-grip-horizontal"></i>
                            <span>จัดการห้อง</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <h6><a href="./roomTypeAM.php">จัดการสถานะห้อง</a></h6>
                                </li>

                                <li>
                                    <h6><a href="./Manageroom_types.php">จัดการประเภทห้อง</a></h6>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-pizza-slice"></i>
                            <span>จัดการอาหาร</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <h6><a href="./foodAM.php">จัดการเมนูอาหาร</a></h6>
                                </li>
                                <li>
                                    <h6><a href="./foodTypeAM.php">จัดการประเภทอาหาร</a></h6>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="./news.php">
                            <i class="fas fa-solid fa-newspaper"></i>
                            <span>ข่าวสาร</span>
                        </a>
                    </li>

                    <li>
                        <a href="./BankManage.php">
                            <i class="fa fa-bank"></i>
                            <span>จัดการธนาคาร</span>
                        </a>
                    </li>

                    <li>
                        <a href="./dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="./logout_admin.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
                <?php
                // }
                ?>
                <!-- </div> -->
            </div>
        </nav>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="./js/bootstrap.min.js"></script> -->
    <script src="./functions/siderbartest.js"></script>
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>
</body>

</html>