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
        <div class="col-md-3 col-md-offset-4 text-center">
            <div style="margin:auto;" class="ibox-title">
            <span>จองห้องเรียนผ่านเว็บแอพพลิเคชั่น</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <div class="form-groun">
                    <label for="">username</label>
                    <input type="text" id="username" class="form-control">
                </div>
                <div class="form-groun">
                    <label for="">password</label>
                    <input type="password" id="password" class="form-control">
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
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            console.log(username,password);

            $.ajax({
                type: 'POST',
                url: 'config-login.php',
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
                        location.replace('main.php');
                    },1000);
                    
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
                    },1000);
                }
            });
        }

            //           setTimeout(function(){
    //           swal.close();
    //           window.location.reload();
    //           },2000)

//         Swal.fire({
//   title: "Good job!",
//   text: "You clicked the button!",
//   icon: "success"
// });
    </script>
</body>
</html>