<?php
session_start();
include '../db.php';
$phone = $_SESSION['phone'];
?>

<!doctype html>
<html lang="en">

<head>
    <title>My Bookings</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: solid;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../">KOKANCABS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500;">
                                <?php echo strtoupper($_SESSION['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="#" class="dropdown-item">My Bookings</a></li>
                                <li><a href="../logout.php" class="dropdown-item">LOGOUT</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <?php
        // Prepare the SQL query to fetch bookings
        $sql = "SELECT req_id, name, phone, origin, dest, timing, returntiming, passengers, cartype, triptype, status, driver_id FROM cabrequests WHERE phone = '$phone'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1 class='text-center'>Booking Details</h1>";
            echo "<table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Timing</th>
                    <th>Status</th>
                    <th>Counter Offers</th>
                    
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                $statusDisplay = ($row['status'] == 0) ? "Awaiting Driver" : (($row['status'] == 1) ? "In Progress" : "Completed");

                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['origin']}</td>
                    <td>{$row['dest']}</td>
                    <td>{$row['timing']}</td>
                    <td>$statusDisplay</td>
                    <td>";

                // Only fetch counter offers if the status is not "In Progress"
                if ($row['status'] != 1) {
                    // Fetch counter offers for this booking
                    $trip_id = $row['req_id'];
                    $offer_sql = "SELECT driver_id, counter_price FROM counter_offers WHERE trip_id = ?";
                    $offer_stmt = $conn->prepare($offer_sql);
                    $offer_stmt->bind_param("i", $trip_id);
                    $offer_stmt->execute();
                    $offers_result = $offer_stmt->get_result();

                    if ($offers_result->num_rows > 0) {
                        while ($offer = $offers_result->fetch_assoc()) {
                            // Fetch driver details
                            $driver_id = $offer['driver_id'];
                            $driver_sql = "SELECT name FROM driverdetails WHERE driver_id = ?";
                            $driver_stmt = $conn->prepare($driver_sql);
                            $driver_stmt->bind_param("i", $driver_id);
                            $driver_stmt->execute();
                            $driver_result = $driver_stmt->get_result();

                            if ($driver_result->num_rows > 0) {
                                $driver_info = $driver_result->fetch_assoc();
                                echo "Driver: " . htmlspecialchars($driver_info['name']) . " - Offer Price: " . htmlspecialchars($offer['counter_price']) . " 
                                <form method='POST' action='accept_offer.php' style='display:inline;'>
                                    <input type='hidden' name='trip_id' value='$trip_id'>
                                    <input type='hidden' name='driver_id' value='$driver_id'>
                                    <button type='submit' class='btn btn-success btn-sm'>Accept</button>
                                </form><br>";
                            }
                        }
                    } else {
                        echo "No counter offers available.";
                    }
                } else {
                    // If the status is "In Progress", fetch and display driver details
                    $driver_id = $row['driver_id'];
                    if ($driver_id != 0) {
                        $driver_sql = "SELECT name, phone FROM driverdetails WHERE driver_id = ?";
                        $driver_stmt = $conn->prepare($driver_sql);
                        $driver_stmt->bind_param("i", $driver_id);
                        $driver_stmt->execute();
                        $driver_result = $driver_stmt->get_result();

                        if ($driver_result->num_rows > 0) {
                            $driver_info = $driver_result->fetch_assoc();
                            echo "Driver: " . htmlspecialchars($driver_info['name']) . "<br>Contact: " . htmlspecialchars($driver_info['phone']);
                        } else {
                            echo "Driver details not found.";
                        }
                    } else {
                        echo "No driver allotted.";
                    }
                }

                echo "</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<h2 class='text-center'>No bookings found for the provided phone number.</h2>";
        }

        $conn->close();
        ?>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>