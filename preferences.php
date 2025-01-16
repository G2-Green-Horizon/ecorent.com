<?php
include("shared/processes/process-index.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Pick Your Categories</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/preferences.css ">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">
</head>

<body>
    <?php include 'shared/components/navbar.php'; ?>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <h1>What are you interested in?</h1>
            </div>
        </div>

        <div class="row" id="cardContainer">
        </div>

        <div class="row">
            <div class="d-flex gap-2 justify-content-center justify-content-md-end mb-5 mt-2">
                <a href="./" class="text-decoration-none">
                    <button class="btn btn-skip" type="button">Skip for now</button>
                </a>
                <a href="./" class="text-decoration-none">
                    <button class="btn btn-continue" type="button">Continue</button>
                </a>
            </div>
        </div>
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/preferences.js"></script>
</body>

</html>