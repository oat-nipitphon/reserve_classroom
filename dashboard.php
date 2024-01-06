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
    include('layouts/headen.php');
?>

<style>
    .box-select-dashboard{
        display: block;   
        margin-inline: 50px;
        margin-top: 50px;
        outline: 2px solid #0080ff;
        outline-offset: 10px;
    }
</style>

<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-12">
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
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
    <div class="col-md-12">
        <div class="row">
            <!-- Menu 1 User Report  -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="user-report.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบจัดการผู้ใช้งาน</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu 2 Building Control -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="building-report.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบจัดการอาคารเรียน</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu 3 Room Control -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="room-report.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบจัดการอาคารเรียน</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu 4 Room Select -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="room-select.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบจัดการจองคืนห้อง</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu 5 Room Report -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="room-report.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบรายงานจองคืนห้อง</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
                            <div> <i class="fa fa-comments-o"> </i> 54 comments </div>
                            <i class="fa fa-eye"> </i> 52 views
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu 6 Comment Room -->
            <div class="col-md-5 box-select-dashboard border border-primary">
                <a href="comments.php" class="btn-link">
                    <div class="m-t-xl text-center">
                        <h2><b>ระบบจัดการคอมเม้น</b></h2>
                    </div>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-top:20px;" class="tags-ibox-menu">
                            <h5>Status:</h5>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="stats-ibox-menu small text-right" style="margin-top: 20px;">
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