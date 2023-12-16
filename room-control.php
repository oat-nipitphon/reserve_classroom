<?php
      session_start();
      require_once ("connect.php");
      include('layouts/headen.php');
      $id_user = $_SESSION['id'];
      if(!isset($_SESSION['id'])){
        echo "Please Login!";
        exit();
      }
?>
<div class="row col-lg-12 animated fadeInDown">
    <span>
        <button type="button" class="btn btn-primary" onclick="location.href='insert-room.php'">
                เพิ่มห้องเรียน
        </button>
    </span>
    
    <div class="ibox-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead class="font-table-title">
                    <tr>
                        <td>ชื่อห้อง</td>
                        <td>รหัสห้อง</td>
                        <td>อาคาร</td>
                        <!-- <td>สถานะ</td> -->
                        <td>จัดการ</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $Sql_select_room = "SELECT * FROM class_room";
                    $Obj_select_room = $conn->query($Sql_select_room);
                    if($Obj_select_room->num_rows > 0){
                        while($row = $Obj_select_room->fetch_assoc()){
                            $id_room = $row['id'];
                            ?>
                            <tr>
                                <td><?php echo $row['name_room'] ?></td>
                                <td><?php echo $row['code_room'] ?></td>
                                <td><?php echo $row['building_number'] ?></td>
                                <!-- <td><?php// echo $row['status_room'] ?></td> -->
                                <td width="15%">
                                    <div class="row">
                                        <div class="infont col-md-6 col-sm-4">
                                            <a href="room-control-edit.php?id=<?php echo $row['id']; ?>">
                                                <i class="fa fa-edit"></i><span class="text-muted">แก้ไข</span>
                                            </a>
                                        </div>
                                        <div class="infont col-md-6 col-sm-4">
                                            <a href="room-control-delect.php?id=<?php echo $row['id']; ?>">
                                            <i class="fa fa-trash-o"></i><span class="text-muted">ลบ</span></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-12" style="margin-top: 30px; margin-bottom:30px;text-align:right;">
        <button type="button" class="btn btn-danger" onclick="location.href='main.php'">
                กลับหน้าหลัก
        </button>
    </div>
    
</div>
<?php
    include 'layouts/footer.php';
?>