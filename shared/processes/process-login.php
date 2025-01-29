<?php
if (isset($_COOKIE['email']) || isset($_COOKIE['userCredentials'])) {
    if (isset($_COOKIE['userCredentials'])) {
        $userID = $_COOKIE['userCredentials'];

        $userQuery = "SELECT * FROM users WHERE userID = '$userID' OR email = '$email' AND isDeleted = 'No'";
        $userResult = executeQuery($userQuery);

        if (mysqli_num_rows($userResult) > 0) {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
}