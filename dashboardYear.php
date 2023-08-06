<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require "./connection/connecdb.php";
?>


<head>


    <title>Dashboard</title>
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
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <!--------------------------------------------------------------------------- PieChart ---------------------------------------------------------------------------->
    <?php
    if (isset($_POST["selectYear"])) {
        $yy = $_POST["selectYear"];
        if ($yy != 'allyear') {
            $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                                    room_type_detail.name_type AS name, YEAR(date) AS yyear FROM `booking_detail` INNER JOIN room_type_detail 
                                    ON booking_detail.room_typeid = room_type_detail.roomtype_id WHERE YEAR(date)='$yy' GROUP BY booking_detail.room_typeid";

            $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, YEAR(date) AS yyear FROM booking_detail 
                                    INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                                    ON order_food.foodtype_id = food_type.foodtype_id WHERE YEAR(date)='$yy' GROUP BY order_food.foodtype_id ";

            $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                                    SUM(order_food.qty) AS sum_f , YEAR(booking_detail.date) 
                                    AS yyear FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                                    ON order_food.bookDE_id=booking_detail.bookDE_id WHERE YEAR(date)='$yy' GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

            $sql = "SELECT YEAR(date) as mname, SUM(sumfoodprice) as total FROM booking_detail WHERE YEAR(date)='$yy'";

            $sql3 = "SELECT SUM(hours) AS totalsum, YEAR(date) AS yyear FROM booking_detail WHERE YEAR(date)='$yy'";

            $sql4 = "SELECT SUM(num) AS people, YEAR(date) AS yyear FROM booking_detail WHERE YEAR(date)='$yy'";

            $sql15 = "SELECT SUM(sumfoodprice) as total , DATE_FORMAT(date,'%Y') AS formatM FROM booking_detail WHERE YEAR(date)='$yy'";
        } elseif ($yy == 'allyear') {
            $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                    room_type_detail.name_type AS name, YEAR(date) AS yyear FROM `booking_detail` INNER JOIN room_type_detail 
                    ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid";

            $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, YEAR(date) AS yyear FROM booking_detail 
                    INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                    ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id ";

            $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                    SUM(order_food.qty) AS sum_f , YEAR(booking_detail.date) 
                    AS yyear FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                    ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

            $sql = "SELECT YEAR(date) as mname, SUM(sumfoodprice) as total FROM booking_detail";

            $sql3 = "SELECT SUM(hours) AS totalsum, YEAR(date) AS yyear FROM booking_detail";

            $sql4 = "SELECT SUM(num) AS people, YEAR(date) AS yyear FROM booking_detail";

            $sql15 = "SELECT SUM(sumfoodprice) as total, DATE_FORMAT(date,'%m') AS formatM FROM booking_detail GROUP BY YEAR(date)";
        }
    } else {
        $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                                room_type_detail.name_type AS name, YEAR(date) AS yyear FROM `booking_detail` INNER JOIN room_type_detail 
                                ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid";

        $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, YEAR(date) AS yyear FROM booking_detail 
                                INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                                ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id ";

        $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                                SUM(order_food.qty) AS sum_f , YEAR(booking_detail.date) 
                                AS yyear FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                                ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id ORDER BY sum_f DESC LIMIT 0,5";

        $sql = "SELECT YEAR(date) as mname, SUM(sumfoodprice) as total FROM booking_detail";

        $sql3 = "SELECT SUM(hours) AS totalsum, YEAR(date) AS yyear FROM booking_detail";

        $sql4 = "SELECT SUM(num) AS people, YEAR(date) AS yyear FROM booking_detail";

        $sql15 = "SELECT SUM(sumfoodprice) as total ,DATE_FORMAT(date,'%Y') AS formatM  FROM booking_detail GROUP BY YEAR(date)";
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
                // $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                // room_type_detail.name_type AS name, MONTH(date) AS month FROM `booking_detail` INNER JOIN room_type_detail 
                // ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid,month";


                $result1 = $conn->query($sql2);
                while ($row3 = $result1->fetch_object()) {
                    // if ($row3->month == date('m')) {
                    echo "['" . $row3->name . "', " . $row3->count_room_type . "],";
                    // }
                    // elseif($row3->month != date('m')){
                    //     echo "['" . $row3->name . "', " . $row3->count_room_type . "],";
                    // }
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
                // $sql12 = "SELECT food_type.type_name , COUNT(food_type.foodtype_id) AS counttype, MONTH(date) AS month FROM booking_detail 
                // INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                // ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id, MONTH(date)";

                $result12 = $conn->query($sql12);
                while ($row12 = $result12->fetch_object()) {
                    // if ($row12->month == date('m')) {
                    // if ($row12->name == "S") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #3366cc'" . "],";
                    // }
                    // if ($row12->name == "M") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #4488cc'" . "],";
                    // }
                    // if ($row12->name == "VIP1-VIP2") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #5588cc'" . "],";
                    // }
                    // if ($row12->name == "VIP3-VIP4") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #4400cc'" . "],";
                    // }
                    echo "['" . $row12->type_names . "', " . $row12->counttype . ", 'color: rgb(143, 196, 217)'" . "],";
                    // }
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


    <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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

                // $sql14 = "SELECT food_detail.food_name, SUM(order_food.qty) AS sumfood, order_food.bookDE_id, booking_detail.date, 
                //             COUNT(order_food.food_detail_id) AS countfood,SUM(order_food.qty)*COUNT(order_food.food_detail_id) AS sum_f , MONTH(booking_detail.date) 
                //             AS month FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                //             ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id";
                $result14 = $conn->query($sql14);
                while ($row14 = $result14->fetch_object()) {
                    // if ($row14->month == date('m')) {
                    // if ($row12->name == "S") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #3366cc'" . "],";
                    // }
                    // if ($row12->name == "M") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #4488cc'" . "],";
                    // }
                    // if ($row12->name == "VIP1-VIP2") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #5588cc'" . "],";
                    // }
                    // if ($row12->name == "VIP3-VIP4") {
                    //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #4400cc'" . "],";
                    // }
                    echo "['" . $row14->food_name . "', " . $row14->sum_f . ", 'color: rgb(248, 163, 137)'" . "],";
                    // }
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
                title: "อาหารที่ถูกสั่ง",
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
    <!-- --------------------------------------------------------------------------------------------------------------------------------- -->


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
                        <!-- --------------------------------------------------------------------------------------------------------------------------- -->
                        <div class="d-flex justify-content-start">

                            <select name="select" id='SelectOption' class="form-select fs-5" aria-label="Default select example">
                                <option value="forDay">ข้อมูลรายวัน</option>
                                <option value="forMonth">ข้อมูลรายเดือน</option>
                                <option value="forYear" selected>ข้อมูลรายปี</option>
                            </select>

                            <form method="POST">
                                <select name="selectYear" id='selectYear' class="form-select fs-5" aria-label="Default select example" onchange="this.form.submit();">
                                    <option value="allyear">ปีทั้งหมด</option>
                                    <?php
                                    $selecty = "SELECT YEAR(date) FROM booking_detail GROUP BY YEAR(date)";
                                    $resultselect = $conn->query($selecty);

                                    while ($yearRow = mysqli_fetch_array($resultselect)) { ?>
                                        <option value="<?php echo $yearRow['YEAR(date)']; ?>" <?php
                                                                                                if (isset($_POST["selectYear"]) && ($_POST["selectYear"]) == $yearRow['YEAR(date)']) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                                ?>>

                                            <?php echo $yearRow['YEAR(date)'] ?>
                                        </option>

                                    <?php }

                                    ?>


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
                                <h3 class="text-center">รายงานสรุปผลรายปี</h3>
                                <div class="flex-container">
                                    <div>
                                        <?php
                                        // $sql = "SELECT MONTH(date) as mname,
                                        //     SUM(sumfoodprice) as total
                                        //     FROM booking_detail GROUP BY MONTH(date)";
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
                                        // $sql3 = "SELECT SUM(hours) AS totalsum, MONTH(date) AS month 
                                        //     FROM booking_detail GROUP BY MONTH(date)";
                                        $result3 = $conn->query($sql3);
                                        while ($row2 = $result3->fetch_object()) {
                                            // if ($row2->month == date('m')) {
                                            echo "<h5>จำนวนชั่วโมงที่ถูกจอง " . $row2->totalsum . " ชั่วโมง</h5>";
                                            // }
                                        }
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                        // $sql4 = "SELECT SUM(num) AS people, MONTH(date) AS month 
                                        //         FROM booking_detail GROUP BY MONTH(date)";
                                        $result4 = $conn->query($sql4);
                                        while ($row4 = $result4->fetch_object()) {
                                            // if ($row4->month == date('m')) {
                                            echo "<h5>จำนวนคนที่เข้าใช้งาน " . $row4->people . " คน</h5>";
                                            // }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- </span> -->
                            </div>
                        </div><br>


                        <div class="card">
                            <!-- <span class="border"> -->
                            <div class="d-flex justify-content-between">
                                <div id="piechart" style="width: 700px; height: 400px; margin-left:auto; margin-right: auto;">
                                </div>
                                <div id="columnchart_valuess" style="width: 900px; height: 300px;"></div>

                            </div>
                            <!-- </span> -->

                            <div class="d-flex justify-content-between">
                                <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
                            </div>





                            <div class="card-body">
                                <!-- <h4>รายได้จากอาหาร</h4> -->
                                <?php
                                // $sql15 = "SELECT YEAR(date) as mname,
                                //         SUM(sumfoodprice) as total
                                //         FROM booking_detail GROUP BY YEAR(date)";
                                $result = $conn->query($sql15);

                                // $THmonth = array(" ", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);
                                // $TH = $THmonth[date('n')];


                                ?>
                                <table class='table2 table-hover table-bordered' style="width:50%; text-align: center;">
                                    <thead class='fs-6 text-white' style='background-color:#9bb95b;'>
                                        <tr>
                                            <th scope='col'>รายได้จากอาหาร</th>
                                            <th scope='col'>จำนวน(บาท)</th>
                                            <?php

                                            while ($row = mysqli_fetch_array($result)) {
                                                // $date = $row['date'];
                                                // $sumfoodprice = $row['sumfoodprice'];
                                            ?>

                                        </tr>

                                    </thead>

                                    <tbody class='fs-6'>
                                        <tr>
                                            <td><?php echo $row['formatM'] ?></td>
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