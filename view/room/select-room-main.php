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
    <title>จองห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="row">
<div class="col-lg-12">
    <img src="image-select-rooms/header.png" style="width: 100%">
</div>
    <div class="col-lg-12" style="text-align: center; margin-top: 50px;">
        <label for="">จองห้อง</label>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    <?php
        $Sql = "SELECT * FROM class_room WHERE id='$id'";
        $Result = $conn->query($Sql);
        if($Result->num_rows >0){
            while($row = $Result->fetch_assoc()){
                ?>
            <form action="config-select-room.php" method="POST">
                <div class="col-lg-12" style="margin-top: 70px;">
                    <label for="">ข้อมูลห้อง</label>
                    <div class="col-lg-12">
                    <input type="hidden" name="id_room" value="<?php echo $row['id']; ?>">
                        <label for="">ชื่อห้อง :: <?php echo $row['name_room'];?></label>
                        <label for="">รหัสห้อง :: <?php echo $row['code_room'];?></label>
                        <label for="">สถานะห้อง :: <?php echo $row['status_room'];?></label>
                        <?php
                            $id_sum_room = $row['id'];
                            $Sql_sum_report = "SELECT COUNT(*) AS sumTable FROM report_select_room WHERE id_room='$id_sum_room' AND status_report_room='จองห้อง'";
                            $Req_sum_report = $conn->query($Sql_sum_report);
                            if($Req_sum_report->num_rows > 0){
                                while($row_sum_report = $Req_sum_report->fetch_assoc()){
                                    ?>
                                        <label for="">ลำดับคิว :: <?php echo $row_sum_report['sumTable']; ?></label>                                    
                                    <?php
                                }
                            }
                        ?>
                        <label><a href="report-select-room-main.php?id_room=<?php echo $row['id']; ?>">(ดูลำดับการจอง)</a></label>
                    </div>
                    <div class="col-lg-12">
                    <label for="">
                    <?php
                    $id = $row['id'];
                        $Sql_report_status = "SELECT MIN(id) AS minId FROM report_select_room WHERE id_room='$id' AND status_report_room='จองห้อง'";
                        // echo $Sql_report_status;
                        $Req_report_status = $conn->query($Sql_report_status);
                        if($Req_report_status != null){
                            while($row_report_status = mysqli_fetch_array($Req_report_status)){
                                $id_show_user = $row_report_status['minId'];
                                // echo "id".$id_show_user;
                                $Sql_show_user = "SELECT * FROM report_select_room WHERE id=".$id_show_user;
                                $Req_show_user = $conn->query($Sql_show_user);
                                if($Req_show_user != null){
                                    while($row_show_user = $Req_show_user->fetch_assoc()){
                                    $table_user_id = $row_show_user['id_user'];

                                    $Sql_table_user = "SELECT * FROM table_user WHERE id=".$table_user_id;
                                    $Req_table_user = $conn->query($Sql_table_user);
                                    if($Req_table_user->num_rows > 0){
                                        while($row_table_user = $Req_table_user->fetch_assoc()){
                                            echo "ชื่อผู้จองปัจุบัน :: ".$row_table_user['full_name'];
                                        }
                                    }

                                echo " เริ่มใช้ ".$row_show_user['date']." เวลา :: ".$row_show_user['time_start']." - ".$row_show_user['time_out']." น.";
                                }
                                }
                                else{
                                    echo "ปัจุบันไม่มีผู้ใช้ห้อง";
                                }
                            }
                        }    
                    ?>
                </label>
                    </div>
                    <div class="col-lg-12">
                    <?php
                        $id_user = $_SESSION['id'];
                        $Sql_user = "SELECT * FROM table_user WHERE id=".$id_user;
                        $Result_user = $conn->query($Sql_user);
                        if($Result_user->num_rows > 0){
                            while($row_user = $Result_user->fetch_assoc()){
                                ?>
                                <input type="hidden" name="id_user" value="<?php echo $row_user['id'] ?>">
                            <label for="">ชื่อผู้จอง :: <input type="text" name="user_name" value="<?php echo $row_user['full_name']; ?>"> </label>
                            <label for="">เบอร์โทรศัพท์ :: <input type="text" name="user_tel" value="<?php echo $row_user['tel']; ?>"> </label>
                                <?php
                            }
                        }
                    ?>
                    </div>
                    <div class="col-lg-12">
                        <label for="">วัน/เดือน/ปี :: 
                            <input type="date" name="date" value="yyyy-mm-dd" min="2018-01-01" max="2025-12-31">
                        </label>

                        <label for="">เวลา จาก :: </label>
                        <input type="time" name="time_start" value="--:--"  require>
                        <label for=""> ถึง :: </label>
                        <input type="time" name="time_out" value="--:--"  require>
                    </div>
                    <div class="col-lg-12">
                    <label for="">หมายเหตุ</label>
                    <textarea class="form-control" name="content"cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-lg-12" style="text-align: center; margin-top: 30px;">
                        <input type="submit" class="btn btn-success" value="จองห้อง">
                    </div>
                </div>
            </form>
                <?php
            }
        }
    ?>
    <div class="col-lg-12" style="text-align: right; margin-top: 30px; margin-bottom:30px;">
    <input type="submit" class="btn btn-danger" onclick="location.href='select-rooms.php'" value="กลับ">
    </div>
    </div>
    <div class="col-lg-2"></div>
<?php
    include 'footer.php';
?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>