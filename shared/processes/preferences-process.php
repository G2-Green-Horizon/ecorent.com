<?php 
include("connect.php");

// Check if preferences have already been set based on userID.
if(isset($_COOKIE["userID"])) {
    $userID = $_COOKIE["userID"];
$checkPreferencesQuery = "SELECT * FROM preferences WHERE userID = $userID";
} else if(isset($_COOKIE["userCredentials"])) {
    $userID = $_COOKIE["userCredentials"];
    $checkPreferencesQuery = "SELECT * FROM preferences WHERE userID = $userCredentials";
}
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
