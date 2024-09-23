<?php
include('connection.php');

// Set headers to return JSON data
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// SQL query to fetch data
$sql = "SELECT * FROM user " ;  // (If table name is user_api instead of user-api)

// Run the query
$sql_run = mysqli_query($db, $sql);

// Check if records are found
if (mysqli_num_rows($sql_run) > 0) {

    // Fetch all data as associative array
    $output = mysqli_fetch_all($sql_run, MYSQLI_ASSOC);

    // Return the data in JSON format
    echo json_encode($output);

} else {
    // Return a message if no records are found
    echo json_encode(array('message' => 'No record found', 'status' => false));
}
?>
