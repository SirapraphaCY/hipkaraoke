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

<?php

$bank_name = intval($_GET["bank_name_id"]);
if ($bank_name == "100") {
    $sql = mysqli_query($conn, "SELECT * FROM bank_name INNER JOIN  bank
    ON (bank_name.bank_name_id = bank.bank_name_id) ORDER BY bank.bank_name_id");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM bank_name INNER JOIN bank 
    ON bank_name.bank_name_id = bank.bank_name_id WHERE bank.bank_name_id = " . $bank_name . " ORDER BY bank_name.bank_name_id");
}

$n = 1;


echo "
<table id='tablelist' class='table-hover mt-2'>
    <thead class='tablelist'>
        <th class='tablelist'>ลำดับ</th>
        <th class='tablelist'>ชื่อธนาคาร</th>
        <th class='tablelist'>ชื่อบัญชี</th>
        <th class='tablelist'>เลขที่บัญชี</th>
        <th class='tablelist'>รูปภาพ</th>
        <th class='tablelist'>จัดการ</th>
    </thead>";


while ($row = mysqli_fetch_array($sql)) {
    $bank_id        = $row['bank_id'];
    $bank_name      = $row['bank_name'];
    $bank_account   = $row['bank_account'];
    $bank_img       = $row['bank_img'];
    $numbank        = $row['numbank'];
    echo "
    <tbody class='tablelist'>
        <tr class='tablelist'>
            <td class='tablelist'>" . $n . "</td>
            <td class='tablelist'>" . $bank_name . "</td>
            <td class='tablelist'>" . $bank_account . "</td>
            <td class='tablelist'>" . $numbank . "</td>
            <td class='tablelist'><img src='$bank_img'  width='100' style='object-fit: cover;'></td>
            <td class='tablelist'>
                <a href='./edit_Bank.php?bank_id=" . $bank_id . "'  class ='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a>
                <a href='./deleteBank.php?bank_id=" . $bank_id . "' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></a>
            </td>
        </tr>";
    $n++;
}
echo "</table>";

?>