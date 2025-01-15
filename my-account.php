<?php
include("shared/components/processIndex.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | My Account</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">
    <link rel="stylesheet" href="shared/assets/css/my-account.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">

</head>

<body id="my-account-page">
    <?php include 'shared/components/navbar.php'; ?>
    <div class="base ps-5">

        <div class="title py-3">
            My Account
        </div>
        <!-- SIDE NAVIGATION BAR -->
        <div class="sidebar pe-3" id="sideBar">
            <div class="navigations">
                <div class="nav-button profile p-3" id="btn1" onclick="showContent('btn1')">
                    <i class="fa-regular fa-user pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">My Profile</span>
                </div>
                <div class="nav-button bookings p-3" id="btn2" onclick="showContent('btn2')">
                    <i class="fa-solid fa-book pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">My Bookings</span>
                </div>
                <div class="nav-button settings p-3" id="btn3" onclick="showContent('btn3')">
                    <i class="fa-solid fa-gear pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">Settings</span>
                </div>
                <div class="nav-button logout p-3" id="btn4" onclick="showContent('btn4')">
                    <i class="fa-solid fa-right-from-bracket logout-icon pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">Log out</span>
                </div>
            </div>
        </div>

        <!-- MAIN DYNAMIC CONTENT -->
        <div class="main-content mb-5">

            <!-- MY PROFILE -->
            <div class="content-card dashboard p-3" id="container1">
                <div class="content">
                    <div class="cards-container col-12 col-md-12">
                        <div class="my-profile d-block pe-2 pt-2 rounded-4">
                            <div class="row my-3">
                                <!-- Profile Image Section -->
                                <div class="col-12 col-lg-4 text-center d-flex flex-column align-items-center mb-4">
                                    <div
                                        class="border-circle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4">
                                    </div>
                                    <img src="shared/assets/img/system/user-default-profile.png" alt="Profile Picture"
                                        class="profile-pic rounded-circle border border-2 border-primary mb-3"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                    <button type="button" class="btn-select-img">Select Image</button>
                                    <small class="d-block mt-4 size-info">File Size: maximum 1 MB</small>
                                    <small class="size-info">File Extension: .JPG, .PNG</small>
                                </div>
                                <!-- Input Fields Section -->
                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 mb-3">
                                            <input type="text" class="input-box form-control" placeholder="First Name"
                                                value="John Mark">
                                        </div>
                                        <div class="col-md-12 col-lg-6 mb-3">
                                            <input type="text" class="input-box form-control" placeholder="Last Name"
                                                value="Dela Cruz">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="email" class="input-box form-control" placeholder="Email"
                                            value="johnmarkdelacruz@gmail.com">
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" class="input-box form-control" placeholder="Address"
                                            value="address">
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" class="input-box form-control" placeholder="Phone Number"
                                            value="09123456789">
                                    </div>
                                    <!-- Gender Selection -->
                                    <div class="mb-4 d-flex align-items-center flex-wrap" id="gender-selection">
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
                            <div class="text-center text-md-end mt-5 mb-3">
                                <button type="submit" class="btn-save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MY BOOKINGS -->
            <div class="content-card pendings" id="container2">
                <div class="content">
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
                                <h1>helllo</h1>
                            </div>
                            <div class="card-status">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SETTINGS -->
            <div class="content-card pickups" id="container3">
                <div class="title">

                    <h1>Settings</h1>
                </div>
                <div class="content">
                    <!-- [PUT CONTENTS HERE] -->
                </div>
            </div>
        </div>
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/49a3347974.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>