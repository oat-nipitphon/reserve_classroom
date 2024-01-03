<?php
    session_start();
    require_once 'connect.php';
    if (!isset($_SESSION['id'])) {
        echo 'Please Login!';
        exit();
    }

    $columns = [
        'id',
        'build',
        'faculty',
        'room_number'
       ];

    // Specify the table name
    $table = 'school_building';

    // Define an array to store the data
    $data = [];

    // Build the SQL query
    $sql = 'SELECT ' . implode(', ', $columns) . " FROM $table";

    // echo $sql;

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Fetch the data and convert it to JSON
    while ($row = mysqli_fetch_array($result)) {
        $sub_array = [];
        foreach ($columns as $column) {
            $sub_array[$column] = $row[$column];
        }
        $data[] = $sub_array;
    }
    // echo $data;

    // Close the database connection
    mysqli_close($conn);

    // Output the JSON data
    echo json_encode(['data' => $data]);

?>
