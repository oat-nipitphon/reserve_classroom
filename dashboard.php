<?php

    session_start();

    require_once("connect.php");
    $id_user = $_SESSION['id'];
    $username = $_SESSION['username'];
    $status_user = $_SESSION['status_user'];
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
    include('D:/xampp/htdocs/reserve_classroom/layouts/headen.php');
?>

<style>
    .ibox-content-menu {
        position: relative;
        border-radius: 3em;
        padding: 3em;
    }
    .font-ibox-menu{
      font-size: 16px;
      margin-top: 10px;
    }
    .tags-ibox-menu{
      margin-top: 20px;
    }
    .stats-ibox-menu{
      margin-top: 20px;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Graphs</a>
            </li>
            <li class="active">
                <strong>Morris.js Charts</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content">

        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="ibox-title">
    <!-- <strong class="font-bold">David Williams</strong> -->
    <strong class="font-bold">Dashboard</strong>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h4>
                        <br> ยินดีต้อนรับ ::
                        <?php
                        $Sql_user = "SELECT * FROM `table_user` WHERE `id`='$id_user'";
                        // echo $Sql_user;
                        $obj_user = $conn->query($Sql_user);
                        while ($req_user = $obj_user->fetch_assoc()) {
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

    <div class="wrapper wrapper-content  animated fadeInRight blog">
        <div class="row">
            <?php 
          if($status_user == "admin" || $status_user == "teacher"){
            ?>

            <!-- Menu 1 User Report  -->
            <div class="ibox-content-menu col-md-4">
                <a href="user-report.php" class="btn-link">
                    <label class="font-ibox-menu">
                        บริหารจัดการผู้ใช้
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='user-report.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 2 Building Control -->
            <div class="ibox-content-menu col-md-4">
                <a href="building-control.php" class="btn-link">
                    <label class="font-ibox-menu">
                        บริหารจัดการอาคารเรียน
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='building-control.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 3 Room Control -->
            <div class="ibox-content-menu col-md-4">
                <a href="room-control.php" class="btn-link">
                    <label class="font-ibox-menu">
                        บริหารจัดการห้องเรียน
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='room-control.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php
            }
        ?>
        <div class="row">

            <!-- Menu 4 Room Select -->
            <div class="ibox-content-menu col-md-4">
                <a href="room-select.php" class="btn-link">
                    <label class="font-ibox-menu">
                        บริหารจัดการ จอง - คืน
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='room-select.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 5 Room Report -->
            <div class="ibox-content-menu col-md-4">
                <a href="room-report.php" class="btn-link">
                    <label class="font-ibox-menu">
                        ระบบรายงานการ จอง - คืน
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='room-report.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 6 Comment Room -->
            <div class="ibox-content-menu col-md-4">
                <a href="comment-rooms.php" class="btn-link">
                    <label class="font-ibox-menu">
                        คอมเม้นห้อง
                    </label>
                </a>
                <div class="row">
                    <div class="col-md-6">
                      <label class="tags-ibox-menu">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-md" onclick="location.href='comment-rooms.php'" type="button" style="margin-top: 5px;">เลือก</button>
                      </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>


<?php
include 'layouts/footer.php';
?>
