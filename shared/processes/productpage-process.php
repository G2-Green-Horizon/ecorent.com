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
        $getItemsInfoQuery = "SELECT items.itemName, items.pricePerDay, items.conditionID, items.location, items.gasEmissionSaved, 
                      items.itemSpecifications, items.description, items.stock, attachments.fileName, conditions.conditionName
                      FROM items 
                      JOIN attachments ON items.itemID = attachments.itemID
                      JOIN conditions ON items.conditionID = conditions.conditionID
                      WHERE items.itemID = $itemID AND items.isDeleted = 'No'";


        $getItemsInfoResult = executeQuery($getItemsInfoQuery);

        if ($getItemsInfoResult && mysqli_num_rows($getItemsInfoResult) > 0) {
            $itemInfoArray = mysqli_fetch_assoc($getItemsInfoResult);
        } else {
            echo "Retrieval failed.";
        }
    }

?>