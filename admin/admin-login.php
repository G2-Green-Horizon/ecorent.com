<?php
include("../connect.php");
session_start();
session_destroy();
session_start();

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // CLEAN INJECTION
    $email = str_replace('\'', '', $email);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = 'admin'";
    $loginResult = executeQuery($loginQuery);

    $_SESSION['userID'] = "";
    $_SESSION['email'] = "";
    $error = "";

    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['email'] = $user['email'];
            
            header("Location: ./");
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/admin-login.css">
    <link rel="stylesheet" href="admin-login.css">
    <link rel="icon" type="image/png" href="../shared/assets/img/system/ecorent-logo-2.png">
    <link rel="stylesheet" href="../shared/assets/font/font.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-sm-12 mx-auto d-flex justify-content-center align-items-center min-vh-100">
                <div class="card p-5 rounded-5">
                    <form method="POST">
                        <div class="logo text-center mb-2">
                            <img src="../shared/assets/img/system/ecorent-logo-2.png" alt="" class="logo">
                        </div>
                        <div class="mb-5 text-center">
                            <h1>Admin Portal</h1>
                            <?php if (isset($error)) {
                                echo "<p class='text-danger'>$error</p>";
                            } ?>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control rounded-4 p-3" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control rounded-4 p-3"
                                placeholder="Password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="login-button rounded-4 p-3" name="btnLogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>