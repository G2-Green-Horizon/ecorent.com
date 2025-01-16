<?php
include("shared/processes/process-index.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Product Details</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
</head>

<body id="product-page">
    <?php include 'shared/components/navbar.php'; ?>
    <section class="container">

        <div class="row row-product-details my-4 mx-3 mx-sm-4">

            <!-- Product Images Column -->
            <div class="img-container col-md-6 my-4">
                <img src="shared/assets/img/system/gown.jpg" class="img-fluid img-fluid-product" alt="Product Image">
            </div>

            <div class="col-md-6 p-4">
                <h3>TrailMaster X200 Mountain Bike</h3>
                <hr>
                <h4 class="price-custom-color ">₱500/day</h4>

                <div class="d-flex align-items-center">
                    <i class="bi bi-geo-alt-fill"></i>
                    <p class="mb-0 ms-2">Brgy. San Antonio, Sto. Tomas, Batangas</p>
                </div>

                <div class="d-flex align-items-center">
                    <span id="badge-condition" class="badge rounded-pill my-4 mx-3">Good Condition</span>
                    <span id="badge-tracker" class="badge rounded-pill my-4">-25 kg CO₂</span>
                </div>

                <div class="d-flex align-items-center">
                    <p class="mb-0">Rental period:</p>
                    <div class="quantity-container d-flex align-items-center mx-4 my-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            onclick="decreaseRentalPeriod()">-</button>
                        <input id="rentalPeriod" type="number" class="form-control text-center" name="rental-period"
                            min="1" value="1" step="1">
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            onclick="increaseRentalPeriod()">+</button>
                    </div>
                    <p class="mb-0">days</p>
                </div>

                <div class="d-flex align-items-center">
                    <p class="mb-0 me-4">Quantity:</p>
                    <div class="quantity-container d-flex align-items-center mx-2 my-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            onclick="decreaseQuantity()">-</button>
                        <input id="quantity" type="number" class="form-control text-center" name="quantity" min="1"
                            value="1" step="1">
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            onclick="increaseQuantity()">+</button>
                    </div>
                    <p class="mb-0">13 stocks available</p>
                </div>

                <p class="mt-3">Rented by over 20+ happy customers!</p>

                <div class="d-flex align-items-center justify-content-end mt-5">
                    <button class="button-size btn btn-custom-outline mx-3">Add to cart</button>
                    <a href="booking.php"> <button class="button-size btn btn-custom-dark">Rent now</button> </a>
                </div>

            </div>
        </div>

        <!-- Product Desc -->
        <div class="row row-product-details my-4 p-3 mx-3 mx-sm-4">

            <div class="col my-3">
                <h3>Product Description</h3>
                <p class="mt-4">TrailMaster X200 Mountain Bike</p>
                <p>Lightweight aluminum alloy frame available in 15", 17", 19", and 21" sizes, paired with a RockShox
                    Judy Silver TK fork offering 100mm travel. </p>
            </div>
        </div>

        <!-- Product Specifications -->
        <div class="row row-product-details my-4 p-3 mx-3 mx-sm-4">

            <div class="col my-4">
                <h3>Product Specifications</h3>
                <p class="mt-4">TrailMaster X200 Mountain Bike</p>
                <p>Lightweight aluminum alloy frame available in 15", 17", 19", and 21" sizes, paired with a RockShox
                    Judy Silver TK fork offering 100mm travel.</p>
                <p>Features 29" wheels with double-walled aluminum rims and Maxxis Ardent 29x2.4"
                    all-terrain tires. </p>
                <p>
                    Equipped with a Shimano Deore 12-speed drivetrain, Shimano hydraulic disc brakes, and ergonomic
                    cockpit components including a 760mm handlebar and dropper post. </p>
                <p>
                    Weighing 13.5 kg, it includes mounts for bottle cages and racks, available in Matte Black, Electric
                    Blue, and Forest Green, with a 5-year frame warranty.</p>
            </div>
        </div>

    </section>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>
    <script>
        var rentalPeriod = document.getElementById('rentalPeriod');
        function increaseRentalPeriod() {
            rentalPeriod.stepUp();
        }
        function decreaseRentalPeriod() {
            rentalPeriod.stepDown();
        }

        var quantity = document.getElementById('quantity');
        function increaseQuantity() {
            quantity.stepUp();
        }
        function decreaseQuantity() {
            quantity.stepDown();
        }

        // DISABLE THE CARACTERS (ONLY NUMBERS)
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/\D/g, '');
            });
        });
    </script>

</body>

</html>