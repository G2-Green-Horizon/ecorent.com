<?php
include("connect.php");
include("shared/classes/User.php");
include("shared/processes/process-login.php");

$newLogin = "";

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User("", "", $email, $password);
    $newLogin = $user->loginUser($email, $password);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Login</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/authentications.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
    <style>
        .input-box::placeholder {
            color: <?php echo $newLogin; ?>;
        }
    </style>
</head>

<body id="login">
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-form col-md-6 p-5 text-center m-3">
            <img src="shared/assets/img/system/ecorent-logo-2.png" alt="Logo" class="logo me-2">
            <h1 class="mb-4">Welcome back</h1>
            <form method="POST">
                <div class="mb-3">
                    <input type="email" class="input-box form-control" placeholder="Email or username" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="input-box form-control" placeholder="Password" id="password" name="password" required>
                </div>
                <div class="text-decoration-none mb-4 d-flex justify-content-start">
                    <a href="#" class="forgot-pass text-decoration-none">Forgot password?</a>
                </div>
                <div>
                    <button class="btn-continue w-100" id="btnLogin" name="btnLogin">Continue</button>
                </div>
                <div class="text-decoration-none my-4 text-center">
                    <p class="question text-decoration-none"> Don't have an account?</p>
                </div>
            </form>
            <div>
                <a href="register.php"><button class="btn-register w-100">Register</button></a>
            </div>
        </div>
    </section>
</body>

</html>