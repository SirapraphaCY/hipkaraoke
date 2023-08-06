<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <link rel="icon" href="./img/logo1.png" width="500px" />
    <link rel="stylesheet" href="./css_style/tapMenu.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


<style>
    * {
        font-family: 'Kanit', sans-serif;
    }
</style>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">

            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#"><img src="./img/logo1.png" width="150" alt="logo"></a>

                    <ul class="navbar-nav mb-lg-0 text-light nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="./homepage.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" onclick="location.href='./bookingRoomAll.php'" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">จองห้อง</button>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">อาหาร&เครื่องดื่ม</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./bookinglist.php">ข้อมูลการจอง</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">โปรโมชั่น</a>
                        </li> -->
                        <?php
                        include "./connection/connecdb.php";
                        $getSlip = "SELECT *  FROM customer JOIN booking_detail
                        ON booking_detail.cus_id = customer.cus_id 
                        ORDER BY booking_detail.bookDE_id DESC ";
                        $result2 = mysqli_query($conn, $getSlip);
                        $row = mysqli_fetch_array($result2);
                        $username = $row['username'];
                        $pic = $row['slip'];
                        $PF = $row['picturePF'];
                        // echo $PF;
                        // exit;
                        ?>
                   <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $username ?>
                                <!-- <?php echo $picturePF ?> -->
                                <!-- <div > -->
                                <img src="<?php echo $PF ?>" class="circular--square" alt="...">
                                <!-- </div> -->
                            </a>
                            <style>
                                .circular--square {
                                    border-top-left-radius: 50% 50%;
                                    border-top-right-radius: 50% 50%;
                                    border-bottom-right-radius: 50% 50%;
                                    border-bottom-left-radius: 50% 50%;
                                    width: 30px;
                                    height: 30px;
                                    object-fit: cover;
                                }

                            </style>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./profilecustomer.php">ข้อมูลส่วนตัว</a></li>
                                <!-- <li><a class="dropdown-item" href="#">ประวัติการใช้งาน</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="./img//VDO9.mp4" type="video/mp4" widt>
        </video> -->
    </header>

    <section class="container mt-3">
        <P class="fs-3 text-uppercase">Hip Karaoke | จองและชำระเงิน</P>
    </section>

    <div class="container  p-4 bg-body rounded">
        <div class="row g-5">
            <!-- <div class="col-md-5 col-lg-5 order-md-last">
                <form method="get" class="mt-4">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">ชำระเงินทั้งหมด</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">ชำระเงินแบ่งจ่าย</label>
                        </div>

                        <?php
                        require "./connection/connecdb.php";
                        $sql_bank = "SELECT * FROM bank INNER JOIN bank_name ON bank_name.bank_name_id = bank.bank_name_id";
                        $query = mysqli_query($conn, $sql_bank);
                        ?>
                        <label for="bank">เลือกธนาคารที่ต้องการโอนเงิน:</label>
                        <select class="form-select" name="bank" id="bank" required>
                            <option value="" selected disabled>-กรุณาเลือกธนาคาร-</option>
                            <?php
                            foreach ($query as $value) { ?>
                                <option value="<?= $value['bank_name_id'] ?>"><?= $value['bank_name'] ?></option>
                            <?php } ?>
                        </select>
                        <br>

                        <label for="bank_account">ชื่อบัญชี:</label>
                        <input type="text" name="bank_account" id="bank_account" class="form-control">
                        <br>

                        <label for="numbank">เลขบัญชี:</label>
                        <input type="text" name="numbank" id="numbank" class="form-control">
                        <br>

                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div> -->




            <div class="col-md-7 col-lg-12">
                <h5 class="mb-3">ชำระเงิน</h5>
                <form class="needs-validation" action="./bankpayment.php?booklist=<?php echo $getData ?>" method="POST" enctype="multipart/form-data" novalidate>

                    <div class="border p-3">

                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">ชำระเงินทั้งหมด</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">ชำระเงินแบ่งจ่าย</label>
                            </div>
                            <br>
                            <br>

                            <?php
                            require "./connection/connecdb.php";
                            $sql_bank = "SELECT * FROM bank INNER JOIN bank_name ON bank_name.bank_name_id = bank.bank_name_id";
                            $query = mysqli_query($conn, $sql_bank);
                            ?>
                            <label for="bank">เลือกธนาคารที่ต้องการโอนเงิน:</label>
                            <select class="form-select" name="bank" id="bank" required>
                                <option value="" selected disabled>-กรุณาเลือกธนาคาร-</option>
                                <?php
                                foreach ($query as $value) { ?>
                                    <option value="<?= $value['bank_name_id'] ?>"><?= $value['bank_name'] ?></option>
                                <?php } ?>
                            </select>
                            <br>

                            <!-- <label for="bank_account">ชื่อบัญชี:</label>
                            <input type="text" name="bank_account" id="bank_account" class="form-control">
                            <br> -->

                            <label for="numbank">เลขบัญชี:</label>
                            <input type="text" name="numbank" id="numbank" class="form-control">
                            <br>

                            <label for="numbank">เลขบัญชี:</label>
                            <img src="./img/bank/promtpay.png" style="object-fit:cover;" height="500" alt="promtpay">
                            <br>

                        </div>


                        <p class="fs-6 border-bottom fw-bold">สรุปราคาทั้งหมด</p>
                        <div class="row justify-content-between">
                            <?php
                            include "./connection/connecdb.php";
                            $getData = $_GET['booklist'];
                            $sqlFood = "SELECT*FROM booking_detail 
                            JOIN room_type_detail
                            WHERE booking_detail.bookDE_id =  $getData ";
                            $resultFood = mysqli_query($conn, $sqlFood);
                            $row = mysqli_fetch_array($resultFood);

                            $sumfood = $row['sumfoodprice'];
                            ?>
                            <div class="col-11">
                                <p class="fs-6 lh-base">
                                    รวมทั้งหมด
                                </p>
                            </div>
                            <div class="col-1">
                                <p class="fs-6 lh-base">
                                    <?php echo $row['sumfoodprice'] + $row['price'] ?> บาท
                                </p>
                            </div>

                            <!-- </div> -->
                            <!-- <div class="col-6 border">
                            <p class="fs-5 border-bottom border-2 border-dark mt-2 fw-bold">ชำระเงินผ่านทางธนาคาร krungthai bank</p>
                            <p class="text-start fs-5">
                                ชื่อบัญชี : ร้านฮิปคาราโอเกะ <br>
                                เลขบัญชี : 670-1-02561-7 <br>
                                สาขา : ขอนแก่น / ประเภท : ออมทรัพทย์
                            </p>-->
                        </div>
                        <div class="border p-2">
                            <p class="text-start fs-5 mt-2 fw-bold">แนบสลิป</p>
                            <input class="form-control " type="file" name="img_upload" id="img_upload">
                            <p class="text-danger">
                                **กรุณาชำระเงินภายใน 24 ชั่วโมง หากไม่ชำระเงิน
                                ระบบจะทำการยกเลิกการจองอัตโนมัติ <br>
                                **ลูกค้าต้องเข้ารับบริการก่อนเวลาที่ทำการจอง 5 นาที
                                หากเลยเวลาที่กำหนดทางร้านจะยกเลิกการจองในทุกกรณี
                                <br>
                                **เมื่อชำระเงินแล้ว
                                กรุณาแจ้งรายละเอียดการโอนเงินหรือแนบสลิป <br>
                                **ทางร้านขอสงวนสิทธิ์ในการคืนเงินมัดจำในทุกกรณี
                            </p>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">ยืนยันการจอง</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    // $('#bank').change(function() {
    //     var id_bank = $(this).val();
    //     $.ajax({
    //         type: "POST",
    //         url: "ajax_bank.php",
    //         data: {
    //             bank_id: id_bank,
    //             function: 'bank'
    //         },
    //         success: function(data) {
    //             // $('#numbank').val(data)
    //             $('#bank_account').html(' ')
    //             $('#bank_account').val(data)

    //         }
    //     });

    // });
    $('#bank').change(function() {
        var id_bank = $(this).val();
        $.ajax({
            type: "POST",
            url: "ajax_bank.php",
            data: {
                bank_id: id_bank,
                function: 'bank'
            },
            success: function(data) {
                $('#numbank').val(data)
                // $('#bank_account').val(data)

            }
        });

    });
</script>

</html>