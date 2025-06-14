<!doctype html>
<html lang="en">

<head>
  <title>Kokan Cabs - HOME </title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <meta property="og:title" content="Kokan Cabs - Making Travel Easier">
  <meta property="og:description" content="The platform dedicated to make your travel bookings easier">
  <meta property="og:image" content="assets/logo2.webp">
  <link rel="icon" href="assets/logo2.webp" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- <link rel="stylesheet" href="style.css"> -->
  <style>
    .select-container {
      display: flex;
      /* Use flexbox to align items */
      align-items: center;
      /* Vertically align items in the center */
      border-bottom: 1px solid;
      /* Add a border */
      border-radius: 5px;
      overflow: hidden;
      /* Hide any overflowing content */
      /* Adjust width as needed */
      width: 100%;
      margin-bottom: 5px;
    }

    .car-icon {
      margin-right: 10px;
      /* Add spacing between the icon and the select */
      margin-left: 5px;
      color: #555;
      /* Adjust icon color */
    }

    input[type="datetime-local"] {
      width: 100%;
      /* Adjust width as needed */
      padding: 8px;
      /* Add padding for better spacing */
      font-size: 14px;
      /* Adjust font size */
      border: 1px solid #ccc;
      /* Default border */
      border-radius: 5px;
      /* Rounded corners */
      box-sizing: border-box;
      /* Ensure padding is included in width */
    }

    input[type="datetime-local"]:focus {
      outline: none;
      /* Remove default focus outline */
      border-color: #aaa;
      /* Change border color on focus */
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      /* Add a subtle shadow on focus */
    }


    .cab-type-select {
      padding: 8px;
      border: none;
      /* Remove default border */
      outline: none;
      /* Remove focus outline */
      background-color: transparent;
      /* Make background transparent */
      width: 100%;
      /* Take up remaining width */
      font-size: 14px;
      color: #333;
    }




    .booking-form {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    .trip-type {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .rcb {
      background-color: green;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      width: 100%;
    }

    .rcb:hover {
      background-color: rgb(6, 139, 6);
    }

    .sec1 {
      background-image: url('assets/bg1.png');
      background-repeat: no-repeat;
      /* Prevents the image from repeating */
      background-size: cover;
      /* Ensures the image covers the entire section */
      /* Sets the height of the section to the full viewport height */
      padding-bottom: 30px;

    }

    .sec3 {
      background-image: url('assets/bg3.png');
      background-repeat: no-repeat;
      background-size: cover;
      font-size: 3vh;
      overflow: hidden;
      /* Prevents text from overflowing */
    }

    .input-container {
      position: relative;
      /* Important: Creates a positioning context for absolute positioning */
      width: 200px;
      /* Adjust as needed */
    }

    .input-container svg {
      position: absolute;
      top: 50%;
      left: 5px;
      /* Adjust for spacing */
      transform: translateY(-50%);
      /* Vertically center the icon */
      pointer-events: none;
      /* Makes the icon non-interactive */
      opacity: 0.5;
      /* Adjust icon color (optional) */
    }

    .input-container input {
      padding-left: 30px;
      /* Adjust to make space for the icon */
      width: 100%;
      box-sizing: border-box;
      /* Ensures padding doesn't affect overall width */
      border: none;
      border-bottom: solid;
    }

    .sec4 {
      font-family: Arial, sans-serif;
      font-size: 18px;
      color: #333;
      text-align: center;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    /* Custom styling for the image */
    @media (min-width: 768px) {

      /* For tablets and larger screens */
      .custom-image {
        max-height: 40vh;
        /* Adjust height for larger screens */
      }
    }

    @media (min-width: 992px) {

      /* For desktops */
      .custom-image {
        max-height: 30vh;
        /* Further reduce height for desktops */
      }
    }

    .sec4 {
      background-color: #f8f9fa;
      /* Light background color */
      padding: 40px 20px;
      /* Padding around the section */
      border-radius: 8px;
      /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Subtle shadow */
    }

    .custom-image {
      max-width: 100%;
      /* Ensure the image is responsive */
      height: auto;
      /* Maintain aspect ratio */
      border-radius: 8px;
      /* Rounded corners for the image */
    }

    .btn-primary {
      background-color: #007bff;
      /* Primary button color */
      color: white;
      /* Text color */
      padding: 10px 20px;
      /* Padding for the button */
      border: none;
      /* Remove border */
      border-radius: 5px;
      /* Rounded corners for the button */
      text-decoration: none;
      /* Remove underline */
      transition: background-color 0.3s;
      /* Smooth transition for hover effect */
    }

    .btn-primary:hover {
      background-color: #0056b3;
      /* Darker shade on hover */
    }

    @media (max-width: 576px) {
      .col-sm-6 {
        margin-bottom: 20px;
        /* Space below the image on small screens */
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
        <a class="navbar-brand" href="#">KOKANCABS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="user_login/" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="sec1">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-2">
          <div class="col-sm-3 d-none d-sm-block" style="font-size: 6vh;">Journey Through Konkan and Beyond with Comfort and Ease</div>
          <div class="col-sm-4">
            <div class="booking-form mt-5">
              <h2>Book a Cab Now!</h2>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="one-tab" style="color: black;" data-bs-toggle="tab"
                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                    aria-selected="true">One Way</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="round-tab" data-bs-toggle="tab" style="color: black;"
                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">Round Trip</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pool-tab" data-bs-toggle="tab" style="color: black;"
                    data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                    aria-selected="false">Car Pooling</button>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="one-tab">
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <form action="addtrip.php" method="POST">
                          <input type="hidden" name="triptype" value="oneway">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path
                              d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                          </svg>
                          <input type="text" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-telephone-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <input type="tel" placeholder="Contact Number" name="phone">
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Pickup Location" name="loc1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Dropoff Location" name="loc2">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="select-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-car-front-fill car-icon" viewBox="0 0 16 16">
                          <path
                            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>
                        <select required class="cab-type-select" name="cartype">
                          <option value="" disabled selected>Cab Type</option>
                          <option value="hatchback">Hatchback (Capacity - 4)</option>
                          <option value="suv">SUV (Capacity - 6)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div
                    class="row justify-content-center align-items-center g-2">
                    <div class="col"><label for="dropoff-date-input">Date and Time:</label>
                      <input type="datetime-local" id="dropoff-date-input" required name="datetime">
                    </div>
                  </div>

                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <input type="number" placeholder="Offer Price" name="offer_price" min="0">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="rcb">Request Cab</button>
                  </form>
                </div>




                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="round-tab">
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <form action="addtrip.php" method="post">
                          <input type="hidden" name="triptype" value="return">
                          <input type="text" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-telephone-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <input type="tel" placeholder="Contact Number" name="phone">
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Pickup Location" name="loc1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Dropoff Location" name="loc2">
                      </div>
                    </div>
                  </div>


                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="select-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-car-front-fill car-icon" viewBox="0 0 16 16">
                          <path
                            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>
                        <select required class="cab-type-select" name="cartype">
                          <option value="" disabled selected>Cab Type</option>
                          <option value="hatchback">Hatchback (Capacity - 4)</option>
                          <option value="suv">SUV (Capacity - 6)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center align-items-center g-2">

                    <div class="col">
                      <label for="pickup-date-input">Pickup Date:</label>
                      <input type="datetime-local" id="pickup-date-input" required name="datetime">
                    </div>
                    <div class="col">
                      <label for="dropoff-date-input">Return Date:</label>
                      <input type="datetime-local" id="dropoff-date-input" required name="datetime2">
                    </div>


                  </div>
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <input type="number" placeholder="Offer Price" name="offer_price" min="0">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="rcb">Request Cab</button>
                  </form>
                </div>





                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="pool-tab">
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <form action="addtrip.php" method="post">
                          <input type="hidden" name="triptype" value="CP">
                          <input type="text" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-telephone-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <input type="tel" placeholder="Contact Number" name="phone">
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Pickup Location" name="loc1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" placeholder="Dropoff Location" name="loc2">
                      </div>
                    </div>
                  </div>
                  <div
                    class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <input type="number" placeholder="No of Passenger(s)" name="pax">
                      </div>
                    </div>
                    <div class="col">
                      <div class="col">
                        <label for="dropoff-date-input">Date and Time:</label>
                        <input type="datetime-local" id="dropoff-date-input" required name="datetime">

                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                      <div class="input-container">
                        <input type="number" placeholder="Offer Price" name="offer_price" min="0">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="rcb">Request Cab</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sec2" style="background-color: #e6ffb8;">
      <div
        class="row justify-content-center align-items-center g-2">
        <div class="col-sm-7 ">
          <div class="text-center"><span style="font-weight: bold;">BOOK A CAB ANYTIME , ANYWHERE</span></div>

          <span>Choose from a range of well-maintained vehicles with experienced drivers for a safe and comfortable journey. Enjoy transparent pricing, multiple payment options, and 24/7 customer support. Whether for local travel, outstation trips, or Kokan sightseeing, Kokan Cabs ensures a seamless ride.</span>
        </div>

        <div class="col"><img src="assets/car.png" alt="Car" class="img-fluid"></div>
      </div>

    </section>
    <section class="sec3">
      <div class="d-flex flex-column flex-md-row justify-content-around align-items-center h-100 text-center text-black p-4">
        <div class="d-flex flex-column align-items-center p-4 content align-self-start">
          <i class="fas fa-map-marker-alt fa-3x mb-4"></i>
          <h2 class="h4 font-weight-bold mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>Seamless Experience</h2>
          <p class="max-w-xs">Easily book, modify, or cancel rides with a hassle-free process and customer support.</p>
        </div>
        <div class="d-flex flex-column align-items-center p-4 content align-self-end">
          <i class="fas fa-map-marker-alt fa-3x mb-4"></i>
          <h2 class="h4 font-weight-bold mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>Safer</h2>
          <p class="max-w-xs">Travel with verified drivers, GPS tracking, and well-maintained vehicles for a secure and comfortable journey.</p>
        </div>
        <div class="d-flex flex-column align-items-center p-4 content align-self-start">
          <i class="fas fa-map-marker-alt fa-3x mb-4"></i>
          <h2 class="h4 font-weight-bold mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>No Hidden Charges</h2>
          <p class="max-w-xs">Get upfront fare estimates with transparent pricing and no unexpected costs.</p>
        </div>
      </div>
    </section>

    <section class="sec4">
      <div
        class="row justify-content-center align-items-center g-2">
        <div class="col-sm-6">
          <img src="assets/driver.png" alt="Driver Image" class="img-fluid custom-image">
        </div>


        <div class=" col">Become a Partner and start earning <a
            name=""
            id=""
            class="btn btn-primary"
            href="partner/Register_as_partner/"
            role="button">Register Now</a>
        </div>
      </div>



    </section>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <script>
    // Function to set the minimum date for datetime-local input
    function setMinDate() {
      const now = new Date();
      let now_utc = Date.UTC(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),
        now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds())
      const minDateTime = new Date(now_utc).toISOString().slice(0, 16); // Format: YYYY-MM-DDTHH:MM
      console.log(minDateTime);

      // Get all datetime-local inputs
      const datetimeInputs = document.querySelectorAll('input[type="datetime-local"]');

      // Set the min attribute for each datetime-local input
      datetimeInputs.forEach(input => {
        input.setAttribute('min', minDateTime);
      });
    }

    // Call setMinDate function when the page loads
    window.onload = setMinDate;
  </script>
</body>

</html>