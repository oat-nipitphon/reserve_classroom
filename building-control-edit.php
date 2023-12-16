<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    include 'connect.php';
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขอาคารเรียน</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <img src="image-select-rooms/header.png" style="width: 100%">
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style="margin-top: 30px;">
        <form action="config-edit-building.php" method="POST">
        <?php
            $Sql = "SELECT * FROM class_building WHERE id=".$id;
            $Result = $conn->query($Sql);
            if($Result->num_rows > 0 ){
                while($row = $Result->fetch_assoc()){
                    ?>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="col-lg-12">
                    <label>ข้อมูลพื้นฐาน</label>
                    </div>
                    <div class="col-lg-12">
                        <label>ชื่ออาคารภาษาไทย</label>
                        <input type="text" class="form-control" name="name_th" value="<?php echo $row['name_th']; ?>">
                    </div>
                    <div class="col-lg-12">
                        <label>ชื่ออาคารภาษาอังกฤษ</label>
                        <input type="text" class="form-control" name="name_en" value="<?php echo $row['name_en']; ?>">
                    </div>
                    <div class="col-lg-12">
                        <label>สาขาวิชา</label>
                        <input type="text" class="form-control" name="branch" value="<?php echo $row['branch']; ?>">
                    </div>
                    <div class="col-lg-12">
                        <label>คณะ</label>
                        <input type="text" class="form-control" name="board" value="<?php echo $row['board']; ?>">
                    </div>
                    <div class="col-lg-12" style="margin-top: 20px; text-align:center;">
                    <input type="submit" class="btn btn-success" value="อัพเดท">
                    </div>
                    <?php
                }
            }
        ?>
        </form>
        <div class="col-lg-12" style="margin-top: 20px; text-align:right;">
        <button class="btn btn-danger" onclick="location.href='building-control.php'">กลับ</button>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<?php
    include 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>