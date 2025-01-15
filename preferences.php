<?php
// include("shared/components/processIndex.php");
include("shared/processes/preferences-process.php");
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
<style>
    /* Do not remove, for error handling */
    .card.highlight {
    border: 2px #D2CBA6; 
    box-shadow: 0 0 10px #D2CBA6;
}

</style>

<body>
    <?php include 'shared/components/navbar.php'; ?>
    <div class="container">
    <form method="POST" onsubmit="return validateForm()">
    <input type="hidden" id="errorFlag" name="errorFlag" value="0">
    <div class="row mt-4 mb-4">
        <div class="col">
            <h1>What are you interested in?</h1>
        </div>
        <div id="errorMessage" class="text-error mt-2" style="display: none; color: #D2CBA6">
            Choose at least one category.
        </div>
    </div>

        <div class="row" id="cardContainer">
        </div>

        <div class="row">
            <div class="d-flex gap-2 justify-content-center justify-content-md-end mb-5 mt-2">
                <a href="index.php" class="text-decoration-none">
                    <button class="btn btn-skip"name="btnSkip" type="button">Skip for now</button>
                </a>
                <a href="" class="text-decoration-none">
                    <button class="btn btn-continue" name="btnContinue" type="submit">Continue</button>
                </a>
            </div>
        </div>
        </form>
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/preferences.js"></script>
</body>

</html>