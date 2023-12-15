<?php
      session_start();
      require_once ("connect.php");
      if(!isset($_SESSION['id'])){
        echo "Please Login!";
        exit();
      }
      $id_user = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="row">
<div class="col-lg-12">
                <img src="image-select-rooms/header.jpg" style="width: 100%">
</div>
<div class="col-lg-2"></div>
<div class="col-lg-8">
<?php

    $id_room = $_GET['id'];

    $Sql_room_edit = "SELECT * FROM class_room WHERE id=".$id_room;
    $Req_room_edit = $conn->query($Sql_room_edit);
    if($Req_room_edit->num_rows > 0){
        while($row = $Req_room_edit->fetch_assoc()){
            
            ?>
          <form action="config-room-edit.php" method="POST">  
          <input type="hidden" name="id_room" value="<?php echo $row['id'] ?>">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 30px;">
                <label for="">ชื่อห้อง</label>
                <input type="text" class="form-control" name="name_room" value="<?php echo $row['name_room']?>">
                </div>
                <div class="col-lg-12">
                <label for="">รหัสห้อง</label>
                <input type="text" class="form-control" name="code_room" value="<?php echo $row['code_room']?>">
                </div>
                <div class="col-lg-12">
                <label for="">อาคาร</label>
                <input type="text" class="form-control" name="building_number" value="<?php echo $row['building_number']?>">
                </div>
                <!-- <div class="col-lg-12">
                <label for="">สถานะ</label>
                <input type="text" class="form-control" name="status_room" value="<?php echo $row['status_room']?>">
                </div> -->
                <div class="col-lg-12" style="text-align: center; margin-top:20px; margin-bottom:20px;">
                <input type="submit" name="btnConfin" class="btn btn-success" value="อัพเดท">
                </div>
            </div>
          </form>
            <?php
        }
    }
?>
<div class="col-lg-12" style="text-align: right; margin-top:20px; margin-bottom:20px;">
  <input type="submit" name="back_main" class="btn btn-danger" value="ยกเลิก">
</div>
</div>
<div class="col-lg-2"></div>
</div>
<?php
    include 'footer.php';
?>
</body>
</html>