<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../colersass/colors_bt5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css_style/room.css">
    <title>จองห้อง</title>
    <?php include('../admin/sidebar_admin.php'); ?>

<body>

<div class="container-filud">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-4 mb-4 text-center">ประเภทห้อง</h2>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="card-thumbnail">
                        <a href="../admin/systemroomS.php"><img src="../img/size_s1.jpg" class="card-img"
                                alt=""></a>
                    </div>
                    <h3 class="text text-center"><a href="../admin/systemroomS.php" class="mt-2 text-dark">ห้องขนาด
                            S</a></h3>
                    <p class="text-secondary">รายละเอียด: <br> 1. ไมค์ 2 ตัว <br> 2. จำนวน : ไม่เกิน 5 คน <br>3. ราคา :
                        119/ชม.<br>4. ไฟธรรมดา</p>
                    <a href="../admin/systemroomS.php" class="btn btn-sm btn-success">เลือก</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="card-thumbnail">
                        <a href="../admin/systemroomM.php"><img src="../img/size_m1.jpg" class="card-img"
                                alt=""></a>
                    </div>
                    <h3 class="text text-center"><a href="#"
                            class="mt-2 text-dark text-center">ห้องขนาด M</a></h3>
                    <p class="text-secondary">รายละเอียด: <br> 1. ไมค์ 3 ตัว <br> 2. จำนวน : ไม่เกิน 10 คน <br>3. ราคา :
                        159/ชม.<br>4. มีไฟเท็คและไฟธรรมดา</p>
                    <a href="../admin/systemroomM.php" class="btn btn-sm btn-success">เลือก</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="card-thumbnail">
                        <a href="#"><img src="../img/vip1_vip2.jpg" class="card-img"
                                alt=""></a>
                    </div>
                    <h3 class="text text-center"><a href="#"
                            class="mt-2 text-dark text-center">ห้องขนาด Vip1-Vip2</a></h3>
                    <p class="text-secondary">รายละเอียด: <br> 1. ไมค์ 4 ตัว <br> 2. จำนวน : ไม่เกิน 20 คน <br>3. ราคา :
                        239/ชม.<br>4. มีไฟเท็คและไฟธรรมดา</p>
                    <a href="#" class="btn btn-sm btn-success">เลือก</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="card-thumbnail">
                        <a href="#"><img src="../img/vip3-vip4.jpg" class="card-img"
                                alt=""></a>
                    </div>
                    <h3 class="text text-center"><a href="#" class="mt-2 text-dark text-center">ห้องขนาด Vip3-Vip4</a>
                    </h3>
                    <p class="text-secondary">รายละเอียด: <br> 1. ไมค์ 3 ตัว <br> 2. จำนวน : ไม่เกิน 10 คน <br>3. ราคา :
                        159/ชม.<br>4. มีไฟเท็คและไฟธรรมดา</p>
                    <a href="#" class="btn btn-sm btn-success">เลือก</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>