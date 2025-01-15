<?php 
include("connect.php");

$userID = $_COOKIE["userID"];

// Check if preferences have already been set based on userID.
$checkPreferencesQuery = "SELECT * FROM preferences WHERE userID = $userID";
$checkPreferencesResult = executeQuery($checkPreferencesQuery);

if (mysqli_num_rows($checkPreferencesResult) > 0) {
    // Redirect to home page if preferences are already set.
    header("Location: index.php"); 
    exit;
}

if (isset($_POST['btnContinue'])) {
    if (isset($_POST['preferences'])) {
        $preferences = $_POST['preferences'];

        // Query to insert user preferences to the database.
        foreach ($preferences as $categoryID) {
            $addUserPreferencesQuery = "INSERT INTO preferences (userID, categoryID) VALUES ($userID, $categoryID)";
            executeQuery($addUserPreferencesQuery);
        }
        header("Location: index.php");
        exit;
    }
}


?>
