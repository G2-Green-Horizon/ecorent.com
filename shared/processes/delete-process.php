<?php
if (isset($_POST['btnConfirmed'])) {

    $userID = $_COOKIE['userID'] ?? $_COOKIE['userCredentials'] ?? null;

    // Begin transaction. USe this function to perform multiple updates on database.
    executeQuery("START TRANSACTION");

    try {
        // Soft delete records in related tables to user.
        executeQuery("UPDATE rentals SET isDeleted = 'Yes' WHERE renterID = '$userID'");
        executeQuery("UPDATE preferences SET isDeleted = 'Yes' WHERE userID = '$userID'");

        // Soft delete the user.
        executeQuery("UPDATE users SET isDeleted = 'Yes' WHERE userID = '$userID'");

        // Commit transactions made.
        executeQuery("COMMIT");

        // Log out the user after soft deletion. They would not be able to log in again on the deleted account.
        header("Location: login.php?message=AccountDeleted");
        exit;
    } catch (Exception $e) {
        // Rollback transaction in case of an error in deleting the account.
        executeQuery("ROLLBACK");
        echo "Error deleting account: " . $e->getMessage();
    }
}
?>