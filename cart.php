<?php
require("./connection/connecdb.php");
session_start();

if (isset($_GET['addtocart'])) {
    $food_detail_id = $_GET['food_detail_id'];
    $num_row = $_GET['numrow'];
    $sql = "SELECT * FROM food_detail
    WHERE food_detail_id = '$food_detail_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // $qty = $row['qty'];
    // echo $num_row;
    // echo $num_row;
    // exit;

?>

    <tr id="tr_<?php echo $row["food_detail_id"] ?>">
        <td><?php echo $num_row ?></td>
        <td><?php echo $row['food_name']; ?></td>
        <td>
            <span>
                <button class="btn btn-secondary btn-sm" onclick="delfood('<?php echo $row['food_detail_id'] ?>')">-</button>
            </span>

            <span id="num_<?php echo $row["food_detail_id"] ?>">1</span>

            <span>
                <button class="btn btn-success btn-sm" onclick="plusfood('<?php echo $row['food_detail_id'] ?>')">+</button>
            </span>
        </td>
        <td id="price_<?php echo $row["food_detail_id"] ?>"><?php echo $row['pd_price'] ?></td>
        <!-- <td id="price_<?php echo $row["food_detail_id"] ?>"><?php echo $row['pd_price'] * $row['qty']?></td> -->
        <td>
            <span>
                <button onclick="deletefood('<?php echo $row['food_detail_id'] ?>')" class="btn_delete btn btn-danger"><i class="bi bi-trash-fill"></i></button>
            </span>
        </td>
    </tr>

<?php
}

if (isset($_GET["savetocart"])) {
    $customer = $_SESSION['cus_id'];
    $food_detail_id = $_GET['food_detail_id'];
    $total = $_GET['total'];
    $qty = $_GET["qty"];
    $list_food_detail = explode(",", $food_detail_id);
    $list_qty = explode(",", $qty);
    // $username = "cus_id";
    // echo $customer;
    // echo $food_detail_id;
    // echo $total;
    // // echo $qty;
    // exit;
    


    // UPDATE food_detail SET pd_qty = $totalqty WHERE food_detail_id  = '$prod'"; 
    $sqlCreatOrderFood = "UPDATE booking_detail SET sumfoodprice = $total WHERE bookDE_id = '" . $_SESSION['bookDE_id'] . "'";
    $resultCreatOrderFood = mysqli_query($conn, $sqlCreatOrderFood);


    $sqlFetchId = "SELECT * FROM booking_detail WHERE cus_id = $customer  ORDER BY bookDE_id DESC LIMIT 1 ";
    $resultID = mysqli_query($conn, $sqlFetchId);
    $rowID1 = mysqli_fetch_array($resultID);
    $rowID = $rowID1['bookDE_id'];

    // echo  $rowID;
    // exit;

    $sqlBook = "SELECT * FROM booking WHERE cus_id = $customer ORDER BY booking_id DESC LIMIT 1 ";
    $resultBook = mysqli_query($conn, $sqlBook);
    $rowBook1 = mysqli_fetch_array($resultBook);
    $rowBook = $rowBook1['booking_id'];
    // echo  $rowBook;
    // exit;

    // session_start();
    // $customer = $_SESSION['cus_id'];
    // $sqlCus = "SELECT * FROM customer WHERE cus_id = $customer ";
    // $resultCus = mysqli_query($conn, $sqlCus);
    // $rowCus = mysqli_fetch_array($resultCus);
    // $rowCus = $rowCus['cus_id'];


    for ($i = 0; $i < count($list_food_detail); $i++) {
       
        $prod = $list_food_detail[$i];
        $sub_qty = $list_qty[$i];
        $sqlPrice = "SELECT * FROM food_detail WHERE food_detail_id = '$prod'";
        $resultPrice = mysqli_query($conn, $sqlPrice);
        $rowPrice = mysqli_fetch_array($resultPrice);

        $foodtype = $rowPrice['foodtype_id'];
        $qty_amount = $rowPrice['pd_qty'];
        $rowPrice = $rowPrice['pd_price'];
        
        // $rowbookID = $rowPrice['']
        // $sqlDetail = "INSERT INTO order_food(fd_id,qty,bookDE_id,price) VALUES ('$prod','$sub_qty','$rowID','$rowPrice')";
        $sqlDetail = "INSERT INTO order_food(food_detail_id,qty,bookDE_id,price,booking_id,cus_id,foodtype_id) 
        VALUES ('$prod','$sub_qty','$rowID','$rowPrice','$rowBook','$customer','$foodtype')";
        $resultDetail = mysqli_query($conn, $sqlDetail);

        $totalqty = $qty_amount - $sub_qty;
        $sqlUpdate = "UPDATE food_detail SET pd_qty = $totalqty WHERE food_detail_id  = '$prod'";
        mysqli_query($conn, $sqlUpdate);
        // echo "<script>console.log('" . $sub_qty . "')</script>";
        // echo "<script>console.log('" . $qty_amount . "')</script>";
    }
    echo  $rowID;



}

// header('location:informbooking.php');

?>