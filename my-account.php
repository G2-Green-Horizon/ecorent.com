<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | My Account</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <style>
        #my-account-page {
            background-color: #282828;
            font-family: var(--font);
        }

        #my-account {
            color: #D2CBA6;
        }

        @media (max-width: 1200px) {
            aside {
                position: fixed;
                /* Ensures the aside sticks at the bottom */
                bottom: 0;
                /* Positions the aside at the bottom of the screen */
                left: 0;
                /* Stretches it to the left edge */
                right: 0;
                /* Stretches it to the right edge */
                background-color: #282828;
                /* Background color */
                z-index: 1000;
                /* Ensures it appears on top of other content */
                height: 90px;
                /* Sets the height of the aside */

            }

            aside .nav {
                flex-direction: row !important;
                /* Horizontal alignment */
                justify-content: space-around;
                /* Evenly space nav items */
                padding: 4px;
            }

            aside .nav-link {
                flex-direction: column;

            }

            aside .nav-link span {
                display: none;
            }

            aside .nav-link img {
                margin: 0;

            }
        }

        aside .nav-link {
            color: #FFFFFF;
            font-size: 20px;
            text-decoration: none;
            padding: 4px 5px;
            display: flex;
            align-items: center;
            position: relative;


        }

        /* Hover effect */
        aside .nav-link:hover {
            background-color: #343333;
            border-radius: 0 16px 16px 0;
            color: #FFFFFF;
        }

        .nav-link.active {
            background-color: #343333;
            border-radius: 0 16px 16px 0;
            color: #FFFFFF;

        }


        aside .nav-link.active::before {
            content: '';
            position: absolute;
            left: -5px;
            /* Add a bit of space between the line and the highlight */
            top: 50%;
            /* Center it vertically */
            transform: translateY(-50%);
            /* Adjust for centering */
            width: 3px;
            /* Vertical line width */
            height: 40px;
            /* Height of the line */
            background-color: #D2CBA6;
            /* Highlight color */
            border-radius: 2px;
        }

        .btn-light-custom {
            background-color: #f0c63b;
            color: #000;

        }

        .btn-light-custom:hover {
            background-color: #f3d372;
        }

        .border-circle {
            border: 8px solid #D2CBA6;
            width: 211px;
            height: 211px;
        }

        .form-control {
            background-color: transparent;
            color: #FFFFFF;
            border: 1px solid #BDB6B6;
            border-radius: 9px;
        }

        .btn-light-custom {
            background-color: #D2CBA6;
            width: 247px;
            height: 45px;
            font-size: 16px;
            border-radius: 9px;
            font-weight: 500;
        }

        .form-check-input {
            appearance: none;
            background-color: transparent;
            border: 1px solid #B6B3B3;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }

        .form-check-input:checked {
            border-color: #888888;
            background-color: transparent;
        }

        #gender-selection {
            color: #FFFFFF;
        }

        .form-check-input:checked::after {
            content: '';
            width: 9px;
            height: 9px;
            background-color: #D9D9D9;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .btn-outline-light {
            width: 154px;
            height: 45px;
            font-size: 16px;
            color: #D2CBA6;
            background-color: transparent;
            border: 1px solid #D2CBA6;
            border-radius: 9px;

        }

        small {
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 100;
        }

        #box {
            height: 1px;
            background-color: #282828;
        }
    </style>
</head>

<body id="my-account-page">

    <div class="container">
        <div class="row my-4">
            <h2 class="col-md-12" id="my-account">My Account</h2>
        </div>

        <div class="container">
            <div class="row align-items-start">
                <!-- Sidebar -->
                <aside class="col-auto col-md-auto col-lg-auto">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3">
                                <a href="#profile" class="nav-link active d-flex align-items-center">
                                    <img src="shared/assets/img/system/my-account/1.svg" alt="Profile Icon" class="me-2"
                                        style="width: 19px; height: auto;">
                                    My Profile
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="#bookings" class="nav-link d-flex align-items-center">
                                    <img src="shared/assets/img/system/my-account/2.svg " alt="Bookings Icon"
                                        class="me-2" style="width: 24px; height: auto;">
                                    My Bookings
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="#settings" class="nav-link d-flex align-items-center">
                                    <img src="shared/assets/img/system/my-account/3.svg" alt="Settings Icon"
                                        class="me-2" style="width: 27px; height: auto;">
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#logout" class="nav-link d-flex align-items-center">
                                    <img src="shared/assets/img/system/my-account/4.svg" alt="Logout Icon" class="me-2"
                                        style="width: 26px; height: auto;">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>

                <!-- Main Content -->
                <div class="col-12 col-md-12 col-lg-10">
                    <div class="p-4 rounded-4" style="background-color: #343333;">
                        <form>
                            <div class="row my-3">
                                <!-- Profile Image Section -->
                                <div class="col-12 col-md-4 text-center d-flex flex-column align-items-center mb-4">
                                    <div
                                        class="border-circle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4">
                                    </div>
                                    <button type="button" class="btn btn-outline-light btn-sm">Select Image</button>
                                    <small class="d-block mt-4">File Size: maximum 1 MB</small>
                                    <small>File Extension: .JPG, .PNG</small>
                                </div>
                                <!-- Input Fields Section -->
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control" placeholder="First Name"
                                                value="John Mark">
                                        </div>
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Last Name"
                                                value="Dela Cruz">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="email" class="form-control" placeholder="Email"
                                            value="johnmarkdelacruz@gmail.com">
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" class="form-control" placeholder="Address" value="address">
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" class="form-control" placeholder="Phone Number"
                                            value="09123456789">
                                    </div>
                                    <!-- Gender Selection -->
                                    <div class="mb-4 d-flex align-items-center" id="gender-selection">
                                        <label class="form-label me-4 mb-1" for="gender">Gender:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="male"
                                                id="male" checked>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female"
                                                id="female">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="other"
                                                id="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Save Button -->
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-light-custom">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5" id="box">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>