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
    <div class="row ibox-content animated fadeInDown">
        <div class="col-md text-left">
            <button class="btn btn-success" type="button" onclick="location.href='view/user/register.php'">
                <i class="fa fa-upload"></i><span class="bold"> เพิ่มข้อมูล</span>
            </button>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                <thead class="font-table-title">
                    <td>id</td>
                        <td>name</td>
                        <td>เลขบัตรประชาชน</td>
                        <td>username</td>
                        <td>password</td>
                        <td>level</td>
                        <td>เบอร์โทร</td>
                        <td>จัดการ</td>
                    </tr>
                </thead>
                <tbody class="font-table-content">   
                <?php
                    $Sql = "SELECT * FROM table_user";
                    $Obj = $conn->query($Sql);
                    if($Obj->num_rows >0){
                        while($Req = $Obj->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $Req['id']; ?></td>
                                    <td><?php echo $Req['full_name']; ?></td>
                                    <td><?php echo $Req['card_number']; ?></td>
                                    <td><?php echo $Req['username']; ?></td>
                                    <td><?php echo $Req['password']; ?></td>
                                    <td><?php echo $Req['status_user']; ?></td>
                                    <td><?php echo $Req['tel']; ?></td>
                                    <td width="20%">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <!-- <button class="dim btn btn-xs btn btn-primary" type="submit" onclick="location.href='profile-user.php?id=<?php echo $Req['id']; ?>'" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-user-o"></i><label class="font-btn">view</label>
                                                    </button> -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
                                                        Large Modal
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="dim btn btn-xs btn btn-warning" type="submit" onclick="location.href='profile-edit-user.php?id=<?php echo $Req['id']; ?>'">
                                                    <i class="fa fa-paste"></i><label class="font-btn">edit</label>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" id="fullname" value="<?php echo $Req['full_name']; ?>">
                                                    <button class="dim btn btn-xs btn btn-danger" type="submit" onclick="remove(<?php echo $Req['id']; ?>)">
                                                        <i class="fa fa-times"></i><label class="font-btn">del</label>
                                                    </button>
                                                </div>
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
        <div class="ibox-content text-right">
            <button type="submit" onclick="location.href='main.php'" class="btn btn-danger" name="btn_update">กลับ</button>
        </div>
    </div>
</div>
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
            <div class="modal-body">
                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged.</p>
                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
           
    function remove(id){
    var fullname = document.getElementById('fullname').value; 
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
                    url: "config-delete-user.php",
                    data: {
                    id:id,
                    "_token": "{{ csrf_token() }}",
                    },

                    success: function(response){

                    if(response.status==200) {
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
                    },2000)

                    }else{
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
                    },2000)
                    }

                },
            })
        }
        });
    }

    
    $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

  



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


</script>


<?php
  include 'layouts/footer.php';
?>
