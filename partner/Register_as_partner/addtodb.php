<?php
include '../../db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal details
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hashing password
    $aadhar = $_POST['aadhar'];
    $driving_license = $_POST['driving_license'];
    $vc = $_POST['vcno'];

    // Check if user with the same phone number already exists
    $checkPhoneQuery = "SELECT * FROM driverdetails WHERE phone = '$phone'";
    $result = $conn->query($checkPhoneQuery);

    if ($result->num_rows > 0) {
        // Phone number already exists
        echo "<script>alert('A user with this phone number already exists. Please use a different phone number.');
        window.history.back();</script>";
    } else {
        // Function to generate a unique filename
        function generateUniqueFileName($fileName)
        {
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $uniqueName = uniqid() . '.' . $extension; // Generate a unique ID and append the file extension
            return $uniqueName;
        }

        // File uploads
        $driving_license_photo = generateUniqueFileName($_FILES['drivingLicensePhoto']['name']);
        move_uploaded_file($_FILES['drivingLicensePhoto']['tmp_name'], "uploads/" . $driving_license_photo);

        // Insert driver details
        $sql = "INSERT INTO driverdetails (name, phone, email, password, aadhar, driving_license, driving_license_photo) 
                VALUES ('$name', '$phone', '$email', '$password', '$aadhar', '$driving_license', '$driving_license_photo')";

        if ($conn->query($sql) === TRUE) {
            $driver_id = $conn->insert_id; // Get the last inserted driver ID

            // Vehicle details
            $rc_photo = generateUniqueFileName($_FILES['RCPhoto']['name']);
            move_uploaded_file($_FILES['RCPhoto']['tmp_name'], "uploads/" . $rc_photo);

            $fitness_photo = generateUniqueFileName($_FILES['FitPhoto']['name']);
            move_uploaded_file($_FILES['FitPhoto']['tmp_name'], "uploads/" . $fitness_photo);

            $permit_photo = generateUniqueFileName($_FILES['permitPhoto']['name']);
            move_uploaded_file($_FILES['permitPhoto']['tmp_name'], "uploads/" . $permit_photo);

            $insurance_photo = generateUniqueFileName($_FILES['insPhoto']['name']);
            move_uploaded_file($_FILES['insPhoto']['tmp_name'], "uploads/" . $insurance_photo);

            $tax_photo = generateUniqueFileName($_FILES['taxPhoto']['name']);
            move_uploaded_file($_FILES['taxPhoto']['tmp_name'], "uploads/" . $tax_photo);

            $authorization_photo = generateUniqueFileName($_FILES['authPhoto']['name']);
            move_uploaded_file($_FILES['authPhoto']['tmp_name'], "uploads/" . $authorization_photo);

            // Insert vehicle details
            $sql_vehicle = "INSERT INTO vehicledetails (vehicle_no, driver_id, rc_photo, fitness_photo, permit_photo, insurance_photo, tax_photo, authorization_photo) 
                            VALUES ('$vc', '$driver_id', '$rc_photo', '$fitness_photo', '$permit_photo', '$insurance_photo', '$tax_photo', '$authorization_photo')";

            if ($conn->query($sql_vehicle) === TRUE) {
                echo "<script>alert('Registration successful!');

                // Redirect to another page (e.g., a welcome page)
                window.location.href = '../login/';</script>";
            } else {
                echo "Error: " . $sql_vehicle . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
