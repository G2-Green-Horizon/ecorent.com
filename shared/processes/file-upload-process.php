<?php

$userID = $_COOKIE['userID'];

date_default_timezone_set('Asia/Manila');

if (isset($_POST['btnSaveProfile'])) {
    $fileName = $_FILES['profile-pic']['name'];
    $tempName = $_FILES['profile-pic']['tmp_name'];
    $folderName = 'shared/assets/img/user/' . $fileName;

    //RENAME THE FILE
	$imgFileExt = substr($fileName, strripos($fileName, '.'));
	$imgNewName = date("YMdHisu");

	$imgNewFileName = $imgNewName . $imgFileExt;

    // save the uploaded file
    if (move_uploaded_file($tempName, $folderName . $imgNewFileName)) {
        // update the database
        $uploadQuery = "UPDATE users SET profilePicture = '$fileName' WHERE userID = $userID;";
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
