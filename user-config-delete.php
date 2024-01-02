<?php
//   session_start();
    require_once ("connect.php");
    // if(!isset($_SESSION['id'])){
    //     echo "Please Login!";
    //     exit();
    // }

    $id = $_POST['id'];
    $Sql = "DELETE FROM table_user WHERE id=".$id;
    $Obj = mysqli_query($conn, $Sql);
    if($Obj != null ){
        echo "OK".$Sql;
    }
    else{
        echo "Error".$Sql;
    }
?>