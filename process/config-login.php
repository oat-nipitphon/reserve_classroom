<?php
//เข้าสู่ระบบสำเร็จเก็บ session เข้าสู่หน้า main
//เข้าสู่ระบบไม่สำเร็จ ขึ้นแจ้งเตือน กลับหน้าล็อคอิน

	// include('headen.php');
	session_start();
	require_once('process/connect.php');

	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	
	$Sql = "SELECT * FROM `table_user` WHERE `username`='$username' AND `password`='$password'";
	$obj = $conn->query($Sql);
	$req = $obj->fetch_assoc();

	if($req){
		$_SESSION['id'] = $req['id'];
		$_SESSION['full_name'] = $req['full_name'];
		$_SESSION['status_user'] = $req['status_user'];
		
		header("location:main.php");

	}else{
		echo "Username and Password Incorrect!!";
	}


?>