<?php
include(__DIR__ . "/../../connect.php");

$secuDepositPercentage = 47;
$securityDeposit = 0;
$gasEmissionSaved = 0;
$totalPrice = 0;

if (isset($_GET["btnRentNow"])) {
    $itemID = $_GET["id"] ?? '';
    $rentalPeriod = $_GET["rentalPeriod"] ?? 1;
    $quantity = $_GET["quantity"] ?? 1;
    $pricePerDay = $_GET["pricePerDay"] ?? 0;
}

$itemSubtotal = $pricePerDay * $rentalPeriod * $quantity;

$itemBookingInfoArray = array();
if (isset($_GET['id'])) {
    $getItemInfoQuery = "SELECT items.itemID, items.itemName, items.gasEmissionSaved, attachments.fileName
                         FROM items 
                         JOIN attachments ON items.itemID = attachments.itemID
                         WHERE items.itemID = $itemID";

    $getItemInfoResult = executeQuery($getItemInfoQuery);

    if ($getItemInfoResult && mysqli_num_rows($getItemInfoResult) > 0) {
        $itemBookingInfoArray = mysqli_fetch_assoc($getItemInfoResult);
    } else {
        echo "Retrieval failed.";
    }

    // CALCULATE THE SECURITY DEPOSIT & TOTAL PRICE
    $securityDeposit = $itemSubtotal * $secuDepositPercentage / 100;
    $totalPrice = $itemSubtotal + $securityDeposit;

    // CALCULATE THE CARBON FOOTPRINT EMISSION
    $gasEmissionSaved = $itemBookingInfoArray['gasEmissionSaved'];
    $totalCO2Saved = $gasEmissionSaved * $quantity;
}

$pickupDateError = false;

if (isset($_POST['btnConfirm'])) {
    if (isset($_COOKIE["userID"])) {
        $renterID = $_COOKIE["userID"];
    } else if (isset($_COOKIE["userCredentials"])) {
        $renterID = $_COOKIE["userCredentials"];
    }

    $itemID = $_POST['itemID'];
    $rentalPeriod = $_POST['rentalPeriod'];
    $quantity = $_POST['quantity'];
    $pricePerDay = $_POST['pricePerDay'];
    $totalPrice = $_POST['totalPrice'];
    $totalCO2Saved = $_POST['totalCO2Saved'];
    $startRentalDate = $_POST['startRentalDate'];
    $message = $_POST['renterMessage'];

    if (!$itemID || !$rentalPeriod || !$quantity || !$pricePerDay || !$totalPrice || !$totalCO2Saved) {
        echo "Required data missing. Please try again.";
        exit();
    }

    // CALCULATE THE TOTAL CO2 SAVED, RENTAL DATE, & FORMAT IT
    $today = new DateTime();
    $rentalDate = new DateTime($startRentalDate);

    if ($rentalDate < $today) {
        $pickupDateError = true;
        exit();
    }

    $daysToAdd = intval($rentalPeriod);
    $date = $rentalDate;
    $date->modify("+$daysToAdd days");
    $date->setTime(23, 59, 59);
    $endRentalDate = $date->format('Y-m-d H:i:s');

    $insertBookingQuery = "
        INSERT INTO rentals (renterID, itemID, securityDeposit, startRentalDate, endRentalDate, rentalPeriod, totalPrice, rentalStatus, itemQuantity, totalCO2Saved, rateType, shippingMode, isDepositPaid, message)
        VALUES ('$renterID', '$itemID', '$securityDeposit', '$startRentalDate', '$endRentalDate', '$rentalPeriod', '$totalPrice', 'pending', '$quantity', '$totalCO2Saved', 'per day', 'pickup', 'false', '$message')
    ";

    $insertResult = executeQuery($insertBookingQuery);

    header("Location: index.php");
}

// GET THE TOTAL CARBON EMISSION SAVED THIS MONTH
$currentYear = date('Y');
$currentMonth = date('m');
$co2Query = "SELECT SUM(totalCO2Saved) AS totalCO2Saved FROM rentals WHERE rentalStatus != 'cancelled' AND MONTH(startRentalDate) = $currentMonth AND YEAR(startRentalDate) = $currentYear";
$co2Result = executeQuery($co2Query);
$co2Data = mysqli_fetch_assoc($co2Result);
$totalCO2SavedMonth = $co2Data['totalCO2Saved'] ?? 0; 
$formattedCO2Saved = number_format($totalCO2SavedMonth, 0);

?>