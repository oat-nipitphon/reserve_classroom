<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จองห้องเรียนผ่านเว็บแอพพลิเคชั่น</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<style>

</style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<body style="background-color: #fff;">
    <div class="container animated bounceInRight"  style="margin-top: 150px;">
        <div class="ibox-title">
            <div class="col-md-6 text-center col-md-offset-3">
                <div style="margin:auto;">
                <span>จองห้องเรียนผ่านเว็บแอพพลิเคชั่น</span>
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-groun">
                    <label for="">username</label>
                    <input type="text" id="username" name="username "class="form-control">
                </div>
                <div class="form-groun">
                    <label for="">password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-groun" style="margin-top: 20px;">
                    <button class="btn btn-info" type="submit" id="btn_login" onclick="btnLogin()">เข้าสู่ระบบ</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>

    <script type="text/javascript">

        function btnLogin(button){
            var username = $('#username').val();
            var password = $('#password').val();
            console.log(username,password);

            $.ajax({
                type: 'post',
                url: 'login-config.php',
                data: {
                    username: username,
                    password: password,
                },
                success: function(response){
                    console.log('Login Connet');
                    Swal.fire({
                        title: "เข้าสู่ระบบสำเร็จ",
                        text: "ยินดีต้อนรับ "+username,
                        icon: "success"
                    });
                    setTimeout(function(){
                        swal.close();
                        location.replace('dashboard.php');
                    },1500);
                    
                },
                error: function(error){
                    console.log('Login Error');
                    Swal.fire({
                        title: "เข้าสู่ระบบไม่สำเร็จ",
                        text: "ตรวจสอบชื่อผู้ใช้ และรหัสผ่านของท่านอีกครั้ง !!",
                        icon: ""
                    });
                    setTimeout(function(){
                        swal.close();
                        document.getElementById('username').reset;
                        document.getElementById('password').reset;
                    },1500);
                }
            });
        }

    //     var tableReportUser = $('#tablereportuser').DataTable({
    //     pageLength: 3,
    //     responsive: true,
    //     autoWidth: true,
    //     searching: true,
    //     "bInfo": false,
    //     ordering: true,
    //     "bLengthChange": false,
    //     processing: true
    // });

    // var tableReportUser11 = $('#tablereportuser11').DataTable({
    //     pageLength: 3,
    //     responsive: true,
    //     autoWidth: true,
    //     searching: true,
    //     "bInfo": false,
    //     ordering: true,
    //     "bLengthChange": false,
    //     processing: true,
    //     "ajax": {
    //         "url": "user-sql-select.php",
    //         "type": "POST"
    //     },
    //     "columns": [
    //         { "data": "id" },
    //         { "data": "card_number" },
    //         { "data": "code_number" },
    //         { "data": "title_name" },
    //         { "data": "full_name" },
    //         { "data": "tel" },
    //         { "data": "birthday" },
    //         { "data": "username" },
    //         { "data": "password" },
    //         { "data": "status_user" },
    //         { "data": "image_user" }
    //     ]
    // });

    // $(function(){
    //     $('.table').dataTable({
    //         pageLength: 25,
    //         responsive: true,
    //     });
    // });


    // function delete_user(id){
    //     // console.log(id);
    //     $.ajax({
    //         type: 'POST',
    //         url: 'config-delete-user.php',
    //         data: {id: id},
    //         success: function(response){
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    //     window.location.reload();
    // }


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
</body>
</html>