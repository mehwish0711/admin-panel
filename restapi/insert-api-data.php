<?php
// Include the database connection file
include('connection.php');

// Set headers for JSON response and CORS
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Get the JSON input from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if required data is present
if (!isset($data['name']) || !isset($data['age']) || !isset($data['city'])) {
    echo json_encode(array('message' => 'Missing data', 'status' => false));
    exit();
}

// Extract values from JSON data
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

// Prepare the SQL query using prepared statements to avoid SQL injection
$stmt = $db->prepare("INSERT INTO `user-api` (name, age, city) VALUES (?, ?, ?)");

// Bind parameters to the prepared statement (s = string, i = integer)
$stmt->bind_param("sis", $name, $age, $city);

// Execute the statement and check if insertion was successful
if ($stmt->execute()) {
    echo json_encode(array('message' => 'Record inserted successfully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Failed to insert record', 'status' => false));
}

// Close the prepared statement
$stmt->close();
?>
