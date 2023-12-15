<?php
  session_start();
  require_once ("connect.php");
  include('layouts/headen.php');
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
?>
<div class="ibox-content">

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <?php
                $Sql_report_room = "SELECT * FROM report_select_room";
                $Req_report_room = $conn->query($Sql_report_room);
                if($Req_report_room->num_rows > 0){
                    ?>
            <thead class="font-table-title">
                <tr style="text-align:center;">
                    <td>id</td>
                    <td>ผู้ใช้</td>
                    <td>วัน / เดือน / ปี การจอง - คืน</td>
                    <td>ชื่อห้อง</td>
                    <td>รหัสห้อง</td>
                    <td>อาคาร</td>
                </tr>
            </thead>
            <tbody class="font-table-content">
                <?php
                while($row_report_room = $Req_report_room->fetch_assoc()){
                    $id_user = $row_report_room['id_user'];
                    $id_room = $row_report_room['id_room'];
                    $Sql_user = "SELECT * FROM table_user WHERE id=".$id_user;
                    $Req_user = $conn->query($Sql_user);
                    if($Req_user->num_rows > 0){
                        while($row_user = $Req_user->fetch_assoc()){
                            
                            $Sql_room = "SELECT * FROM class_room WHERE id=".$id_room;
                            $Req_room = $conn->query($Sql_room);
                            if($Req_room->num_rows > 0){
                                while($row_room = $Req_room->fetch_assoc()){
                                ?>
                                <tr>
                                <td><?php echo $row_report_room['id'];?></td>
                                <td><?php echo $row_user['full_name']; ?></td>
                                <td><?php echo $row_report_room['date']." เริ่มเวลา ".$row_report_room['time_start']." - ".$row_report_room['time_out']." น. "; ?></td>
                                <td><?php echo $row_room['name_room']; ?></td>
                                <td><?php echo $row_room['code_room']; ?></td>
                                <td><?php echo $row_room['building_number']; ?></td>
                                </tr>
                                <?php
                                }
                            }
                        }
                    }
                }
            }
                ?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-12" style="margin-top: 30px; margin-bottom:30px;text-align:right;">
        <input type="submit" class="btn btn-danger" onclick="location.href='main.php'" value="กลับ">
    </div>
</div>

<?php
    include 'layouts/footer.php';
?>