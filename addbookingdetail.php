

<?php
include "./connection/connecdb.php";
session_start();

// roomtype_id

$detail = $_GET['detail'];
$button =  $_POST['mn'];

// echo $button;
// echo $detail;
// exit;



// วันที่จอง
$bookingdate = $_POST['bookingdate'];
// echo  $bookingdate; 
// echo "<br><br> ";
// echo $detail;
// exit;
$num_people = $_POST['num_people'];
$note = $_POST['note'];
// $detail = $_GET['detail'];
$timeplay = $_POST['timeplay'];
$cus_id = $_SESSION['cus_id'];

$sql1 = "INSERT INTO booking(cus_id) VALUES ('" . $cus_id . "')";
$query1 = mysqli_query($conn, $sql1);

$room = "SELECT * FROM room_detail WHERE roomtype_id = $detail AND statusRoom_id = 0
ORDER BY RAND()
LIMIT 1";
$ranroom = mysqli_query($conn, $room);


$size = sizeof($timeplay);
$n = 1;
$timeplays = [];
for ($i = 0; $i < sizeof($timeplay); $i++) {
    $x = floatval($timeplay[$i]);
    $x++;
    array_push($timeplays, $timeplay[$i] . "-" . $x . ":00");
}


$buff = join(',', $timeplays);


// 


$check = "SELECT * FROM booking
        WHERE cus_id = $cus_id  order by booking_id DESC limit 1";
$queryy = mysqli_query($conn, $check);
$row1 = mysqli_fetch_array($queryy);

while ($rn = mysqli_fetch_array($ranroom)) {
    $mn =  $rn['room_id'];
    // echo $mn;
    // exit;
    for ($ii = 0; $ii <= sizeof($timeplay) - 1; $ii++) {
        // $date = $r['timeplays'];

        $e = explode(",", $buff);
        // echo $e[0];
        // echo $e[1];
        // echo $e[$ii];
        $ch = "SELECT * FROM booking_detail  WHERE   booking_detail.room_id =  $mn AND booking_detail.statusRoomid = 1 AND booking_detail.date = '$bookingdate' AND timeplays LIKE '%$e[$ii]%';  ";
        $q = mysqli_query($conn, $ch);
        if ($q->num_rows > 0) {
            while ($r = mysqli_fetch_array($q)) {
                if ($q->num_rows > 0) {
                    echo "
                    <script>
                    alert('ช่วงเวลานี้ถูกจองไปแล้ว $e[$ii]');window.history.back('./bookingdatetime.php?detail=roomtype_id')
                    </script>
                    ";
                }
            }
            break;
        } else {

            // $statusroom = "UPDATE room_detail SET statusRoomid  = 1 WHERE room_id = $mn";
            // $statusRoomid  = mysqli_query($conn, $statusroom);

            $booking_id = $row1['booking_id'];
            // $sql = "INSERT INTO booking_detail(cus_id,booking_id,date,timeplays, num,note,room_typeid,room_id,hours,statusRoomid) VALUES ('" . $cus_id . "','" . $booking_id . "','" . $bookingdate . "','" . $buff . "','" . $num_people . "','" . $note . "','" . $detail . "','" . $mn . "','" . $size . "','" . $statusRoomid . "')";
            $sql = "INSERT INTO booking_detail(cus_id,booking_id,date,timeplays, num,note,room_typeid,room_id,hours) VALUES ('" . $cus_id . "','" . $booking_id . "','" . $bookingdate . "','" . $buff . "','" . $num_people . "','" . $note . "','" . $detail . "','" . $mn . "','" . $size . "')";
            $query = mysqli_query($conn, $sql);

            // $sql = "UPDATE room_detail SET statusRoomid  = 1 WHERE room_id = $mn";
            // $result = mysqli_query($conn, $sql);

            $sql = "SELECT * FROM booking_detail
            WHERE cus_id = $cus_id  order by bookDE_id DESC limit 1";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['bookDE_id'] = $row['bookDE_id'];
            // $pd_id = $row['bookDE_id'];

            if ($button == "yes") {
                header("location:./bookingMenu.php");
                
            } else {
                // echo $pd_id;
                // exit;
                $pd_id = $row['bookDE_id'];
                echo $pd_id;
                // exit;
                // header('location:bookingpayment.php?pd_id=$pd_id ');
                header("Location:bookingpayment.php?pd_id=$pd_id");
            }
           
            break;
         
        }
    }
}





?>