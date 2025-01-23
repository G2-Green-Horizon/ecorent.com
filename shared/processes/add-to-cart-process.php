<?php
if (isset($_GET["btnAddToCart"])) {

    $itemID = $_GET["id"] ?? '';
    $rentalPeriod = $_GET["rentalPeriod"] ?? '';
    $quantity = $_GET["quantity"] ?? '';
    $userID = $_COOKIE['userCredentials'] ?? '';

    if ($itemID && $rentalPeriod && $quantity && $userID) {

        $addToCartQuery = "INSERT INTO `cart` (`userID`, `itemID`, `quantity`, `added_date`, `status`, `rentalPeriod`) 
                      VALUES ('$userID', '$itemID', '$quantity', NOW(), 'added', $rentalPeriod)";

        $addToCartResults = executeQuery($addToCartQuery);

        // if ($addToCartResults) {
        //     echo "Item successfully added to cart!";
        // } else {
        //     echo "Failed to add item to cart. Please try again.";
        // }
    } 
    // else {
    //     echo "Invalid input. Please make sure all fields are filled.";
    // }
}
?>