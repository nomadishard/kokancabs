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
    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        }

        header .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        main .container {
            margin-top: 60px;
            max-width: 480px;
            background: #fff;
            padding: 32px 28px 24px 28px;
            border-radius: 18px;
            box-shadow: 0 4px 32px rgba(0, 0, 0, 0.07);
        }

        .form-label {
            font-weight: 600;
            color: #1a202c;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 14px;
            border: 1.5px solid #cbd5e1;
            font-size: 1rem;
            background: #f8fafc;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #2563eb22;
            background: #fff;
        }

        .btn-primary {
            background: #2563eb;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 10px 30px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        @media (max-width: 600px) {
            main .container {
                padding: 16px 8px;
                margin-top: 24px;
            }
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background: #fff;
            border-top: 1.5px solid #e2e8f0;
            box-shadow: 0 -2px 12px rgba(0, 0, 0, 0.03);
            font-size: 1rem;
            color: #64748b;
            z-index: 1030;
        }

        .footer .container {
            padding: 10px 0;
        }

        .footer a {
            color: #2563eb;
            font-weight: 500;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .footer {
                font-size: 0.95rem;
                padding: 8px 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <!-- Logo (uncomment if needed) -->
                <!-- <a class="navbar-brand" href="dashboard.php">
        <img src="assets/logo2.webp" alt="Logo" style="max-height: 15vh;">
      </a> -->
                <a class="navbar-brand" href="../">KOKANCABS</a>
            </div>
        </nav>
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
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <footer class="footer mt-auto py-3 bg-white border-top">
        <div class="container text-center">
            <span class="text-muted">
                &copy; <?php echo date('Y'); ?> KOKANCABS. All rights reserved.
            </span>
            <br>
            <a href="mailto:support@kokancabs.com" class="text-decoration-none text-primary">Contact Support</a>
        </div>
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