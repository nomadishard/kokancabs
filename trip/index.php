<?php

session_start();
if (!isset($_SESSION['driver_id'])) {
    header("Location: ../partner/login/");
    exit();
}

include '../db.php';

// Fetch available trips
$sql = "SELECT * FROM cabrequests WHERE status = 0"; // Assuming status = 0 means available trips
$result = $conn->query($sql);

// Handle trip acceptance
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept_trip'])) {
    $trip_id = $_POST['trip_id'];
    $driver_id = $_SESSION['driver_id'];

    // Update the trip status to accepted (assuming status = 1 means accepted)
    $update_sql = "UPDATE cabrequests SET status = 1, driver_id = ? WHERE req_id = ? AND status = 0 LIMIT 1";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ii", $driver_id, $trip_id);
    $stmt->execute();

    // Redirect to the same page to refresh the trip list
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Trips</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <script>
        // Automatically refresh the page every 10 seconds
        setInterval(function() {
            window.location.reload();
        }, 10000);
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: solid;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../">KOKANCABS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trip Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500;">
                                <?php echo strtoupper($_SESSION['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a href="../edit/" class="dropdown-item">Edit Profile</a></li> -->
                                <li><a href="../partner/mytrips/" class="dropdown-item">My Trips</a></li>
                                <li><a href="../logout.php" class="dropdown-item">LOGOUT</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            <h1>Available Trips</h1>
            <?php if ($result->num_rows > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Timing</th>
                                <th>Return Timing</th>
                                <th>Passengers</th>
                                <th>Car Type</th>
                                <th>Trip Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($trip = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $trip['req_id'] ?? 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['name']) ? htmlspecialchars($trip['name']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['phone']) ? htmlspecialchars($trip['phone']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['origin']) ? htmlspecialchars($trip['origin']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['dest']) ? htmlspecialchars($trip['dest']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['timing']) ? date('Y-m-d H:i:s', strtotime($trip['timing'])) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['returntiming']) ? date('Y-m-d H:i:s', strtotime($trip['returntiming'])) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['passengers']) ? htmlspecialchars($trip['passengers']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['cartype']) ? htmlspecialchars($trip['cartype']) : 'N/A'; ?></td>
                                    <td><?php echo !empty($trip['triptype']) ? htmlspecialchars($trip['triptype']) : 'N/A'; ?></td>
                                    <td><?php echo $trip['status'] == 1 ? 'Accepted' : 'Available'; ?></td>
                                    <td>
                                        <form method="POST" action="">
                                            <input type="hidden" name="trip_id" value="<?php echo $trip['req_id']; ?>">
                                            <button type="submit" name="accept_trip" class="btn btn-primary" <?php echo $trip['status'] == 1 ? 'disabled' : ''; ?>>Accept</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No available trips at the moment.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>