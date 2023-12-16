<?php
 session_start();
 require_once('connect.php');
    if(!isset($_SESSION['username'])){
        
        $session_username = $_SESSION['username'];
        $sql_user = "SELECT * FROM table_user WHERE username=$session_username";
        $obj = $conn->query($sql_user);
        while($req = $obj->fetch_assoc()){
            $session_id = $req['id'];
            $session_username = $req['username'];
            $session_status_user = $req['status_user'];
            $session_card_number = $req['card_number'];
            $session_full_name = $req['full_name'];
        }

        if($session_id != null){
            header("Location: main.php");
        }else{
            echo "Error session id";
        }

    }else{
        echo "Error Seesion".$session_id;
    }

    // $obj_user = $conn->query($Sql_user);
    // while($req_user = $obj_user->fetch_assoc()){
    //   echo $req_user['full_name'];
    // }


    // if($result_user){
    //     $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    //     $session_id = $row_user['id'];
    //     $session_username = $row_user['username'];
    //     $session_status_user = $row_user['status_user'];
    //     $session_card_number = $row_user['card_number'];
    //     $session_full_name = $row_user['full_name'];
    //     mysqli_free_result($result_user);
    // }
    
    mysqli_close($conn);

