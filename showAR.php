<?php include "./connection/connecdb.php"; ?>

<html>

<body>
    <?php
    $room_type = intval($_GET["room_type"]);
    $sql = mysqli_query($conn, "SELECT * FROM room_type_detail 
    inner join room_detail 
    ON room_type_detail.roomtype_id = room_detail.roomtype_id 
    WHERE room_type_detail.roomtype_id = " . $room_type . " GROUP BY name_type");

    while ($row = mysqli_fetch_array($sql)) { ?>

        <table>
            <tr>
                <th>รายละเอียดของห้อง</th>
                <th>ราคาของห้อง</th>
            </tr>

            <tr>
                <td>
                    ไมค์(<?php echo $row["equipment"] ?>)
                    <?php echo $row["detail"] ?>
                </td>
                <td><?php echo $row["price"] ?></td>
            </tr>
        </table>

    <?php } ?>
</body>


</html>