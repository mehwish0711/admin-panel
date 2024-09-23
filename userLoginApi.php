<?php
header('Content-Type: application/json');
include("config.php");

$response = array();

// Define the base URL for images
$base_url = "https://sportsforlife.pk/sfl/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['u_user_name']) && isset($_POST['pass'])) {
        $u_user_name = $_POST['u_user_name'];
        $pass = $_POST['pass'];

        // Retrieve the user with the provided email
        $query = "SELECT * FROM `users` WHERE `u_user_name` = ?";
        $stmt = mysqli_prepare($config, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $u_user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                // Verify password
                if ($user['pass'] === $pass) {
                    // Password is correct
                    // Remove password from the user data for security
                    unset($user['pass']);
                    
                    // Prepend base URL to image path in user data and encode spaces
                    if (isset($user['u_image']) && !empty($user['u_image'])) {
                        $user['u_image'] = $base_url . str_replace(' ', '%20', $user['u_image']);
                    }

                    $response['success'] = true;
                    $response['message'] = "User details fetched successfully.";
                    $response['user'] = $user; // Include all details of the user
                } else {
                    // Incorrect password
                    $response['success'] = false;
                    $response['message'] = "Incorrect email or password.";
                }
            } else {
                // User with provided email not found
                $response['success'] = false;
                $response['message'] = "User not found.";
            }

            mysqli_stmt_close($stmt);
        } else {
            // Error preparing the statement
            $response['success'] = false;
            $response['message'] = "Error preparing the statement.";
        }
    } else {
        // Missing email or password
        $response['success'] = false;
        $response['message'] = "Email and password are required.";
    }
} else {
    // Method not allowed
    http_response_code(405); // Method Not Allowed
    $response['success'] = false;
    $response['message'] = "Method not allowed.";
}

mysqli_close($config);

// Finally, send the JSON response
echo json_encode($response);
?>
