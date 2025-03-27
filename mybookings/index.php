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
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
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
                    <!-- <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trip Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                        </li>
                    </ul> -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500;">
                                <?php echo strtoupper($_SESSION['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a href="../edit/" class="dropdown-item">Edit Profile</a></li> -->
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
        // Prepare the SQL query
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
                    <th>Return Timing</th>
                    <th>Passengers</th>
                    <th>Car Type</th>
                    <th>Trip Type</th>
                    <th>Status</th>
                    <th>Driver Name</th>
                    <th>Driver Contact</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                $driverDisplay = ($row['driver_id'] == 0) ? "No driver allotted" : $row['driver_id'];
                switch ($row['status']) {
                    case 0:
                        $statusDisplay = "Awaiting Driver";
                        break;
                    case 1:
                        $statusDisplay = "In Progress";
                        break;
                    case 2:
                        $statusDisplay = "Completed";
                        break;
                    default:
                        $statusDisplay = "Unknown Status"; // Fallback for unexpected values
                }
                echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['origin']}</td>
            <td>{$row['dest']}</td>
            <td>{$row['timing']}</td>
            <td>{$row['returntiming']}</td>
            <td>{$row['passengers']}</td>
            <td>{$row['cartype']}</td>
            <td>{$row['triptype']}</td>
            <td>$statusDisplay</td>
            <td>";

                if ($row['driver_id'] == 0) {
                    // Display text if no driver is allotted
                    echo "<span>No driver allotted</span>";
                } else {
                    // Fetch driver details
                    $did = $row['driver_id'];
                    $sql2 = "SELECT name, phone FROM driverdetails WHERE driver_id = $did";
                    $res = $conn->query($sql2);

                    if ($res && $res->num_rows > 0) {
                        $row2 = $res->fetch_assoc();
                        echo $row2['name']; // Display driver's name
                    } else {
                        echo "Driver details not found"; // Fallback if driver details are not found
                    }
                }

                echo "</td>";

                // Display driver's contact information
                if ($row['driver_id'] == 0) {
                    echo "<td>N/A</td>"; // No contact if no driver is allotted
                } else {
                    // Fetch driver contact
                    if (isset($row2)) {
                        echo "<td>{$row2['phone']}</td>"; // Display driver's phone
                    } else {
                        echo "<td>N/A</td>"; // Fallback if driver details are not found
                    }
                }

                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<h2 class='text-center'>No bookings found for the provided phone number.</h2>";
        }

        $conn->close();
        ?>
    </main>
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