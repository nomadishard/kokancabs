<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO `userdetails`( `name`, `mobile`, `password`, `email`) VALUES ('$name','$phone','$pass','$email')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Your request has been received. You will be notified soon. Login to Check booking Status');
            window.location.href='user_login/';
        </script>";
    }
}



?>




<!doctype html>
<html lang="en">

<head>
    <title>Create Password</title>
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
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Password" required name="pass">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="validationCustom01" placeholder="Enter email" required name="email">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
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