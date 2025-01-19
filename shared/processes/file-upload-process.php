<?php
include('connect.php');

if (isset($_POST['submit'])) {
    $fileName = $_FILES['profile-pic']['name'];
    $tempName = $_FILES['profile-pic']['tmp_name'];
    $folderName = 'shared/assets/img/profile-picture/' . $fileName;

    // save the uploaded file
    if (move_uploaded_file($tempName, $folderName)) {
        // update the database
        $uploadQuery = "UPDATE users SET profilePicture = '$fileName' WHERE userID = 6;";
        executeQuery($uploadQuery);
    }

    // fetch updated user data
    $uploadProfileQuery = "SELECT * FROM users WHERE userID = 6;";
    $uploadResult = executeQuery($uploadProfileQuery);
    $row = mysqli_fetch_assoc($uploadResult);
}
