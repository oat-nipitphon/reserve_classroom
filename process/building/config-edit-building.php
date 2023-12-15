<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    include 'connect.php';
    $id = $_POST['id'];
    $name_th = $_POST['name_th'];
    $name_en = $_POST['name_en'];
    $branch = $_POST['branch'];
    $board = $_POST['board'];

    $Sql_up = "UPDATE `class_building` SET `name_th`='$name_th',`name_en`='$name_en',`branch`='$branch',`board`='$board' 
    WHERE id=".$id;
    $Obj = mysqli_query($conn, $Sql_up);
    if($Obj != null){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>แก้ไขอาคารเรียนเรียบร้อย</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            </head>
            <body>
            <div class="col-lg-12">
                <img src="image-select-rooms/header.jpg" style="width: 100%">
            </div>
            <div class="col-lg-12" style="margin-top: 60px; text-align: center;">
                <label><h2>แก้ไขอาคารเรียนเรียบร้อย</h2></label><br>
                <label><button class="btn btn-danger" onclick="location.href='building-control.php'">กลับ</button></label>
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
        echo "Error".$Sql_up;
    }
?>