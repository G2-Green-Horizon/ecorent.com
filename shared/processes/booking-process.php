<?php 
include(__DIR__ . "/../../connect.php");

if (isset($_GET["btnRentNow"])) {
    $itemID = $_GET["id"] ?? '';
    $rentalPeriod = $_GET["rentalPeriod"] ?? 1; 
    $quantity = $_GET["quantity"] ?? 1;
    $pricePerDay = $_GET["pricePerDay"] ?? 0;
}

$itemSubtotal = $pricePerDay * $rentalPeriod * $quantity;

$itemBookingInfoArray = array();
if (isset($_GET['id'])) {
    $getItemInfoQuery = "SELECT items.itemID, items.itemName, items.securityDeposit, attachments.fileName
                         FROM items 
                         JOIN attachments ON items.itemID = attachments.itemID
                         WHERE items.itemID = $itemID";

    $getItemInfoResult = executeQuery($getItemInfoQuery);  

    if ($getItemInfoResult && mysqli_num_rows($getItemInfoResult) > 0) {
        $itemBookingInfoArray = mysqli_fetch_assoc($getItemInfoResult);
        $securityDeposit = $itemBookingInfoArray['securityDeposit'];  
    } else {
        echo "Retrieval failed.";
        $securityDeposit = 0;  
    }

    $totalPrice = $itemSubtotal + $securityDeposit;  
}
?>
