<?php include "./connection/connecdb.php"; ?>
<!DOCTYPE html>
<html lang="en">
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

                    console.log(xmlhttp.responseText)
                    window.location = "./informbooking.php?pd_id=" + xmlhttp.responseText;
                    loadData()
                }

            }
            // xmlhttp.open("GET", "./cart.php?savetocart&customer=" + cus_id +
            //     "&food_detail=" + str_food_detail + "&qty=" + str_numfood_items +
            //     "&total=" + total, true);
            // xmlhttp.send();
            xmlhttp.open("GET", "./cart.php?savetocart&food_detail_id=" + str_food_detail + "&qty=" + str_numfood_items +
                "&total=" + total, true);
            xmlhttp.send();
        }

    </script>

</head>
<?php

$food_type = intval($_GET["food_type"]);
if ($food_type == "100") {
    $sql = mysqli_query($conn, "SELECT * FROM food_detail INNER JOIN food_type 
    ON (food_detail.foodtype_id = food_type.foodtype_id) ORDER BY food_detail.food_detail_id");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM food_detail INNER JOIN food_type 
    ON food_detail.foodtype_id = food_type.foodtype_id WHERE food_type.foodtype_id = " . $food_type . " ORDER BY food_detail.food_detail_id ");
}

while ($row = mysqli_fetch_array($sql)) {
    $foodId = $row['food_detail_id'];
    $food_name = $row['food_name'];
    $pd_qty = $row['pd_qty'];
    $pd_price = $row['pd_price'];
    $picture = $row['picture'];
    $type_name      = $row['type_names'];

    echo "
    
        <div class='col' onclick='addcart(".$foodId.")'>
            <div class='cards'>
                <img class='res' height='150' style='object-fit:cover;' src='" . $picture . "' focusable='false'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $food_name. "</h5>
                    <h6 class='card-text'>คงเหลือ : " . $pd_qty . "</h6>
                    <h6 class='card-text'>ราคา : " . $pd_price . " บาท</h6>
                </div>
                <div class='card-footer text-center'>
                    <span>
                        คลิกเพื่อเพิ่ม
                    </span>
                </div>
            </div>
        </div>";
}
?>