<?php
include("../connect.php");
include("processes/pending-process.php");
session_start();



if (!isset($_SESSION['email'])) {
    header('Location: admin-login.php');
    exit();
}

if (isset($_GET['rentalID'])) {
    $rentalID = $_GET['rentalID'];

    $userQuery = "SELECT * FROM rentals JOIN users ON rentals.renterID = users.userID JOIN items ON items.itemID = rentals.itemID JOIN attachments ON items.itemID = attachments.itemID WHERE rentalID = $rentalID;";
    $userResults = executeQuery($userQuery);

    while ($user = mysqli_fetch_assoc($userResults)) {
        $fullName = $user['firstName'] . ' ' . $user['lastName'];
        $address = $user['address'];
        $transactionID = $user['rentalID'];
        $itemName = $user['itemName'];
        $reservationDate = $user['reservationDate'];
        $startRentalDate = $user['startRentalDate'];
        $endRentalDate = $user['endRentalDate'];
        $gasEmissionSaved = $user['gasEmissionSaved'] . ' kg CO2';
        $pricePerDay = $user['pricePerDay'];
        $itemQuantity = $user['itemQuantity'];
        $rentalStatus = $user['rentalStatus'];
        $fileName = $user['fileName'];
        $unitPrice = '₱' . $user['pricePerDay'];
        $itemQuantity = 'x' . $user['itemQuantity'];
        $totalPrice = '₱' . $user['totalPrice'];
        $securityDeposit = '₱' . $user['securityDeposit'];
        $message = $user['message'];


    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions</title>
    <link rel="icon" type="image/png" href="../shared/assets/img/system/ecorent-logo-2.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/transaction-page.css">

    <!-- STYLINGS -->

    <!-- FONTS -->
    <link rel="stylesheet" href="../shared/assets/font/font.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex">
            <div class="col-5 d-flex align-items-center mt-4 mb-3">
                <a href="javascript:history.back()" style="text-decoration: none"><i class='bx bx-chevron-left'></i></a>
                <?php
                if ($rentalStatus == "pending") {
                    ?>
                    <h2>Approve Reservation</h2>
                    <?php
                } elseif ($rentalStatus == "on rent") {
                    ?>
                    <h2>Active Rental</h2>
                    <?php
                } elseif ($rentalStatus == "pickup") {
                    ?>
                    <h2>For Pick Up</h2>
                    <?php
                } else {
                    // Optional: handle any other rental status
                    echo '<h2>Status: ' . htmlspecialchars($rentalStatus) . '</h2>';
                }
                ?>


            </div>
        </div>
        <div class="row d-flex">
            <div class="col-xl-6 col-md-12 col-sm-12 order-md-1 order-sm-1 mb-3">
                <div class="card">
                    <div class="row mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0">Transaction information</h4>
                            <img src="../shared/assets/img/system/items/<?php echo $fileName; ?>" alt=""
                                class="img-fluid"
                                style="width:150px; height:150px; object-fit: cover; border-radius:5px;">
                        </div>
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Transaction ID:</td>
                                <td class="text-end"><?php echo $rentalID ?></td>

                            </tr>
                            <tr>
                                <td>Item name:</td>
                                <td class="text-end"><?php echo $itemName ?></td>

                            </tr>
                            <tr>
                                <td>Reservation date:</td>
                                <td class="text-end"><?php echo $reservationDate ?></td>
                            </tr>
                            <tr>
                                <td>Pick-up date:</td>
                                <td class="text-end"><?php echo $startRentalDate ?></td>
                            </tr>
                            <tr>
                                <td>End date:</td>
                                <td class="text-end"><?php echo $endRentalDate ?></td>
                            </tr>
                            <tr>
                                <td>Renter:</td>
                                <td class="text-end"><?php echo $fullName ?></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td class="text-end"><?php echo $address ?></td>
                            </tr>
                            <tr>
                                <td>Total saved carbon emission:</td>
                                <td class="text-end"><?php echo $gasEmissionSaved ?></td>
                            </tr>
                            <tr style="border-top: 2px solid #282828">
                                <td>Unit price (per day):</td>
                                <td class="text-end"><?php echo $unitPrice; ?></td>
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td class="text-end"><?php echo $itemQuantity; ?></td>
                            </tr>
                            <tr class>
                                <td>Security deposit:</td>
                                <td class="text-end"><?php echo $securityDeposit; ?></td>
                            </tr>
                            <tr>
                                <td>Total amout payable:</td>
                                <td class="text-end fw-bold"><?php echo $totalPrice; ?></td>
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
                    <h3><?php echo $fullName ?></h3>
                    <p><?php echo $address ?></p>
                </div>
                <div class="card card-message mb-3">
                    <h1 class="mb-4">Message</h1>
                    <p>
                        <?php echo $message; ?>
                    </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="d-flex gap-2 justify-content-center justify-content-md-end mb-3 mt-3">
                <?php if ($rentalStatus == "pending") { ?>

                    <form method="POST">
                        <a href="#" class="text-decoration-none">
                            <button class="btn btn-reject" type="submit" name="btnReject">Reject</button>
                        </a>
                    </form>


                <?php } ?>

                <?php if ($rentalStatus == "pending") { ?>

                    <form method="POST">
                        <a href="#" class="text-decoration-none">
                            <button class="btn btn-approve" type="submit" name="btnApprove">Approve</button>
                        </a>
                    </form>

                <?php } ?>
            </div>
        </div>

        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>