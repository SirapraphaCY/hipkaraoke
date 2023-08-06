<?php
require "./connection/connecdb.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>จัดการธนาคาร</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <script type="text/javascript" src="http://ajax.googleapis.com/…/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/…/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php include('./sidebarAdmin.php') ?>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script>


    <script>
        function showBank(str) {
            if (str == "") {
                document.getElementById("bank_name").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("showBank").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showBank.php?bank_name_id=" + str, true);
            xmlhttp.send();
        }
    </script>

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
            /* text-align: center; */
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
                content: "ชื่อธนาคาร";
            }

            td.tablelist:nth-of-type(3):before {
                content: "ชื่อบัญชี";
            }

            td.tablelist:nth-of-type(4):before {
                content: "เลขบัญชี";
            }


            td.tablelist:nth-of-type(5):before {
                content: "รูปภาพ";
            }

            td.tablelist:nth-of-type(6):before {
                content: "จัดการ";
            }

        }
    </style>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">จัดการธนาคาร</h3>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มธนาคาร
                            </button>

                            <form class="row g-3" method="POST" action="./addBankS.php" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มธนาคาร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="form-label" class="form-label">เลือกธนาคาร</label>
                                                        <select name="bank_name" id="bank_name" class="form-select" required>
                                                            <?php
                                                            $sql = "SELECT * FROM bank_name";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo '<option id="form" value="' . $row["bank_name_id"] . '">' . $row["bank_name"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">เลขที่บัญชีธนาคาร</label>
                                                        <input type="text" min="1" class="form-control" id="numbank" name="numbank" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">ชื่อบัญชี</label>
                                                        <input type="text" class="form-control" id="bank_account" name="bank_account" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="formFileMultiple" class="form-label">เลือกไฟล์</label>
                                                        <input type="file" class="form-control" id="bank_img" name="bank_img" multiple required>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มธนาคาร</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <select class="form-select form-select-sm col-6" aria-label="form-select-sm example" id="bank_name" onchange="showBank(this.value)">
                                    <option value="100">ธนาคารทั้งหมด</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM bank_name");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo "<option value = " . $row['bank_name_id'] . ">" . $row['bank_name'] . "</option>";
                                    }
                                    ?>
                                </select>


                                <!-- -------------------------------------------------------------------------------------------------- -->
                                <div class="col-6">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded w-50" name="searchBank" id="searchBank" placeholder="ค้นหาธนาคาร..." aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="showBank" id="showBank">

                            <table id="tablelist" class="table-hover mt-2">
                                <thead class='tablelist'>
                                    <th class='tablelist'>ลำดับ</th>
                                    <th class='tablelist'>ชื่อธนาคาร</th>
                                    <th class='tablelist'>ชื่อบัญชี</th>
                                    <th class='tablelist'>เลขที่บัญชี</th>
                                    <th class='tablelist'>รูปภาพ</th>
                                    <th class='tablelist'>จัดการ</th>
                                </thead>

                                <tbody class='tablelist'>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM bank INNER JOIN bank_name ON (bank.bank_name_id = bank_name.bank_name_id)");
                                    $n = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $bank_id = $row['bank_id'];
                                        $bank_name = $row['bank_name'];
                                        $bank_account = $row['bank_account'];
                                        $bank_img = $row['bank_img'];
                                        $numbank = $row['numbank'];

                                    ?>

                                        <tr class='tablelist'>
                                            <td class='tablelist'><?php echo $n; ?></td>
                                            <td class='tablelist'><?php echo $row['bank_name']; ?></td>
                                            <td class='tablelist'><?php echo $row['bank_account']; ?></td>
                                            <td class='tablelist'><?php echo $row['numbank']; ?></td>
                                            <td class='tablelist'><img src=<?php echo $row['bank_img']; ?> width="50" alt='scan'></td>



                                            <td class='tablelist'>
                                                <a href='#exampleModal1<?php echo $bank_id ?>' class='btn btn-sm btn-warning' data-bs-toggle='modal'>
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>

                                                <div class="modal fade" id="exampleModal1<?php echo $bank_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form action="./edit_BS.php?bank_id=<?php echo $row['bank_id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขธนาคาร</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form >
                                                                        <div class="mb-3">
                                                                            <label class="form-label">ประเภท</label>
                                                                            <select name="bank_name_id" id="bank_name_id" class="form-select" readonly>

                                                                                <?php
                                                                                $sql2 = "SELECT * FROM bank_name";
                                                                                $result2 = mysqli_query($conn, $sql2);
                                                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                                                    if ($bank_name_id == $row2["bank_name_id"]) {
                                                                                        $checked = "selected";
                                                                                    } else {
                                                                                        $checked = "";
                                                                                    }
                                                                                    echo '<option id="form" value="' . $row2["bank_name_id"] . '"' . $checked . '>' . $row2["bank_name"] .  '</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="numbank" class="form-label">เลขที่บัญชี</label>
                                                                            <input type="text" min="1" class="form-control" id="numbank" name="numbank" value="<?php echo $numbank ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="bank_account" class="form-label">ชื่อบัญชี</label>
                                                                            <input type="text" class="form-control" id="bank_account" name="bank_account" value="<?php echo $bank_account ?>">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <p class="lable_format">รูปภาพ</p>
                                                                            <input type="file" name="bank_img" id="bank_img" class="form-control" value="<?php echo $bank_img ?>">
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
                                                <a href='./deleteBank.php?bank_id=<?php echo $bank_id ?>' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $n++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            $("#searchBank").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#showBank tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>