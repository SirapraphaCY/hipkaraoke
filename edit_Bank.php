<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>แก้ไขธนาคาร</title>
    <?php include('./sidebarAdmin.php') ?>
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
            <div class="row">
                <h4>แก้ไขธนาคาร</h4>

                <?php
                $bank_id = $_GET['bank_id'];

                $sql = mysqli_query($conn, "SELECT * FROM bank INNER JOIN bank_name ON (bank.bank_name_id = bank_name.bank_name_id) WHERE bank_id = '" . $bank_id . "'");

                $row = mysqli_fetch_array($sql);
                $bank_id = $row['bank_id'];
                $bank_name = $row['bank_name'];
                $bank_account = $row['bank_account'];
                $bank_name_id = $row['bank_name_id'];
                $bank_img = $row['bank_img'];
                $numbank= $row['numbank'];
                ?>

                <div class="container card mt-3 mt-n5 shadow-sm fs-6 w-50" style="border-radius:8px;">
                    <div class="card-body">
                        <form class="row g-3" method="post" action="./addBankS.php" enctype="multipart/form-data">
                            <div class="col-12 p-3">
                                <div class="row">
                                    <label for="form-label" class="form-label">เลือกธนาคาร</label>
                                    <select id="bank_name" name="bank_name" class="form-select" require>

                                        <?php
                                        $sql = "SELECT * FROM bank";
                                        $sql2 = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($sql2)) {
                                            if ($bank_name_id == $row["bank_name_id"]) {
                                                $checked = "selected";
                                            } else {
                                                $checked = "";
                                            }
                                            echo '<option id="form" value="' . $row["bank_name_id"] . '"' . $checked . '>' . $row["bank_name"] . '</option>';
                                        }
                                   
                                        ?>

                                    </select>

                                </div>
                            </div>


                            <div class="col-md-12 mt-1">
                                <label for="numbank" class="form-label">เลขที่บัญชี</label>
                                <input type="number" min="-1" class="form-control" id="numbank" name="numbank" value="<?php echo $numbank ?>">
                            </div>

                            <div class="col-md-12 mt-1">
                                <label for="bank_account" class="form-label">ชื่อบัญชี</label>
                                <input type="text" class="form-control" id="bank_account" name="bank_account" value="<?php echo $bank_account ?>">
                            </div>

                            <div class="col-md-12 mt-3">
                                <p class="lable_format">รูปภาพ</p>
                                <input type="file" name="bank_img" id="bank_img" class="form-control" value="<?php echo $bank_img ?>">
                            </div>


                            <!-- ---------------button--------------- -->
                            <div class="col-12 mt-4">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button class="btn btn-primary me-md-2" type="submit">บันทึก</button>
                                    <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./BankManage.php'">ยกเลิก</button>
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