<?php //logout logic
session_start(); // Start the session

// Clear session variables
$_SESSION = array();
session_destroy(); // Destroy the session

// Delete cookies
setcookie('driver_id', '', time() - 3600, "/"); // Expire the cookie
setcookie('name', '', time() - 3600, "/"); // Expire the cookie

// Redirect to login page
header("Location: login.php");
exit();
