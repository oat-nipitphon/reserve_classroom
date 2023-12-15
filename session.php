<?php
 session_start();
    if(!isset($_SESSION['username'])){
        header("Location: main.php");
    }
    require 'connect.php';
    $session_username = $_SESSION['username'];
    $qry_user = "SELECT * FROM table_user WHERE username=$session_username";
    $result_user = mysqli_query($conn, $qry_user);
    if($result_user){
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $session_username = $row_user['username'];
        $session_status_user = $row_user['status_user'];
        $session_card_number = $row_user['card_number'];
        $session_full_name = $row_user['full_name'];
        mysqli_free_result($result_user);
    }
    
    mysqli_close($conn);

