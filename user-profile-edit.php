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
    $id = $_POST['id'];
    $Sql_profile = "SELECT * FROM table_user WHERE id='$id'";
    $Result_profiles = mysqli_query($conn, $Sql_profile);
?>
<div class="row">
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-title">
                แก้ไขข้อมูล
            </div>
            <div class="ibox-content">
                <div class="col-lg-10" id="formupdate">
                    <?php
                        while($Result_profile = mysqli_fetch_array($Result_profiles)){
                    ?>
                    <input type="hidden" name="iduser" id="iduser" value="<?php echo $Result_profile["id"]; ?>">
                    <input type="hidden" name="statususer" id="statususer" value="<?php echo $Result_profile["status_user"]; ?>">
                        <div class="row">
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">เลขบัตรประชาชน</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="cardnumber" id="cardnumber" value="<?php echo $Result_profile["card_number"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">รหัสนักศึกษา</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="codenumber" id="codenumber" value="<?php echo $Result_profile["code_number"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">ชื่อ - นามสกุล</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="fullName" id="fullname" value="<?php echo $Result_profile["full_name"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">ชื่อผู้ใช้</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $Result_profile["username"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">รหัสผ่าน</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="password" id="password" value="<?php echo $Result_profile["password"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="col-sm-2 control-label">เบอร์โทรศัพท์</lable>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tel" id="tel" value="<?php echo $Result_profile["tel"];?>">
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    <div class="col-lg-12" style="text-align:center; margin-top: 30px;">
                        <button id="btnformupdate" onclick="updateProfileUser()" type="button" class="btn btn-success" name="btnformupdate">แก้ไขข้อมูล</button>
                    </div>
                    <!-- </form> -->
                    <div class="col-lg-12" style="text-align:right; margin-top: 30px;">
                        <button type="submit" onclick="location.href='user-report.php'" class="btn btn-danger" name="btn_update">กลับ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript">

    function updateProfileUser(button){
        console.log(idUser);

        var idUser = $('#iduser').val();
        var cardNumber = $('#cardnumber').val();
        var codeNumber = $('#codenumber').val();
        var fullName = $('#fullname').val();
        var userName = $('#username').val();
        var passWord = $('#password').val();
        var tel = $('#tel').val();
        var statusUser = $('#statususer').val();
        $.ajax({
            type: 'POST',
            url: 'user-config-edit.php',
            data: {
                idUser: idUser,
                cardNumber: cardNumber,
                codeNumber: codeNumber,
                fullName: fullName,
                userName: userName,
                passWord: passWord,
                tel: tel,
                statusUser: statusUser,
            },
            success: function(response){
                console.log(response);
                Swal.fire({
                    title: 'อัพเดพข้อมูล',
                    text: 'อัพเดพข้อมูลสำเร็จ',
                    icon: 'success',
                    width: '550px',
                    confirmButtonColor: '#3085d6',
                });
                setTimeout(function(){
                swal.close();
                // window.location.reload();
                location.replace('user-report.php');
                },1500)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

</script>

<?php 
    include 'layouts/footer.php';
?>
