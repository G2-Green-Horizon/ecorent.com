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

    <style>
        :root {
            /* Global Variables */
            --titleColor: #D2CBA6;
            --mainColor: #FFFFFF;
            --beige: #D2CBA6;
            --moss: #393729;
            --military: #55523D;

            --bgColor: #282828;
            --bgColor2: #3B3A3A;
            --bgColor3: #343333;

            --stroke: #454545;
            --green: #7F9D5A;
            --mainFont: 'Studio Feixen Variable', sans-serif;
            --roundiness: 18.3px;
        }

        #booking-page {
            background-color: #282828;
            color: #FFFFFF;
            font-family: var(--font);
        }

        h2 {
            color: #D2CBA6;
            font-size: 45px;
            font-weight: bold;
        }

        h4 {
            color: #FFFFFF;
            font-size: 28px;
        }

        h6 {
            color: #FFFFFF;
            font-size: 20px;
        }

        label {
            color: #f6f6f6;
            font-size: 20px;
        }


        p {
            color: #FFFFFF;
            font-size: 20px;
        }

        #pickupDate {
            background-color: #454545;
            border: none;
            font-size: 20px;
            border-radius: 16px;
            height: 62px;
        }

        #noteForOwner {
            background-color: #454545;
            border: none;
            font-size: 20px;
            border-radius: 16px;
            height: 62px;
        }

        #warehouse-txt {
            color: #FFFFFF;
            font-size: 20px;
            font-weight: 100;
        }

        h3 {
            color: #FFFFFF;
            font-size: 28px;
            font-weight: 600;
        }

        li {
            color: #FFFFFF;
            font-size: 18px;

        }

        #top-price {
            color: #D2CBA6;
            font-size: 35px;
            font-weight: bold
        }

        #bot-price {
            color: #D2CBA6;
            font-size: 40px;
            font-weight: bold
        }

        /* btn */
        #cancel-btn {
            background-color: transparent;
            border: 2px solid #9B9B9B;
            border-radius: 18px;
            color: #D2CBA6;
            width: 175px;
            height: 51px;
            font-size: 18px;
            font-weight: 500;
        }

        #confirm-btn {
            background-color: #D2CBA6;
            border: none;
            border-radius: 18px;
            color: #3E3D3D;
            width: 247px;
            height: 51px;
            ;
            font-size: 18px;
            font-weight: 500;
        }

        .input-box {
            font-size: 16px;
            border-radius: var(--roundiness);
            border: 1px solid var(--stroke);
            padding: 12px;
            color: var(--mainColor);
            background-color: var(--bgColor2);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .input-box:focus {
            background-color: var(--bgColor2);
            color: var(--mainColor);
            border-color: var(--stroke);
            outline: none;
        }

        .input-box::placeholder {
            color: var(--mainColor);
        }

        .input-box:focus::placeholder {
            color: gray;
        }
    </style>
</head>


<body id="booking-page">

    <?php include 'shared/components/navbar.php'; ?>

    <section class="my-4">
        <div class="container mt-5 mb-2 p-4 rounded-4" style="background-color: #343333;">
            <div class="row">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="me-auto p-2">Items Booked</h2>

                    <h6 class="p-2 me-5 text-center">Unit price <br> per day</h6>
                    <h6 class="p-2 me-3 text-center">Rental <br> period</h6>
                    <h6 class="p-2 me-3 text-center">Quantity</h6>
                    <h6 class="p-2 me-3 text-center">Item subtotal</h6>
                </div>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="shared/assets/img/system/booking-page/bike 1.svg" style="width: 96px; height: auto;">
                    <h4 class="me-auto p-2">TrailMaster X200 Mountain Bike</h4>

                    <h6 class="p-2 me-5 ">₱100</h6>
                    <h6 class="p-2 me-5">3 days</h6>
                    <h6 class="p-2 me-5 text-center">1</h6>
                    <h5 class="p-2 me-5">₱300</h5>
                </div>
            </div>

            <hr class="border border-1 w-100">

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pickupDate" class=" form-label">Pick-Up date:</label>
                        <input type="date" id="pickupDate" class="input-box form-control">
                    </div>
                    <div class="mb-3">
                        <label for="noteForOwner" class=" form-label">Note for the owner:</label>
                        <textarea id="noteForOwner" class="input-box form-control" rows="2"
                            placeholder="Leave a message"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pick-Up location:</label>

                        <div class="d-flex align-items-center gap-2">
                            <img src="shared/assets/img/system/booking-page/vector.svg"
                                style="height: 30px; width: auto;">
                            <p class="mb-0 text-center"><i class="" id="warehouse-txt"></i> EcoRent Warehouse | Brgy.
                                San Antonio, Sto. Tomas, Batangas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
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