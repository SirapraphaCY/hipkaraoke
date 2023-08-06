<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<link rel="icon" href="./img/logo1.png" width="500px" />
    <title>เพิ่มประเภทห้อง</title>
    <?php include('./sidebarAdmin.php') ?>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">เพิ่มประเภทห้อง</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">
                                <form class="row g-3" method="POST" action="./addTRSeccess.php" enctype="multipart/form-data">
                                    <div class="col-md-12 mt-3">
                                        <p class="lable_format">รูปภาพ</p>
                                        <input type="file" name="img_upload" id="img_upload" class="form-control">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="roomName" class="form-label">ชื่อห้อง</label>
                                        <input type="text" class="form-control" id="roomName" name="roomName">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="name_type" class="form-label">ประเภทห้อง</label>
                                        <input type="text" class="form-control" id="name_type" name="name_type">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="equipment" class="form-label">จำนวนไมค์</label>
                                        <input type="number" class="form-control" id="equipment" name="equipment">
                                    </div>


                                    <div class="col-md-12 mt-3">
                                        <label for="detail" class="form-label">รายละเอียดของห้อง</label>
                                        <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
                                    </div>


                                    <!-- </select> -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                                    <!-- <div class="show" id="show"></div> -->

                                    <div class="col-md-12 mt-3">
                                        <label for="num_people" class="form-label">จำนวนคนที่บรรจุได้(คน)</label>
                                        <input type="text" class="form-control" id="num_people" name="num_people">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="price" class="form-label">ราคา</label>
                                        <input type="int" class="form-control" id="price" name="price">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-primary me-md-2" type="submit">บันทึก</button>
                                            <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./Manageroom_types.php'">ยกเลิก
                                            </button>
                                        </div>
                                    </div>
                                </form>
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