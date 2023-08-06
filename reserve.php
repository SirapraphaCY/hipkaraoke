<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./colersass/colors_bt5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_style/reserve_style.css">
    <title>เลือกจองห้อง</title>
    <?php include('./sidebarnew.php')?>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-sm">
                <div class="row">
                    <!-- <h3 class="title">รายละเอียดห้อง</h3> -->

                    <div class="container mt-3">
                        <div class="position-relative ">
                            <div class="progress" style="height: 1px;">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <button type="button"
                                class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill"
                                style="width: 3rem; height:3rem;">1</button>
                            <button type="button"
                                class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill"
                                style="width: 3rem; height:3rem;">2</button>
                            <button type="button"
                                class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                                style="width: 3rem; height:3rem;">3</button>
                        </div>
                    </div>

                    <div class="container-sm mt-5">
                        <form class="row">
                            <h2 class=" text-center mt-5">รายละเอียดการจอง</h2>
                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" id="dateStart" placeholder="วันเริ่มต้น">
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" id="dateEnd" placeholder="วันสิ้นสุด">
                            </div>
                            <div class="col-md-2 mt-3">
                                <input type="text" class="form-control" id="timeStart" placeholder="เวลาเริ่มต้น">
                            </div>
                            <div class="col-md-2 mt-3">
                                <input type="text" class="form-control time" id="timeEnd" placeholder="เวลาสิ้นสุด">
                            </div>
                        </form>
                    </div>


                    <div class="card mt-5">
                        <h5 class="card-header">ห้อง Room S01</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">

                                    <div class="row ">
                                        <div class="col">
                                            <div>
                                                <img src="./img/detailRoom/1.svg" class="card-img-top" alt="...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2 ">
                                        <div class="col">
                                            <div>
                                                <img src="./img/detailRoom/1.svg" class="card-img-top" alt="...">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <img src="./img/detailRoom/2.svg" class="card-img-top" alt="...">

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <img src="./img/detailRoom/2.svg" class="card-img-top" alt="...">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            รายละเอียดห้อง <span class="badge bg-success">สถานะ : ว่าง</span>
                                        </div>
                                        <div class="card-body p-4">
                                            <p class="card-text d-flex justify-content-between">รหัสห้อง: S001
                                                <span>ชื่อห้อง: Room S01</span>
                                            </p>
                                            <p class="card-text d-flex justify-content-between">ประเภทห้อง: ขนาด S
                                                <span>ราคา: 119/ชม.</span>
                                            </p>
                                            <p class="card-text d-flex justify-content-between">ไมค์: 2 ตัว<span>จำนวน:
                                                    ไม่เกิน 5 คน</span></p>
                                            <p class="card-text text-danger" style="font-size:14px">
                                                *กรณีเข้าเกินทางร้านขออนุญาตปรับ 80 บาท/คน/ชม.</p>
                                            <p class="card-text text-danger" style="font-size:14px">*กรณียกเลิก
                                                ทางร้านจะไม่คืนเงินให้</p>
                                            <p class="card-text text-danger" style="font-size:14px">
                                                *กรณีมาไม่ทันทางร้านจะปล่อยห้องว่างทันที</p>


                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <a href="./foodorder.php"><button class="btn btn-secondary"
                                                        type="button"><i class="fas fa-plus"></i>
                                                        เพิ่มอาหาร</button></a>
                                                <a href="./payment.php"> <button class="btn btn-primary"
                                                        type="button">จองทันที</button></a>
                                            </div>

                                            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3">
                                                <a href="./payment-confirm.php"> <button class="btn btn-primary"
                                                        type="button">จองทันที</button></a>
                                            </div>

                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3">
                                                <a href="./payment-confirm.php"> <button class="btn btn-primary"
                                                        type="button">จองทันที</button></a>
                                            </div> -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
        </main>
    </div>

    <script src="./js/bootstrap.min.js"></script>

</body>

</html>