
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | Register</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/style.css">
</head>

<body>

    <section class="container">
        <div class="row align-items-center">
            
            <!-- Logo Column -->
            <div class="col text-center">
                <img src="shared/assets/img/system/test1.png" class="img-fluid d-none d-md-block" alt="Logo">
            </div>

            <!-- Form Column -->
            <div class="col-md-6 p-5">
                <h2 class="mb-4 text-center">Create an account</h2>
                
                    <div class="mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="First Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="mb-3">
                        <a href="index.php"><button type="submit" class="btn btn-dark w-100">Register</button></a>
                    </div>
                    <div class="text-center mb-3">
                        <a href="Login.php" class="text-decoration-none">Already have an account?</a>
                    </div>
                    <div>
                        <a href="login.php"><button type="button" class="btn btn-outline-dark w-100">Log In</button></a>
                    </div>
                
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>

</body>

</html>

</html>