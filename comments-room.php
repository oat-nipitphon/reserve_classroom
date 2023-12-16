<?php
    session_start();
    require_once 'connect.php';
    $id_room = $_GET['id_room'];
    $name_room = $id_room;
    $name_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คอมเม้นห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
#text-p-title{
    font-size: 20px;
}
#text-p-content{
    font-size: 18px;
}
</style>
</head>
<?php include 'headen.php'; ?>
<body>
<div class="container">
<div class="row" style="margin-top: 30px; margin-bottom: 30px;">
 <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        แสดงความคิดเห็น
    </button>
    <?php include 'modal-comment.php'; ?>
</div>

</div>
<div class="row">
    <div class="col-lg-8" style="margin-right:auto;margin-left:auto;">
                            <!-- <tr>
                            <td><?php echo $req_class_room['id']; ?></td>
                            <td><?php echo $req_class_room['name_room']; ?></td>
                            <td><?php echo $req_class_room['comment']; ?></td>
                            <td><?php echo $req_class_room['name_user']; ?></td>
                            <td><?php echo $req_class_room['comment_time']; ?></td>
                            <td><?php echo $req_class_room['comment_status']; ?></td>
                            </tr> -->
    </div>
</div>

<?php
    include 'connect.php';
    $Sql = "SELECT * FROM `comments-rooms` WHERE name_room =".$name_room;
    $obj_class_room = $conn->query($Sql);
        if($obj_class_room->num_rows > 0){
            while($req_class_room = $obj_class_room->fetch_assoc()){
                ?>
                <div class="row">
                    <div class="col-md-8" style="margin-left: auto; margin-right: auto;">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-4" style="text-align: left;">
                                <span>ลำดับ <?php echo $req_class_room['id']; ?></span>
                                <span>ห้อง <?php echo $req_class_room['name_room']; ?></span>
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <span>วันที่ <?php echo $req_class_room['comment_time']; ?></span>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="text-align: left;">
                                <span>สถานะ <?php echo $req_class_room['comment_status']; ?></span>
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <span>ชื่อ <?php echo $req_class_room['name_user']; ?></span>
                            </div> 
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-8" style="text-align: left;">
                                <span>ความคิดเห็น</span>
                            </div>
                            <div class="col-md-8">
                                <span style="margin-left: 20px;"><?php echo $req_class_room['comment']; ?></span>
                            </div>
                        </div>
                        <div class="row" style="text-align: right;">
                            <div class="col-md-8">
                                <span><a href="back-comment.php?id=<?php echo $req_class_room['id']; ?>">ตอบกลับ</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
            ?>

<?php include 'footer.php'; ?>
</body>
</html>