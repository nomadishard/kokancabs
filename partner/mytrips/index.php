<?php

session_start();
if (!isset($_SESSION['driver_id'])) {
    header("Location: login.php");
    exit();
}

include '../../db.php';
$driver_id = $_SESSION['driver_id'];

$sql = "select * from cabrequests where driver_id= ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $driver_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!doctype html>
<html lang="en">

<head>
    <title>My trips</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../trip/">Trip Requests</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500;">
                                <?php echo strtoupper($_SESSION['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a href="../edit/" class="dropdown-item">Edit Profile</a></li> -->
                                <li><a href="#" class="dropdown-item">My Trips</a></li>
                                <li><a href="../../logout.php" class="dropdown-item">LOGOUT</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-4">
            <h1>Your Assigned Trips</h1>
            <?php if ($result->num_rows > 0): ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php while ($trip = $result->fetch_assoc()): ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">
                                        Trip to <?php echo !empty($trip['dest']) ? htmlspecialchars($trip['dest']) : 'N/A'; ?>
                                    </h5>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item"><strong>Request ID:</strong> <?php echo $trip['req_id'] ?? 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Name:</strong> <?php echo !empty($trip['name']) ? htmlspecialchars($trip['name']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Phone:</strong> <?php echo !empty($trip['phone']) ? htmlspecialchars($trip['phone']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Origin:</strong> <?php echo !empty($trip['origin']) ? htmlspecialchars($trip['origin']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Destination:</strong> <?php echo !empty($trip['dest']) ? htmlspecialchars($trip['dest']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Timing:</strong> <?php echo !empty($trip['timing']) ? date('Y-m-d H:i:s', strtotime($trip['timing'])) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Return Timing:</strong> <?php echo !empty($trip['returntiming']) ? date('Y-m-d H:i:s', strtotime($trip['returntiming'])) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Passengers:</strong> <?php echo !empty($trip['passengers']) ? htmlspecialchars($trip['passengers']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Car Type:</strong> <?php echo !empty($trip['cartype']) ? htmlspecialchars($trip['cartype']) : 'N/A'; ?></li>
                                        <li class="list-group-item"><strong>Trip Type:</strong> <?php echo !empty($trip['triptype']) ? htmlspecialchars($trip['triptype']) : 'N/A'; ?></li>
                                    </ul>
                                </div>
                                <div class="card-footer text-end">
                                    <span class="badge <?php echo $trip['status'] == 1 ? 'bg-success' : 'bg-secondary'; ?>">
                                        <?php echo $trip['status'] == 1 ? 'Accepted' : 'Available'; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>You have no assigned trips at the moment.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>