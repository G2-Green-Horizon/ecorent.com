<?php 
include("connect.php");

$userID = $_COOKIE['userID'];

if(isset($_POST['btnContinue'])) {
$preferences = $_POST['preferences'];

foreach ($preferences as $categoryID) {
$addUserPreferencesQuery = "INSERT INTO preferences (userID, categoryID) VALUES ($userID, $categoryID)";
executeQuery($addUserPreferencesQuery);}

header("Location: index.php");
}

?>