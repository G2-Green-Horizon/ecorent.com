<?php
include("shared/processes/process-index.php");
include("shared/processes/profile-process.php");
include("shared/classes/Rental.php");

if (isset($_POST['btnCancelBooking'])) {
    $rentalID = $_POST['rentalID'];

    $cancelQuery = "UPDATE rentals SET rentalStatus = 'cancelled' WHERE rentalID = '$rentalID' ";
    executeQuery($cancelQuery);

}

// MY BOOKINGS TAB
$rental = new Rental(null, null, null);
$rentalList = $rental->getRentalsData();


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
    <link rel="stylesheet" href="shared/assets/css/modal.css">
    <link rel="stylesheet" href="shared/assets/css/elastic-tab.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">

</head>

<body id="my-account-page">
    <?php include 'shared/components/navbar.php'; ?>
    <div class="base ps-2 ps-lg-5">

        <div class="title py-3">
            My Account
        </div>
        <!-- SIDE NAVIGATION BAR -->
        <div class="sidebar pe-3" id="sideBar">
            <div class="navigations">
                <div class="nav-button profile p-3" id="btn1" onclick="showContent('btn1')">
                    <i class="fa-regular fa-user pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">My
                        Profile</span>
                </div>
                <div class="nav-button bookings p-3" id="btn2" onclick="showContent('btn2')">
                    <i class="fa-solid fa-book pe-1 "></i><span class="nav-text-side text-start ps-3 ps-sm-3">My
                        Bookings</span>
                </div>
                <div class="nav-button settings p-3" id="btn3" onclick="showContent('btn3')">
                    <i class="fa-solid fa-gear pe-1 "></i><span
                        class="nav-text-side text-start ps-3 ps-sm-3">Settings</span>
                </div>
                <div class="nav-button logout p-3" id="btn4" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fa-solid fa-right-from-bracket logout-icon pe-1"></i>
                    <span class="nav-text-side text-start ps-3 ps-sm-3">Log out</span>
                </div>

                <!-- LOG OUT MODAL -->
                <?php include("shared/processes/logout-process.php"); ?>
            </div>
        </div>

        <!-- MAIN DYNAMIC CONTENT -->
        <div class="main-content mb-5">

            <!-- MY PROFILE -->
            <form method="POST" id="profileForm">
                <div class="content-card profile p-3" id="container1">
                    <div class="content">

                        <div class="my-profile d-block pe-2 pt-2 rounded-4">
                            <!-- Toast Notification -->
                            <?php if ($profileUpdated): ?>
                                <div class="toast-container position-absolute top-0 start-50 translate-middle-x p-3"
                                    style="z-index: 1055;">
                                    <div class="toast align-items-center text-bg-success border-0 show" role="alert"
                                        aria-live="assertive" aria-atomic="true">
                                        <div class="d-flex">
                                            <div class="toast-body">
                                                Profile successfully updated!
                                            </div>
                                            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

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
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" id="firstName" class="form-control" name="firstName"
                                                placeholder="First Name"
                                                value="<?php echo $userInfoArray['firstName'] ?? ''; ?>">
                                            <div class="invalid-feedback" id="firstNameError"></div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" id="lastName" class="form-control" name="lastName"
                                                placeholder="Last Name"
                                                value="<?php echo $userInfoArray['lastName'] ?? ''; ?>">
                                            <div class="invalid-feedback" id="lastNameError"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Email" value="<?php echo $userInfoArray['email'] ?? ''; ?>">
                                        <div class="invalid-feedback" id="emailError"></div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" id="address" class="form-control" name="address"
                                            placeholder="Address"
                                            value="<?php echo $userInfoArray['address'] ?? ''; ?>">
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text" id="contactNumber" class="form-control" name="contactNumber"
                                            placeholder="Phone Number"
                                            value="<?php echo $userInfoArray['contactNumber'] ?? ''; ?>">
                                    </div>
                                    <!-- Gender Selection -->
                                    <div class="mb-4 d-flex align-items-center" id="gender-selection">
                                        <label class="form-label me-4 mb-1" for="gender">Gender:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Male"
                                                id="male" <?php echo ($userInfoArray['gender'] ?? '' == 'Male') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Female"
                                                id="female" <?php echo ($userInfoArray['gender'] ?? '' == 'Female') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Other"
                                                id="other" <?php echo ($userInfoArray['gender'] ?? '' == 'Other') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-center text-md-end mt-5 mb-3">
                                    <button type="submit" name="btnSaveProfile" class="btn-save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- MY BOOKINGS -->
            <div class="content-card bookings" id="container2">
                <div class="content">
                    <div class="my-bookings d-block rounded-4">
                        <div class="wrapper">
                            <nav>
                                <input type="radio" name="tab" id="pending" checked>
                                <input type="radio" name="tab" id="pickup">
                                <input type="radio" name="tab" id="onrent">
                                <input type="radio" name="tab" id="returned">
                                <input type="radio" name="tab" id="cancelled">
                                <label for="pending" class="pending"><a href="#"><span
                                            class="tab-text">Pending</span></a></label>
                                <label for="pickup" class="pickup"><a href="#"><span class="tab-text">For
                                            Pick-Up</span></a></label>
                                <label for="onrent" class="onrent"><a href="#"><span class="tab-text">On
                                            Rent</span></a></label>
                                <label for="returned" class="returned"><a href="#"><span
                                            class="tab-text">Returned</span></a></label>
                                <label for="cancelled" class="cancelled"><a href="#"><span
                                            class="tab-text">Cancelled</span></a></label>
                                <div class="tab">
                                </div>
                            </nav>
                        </div>
                        <div class="item-status-list">

                            <!-- RENTAL STATUS CARDS -->
                            <?php foreach ($rentalList as $rentalCard) {
                                if ($rentalCard->status === 'pending') {
                                    echo $rentalCard->buildRentalCard();
                                }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- SETTINGS -->
            <div class="content-card pt-2 pt-md-0 p-4 pickups" id="container3">
                <div class="title">

                    <h1>Settings</h1>
                </div>
                <div class="content settings-content">
                    <ul class="settings">
                        <li class="p-2 change-pass">Change Password</li>
                        <a href="security-questions.php">
                            <li class="p-2 security-quest">Setup Security Questions</li>
                        </a>
                        <li class="p-2 delete-account" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete
                            Account</li>
                    </ul>
                </div>

                <!-- DELETE ACCOUNT MODAL -->
                <div class=" modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true" data-bs-theme="dark">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title  w-100 text-center fs-4" id="confirmationDelete">Delete
                                    Account
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                Are you sure you want to permanently delete your account? This action is
                                irreversible,
                                and you
                                will lose access to your account and its data forever.
                            </div>
                            <div class="container d-flex justify-content-end my-3">
                                <button type="button" class="btn-delete-denied text-center mx-2 p-2"
                                    data-bs-dismiss="modal" name="btnDenied">No, I want to keep it</button>
                                <button type="submit" class="btn-delete-confirmed text-center" name="btnConfirmed">Yes,
                                    I want
                                    to delete</button>
                            </div>
                        </div>
                    </div>
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
    <script src="shared/assets/js/profile.js"></script>
    <script>
        var containers = [
            document.getElementById("container1"),
            document.getElementById("container2"),
            document.getElementById("container3")
        ];

        var buttons = [
            document.getElementById("btn1"),
            document.getElementById("btn2"),
            document.getElementById("btn3")
        ];

        var activeIndex = localStorage.getItem("activeTabIndex") || 0;

        function showContent(btnID) {
            var index = btnID[btnID.length - 1] - 1;

            localStorage.setItem("activeTabIndex", index);

            buttons.forEach((button, i) => {
                if (i === index) {
                    button.style.backgroundColor = '#343333';
                } else {
                    button.style.backgroundColor = '';
                }
            });

            containers.forEach((container, i) => {
                container.style.display = i === index ? 'block' : 'none';
            });
        }

        buttons.forEach((button, i) => {
            button.style.backgroundColor = i == activeIndex ? '#343333' : '';
        });

        containers.forEach((container, i) => {
            container.style.display = i == activeIndex ? 'block' : 'none';
        });


    </script>


</body>

</html>