<?php

class User
{
    public $userID;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $status;
    public $gender;
    public $contactNumber;
    public $address;
    public $accountCreationDate;
    public $accountUpdateDate;
    public $profilePicture;

    public function __construct($userID, $firstName, $lastName, $email, $password)
    {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function registerUser()
    {
        global $conn;
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        $insertUserQuery = "INSERT INTO users (firstName, lastName, email, password) 
            VALUES ('$this->firstName', '$this->lastName', '$this->email', '$passwordHash')";

        return executeQuery($insertUserQuery);
    }

    public function loginUser($email, $password)
    {
        global $conn;

        $placeholderColor = "";

        $loginQuery = "SELECT * FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $loginQuery)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $loginResult = mysqli_stmt_get_result($stmt);
        }

        if (mysqli_num_rows($loginResult) > 0) {
            $userData = mysqli_fetch_assoc($loginResult);

            if (password_verify($password, $userData['password'])) {
                setcookie("userCredentials", $userData['userID'], time() + (60 * 60 * 24 * 3), "/");
                header("Location: index.php");
            } else {
                $placeholderColor = "#FF6D6D";
                echo "<script>window.onload = function() {document.getElementById('email').placeholder ='Invalid Email/Username'; document.getElementById('password').placeholder ='Invalid Password';};</script>";
            }
        } else {
            $placeholderColor = "#FF6D6D";
            echo "<script>window.onload = function() {document.getElementById('email').placeholder ='Invalid Email/Username'; document.getElementById('password').placeholder ='Invalid Password';};</script>";
        }
        return $placeholderColor;
    }
    public function changePassword($oldPassword, $newPassword, $confirmPassword)
    {
        global $conn;

        $specialCharPattern = '/[^a-zA-Z0-9]/';

        if (preg_match($specialCharPattern, $oldPassword) || preg_match($specialCharPattern, $newPassword) || preg_match($specialCharPattern, $confirmPassword) || strlen($oldPassword) < 8 || strlen($newPassword) < 8 || strlen($confirmPassword) < 8) {
            $message = '';

            if (preg_match($specialCharPattern, $oldPassword) || preg_match($specialCharPattern, $newPassword) || preg_match($specialCharPattern, $confirmPassword)) {
                $message = 'Must not contain special characters';
            }

            if (strlen($oldPassword) < 8 || strlen($newPassword) < 8 || strlen($confirmPassword) < 8) {
                $message = 'Must be at least 8 characters long';
            }

            return "<script>
        window.onload = function() {
            var newPasswordField = document.getElementById('newPassword');
            newPasswordField.placeholder = '$message';
            newPasswordField.style.borderColor = '#FF6D6D';
            newPasswordField.classList.add('error-placeholder');
        };
    </script>";
        }

        if ($newPassword === $confirmPassword) {
            $newPassQuery = "SELECT password FROM users WHERE userID = ?";
            if ($stmt = mysqli_prepare($conn, $newPassQuery)) {
                mysqli_stmt_bind_param($stmt, "i", $this->userID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $userData = mysqli_fetch_assoc($result);
                $currentPasswordHash = $userData['password'];

                if (password_verify($oldPassword, $currentPasswordHash)) {
                    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updatePasswordQuery = "UPDATE users SET password = '$hashedNewPassword' WHERE userID = ?";
                    if ($stmt = mysqli_prepare($conn, $updatePasswordQuery)) {
                        mysqli_stmt_bind_param($stmt, "i", $this->userID);
                        if (mysqli_stmt_execute($stmt)) {
                            header("Location: my-account.php");
                            exit();
                        } else {
                            return "<script>
                                window.onload = function() {
                                    var passwordField = document.getElementById('password');
                                    passwordField.placeholder = 'Old Password is incorrect';
                                    passwordField.style.borderColor = '#FF6D6D';
                                    passwordField.classList.add('error-placeholder');
                                };
                            </script>";
                        }
                    }
                } else {
                    return "<script>
                        window.onload = function() {
                            var passwordField = document.getElementById('password');
                            passwordField.placeholder = 'Old Password is incorrect';
                            passwordField.style.borderColor = '#FF6D6D'; // Set border color to red
                            passwordField.classList.add('error-placeholder'); // Add a class for styling the placeholder
                        };
                    </script>";
                }
            }
        } else {
            return "<script>
                window.onload = function() {
                    var confirmPasswordField = document.getElementById('confirmNewPassword');
                    confirmPasswordField.placeholder = 'New Password & Confirm Password not match';
                    confirmPasswordField.style.borderColor = '#FF6D6D';
                    confirmPasswordField.classList.add('error-placeholder');
                };
            </script>";
        }
    }
}

class UserPreferences
{
    public $userID;

    public function __construct($userID)
    {
        $this->userID = $userID;
    }

    public function getUserPreferences()
    {
        global $conn;
        // Query to select category IDs from user preference.
        $getUserPreferencesQuery = "SELECT categoryID FROM preferences WHERE userID = $this->userID";
        $userPreferencesResult = executeQuery($getUserPreferencesQuery);

        // Query if user chose to skip, selecting all category IDs of items, printing all items.
        $randomItemsQuery = "SELECT items.*, categories.* FROM categories JOIN items ON items.categoryID = categories.categoryID
        ORDER BY items.itemName";
        $randomItemsResult = executeQuery($randomItemsQuery);

        $categoryIDsArray = [];
        if (mysqli_num_rows($userPreferencesResult) > 0) {
            while ($userpreferencesRow = mysqli_fetch_assoc($userPreferencesResult)) {
                $categoryIDsArray[] = $userpreferencesRow["categoryID"];
            }
        } else {
            if (mysqli_num_rows($randomItemsResult) > 0) {
                while ($randomItemsRow = mysqli_fetch_assoc($randomItemsResult)) {
                    $categoryIDsArray[] = $randomItemsRow["categoryID"];
                }
            }
        }

        return $categoryIDsArray;
    }
}
?>