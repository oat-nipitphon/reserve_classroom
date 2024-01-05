<?php
session_start();
require_once 'connect.php';
include 'layouts/headen.php';
if (!isset($_SESSION['id'])) {
    echo 'Please Login!';
    exit();
}

$id = $_SESSION['id'];
$Sql_select_status = "SELECT * FROM table_user WHERE id='$id'";
$result = $conn->query($Sql_select_status);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo $row["username"]." ".$row["status_user"];
        // echo $_SESSION['status_user'];
    }
} else {
    echo 'Error' . $Sql_select_status;
}
$conn->close();

?>
<style>
    .text-padding {
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
    }
</style>

<div class="row">
    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">เลขบัตรประชาชน<font>*13 หลัก</font></label>
                <input type="text" id="test_txt" class="form-control" name="cardnumber" id="cardnumber"
                    placeholder="xxxxx-xxxxx-xx-x" maxlength="13" onblur="checknumber();">
            </div>
            <div class="form-group">
                <label for="">สถานะภาพ</label>
                <select class="form-control" name="statususer" id="statususer">
                    <option value="null">เลือกสถานะ</option>
                    <option value="teacher">อาจารย์</option>
                    <option value="student">นักศึกษา</option>
                    <option value="developer">Developer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">รหัสนักศึกษา</label>
                <input type="text" id="test_txt1" class="form-control" id="codenumber" name="codenumber"
                    placeholder="xxxxxxxxx-x" maxlength="13" onblur="checknumber1();">
                <label for="">
                    <font color="red">*อาจารย์ไม่ต้องใส่รหัสนักศึกษา</font>
                </label>
            </div>
            <div class="form-group">
                <label for="">คำนำหน้า</label>
                <select class="form-control" name="titlename" id="titlename">
                    <option value="mr">นาย</option>
                    <option value="miss">นางสาว</option>
                    <option value="mis">นาง</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">วันเดือนปัเกิด</label>
                <input type="date" id="brithday" name="brithday" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="xxxxxx xxxxx">
            </div>
            <div class="form-group">
                <label for="">เบอร์โทรศัพท์</label>
                <input type="text" id="test_txt2" class="form-control" name="tel" id="tel"
                    placeholder="xxx-xxx-xxxx" maxlength="10" onblur="checknumber2();">
            </div>
            <div class="form-group">
                <label for="">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="xxxxxxxx">
            </div>
            <div class="form-group">
                <label for="">รหัสผ่าน</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="xxxxxxxx">
            </div>
            <div class="form-group">
                <label for="">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" name="configpassword" id="configpassword"
                    placeholder="xxxxxxxx">
            </div>
            <div class="form-group">
                <label for="">รูปประจำตัว</label>
                <!-- <input type="file" class="form-control" name="imguser" id="imguser"> -->
                <div class="fallback">
                    <input name="file" type="file" name="imguser" id="imguser" multiple />
                </div>
            </div>
            <div class="row text-center">
                <button type="button" class="btn btn-success btn-md" onclick="btnInsertUser()">สมัครสมาชิก</button>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div id="animated fadeInDown">
        <div class="ibox-title">

        </div>
        <div class="ibox-content">

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script type="text/javascript">
    function btnInsertUser(button) {
        // var idUser = $('#iduser').val();
        var cardNumber = $('#cardnumber').val();
        var codeNumber = $('#codenumber').val();
        var fullName = $('#fullname').val();
        var userName = $('#username').val();
        var passWord = $('#password').val();
        var configPassWord = $('#configpassword').val();
        var tel = $('#tel').val();
        var statusUser = $('#statususer').val();
        var titleName = $('#titlename').val();
        var BrithDay = $('#brithday').val();
        var imgUser = $('#imguser').val();

        console.log(fullName);

        $.ajax({
            type: 'POST',
            url: 'user-config-insert.php',
            data: {
                cardNumber: cardNumber,
                codeNumber: codeNumber,
                fullName: fullName,
                userName: userName,
                passWord: passWord,
                tel: tel,
                statusUser: statusUser,
                titleName: titleName,
                BrithDay: BrithDay,
                imgUser: imgUser,
            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    title: 'เพิ่มข้อมูล',
                    text: 'เพิ่มข้อมูลสำเร็จ',
                    icon: 'success',
                    width: '550px',
                    confirmButtonColor: '#3085d6',
                });
                setTimeout(function() {
                    swal.close();
                    // window.location.reload();
                    location.replace('user-report.php');
                }, 4000)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function checknumber() {
        var elem = document.getElementById('test_txt').value;
        if (!elem.match(/^([0-9])+$/i)) {
            // alert("กรอกได้เฉพาะตัวเลขเท่านั้น");
            document.getElementById('test_txt').value = "";
        }
    }

    function checknumber1() {
        var elem = document.getElementById('test_txt1').value;
        if (!elem.match(/^([0-9])+$/i)) {
            // alert("กรอกได้เฉพาะตัวเลขเท่านั้น");
            document.getElementById('test_txt1').value = "";
        }
    }

    function checknumber2() {
        var elem = document.getElementById('test_txt2').value;
        if (!elem.match(/^([0-9])+$/i)) {
            // alert("กรอกได้เฉพาะตัวเลขเท่านั้น");
            document.getElementById('test_txt2').value = "";
        }
    }
</script>
<?php
include 'layouts/footer.php';
?>
