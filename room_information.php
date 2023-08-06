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
    <title>ข้อมูลห้อง</title>
    <?php include('./sidebarnew.php')?>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content">
            <div class="container-sm">
                <form class="row g-3">
                    <h2 class=" text-center">ข้อมูลห้องทั้งหมด</h2>
                    <div class="col-md-12 mt-5">
                        <select id="inputState" class="form-select">
                            <option selected>เลือกประเภทห้อง...</option>
                            <option>ประเภทห้อง S</option>
                            <option>ประเภทห้อง M</option>
                            <option>ประเภทห้อง VIP1-VIP2</option>
                            <option>ประเภทห้อง VIP3-VIP4</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="dateStart" placeholder="วันเริ่มต้น">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="dateEnd" placeholder="วันสิ้นสุด">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="timeStart" placeholder="เวลาเริ่มต้น">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control time" id="timeEnd" placeholder="เวลาสิ้นสุด">
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-lg btn-block">ค้นหาห้อง</button>
                    </div>
                </form>




                <!-- <div class="container-sm">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a href="#">ประเภทห้อง</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ห้องทั้งหมด</li>
                    </ol>
                </nav> -->
            </div>

            <div class="container-sm">
                <div class="row">
                    <div class="p-3 bg-light">
                        <div class="row">
                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S01</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>

                                        <a href="./reserve.php" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S02</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S03</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S04</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S05</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S06</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S07</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-3">
                                <div class="card text-center">
                                    <img src="./img/Room/roomS/S01.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Room S08</h5>
                                        <p class="text"><span class="badge bg-success">สถานะ : ว่าง</span></p>
                                        <a href="#" class="btn btn-primary">เลือกจอง</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link">&laquo;</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>


                                <li class="page-item">
                                    <a class="page-link" href="#">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./js/bootstrap.min.js"></script>


</body>

</html>