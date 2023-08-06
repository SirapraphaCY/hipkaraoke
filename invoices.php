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

    <title>ใบแจ้งค่าบริการของฉัน</title>
    <?php include('./sidebarnew.php')?>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-fluid">
                <div class="row">
                    <h3 class="title">ใบแจ้งค่าบริการของฉัน</h3>

                    <div class="card text-dark bg-body">
                        <h6 class="card-header bg-body mt-3">ใบแจ้งค่าบริการของฉัน</h6>
                        <div class="card-body">
                            <table class="table table-hover bg-body table-bordered fs-6">
                                <thead>
                                    <tr>
                                        <th scope="col">รหัสจอง</th>
                                        <th scope="col">วันที่</th>
                                        <th scope="col">กำหนดชำระ</th>
                                        <th scope="col">ทั้งหมด</th>
                                        <th scope="col">สถานนะ</th>
                                        <th scope="col">สลิปการโอน</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">CUS001</td>
                                        <td>29/09/2654</td>
                                        <td>29/09/2654</td>
                                        <td>319.00 บาท</td>
                                        <td><span class="badge bg-warning">รออนุมัติ</span></td>
                                        <td>Slip.png</td>
                                        <td>




                                            <a href="#" data-bs-toggle="modal" data-bs-target="#register"
                                                data-bs-whatever="@mdo"><button
                                                    class="btn btn-sm btn-primary shadow-none rounded"
                                                    type="button">แสดงรายละเอียด</button></a>



                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end fs-6">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>


                </div>

            </div>


            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- ปุ่ม close(X) -->
                            <button type="button" class="btn-close btn-close-dark " role="dialog"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                            <!-- ปุ่ม close(X) -->
                        </div>

                        <div class="card-body">
                            <div class="container mb-5 mt-3">
                                <div class="row d-flex align-items-baseline">
                                    <!-- <div class="col-xl-9">
                                        <p style="color: #7e8d9f;font-size:18px;">เวลาทำการ:
                                            <strong>18:30</strong>
                                        </p>
                                    </div> -->

                                </div>

                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <p class="pt-0 fs-3">Room S01</p>
                                            <p class="pt-0 fs-6 ">Hipkaraoke.online</p>

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-xl-8">
                                            <ul class="list-unstyled">
                                                <li class="text-muted">To:
                                                    <span style="color:#F16725 ;">aum12</span>
                                                </li>
                                                <li class="text-muted"><i class="fas fa-phone"></i> 0981426828</li>
                                                <li class="text-muted"><i class="fas fa-clock"></i> 18.30-19.30</li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4 fs-6">
                                            <ul class="list-unstyled">
                                                <li class="text-muted">
                                                    <i class="fas fa-circle"> </i>
                                                    <span class="fw-bold">ID:</span>#CUS001
                                                </li>
                                                <li class="text-muted">
                                                    <i class="fas fa-circle"></i>
                                                    <span class="fw-bold">Date: </span>29/09/2564
                                                </li>
                                                <li class="text-muted">
                                                    <i class="fas fa-circle"></i>
                                                    <span class="fw-bold">จำนวน: </span>5 คน
                                                </li>
                                                <li class="text-muted">
                                                    <i class="fas fa-circle"></i>
                                                    <span class="me-1 fw-bold">Status:</span>
                                                    <span class="badge bg-success">จ่ายทั้งหมด</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row my-2 mx-1 justify-content-center">
                                        <table class="table table-striped table-borderless">
                                            <thead style="background-color:#F16725 ;" class="text-white fs-6">
                                                <tr>
                                                    <th scope="col">ลำดับ</th>
                                                    <th scope="col">รายการจอง</th>
                                                    <th scope="col">ประเภท</th>
                                                    <th scope="col">จำนวน</th>
                                                    <th scope="col">ราคา</th>
                                                    <th scope="col">ราคารวม</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6">
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Room S01</td>
                                                    <td>S</td>
                                                    <td>1</td>
                                                    <td>$119</td>
                                                    <td>$119</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>ถั่วต้ม</td>
                                                    <td>ขบเคี้ยว</td>
                                                    <td>5</td>
                                                    <td>$20</td>
                                                    <td>$100</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>โค้ก</td>
                                                    <td>เครื่องดื่ม</td>
                                                    <td>5</td>
                                                    <td>$20</td>
                                                    <td>$100</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">

                                        </div>
                                        <div class="col-xl-4">
                                            <ul class="list-unstyled">
                                                <li class="text-muted ms-3 fs-5">
                                                    <span class="text-black me-4">รวมทั้งหมด</span>$319
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-10 text-cen">
                                            <p>ขอบคุณที่มาใช้บริการค่ะ</p>
                                        </div>
                                        <!-- <div class="col-xl-2">
                                            <button type="button" class="btn btn-primary text-capitalize"
                                                style="background-color:#60bdf3 ;">Pay Now</button>
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