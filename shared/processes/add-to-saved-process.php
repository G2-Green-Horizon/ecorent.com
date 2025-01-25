<?php
$status = '';
if (isset($_GET["btnAddToCart"])) {

    $itemID = $_GET["id"] ?? '';
    $rentalPeriod = $_GET["rentalPeriod"] ?? '';
    $quantity = $_GET["quantity"] ?? '';
    $userID = $_COOKIE['userID'] ?? '';
    

    $cartChecker = "SELECT * FROM savedItems WHERE itemID = $itemID AND userID = '$userID' AND status = 'added';";
    $cartCheckerResults = executeQuery($cartChecker);

    if (mysqli_num_rows($cartCheckerResults) > 0) {
        $status = 'already added';
    } else {
        if ($itemID && $rentalPeriod && $quantity && $userID) {
            $addToCartQuery = "INSERT INTO `savedItems` (`userID`, `itemID`, `quantity`, `added_date`, `status`, `rentalPeriod`) 
                              VALUES ('$userID', '$itemID', '$quantity', NOW(), 'added', '$rentalPeriod')";

            $addToCartResults = executeQuery($addToCartQuery);

            if ($addToCartResults) {
                $status = 'success';
            } else {
                $status = 'failed';
            }
        } else {
            $status = 'failed';
        }
    }
}
?>