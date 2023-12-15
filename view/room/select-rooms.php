<?php
      session_start();
      require_once ("connect.php");
      if(!isset($_SESSION['id'])){
        echo "Please Login!";
        exit();
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'connect.php';
        $Sql_select_room = "SELECT * FROM class_room";
        $Result = $conn->query($Sql_select_room);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <img src="image-select-rooms/header.png" style="width: 100%">
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="margin-top: 30px; margin-bottom: 30px;">
            <table border="1" width="100%">
            <tr style="text-align: center;">
                <td>ไอดี</td>
                <td>ชื่อห้อง</td>
                <td>รหัสห้อง</td>
                <td>อาคาร</td>
                <td>สถานะห้อง</td>
                <td>ใช้ห้องขณะนี้</td>
                <td>จัดการ</td>
            </tr>
            <?php
                if($Result->num_rows > 0)
                {
                    while($row = $Result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name_room']; ?></td>
                <td><?php echo $row['code_room']; ?></td>
                <td><?php echo $row['building_number']; ?></td>
                <td style="text-align: center;"><?php/*
                    $id_room = $row['id'];
                    $Sql_sum_report_status = "SELECT COUNT(*) AS sumStatus report_select_room WHERE id_room='$id_room' AND status_report_room='จองห้อง'";
                    $Result_sum_report_status = mysqli_query($conn,$Sql_sum_report_status);
                    if($Result_sum_report_status != null)
                    {
                        while($row_sum_status = mysqli_fetch_array($Result_sum_report_status)){
                            echo "สถานะ".$row_sum_status['sumStatus'];
                        }
                    }else{
                        echo "Error".$Sql_sum_report_status;
                    }*/
                ?>
                <?php
                $id_sum_room = $row['id'];
                $Sql_sum_report = "SELECT COUNT(*) AS sumTable FROM report_select_room WHERE id_room='$id_sum_room' AND status_report_room='จองห้อง'";
                $Req_sum_report = $conn->query($Sql_sum_report);


                // echo $Sql_name_now;

                    if($Req_sum_report->num_rows > 0){
                    while($row_sum_report = $Req_sum_report->fetch_assoc()){
                        if($row_sum_report['sumTable'] == 0)
                        {
                            echo "ว่าง";
                        }else{
                            echo "ไม่ว่าง "." "." จำนวนคิว ".$row_sum_report['sumTable'];
                        }
                    }
                    }
                ?>
                <td style="text-align:center">
                    <?php
                    $Sql_name_now = "SELECT MIN(time_start) AS timeNow FROM report_select_room WHERE id_room='$id_sum_room' AND status_report_room='จองห้อง'";
                    $Req_name_now = $conn->query($Sql_name_now);
                    if($Req_name_now->num_rows >0){
                    while($row_name_now = $Req_name_now->fetch_assoc()){
                        $time_now = $row_name_now['timeNow'];
                        // echo $row_name_now['id_user'];
                        if($time_now !=""){
                        $Sql_id_user = "SELECT * FROM report_select_room WHERE time_start='$time_now'";
                        // echo $Sql_id_user;
                        $Req_id_user = $conn->query($Sql_id_user);
                        if($Req_id_user->num_rows > 0){
                        while($row_id_user = $Req_id_user->fetch_assoc()){
                            $id_user =  $row_id_user['id_user'];

                        }
                        $Sql_full_name = "SELECT * FROM table_user WHERE id=".$id_user;
                        $Req_full_name = $conn->query($Sql_full_name);
                        // echo $Sql_full_name;
                        while($row_full_name = $Req_full_name->fetch_assoc()){
                            echo $row_full_name['full_name'];
                        }
                        }
                    }else{
                        echo "-";
                    }
                    }
                }
                    ?>
                </td>
                </td>
                <td style="text-align: center;">
                        <a href="select-room-main.php?id=<?php echo $row['id'];?>">จองห้อง</a>
                        /
                        <a href="re-status-select-room.php?id_room=<?php echo $row['id'];?>">คืนห้อง</a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
            </table>
            <div class="col-lg-12" style="margin-top: 30px; margin-bottom:30px;text-align:right;">
                <input type="submit" class="btn btn-danger" onclick="location.href='main.php'" value="กลับ">
        </div>
        </div>
        <div class="col-lg-2"></div>

    </div>
    <div class="row">
        <?php 
            include 'footer.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>