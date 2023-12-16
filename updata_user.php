<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    include 'connect.php';

    $id = $_POST['id'];
    $card_number = $_POST['card_number'];
    $code_number = $_POST['code_number'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $status_user = $_POST['status_user'];

    // echo $id.$code_number.$code_number.$full_name.$username.$password.$tel;
    // $id = $_SESSION['id'];
    $Sql_update = "UPDATE `table_user` SET `card_number`='$card_number',`code_number`='$code_number',`full_name`='$full_name',`tel`='$tel',
    `username`='$username',`password`='$password',`status_user`='$status_user' 
    WHERE id=".$id;
    $Obj_update = mysqli_query($conn, $Sql_update);

    if($Obj_update !=0 ){
        // echo $Sql_update;
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>แก้ไขข้อมูลเรียบร้อย</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            </head>
            <body>
                <div class="row">
                    <div class="col-lg-12">
                        <img src="image-select-rooms/header.jpg" width="100%">
                    </div>
                    <div class="col-lg-12" stype="margin-top: 30px;">
                        <center>
                        <label style="text-align: center;"><h2>แก้ไขข้อมูลเรียบร้อย</h2></label><br>

                        <?php
                        $status_admin = $_SESSION['status_user'];;
                        if($status_admin == 'admin'){
                            
                            ?>
                            <label style="text-align: center;"><button class="btn btn-primary" onclick="location.href='report-user.php'">กลับหน้าเมนู</button></label>
                            <?php
                        }else{
                            ?>
                            <label style="text-align: center;"><button class="btn btn-primary" onclick="location.href='main.php'">กลับหน้าเมนู</button></label>
                            <?php
                        }

                        ?>

                        </center>
                    </div>
                    <div class="col-lg-12">
                        <?php
                            include 'footer.php';
                        ?>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            </body>
            </html>
        <?php
    }
    else{
        echo "Update Error".$Sql_update;
    }

?>