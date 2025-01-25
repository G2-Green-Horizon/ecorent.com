<?php

include(__DIR__ . "/../../connect.php");

if (isset($_GET['cartIDs'])) {

    $cartIDs = $_GET['cartIDs'];

    $cartIDsArray = explode(',', $cartIDs);
    $cartIDsArray = array_map('intval', $cartIDsArray); 

    $cartIDsString = implode(',', $cartIDsArray);

    $removeFromCartQuery = "UPDATE savedItems SET status = 'removed' WHERE savedID IN ($cartIDsString)";

    $removeFromCartResults = executeQuery($removeFromCartQuery);

    if ($removeFromCartResults) {
        header('Location: /ecorent.com/saved-items.php');
        exit();
    } else {
        header('Location: /ecorent.com/saved-items.php');
        exit();
    }

} else {
    header('Location: /ecorent.com/saved-items.php');
    exit();
}
?>
