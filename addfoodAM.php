<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require "./connection/connecdb.php";
?>

<head>
    <title>จัดการเมนูอาหาร</title>

    <?php
    include "./sidebarAdmin.php";
    ?>

</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row ">
                    <h4 class="title align-baseline">เพิ่มเมนู</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">

                            <form class="row g-3" method="post" action="./addfood.php" enctype="multipart/form-data">
                                <div class="col-md-12 mt-3">
                                    <label class="form-label">ชื่อเมนู</label>
                                    <input type="text" class="form-control" id="food_name" name="food_name">
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">ราคา</label>
                                    <input type="number" min="1" class="form-control" id="pd_price" name="pd_price" >
                                </div>
                                <div class="col-6 mt-3">
                                    <label  class="form-label">จำนวน</label>
                                    <input type="number" min="1" class="form-control" id="pd_qty" name="pd_qty" >
                                </div>

                                <div class="col-6 p-3">
                                    <div class="row">
                                        <label for="inputAddress" class="form-label">ประเภท</label>
                                        <select name="foodtype_id" id="foodtype_id" class="form-select" required>
                                            <?php
                                            $sql = "SELECT * FROM food_type";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option id="form" value="' . $row["foodtype_id"] . '">' . $row["type_name"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 p-3">
                                    <label for="formFileMultiple" class="form-label">เลือกไฟล์</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="picture" multiple>
                                </div>


                                <div class="col-12 mt-4">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <button class="btn btn-primary me-md-2" type="submit" required>เพิ่มเมนู </button>
                                        <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./foodAM.php'">ยกเลิก </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>