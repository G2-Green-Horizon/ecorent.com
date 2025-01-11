<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Extend Rental Period Modal</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/style.css">
</head>

<body>

    <section class="container">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutModal">
            Extend my rental period
        </button>
        <!-- Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true"
            data-bs-theme="dark">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  w-100 text-center fs-4" id="confirmationLogout">Extend my rental period
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <p>Enter the required information to extend your rental period. </p>
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Additional rental period:</p>
                            <div class="quantity-container d-flex align-items-center mx-4 my-2">
                                <button type="button" class="btn btn-outline-secondary btn-sm"
                                    onclick="decreaseRentalPeriod()">-</button>
                                <input id="rentalPeriod" type="number" class="form-control text-center"
                                    name="rental-period" min="1" value="1" step="1">
                                <button type="button" class="btn btn-outline-secondary btn-sm"
                                    onclick="increaseRentalPeriod()">+</button>
                            </div>
                            <p class="mb-0">days</p>
                        </div>
                        <p class="mt-5">Please note that this may result in additional charges upon return. Failure to
                            follow guidelines may result to penalties!</p>
                        <form>
                            <input type="checkbox" class="mt-3" id="confirmation" name="confirmation"
                                value="confirmation">
                            <label for="confirmation"> I understand</label><br>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-end my-3">
                        <div class="container d-flex align-items-center justify-content-end">
                            <p class="me-5">Total Payment:</p>
                            <p class="price-custom-color">₱800</p>
                        </div>
                        
                        <button type="submit" class="btn-denied text-center mx-2"
                            data-bs-dismiss="modal" name="btnDenied">Cancel</button>
                        <button type="submit" class="btn-confirmed text-center"
                            name="btnConfirmed">Continue</button>
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

        // Disabled the characters
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/\D/g, '');
            });
        });
    </script>
</body>

</html>