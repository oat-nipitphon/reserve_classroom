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
<span>
    <button type="button" class="btn btn-primary" onclick="location.href='insert-building.php'">
            เพิ่มอาคารเรียน
    </button>
</span>
<div class="row ibox-content animated fadeInDown">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead class="font-table-title">
                <tr style="text-align: center;">
                    <td>อาคาร</td>
                    <td>เลขห้อง</td>
                    <td>คณะ</td>
                    <td>จัดการ</td>
                </tr>
            </thead>
            <tbody class="font-table-content">
            <?php
                $Sql = "SELECT * FROM `school_building`";
                $Result = $conn->query($Sql);
                if($Result->num_rows > 0){
                    while($row = $Result->fetch_assoc()){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $row['b_id']?></td>
                            <td class="text-center"><?php echo $row['number_room']?></td>
                            <td><?php echo $row['faculty']?></td>
                            <td width="15%">
                            <div class="row">
                                <div class="infont col-md-6 col-sm-4">
                                    <a href="building-control-edit.php?id=<?php echo $row['b_id']; ?>">
                                        <i class="fa fa-edit"></i><span class="text-muted">แก้ไข</span>
                                    </a>
                                </div>
                                <div class="infont col-md-6 col-sm-4">
                                    <a href="building-control-delect.php?id=<?php echo $row['b_id']; ?>">
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

<span>
    <button type="button" class="btn btn-danger" onclick="location.href='main.php'">
        กลับหน้าหลัก
    </button>
</span>

<?php
    include 'layouts/footer.php';
?>