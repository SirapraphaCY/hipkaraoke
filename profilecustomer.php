<?php
require "./connection/connecdb.php";
// session_start();
// $sql = "SELECT * FROM customer WHERE cus_id ='" . $_SESSION['cus_id'] . "' ";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);

// $cus_id     = $_SESSION['cus_id'];
// $username   = $row['username'];
// $email      = $row['email'];

// echo $row['picturePF'];

?>

<!DOCTYPE html>
<html lang="en">
<?php
require "./connection/connecdb.php";
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ข้อมูลส่วนตัว <?php echo $_SESSION['username']; ?> </title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css"> -->
    <link rel="stylesheet" href="./css_style/homepage_style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <script src="./node_modules/jquery/dist/jquery.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>

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
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
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
    <!-- <div class="container">
        <hr>
    </div> -->

    <form action="./save_edit_customer.php?cus_id=<?php echo $cus_id ?>" method="post" style="border: none;" enctype="multipart/form-data">
        <div class="container mt-4">
            <div class="row ">
                <!-- <h4 class="title align-baseline">แก้ไขข้อมูลส่วนตัว</h4> -->
                <!-- <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;"> -->
                <div class="card-body">

                    <div class="container">
                        <main>
                            <!-- coment //หน้านี้ยังไม่สมบูรณ์เดะมาทำใหม่ -->
                            <div class="py-5 text-center">
                                <img src="<?php echo $row["picturePF"] ?>" id="picturePF" name="picturePF" width="200" height="300" style="object-fit: cover;" alt=""><br>

                                <h2><?php echo $_SESSION['username']; ?></h2>
                                <p class="lead"><?php echo $row['email']; ?></p>
                            </div>
                            <input type="hidden" class="form-control" id="cus_id" name="cus_id" placeholder="username" value="<?php echo $row['cus_id'] ?>" required>

                            <div class="col-sm-6 offset-sm-3">
                                <form class="needs-validation" accept="image/jpeg">
                                    <div class="row g-3 ">
                                        <div class="col-sm-6">
                                            <label for="username" class="form-label">Username</label>
                                            <!-- <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $_SESSION['username'] ?>" required> -->
                                            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $row['username'] ?>" required> 
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="varchar" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>" required>
                                        </div>


                                        <div class="col-12">
                                            <label for="idline" class="form-label">ID Line</label>
                                            <input type="text" class="form-control" id="idline" name="idline" placeholder="line" value="<?php echo $row['idline'] ?>" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $row['email'] ?>" required>
                                        </div>

                                        <div class="col-12">
                                            <input type="file" class="custom-file-input" id="formFileMultiple" name="img_upload" multiple>
                                            <label class="form-label custom-file-label"><?php echo $row['picturePF'] ?></label><br>
                                        </div>
                                        <!-- <hr class="my-4"> -->

                                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                                            <button class="btn btn-primary btn-lg " type="submit" id="submit" name="submit">
                                                อัพเดพข้อมูล
                                            </button>

                                            <a href="./homepage.php" class="btn btn-danger btn-lg">
                                                กลับไปที่หน้าหลัก
                                            </a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </form>


    <footer class="sticky-bottom mt-3">
        <p class="text-center mt-3">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>


    <!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
    <!-- <script src="./js/bootstrap.min.js"></script> -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>