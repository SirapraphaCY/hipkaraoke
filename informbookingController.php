<?php
require './connection/connecdb.php';
if (isset($_GET['getData'])) {
    $booking_detail = $_GET['bookDE_id'];
    echo $booking_detail;
    $sql = "SELECT * FROM customer JOIN booking_detail
    ON booking_detail.cus_id = customer.cus_id JOIN order_food 
    ON order_food.bookDE_id = booking_detail.bookDE_id JOIN food_detail
    ON order_food.food_detail_id = food_detail.food_detail_id 
    WHERE booking_detail.bookDE_id = $booking_detail";
    $result = mysqli_query($conn, $sql);

    $getUser = "SELECT * FROM customer JOIN booking_detail
    ON booking_detail.cus_id = customer.cus_id 
    WHERE booking_detail.bookDE_id = $booking_detail";
    $result2 = mysqli_query($conn, $getUser);
    $rowName = mysqli_fetch_array($result2);
?>
    <div class="container mt-5" id="<?php echo $booking_detail ?>">
        <div class="card-body shadow p-3 rounded ">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <div class="border-end">
                        <div class="card-body">
                            <span class="fs-4">ขนาดห้อง</span>
                            <p class="fs-4"></p>
                            <!-- <input type='date' class="form-control" /> -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 text-center">
                    <div class="border-end">
                        <div class="card-body">
                            <span class="fs-4">วันที่จอง</span>
                            <p class="fs-4"><?php echo $rowName["phone"] ?></p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<?php

}
?>

<?php
    require "./connection/connecdb.php";
  
    $food_detail = $_SESSION['food_detail_id'];
    echo $food_detail;
    $sqlInform = "SELECT * FROM customer JOIN booking_detail
    ON booking_detail.cus_id = customer.cus_id 
    WHERE booking_detail.bookDE_id = $booking_detail";
    $result = mysqli_query($conn, $sqlInform); 


   
    ?>
