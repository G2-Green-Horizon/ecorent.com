<?php

include("connect.php");
include("shared/classes/User.php");

if (isset($_POST['btnChange'])) {
    if (isset($_COOKIE['userCredentials'])) {
        $userID = $_COOKIE['userCredentials']; 
        $password = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmNewPassword'];

        $user = new User($userID, "", "", "", "");
        $message = $user->changePassword($password, $newPassword, $confirmPassword);

        echo '<div class="text-white">' . $message . '</div>';
    } else {
    
        header("Location: my-account.php");
        exit; 
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Change Password</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/authentications.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
    <style>
        .input-box::placeholder {
            color:
                <?php echo $newLogin; ?>
            ;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: #7F9D5A;
        }

        .error-placeholder::placeholder {
    color: #FF6D6D;
        }
        
    </style>
</head>

<body>
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-form col-md-6 p-5 text-center m-3">
            <img src="shared/assets/img/system/ecorent-logo-2.png" alt="Logo" class="logo me-2">
            <h1 class="">New Password</h1>
            <h6 class="mb-4 text-white">Please create new password that you don’t use<br>on any other site</h6>
            <form method="POST">
                <div class="mb-3">
                    <input type="password" class="input-box form-control" placeholder="Old Password" id="password"
                        name="password" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="input-box form-control" placeholder="Create New Password"
                        id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="input-box form-control" placeholder="Confirm New Password"
                        id="confirmNewPassword" name="confirmNewPassword" required>
                </div>
                <div>
                    <button class="btn-continue w-100" id="btnChange" name="btnChange">Change</button>
                </div>
                <div class="text-decoration-none my-4 text-center">
                    <a href="my-account.php">
                        <p>Cancel</p>
                    </a>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>