<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require "./connection/connecdb.php"; ?>

<head>

    <title>จัดการประเภทห้อง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <?php include('./sidebarAdmin.php') ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
           * {
        font-family: 'Kanit', sans-serif;
    }

         #tablefoodtype {
        border-collapse: collapse;
        width: 100%;
        font-size: 1.1rem;
        table-layout: fixed;
        /* text-align: center; */
    }

    #tablefoodtype,
    td.tablefoodtype,
    th.tablefoodtype {
        border: 1px;
        padding: 3px;
    }

    thead.tablefoodtype {
        background-color: #FA7E23;
        height: 50px;
        /* text-align: center; */
        color: #FDFEFE;

    }

    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        tr.tablefoodtype:nth-child(odd) {
            background: #f2f2f2;
        }

    }
    </style>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3  class="title align-baseline fw-bold">จัดการประเภทอาหาร</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- <button type="button" onclick="location.href='./addFoodTypeAM.php'" class="btn btn-sm btn-success btn-rounded">
                                    <i class="fas fa-plus-circle"></i> เพิ่มประเภทอาหาร
                                </button> -->
                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มประเภทอาหาร
                            </button>

                            <form class="row g-3" method="POST" action="./addFtAmSeccess.php">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทอาหาร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="type_name" class="form-label">ประเภทอาหาร</label>
                                                        <input type="text" class="form-control" id="type_name" name="type_name">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มประเภทอาหาร</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- ----------------------------------------------------------โชว์ตารางประเภทอาหาร-------------------------------------------------------- -->
                        <table class="table-hover mt-2" id="tablefoodtype">
                            <thead class="tablefoodtype">
                                <th class="tablefoodtype">ลำดับ</th>
                                <th class="tablefoodtype">ชื่อประเภทอาหาร</th>
                                <th class="tablefoodtype">จัดการ</th>
                            </thead>

                            <tbody class="tablefoodtype">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM food_type");
                                $n = 1;

                                while ($row = mysqli_fetch_array($sql)) {
                                    $id = $row['foodtype_id'];
                                    $type_name = $row['type_names'];
                                    // echo $type_name;
                                    // echo $id;

                                ?>
                                    <tr class="tablefoodtype">
                                        <td class="tablefoodtype"><?php echo $n ?></td>
                                        <td class="tablefoodtype"><?php echo $type_name ?></td>
                                        <td class="tablefoodtype">
                                            <a href='#exampleModal1<?php echo $id ?>' class='btn btn-sm btn-warning' data-bs-toggle='modal'>
                                                <i class='bi bi-pencil-square'></i>
                                            </a>

                                            <div class="modal fade" id="exampleModal1<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="./editFtAmSc.php?foodtype_id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทอาหาร <?php //echo $type_name 
                                                                                                                                ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <?php
                                                                    // $foodtype_id = $_GET['foodtype_id'];
                                                                    // $sql = mysqli_query($conn, "SELECT * FROM food_type WHERE foodtype_id = '$foodtype_id' ");
                                                                    // // session_start();
                                                                    // while ($row = mysqli_fetch_array($sql)) {
                                                                    //     $foodtype_id  = $row["foodtype_id"];
                                                                    //     $type_name = $row["type_name"];
                                                                    // }
                                                                    ?>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">ประเภทอาหาร</label>
                                                                        <input type="text" class="form-control" id="type_name" name="type_name" value="<?php echo $row['type_names'] ?>">
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
                                            <!-- <a href='./editFtAm.php?foodtype_id=" . $id . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a> -->
                                            <a href='./deleteFtAm.php?foodtype_id=<?php echo $id ?>' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a>
                                            <!-- <a href='./deletefood.php?food_detail_id=<?php echo $food_detail_id ?>' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a> -->

                                        </td>
                                    <?php
                                    $n++;
                                }
                                    ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>