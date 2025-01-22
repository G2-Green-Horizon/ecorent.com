<?php

include_once(__DIR__ . "/../../connect.php");

$userID = $_COOKIE['userID'] ?? $_COOKIE['userCredentials'] ?? null;



if (isset($_POST['btnSaveProfile'])) {
    $fileName = $_FILES['profile-pic']['name'];
    $tempName = $_FILES['profile-pic']['tmp_name'];
    $folderName = 'shared/assets/img/user/' . $fileName;

    if (move_uploaded_file($tempName, $folderName)) {
        // Update the database with the new file name
        $uploadQuery = "UPDATE users SET profilePicture = '$fileName' WHERE userID = '$userID'";
        executeQuery($uploadQuery);
    }
}

// fetch updated user data
$uploadProfileQuery = "SELECT profilePicture FROM users WHERE userID = $userID;";
$uploadResult = executeQuery($uploadProfileQuery);

$pfpfileame = "";
while($row = mysqli_fetch_assoc($uploadResult)){
    $pfpfileame = $row['profilePicture'];
}
