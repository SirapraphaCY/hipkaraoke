<!-- ลงทะเบียน -->
<?php
session_start();

include "./connection/connecdb.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $idline = $_POST['idline'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = pathinfo(basename($_FILES['img_upload']['name']), PATHINFO_EXTENSION);
    if ($file != "") {
        $new_image_name = 'img' . uniqid() . "." . $file;
        $image_path = "fileupload/userprofile";
        $upload_path = $image_path . "/" . $new_image_name;

        $upload = move_uploaded_file($_FILES['img_upload']['tmp_name'], $upload_path);
        if ($upload == FALSE) {
            echo "ไม่สามารถ UPLOAD ภาพได้";
            exit('Location: index.php');
        }
        $pro_image = $new_image_name;
        $pic = "fileupload/userprofile/" . $pro_image;
    } else {
        $pic = "fileupload/userprofile/img_001.jpg";
    }

    $type = 'user';

    $customer_check = "SELECT * FROM customer WHERE username = '$username' LIMIT 1"; //ทำให้ชื่อไม่่ซ้ำกัน
    $result = mysqli_query($conn, $customer_check);
    $customer = mysqli_fetch_assoc($result);


    if ($customer['username'] == $username) {
        echo "<script>alert('ชื่อนี้มีคนใช้แล้ว');</script>";
    } else {

        $passwordenc = md5($password);
        $query = "INSERT INTO customer(username,idline,phone,email,password,type,picturePF)
                VALUES('$username','$idline','$phone','$email','$passwordenc','$type','$pic')";
        $result = mysqli_query($conn, $query);
        header("Location: index.php");
    }
}


?>
<!-- ลงทะเบียน -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hip Karaoke</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Kanit:wght@100&family=Style+Script&display=swap" rel="stylesheet">

    <!-- Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css_style/indedx_style.css?v">
    <!-- <link rel="stylesheet" href="./css_style/indexcss.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>



</head>

<body>

    <header>
        <a href="#"><img src="./img/logo1.png" width="200" alt="logo"></a>

        <nav>
            <li><a href="#" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; text-decoration: none; color:#fff;">หน้าแรก</a>
            </li>

            <li><a href="#about" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; text-decoration: none; color:#fff;">เกี่ยวกับ</a>
            </li>


            <li class="btn btn-outline-warning"><a href="#" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; text-decoration:none; color:#fff;" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">ลงทะเบียน</a></li>

            <li class="btn btn-outline-warning"><a href="#" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; text-decoration: none; color:#fff; " data-bs-toggle="modal" data-bs-target="#login" data-bs-whatever="@mdo">เข้าสู่ระบบ</a></li>
        </nav>
    </header>

    <section class="hip">
        <div class="background-image" style="background-image:url('./img/home.jpg');"></div>
        <h1>Hip Karaoke</h1>
        <h3>อีกหนึ่งร้านคาราโอเกะสุดมันส์ ย่านขอนแก่นที่จะพาคุณไปสนุกสนานกับเสียงเพลง
            และเอ็นจอยอีทติ้งไปกับเมนูอาหารมากมาย
            <br>
            ใครที่อยากได้ร้านคาราโอเกะสำหรับพื้นที่สังสรรค์ นัดรวมกลุ่มเดอะแก๊งค์ ที่นี่จะต้องถูกใจอย่างแน่นอน
        </h3>
        <a href="#" class="btn btn-outline-warning" style="font-size: 22px; font-weight: bold; font-family: 'Kanit', sans-serif; " data-bs-toggle="modal" data-bs-target="#login" data-bs-whatever="@mdo">จองห้อง !
        </a>

    </section>

    <section class="our-work">
        <h3 class="title">ยินดีต้อนรับสู่โลกของเสียงเพลง</h3>
        <p>ร้านคาราโอเกะ หลังมอขอเรียนเชิญพี่น้องชาวขอนแก่นมา "ม่วนซืนโฮแซ่วกัน" ด้วยห้องที่แสนสบาย
            และพร้อมโชว์พลังเสียงให้เป็นซุปตาร์กันไปเลย...ที่ Hip Karaoke</p>
        <hr>

        <ul class="grid">
            <li class="small" style="background-image: url('./img/pic_tree.jpg');"></li>
            <li class="large" style="background-image: url('./img/pic_one.jpg');"></li>
            <li class="large" style="background-image: url('./img/pic_two.jpg');"></li>
            <li class="small" style="background-image: url('./img/bg_karaoke.jpg');"></li>
        </ul>
    </section>

    <section class="features">
        <h3 class="about" id="about">เกี่ยวกับ</h3>
        <p>ฮิป คาราโอเกะ บรรยากาศดีที่อบอุ่น สบายๆมีสไตล์ ห้องมีให้เลือกหลากหลาย เครื่องเสียงอันทันสมัย
            เพลงฮิตติดชาร์ตทั้งไทยและต่างประเทศ อาหารและเครื่องดื่มที่พร้อมบริการ บริการเป็นกันเอง</p>

        <ul class="grid">
            <li>
                <i class="fab fa-facebook"></i>
                <h4>Follow us on Facebook</h4>
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Hip-Karaoke-273653809357101&amp;width=400&amp;height=250&amp;colorscheme=dark&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:300px;" allowtransparency="true">
                </iframe>

            </li>


            <li>
                <i class="fas fa-phone"></i>
                <h4>Phone</h4>
                <p>085 175 9065</p>
            </li>

            <li>
                <i class="fas fa-bookmark"></i>
                <h4>How to Book</h4>
                <p style="text-align: left;">จองห้องคาราโอเกะด้วย 5 ขั้นตอนง่ายๆ <br>
                    1. สมัครสมาชิก <br>
                    2. เลือกห้อง <br>
                    3. ชำระเงิน <br>
                    4. ส่งหลักฐานการจอง <br>
                    5. แสดงเอกสารการจอง
                </p>
            </li>

        </ul>
    </section>
    <footer>
        <p class="mt-3">Coppyright 2021&copy;Hip Karaoke</p>
    </footer>


    <!-- เด้งหน้าเข้าสู่ระบบ -->

    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content text-dark "><br>

                <center><a href="#"><img src="./img/logo1.png" width="200" alt="logo"></a></center>
                <div class="modal-header">
                    <h5 class="modal-title col-ml-6 ms-auto" id="login" style="font-size: 24px; font-weight: bold; font-family: 'Kanit', sans-serif;"> เข้าสู่ระบบ
                    </h5>
                    <!-- ปุ่ม close(X) -->
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- ปุ่ม close(X) -->
                </div>
                <div class="modal-body">
                    <form action="./login.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control " id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput"><img src="./icon/person-fill.svg" alt="person-fill" width="25px">&nbsp;&nbsp;username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                            <label for="floatingInput"><img src="./icon/key-fill.svg" alt="person-fill" width="25px">&nbsp;&nbsp;Password</label>
                        </div>
                        <!-- <p>
                            <a href="forgetPass.php">ลืมรหัสผ่าน?</a>
                        </p> -->
                        <button type="submit" name="submit" value="login" class="btn btn-primary d-grid gap-2 mx-auto col-md-6 ms-auto" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; border-radius: 6px;">เข้าสู่ระบบ
                        </button><br>

                    </form>
                </div>
                <div class="modal-footer d-block">
                    <p class="float-start text-center">
                        <center>Don't have an account?
                            <a href="#" class="text-primary" data-bs-toggle="modal" data-dismiss="modal" role="dialog" aria-label="close" data-bs-target="#register" data-bs-whatever="@mdo">
                                Sign Up
                        </center></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- เด้งหน้าเข้าสู่ระบบ -->



    <!-- เด้งเข้าหน้าลงทะเบียน -->

    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content text-dark "><br>

                <center><a href="#"><img src="./img/logo1.png" width="200" alt="logo"></a></center>
                <div class="modal-header">
                    <h5 class="modal-title col-ml-6 ms-auto" id="register" style="font-size: 24px; font-weight: bold; font-family: 'Kanit', sans-serif;">ลงทะเบียน</h5>
                    <!-- ปุ่ม close(X) -->
                    <button type="button" class="btn-close btn-close-dark " role="dialog" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                    <!-- ปุ่ม close(X) -->
                </div>

                <div class="modal-body">
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 form-floating">
                            <input type="text" name="username" class="form-control " id="floatingInput" placeholder="username">
                            <label for="floatingInput">&nbsp;<img src="./icon/pencil-fill.svg" alt="person-fill" width="15px">&nbsp;&nbsp;Username</label>
                        </div>

                        <div class="col-md-12 form-floating">
                            <input type="text" name="idline" class="form-control " id="floatingInput" placeholder="ID Line">
                            <label for="floatingInput"><img src="./icon/phone-fill.svg" alt="person-fill" width="15px">&nbsp;&nbsp;ID Line</label>
                        </div>

                        <div class="col-md-12 form-floating">
                            <input type="int" name="phone" class="form-control " id="floatingInput" placeholder="Phone">
                            <label for="floatingInput">&nbsp;<img src="./icon/telephone-fill.svg" alt="person-fill" width="15px">&nbsp;&nbsp;Phone</label>
                        </div>

                        <div class="col-md-12 form-floating">
                            <input type="email" name="email" class="form-control " id="floatingInput" placeholder="xxxx@email.com">
                            <label for="floatingInput">&nbsp;<img src="./icon/envelope-fill.svg" alt="person-fill" width="15px">&nbsp;&nbsp;E-mail</label>
                        </div>

                        <div class="col-md-12 form-floating">
                            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                            <label for="floatingInput" style="width: auto;">&nbsp;<img src="./icon/lock-fill.svg" alt="person-fill" width="15px">&nbsp;&nbsp;Password</label>
                        </div>

                        <div class="mb-2">
                            <p class="lable_format">Choose a Photo<img src="./icon/image.svg" alt="person-fill" width="20px"></p>
                            <input type="file" name="img_upload" id="img_upload" class="form-control">
                            <br>
                            <!-- <label for="formFile" class="form-label">Choose a Photo&nbsp;&nbsp;
                                <img src="./icon/image.svg" alt="person-fill" width="20px">
                            </label> -->
                            <!-- <input class="form-control"  type="file" name=img_upload" id="img_upload" > -->
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-grid gap-4 mx-auto col-md-12 ms-auto" style="font-size: 18px; font-weight: bold; font-family: 'Kanit', sans-serif; border-radius: 6px;">ลงทะเบียน
                        </button><br><br>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="./js/bootstrap.min.js"></script> -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>