<!-- INSPINIA - Responsive Admin Theme version 2.7 -->
<?php

    require_once("connect.php");
    $id_user = $_SESSION['id'];
    $username = $_SESSION['username'];
    $status_user = $_SESSION['status_user'];

    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จองห้องเรียนออนไลน์</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Table data -->
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">
        <?php include('D:/xampp/htdocs/reserve_classroom/layouts/nav-right.php'); ?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <?php include('D:/xampp/htdocs/reserve_classroom/layouts/nav-top.php'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">