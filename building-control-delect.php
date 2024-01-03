<?php
  session_start();
  require_once ("connect.php");
  if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
  }
    $id = $_POST['id'];

    $Sql_up = "DELETE FROM `school_building` WHERE id=".$id;
    $Obj = mysqli_query($conn, $Sql_up);
    if($Obj != null){
        echo "Successfullry".$Sql_up;
    }else{
        echo "Error Success".$Sql_up;
    }
?>