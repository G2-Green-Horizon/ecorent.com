<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Booking Page</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">
    <link rel="stylesheet" href="shared/assets/css/booking.css">
</head>


<body id="booking-page">

    <?php include 'shared/components/navbar.php'; ?>

    <section class="my-4">

        <div class="container mt-5 mb-2 p-4 rounded-4" style="background-color: #343333;">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h2 class="me-auto p-2">Items Booked</h2>
                        </div>
                        <div class="col-12 col-lg-6 mt-lg-2">
                            <div class="labels d-flex justify-content-end">
                                <h6 class="p-2 me-3 text-center">Unit price<br>per day</h6>
                                <h6 class="p-2 me-3 text-center">Rental<br>period</h6>
                                <h6 class="p-2 me-3 text-center">Quantity</h6>
                                <h6 class="p-2 me-3 text-center">Item<br>subtotal</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex justify-content-center mt-sm-2">
                            <img src="shared/assets/img/system/booking-page/bike 1.svg" class="rounded-2"
                                style="width: 96px; height: auto;">
                            <h4 class="item-name me-auto p-2 d-flex align-items-center">TrailMaster X200 Mountain Bike</h4>
                        </div>
                        <div class="col-12 col-lg-6 mt-lg-2 mt-sm-2">
                            <div class="labels d-flex justify-content-end">
                                <h6 class="p-2 me-5 ">₱100</h6>
                                <h6 class="p-2 me-5">3 days</h6>
                                <h6 class="p-2 me-5 text-center">1</h6>
                                <h5 class="p-2 me-4">₱300</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex justify-content-center mt-sm-2">
                            <img src="shared/assets/img/system/booking-page/bike 1.svg" class="rounded-2"
                                style="width: 96px; height: auto;">
                            <h4 class="item-name me-auto p-2 d-flex align-items-center">TrailMaster X200 Mountain Bike</h4>
                        </div>
                        <div class="col-12 col-lg-6 mt-lg-2 mt-sm-2">
                            <div class="labels d-flex justify-content-end">
                                <h6 class="p-2 me-5 ">₱100</h6>
                                <h6 class="p-2 me-5">3 days</h6>
                                <h6 class="p-2 me-5 text-center">1</h6>
                                <h5 class="p-2 me-4">₱300</h5>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <hr class="border border-1 w-100">

            <div class="row mt-4">
                <div class="col-md-6 order-md-1 order-2">
                    <div class="mb-3">
                        <label for="pickupDate" class="mt-3 form-label">Pick-Up date:</label>
                        <input type="date" id="pickupDate" class="input-box form-control">
                    </div>
                    <div class="mb-3">
                        <label for="noteForOwner" class=" form-label">Note for the owner:</label>
                        <textarea id="noteForOwner" class="input-box form-control" rows="2"
                            placeholder="Leave a message"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="mt-3 form-label">Pick-Up location:</label>

                        <div class="d-flex align-items-center gap-2">
                            <img src="shared/assets/img/system/booking-page/vector.svg"
                                style="height: 30px; width: auto;">
                            <p class="mb-0 text-center"><i class="" id="warehouse-txt"></i> EcoRent Warehouse | Brgy.
                                San Antonio, Sto. Tomas, Batangas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-md-2 mt-sm-4 order-1 text-end">
                    <div class="d-flex align-items-center mb-1 justify-content-end gap-5">
                        <p class="mb-0 me-5">Security deposit:</p>
                        <h6 class=" mb-0">₱500</h6>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-5">
                        <p class="mb-0 me-3">Booking Total (1 item):</p>
                        <h5 class="mb-0" id="top-price">₱800</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-2 p-4 rounded-4" style="background-color: #343333;">
            <div class="row">
                <div class="col">

                    <h3>Terms & Condition</h3>

                    <ol class="mt-3 px-3">
                        <li>A refundable security deposit is required upon item pick-up.</li>
                        <li>Present a valid government-issued ID at the time of pick-up.</li>
                        <li>Signing of the rental agreement is mandatory during pick-up.</li>
                        <li>Penalties will apply based on the severity of any damage to the item.</li>
                        <li>Late returns incur penalties based on the delay duration.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container mb-5 p-4 rounded-4" style="background-color: #343333;">
            <div class="row">
                <div class="col">
                    <h3>Payment Information</h3>
                    <p>Please prepare enough amount upon pick-up</p>

                    <div class="col-12 text-center">
                        <div class="d-flex align-items-center justify-content-end gap-5 mb-2">
                            <p class="mb-0 me-5">Merchandise subtotal:</p>
                            <h6 class="mb-0">₱300</h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-5 mb-2">
                            <p class="mb-0 me-5">Security deposit:</p>
                            <h6 class="mb-0">₱500</h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-5 mb-4">
                            <p class="mb-0">Total payment:</p>
                            <h5 class="mb-0" id="bot-price">₱800</h5>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-3">
                            <button class="btn btn-outline-danger" id="cancel-btn">Cancel</button>
                            <button class="btn btn-primary" id="confirm-btn">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>