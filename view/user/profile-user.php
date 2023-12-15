<?php
  session_start();
  require_once ("connect.php");
//   include('layouts/headen.php');
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }

    $id = $_GET['id'];
    $Sql = "SELECT * FROM table_user WHERE id='$id'";
    $Obj = $conn->query($Sql);
?>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row ibox-content">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                    while($Req = $Obj->fetch_assoc()){
                        ?>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <div class="col-md-offset-4">
                                    <span>รูปโปรไฟล์</span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-6">
                                <label for="">เลขบัตรประชาชน : <?php echo $Req['card_number']; ?></label>
                            </div>
                            <div class="col-md-6">
                                <label for="">รหัสนักศึกษา : <?php echo $Req['code_number']; ?></label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-4">
                                <label for="">ชื่อ คำนำหน้า <?php echo $Req['title_name']; ?></label>
                            </div>
                            <div class="col-md-4"><?php echo $Req['full_name']; ?></div>
                            <div class="col-md-4">
                                <label for="">เกิดเมื่อ <?php echo $Req['birthday']; ?></label>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

  </div>
</div>

<?php 
    include 'layouts/footer.php';
?>
