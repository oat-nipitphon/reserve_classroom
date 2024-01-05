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
        $response = array(['success' => true, 'message' => 'Delete Successfullry.']);
    }
    else{
        echo "Error".$Sql;
        $response = array(['success' => false, 'message' => 'Delete Error Success.']);
    }

    echo json_encode($response);

?>