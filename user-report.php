<?php
  session_start();
  include('layouts/headen.php');
  require_once("connect.php");
  // echo $_SESSION['id'];

  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    $id_user = $_SESSION['id'];
    $status_user = $_SESSION['status_user'];
?>
<style>
    .font-btn{
        margin-left: 5px;
        size: 13px;
    }
</style>
<div class="row">
    <div class="wrapper wrapper-content ibox-title animated fadeInDown">
        <div class="col-md text-left" style="margin-top: 20px; margin-bonton: 20px;">
            <button class="btn btn-success" type="button" onclick="location.href='user-profile-add.php'">
                <i class="fa fa-upload"></i><span class="bold"> เพิ่มข้อมูล</span>
            </button>
        </div>     
    </div>
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tablereportuser" width="100%">
                    <thead class="font-table-title">
                        <tr>
                            <td>รูป</td>
                            <td>เลขบัตรประชาชน</td>
                            <td>รหัสประจำตัว</td>
                            <td>ชื่อ-นามสกุล</td>
                            <td>เบอร์โทร</td>
                            <td>วันเดือนปี</td>
                            <td>ชื่อผู้ใช้</td>
                            <td>รหัสผ่าน</td>
                            <td>สถานะ</td>
                            <td>จัดการ</td>
                        </tr>
                    </thead>
                    <tbody class="font-table-content">  

                    </tbody>
                </table>
                <div class="row col-md text-right" style="margin-top: 15px; margin-right: 20px;">
                    <button type="submit" onclick="location.href='dashboard.php'" class="btn btn-danger" name="btn_update">
                        กลับ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>



<script type="text/javascript">


    
    var tableReportUser11 = $('#tablereportuser').DataTable({
        pageLength: 10,
        responsive: true,
        autoWidth: true,
        searching: true,
        "bInfo": false,
        ordering: true,
        "bLengthChange": false,
        processing: true,
        "ajax": {
            "url": "user-sql-select.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "card_number" },
            { "data": "code_number" },
            { "data": "full_name"},
            { "data": "tel" },
            { "data": "birthday" },
            { "data": "username" },
            { "data": "password" },
            { "data": "status_user" },
            { 
                // "data": "id",
                // "render": function(data, type, full, meta){
                //     var html;
                    
                //     html = '<span style="padding: 1px; border: 1px;"><button class="btn btn-primary btn-xs">ข้อมูล</button></span>'+
                //     '<span style="padding: 1px; border: 1px;"><button class="btn btn-warning btn-xs" onclick="userEdit(\''+ full.id +'\')">แก้ไข</button></span>'+
                //     '<span style="padding: 1px; border: 1px;"><button class="btn btn-danger btn-xs" onclick="userDelete(\''+ full.id +'\')">ลบ</button></span>';
                    
                //     return html;
                // }

                "data": "id",
                "render":function(data){
                  return `
                      <a href="#" onclick="userEdit(${data})" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> แก้ไข</a>
                      <a href="#" onclick="userDelete(${data})" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> ลบ</a>
                 `;
                }

            }
        ]
    });


           
    function userDelete(id){

        console.log("Delete user: " + id);

        var fullname = $('#fullname').val(); 
        
            console.log(id);
            console.log(fullname);

            Swal.fire({
            title: 'คุณต้องการจะลบข้อมูล ID :: '+id,
            text: fullname +' ที่ต้องการจะลบ ใช่หรือไม่',
            icon: 'warning',
            width: '550px',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            type: "POST",
                            url: "user-config-delete.php",
                            data: {
                            id:id,
                            },

                            success: function(response){
                            
                                console.log(response);
                                Swal.fire({
                                    title: 'ลบข้อมูลสำเร็จ',
                                    text: 'ID :: '+id+' ลบข้อมูลเสร็จสิ้น',
                                    icon: 'success',
                                    width: '550px',
                                    confirmButtonColor: '#3085d6',
                                });
                                setTimeout(function(){
                                    swal.close();
                                    window.location.reload();
                                },3000)
                        },
                    })
                }
            });
    }

    function userEdit(id) {
        console.log("Edit user: " + id);
    
        $.ajax({
            type: "POST",
            url: "user-config-delete.php",
            data: {
            id:id,
            },
            success: function(response){
                console.log(response);
            },error: function(error){
                console.log(error);
            }
        });
        location.replace('user-profile-edit.php');
    }


</script>


<?php
  include 'layouts/footer.php';
?>
