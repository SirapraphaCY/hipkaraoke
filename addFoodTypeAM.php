<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>เพิ่มประเภทห้อง</title>
    <?php include('./sidebarAdmin.php') ?>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">เพิ่มประเภทของอาหาร</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">
                                <form class="row g-3" method="POST" action="./addFtAmSeccess.php">

                                    <div class="col-md-12 mt-3">
                                        <label for="type_name" class="form-label">ประเภทอาหาร</label>
                                        <input type="text" class="form-control" id="type_name" name="type_name">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-primary me-md-2" type="submit">บันทึก</button>
                                            <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./foodTypeAM.php'">ยกเลิก
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