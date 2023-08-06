<?php
include "./connection/connecdb.php";

$bank_id = $_GET['bank_id'];
$sql = "DELETE FROM bank WHERE bank_id = '" . $bank_id . "'";

$query = mysqli_query($conn, $sql);
header('location:BankManage.php');


?>