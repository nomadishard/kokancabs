<?php //check for cookie
session_start(); // Start the session

// Database connection
include '../../db.php';

// Check if user is logged in via session
if (isset($_SESSION['driver_id'])) {
    // User is logged in
    $driver_id = $_SESSION['driver_id'];
    $name = $_SESSION['name'];
} elseif (isset($_COOKIE['driver_id'])) {
    // User is logged in via cookie, set session variables
    $_SESSION['driver_id'] = $_COOKIE['driver_id'];
    $_SESSION['name'] = $_COOKIE['name'];
    $driver_id = $_COOKIE['driver_id'];
    $name = $_COOKIE['name'];
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Now you can use $driver_id and $name in your dashboard
