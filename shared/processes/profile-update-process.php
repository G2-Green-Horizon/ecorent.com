<?php

include_once(__DIR__ . "/../../connect.php");
include("shared/processes/process-index.php");

$userID = $_COOKIE['userID'] ?? $_COOKIE['userCredentials'] ?? null;

date_default_timezone_set('Asia/Manila');
$uploadStatus = false;

// fetch updated user data
$uploadProfileQuery = "SELECT profilePicture FROM users WHERE userID = $userID;";
$uploadResult = executeQuery($uploadProfileQuery);

$pfpFileName = "";
while ($row = mysqli_fetch_assoc($uploadResult)) {
    $pfpFileName = $row['profilePicture'];
}

$profileUpdated = false;
$gender = '';

// Check if success is present in the query string indicating user info is updated successfully.
if (isset($_GET['success']) && $_GET['success'] === 'true') {
    $profileUpdated = true;
}

$userInfoArray = array();
// Query to retrieve user info.
if (isset($_COOKIE["userID"])) {
    $userID = $_COOKIE["userID"];
    $getUserInfoQuery = "SELECT firstName, lastName, email, contactNumber, gender, address FROM users WHERE userID = $userID";
} else if (isset($_COOKIE["userCredentials"])) {
    $userID = $_COOKIE["userCredentials"];
    $getUserInfoQuery = "SELECT firstName, lastName, email, contactNumber, gender, address FROM users WHERE userID = $userID";
}
$getUserInfoResult = executeQuery($getUserInfoQuery);

// Store the result to the $userInfoArray.
if (mysqli_num_rows($getUserInfoResult) > 0) {
    $userInfoArray = mysqli_fetch_assoc($getUserInfoResult);
}

// Get user input via post on click of btnSaveProfile button.
if (isset($_POST['btnSaveProfile'])) {
    $firstName = $_POST["firstName"] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $contactNumber = $_POST['contactNumber'] ?? '';
    $address = $_POST['address'] ?? '';

    // Query to update user info.
    $updateUserInfo = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', email = '$email', address = '$address', contactNumber = '$contactNumber', gender = '$gender' WHERE userID = $userID";
    executeQuery($updateUserInfo);

    $fileName = $_FILES['profile-pic']['name'];
    $tempName = $_FILES['profile-pic']['tmp_name'];
    $fileSize = $_FILES['profile-pic']['size'];

    if ($fileSize > 500000) {
        $uploadStatus = true;
    } else {

        // get the file extension
        $htmlfileExt = substr($fileName, strripos($fileName, '.'));
        $htmlnewname = date("YMdHisu");

        $htmlnewfilename = $fileName . $htmlnewname . $htmlfileExt;

        $folderName = 'shared/assets/img/user/';

        if (move_uploaded_file($tempName, $folderName . $htmlnewfilename)) {
            // Update the database with the new file name
            $uploadQuery = "UPDATE users SET profilePicture = '$htmlnewfilename' WHERE userID = '$userID'";
            executeQuery($uploadQuery);
        }

        header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
        exit();
       
    }

    if ($fileSize == ''){
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
        exit();
    }

}

?>