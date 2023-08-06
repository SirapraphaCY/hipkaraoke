<?php
include "./connection/connecdb.php";

if (isset($_GET["customer"])) {
    $search = $_GET["search"];

         $sql = "SELECT * FROM customer JOIN booking_detail 
                ON  customer.cus_id= booking_detail.cus_id
                JOIN booking 
                ON booking_detail.booking_id = booking.booking_id
                WHERE customer.cus_id LIKE %$search% OR username LIKE %$search%
                ORDER BY booking_detail.bookDE_id DESC ";
                $result = mysqli_query($conn, $sql);
                $num_row = 1;
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                        <tr onclick="getDetail(<?php echo $row['bookDE_id'] ?>)">
                            <td><?php echo $num_row ?></td>
                            <td><?php echo $row["bookDE_id"] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["bkdatetime"] ?></td>
                            <td>
                                <div class="btn" role="group" aria-label="Basic mixed styles example">
                                    <span class="badge rounded-pill bg-warning text-dark">รออนุมัติ</span>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $num_row++;
                    }
                  
     

                
            }
        }
         ?>