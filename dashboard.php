<?php
session_start();
include('connect.php');
include('layouts/headen.php');
$id_user = $_SESSION['id'];
$username = $_SESSION['username'];
$status_user = $_SESSION['status_user'];

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
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
                <a href="report-user.php">บริหารจัดการผู้ใช้</a>
            </div>
          </div>
          <div class="col-lg-4">
              <div class="ibox-content text-center">
                <a href="building-control.php">บริหารจัดการอาคารเรียน</a>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="ibox-content text-center">
                <a href="room-control.php">บริหารจัดการห้องเรียน</a>
              </div>
          </div>
      </div>
      <?php
          }
      ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="select-rooms.php">บริหารจัดการ จอง - คืน</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="report-room">ระบบรายงานการ จอง - คืน</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox-content text-center">
               <a href="comment-rooms.php">คอมเม้นห้อง</a>
            </div>
        </div>
    </div>
</div>
</div>




<?php
  include 'layouts/footer.php';
?>
