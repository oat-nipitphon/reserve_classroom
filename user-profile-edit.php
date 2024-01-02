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
    <div class="col-lg-8" id="formupdate">
    <!-- <form action="profile-update-user.php" method="POST"> -->
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
            <button type="submit" onclick="location.href='main.php'" class="btn btn-danger" name="btn_update">กลับ</button>
        </div>
    </div>
    <div class="col-lg-2"></div>
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

    // $('#btnformupdate1').on('click', function () {
    //     // var divform = $('#formupdate').find('div').find('input');
    //     var divform = $('#formupdate').find('input');
    //     var divform1 = $(this).find('#formupdate').val();



    //     console.log(divform);
    //     // console.log(divform1);
        
    //     console.log('form update user ajax');
        
    //     $.ajax({
    //         type: 'POST',
    //         url: 'user-config-edit.php',
    //         data: {divform: divform},
    //         success: function(response){
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });

    //     // formUpdateUserAjax()


    // });


    // function formUpdateUserAjax(divform){
    //     console.log(divform);
    //     console.log('form update user ajax');
    //     $.ajax({
    //         type: 'POST',
    //         url: 'user-config-edit.php',
    //         data: {divform: divform},
    //         success: function(response){
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    //     window.location.reload();
    // }

    // $('#selectProduct').on('click', function () {
    //     tr = $('#tableGood').find('tbody').find('tr');
    //     tr.each(function () {
    //         if ($(this).find('.check-list').prop('checked')) {
    //             var good_id = $(this).find('.good_id').val();
    //             var coil_code = $(this).find('.coil_code').val();
    //             var code = $(this).find('td').eq(0).text();
    //             var warehouse_good_id = $(this).find('.warehouse_good_id').val();
    //             var name = $(this).find('td').eq(1).text();
    //             var amount = $(this).find('td').eq(2).text();
    //             var unit = $(this).find('td').eq(3).text();
    //             addTable(good_id,coil_code,code,name,amount,unit,warehouse_good_id);
    //         }
    //     });
    //     $('input[type=checkbox]').prop('checked', false);
    //     $('#goodModal').modal('hide');
    // });

</script>

<?php 
    include 'layouts/footer.php';
?>
