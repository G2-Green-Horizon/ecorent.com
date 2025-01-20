<?php
include(__DIR__ . "/../../connect.php");

$itemID = $_GET["id"];

// Get item infos for URl params.
if (isset($_GET["btnRentNow"])) {
    $itemID = $_GET["id"] ?? '';
    $rentalPeriod = $_GET["rentalPeriod"] ?? '';
    $quantity = $_GET["quantity"] ?? '';
    $pricePerDay = $_GET["pricePerDay"] ?? '';
}

$itemInfoArray = array();
    if (isset($_GET["id"])) {
        // Query to retrieve needed item infos for product page.
        $getItemsInfoQuery = "SELECT itemName, pricePerDay, itemCondition, location, gasEmissionSaved, itemSpecifications, description, stock 
                              FROM items 
                              WHERE itemID = $itemID";

        $getItemsInfoResult = executeQuery($getItemsInfoQuery);

        if ($getItemsInfoResult && mysqli_num_rows($getItemsInfoResult) > 0) {
            $itemInfoArray = mysqli_fetch_assoc($getItemsInfoResult);
        } else {
            echo "Retrieval failed.";
        }
    }

?>
