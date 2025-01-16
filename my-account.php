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
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true" data-bs-theme="dark">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title  w-100 text-center fs-4" id="confirmationLogout">Log out Account
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                Are you sure you want to log out?
                            </div>
                            <div class="container d-flex justify-content-end my-3">
                                <button type="submit" class="btn-logout-denied text-center mx-2" data-bs-dismiss="modal"
                                    name="btnDenied">No</button>
                                <button type="submit" class="btn-logout-confirmed text-center"
                                    name="btnConfirmed">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN DYNAMIC CONTENT -->
        <div class="main-content mb-5">

            <!-- MY PROFILE -->
            <div class="content-card profile p-3" id="container1">
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

                            <!-- PENDING CARD -->
                            <div class="item-card mt-3 p-3">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/bike.jpg" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3 pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">TrailMaster X200 Mountain Bike</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">Brgy. San
                                                    Antonio, Sto.Tomas, Batangas</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    3
                                                    days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        <div class="status-badge text-center">
                                            PENDING
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period d-none">
                                            <div class="time-remaining">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">00:00:00</span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 rental-time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3">
                                            Waiting for your item to be approved.
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">Total payment:</span>
                                            <span class="payment-number ps-5 text-end">₱2,000</span>
                                        </div>
                                        <div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action btn-cancel">Cancel
                                                    Booking</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FOR PICK UP CARD -->
                            <div class="item-card mt-3 p-3">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/bike.jpg" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3 pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">TrailMaster X200 Mountain Bike</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">Brgy. San
                                                    Antonio, Sto.Tomas, Batangas</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    3
                                                    days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        <div class="status-badge text-center">
                                            FOR PICK-UP
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period d-none">
                                            <div class="time-remaining">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">00:00:00</span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 rental-time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3">
                                            Please pick-up your item at Brgy. San Antonio, Sto.Tomas, Batangas on Jan
                                            24, 2025.
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">Total payment:</span>
                                            <span class="payment-number ps-5 text-end">₱2,000</span>
                                        </div>
                                        <div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action btn-cancel">Cancel
                                                    Booking</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ON RENT -->
                            <div class="item-card mt-3 p-3">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/bike.jpg" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3 pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">TrailMaster X200 Mountain Bike</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">Brgy. San
                                                    Antonio, Sto.Tomas, Batangas</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    3
                                                    days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        <div class="status-badge text-center">
                                            ON RENT
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period">
                                            <div class="time-remaining">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">72:34:01</span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 rental-time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3 d-none">
                                            Please pick-up your item at Brgy. San Antonio, Sto.Tomas, Batangas on Jan
                                            24, 2025.
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">Total payment upon return:</span>
                                            <span class="payment-number ps-5 text-end">₱0</span>
                                        </div>
                                        <div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action">Extend</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- OVERDUE -->
                            <div class="item-card mt-3 p-3">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/bike.jpg" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3 pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">TrailMaster X200 Mountain Bike</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">Brgy. San
                                                    Antonio, Sto.Tomas, Batangas</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    3
                                                    days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        <div class="status-badge badge-overdue text-center">
                                            OVERDUE
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period">
                                            <div class="time-remaining d-flex">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">00:00:00</span>
                                                <span class="alert-icon d-block ps-2"><i
                                                        class="fa-solid fa-circle-exclamation"
                                                        style="color:#D10D0D"></i></span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 -time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3 d-block">
                                            Please return the item immediately to prevent penalties!
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">Total payment upon return:</span>
                                            <span class="payment-number ps-5 text-end">₱0</span>
                                        </div>
                                        <div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action">Extend</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- EXTENDED -->
                            <div class="item-card mt-3 p-3">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/bike.jpg" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3  pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">TrailMaster X200 Mountain Bike</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">Brgy. San
                                                    Antonio, Sto.Tomas, Batangas</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    3
                                                    days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        <div class="status-badge text-center">
                                            EXTENDED
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period">
                                            <div class="time-remaining">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">72:34:01</span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 rental-time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3 d-block">
                                            Please prepare exact amount upon return.
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">Total payment upon return:</span>
                                            <span class="payment-number ps-5 text-end">₱800</span>
                                        </div>
                                        <div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action">Extend</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <a href="security-questions.php"><li class="p-2 security-quest">Setup Security Questions</li></a>
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
                                <button type="submit" class="btn-delete-denied text-center mx-2 p-2"
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

        function showContent(btnID) {

            var index = btnID[btnID.length - 1] - 1;

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

        buttons[0].style.backgroundColor = '#343333';
        containers[0].style.display = 'block';
        for (let i = 1; i < containers.length; i++) {
            containers[i].style.display = 'none';
        }

    </script>

</body>

</html>