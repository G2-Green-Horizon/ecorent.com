<?php
include(__DIR__ . "/../../connect.php");
include(__DIR__ . "/../classes/User.php");
include(__DIR__ . "/../classes/Item.php");
include(__DIR__ . "/../processes/process-index.php");

if (isset($_COOKIE["userID"])) {
    $userID = $_COOKIE["userID"];
} else if (isset($_COOKIE["userCredentials"])) {
    $userID = $_COOKIE["userCredentials"];
}

// Get the offset and limit set.
$offset = isset($_GET['offset']) ? (int) $_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 12;

// Query to retrieve user preferences.
$userPreferences = new UserPreferences($userID);
$categoryIDsArray = $userPreferences->getUserPreferences();

$itemsArray = [];

// Fetch items based on user preferences.
if (count($categoryIDsArray) > 0) {
    $categoryIDsList = implode(",", $categoryIDsArray);
    $retrieveItemsQuery = "SELECT items.itemID, items.itemName, items.pricePerDay, categories.categoryID, categories.categoryName, attachments.fileName
        FROM items 
        JOIN categories ON items.categoryID = categories.categoryID
        JOIN attachments on items.itemID = attachments.itemID
        WHERE items.categoryID IN ($categoryIDsList)
        ORDER BY categoryName ASC
        LIMIT $limit OFFSET $offset";

    $retrieveItemsResult = executeQuery($retrieveItemsQuery);

    if (mysqli_num_rows($retrieveItemsResult) > 0) {
        while ($itemsRow = mysqli_fetch_assoc($retrieveItemsResult)) {
            $itemsArray[] = new Item(
                $itemsRow["itemID"],
                $itemsRow["categoryID"],
                $itemsRow["itemName"],
                $itemsRow["pricePerDay"],
                $itemsRow["categoryName"],
                $itemsRow["fileName"]
            );
        }
    }
}

// Set the remaining items limit.
$remainingItemsLimit = $limit - count($itemsArray);

// Fetch items from remaining categories not chosen by the user.
$remainingItemsArray = [];

if (count($categoryIDsArray) > 0) {
    $remainingCategoriesQuery = "SELECT categoryID FROM categories WHERE categoryID NOT IN (" . implode(",", $categoryIDsArray) . ")";
    $remainingCategoriesResult = executeQuery($remainingCategoriesQuery);

    $remainingCategoriesArray = [];
    if (mysqli_num_rows($remainingCategoriesResult) > 0) {
        while ($row = mysqli_fetch_assoc($remainingCategoriesResult)) {
            $remainingCategoriesArray[] = $row["categoryID"];
        }
    }

    if (count($remainingCategoriesArray) > 0) {
        $remainingCategoriesList = implode(",", $remainingCategoriesArray);

        // Query to retrieve items from the remaining categories the user did not choose.
        $retrieveRemainingItemsQuery = "
        SELECT items.itemID, items.itemName, items.pricePerDay, categories.categoryID, categories.categoryName, attachments.fileName
        FROM items 
        JOIN categories ON items.categoryID = categories.categoryID
        JOIN attachments on items.itemID = attachments.itemID
        WHERE items.categoryID IN ($remainingCategoriesList)
        ORDER BY categoryName ASC
        LIMIT $limit OFFSET $offset";
    

        $retrieveRemainingItemsResult = executeQuery($retrieveRemainingItemsQuery);

        if (mysqli_num_rows($retrieveRemainingItemsResult) > 0) {
            while ($itemsRow = mysqli_fetch_assoc($retrieveRemainingItemsResult)) {
                $remainingItemsArray[] = new Item(
                    $itemsRow['itemID'],
                    $itemsRow['categoryID'],
                    $itemsRow['itemName'],
                    $itemsRow['pricePerDay'],
                    $itemsRow['categoryName'],
                    $itemsRow["fileName"]
                );
            }
        }
    }
}

// Merge items from preferred and other categories.
$totalItemsArray = array_merge($itemsArray, $remainingItemsArray);

// Output the HTML for each item.
foreach ($totalItemsArray as $item) {
    echo '
    <a href="product-page.php?id=' . $item->itemID . '" class="item-card col-6 col-lg-4 col-xl-3">
        <div class="card my-3 custom-card">
            <img src="shared/assets/img/system/items/' . ($item->fileName) .' " class="card-img-top" alt="' . ($item->itemName) . '">
            <div class="card-body">
                <h5 class="card-title">' . ($item->itemName) . '</h5>
                <h5 class="card-text">' . ($item->categoryName) . '</h5>
                <h5 class="card-text price">₱' . ($item->pricePerDay) . '</h5>
            </div>
        </div>
    </a>';
}
