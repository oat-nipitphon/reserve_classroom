<?php
    session_start();
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คอมเม้นห้อง</title>
</head>
<body>
<?php 
    include 'headen.php';
?>
<div class="container" style="margin-top: 30px;">
        <div class="row">
            <table border="1" width="70%" style="margin-left: auto; margin-right:auto; text-align:center;">
                <tr>
                <td>อาคาร</td>
                <td>ห้อง</td>
                <td>คอมเม้นห้อง</td>
                </tr>
<?php
$Sql_Room =  'SELECT * FROM class_room';
$Obj_Room = $conn->query($Sql_Room);
if($Obj_Room->num_rows > 0){
    while($Req_Room = $Obj_Room->fetch_assoc()){
        ?>

                <tr>
                <td><?php echo $Req_Room['building_number']; ?></td>
                <td><?php echo $Req_Room['name_room']; ?></td>
                <td><a href="comments-room.php?id_room=<?php echo $Req_Room['name_room'] ?>">ดูคอมเม้น</a></td>
                </tr>
        <?php
    }
}
?>
        </table>
    </div>
</div>
<?php
    include 'footer.php';
?>
</body>
</html>