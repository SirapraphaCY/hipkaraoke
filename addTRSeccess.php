<?php 
    require "./connection/connecdb.php";
    if(isset($_POST)) {
      
        // $room_name = $_POST['room_name'];
        // $roomtype_id = $_POST['roomtype_id'];
        // $statusRoomid = $_POST['statusRoomid'];
        $roomName = $_POST['roomName'];
        $name_type = $_POST['name_type'];
        $equipment = $_POST['equipment'];
        $num_people = $_POST['num_people'];
        $price = $_POST['price'];
        $detail = $_POST['detail'];

        $file = pathinfo(basename($_FILES['img_upload']['name']),PATHINFO_EXTENSION);
        if ($file != "") {
            $new_image_name = 'img' . uniqid() . "." . $file;
            $image_path = "fileupload/imgroom";
            $upload_path = $image_path . "/" . $new_image_name;
    
            $upload = move_uploaded_file($_FILES['img_upload']['tmp_name'], $upload_path);
            if ($upload == FALSE) {
                echo "ไม่สามารถ UPLOAD ภาพได้";
                exit('Location: index.php');
            }
            $pro_image = $new_image_name;
            $pic = "fileupload/imgroom/" . $pro_image;
        } else {
            $pic = "fileupload/imgroom/img_001.jpg";
        }
        

        // echo $roomtype_id;
        // echo $name_type;
        // echo $equipment;
        // echo $detail;
        // echo $price;
        // echo $num_people;

        $sql = "INSERT INTO room_type_detail (roomtype_id, name_type, detail, price, num_people, equipment, roomName, img) 
        VALUES ('$roomtype_id', '$name_type','$detail','$price','$num_people','$equipment','$roomName','$pic')"; 
  

        $query = mysqli_query($conn,$sql);
    }
        header('location:Manageroom_types.php');
?>