<?php
$userID = $_COOKIE['userCredentials'] ?? '';
$cartQuery = "SELECT * FROM cart JOIN items ON cart.itemID = items.itemID JOIN conditions ON items.conditionID = conditions.conditionID JOIN attachments ON items.itemID = attachments.itemID WHERE userID = $userID && status = 'added'";

$cartResults = executeQuery($cartQuery);

$cartCountQuery = "SELECT COUNT(*) AS cartCount FROM cart JOIN items ON cart.itemID = items.itemID JOIN conditions ON items.conditionID = conditions.conditionID JOIN attachments ON items.itemID = attachments.itemID WHERE userID = $userID && status = 'added'";

$cartCountResults = executeQuery($cartCountQuery);

$cartCount = 0;

if ($row = mysqli_fetch_assoc($cartCountResults)) {
    $cartCount = $row['cartCount']; 
}

?>