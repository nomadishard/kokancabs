<?php
session_start();
include '../db.php';
$phone = $_SESSION['phone'];
?>

<!doctype html>
<html lang="en">

<head>
    <title>My Bookings</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                        <hr>
                        <li class="nav-item"><a href="#" class="dropdown-item">My Bookings</a></li>
                        <hr>
                        <li class="nav-item"><a href="../logout.php" class="dropdown-item">LOGOUT</a></li>
                        <hr>
                        <li class="nav-item">Hello <?php echo strtoupper($_SESSION['name']) ?></li>
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
            while ($row = $result->fetch_assoc()) {
                $statusDisplay = ($row['status'] == 0) ? "Awaiting Driver" : (($row['status'] == 1) ? "In Progress" : "Completed");
                $trip_id = $row['req_id'];

                echo "<div class='card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['name']}</h5>
                            <p class='card-text'><strong>Phone:</strong> {$row['phone']}</p>
                            <p class='card-text'><strong>Origin:</strong> {$row['origin']}</p>
                            <p class='card-text'><strong>Destination:</strong> {$row['dest']}</p>
                            <p class='card-text'><strong>Timing:</strong> {$row['timing']}</p>
                            <p class='card-text'><strong>Status:</strong> $statusDisplay</p>
                            <p class='card-text'>";

                // Provide a link to view offers if the status is not "In Progress"
                if ($row['status'] != 1) {
                    echo "<a href='view_offers.php?trip_id=$trip_id' class='btn btn-primary'>View Offers</a>";
                } else {
                    echo "N/A"; // No offers to view if the trip is in progress
                }

                echo "</p><p class='card-text'>";

                // If the status is "In Progress", fetch and display driver details
                if ($row['status'] == 1) {
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
                } else {
                    echo "N/A"; // No driver details if the trip is not in progress
                }

                echo "</p></div></div>";
            }
        } else {
            echo "<h2 class='text-center'>No bookings found for the provided phone number.</h2>";
        }

        $conn->close();
        ?>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>