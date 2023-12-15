<?php
  session_start();
  require_once ("connect.php");
  include('layouts/headen.php');
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
?>
<style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.ibox-content-form{
    margin-top: 30px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<?php
    $id = $_GET['id'];
    $Sql_profile = "SELECT * FROM table_user WHERE id='$id'";
    $Result_profiles = mysqli_query($conn, $Sql_profile);
?>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="col-lg-2"></div>
    <div class="col-lg-8">
    <form action="update-user.php" method="POST">
        <?php
            while($Result_profile = mysqli_fetch_array($Result_profiles)){
        ?>
        <input type="hidden" name="id" value="<?php echo $Result_profile["id"]; ?>">
        <input type="hidden" name="status_user" value="<?php echo $Result_profile["status_user"]; ?>">
            <div class="row">
                <div class="form-group">
                    <lable class="col-sm-2 control-label">เลขบัตรประชาชน</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="card_number" value="<?php echo $Result_profile["card_number"];?>"></div>
                </div>
                <div class="form-group">
                    <lable class="col-sm-2 control-label">รหัสนักศึกษา</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="code_number" value="<?php echo $Result_profile["code_number"];?>"></div>
                </div>
                <div class="form-group">
                    <lable class="col-sm-2 control-label">ชื่อ - นามสกุล</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="full_name" value="<?php echo $Result_profile["full_name"];?>"></div>
                </div>
                <div class="form-group">
                    <lable class="col-sm-2 control-label">ชื่อผู้ใช้</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="username" value="<?php echo $Result_profile["username"];?>"></div>
                </div>
                <div class="form-group">
                    <lable class="col-sm-2 control-label">รหัสผ่าน</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="password" value="<?php echo $Result_profile["password"];?>"></div>
                </div>
                <div class="form-group">
                    <lable class="col-sm-2 control-label">เบอร์โทรศัพท์</lable>
                    <div class="col-sm-10"><input class="form-control" type="text" name="tel" value="<?php echo $Result_profile["tel"];?>"></div>
                </div>
            </div>
            <?php
                }
            ?>
        <div class="col-lg-12" style="text-align:center; margin-top: 30px;">
            <button type="submit" class="btn btn-success" name="btn_update">แก้ไขข้อมูล</button>
        </div>
    </form>
    <div class="col-lg-12" style="text-align:right; margin-top: 30px;">
            <button type="submit" onclick="location.href='main.php'" class="btn btn-danger" name="btn_update">กลับ</button>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>


<?php 
    include 'layouts/footer.php';
?>
