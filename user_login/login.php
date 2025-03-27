<?php
session_start(); // Start the session

// Database connection
include '../db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    // Fetch user from the database
    $sql = "SELECT * FROM userdetails WHERE mobile = '$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if ($password == $user['password']) {
            // Set session variable
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['phone'] = $user['mobile'];
            // Set a cookie for persistent login (optional)
            // if (isset($_POST['remember'])) {
            //     setcookie('driver_id', $user['driver_id'], time() + (86400 * 30), "/"); // 30 days
            //     setcookie('name', $user['name'], time() + (86400 * 30), "/"); // 30 days
            // }
            // Redirect to dashboard or home page
            header("Location:../mybookings/");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that phone number.";
    }
}
