<?php

    session_start();
    require_once ("connect.php");
    if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
    }
    include 'connect.php';

    $card_number = $_POST['cardNumber'];
    $code_number = $_POST['codeNumber'];
    $title_name = $_POST['titleName'];
    $full_name = $_POST['fullName'];
    $username = $_POST['userName'];
    $password = $_POST['passWord'];
    $tel = $_POST['tel'];
    $status_user = $_POST['statusUser'];
    $confirm_password=$_POST["configPassWord"];

    // สร้าง object DateTime
    $dateTime = $_PORT['BrithDay'];
    // แปลงวันที่เป็น timestamp
    $timestamp = strtotime($dateTime);

    // จัดรูปแบบใหม่
    $brithday = date("Y-m-d", $timestamp);

    // Example data บันทุกรูปภาพเป็นไบนารี่
    $image_data = base64_decode($_POST['imgUser']);
    $filename = 'path/to/save/image.jpg';
    // Check if the directory exists, and create it if not
    if (!file_exists(dirname($filename))) {
        mkdir(dirname($filename), 0777, true);
    }
    // Write the data to the file
    $img_user_b = file_put_contents($filename, $image_data);

    $Sql_insert = "INSERT INTO `table_user`(`card_number`, `code_number`, `full_name`, `tel`, `username`, `password`, `status_user`, `title_name`, `birthday`, `image_user`) 
    VALUES ('$card_number','$code_number','$full_name','$tel','$username','$password','$status_user','$title_name','$brithday','$img_user_b')";

    $Obj_insert = mysqli_query($conn , $Sql_insert);

    if($Obj_insert != 0 ){
        echo "Add Data User Successfullry.".'<br>'.$Sql_insert;
    }
    else{
        echo "Add Data User Error Success.".'<br>'.$Sql_insert;
    }

?>