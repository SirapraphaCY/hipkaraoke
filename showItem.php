<?php require "./connection/connecdb.php"; ?>

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
            content: "ชื่อห้อง";
        }

        td.tablelist:nth-of-type(3):before {
            content: "รายละเอียดห้อง";
        }


        td.tablelist:nth-of-type(4):before {
            content: "ประเภท";
        }

        td.tablelist:nth-of-type(5):before {
            content: "ราคา";
        }

        td.tablelist:nth-of-type(6):before {
            content: "สถานะ";
        }

        td.tablelist:nth-of-type(7):before {
            content: "จัดการ";
        }

    }

    </style>
<?php
// $perpage = 8;
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     $page = 1;
// }
// $start = ($page - 1) * $perpage;
// $sql = mysqli_query($conn, "SELECT * FROM food_type INNER JOIN food_detail ON (food_type.foodtype_id = food_detail.foodtype_id ) Limit {$start}, {$perpage}");

$food_type = intval($_GET["food_type"]);
if ($food_type == "100") {
    $sql = mysqli_query($conn, "SELECT * FROM food_detail INNER JOIN food_type 
    ON (food_detail.foodtype_id = food_type.foodtype_id) ORDER BY food_detail.food_detail_id");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM food_detail INNER JOIN food_type 
    ON food_detail.foodtype_id = food_type.foodtype_id WHERE food_type.foodtype_id = " . $food_type . " ORDER BY food_detail.food_detail_id ");
}

$n = 1;


echo "
<table id='tablelist' class='table-hover mt-2'>
    <thead class='tablelist'>
            <th class='tablelist'>ลำดับ</th>
            <th class='tablelist'>รูปภาพ</th>
            <th class='tablelist'>ชื่อสินค้า</th>
            <th class='tablelist'>ราคา (บาท)</th>
            <th class='tablelist'>จำนวนในคลัง (ชิ้น)</th>
            <th class='tablelist'>ประเภท</th>
            <th class='tablelist'>จัดการ</th>
    </thead>";


while ($row = mysqli_fetch_array($sql)) {
    $foodId = $row['food_detail_id'];
    $picture        = $row['picture'];
    $food_name      = $row['food_name'];
    $price          = $row['pd_price'];
    $numfood_items  = $row['pd_qty'];
    $type_name      = $row['type_names'];
    echo "
    <tbody class='tablelist'>
        <tr class='tablelist' >
            <td class='tablelist'>" . $n . "</td>
            <td class='tablelist'><img src='$picture'  width='100' style='object-fit: cover;' ></td>
            <td class='tablelist'>" . $food_name . "</td>
            <td class='tablelist'>" . $price . "</td>
            <td class='tablelist'>" . $numfood_items . "</td>
            <td class='tablelist'>" . $type_name . "</td>
            <td class='tablelist'>
                <a href='./editfoodAM.php?food=" . $foodId . "'  class ='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a>
                <a href='./deletefood.php?food=" . $foodId . "' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a>
            </td>
        </tr>";
    $n++;
}
echo "</table>";


?>

