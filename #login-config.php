<?php
// Start the session
session_start();
include('connent.php');
// Simulate user authentication (replace this with your actual authentication logic)
// $validUsername = "demo";
// $validPassword = "demo123";

// Get the submitted username and password from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

$sqlTableUser = "SELECT * FROM `table_user` WHERE `username`= '$username' AND `password` = '$password'";

// Check if the submitted credentials are valid
if ($objTableUser != null) {
    // Set session variables
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['status_user'] = $status_user;

    // Return a JSON response indicating success
    $response = array('success' => true, 'username' => $username);
    echo json_encode($response);
} else {
    // Return a JSON response indicating failure
    $response = array('success' => false, 'message' => 'Invalid username or password');
    echo json_encode($response);
}
?>
