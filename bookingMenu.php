<!DOCTYPE html>
<html lang="en">
<?php
require "./connection/connecdb.php";
?>



<head>
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>อาหาร & เครื่องดื่ม</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <script src="./node_modules/bootstrap/dist/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="./toruskit-free/dist/css/toruskit.bundle.css">
    <link rel="stylesheet" href="./css_style/homepage_style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        .cards {
            transition: all 0.2s ease;
            cursor: pointer
        }

        .cards:hover {
            /* box-shadow: 5px 6px 6px 2px #e9ecef; */
            background-color: #ff9e17;
            /* transform: scale(1.1) */
        }

        .card-body h5 .crad-title:hover {
            color: #fff;
        }

        .card-footer {
            background-color: #080808;
            color: #fff
        }

        .res {
            width: 100%;

        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 0.5px solid lightgray;
            border-radius: 4px;
        }
    </style>

    <script>
        let food_detail = {};

        function cal() {
            let total = 0;
            for (i in food_detail) {
                let price = parseInt(document.getElementById("price_" + i).innerHTML)
                total += price * food_detail[i]
            }
            document.getElementById("sumprice").value = total;
            console.log(food_detail)
        }

        function addcart(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                value.innerHTML = parseInt(value.innerHTML) + 1;
                food_detail[food_detail_id] = food_detail[food_detail_id] + 1;
            } else {
                let cart = document.getElementById("allcart");
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                let count = 0;
                xmlhttp.onreadystatechange = function() {

                    if (xmlhttp.responseText != "" && count == 0) {
                        count++;
                        cart.innerHTML += xmlhttp.responseText;
                        food_detail[food_detail_id] = 1;
                        cal()
                    }

                }
                let num = cart.childElementCount + 1;
                xmlhttp.open("GET", "./cart.php?addtocart&food_detail_id=" + food_detail_id + "&numrow=" + num, true);
                xmlhttp.send();
            }
            cal()
        }

        function delfood(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                if (value.innerHTML == 1) {
                    // let con = confirm("คุณต้องการลบสินค้าใช่หรือไม่");
                    // if (con) {
                    document.getElementById("tr_" + food_detail_id).remove();
                    delete food_detail[food_detail_id]
                    // }
                } else {
                    value.innerHTML = parseInt(value.innerHTML) - 1;
                    food_detail[food_detail_id] = food_detail[food_detail_id] - 1;
                }
            }
            cal()
        }

        function plusfood(food_detail_id) {
            if (document.getElementById("tr_" + food_detail_id)) {
                let value = document.getElementById("num_" + food_detail_id);
                value.innerHTML = parseInt(value.innerHTML) + 1;
                food_detail[food_detail_id] = food_detail[food_detail_id] + 1
            }
            cal()
        }

        function deletefood(food_detail_id) {
            if (confirm("คุณต้องการลบรายการนี้ทั้งหมดใช่หรือไม่")) {
                document.getElementById("tr_" + food_detail_id).remove();
                delete food_detail[food_detail_id]
            }
            cal()
        }

        function savetocart() {
            // let cus_id = "";
            let str_food_detail = "";
            let str_numfood_items = "";
            let num = 0;
            for (i in food_detail) {
                if (num == 0) {
                    str_food_detail += i;
                    str_numfood_items += food_detail[i];
                } else {
                    str_food_detail += "," + i;
                    str_numfood_items += "," + food_detail[i];

                }
                num++;
            }
            let total = document.getElementById("sumprice").value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();

            } else {
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }

            let count = 0;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.responseText != "" && count == 0) {
                    count++;
                    console.log(xmlhttp.responseText)
                    document.getElementById("allcart").innerHTML = "";
                    let str_pd = "";
                    let str_qty = "";
                    let pd_buf = "";
                    let i = 0;
                    for (pd_buf in food_detail) {
                        if (i == 0) {
                            str_pd += pd_buf
                            str_qty += food_detail[pd_buf]
                        } else {
                            str_pd += "," + pd_buf
                            str_qty += "," + food_detail[pd_buf]
                        }
                        i++;
                    }
                    //pd_id คือ id ที่ตั้งขึ้นเองเพื่อส่งค่ารวมอาหารไป
                    console.log(xmlhttp.responseText)
                    window.location = "./bookingpayment.php?pd_id=" + xmlhttp.responseText;
                    loadData()
                }


            }

            xmlhttp.open("GET", "./cart.php?savetocart&food_detail_id=" + str_food_detail + "&qty=" + str_numfood_items +
                "&total=" + total, true);
            xmlhttp.send();
        }

        function showTypeFood(str) {
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
                    document.getElementById("showTypeFood").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "showTypeFood.php?food_type=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">

            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"><img src="./img/logo1.png" width="150" alt="logo"></a>

                    <ul class="navbar-nav mb-lg-0 text-light nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="./homepage.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" onclick="location.href='./bookingRoomAll.php'" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">จองห้อง</button>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">อาหาร&เครื่องดื่ม</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
                        <?php
                        include "./connection/connecdb.php";
                        $getSlip = "SELECT *  FROM customer JOIN booking_detail
                        ON booking_detail.cus_id = customer.cus_id 
                        ORDER BY booking_detail.bookDE_id DESC ";
                        $result2 = mysqli_query($conn, $getSlip);
                        $row = mysqli_fetch_array($result2);
                        $username = $row['username'];
                        // $pic = $row['slip'];
                        $PF = $row['picturePF'];
                        // echo $PF;
                        // exit;
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $username ?>
                                <!-- <?php echo $picturePF ?> -->
                                <!-- <div > -->
                                <img src="<?php echo $PF ?>" class="circular--square" alt="...">
                                <!-- </div> -->
                            </a>
                            <style>
                                .circular--square {
                                    border-top-left-radius: 50% 50%;
                                    border-top-right-radius: 50% 50%;
                                    border-bottom-right-radius: 50% 50%;
                                    border-bottom-left-radius: 50% 50%;
                                    width: 30px;
                                    height: 30px;
                                    object-fit: cover;
                                }
                            </style>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./profilecustomer.php">ข้อมูลส่วนตัว</a></li>
                                <!-- <li><a class="dropdown-item" href="#">ประวัติการใช้งาน</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid">
        <P class="fs-3 text-uppercase mt-3 fw-bold">Hip Karaoke | อาหาร & เครื่องดื่ม</P>




        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <article class="blog-post">
                            <div class="row p-3">
                                <div class="btn-group justify-content-end" role="group" aria-label="Basic example">
                                    <select class="form-select form-select col-3" aria-label="form-select-sm example" id="food_type" onchange="showTypeFood(this.value)">
                                        <option value="100">ทั้งหมด</option>

                                        <?php
                                        $sql1 = mysqli_query($conn, "SELECT * FROM food_type");
                                        while ($row = mysqli_fetch_array($sql1)) {
                                            echo "<option value = " . $row['foodtype_id'] . ">" . $row['type_names'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="showTypeFood row row-cols-1 row-cols-md-3 g-4 mt-3" id="showTypeFood">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM food_type INNER JOIN food_detail
                                ON food_type.foodtype_id = food_detail.foodtype_id");

                                    while ($row = mysqli_fetch_array($sql)) {
                                        $food_detail_id = $row['food_detail_id'];
                                        $food_name = $row['food_name'];
                                        $pd_price = $row['pd_price'];
                                        $pd_qty = $row['pd_qty'];
                                        $type_name = $row['type_names'];
                                        // $picture = $row['picture'];
                                    ?>
                                        <div class="col" onclick="addcart('<?php echo $row['food_detail_id'] ?>')">
                                            <div class="cards">
                                                <img class="res" height="150" style="object-fit:cover;" src="<?php echo $row['picture']; ?>" focusable="false">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row['food_name']; ?></h5>
                                                    <h6 class="card-text">คงเหลือ : <?php echo $row['pd_qty']; ?></h6>
                                                    <h6 class="card-text">ราคา : <?php echo $row['pd_price']; ?> บาท</h6>
                                                </div>
                                                <div class='card-footer text-center'>
                                                    <span>
                                                        คลิกเพื่อเพิ่ม
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="position-sticky" style="top: 0.5rem;">
                    <div class="row">
                        <div id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-lg">
                                <div class="modal-content container shadow-sm p-3">
                                    <div class="modal-header p-0">
                                        <h5 class="modal-title fw-bolder" id="exampleModalLabel">
                                            รายการที่สั่งซื้อของคุณ
                                        </h5>
                                    </div>

                                    <div class="modal-lg">
                                        <table>
                                            <thead>
                                                <th scope="col" style="width: 200px;">ลำดับที่</th>
                                                <th scope="col" style="width: 200px;">ชื่อเมนู</th>
                                                <th scope="col" style="width: 150px;">จำนวน</th>
                                                <th scope="col" style="width: 100px;">ราคา</th>
                                                <!-- <th scope="col" style="width: 100px;">ราคารวม</th> -->
                                                <th scope="col" style="width: 100px;"></th>
                                            </thead>

                                            <tbody id="allcart">

                                            </tbody>

                                        </table>



                                        <!-- <span style="color:#F16725;" class="sum_price">
                                            ราคารวม : <input class="sum form-control-plaintext" id="sumprice" type="text" placeholder="0" readonly>
                                        </span> -->

                                        <div class="input-group mb-3">
                                            <span class="input-text sum_price fw-bolder" style="color:#F16725;">ราคารวม : </span>
                                            <input type="text" class="sum" id="sumprice" style="border: none;" placeholder="0" readonly>

                                        </div>
                                        <!-- <p>หมายเหตุ : </p> 
                                        <textarea class="textinput" name="" id="" cols="20" rows="2">ddddddddddddddd</textarea> -->
                                    </div>

                                    <div class="modal-footer">

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">

                                            <button type="button" onclick="window.history.back('./bookingdatetime.php')" value="Back" class="btn btn-dark">
                                                ย้อนกลับ
                                            </button>

                                            <button type="button" onclick="savetocart()" class="btn btn-success">
                                                ยืนยันการสั่งซื้อ
                                            </button>

                                            <button style="display: none;" id="btn_success" type="button" class="btn btn-primary btn_format" data-toggle="modal" data-target="#success">
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <footer class="sticky-bottom mt-5">
                <p class="text-center mt-5">Coppyright 2021&copy;Hip Karaoke</p>
            </footer> -->


    <!-- </form> -->






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="./js/bootstrap.min.js"></script> -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="./toruskit-free/src/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>