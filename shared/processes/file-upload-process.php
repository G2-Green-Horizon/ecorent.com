<?php

include_once(__DIR__ . "/../../connect.php");

$userID = $_COOKIE['userID'] ?? $_COOKIE['userCredentials'] ?? null;

date_default_timezone_set('Asia/Manila');


if (isset($_POST['btnSaveProfile'])) {
    $fileName = $_FILES['profile-pic']['name'];
    $tempName = $_FILES['profile-pic']['tmp_name'];

// get the file extension
    $htmlfileExt = substr($fileName, strripos($fileName, '.'));
	$htmlnewname = date("YMdHisu");

	$htmlnewfilename = $htmlnewname . $htmlfileExt;

    $folderName = 'shared/assets/img/user/';

    if (move_uploaded_file($tempName, $folderName . $htmlnewfilename)) {
        // Update the database with the new file name
        $uploadQuery = "UPDATE users SET profilePicture = '$htmlnewfilename' WHERE userID = '$userID'";
        executeQuery($uploadQuery);
    }
}

// fetch updated user data
$uploadProfileQuery = "SELECT profilePicture FROM users WHERE userID = $userID;";
$uploadResult = executeQuery($uploadProfileQuery);

$pfpFileName = "";
while($row = mysqli_fetch_assoc($uploadResult)){
    $pfpFileName = $row['profilePicture'];
}
