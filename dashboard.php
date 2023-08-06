<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include "./connection/connecdb.php";
?>

<head>
    <title>Dashboard</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script type="text/javascript" src="http://ajax.googleapis.com/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/libs/jquery/3.3.1/jquery.min.js"></script>

    <?php
    include "./sidebarAdmin.php";
    ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/…/libs/jquery/1.4.3/jquery.min.js"> </script>
    <script src="http://ajax.googleapis.com/…/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->



    <?php
    if (isset($_POST["selectMonth"])) {
        $monthh = $_POST["selectMonth"];
        if ($monthh != 'all') {
            $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
            room_type_detail.name_type AS name, MONTH(date) AS month FROM booking_detail INNER JOIN room_type_detail 
            ON booking_detail.room_typeid = room_type_detail.roomtype_id WHERE MONTH(date)='$monthh' GROUP BY booking_detail.room_typeid";

            $sql12 = "SELECT food_type.type_names, COUNT(food_type.foodtype_id) AS counttype, MONTH(date) AS month FROM booking_detail 
                                    INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                                    ON order_food.foodtype_id = food_type.foodtype_id WHERE MONTH(date)='$monthh' GROUP BY order_food.foodtype_id ";

            $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                                    SUM(order_food.qty) AS sum_f , MONTH(booking_detail.date) 
                                    AS month FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                                    ON order_food.bookDE_id=booking_detail.bookDE_id WHERE MONTH(date)='$monthh' GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

            $sql = "SELECT MONTH(date) as mname, SUM(sumfoodprice) as total FROM booking_detail WHERE MONTH(date)='$monthh'";

            $sql3 = "SELECT SUM(hours) AS totalsum, MONTH(date) AS month FROM booking_detail WHERE MONTH(date)='$monthh'";

            $sql4 = "SELECT SUM(num) AS people, MONTH(date) AS month FROM booking_detail WHERE MONTH(date)='$monthh'";

            $sql15 = "SELECT SUM(sumfoodprice) as total , DATE_FORMAT(date,'%m') AS formatM FROM booking_detail WHERE MONTH(date)='$monthh'";
        } elseif ($monthh == 'all') {
            $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                    room_type_detail.name_type AS name, MONTH(date) AS month FROM `booking_detail` INNER JOIN room_type_detail 
                    ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid";

            $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, MONTH(date) AS month FROM booking_detail 
                    INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                    ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id ";

            $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                    SUM(order_food.qty) AS sum_f , MONTH(booking_detail.date) 
                    AS month FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                    ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

            $sql = "SELECT MONTH(date) as mname, SUM(sumfoodprice) as total FROM booking_detail";

            $sql3 = "SELECT SUM(hours) AS totalsum, MONTH(date) AS month FROM booking_detail";

            $sql4 = "SELECT SUM(num) AS people, MONTH(date) AS month FROM booking_detail";

            $sql15 = "SELECT SUM(sumfoodprice) as total, DATE_FORMAT(date,'%m') AS formatM FROM booking_detail GROUP BY MONTH(date)";
        }
    } else {
        $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                                room_type_detail.name_type AS name, MONTH(date) AS month FROM `booking_detail` INNER JOIN room_type_detail 
                                ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid";

        $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, MONTH(date) AS month FROM booking_detail 
                                INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                                ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id ";

        $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                                    SUM(order_food.qty) AS sum_f , MONTH(booking_detail.date) 
                                    AS month FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                                    ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

        $sql = "SELECT MONTH(date) as mname, SUM(sumfoodprice) as total FROM booking_detail";

        $sql3 = "SELECT SUM(hours) AS totalsum, MONTH(date) AS month FROM booking_detail";

        $sql4 = "SELECT SUM(num) AS people, MONTH(date) AS month FROM booking_detail";

        $sql15 = "SELECT SUM(sumfoodprice) as total ,DATE_FORMAT(date,'%m') AS formatM  FROM booking_detail GROUP BY MONTH(date)";
    }

    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {


            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],

                <?php
                $result1 = $conn->query($sql2);
                while ($row3 = $result1->fetch_object()) {

                    echo "['" . $row3->name . "', " . $row3->count_room_type . "],";
                }
                ?>

            ]);

            var options = {
                title: 'ประเภทของห้องสุดนิยมที่ถูกเลือกใช้',
                fontSize: 20,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

    <!-- ---------------------------------------------------------------------------------------------------------------------------- -->


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                <?php
                $result12 = $conn->query($sql12);
                while ($row12 = $result12->fetch_object()) {
                    echo "['" . $row12->type_names . "', " . $row12->counttype . ", 'color: rgb(143, 196, 217)'" . "],";
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);
            var options = {
                title: "ประเภทอาหารที่ถูกสั่งมากที่สุด",
                width: 600,
                height: 400,
                fontSize: 20,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_valuess"));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                <?php
                $result14 = $conn->query($sql14);
                while ($row14 = $result14->fetch_object()) {

                    echo "['" . $row14->food_name . "', " . $row14->sum_f . ", 'color: rgb(248, 163, 137)'" . "],";
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "อาหารที่ถูกสั่งมากที่สุด 5 อันดับแรก",
                width: 600,
                height: 400,
                fontSize: 20,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        .flex-container {
            display: flex;
        }

        .flex-container>div {
            background-color: #93dada;
            margin: 1%;
            padding: 4%;
            margin-left: 6%;
            /* font-size: 4em; */
        }

        select#SelectOption {
            width: 20%;
        }

        select#allmonth {
            width: 20%;
        }

        table {
            float: right;
        }
    </style>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content">
            <div class="container-filud">
                <div class="row">
                    <div class="card-body">

                        <label class="fs-4">เลือกข้อมูลที่ต้องการแสดง:</label>
                        <div class="d-flex justify-content-start">
                            <select name="select" id='SelectOption' class="form-select fs-5" aria-label="Default select example">
                                <option value="forDay">ข้อมูลรายวัน</option>
                                <option value="forMonth" selected>ข้อมูลรายเดือน</option>
                                <option value="forYear">ข้อมูลรายปี</option>
                            </select>

                            <form method="POST">
                                <select name="selectMonth" id='selectMonth' class="form-select fs-5" aria-label="Default select example" onchange="this.form.submit();">
                                    <option value="all">เดือนทั้งหมด</option>
                                    <?php
                                    $selectm = "SELECT MONTH(date) FROM booking_detail GROUP BY MONTH(date)";
                                    $resultselect = $conn->query($selectm);

                                    while ($monthRow = mysqli_fetch_array($resultselect)) { ?>
                                        <option value="<?php echo $monthRow['MONTH(date)']; ?>" <?php
                                                                                                if (isset($_POST["selectMonth"]) && ($_POST["selectMonth"]) == $monthRow['MONTH(date)']) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                                ?>>

                                            <?php
                                            if ($monthRow['MONTH(date)'] == 1) {
                                                echo "มกราคม";
                                            } else if ($monthRow['MONTH(date)'] == 2) {
                                                echo "กุมภาพันธ์";
                                            } else if ($monthRow['MONTH(date)'] == 3) {
                                                echo "มีนาคม";
                                            } else if ($monthRow['MONTH(date)'] == 4) {
                                                echo "เมษายน";
                                            } else if ($monthRow['MONTH(date)'] == 5) {
                                                echo "พฤษภาคม";
                                            } else if ($monthRow['MONTH(date)'] == 6) {
                                                echo "มิถุนายน";
                                            } else if ($monthRow['MONTH(date)'] == 7) {
                                                echo "กรกฎาคม";
                                            } else if ($monthRow['MONTH(date)'] == 8) {
                                                echo "สิงหาคม";
                                            } else if ($monthRow['MONTH(date)'] == 9) {
                                                echo "กันยายน";
                                            } else if ($monthRow['MONTH(date)'] == 10) {
                                                echo "ตุลาคม";
                                            } else if ($monthRow['MONTH(date)'] == 11) {
                                                echo "พฤศจิกายน";
                                            } else if ($monthRow['MONTH(date)'] == 12) {
                                                echo "ธันวาคม";
                                            }

                                            ?>

                                        </option>

                                    <?php } ?>

                                </select>
                            </form>
                        </div>




                        <script>
                            document.getElementById('SelectOption').addEventListener('change', function() {
                                val = $("#SelectOption").val();

                                console.log(val)
                                if (val === 'forDay') {
                                    window.location.href = 'dashboardDay.php';
                                }
                                if (val === 'forMonth') {
                                    window.location.href = 'dashboard.php';
                                }
                                if (val === 'forYear') {
                                    window.location.href = 'dashboardYear.php';
                                }
                            });
                        </script>

                        <br>
                        <div class="card">
                            <!-- <span class="border"> -->

                            <div class="justify-content-between">

                                <br>
                                <h3 class="text-center">รายงานสรุปผลรายเดือน</h3>
                                <div class="flex-container">
                                    <div>
                                        <?php

                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_object()) {
                                            // if ($row->mname == date('m')) {
                                            echo "<h5>ยอดจาการสั่งซื้ออาหาร " . $row->total . " บาท</h5>";
                                            // }
                                        }
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                        $result3 = $conn->query($sql3);
                                        while ($row2 = $result3->fetch_object()) {

                                            echo "<h5>จำนวนชั่วโมงที่ถูกจอง " . $row2->totalsum . " ชั่วโมง</h5>";
                                        }
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                        $result4 = $conn->query($sql4);
                                        while ($row4 = $result4->fetch_object()) {
                                            echo "<h5>จำนวนคนที่เข้าใช้งาน " . $row4->people . " คน</h5>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div><br>


                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <div id="piechart" style="width: 700px; height: 400px; margin-left:auto; margin-right: auto;">
                                </div>
                                <div id="columnchart_valuess" style="width: 900px; height: 300px;"></div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
                            </div>




                            <div class="card-body">
                                <?php
                                $result = $conn->query($sql15);

                                ?>
                                <table class='table table-hover table-bordered' style="width:50%; text-align: center;">
                                    <thead class='fs-5 text-white' style='background-color:#9bb95b;'>
                                        <th scope='col'>รายได้จากอาหาร</th>
                                        <th scope='col'>จำนวน(บาท)</th>
                                        <?php

                                        $THmonth = array(
                                            "01" => "มกราคม",
                                            "02" => "กุมภาพันธ์",
                                            "03" => "มีนาคม",
                                            "04" => "เมษายน",
                                            "05" => "พฤษภาคม",
                                            "06" => "มิถุนายน",
                                            "07" => "กรกฎาคม",
                                            "08" => "สิงหาคม",
                                            "09" => "กันยายน",
                                            "10" => "ตุลาคม",
                                            "11" => "พฤศจิกายน",
                                            "12" => "ธันวาคม"
                                        );
                                        while ($row = mysqli_fetch_array($result)) {
                                            $nm = $row['formatM'];
                                            $TH = $THmonth[$nm];
                                        ?>

                                    </thead>

                                    <tbody class='fs-6'>
                                        <tr>
                                            <td><?php echo $TH ?></td>
                                            <td><?php echo $row['total'] ?></td>

                                        </tr>

                                    </tbody>
                                <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>