<?php
    include 'connect.php';
    $name_room = $_POST['name_room'];
    $comment = $_POST['comment'];
    $name_user = $_POST['name_user'];
    $comment_time = date('d-M-Y');
    $comment_status = $_POST['comment_status'];
    $sql_insert = "INSERT INTO `comments-rooms`(`name_room`, `comment`, `name_user`, `comment_time`, `comment_status`) 
    VALUES ('$name_room','$comment','$name_user','$comment_time','$comment_status')";
    $obj = mysqli_query($conn, $sql_insert);
    if($obj > 0 ){
        echo "OK Comment";
    }else{
        echo $sql_insert;
    }

?>
้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #text-p-title{
            font-size: 25px;
            text-align: center;
        }
        #text-p-content{
            font-size: 18px;
            text-align: right;
        }
    </style>
</head>
<body>
    <?php include 'headen.php'; ?>
    <div class="container">
    <div class="row">
        <div class="col-lg-10">
            <p id="text-p-title">ส่งข้อความแล้ว</p>
            <p id="text-p-content">
                <button type="button" class="btn btn-danger" onclick="location.href='main.php';">กลับหน้าหลัก</button>
            </p>
        </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>