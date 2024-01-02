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
?>
<style>
    .ibox-content-menu {
        display: block;
        font-size: 16px;
        border: 5px;
        margin-top: 50px;
        width: 300px;
        height: 150px;
        position: relative;
        /* margin-left: 60px; */
        background: white;
        border-radius: 3em;
        padding: 3em;

    }
</style>

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
            <div class="ibox-content col-md-4">
                <a href="user-report.php" class="btn-link">
                    <h2>
                        บริหารจัดการผู้ใช้
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content col-md-4">
                <a href="building-control.php" class="btn-link">
                    <h2>
                        บริหารจัดการอาคารเรียน
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content col-md-4">
                <a href="room-control.php" class="btn-link">
                    <h2>
                        บริหารจัดการห้องเรียน
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
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
            <div class="ibox-content col-md-4">
                <a href="room-select.php" class="btn-link">
                    <h2>
                        บริหารจัดการ จอง - คืน
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content col-md-4">
                <a href="room-report" class="btn-link">
                    <h2>
                        ระบบรายงานการ จอง - คืน
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content col-md-4">
                <a href="comment-rooms.php" class="btn-link">
                    <h2>
                        คอมเม้นห้อง
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Anthony Pits</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan
                        2015</span>
                </div>
                <p>
                    The languages only differ in their grammar, their pronunciation and their most common words.
                    Everyone realizes why a new common language would be desirable: one could refuse to pay expensive
                    translators.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
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
