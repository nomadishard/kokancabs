<?php
// Database connection
include '../db.php';
// Check connection
// Fetch driver details
$sql = "SELECT d.driver_id, d.name, d.phone, d.aadhar, d.driving_license, d.driving_license_photo, 
               GROUP_CONCAT(v.rc_photo, '|', v.fitness_photo, '|', v.permit_photo, '|', v.insurance_photo, '|', v.tax_photo, '|', v.authorization_photo) AS vehicle_photos
        FROM driverdetails d
        LEFT JOIN vehicledetails v ON d.driver_id = v.driver_id
        GROUP BY d.driver_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Aadhar</th>
                    <th>Driving License</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['driver_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['aadhar'] . "</td>";
                        echo "<td>" . $row['driving_license'] . "</td>";
                        echo "<td><a href='view_driver.php?id=" . $row['driver_id'] . "'>View Details</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No drivers found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$conn->close();
?>