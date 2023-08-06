<?php include "./connection/connecdb.php"; ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการจอง</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4a72c52b07.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Kanit:wght@100&family=Style+Script&display=swap" rel="stylesheet">

    <script>
        function getDetail(args) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();

            } else {
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }

            let count = 0;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.responseText != "" && count == 0) {
                    console.log(xmlhttp.responseText);
                    count++;
                    document.getElementById("result_query").innerHTML = xmlhttp.responseText;
                    document.getElementById("btn_" + args).click();
                    findData()
                }

            }
            xmlhttp.open("GET", "./reserveListController.php?getDetail&bookDE_id=" + args, true);
            xmlhttp.send();
        }

        function findData() {
            let type = document.getElementById("select_type").value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();

            } else {
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }

            let count = 0;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.responseText != "" && count == 0) {
                    console.log(xmlhttp.responseText);
                    count++;
                    document.getElementById("result_query").innerHTML = xmlhttp.responseText;
                    //  id show
                }

            }
            if (type == "all") {
                xmlhttp.open("GET", "./reserveListController.php?getData=all", true);

            } else {
                xmlhttp.open("GET", "./reserveListController.php?getData=cus", true);

            }
            xmlhttp.send();
        }
    </script>
</head>

<body onload="findData()">
    <?php include('./sidebarAdmin.php') ?>
    <div class="page-wrapper chiller-theme toggled">
        <main class="page-content ">
            <div class="container-filud">
                <div class="row ">
                    <h3 class="title align-baseline fw-bold">รายการจองคิว</h3>
                    <div class="card-body">
                        <div id="select_type">
                        </div>

                        <div id="result_query">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>


</html>