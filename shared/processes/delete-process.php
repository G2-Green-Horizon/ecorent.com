<?php
include_once(__DIR__ . "/../../connect.php");

if (isset($_POST['btnDelete'])) {
    $userID = $_COOKIE['userID'] ?? $_COOKIE['userCredentials'] ?? null;

    // Begin transaction. Use this function to perform multiple updates on the database.
    executeQuery("START TRANSACTION");

    try {
        // Soft delete records in related tables to the user.
        executeQuery("UPDATE rentals SET isDeleted = 'Yes' WHERE renterID = '$userID'");
        executeQuery("UPDATE preferences SET isDeleted = 'Yes' WHERE userID = '$userID'");

        // Soft delete the user.
        executeQuery("UPDATE users SET isDeleted = 'Yes' WHERE userID = '$userID'");

        // Commit transactions made.
        executeQuery("COMMIT");

        // Clear user-related cookies (if any).
        setcookie('userID', '', time() - 3600, '/');
        setcookie('userCredentials', '', time() - 3600, '/');
        setcookie('email', '', time() - 3600, '/');
        setcookie('firstName', '', time() - 3600, '/');
        setcookie('lastName', '', time() - 3600, '/');

        // Redirect the user to the login page.
        header("Location: login.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaction in case of any error.
        executeQuery("ROLLBACK");

        // Log the error or display an appropriate message.
        error_log("Account deletion failed: " . $e->getMessage());
        echo "An error occurred while deleting your account. Please try again later.";
    }
}
?>
