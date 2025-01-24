<?php
include("shared/processes/process-index.php");
include("shared/processes/booking-process.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $itemBookingInfoArray['itemName']; ?></title>
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

        <form method="POST">
            <input type="hidden" name="itemID" value="<?php echo $itemID; ?>">
            <input type="hidden" name="rentalPeriod" value="<?php echo $rentalPeriod; ?>">
            <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
            <input type="hidden" name="pricePerDay" value="<?php echo $pricePerDay; ?>">
            <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
            <input type="hidden" name="totalCO2Saved" value="<?php echo $totalCO2Saved; ?>">

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

                    <div class="mb-4 col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex justify-content-center mt-sm-2">
                                <img src="shared/assets/img/system/items/<?php echo $itemBookingInfoArray['fileName']; ?>"
                                    class="rounded-2" style="width: 96px; height: auto;">
                                <h4 class="item-name me-auto p-2 d-flex align-items-center">
                                    <?php echo $itemBookingInfoArray['itemName']; ?>
                                </h4>
                            </div>
                            <div class="col-12 col-lg-6 mt-lg-2 mt-sm-2">
                                <div class="labels d-flex justify-content-end">
                                    <h6 class="p-2 me-5 ">₱<?php echo $pricePerDay; ?></h6>
                                    <h6 class="p-2 me-5"><?php echo $rentalPeriod; ?>
                                        <?php echo $rentalPeriod > 1 ? 'days' : 'day'; ?>
                                    </h6>
                                    <h6 class="p-2 me-5 text-center"><?php echo $quantity; ?></h6>
                                    <h5 class="p-2 me-4">₱<?php echo $itemSubtotal; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-1 w-100">

                    <div class="row mt-4">
                        <div class="col-md-6 order-md-1 order-2">
                            <div class="mb-3">
                                <label for="pickupDate" class="mt-3 form-label">Pick-Up date:</label>
                                <input type="date" id="pickupDate" name="startRentalDate" class="input-box form-control"
                                    required>
                                <div id="pickupDateError" class="invalid-feedback" style="display: none;">
                                    Please select a pick-up date.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="noteForOwner" class=" form-label">Note for the owner:</label>
                                <textarea id="noteForOwner" class="input-box form-control" rows="2"
                                    placeholder="Leave a message" name="renterMessage"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mt-3 form-label">Pick-Up location:</label>

                                <div class="d-flex align-items-center gap-2">
                                    <img src="shared/assets/img/system/booking-page/vector.svg"
                                        style="height: 30px; width: auto;">
                                    <p class="mb-0 text-center"><i class="" id="warehouse-txt"></i> EcoRent Warehouse |
                                        Brgy.
                                        San Antonio, Sto. Tomas, Batangas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 order-md-2 mt-sm-4 order-1 text-end">
                            <div class="d-flex align-items-center mb-1 justify-content-end gap-5">
                                <p class="mb-0 me-5">Security deposit:</p>
                                <h6 class=" mb-0">₱<?php echo $securityDeposit ?></h6>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-5">
                                <p class="mb-0 me-3">Booking Total (<?php echo $quantity; ?>
                                    <?php echo $quantity > 1 ? 'items' : 'item'; ?>):
                                </p>
                                <h5 class="mb-0" id="top-price">₱<?php echo $totalPrice; ?></h5>
                            </div>
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
                                <h6 class="mb-0">₱<?php echo $itemSubtotal; ?></h6>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-5 mb-2">
                                <p class="mb-0 me-5">Security deposit:</p>
                                <h6 class="mb-0">₱<?php echo $securityDeposit ?></h6>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-5 mb-4">
                                <p class="mb-0">Total payment:</p>
                                <h5 class="mb-0" id="bot-price">₱<?php echo $totalPrice; ?></h5>
                            </div>

                                <div class="d-flex align-items-center justify-content-end gap-3">
                                    <button class="btn btn-outline-danger" id="cancel-btn" type="button"
                                        onclick="window.history.back();">Cancel</button>


                                    <button class="btn btn-primary" type="button" onclick="validateInput()"
                                        id="confirm-btn">Confirm
                                        Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header carbon-fprint-modal px-4">
                        <img class="carbon-fprint-img" src="shared/assets/img/system/carbon-fprint-icon.png"
                            alt="Carbon Footprint Icon">
                        <h1 class="modal-title fs-3 carbon-fprint-text ms-3" id="exampleModalLabel">
                            <strong>Thank you for saving the Earth!</strong>
                        </h1>
                        <button type="submit" name="btnConfirm" class="btn-close btn-close-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- CARBON FOOTPRINT RESULT -->
                    <div class="modal-body carbon-fprint-modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    By renting <?php echo $itemBookingInfoArray['itemName'] ?>, you've saved
                                    <?php echo $totalCO2Saved ?> kg CO₂ emissions!
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3 carbon-fprint-msg">
                                    Embrace the spirit of reducing waste and reusing items by renting from us. Your
                                    small actions can make a big impact!
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    Gas emissions saved:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="emissions-saved disabled mt-2 px-4">
                                        <strong>-<?php echo $totalCO2Saved ?> kg CO₂</strong>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    Total emissions saved this month:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="emissions-saved disabled mt-2 px-4">
                                        <strong>-<?php echo $formattedCO2Saved ?> kg CO₂</strong>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <a class="carbon-fprint-learn-more" href="https://facebook.com">Learn More</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" name="btnConfirm"
                                        class="btn btn-primary btn-carbon-fprint-okay">Okay</button>
                                </div>
                            </div>
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
    <script>
        function validateInput() {
            const pickupDateInput = document.getElementById('pickupDate');
            const pickupDateError = document.getElementById('pickupDateError');
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            const form = document.querySelector('form');
            const today = new Date();
            const inputDate = new Date(pickupDateInput.value);

            pickupDateError.style.display = 'none';

            if (!pickupDateInput.value) {
                pickupDateError.textContent = 'Please select a pick-up date.';
                pickupDateError.style.display = 'block';
                pickupDateInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            } else if (inputDate < today.setHours(0, 0, 0, 0)) {
                pickupDateError.textContent = 'Pick-up date cannot be earlier than today.';
                pickupDateError.style.display = 'block';
                pickupDateInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            modal.show();

            document.querySelector('.btn-carbon-fprint-okay').addEventListener('click', function () {
                form.submit();
            });
        }
    </script>

</body>

</html>