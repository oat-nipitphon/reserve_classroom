<?php
	session_start();
	include('connect.php');
	// Check if the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Your authentication logic goes here

		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM `table_user` WHERE `username` = '$username' AND `password`= '$password'";
		$obj = $conn->query($sql);
		$req = $obj->fetch_assoc();
	
		// Check if the provided credentials are valid
		if ($req != null) {

			$_SESSION["id"] = $req['id'];
			$_SESSION["username"] = $req['username'];
			$_SESSION["status_user"] = $req['status_user'];

			$response = array('success' => true, 'message' => 'Login successful');
			

		} else {

			$response = array('success' => false, 'message' => 'Invalid username or password');


		}

		echo json_encode($response);

	}