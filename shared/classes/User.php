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

    public function __construct($firstName, $lastName, $email, $password)
    {
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

        $loginQuery = "SELECT * FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $loginQuery)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $loginResult = mysqli_stmt_get_result($stmt);
        }

        $error = "";

        if (mysqli_num_rows($loginResult) > 0) {
            $userData = mysqli_fetch_assoc($loginResult);

            if (password_verify($password, $userData['password'])) {
                setcookie("userCredentials", $userData['userID'], time() + (60 * 60 * 24 * 3), "/");
                header("Location: index.php");
            } else {
                $error = "No User";
                echo "<script>alert('Invalid Username/Email or Password');</script>";
            }
        } else {
            $error = "No User";
            echo "<script>alert('Invalid Username/Email or Password');</script>";
        }
    }
}
