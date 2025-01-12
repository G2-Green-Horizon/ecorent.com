<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | My Account</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">
    <link rel="stylesheet" href="shared/assets/css/my-account.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">

</head>

<body id="my-account-page">
    <?php include 'shared/components/navbar.php'; ?>
    <div class="container">
        <div class="row my-4">
            <h2 class="title col-md-12" id="my-account">My Account</h2>
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
                <div class="cards-container col-12 col-md-12 col-lg-10">
                    <!-- My Profile -->
                    <div class="my-profile d-block p-4 rounded-4">
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
                        <!-- Save Button -->
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-light-custom">Save</button>
                        </div>
                    </div>
                    <!-- My Bookings -->
                    <div class="my-bookings d-block p-4 rounded-4">
                        <div class="controls-tab">
                            <div class="btn-pending"></div>
                            <div class="btn-pickup"></div>
                            <div class="btn-onrent"></div>
                            <div class="btn-returned"></div>
                            <div class="btn-cancelled"></div>
                        </div>
                        <div class="item-status">
                            <div class="card-info">

                            </div>
                            <div class="card-status">
                                <h1>hello</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5" id="box">
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>