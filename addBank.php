<?php require "./connection/connecdb.php"; ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <title>จัดการธนาคาร</title>
    <?php
    include "./sidebarAdmin.php";
    ?>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
         @media only screen and (max-width : 700px) {
            /* For mobile phones: */
            .container{
                width: 100% !important;
            }
            h4 {
            margin-left: 30% !important;
        }
        
        }
    
        h4 {
            margin-left: 25%;
        }
    </style>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="row ">
                <h4>เพิ่มธนาคาร</h4>
                <div class="container card mt-3 mt-n5 shadow-sm fs-6 w-50" style="border-radius:8px;">

                    <div class="card-body">

                        <form class="row g-3" method="post" action="./addBankS.php" enctype="multipart/form-data">
                            <div class="col-12 p-3">
                                <div class="row">
                                    <label for="form-label" class="form-label">เลือกธนาคาร</label>
                                    <select name="bank_name" id="bank_name" class="form-select" require>
                                        <?php
                                        $sql = "SELECT * FROM bank_name";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option id="form" value="' . $row["bank_name_id"] . '">' . $row["bank_name"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label class="form-label" require>เลขที่บัญชีธนาคาร</label>
                                <input type="number" min="1" class="form-control" id="bank_account" name="bank_account" require>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label class="form-label" require>ชื่อบัญชี</label>
                                <input type="text" class="form-control" id="bank_account" name="bank_account" require>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="formFileMultiple" class="form-label">เลือกไฟล์</label>
                                <input type="file" class="form-control" id="bank_img" name="bank_img" multiple require>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button class="btn btn-primary me-md-2" type="submit">บันทึก </button>
                                    <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./BankManage.php'">ยกเลิก </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>