<?php
    header('charset=utf-8');
    include 'connect.php';
    $id_room = $_POST['id_room'];
    $date = $_POST['date'];
    $time_start = $_POST['time_start'];
    $time_out = $_POST['time_out'];
    $user_name = $_POST['user_name'];
    $user_tel = $_POST['user_tel'];
    $id_user = $_POST['id_user'];
    $content = $_POST['content'];





    $Sql_Check = "SELECT * FROM `report_select_room` WHERE time_start<>'$time_start' AND time_out<>'$time_out' AND date='$date'  AND id_room='$id_room'";
    $Obj_Check = $conn->query($Sql_Check);

    if($Obj_Check->num_rows > 0){
        while($Req_Check = $Obj_Check->fetch_assoc()){
            
            if($Req_Check['time_start'] == $time_start && $Req_Check['time_out'] == $time_out){
                echo "ddddd".$Req_Check['time_start'];
                ?>
                
                 <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>จองห้องเรียบร้อย</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                </head>
                <body>
                <div class="col-lg-12">
                    <img src="image-select-rooms/header.jpg" style="width: 100%">
                </div>
                <div class="col-lg-12" style="margin-top: 60px; text-align: center;">
                    <label><h2>จองห้องไม่สำเร็จ ห้องกำลังใช้งาน</h2></label><br>
                    <label><button class="btn btn-danger" onclick="location.href='select-rooms.php'">กลับ</button></label>
                </div>
                <div class="col-lg-12">
                    <?php

                        // echo "จองห้องไม่ได้ <br>".$Sql_Check.$Req_Check['id'];
                        
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
                ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>จองห้องเรียบร้อย</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <body>
        <div class="col-lg-12">
            <img src="image-select-rooms/header.jpg" style="width: 100%">
        </div>
        <div class="col-lg-12" style="margin-top: 60px; text-align: center;">
            <label><h2>จองห้องสำเร็จ</h2></label><br>
            <label><button class="btn btn-danger" onclick="location.href='select-rooms.php'">กลับ</button></label>
        </div>
        <div class="col-lg-12">
            <?php 
                echo "จองห้องได้ <br>".$Sql_Check;

                $status_room_check = "จองห้อง";
                // $Sql_select_room = "UPDATE `report_select_room` SET `id_user`='.$id_user.',`time_start`='.$time_start.',`time_out`='.$time_out.',
                // `date`='.$date.',`content`='.$content.',`status_report_room`='.$status_room_check.'";

                $Sql_select_room = "INSERT INTO `report_select_room`(`id_room`, `id_user`, `time_start`, `time_out`, `date`, `content`, `status_report_room`) 
                VALUES ('$id_room','$id_user','$time_start','$time_out','$date','$content','$status_room_check')";
                $Obj_slelect_room = $conn->query($Sql_select_room);

                include 'footer.php';
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>
                <?php
            }     
           
        }
    }
    

