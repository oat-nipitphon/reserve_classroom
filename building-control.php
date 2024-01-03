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
<div class="row">
    <div class="wrapper wrapper-content ibox-title animated fadeInDown">
        <div class="col-md text-left" style="margin-top: 20px; margin-bonton: 20px;">
            <button class="btn btn-success" type="button" onclick="location.href='building-insert.php'">
                <i class="fa fa-upload"></i><span class="bold"> เพิ่มข้อมูล</span>
            </button>
        </div>     
    </div>
    <div class="wrapper wrapper-content ibox-content animated fadeInRight">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tableReportBuilding" width="100%">
                <thead class="font-table-title text-center">
                    <tr>
                        <td>อาคาร</td>
                        <td>เลขห้อง</td>
                        <td>คณะ</td>
                        <td width="20%">จัดการ</td>
                    </tr>
                </thead>
                <tbody class="font-table-content">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script type="text/javascript">


    var tableReportBuilding = $('#tableReportBuilding').DataTable({
        pageLength: 5,
        responsive: true,
        autoWidth: true,
        searching: true,
        "bInfo": false,
        ordering: true,
        "bLengthChange": false,
        processing: true,
        "ajax": {
            "url": "building-sql-select.php",
            "type": "POST"
        },
        "columns": [
            { "data": "build" },
            { "data": "room_number" },
            { "data": "faculty" },
            { 
                "data": "id",
                "render": function(data, type, full, meta){
                    var html;
                    
                    html = '<div class="text-center"><span style="padding: 3px; border: 3px;"><button class="btn btn-primary btn-xs">ข้อมูล</button></span>'+
                    '<span style="padding: 3px; border: 3px;"><button class="btn btn-warning btn-xs" onclick="buildingUpdate(\'' + full.room_number + '\')">แก้ไข</button></span>'+
                    '<span style="padding: 3px; border: 3px;"><button class="btn btn-danger btn-xs" onclick="buildingDelete(\'' + full.id + '\')">ลบ</button></span></div>';
                    
                    return html;
                }
            }
        ]
    });


    // Function Delete 
    function buildingDelete(id){
        console.log(id);
        Swal.fire({
        title: 'คุณต้องการจะลบข้อมูล ห้อง :: '+id,
        text: 'ยืนยันลบข้อมูล ห้อง '+id+' ใช่หรือไม่',
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
                    url: "building-control-delect.php",
                    data: {id:id},

                    success: function(response){
                        Swal.fire({
                            title: 'ลบข้อมูลสำเร็จ',
                            text: 'ห้อง :: '+id+' ลบข้อมูลเสร็จสิ้น',
                            icon: 'success',
                            width: '550px',
                            confirmButtonColor: '#3085d6',
                        });
                        setTimeout(function(){
                            swal.close();
                            window.location.reload();
                        },500)  

                    },error: function(error){
                        console.log(error);
                        Swal.fire({
                            title: 'รอแพ๊บบบบบบบบ',
                            text: 'คือไรไปไง ต่อออออออออ',
                            icon: 'warning',
                            width: '550px',
                            confirmButtonColor: '#3085d6',
                        });
                        setTimeout(function(){
                            swal.close();
                            window.location.reload();
                        },500)
                    },
            })
        }
        });

    }

    // Function Update 
    function buildingUpdate(id){
        // building-control-edit.php
    }

</script>



<?php
    include 'layouts/footer.php';
?>