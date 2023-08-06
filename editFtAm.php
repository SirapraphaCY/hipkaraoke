<?php
include "connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>แก้ไขประเภทอาหาร</title>
    <?php include('./sidebarAdmin.php') ?>
</head>

<body>
    <?php
    $foodtype_id = $_GET['foodtype_id'];
    ?>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">แก้ไขประเภทอาหาร</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">
                                <form class="row g-3" method="POST" action="./editFtAmSc.php?roomtype_id=<?php echo $foodtype_id ?>" enctype='multipart/form-data'>

                                    <?php
                                    $foodtype_id = $_GET['foodtype_id'];
                                    $sql = mysqli_query($conn, "SELECT * FROM food_type WHERE foodtype_id = '$foodtype_id' ");
                                    // session_start();
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $foodtype_id  = $row["foodtype_id"];
                                        $type_name = $row["type_name"];
                                    }
                                    ?>

                                    <div class="col-md-12 mt-3">
                                        <label for="type_name" class="form-label">ประเภทอาหาร</label>
                                        <input type="text" class="form-control" id="type_name" name="type_name" value="<?php echo $type_name ?>">
                                    </div>

                                    <!-- ---------------button--------------- -->
                                    <div class="col-12 mt-4">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-primary me-md-2" type="submit">บันทึก</button>
                                            <button class="btn btn-danger btn-rounded" data-mdb-ripple-color="dark" type="button" onclick="location.href='./foodTypeAM.php'">ยกเลิก</button>
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