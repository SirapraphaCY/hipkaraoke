<?php
require "./connection/connecdb.php";
//   session_start(); 
$sql = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id ");
$row = mysqli_fetch_array($sql);
//    echo $cus_id;
$cus_id = $row['cus_id'];
$username = $row['username'];
$email = $row['email'];
$pic    = $row['picturePF'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Kanit:wght@100&family=Style+Script&display=swap" rel="stylesheet">

    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />

    <?php include './sidebarAdmin.php' ?>
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>

<body>
    <form action="./save_edit_admin.php?cus_id=<?php echo $cus_id ?>" method="post" enctype="multipart/form-data">
        <div class="page-wrapper chiller-theme toggled">
            <main class="page-content ">
                <div class="container-filud">
                    <div class="row ">
                        <h3 class="title align-baseline fw-bold">แก้ไขข้อมูลส่วนตัว</h3>
                        <div class="card-body">

                            <input type="hidden" class="form-control" id="cus_id" name="cus_id" placeholder="username" value="<?php echo $row['cus_id'] ?>" required>
                            <div class="container">
                                <div class="row flex-lg-row-reverse align-items-center">
                                    <div class="col-10 col-sm-8 col-lg-6">
                                        <img src="<?php echo $row["picturePF"] ?>" class="d-block mx-lg-auto img-fluid" style="object-fit: cover;" alt="img" width="500" height="300" loading="lazy">
                                        <h2 class="text-center"><?php echo $row['username']; ?></h2>
                                        <p class="lead text-center"><?php echo $row['email']; ?></p>
                                    </div>

                                    <div class="col-lg-6">
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $row['username'] ?>" required>
                                                <label for="username" class="form-label">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="varchar" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>" required>
                                                <label for="phone" class="form-label">Phone</label>
                                            </div>
                                            <div class="form-floating mb-3">

                                                <input type="text" class="form-control" id="idline" name="idline" placeholder="line" value="<?php echo $row['idline'] ?>" required>
                                                <label for="idline" class="form-label">ID Line</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="varchar" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>" required>
                                                <label for="phone" class="form-label">Phone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $row['email'] ?>" required>
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="file" id="img_upload" name="img_upload">
                                                <label class="form-label" value="<?php echo $row['picturePF'] ?>"></label>
                                                <!-- <img src="<?php echo $row['picturePF'] ?>" style="object-fit: cover; text-align: center;" width="100"  alt="" srcset=""> -->
                                            </div>
                                            <!-- <div class="d-grid gap-1 d-md-flex justify-content-md-center"> -->
                                            <a href="./reserveListAM.php" class="btn btn-danger">
                                                ยกเลิก
                                            </a>
                                            <button class="btn btn-primary " type="submit" id="submit" name="submit">
                                                อัพเดพข้อมูล
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </form>

    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>