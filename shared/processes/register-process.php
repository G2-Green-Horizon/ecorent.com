<?php 
// Function to sanitize user inputs. Remove white spaces on start and end, remove backslashes, and Converts special characters into HTML entities. 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$emailExistsError = "";

if (isset($_POST['btnRegister'])) {
    $firstName = test_input($_POST['firstName']);
    $lastName = test_input($_POST['lastName']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $confirmPassword = test_input($_POST['confirmPassword']);

    // Check if email already exists.
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // If email exists, an error will show.
        $emailExistsError = "emailExists";
    } else {
        // Create a new user.
        $user = new User($firstName, $lastName, $email, $passwordHash);

        // Save the new user in the database.
        if ($user->registerUser()) {
            $lastInsertedID = mysqli_insert_id($conn);

            // Set cookies for user infos.
            setcookie('userID', $lastInsertedID, time() + (86400 * 7), "/");
            setcookie('firstName', $firstName, time() + (86400 * 7), "/");
            setcookie('lastName', $lastName, time() + (86400 * 7), "/");
            setcookie('email', $email, time() + (86400 * 7), "/");

            header("Location: preferences.php");
            exit();
        } else {
            $registerError = "<div class='alert alert-danger'>Something went wrong. Please try again.</div>";
        }
    }
}
?>