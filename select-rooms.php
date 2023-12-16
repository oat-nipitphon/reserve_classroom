<?php
session_start();
include 'connect.php';
include 'layouts/headen.php';
$id_user = $_SESSION['id'];
$username = $_SESSION['username'];
$status_user = $_SESSION['status_user'];

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$Sql_select_room = 'SELECT * FROM class_room';
$Result = $conn->query($Sql_select_room);

?>

<div class="warpper warpper-connect">
    <div class="row" style="margin-top: 50px;">
        <?php
        $sql_rooms = "SELECT * FROM `class_room`";
        $obj_rooms = $conn->query($sql_rooms);
        
        if($obj_rooms != null){
            while($req_room = $obj_rooms->fetch_assoc()){
            ?>
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">
                                <h5><?php echo $req_room['code_room']; ?></h5>
                            </label>
                        </div>
                        <div class="col-md-6 pull-right text-right ">
                            <label for="">
                                <?php
                                if ($req_room['status_room'] == '0') {
                                    echo "<span class='label label-primary'>ว่าง</span>";
                                } elseif ($req_room['status_room'] == '1') {
                                    echo "<span class='label label-danger'>ไม่ว่าง</span>";
                                } else {
                                    echo "<span class='label label-warning'>ไม่พร้อมใช้งาน</span>";
                                }
                                ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6 text-center animated bounceInLeft">
                            <form action="select-room-main.php" method="post">
                                <input type="hidden" name="code_room" id="code_room" value="<?php echo $req_room['code_room']; ?>">
                                <button class="btn btn-primary" type="submit" onclick="selectRoomMain()">
                                    <i class="fa fa-check"></i>จองห้อง
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-center animated bounceInRight">
                            <button class="btn btn-success" type="button"><i class="fa fa-upload"></i>
                                <span class="bold">คืนห้อง</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
    ?>
    </div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

        // function selectRoomMain(button){
            
        //     var id_room = $('#id_room').val();
        //     console.log(id_room);

        //     $.ajax({
        //         type: 'POST',
        //         url: 'select-room-main.php',
        //         data: {
        //             id_room: id_room,
        //         },
        //         success: function(response){
        //             console.log("OK");         
        //             Swal.fire({
        //                 title: "select-room-main.php",
        //                 text: "Connect Test",
        //                 icon: "success"
        //             });
        //             setTimeout(function (){
        //                 swal.close();
        //                 location.replace('select-room-main.php');
        //             },1500);
        //         },
        //         error: function(error){
        //             console.log(error);
        //             Swal.fire({
        //                 title: "Error Select Room Main",
        //                 text: "Error Test",
        //                 icon: "error"
        //             });
        //             setTimeout(function (){
        //                 swal.close();
        //             },1500);
        //         }
        //     });
        // }

</script>

<?php
    include('layouts/footer.php');
?>
