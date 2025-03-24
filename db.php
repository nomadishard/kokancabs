<?php
try {
    $server = "localhost";
    $username = "u111937156_kokancab";
    $password = "Kokancabs@2025";
    $database = "u111937156_kokancabs";
    $conn = new mysqli($server, $username, $password, $database);  //connecting database

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error); //exception occured
    }
} catch (Exception $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
    exit();
}
