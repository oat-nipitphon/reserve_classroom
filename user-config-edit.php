<?php

  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    include 'connect.php';

    $id_user = $_POST['idUser'];
    $card_number = $_POST['cardNumber'];
    $code_number = $_POST['codeNumber'];
    $full_name = $_POST['fullName'];
    $username = $_POST['userName'];
    $password = $_POST['passWord'];
    $tel = $_POST['tel'];
    $status_user = $_POST['statusUser'];

    $Sql_update = "UPDATE `table_user` SET `card_number`='$card_number',`code_number`='$code_number',`full_name`='$full_name',`tel`='$tel',
    `username`='$username',`password`='$password',`status_user`='$status_user' 
    WHERE id=".$id_user;
    $Obj_update = mysqli_query($conn, $Sql_update);

    if($Obj_update !=0 ){
        echo "Update Successfullry.".'<br>'.$Sql_update;
    }
    else{
        echo "Update Error Success".$Sql_update;
    }

?>