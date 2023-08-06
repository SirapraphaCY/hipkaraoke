<?php
       include('./connection/connecdb.php');
       session_start(); 
       $sql = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id ='".$_SESSION['cus_id']."'");
        $row = mysqli_fetch_array($sql);   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SidebarTest</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css_style/sidebarnew_style.css?v">
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
                        <img class="img-responsive img-rounded" src="./img/profile.jpg" alt="User picture">
                    </div>

                    <div class="user-info">
                        <span class="user-name"><?php echo $_SESSION['username'];?></span>
                        <span class="user-role"><?php echo $row['email'];?></span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <!-- <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- sidebar-search  -->

                <!-- <div class="sidebar-menu"> -->
                <ul class="mt-3">
                    <li class="active">
                        <a href="./homepage.php">
                            <i class="fas fa-home"></i>
                            <span>หน้าแรก</span>
                            <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
                        </a>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fab fa-buromobelexperte"></i>
                            <span>ประเภทห้อง</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="./room_information.php">ห้องทั้งหมด</a>
                                </li>
                                <li>
                                    <a href="./booking_roomS.php">ประเภทห้อง S</a>
                                </li>
                                <li>
                                    <a href="./booking_roomM.php">ประเภทห้อง M</a>
                                </li>
                                <li>
                                    <a href="./booking_roomVip1-Vip2.php">ประเภทห้อง VIP1-VIP2</a>
                                </li>
                                <li>
                                    <a href="./booking_roomvip3-vip4.php">ประเภทห้อง VIP3-VIP4</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="./foodorder.php">
                            <i class="fas fa-utensils"></i>
                            <span>อาหาร&เครื่องดื่ม</span>
                            <!-- <span class="badge badge-pill badge-warning">New</span> -->
                        </a>
                    </li>

                    <!-- <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>ตะกร้า</span>
                            <span class="badge badge-pill badge-danger">1</span>
                        </a>
                    </li> -->

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-file-alt"></i>
                            <span>การชำระเงิน</span>
                            <span class="badge badge-pill badge-danger">1</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="./invoices.php">ใบแจ้งการชำระเงินของฉัน</a>
                                </li>

                                <li>
                                    <a href="./payment.php">ช่องทางการชำระเงิน</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <span>ตั้งค่า</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="./profile.php">ข้อมูลส่วนตัว</a>
                                </li>
                                <li>
                                    <a href="#">ประวัติการใช้บริการ</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="./logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
                <!-- </div> -->
            </div>
        </nav>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./functions/siderbartest.js"></script>
</body>

</html>