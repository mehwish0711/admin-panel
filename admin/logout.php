<?php
include("config.php");

// admin/logout.php
session_start();
if (isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'] === true) {
    unset($_SESSION['adminLoggedIn']); // Unset the adminLoggedIn session variable
}

header("Location: ../login.php"); // Redirect to the login page after logging out
exit();


?>