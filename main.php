<?php
  session_start();
  include('layouts/headen.php');
  require_once ("process/connect.php");

  // echo $_SESSION['id'];

  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    $id_user = $_SESSION['id'];
    $status_user = $_SESSION['status_user'];
?>
<style>
  .ibox-content-menu{
    font-size: 18px;
    border: 3px;
    margin-top: 35px;
    padding: auto;
  }
</style>

<div class="row">
<div class="row ibox-content animated fadeInDown">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
              <h4>
                <br> ยินดีต้อนรับ :: 
                  <?php
                    $Sql_user = "SELECT * FROM `table_user` WHERE `id`='$id_user'";
                    // echo $Sql_user;
                    $obj_user = $conn->query($Sql_user);
                      while($req_user = $obj_user->fetch_assoc()){
                        echo $req_user['full_name'];
                      }
                  ?>
              </h4>
            </div>
            <!-- <div class="col-md-6" style="text-align: right;">
              <form action="search-room-main.php" method="POST">
                <input type="text" name="search" id="search" size="30"> 
                <button class="btn btn-info">ค้นหา</button>        
              </form>
            </div> -->
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <?php 
        if($status_user == "admin" || $status_user == "teacher"){
          ?>
          <div class="col-lg-4">
            <div class="ibox-content text-center">
                <a href="view/user/report-user.php">บริหารจัดการผู้ใช้</a>
            </div>
          </div>
          <div class="col-lg-4">
              <div class="ibox-content text-center">
                <a href="view/building/building-control.php">บริหารจัดการอาคารเรียน</a>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="ibox-content text-center">
                <a href="view/room/room-control.php">บริหารจัดการห้องเรียน</a>
              </div>
          </div>
      </div>
      <?php
          }
      ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="view/room/report-room.php">บริหารจัดการ จอง - คืน</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="view/room/-room.php">ระบบรายงานการ จอง - คืน</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="view/comment/comment-rooms.php">คอมเม้นห้อง</a>
            </div>
        </div>
    </div>
</div>
</div>




<?php
  include 'layouts/footer.php';
?>
