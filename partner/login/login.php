<?php
session_start(); // Start the session

// Database connection
include '../../db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    // Fetch user from the database
    $sql = "SELECT * FROM driverdetails WHERE phone = '$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variable
            $_SESSION['driver_id'] = $user['driver_id'];
            $_SESSION['name'] = $user['name'];

            // Set a cookie for persistent login (optional)
            if (isset($_POST['remember'])) {
                setcookie('driver_id', $user['driver_id'], time() + (86400 * 30), "/"); // 30 days
                setcookie('name', $user['name'], time() + (86400 * 30), "/"); // 30 days
            }

            echo "Login successful!";
            // Redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that phone number.";
    }
}
