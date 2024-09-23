<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editEmail = $_POST['editEmail'];
    $editPass = $_POST['editPass'];

    // Perform validation if needed

    // Update the admin details in the database
    $updateQuery = "UPDATE `admin` SET email = '$editEmail', `password` = '$editPass'";
    $result = mysqli_query($config, $updateQuery);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Admin details updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update admin details: ' . mysqli_error($config));
    }

    echo json_encode($response);
} else {
    // Handle invalid requests
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
