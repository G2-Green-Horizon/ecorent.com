<?php 
include("connect.php");
include("shared/classes/User.php");
include("shared/processes/register-process.php");
include("shared/processes/process-login.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Join Us at EcoRent</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/authentications.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
    <style>
        /* [Do not remove] */
        .reg-form {
            background-image: url('shared/assets/img/system/boxes.jpg');
            background-size: cover;
            background-position: center;
        }

        input.is-valid {
            border-color: #28a745;
        }

        input.is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>

<body id="reg">
    <section class="d-flex justify-content-center align-items-center vh-100">
        
        <div class="reg-form text-center m-3">
            <div class="row">
                <div class="poster col d-sm-none d-none d-md-block">

                </div>
                <div class="reg-box p-5 col">
                    <img src="shared/assets/img/system/ecorent-logo-2.png" alt="Logo" class="d-md-none logo">
                    <h1 class="mb-4 mt-2">Create an account</h1>
                    <div class="mb-3">
                        <input type="text" class="input-box form-control" placeholder="First name" id="firstName">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="input-box form-control" placeholder="Last name" id="lastName">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="input-box form-control" placeholder="Email or username" id="email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="input-box form-control" placeholder="Password" id="password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="input-box form-control" placeholder="Confirm password"
                            id="confirmPassword">
                    </div>
                    <div>
                        <a href="index.php"><button class="btn-continue w-100" type="submit">Register</button></a>
                    </div>
                    <div class="text-decoration-none my-4 text-center">
                        <p class="question text-decoration-none"> Already have an account?</p>
                    </div>
                    <div>
                        <a href="login.php"><button class="btn-register w-100">Log In</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

</html>