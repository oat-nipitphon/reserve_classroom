<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nattadcz_db";


// $servername = "localhost";
// $username = "nattadcz_db";
// $password = "Nattadash01";
// $dbname = "nattadcz_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn != null) {
  // $Sql = "SELECT * FROM `login`";
  // $obj = $conn->query($Sql);
  // if($obj->num_rows > 0){
  //   while($req = $obj->fetch_assoc()){
  //     echo $req['name'].'<br>';
  //   }
  // }
  
}else{
  die("Connection failed: " . $conn->connect_error);
}
?>