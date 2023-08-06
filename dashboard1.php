<!DOCTYPE html>
<html lang="en">
<?php
require "./connection/connecdb.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <?php include('./sidebarAdmin.php'); ?>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],

                <?php
                $sql2 = "SELECT booking_detail.room_typeid,COUNT(booking_detail.room_typeid) AS count_room_type,
                room_type_detail.name_type AS name, MONTH(date) AS month FROM `booking_detail` INNER JOIN room_type_detail 
                ON booking_detail.room_typeid = room_type_detail.roomtype_id GROUP BY booking_detail.room_typeid,month";

                // echo "Today is " . date("m") . "<br>";
                $result1 = $conn->query($sql2);
                while ($row3 = $result1->fetch_object()) {
                    if ($row3->month == date('m')) {
                        echo "['" . $row3->name . "', " . $row3->count_room_type . "],";
                    }
                }
                ?>
            ]);

            var options = {
                title: 'ประเภทห้องที่นิยมเลือกมากที่สุด',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['food_name', 'qtytotal'],
                <?php
                $query = "SELECT 
                order_food.food_detail_id, 
                food_detail.food_name,
                COUNT(* ) AS qtytotal 
                FROM order_food 
                INNER JOIN food_detail ON order_food.food_detail_id = food_detail.food_detail_id
                GROUP BY order_food.food_detail_id";
                $rs = mysqli_query($conn, $query);
                foreach ($rs as $rs_c) {
                    echo "['" . $rs_c['food_name'] . "'," . $rs_c['qtytotal'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Chess opening moves',
                width: 900,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'Chess opening moves',
                    subtitle: 'popularity by percentage'
                },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'จำนวน'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "85%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">Dashboard</h3>
                    <div class="card-body">
                        <h3>ประเภทห้องที่นิยมเลือกมากที่สุด</h3>
                        <div id="piechart_3d" style="width: 700px; height: 500px;"></div>


                        <h3>เมนูอาหารที่ขายดีที่สุด</h3>
                        <div id="top_x_div" style="width: 900px; height: 500px;"></div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>