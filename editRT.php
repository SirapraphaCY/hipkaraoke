<?php
include "./connection/connecdb.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <title>แก้ไขประเภทห้อง</title>
    <?php include('./sidebarAdmin.php') ?>
</head>

<body>
    <?php
    $roomtype_id = $_GET['roomtype_id'];
    ?>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row">
                    <h4 class="title align-baseline">แก้ไขประเภทห้อง</h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <div class="row">
                                <form class="row g-3" method="POST" action="./editRTS.php?mn=<?php echo  $roomtype_id; ?>" enctype='multipart/form-data'>

                                    <?php
                                    $roomtype_id = $_GET['roomtype_id'];
                                    // echo $roomtype_id;

                                    $sql = mysqli_query($conn, "SELECT * FROM room_type_detail 
                                    WHERE roomtype_id = '$roomtype_id' ");
                                    // session_start();
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $roomtype_id  = $row["roomtype_id"];
                                        $roomName     = $row["roomName"];
                                        $name_type = $row['name_type'];
                                        $equipment = $row['equipment'];
                                        $num_people = $row['num_people'];
                                        $price = $row['price'];
                                        $detail = $row['detail'];
                                        $pic = $row["img"];
                                    }
                                    ?>
                                    <div class="col-md-12 mt-3">
                                        <p class="lable_format">รูปภาพ</p>
                                        <input type="file" name="img_upload" id="img_upload" class="form-control" value="<?php echo $pic ?>">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="roomName" class="form-label">ชื่อห้อง</label>
                                        <input type="text" class="form-control" id="roomName" name="roomName" value="<?php echo $roomName ?>">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="name_type" class="form-label">ประเภทห้อง</label>
                                        <input type="text" class="form-control" id="name_type" name="name_type" value="<?php echo $name_type ?>">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="equipment" class="form-label">จำนวนไมค์</label>
                                        <input type="number" class="form-control" id="equipment" name="equipment" value="<?php echo $equipment ?>" min="1">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="detail" class="form-label">รายละเอียดของห้อง</label>
                                        <textarea class="form-control" id="detail" name="detail" rows="3"><?php echo $detail ?></textarea>
                                    </div>



                                    <div class="col-md-12 mt-3">
                                        <label for="num_people" class="form-label">จำนวนคนที่บรรจุได้(คน)</label>
                                        <input type="text" class="form-control" id="num_people" name="num_people" value="<?php echo $num_people ?>"  min="1">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="price" class="form-label">ราคา</label>
                                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price ?>"  min="1">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <button class="btn btn-primary me-md-2" type="submit">บันทึก</button>
                                            <button class="btn btn-danger btn-rounded" type="button" onclick="location.href='./Manageroom_types.php'">ยกเลิก </button>



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