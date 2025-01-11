<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>logout modal</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/modal.css">
</head>

<body>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete Account
    </button>

    <section class="container">
        <!-- Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-theme="dark">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  w-100 text-center fs-4" id="confirmationLogout">Delete Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        Are you sure you want to permanently delete your account? This action is irreversible, and you
                        will lose access to your account and its data forever.
                    </div>
                    <div class="container d-flex justify-content-end my-3">
                        <button type="submit" class="btn-delete-denied text-center mx-2 p-2" data-bs-dismiss="modal"
                            name="btnDenied">No, I want to keep it</button>
                        <button type="submit" class="btn-delete-confirmed text-center" name="btnConfirmed">Yes, I want to delete</button>
                    </div>
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