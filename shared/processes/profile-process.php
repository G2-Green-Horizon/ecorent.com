<?php
include("shared/processes/process-index.php");

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
    $getUserInfoQuery = "SELECT firstName, lastName, email, contactNumber, gender, address FROM users WHERE userID = $userID AND isDeleted ='No'";
} else if (isset($_COOKIE["userCredentials"])) {
    $userID = $_COOKIE["userCredentials"];
    $getUserInfoQuery = "SELECT firstName, lastName, email, contactNumber, gender, address FROM users WHERE userID = $userID AND isDeleted ='No'";
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

    header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
    exit();
}

?>
