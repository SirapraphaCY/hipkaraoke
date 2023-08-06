<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
include "./connection/connecdb.php";
?>

<head>
    <title>แก้ไขเมนูอาหาร</title>

    <?php
    include "./sidebarAdmin.php";
    ?>

</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container">
                <div class="row ">

                    <?php
                    $food_detail_id = $_GET['food_detail_id']; 
                    
                    $sql1 = mysqli_query($conn, "SELECT * FROM food_type INNER JOIN food_detail ON (food_type.foodtype_id = food_detail.foodtype_id) WHERE food_detail_id = '".$food_detail_id."'");

                    $row = mysqli_fetch_array($sql1);
                    $food_detail_id = $row['food_detail_id'];                    
                    $food_name = $row['food_name'];
                    $pd_price = $row['pd_price'];
                    $pd_qty = $row['pd_qty'];
                    $type_name = $row['type_name'];
                    $foodtype_id = $row['foodtype_id'];
                    $picture = $row['picture'];
                    

                    ?>
                    <h4 class="title align-baseline">แก้ไขเมนู <?php echo $food_name; ?> </h4>
                    <div class="card mt-3 mt-n5 shadow-sm fs-6" style="border-radius:8px;">
                        <div class="card-body">
                            <form class="row g-3 " action="./updatefood.php?food_detail_id=<?php echo $row['food_detail_id']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12 mt-3">
                                    <label for="food_name" class="form-label">ชื่อเมนู</label>
                                    <input type="text" class="form-control text-dark" id="food_name" name="food_name" value="<?php echo $food_name; ?>">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="pd_price" class="form-label">ราคา</label>
                                    <input type="text" class="form-control"  id="price" name="pd_price" value="<?php echo $pd_price; ?>">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="pd_qty" class="form-label">จำนวน</label>
                                    <input type="number" class="form-control" id="pd_qty" name="pd_qty" value="<?php echo $pd_qty; ?>">
                                </div>

                                <div class="col-md-12 mt-3">
                                        <p class="picture">รูปภาพ</p>
                                        <input type="file" name="picture" id="picture" class="form-control">
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label >ประเภท</label>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <select name="foodtype_id" id="foodtype_id" class="form-select" readonly>

                                                <?php
                                                $sql2 = "SELECT * FROM food_type";
                                                $result2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                    if ($foodtype_id == $row2["foodtype_id"]) {
                                                        $checked = "selected";
                                                    } else {
                                                        $checked = "";
                                                    }
                                                    echo '<option id="form" value="' . $row2["foodtype_id"] . '"' . $checked . '>' . $row2["type_name"] .  '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-12 mt-4">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <button class="btn btn-primary me-md-2" type="submit">อัพเดต</button>
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