<?php
session_start();

include("../admin/config.php"); // Assuming config.php contains database credentials

if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    // Login Logic
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    // Validate and sanitize data
    $loginEmail = mysqli_real_escape_string($config, $loginEmail);
    $loginPassword = mysqli_real_escape_string($config, $loginPassword);


    // Query to check if the user exists with the provided email in admin_details
    $adminQuery = "SELECT * FROM `admin` WHERE email = '$loginEmail'";
    $adminResult = $config->query($adminQuery);

if ($adminResult->num_rows > 0) {
        // User found in admin_details table (admin login)
        $adminRow = $adminResult->fetch_assoc();
        $adminStoredPassword = $adminRow['password'];

        // Check the password without using password_verify
        if ($loginPassword === $adminStoredPassword) {
            // Set admin details in session
            $_SESSION['adminLoggedIn'] = true;
            header("location:../admin/index.php");
        } else {
            echo "<script>alert('Incorrect password for admin');window.location.href='../login.php'</script>";
        }
    } else {
        echo "<script>alert('Admin not found');window.location.href='../login.php'</script>";
    }
} else {
    // echo "Invalid request"; // Handle invalid requests
    echo "<script>alert('Invalid request');window.location.href='../login.php'</script>";
}
?>