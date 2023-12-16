<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    include 'connect.php';
    $id_user = $_SESSION['id'];
    $id_room = $_GET['id_room'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คืนห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-lg-12">
    <img src="image-select-rooms/header.jpg" style="width: 100%">
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style="margin-top: 30px; margin-bottom: 30px;">
        <?php
        $status_admin = $_SESSION['status_user'];
            // echo $status_admin;
        if($status_admin == "admin"){
            $Sql = "SELECT * FROM report_select_room WHERE id_room='$id_room' AND status_report_room='จองห้อง'";
        }else{
            $Sql = "SELECT * FROM report_select_room WHERE id_room='$id_room' AND id_user='$id_user' AND status_report_room='จองห้อง'";
        }

            $Result = $conn->query($Sql);
            if($Result->num_rows > 0)
            {
                ?>
                <table border="1" width="100%">
                    <tr>
                    <td>ชื่อห้อง</td>
                    <td>รหัสห้อง</td>
                    <td>วันที่จอง</td>
                    <td>เวลาที่จอง</td>
                    <td>จัดการ</td>
                    </tr>
                    <?php
                        while($row = $Result->fetch_assoc()){
                            ?>
                                <tr>
                                <td><?php echo $row['id_room'] ?></td>
                                <td><?php echo $row['id_room'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo "เริ่ม ".$row['time_start']." - ".$row['time_out']." น."; ?></td>
                                <td><a href="re-status-room.php?id=<?php echo $row['id']?>">คืนห้อง</a></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
                <?php
            }
            else{
                ?>
                <div class="col-lg-12">
                <label for="">คุณไม่มีห้องที่จอง</label>
                </div>
                <?php
            }
        ?>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-10" style="text-align: right; margin-bottom: 20px;">
            <button class="btn btn-danger" onclick="location.href='select-rooms.php'">กลับ</button>
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