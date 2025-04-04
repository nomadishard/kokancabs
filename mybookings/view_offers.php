<?php
session_start();
include '../db.php';

// Check if the user is logged in
if (!isset($_SESSION['phone'])) {
    header("Location: ../partner/login/");
    exit();
}

// Check if trip_id is provided
if (!isset($_GET['trip_id'])) {
    header("Location: my_bookings.php");
    exit();
}

$trip_id = $_GET['trip_id'];

// Prepare the SQL query to fetch counter offers for the trip
$offer_sql = "SELECT driver_id, counter_price FROM counter_offers WHERE trip_id = ?";
$offer_stmt = $conn->prepare($offer_sql);
$offer_stmt->bind_param("i", $trip_id);
$offer_stmt->execute();
$offers_result = $offer_stmt->get_result();

// Prepare the SQL query to fetch trip details
$trip_sql = "SELECT name, phone, origin, dest, timing FROM cabrequests WHERE req_id = ?";
$trip_stmt = $conn->prepare($trip_sql);
$trip_stmt->bind_param("i", $trip_id);
$trip_stmt->execute();
$trip_result = $trip_stmt->get_result();
$trip_details = $trip_result->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <title>View Offers</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: solid;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../">KOKANCABS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <h1 class="text-center">Offers for Your Trip</h1>
        <h5 class="text-center">Trip Details:</h5>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($trip_details['name']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($trip_details['phone']); ?></p>
        <p><strong>Origin:</strong> <?php echo htmlspecialchars($trip_details['origin']); ?></p>
        <p><strong>Destination:</strong> <?php echo htmlspecialchars($trip_details['dest']); ?></p>
        <p><strong>Timing:</strong> <?php echo htmlspecialchars($trip_details['timing']); ?></p>

        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Offer Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($offers_result->num_rows > 0) {
                    while ($offer = $offers_result->fetch_assoc()) {
                        $driver_id = $offer['driver_id'];

                        // Fetch driver details
                        $driver_sql = "SELECT name FROM driverdetails WHERE driver_id = ?";
                        $driver_stmt = $conn->prepare($driver_sql);
                        $driver_stmt->bind_param("i", $driver_id);
                        $driver_stmt->execute();
                        $driver_result = $driver_stmt->get_result();

                        if ($driver_result->num_rows > 0) {
                            $driver_info = $driver_result->fetch_assoc();
                            echo "<tr>
                                <td>" . htmlspecialchars($driver_info['name']) . "</td>
                                <td>" . htmlspecialchars($offer['counter_price']) . "</td>
                                <td>
                                    <form method='POST' action='accept_offer.php' style='display:inline;'>
                                        <input type='hidden' name='trip_id' value='$trip_id'>
                                        <input type='hidden' name='driver_id' value='$driver_id'>
                                        <button type='submit' class='btn btn-success btn-sm'>Accept</button>
                                    </form>
                                </td>
                            </tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No offers available for this trip.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Back to My Bookings</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>