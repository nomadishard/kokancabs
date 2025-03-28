<!doctype html>
<html lang="en">

<head>
    <title>Become a Partner</title>
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: solid;">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="dashboard.php"><img src="assets/logo2.webp" style="max-height: 15vh;"></a> -->
                <a class="navbar-brand" href="../../">KOKANCABS</a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                        </li>
                    </ul> -->
                <!-- </div> -->
            </div>
        </nav>
    </header>
    <main>
        <section class="sec1 pt-5">
            <div class="row">
                <div class="col-12 col-lg-3 ms-auto me-auto booking-form">
                    <form action="addtodb.php" method="post" id="registrationForm" enctype="multipart/form-data">

                        <!-- Personal Details Section -->
                        <div id="personalDetails">
                            <h2 style="text-align: center;">Personal Details</h2>
                            <div class="input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <input type="text" placeholder="Name" name="name" required>
                            </div>

                            <div class="input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                <input type="tel" placeholder="Mobile number" name="phone" maxlength="10" pattern="[0-9]{10}" required>
                            </div>
                            <div class="input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <input type="email" placeholder="Email" name="email" required>
                            </div>

                            <div class="password-container input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                                    <path d="M7 6a1 1 0 0 1 2 0v1H7z" />
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0" />
                                </svg>
                                <input type="password" id="password" placeholder="Enter password" required name="pass">
                                <span class="show-password" id="togglePassword">Show</span>
                            </div>

                            <script>
                                const togglePassword = document.getElementById('togglePassword');
                                const passwordField = document.getElementById('password');

                                togglePassword.addEventListener('click', function() {
                                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordField.setAttribute('type', type);
                                    togglePassword.textContent = type === 'password' ? 'Show' : 'Hide';
                                });
                            </script>


                            <div class="input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>
                                <input type="text" placeholder="Aadhar number" name="aadhar" pattern="[0-9]{12}" required>
                            </div>

                            <div class="input-container ms-auto me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>
                                <input type="text" placeholder="Driving license No." name="driving_license" required>
                            </div>

                            <div class="container">
                                <label for="drivingLicensePhoto">Upload Driving License Photo:</label>
                                <input type="file" id="drivingLicensePhoto" name="drivingLicensePhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>
                            <a href="../login/">Already a user?</a>
                            <button type="button" onclick="showCarDetails()">Next</button>
                        </div>


                        <!-- Car Details Section -->
                        <div id="carDetails" style="display: none;">
                            <div class="container">
                                <label for="vcno">Vehicle Number:</label>
                                <input type="text" id="vcno" name="vcno" required>
                            </div>
                            <div class="container">
                                <label for="RCPhoto">Upload Vehicle RC Photo:</label>
                                <input type="file" id="RCPhoto" name="RCPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview2" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>

                            <div class="container">
                                <label for="FitPhoto">Upload Vehicle Fitness:</label>
                                <input type="file" id="FitPhoto" name="FitPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview3" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>

                            <div class="container">
                                <label for="permitPhoto">Upload Vehicle Permit:</label>
                                <input type="file" id="permitPhoto" name="permitPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview4" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>

                            <div class="container">
                                <label for="insPhoto">Upload Vehicle Insurance:</label>
                                <input type="file" id="insPhoto" name="insPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview5" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>

                            <div class="container">
                                <label for="taxPhoto">Upload Vehicle Tax:</label>
                                <input type="file" id="taxPhoto" name="taxPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview6" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>

                            <div class="container">
                                <label for="authPhoto">Upload Vehicle Authorization:</label>
                                <input type="file" id="authPhoto" name="authPhoto" accept="image/*" required>
                                <div id="preview-container">
                                    <img id="preview7" style="max-width: 100%; max-height: 200px; display: none;">
                                </div>
                            </div>


                            <div
                                class="row justify-content-center align-items-center g-2">
                                <div class="col"><button type="button" onclick="showPersonalDetails()">Back</button></div>
                                <div class="col"><button type="submit">Register</button></div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <script>
                function showCarDetails() {
                    document.getElementById('personalDetails').style.display = 'none';
                    document.getElementById('carDetails').style.display = 'block';
                }

                function showPersonalDetails() {
                    document.getElementById('carDetails').style.display = 'none';
                    document.getElementById('personalDetails').style.display = 'block';
                }
            </script>

        </section>
        <!-- <script>
            document.getElementById('drivingLicensePhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview').setAttribute('src', e.target.result);
                        document.getElementById('preview').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('RCPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview2').setAttribute('src', e.target.result);
                        document.getElementById('preview2').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('FitPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview3').setAttribute('src', e.target.result);
                        document.getElementById('preview3').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('permitPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview4').setAttribute('src', e.target.result);
                        document.getElementById('preview4').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('insPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview5').setAttribute('src', e.target.result);
                        document.getElementById('preview5').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('taxPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview6').setAttribute('src', e.target.result);
                        document.getElementById('preview6').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
        <script>
            document.getElementById('authPhoto').addEventListener('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview7').setAttribute('src', e.target.result);
                        document.getElementById('preview7').style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script> -->
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