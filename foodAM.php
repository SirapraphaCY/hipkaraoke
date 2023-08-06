<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require "./connection/connecdb.php";
?>

<head>
    <title>จัดการเมนูอาหาร</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script>

    <?php
    include "./sidebarAdmin.php";
    ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/…/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/…/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        /* table tablelist  */
        #tablelist {
            border-collapse: collapse;
            width: 100%;
            /* border-radius: 80px;  */
            table-layout: fixed;
            text-align: center;
        }

        #tablelist,
        td .tablelist,
        th .tablelist {
            border: 1px;
            padding: 5px;
        }

        thead .tablelist {
            background-color: #FA7E23;
            height: 50px;
            text-align: center;
            color: #FDFEFE;
            font-size: 1.2em;
            /* font-weight: bold; */

        }

        tr.tablelist {
            font-size: 1.1em;
            color: #000000;
            font-weight: normal;
        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            #tablelist,
            thead.tablelist,
            tbody.tablelist,
            th.tablelist,
            td.tablelist,
            tr.tablelist {
                display: block;
                text-align: left;

            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead.tablelist tr .tablelist {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr.tablelist {
                margin: 0 0 1rem 0;
            }

            tr.tablelist:nth-child(odd) {
                background: #f2f2f2;
            }

            td.tablelist {
                /* Behave  like a "row" */
                border: none;
                /* border-bottom: 1px solid #eee; */
                position: relative;
                padding-left: 50%;
                /* background-color: #FA7E23; */
            }

            td.tablelist:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 0;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }


            td.tablelist:nth-of-type(1):before {
                content: "ลำดับ";
            }

            td.tablelist:nth-of-type(2):before {
                content: "รูปภาพ";
            }

            td.tablelist:nth-of-type(3):before {
                content: "ชื่อสินค้า";
            }


            td.tablelist:nth-of-type(4):before {
                content: "ราคา (บาท)";
            }

            td.tablelist:nth-of-type(5):before {
                content: "จำนวนในคลัง (ชิ้น)";
            }

            td.tablelist:nth-of-type(6):before {
                content: "ประเภท    ";
            }

            td.tablelist:nth-of-type(7):before {
                content: "จัดการ";
            }

        }
    </style>

    <script>
        function showItem(str) {
            if (str == "") {
                document.getElementById("food_type").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("showFood").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showItem.php?food_type=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">จัดการเมนูอาหาร</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- <button type="button" onclick="location.href='./addfoodAM.php'" class="btn btn-sm btn-success btn-rounded">
                                    <i class="fas fa-plus-circle"></i> เพิ่มเมนู
                                </button> -->

                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มเมนู
                            </button>

                            <form class="row g-3" method="POST" action="./addfood.php" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มห้อง</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label">ชื่อเมนู</label>
                                                        <input type="text" class="form-control" id="food_name" name="food_name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">ราคา</label>
                                                        <input type="number" min="1" class="form-control" id="pd_price" name="pd_price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">จำนวน</label>
                                                        <input type="number" min="1" class="form-control" id="pd_qty" name="pd_qty">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputAddress" class="form-label">ประเภท</label>
                                                        <select name="foodtype_id" id="foodtype_id" class="form-select" required>
                                                            <?php
                                                            $sql = "SELECT * FROM food_type";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo '<option id="form" value="' . $row["foodtype_id"] . '">' . $row["type_names"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFileMultiple" class="form-label">เลือกไฟล์</label>
                                                        <input class="form-control" type="file" id="formFileMultiple" name="picture" multiple>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มเมนู</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>



                            <div class="btn-group" role="group" aria-label="Basic example">
                                <select class="form-select form-select-sm col-6" aria-label="form-select-sm example" id="food_type" onchange="showItem(this.value)">
                                    <option value="100">ประเภททั้งหมด</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM food_type");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value = " . $row['foodtype_id'] . ">" . $row['type_names'] . "</option>";
                                    }
                                    ?>
                                </select>

                                <!-- --------------------search---------------------- -->
                                <div class=" col-6">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" name="searchFood" id="searchFood" placeholder="ค้นหาชื่ออาหาร..." aria-label="Search" aria-describedby="search-addon" />

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="showFood" id="showFood">

                            <table id="tablelist" class="table-hover mt-2">
                                <thead class="tablelist">
                                    <th class="tablelist">ลำดับ</th>
                                    <th class="tablelist">รูปภาพ</th>
                                    <th class="tablelist">ชื่อสินค้า</th>
                                    <th class="tablelist">ราคา (บาท)</th>
                                    <th class="tablelist">จำนวนในคลัง (ชิ้น)</th>
                                    <th class="tablelist">ประเภท</th>
                                    <th class="tablelist">จัดการ</th>
                                </thead>

                                <tbody class="tablelist">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM food_type INNER JOIN food_detail 
                                        ON (food_type.foodtype_id = food_detail.foodtype_id)");
                                    $n = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $food_detail_id = $row['food_detail_id'];
                                        $food_name = $row['food_name'];
                                        $pd_price = $row['pd_price'];
                                        $pd_qty = $row['pd_qty'];
                                        $type_name = $row['type_names'];


                                    ?>
                                        <tr class="tablelist">
                                            <td class="tablelist"><?php echo $n; ?></td>
                                            <td class="tablelist"><img src=<?php echo $row['picture']; ?> width="100" style="object-fit: cover;" alt='snack'></td>
                                            <td class="tablelist"><?php echo $row['food_name']; ?></td>
                                            <td class="tablelist"><?php echo $row['pd_price']; ?></td>
                                            <td class="tablelist"><?php echo $row['pd_qty']; ?></td>
                                            <td class="tablelist"><?php echo $row['type_names']; ?></td>

                                            <td class="tablelist">
                                                <a href='#exampleModal1<?php echo $food_detail_id ?>' class='btn btn-sm btn-warning' data-bs-toggle='modal'>
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>
                                                <div class="modal fade" id="exampleModal1<?php echo $food_detail_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form action="./updatefood.php?food_detail_id=<?php echo $row['food_detail_id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขเมนู <?php echo $food_name; ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left;">
                                                                    <form>
                                                                        <div class="mb-3">
                                                                            <label for="food_name" class="form-label">ชื่อเมนู</label>
                                                                            <input type="text" class="form-control text-dark" id="food_name" name="food_name" value="<?php echo $food_name; ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="pd_price" class="form-label">ราคา</label>
                                                                            <input type="text" class="form-control" id="price" name="pd_price" value="<?php echo $pd_price; ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="pd_qty" class="form-label">จำนวน</label>
                                                                            <input type="number" class="form-control" id="pd_qty" name="pd_qty" value="<?php echo $pd_qty; ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <p class="picture">รูปภาพ</p>
                                                                            <input type="file" name="picture" id="picture" class="form-control">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="inputAddress" class="form-label">ประเภท</label>
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
                                                                                    echo '<option id="form" value="' . $row2["foodtype_id"] . '"' . $checked . '>' . $row2["type_names"] .  '</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    <button class="btn btn-primary" type="submit">อัพเดท</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <a href='./deletefood.php?food_detail_id=<?php echo $food_detail_id ?>' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $n++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <a href='./editfoodAM.php?food_detail_id=" . $food_detail_id . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a> -->
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div id="searchData"> </div>
    <script>
        $(document).ready(function() {
            $("#searchFood").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#showFood tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>