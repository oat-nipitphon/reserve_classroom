<?php
// Include your database connection file
require_once ("connect.php");

// Define your DataTables columns
$columns = array(
    'id',
    'card_number',
    'code_number',
    'full_name',
    'tel',
    'username',
    'password',
    'status_user',
    'title_name',
    'birthday',
    'image_user'
);

// Specify the table name
$table = 'table_user';

// Define an array to store the data
$data = array();

// Build the SQL query
$sql = "SELECT " . implode(", ", $columns) . " FROM $table";

// Execute the query
$result = mysqli_query($conn, $sql);

// Fetch the data and convert it to JSON
while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    foreach ($columns as $column) {
        $sub_array[$column] = $row[$column];
    }
    $data[] = $sub_array;
}

// echo $data;

// Close the database connection
mysqli_close($conn);

// Output the JSON data
echo json_encode(array('data' => $data));
?>