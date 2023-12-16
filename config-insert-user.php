<?php
    session_start();
    require_once ("connect.php");
    include('layouts/headen.php');

    if(!isset($_SESSION['id'])){
    echo "Please Login!";
    exit();
    }
    
    $id_user = $_SESSION['id'];
    $status_user = $_SESSION['status_user'];


    $cart_number=$_POST["cart_number"];
    $status_user=$_POST["status_user"];
    $code_number=$_POST["code_number"];
    $title_name=$_POST["title_name"];
    $full_name=$_POST["full_name"];
    $tel=$_POST["tel"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $confirm_password=$_POST["confirm_password"];
    
    // // รับค่า date 
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));

    // Example data บันทุกรูปภาพเป็นไบนารี่
    $image_data = base64_decode($_POST['img_user']);
    $filename = 'path/to/save/image.jpg';
    // Check if the directory exists, and create it if not
    if (!file_exists(dirname($filename))) {
        mkdir(dirname($filename), 0777, true);
    }
    // Write the data to the file
    $img_user_b = file_put_contents($filename, $image_data);



    $Sql_insert = "INSERT INTO `table_user`(`card_number`, `code_number`, `title_name`, `full_name`, `birthday`, `tel`, `username`, `password`, `status_user`,`img_User`) 
    VALUES ('$cart_number','$code_number','$title_name','$full_name','$birthday','$tel','$username','$password','$status_user','$img_user_b')";
    $Obj_insert = mysqli_query($conn , $Sql_insert);

    if($Obj_insert != 0 ){
        echo "Insert OK".$Sql_insert;
    }
    else{
        echo "Insert Error".$Sql_insert;
    }

?>