<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: admin-login.php');
    exit();
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/transaction-page.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex">
            <div class="col-5 d-flex align-items-center mt-4 mb-3">
                <a href="#" style="text-decoration: none"><i class='bx bx-chevron-left'></i></a>
                <h2>Approve Reservation</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-xl-6 col-md-12 col-sm-12 order-md-1 order-sm-1 mb-3">
                <div class="card">
                    <div class="row mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0">Transaction information</h4>
                            <img src="assets/img/transactions/bike.png" alt="" class="img-fluid">
                        </div>
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Transaction ID:</td>
                                <td class="text-end">123456</td>

                            </tr>
                            <tr>
                                <td>Item name:</td>
                                <td class="text-end">TrailMaster X200 Mountain Bike</td>

                            </tr>
                            <tr>
                                <td>Reservation date:</td>
                                <td class="text-end">01/21/2025</td>
                            </tr>
                            <tr>
                                <td>Pick-up date:</td>
                                <td class="text-end">01/22/2025</td>
                            </tr>
                            <tr>
                                <td>End date:</td>
                                <td class="text-end">01/25/2025</td>
                            </tr>
                            <tr>
                                <td>Renter:</td>
                                <td class="text-end">John Doe</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td class="text-end">Brgy. San Barotolome, Sto.Tomas, Batangas</td>
                            </tr>
                            <tr>
                                <td>Total saved carbon emission:</td>
                                <td class="text-end">25 kg CO2</td>
                            </tr>
                            <tr style="border-top: 2px solid #282828">
                                <td>Unit price (per day):</td>
                                <td class="text-end">₱100</td>
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td class="text-end">x3</td>
                            </tr>
                            <tr class>
                                <td>Security deposit:</td>
                                <td class="text-end">₱500</td>
                            </tr>
                            <tr>
                                <td>Total amout payable:</td>
                                <td class="text-end fw-bold">₱800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12 order-md-2 order-sm-2 d-flex flex-column">
                <div class="card card-renter mb-3">
                    <h1 class="mb-4">Renter</h1>
                    <div class="col-3 mb-3">
                        <img src="assets/img/transactions/user.png" alt="">
                    </div>
                    <h3>John Doe</h3>
                    <p>Brgy. San Barotolome, Sto.Tomas, Batangas</p>
                </div>
                <div class="card card-message mb-3">
                    <h1 class="mb-4">Message</h1>
                    <p>
                        Hi, please ensure the mountain bike is in good condition before pick-up, including properly
                        inflated tires and a well-functioning brake system. Thank you![]
                    </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="d-flex gap-2 justify-content-center justify-content-md-end mb-3 mt-3">
                <a href="#" class="text-decoration-none">
                    <button class="btn btn-reject" type="button">Reject</button>
                </a>
                <a href="#" class="text-decoration-none">
                    <button class="btn btn-approve" type="button">Approve</button>
                </a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>