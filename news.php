    <?php require "./connection/connecdb.php"; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ข่าวสาร</title>
        <link rel="icon" href="./img/logo1.png" width="500px" />

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <style>
            * {
                font-family: 'Kanit', sans-serif;
            }
        </style>
    </head>


    <body>
        <?php include('./sidebarAdmin.php') ?>
        <div class="page-wrapper chiller-theme toggled">
            <main class="page-content ">
                <div class="container-filud">
                    <div class="row ">
                        <h3 class="title align-baseline fw-bold">รายการข่าวสาร</h3>
                        <div class="card-body">

                            <button type="button" class="btn btn-sm btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus-circle"></i> เพิ่มข่าวสาร
                            </button>

                            <form class="row g-3" method="POST" action="./addNews_conn.php" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข่าวสาร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">หัวข้อเรื่อง : </label>
                                                        <input type="text" class="form-control" id="subject" name="subject">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">รายละเอียด : </label>
                                                        <textarea class="form-control" id="content" name="content"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">รูปภาพประกอบ : </label>
                                                        <input type="file" class="form-control" id="formFileMultiple" name="imgnews" multiple>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">เพิ่มข่าวสาร</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- สิ้นสุดการเพิ่มข่าวสาร -->

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
                                <?php
                                $sqlNews = mysqli_query($conn, "SELECT * FROM news ORDER BY newsid DESC");

                                while ($rowNews = mysqli_fetch_array($sqlNews)) {
                                    $newsid = $rowNews['newsid'];
                                    $imgnews = $rowNews['imgnews'];
                                    $datenow = $rowNews['datenow'];
                                    $subject = $rowNews['subject'];
                                    $content = $rowNews['content'];

                                ?>
                                    <div class="col">
                                        <div class="card">
                                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src=<?php echo $rowNews['imgnews']; ?> style="object-fit: cover;">

                                            <div class="card-body">
                                                <h3><?php echo $rowNews['subject']; ?></h3>
                                                <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                    <?php echo $rowNews['content']; ?>
                                                </span>

                                                <div class='d-flex justify-content-between align-items-center'>


                                                    <div class='btn-group'>
                                                        <a href="#exampleModal1<?php echo $newsid; ?>" class="btn btn-sm btn-info text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $newsid ?>">
                                                            กดดู
                                                        </a>
                                                        <a href="#exampleModal1<?php echo $newsid; ?>" class='btn btn-sm btn-warning' data-bs-toggle='modal'>
                                                            แก้ไข
                                                        </a>

                                                        <a href='./deleteNews.php?newsid=<?php echo $newsid; ?>' class='btn btn-sm btn-danger'>ลบ</a>
                                                    </div>
                                                    <small class='text-dark'> <?php $datenow ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModal<?php echo $newsid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold" id="exampleModalLabel"><?php echo $rowNews['subject']; ?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo $imgnews ?>" style="object-fit: cover;" width="100%" alt="">
                                                    <p class="card-text mt-3 fs-5"><?php echo $rowNews['content']; ?></p>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <!-- สิ้นสุดการแก้ไขข่าวสาร -->
                                    <div class="modal fade" id="exampleModal1<?php echo $newsid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="./updateNews_conn.php?newsid=<?php echo $newsid ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แก้ข่าวสารเรื่อง <?php echo $subject; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">หัวข้อเรื่อง : </label>
                                                                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">รายละเอียด : </label>
                                                                <textarea class="form-control" id="content" name="content"><?php echo $content ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="imgnews">รูปภาพประกอบ : </label>
                                                                <input type="file" class="form-control" id="imgnews" name="imgnews">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                        <button type="submit" class="btn btn-primary">อัพเดต</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ส่วนของการแก้ไข -->
        </div>
        </main>
        </div>
    </body>

    </html>