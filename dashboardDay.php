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
                $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                room_type_detail.name_type AS name, DAY(date) AS dayy FROM `booking_detail` INNER JOIN room_type_detail 
                ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid,dayy";

                // echo "Today is " . date("m") . "<br>";
                $result1 = $conn->query($sql2);
                while ($row3 = $result1->fetch_object()) {
                    if ($row3->dayy == date('d')) {
                        echo "['" . $row3->name . "', " . $row3->count_room_type . "],";
                    }
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


    <!-- -------------------------------------------------------------------------รายได้จากห้อง------------------------------------------------------------------------------ -->

    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Dinosaur', 'Length'],
                <?php
                //         $sql5 = "SELECT hours, room_typeid , name_type ,MONTH(date) AS month , 
                //    room_type_detail.price, SUM(booking_detail.hours) AS count FROM `booking_detail` 
                //    INNER JOIN room_type_detail ON booking_detail.room_typeid = room_type_detail.roomtype_id
                //    GROUP BY booking_detail.room_typeid";

                //         $result5 = $conn->query($sql5);
                //         while ($row5 = $result5->fetch_object()) {
                //             if ($row5->month == date('m')) {
                //                 echo "['" . $row5->name_type . "', '" . $row5->count . "'],";
                //             }
                //         }

                ?>

            ]);

            var options = {
                title: 'รายได้จากการใช้ห้อง',
                legend: {
                    position: 'none',
                    fontSize: 22,
                },
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script> -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                // $sql5 = "SELECT  room_typeid , name_type ,DAY(date) AS month , room_type_detail.price, SUM(hours),
                // price*SUM(hours) AS sum FROM 'booking_detail' INNER JOIN room_type_detail ON 
                // booking_detail.room_typeid = room_type_detail.roomtype_id 
                // GROUP BY booking_detail.room_typeid";

                // $result5 = $conn->query($sql5);
                // while ($row5 = $result5->fetch_object()) {
                //     if ($row5->month == date('d')) {
                //         if ($row5->name_type == "S") {
                //             echo "['" . $row5->name_type . "', " . $row5->sum . ", 'color: #3366cc'" . "],";
                //         }
                //         if ($row5->name_type == "M") {
                //             echo "['" . $row5->name_type . "', " . $row5->sum . ", 'color: #dc3912'" . "],";
                //         }
                //         if ($row5->name_type == "VIP1-VIP2") {
                //             echo "['" . $row5->name_type . "', " . $row5->sum . ", 'color: #ff9900'" . "],";
                //         }
                //         if ($row5->name_type == "VIP3-VIP4") {
                //             echo "['" . $row5->name_type . "', " . $row5->sum . ", 'color: #109618'" . "],";
                //         }
                //         // echo "['" . $row5->name_type . "', " . $row5->count . ", 'color: rgb(143, 196, 217)'" . "],";
                //     }
                // }


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
                title: "รายได้จากประเภทห้อง",
                width: 700,
                height: 500,
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
    </script> -->

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
                $sql12 = "SELECT food_type.type_names , COUNT(food_type.foodtype_id) AS counttype, DAY(date) AS dday FROM booking_detail 
                INNER JOIN order_food ON booking_detail.bookDE_id = order_food.bookDE_id INNER JOIN food_type 
                ON order_food.foodtype_id = food_type.foodtype_id GROUP BY order_food.foodtype_id, DAY(date)";

                $result12 = $conn->query($sql12);
                while ($row12 = $result12->fetch_object()) {
                    if ($row12->dday == date('d')) {
                        // if ($row12->name == "S") {
                        //     echo "['" . $row12->type_name . "', " . $row12->counttype . ", 'color: #3366cc'" . "],";
                        // }
                        echo "['" . $row12->type_names . "', " . $row12->counttype . ", 'color: rgb(143, 196, 217)'" . "],";
                    }
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
    <!-- //////////////////////////////////////////////////////////////////barchart_valuess///////////////////////////////////////////////////////////// -->

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

                $sql14 = "SELECT food_detail.food_name, order_food.bookDE_id, booking_detail.date, 
                            SUM(order_food.qty) AS sum_f , DAY(booking_detail.date) 
                            AS dday FROM order_food INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id INNER JOIN booking_detail 
                            ON order_food.bookDE_id=booking_detail.bookDE_id GROUP BY order_food.food_detail_id";
                $result14 = $conn->query($sql14);
                while ($row14 = $result14->fetch_object()) {
                    if ($row14->dday == date('d')) {
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
                    } 
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
                title: "ประเภทอาหารที่ถูกเลือกมากที่สุด",
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


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        .table1 {
            float: left;
        }

        .table2 {
            float: right;
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

        .close {
            display: none;
        }

        /* .open {
            display: inline;
        } */
        table.table1 {
            float: right;
        }

        /* .textheadtable{
            float: right;
        } */
    </style>


</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content">
            <div class="container-filud">
                <div class="row">
                    <div class="card-body">
                        <label class="fs-4">เลือกข้อมูลที่ต้องการแสดง: </label>
                        <select name="select" id='SelectOption' class="form-select fs-5" aria-label="Default select example">
                            <option value="forDay" selected>ข้อมูลรายวัน</option>
                            <option value="forMonth">ข้อมูลรายเดือน</option>
                            <option value="forYear">ข้อมูลรายปี</option>
                        </select>
                        <!-- onchange="openMonth()"  -->
                        <!-- <select name="selectMonth" id='SelectOptionMonth' class="form-select close" aria-label="Default select example">
                            <option value="forDay" selected>ข้อมูลรายวัน</option>
                            <option value="forMonth">ข้อมูลรายเดือน</option>
                            <option value="forYear">ข้อมูลรายปี</option>
                        </select>

                        <script>
                            function openMonth (){
                                if  (document.getElementById("SelectOption").value == "forMonth"){
                                    document.getElementById("SelectOptionMonth").className = "open"
                                }else{
                                    document.getElementById("SelectOptionMonth").className = "close"
                                }
                            }
                        </script> -->



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
                        <div class="card p-3">
                            <div class="justify-content-between">
                                <?php

                                $THmonth = array(" ", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);
                                $TH = $THmonth[date('n')];
                                $Day = date('d');
                                $Year = date('Y');

                                ?>

                                <h3 class="text-center">กระดานสรุปผลเว็บไซต์ในวันที่ <?php echo $Day ?> เดือน <?php echo $TH ?> ปี <?php echo $Year ?></h3>

                                <div class="flex-container">
                                    <div>
                                        <?php
                                        $sql = "SELECT DAY(date) as mname,
                                                SUM(sumfoodprice) as total
                                                FROM booking_detail GROUP BY DAY(date)";
                                        $result = $conn->query($sql);
                                        $none = "ขณะนี้ยังไม่มีข้อมูล";
                                        while ($row = $result->fetch_object()) {
                                            if ($row->mname == date('d')) {
                                                echo "<h5>รายได้จากอาหาร " . $row->total . " บาท</h5>";
                                            }
                                        }
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                        $sql3 = "SELECT SUM(hours) AS totalsum, DAY(date) AS day 
                                                FROM booking_detail GROUP BY DAY(date)";
                                        $result3 = $conn->query($sql3);
                                        while ($row2 = $result3->fetch_object()) {
                                            if ($row2->day == date('d')) {
                                                echo "<h5>จำนวนชั่วโมงที่ถูกจอง " . $row2->totalsum . " ชั่วโมง</h5>";
                                            } 
                                        }
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                        $sql4 = "SELECT SUM(num) AS people, DAY(date) AS day 
                                                FROM booking_detail GROUP BY DAY(date)";
                                        $result4 = $conn->query($sql4);
                                        while ($row4 = $result4->fetch_object()) {
                                            if ($row4->day == date('d')) {
                                                echo "<h5>จำนวนคนที่เข้าใช้งาน " . $row4->people . " คน</h5>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
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



                            <!-- ----------------------------------------------------------------------------------รายได้จากอาหาร-------------------------------------------------------------------------------- -->

                            <div class="card-body">
                                <!-- <h3 class="textheadtable">รายได้จากอาหาร</h3> -->

                                <?php
                                $sql15 = "SELECT DATE(date) as mname,
                                        SUM(sumfoodprice) as total
                                        FROM booking_detail GROUP BY DATE(date)";
                                $result = mysqli_query($conn, $sql15);

                                ?>

                                <table class='table1 table-hover table-bordered' style="width:50%; text-align: center;">
                                    <thead class='fs-6 text-white' style='background-color:#F16725;'>
                                        <tr>
                                            <th scope='col'>รายได้อาหาร/วัน-เดือน-ปี</th>
                                            <th scope='col'>จำนวน(บาท)</th>
                                            <?php

                                            while ($row = mysqli_fetch_array($result)) {
                                                // $date = $row['date'];
                                                // $sumfoodprice = $row['sumfoodprice'];
                                                $change = $row['mname'];
                                                $Dday = date("d-m-Y", strtotime($change));
                                                $money = $row['total'];

                                            ?>

                                        </tr>

                                    </thead>

                                    <tbody class='fs-6'>
                                        <tr>
                                            <td><?php echo $Dday ?></td>
                                            <td><?php echo $money ?></td>

                                        </tr>
                                    <?php }  ?>
                                    </tbody>

                                </table>


                                <!-- --------------------------------------------------------------table2---------------------------------------------------------------- -->


                                <?php
                                //     $sql = "SELECT MONTHNAME(date) as mname,
                                // SUM(sumfoodprice) as total
                                // FROM booking_detail GROUP BY MONTH(date)";
                                //     $result = $conn->query($sql);

                                // $THmonth = array(" ", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);
                                // $TH = $THmonth[date('n')];


                                ?>
                                <!-- <table class='table2 table-hover table-bordered' style="width:48%; text-align: center;">
                                                <thead class='fs-6 text-white' style='background-color:#9bb95b;'>
                                                    <tr>
                                                        <th scope='col'>เดือน</th>
                                                        <th scope='col'>จำนวน(บาท)</th>
                                                        <?php

                                                        //while ($row = $result->fetch_object()) : {
                                                        // $date = $row['date'];
                                                        // $sumfoodprice = $row['sumfoodprice'];
                                                        //} 
                                                        ?>

                                                    </tr>

                                                </thead>

                                                <tbody class='fs-6'>
                                                    <tr>
                                                        <td><?php //echo $TH 
                                                            ?></td>
                                                        <td><?php //echo $row->total 
                                                            ?></td>

                                                    </tr>
                                                <?php //endwhile; 
                                                ?>
                                                </tbody>

                                            </table> -->


                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </div>
    </div>
    </main>
    </div>






</body>

</html>