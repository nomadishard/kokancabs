<?php
session_start();
include '../db.php';

// Check if the user is logged in
if (!isset($_SESSION['phone'])) {
    header("Location: ../partner/login/");
    exit();
}

// Check if the trip ID and driver ID are provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['trip_id']) && isset($_POST['driver_id'])) {
    $trip_id = $_POST['trip_id'];
    $driver_id = $_POST['driver_id'];

    // Update the trip status to accepted (assuming status = 1 means accepted)
    $update_sql = "UPDATE cabrequests SET status = 1, driver_id = ? WHERE req_id = ? LIMIT 1";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ii", $driver_id, $trip_id);

    if ($stmt->execute()) {
        // Optionally, you can notify the driver here if needed
        // For example, you could send an email or a notification

        // Redirect back to the bookings page with a success message
        $_SESSION['message'] = "Trip accepted successfully!";
    } else {
        // Redirect back with an error message
        $_SESSION['message'] = "Error accepting trip. Please try again.";
    }

    $stmt->close();
} else {
    // Redirect back with an error message if no trip ID or driver ID is provided
    $_SESSION['message'] = "Invalid request.";
}

// Redirect to the bookings page
header("Location: index.php");
exit();
