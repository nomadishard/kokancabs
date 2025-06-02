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

// Handle counter offer submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_offer'])) {
    $trip_id = $_POST['trip_id'];

    $counter_price = $_POST['counter_price']; // Get the counter price from the form

    // Insert the counter offer into the counter_offers table
    $insert_sql = "INSERT INTO counter_offers (trip_id, driver_id, counter_price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("iid", $trip_id, $driver_id, $counter_price);
    if ($stmt->execute()) {
        $_SESSION['alertMessage'] = 'Counter offer submitted successfully!';
        $_SESSION['alertType'] = 'success';
    } else {
        $_SESSION['alertMessage'] = 'Failed to submit counter offer. Please try again.';
        $_SESSION['alertType'] = 'danger';
    }

    // Redirect to the same page to refresh the trip list
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle trip acceptance at current offer price
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accept_trip'])) {
    $trip_id = $_POST['trip_id'];
    $driver_id = $_SESSION['driver_id'];

    // Update the trip status to accepted (assuming status = 1 means accepted)
    $update_sql = "UPDATE cabrequests SET `status` = 1, `driver_id` = ? WHERE req_id = ? LIMIT 1";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ii", $driver_id, $trip_id);

    if ($stmt->execute()) {
        $_SESSION['alertMessage'] = 'Trip accepted successfully!';
        $_SESSION['alertType'] = 'success';
    } else {
        $_SESSION['alertMessage'] = 'Failed to accept trip. Please try again.';
        $_SESSION['alertType'] = 'danger';
    }

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="../">KOKANCABS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trip Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../partner/mytrips/">My Trips</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500;">
                                <?php echo strtoupper($_SESSION['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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

            <?php if (isset($_SESSION['alertMessage'])): ?>
                <script>
                    alert("<?php echo $_SESSION['alertMessage']; ?>");
                </script>
                <?php unset($_SESSION['alertMessage']); ?>
            <?php endif; ?>

            <?php if ($result->num_rows > 0): ?>
                <div class="row">
                    <?php while ($trip = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Request ID: <?php echo $trip['req_id'] ?? 'N/A'; ?></h5>
                                    <p class="card-text"><strong>Name:</strong> <?php echo !empty($trip['name']) ? htmlspecialchars($trip['name']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Phone:</strong> <?php echo !empty($trip['phone']) ? htmlspecialchars($trip['phone']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Origin:</strong> <?php echo !empty($trip['origin']) ? htmlspecialchars($trip['origin']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Destination:</strong> <?php echo !empty($trip['dest']) ? htmlspecialchars($trip['dest']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Timing:</strong> <?php echo !empty($trip['timing']) ? date('Y-m-d H:i:s', strtotime($trip['timing'])) : 'N/A'; ?></p>

                                    <?php if ($trip['triptype'] !== 'ONEWAY' && $trip['triptype'] !== 'CP'): ?>
                                        <p class="card-text"><strong>Return Timing:</strong> <?php echo !empty($trip['returntiming']) ? date('Y-m-d H:i:s', strtotime($trip['returntiming'])) : 'N/A'; ?></p>
                                    <?php endif; ?>
                                    <p class="card-text"><strong>Car Type:</strong> <?php echo !empty($trip['cartype']) ? htmlspecialchars($trip['cartype']) : 'N/A'; ?></p>

                                    <p class="card-text"><strong>Passengers:</strong> <?php echo !empty($trip['passengers']) ? htmlspecialchars($trip['passengers']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Trip Type:</strong> <?php echo !empty($trip['triptype']) ? htmlspecialchars($trip['triptype']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Offer Price:</strong> <?php echo !empty($trip['offer_price']) ? htmlspecialchars($trip['offer_price']) : 'N/A'; ?></p>
                                    <p class="card-text"><strong>Status:</strong> <?php echo $trip['status'] == 1 ? 'Accepted' : 'Available'; ?></p>

                                    <form method="POST" action="" class="mb-2">
                                        <input type="hidden" name="trip_id" value="<?php echo $trip['req_id']; ?>">
                                        <input type="number" name="counter_price" placeholder="Enter Counter Price" required min="0" step="0.01" class="form-control mb-2">
                                        <button type="submit" name="submit_offer" class="btn btn-primary">Submit Offer</button>
                                    </form>

                                    <form method="POST" action="">
                                        <input type="hidden" name="trip_id" value="<?php echo $trip['req_id']; ?>">
                                        <button type="submit" name="accept_trip" class="btn btn-success">Accept at Offer Price</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
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