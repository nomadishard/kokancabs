<?php
// Database connection
include '../db.php';

// Get driver ID from URL
$driver_id = $_GET['id'];

// Fetch driver details
$sql = "SELECT d.*, 
               GROUP_CONCAT(v.rc_photo, '|', v.fitness_photo, '|', v.permit_photo, '|', v.insurance_photo, '|', v.tax_photo, '|', v.authorization_photo) AS vehicle_photos
        FROM driverdetails d
        LEFT JOIN vehicledetails v ON d.driver_id = v.driver_id
        WHERE d.driver_id = $driver_id
        GROUP BY d.driver_id";

$result = $conn->query($sql);
$driver = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="container">
        <h1>Driver Details</h1>
        <h2><?php echo $driver['name']; ?></h2>
        <p><strong>Phone:</strong> <?php echo $driver['phone']; ?></p>
        <p><strong>Aadhar:</strong> <?php echo $driver['aadhar']; ?></p>
        <p><strong>Driving License:</strong> <?php echo $driver['driving_license']; ?></p>
        <p><strong>Driving License Photo:</strong></p>
        <img src="../partner/Register_as_partner/uploads/<?php echo $driver['driving_license_photo']; ?>" alt="Driving License Photo" style="max-width: 200px;">

        <h3>Vehicle Details</h3>
        <?php
        if (!empty($driver['vehicle_photos'])) {
            $vehicle_photos = explode('|', $driver['vehicle_photos']);
            foreach ($vehicle_photos as $photo) {
                echo "<img src='../partner/Register_as_partner/uploads/$photo' alt='Vehicle Photo' style='max-width: 200px;'>";
            }
        } else {
            echo "<p>No vehicles associated with this driver.</p>";
        }
        ?>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>

</html>

<?php
$conn->close();
?>