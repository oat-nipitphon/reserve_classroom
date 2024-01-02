<?php
	session_start();
	include('connect.php');
	// Check if the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Your authentication logic goes here

		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM `table_user` WHERE `username` = '$username' AND `password`= '$password'";
		echo $sql;
		$obj = $conn->query($sql);
		$req = $obj->fetch_assoc();
	
		// Check if the provided credentials are valid
		if ($req != null) {
			// Set session variables
			$_SESSION["id"] = $req['id'];
			$_SESSION["username"] = $req['username'];
			$_SESSION["status_user"] = $req['status_user'];
	
			// Redirect to a logged-in page
			header("Location: dashboard.php");
			exit();
		} else {
			$error_message = "Invalid username or password. Please try again.";
		}
	}