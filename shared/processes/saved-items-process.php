<?php
$userID = $_COOKIE['userID'] ?? '';
$cartQuery = "SELECT * FROM savedItems JOIN items ON savedItems.itemID = items.itemID JOIN conditions ON items.conditionID = conditions.conditionID JOIN attachments ON items.itemID = attachments.itemID WHERE userID = $userID && status = 'added'";

$cartResults = executeQuery($cartQuery);

$cartCountQuery = "SELECT COUNT(*) AS savedItemsCount FROM savedItems JOIN items ON savedItems.itemID = items.itemID JOIN conditions ON items.conditionID = conditions.conditionID JOIN attachments ON items.itemID = attachments.itemID WHERE userID = $userID && status = 'added'";

$cartCountResults = executeQuery($cartCountQuery);

$cartCount = 0;

if ($row = mysqli_fetch_assoc($cartCountResults)) {
    $cartCount = $row['savedItemsCount']; 
}

?>