<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $triptype = strtoupper($_POST['triptype']);
    $name = strtoupper($_POST['name']);
    $phone = $_POST['phone'];
    $loc1 = strtoupper($_POST['loc1']);
    $loc2 = strtoupper($_POST['loc2']);
    $datetime = $_POST['datetime'];


    if ($triptype == "ONEWAY") {
        $cartype = strtoupper($_POST['cartype']);
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`,`cartype`,`triptype`)
        VALUES ('$name','$phone','$loc1','$loc2','$datetime','$cartype','$triptype')";
    }
    if ($triptype == "RETURN") {
        $datetime2 = $_POST['datetime2'];
        $cartype = strtoupper($_POST['cartype']);
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`,`returntiming`,`cartype`,`triptype`)
        VALUES ('$name','$phone','$loc1','$loc2','$datetime','$datetime2','$cartype','$triptype')";
    }
    if ($triptype == "CP") {
        $pax = $_POST['pax'];
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`,`triptype`,`passengers`)
        VALUES ('$name','$phone','$loc1','$loc2','$datetime','$triptype',$pax)";
    }

    if (mysqli_query($conn, $sql)) {
        // After processing the request
        echo "<script>
        alert('Your request has been received. You will be notified soon.');
        window.location.href='index.php';
      </script>";
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
