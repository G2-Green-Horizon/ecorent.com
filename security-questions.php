<?php
include("shared/components/processIndex.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | Set-up</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/font/font.css">

    <style>
        #body-set-up {
            background-color: #282828;
            font-family: 'Studio Feixen Variable', sans-serif;
            color: rgb(255, 255, 255);
        }

        .input-group-text {
            background-color: transparent;
            color: white;
        }

        .form-control {
            background-color: rgb(54, 54, 54);
            color: white;
        }

        .form-select {
            background-color: rgb(54, 54, 54);
            color: white;
        }

        .btn {
            background-color: #D2CBA6;
            color: #343333;
            border: none;
            width: 200px;
            justify-content: center;
        }
    </style>

</head>

<body id="body-set-up">
    <div class="container p-5">
        <h1> <b>Set up security questions</b></h1>
        <p class="mb-5">Please select and answer a few security questions to help you recover your account in case you
            forget your password. These answers will be securely stored and used only for account recovery purposes.</p>

        <div class="col">
            <div class="form-group mb-3">
                <label for="exampleFormControlSelect1">Security Question #1</label>
                <select class="form-select mt-2" id="inputGroupSelect01">
                    <option selected>- Select one -</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Answer</label>
                <input type="email" class="form-control mt-2" id="exampleFormControlInput1">
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlSelect2">Security Question #2</label>
                <select class="form-select mt-2" id="inputGroupSelect02">
                    <option selected>- Select one -</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput2">Answer</label>
                <input type="email" class="form-control mt-2" id="exampleFormControlInput2">
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlSelect3">Security Question #3</label>
                <select class="form-select mt-2" id="inputGroupSelect03">
                    <option selected>- Select one -</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput3">Answer</label>
                <input type="email" class="form-control mt-2" id="exampleFormControlInput3">
            </div>

            <div class="d-flex justify-content-center my-5">
                <button type="submit" class="btn">Confirm</button>
            </div>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>