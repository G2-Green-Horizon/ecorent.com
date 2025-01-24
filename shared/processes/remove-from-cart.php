<?php

include(__DIR__ . "/../../connect.php");

if (isset($_GET['cartIDs'])) {

    $cartIDs = $_GET['cartIDs'];

    $cartIDsArray = explode(',', $cartIDs);
    $cartIDsArray = array_map('intval', $cartIDsArray); 

    $cartIDsString = implode(',', $cartIDsArray);

    $removeFromCartQuery = "UPDATE cart SET status = 'removed' WHERE cartID IN ($cartIDsString)";

    $removeFromCartResults = executeQuery($removeFromCartQuery);

    if ($removeFromCartResults) {
        header('Location: /ecorent.com/cart.php');
        exit();
    } else {
        header('Location: /ecorent.com/cart.php');
        exit();
    }

} else {
    header('Location: /ecorent.com/cart.php');
    exit();
}
?>
