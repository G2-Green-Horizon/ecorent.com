<?php
include("shared/processes/process-index.php");
include("shared/processes/booking-process.php");

?>

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

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
</head>


<body id="booking-page">

    <?php include 'shared/components/navbar.php'; ?>

    <section class="my-4">

        <div class="container  mt-5 mb-2 p-4 rounded-4" style="background-color: #343333;">
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
                                <h6 class="p-2 text-center">Item<br>subtotal</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-card col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex justify-content-center mt-sm-2">
                            <img src="shared/assets/img/system/booking-page/bike 1.svg" class="rounded-2"
                                style="width: 96px; height: auto;">
                            <h4 class="item-name me-auto p-2 d-flex align-items-center">TrailMaster X200 Mountain Bike
                            </h4>
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
                            <h4 class="item-name me-auto p-2 d-flex align-items-center">TrailMaster X200 Mountain Bike
                            </h4>
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
                        <h6 class=" mb-0">₱<?php echo $itemBookingInfoArray['securityDeposit']; ?></h6>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-5">
                    <p class="mb-0 me-3">Booking Total (<?php echo $quantity; ?> <?php echo $quantity > 1 ? 'items' : 'item'; ?>):</p>
                        <h5 class="mb-0" id="top-price">₱<?php echo $totalPrice; ?></h5>
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
                    <p class="info">Please prepare enough amount upon pick-up</p>

                    <div class="col-12 text-center">
                        <div class="d-flex align-items-center justify-content-end gap-5 mb-2">
                            <p class="mb-0 me-5">Merchandise subtotal:</p>
                            <h6 class="mb-0">₱<?php echo $itemSubtotal;?></h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-5 mb-2">
                            <p class="mb-0 me-5">Security deposit:</p>
                            <h6 class="mb-0">₱<?php echo $itemBookingInfoArray['securityDeposit']; ?></h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-5 mb-4">
                            <p class="mb-0">Total payment:</p>
                            <h5 class="mb-0" id="bot-price">₱<?php echo $totalPrice;?></h5>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-3">
                            <button class="btn btn-outline-danger cancel-btn" id="cancel-btn">Cancel</button>
                            <button class="btn btn-primary confirm-btn" id="confirm-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered carbon-fprint-modal-dialog mt-3">
                <div class="modal-content">
                    <div class="modal-header carbon-fprint-modal px-4">
                        <img class="carbon-fprint-img" src="shared/assets/img/system/carbon-fprint-icon.png">
                        <h1 class="modal-title fs-3 carbon-fprint-text ms-3" id="exampleModalLabel"> <strong> Thank you
                                for
                                saving the
                                Earth!</strong>
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body carbon-fprint-modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    By renting TrailMaster X200 Mountain Bike, you've saved 25 kg CO₂ emissions!
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-3 carbon-fprint-msg w-50">
                                    Embrace the spirit of reducing waste and reusing items by renting from us. Your
                                    small actions can make a big impact!
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-3">
                                    Gas emissions saved:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="emissions-saved disabled mt-2 px-4"> <strong>-25 kg
                                            CO₂</strong></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-3">
                                    Total emissions saved this month:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="emissions-saved disabled mt-2 px-4"> <strong>-1,500 kg
                                            CO₂</strong></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-4">
                                    <a class="carbon-fprint-learn-more" href="https://blog.trimeuk.com/renting-equipment-reduces-carbon-emissions">Learn More</a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col carbon-fprint-modal-footer mt-2 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-carbon-fprint-okay">Okay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </section>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>