<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $triptype = strtoupper($_POST['triptype']);
    $name = strtoupper($_POST['name']);
    $phone = $_POST['phone'];
    $loc1 = strtoupper($_POST['loc1']);
    $loc2 = strtoupper($_POST['loc2']);
    $datetime = $_POST['datetime'];

    // Capture the offer price
    $offer_price = isset($_POST['offer_price']) ? $_POST['offer_price'] : null;

    if ($triptype == "ONEWAY") {
        $cartype = strtoupper($_POST['cartype']);
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`, `cartype`, `triptype`, `offer_price`)
                VALUES ('$name', '$phone', '$loc1', '$loc2', '$datetime', '$cartype', '$triptype', '$offer_price')";
    }
    if ($triptype == "RETURN") {
        $datetime2 = $_POST['datetime2'];
        $cartype = strtoupper($_POST['cartype']);
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`, `returntiming`, `cartype`, `triptype`, `offer_price`)
                VALUES ('$name', '$phone', '$loc1', '$loc2', '$datetime', '$datetime2', '$cartype', '$triptype', '$offer_price')";
    }
    if ($triptype == "CP") {
        $pax = $_POST['pax'];
        $sql = "INSERT INTO `cabrequests`( `name`, `phone`, `origin`, `dest`, `timing`, `triptype`, `passengers`, `offer_price`)
                VALUES ('$name', '$phone', '$loc1', '$loc2', '$datetime', '$triptype', $pax, '$offer_price')";
    }

    if (mysqli_query($conn, $sql)) {
        // After processing the request
        $sql2 = "SELECT * FROM userdetails WHERE mobile='$phone'";
        $res = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($res) == 0) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;

            echo "<script>window.location.href='createpass.php'</script>";
        }
        echo "<script>
            alert('Your request has been received. You will be notified soon.');
            window.location.href='index.php';
        </script>";
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
