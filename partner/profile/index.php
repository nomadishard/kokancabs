<?php
session_start(); // Start the session

// Database connection
include '../../db.php';

// Check if user is logged in
if (!isset($_SESSION['driver_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch driver details
$driver_id = $_SESSION['driver_id'];
$sql = "SELECT * FROM driverdetails WHERE driver_id = '$driver_id'";
$result = $conn->query($sql);
$driver = $result->fetch_assoc();

// Fetch current vehicles
$sql_vehicles = "SELECT * FROM vehicledetails WHERE driver_id = '$driver_id'";
$vehicles_result = $conn->query($sql_vehicles);

// Handle vehicle addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_vehicle'])) {
    // Vehicle details
    $rc_photo = $_FILES['RCPhoto']['name'];
    $fitness_photo = $_FILES['FitPhoto']['name'];
    $permit_photo = $_FILES['permitPhoto']['name'];
    $insurance_photo = $_FILES['insPhoto']['name'];
    $tax_photo = $_FILES['taxPhoto']['name'];
    $authorization_photo = $_FILES['authPhoto']['name'];

    // Generate unique filenames
    function generateUniqueFileName($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return uniqid() . '.' . $extension; // Generate a unique ID and append the file extension
    }

    // Move uploaded files
    move_uploaded_file($_FILES['RCPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($rc_photo));
    move_uploaded_file($_FILES['FitPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($fitness_photo));
    move_uploaded_file($_FILES['permitPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($permit_photo));
    move_uploaded_file($_FILES['insPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($insurance_photo));
    move_uploaded_file($_FILES['taxPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($tax_photo));
    move_uploaded_file($_FILES['authPhoto']['tmp_name'], "../Register_as_partner/uploads/" . generateUniqueFileName($authorization_photo));

    // Insert vehicle details into the database
    $sql_vehicle = "INSERT INTO vehicledetails (driver_id, rc_photo, fitness_photo, permit_photo, insurance_photo, tax_photo, authorization_photo) 
                    VALUES ('$driver_id', '$rc_photo', '$fitness_photo', '$permit_photo', '$insurance_photo', '$tax_photo', '$authorization_photo')";

    if ($conn->query($sql_vehicle) === TRUE) {
        echo "Vehicle added successfully!";
        // Refresh the page to show the new vehicle
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $sql_vehicle . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->

    <!-- Bootstrap CSS v5.3.2 -->
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../trip/">Trip Requests</a>
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
                                <li><a href="../edit/" class="dropdown-item">Edit Profile</a></li>
                                <li><a href="../deletedata.php" class="dropdown-item">Delete Profile</a></li>
                                <li><a href="../logout.php" class="dropdown-item">LOGOUT</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <h1>Your Profile</h1>
        <h2><?php echo $driver['name']; ?></h2>
        <p><strong>Phone:</strong> <?php echo $driver['phone']; ?></p>
        <p><strong>Aadhar:</strong> <?php echo $driver['aadhar']; ?></p>
        <p><strong>Driving License:</strong> <?php echo $driver['driving_license']; ?></p>
        <p><strong>Driving License Photo:</strong></p>
        <img src="../Register_as_partner/uploads/<?php echo $driver['driving_license_photo']; ?>" alt="Driving License Photo" class="img-fluid" style="max-width: 200px;">

        <h3>Current Vehicles</h3>
        <?php if ($vehicles_result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>RC Photo</th>
                            <th>Fitness Photo</th>
                            <th>Permit Photo</th>
                            <th>Insurance Photo</th>
                            <th>Tax Photo</th>
                            <th>Authorization Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($vehicle = $vehicles_result->fetch_assoc()): ?>
                            <tr>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['rc_photo']; ?>" alt="RC Photo" class="img-fluid" style="max-width: 100px;"></td>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['fitness_photo']; ?>" alt="Fitness Photo" class="img-fluid" style="max-width: 100px;"></td>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['permit_photo']; ?>" alt="Permit Photo" class="img-fluid" style="max-width: 100px;"></td>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['insurance_photo']; ?>" alt="Insurance Photo" class="img-fluid" style="max-width: 100px;"></td>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['tax_photo']; ?>" alt="Tax Photo" class="img-fluid" style="max-width: 100px;"></td>
                                <td><img src="../Register_as_partner/uploads/<?php echo $vehicle['authorization_photo']; ?>" alt="Authorization Photo" class="img-fluid" style="max-width: 100px;"></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No vehicles added yet.</p>
        <?php endif; ?>

        <h3>Add Vehicle</h3>
        <button id="addVehicleButton" class="btn btn-primary">Add Vehicle</button>

        <div id="vehicleForm" style="display: none;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="RCPhoto" class="form-label">Upload Vehicle RC Photo:</label>
                    <input type="file" id="RCPhoto" name="RCPhoto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="FitPhoto" class="form-label">Upload Vehicle Fitness:</label>
                    <input type="file" id="FitPhoto" name="FitPhoto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="permitPhoto" class="form-label">Upload Vehicle Permit:</label>
                    <input type="file" id="permitPhoto" name="permitPhoto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="insPhoto" class="form-label">Upload Vehicle Insurance:</label>
                    <input type="file" id="insPhoto" name="insPhoto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="taxPhoto" class="form-label">Upload Vehicle Tax:</label>
                    <input type="file" id="taxPhoto" name="taxPhoto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="authPhoto" class="form-label">Upload Vehicle Authorization:</label>
                    <input type="file" id="authPhoto" name="authPhoto" accept="image/*" class="form-control" required>
                </div>
                <button type="submit" name="add_vehicle" class="btn btn-success">Submit Vehicle</button>
            </form>
        </div>

        <script>
            document.getElementById('addVehicleButton').addEventListener('click', function() {
                var form = document.getElementById('vehicleForm');
                if (form.style.display === "none") {
                    form.style.display = "block"; // Show the form
                    this.textContent = "Hide Vehicle Form"; // Change button text
                } else {
                    form.style.display = "none"; // Hide the form
                    this.textContent = "Add Vehicle"; // Reset button text
                }
            });
        </script>

    </div>
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

<?php
$conn->close();
?>