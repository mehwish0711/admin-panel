<?php
// Include the connection file with proper error handling
include('connection.php');

// Set headers for JSON response and CORS
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Decode JSON input from request
$data = json_decode(file_get_contents("php://input"), true);
$stu_id = $data['sid'];

// Check if database connection is successful
if (!$db) {
    die(json_encode(array('message' => 'Database connection failed', 'status' => false)));
}

// Prepare the SQL query using prepared statements
$stmt = $db->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $stu_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'no record found', 'status' => false));
}

// Close the prepared statement
$stmt->close();
?>
