<?php

require "./connection/connecdb.php";

$sql = "SELECT * FROM customer 
INNER JOIN booking_detail 
ON customer.cus_id = booking_detail.cus_id 
INNER JOIN room_detail 
ON booking_detail.room_id = room_detail.room_id
WHERE customer.cus_id";

$result = $conn->query($sql);

?>

<table border="1" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อคนจอง</th>
            <th>วันที่จอง</th>
            <th>ชื่อห้อง</th>
            <th>ชื่อประเภทห้อง</th>
            <th>เวลาเริ่ม</th>
            <th>เวลาสิ้นสุด</th>
            <th>ราคาห้อง</th>
            <th>สถานนะ</th>  
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            
        ?>
    <tr>
            <td><?php echo $row['cus_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['room_name']; ?></td>
            <td><?php echo $row['room_id']; ?></td>
            <td><?php echo $row['room_id']; ?></td>
            <td><?php echo $row['room_id']; ?></td> 
            <td><?php echo $row['room_id']; ?></td> 
            <td><?php echo $row['room_id']; ?></td>     
        </tr>
        <?php  }?>
    </tbody>

</table>