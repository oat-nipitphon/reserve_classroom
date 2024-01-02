<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    header('charset=utf-8');
    include 'connect.php';
    $id_room = $_POST['id_room'];
    $name_room = $_POST['name_room'];
    $code_room = $_POST['code_room'];
    $building_number = $_POST['building_number'];
    $status_room = $_POST['status_room'];
    
    $Sql = "UPDATE `class_room` SET `name_room`='$name_room',`code_room`='$code_room',`building_number`='$building_number',`status_room`='$status_room' 
    WHERE id=".$id_room;
    $Obj = mysqli_query($conn, $Sql);
    if($Obj != null){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>แก้ไขห้องเรียนเรียบร้อย</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            </head>
            <body>
            <div class="col-lg-12">
                <img src="image-select-rooms/header.jpg" style="width: 100%">
            </div>
            <div class="col-lg-12" style="margin-top: 60px; text-align: center;">
                <label><h2>แก้ไขห้องเรียนเรียบร้อย</h2></label><br>
                <label><button class="btn btn-danger" onclick="location.href='room-control.php'">กลับ</button></label>
            </div>
            <div class="col-lg-12">
                <?php
                    include 'footer.php';
                ?>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            </body>
            </html>
        <?php
    }else{
        echo "Error".$Sql;
    }
?>