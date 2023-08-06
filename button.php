<div class="modal fade" id="delRoom<?php echo $row['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <p class="modal-title f-4" id="myModalLabel">คุณต้องการลบห้อง :</p>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <!-- -------------------------------------------------------------ลบ-------------------------------------------------------------------- -->
            <div class="modal-body">
                <?php
                $del = mysqli_query($conn, "SELECT * FROM room_detail WHERE room_id = '" . $row['room_id'] . "'");
                $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5 id="text2">
                        <p class="text-center fs-5">ชื่อ : <strong><?php echo $drow['room_name']; ?></strong></p>
                    </h5>
                </div>

            </div>
            <div class="modal-footer">
                <button id="text2" type="button" class="btn btn-dark" data-dismiss="modal">ยกเลิก</button>
                <button href="deleteRoom.php?room_id=<?php echo $row['room_id']; ?>" class="btn btn-danger">ลบ</button>
            </div>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------แก้ไข------------------------------------------------------------------- -->

