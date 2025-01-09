
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | Homepage</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/style.css">
</head>

<body id="homepage">

    <div class="container my-3 p-4 rounded-5" style="background-color: #343333;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <!-- Carousel Content -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 1">
                        </div>
                        <div class="col-md-4 d-flex flex-column gap-2">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 2">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 3">
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 4">
                        </div>
                        <div class="col-md-4 d-flex flex-column gap-2">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 5">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 6">
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 7">
                        </div>
                        <div class="col-md-4 d-flex flex-column gap-2">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 8">
                            <img src="shared/assets/img/system/caro1.png" class="w-100 rounded-5" alt="Slide 9">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="container my-3">
        <div class="row justify-content-between g-3">

            <div class="col-12 col-sm-6 col-md-4 col-lg-auto">
                <div class="d-flex align-items-center p-3 rounded-pill"
                    style="background-color: #343333;">
                    <img src="shared/assets/img/system/circle1.png" class="img-fluid me-2"
                        style="width: 55px; height: auto;">
                    <h5 class="mb-0">Electronics</h5>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-4 col-lg-auto">
                <div class="d-flex align-items-center p-3 rounded-pill"
                    style="background-color: #343333;">
                    <img src="shared/assets/img/system/circle1.png" class="img-fluid me-2"
                        style="width: 55px; height: auto;">
                    <h5 class="mb-0">Transportation</h5>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="d-flex align-items-center p-3 rounded-pill"
                    style="background-color: #343333;">
                    <img src="shared/assets/img/system/circle1.png" class="img-fluid me-2"
                        style="width: 55px; height: auto;">
                    <h5 class="mb-0">Fashion</h5>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                <div class="d-flex align-items-center p-3 rounded-pill"
                    style="background-color: #343333;">
                    <img src="shared/assets/img/system/circle1.png" class="img-fluid me-2"
                        style="width: 55px; height: auto;">
                    <h5 class="mb-0">Sports</h5>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                <div class="d-flex align-items-center p-3 rounded-pill"
                    style="background-color: #343333;">
                    <img src="shared/assets/img/system/circle1.png" class="img-fluid me-2"
                        style="width: 55px; height: auto;">
                    <h5 class="mb-0">Events</h5>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col">
                    <div class="h2">
                        Just for you
                    </div>
                </div>
            </div>
            <div class="row" id="container">
            </div>

            <div class="text-center my-3">
                <button class="btn btn-dark">
                    SEE MORE
                </button>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>

    <script>
        var itemNames = ["TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain", "TrailMaster X200 Mountain"];
        var pics = ["bike1.png", "bike1.png", "bike1.png", "bike1.png", "bike1.png", "bike1.png", "bike1.png", "bike1.png"];
        var prices = ["₱100", "₱100", "₱100", "₱100", "₱100", "₱100", "₱100", "₱100"];

        for (var i = 0; i < itemNames.length; i++) {
            var container = document.getElementById("container");
            container.innerHTML += `
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card my-3 custom-card" id="card${i}">
                <img src="shared/assets/img/system/${pics[i]}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">${itemNames[i]}</h5>
                    <h5 class="card-text">Bike</h5>
                    <h5 class="card-text price">${prices[i]}</h5>
                </div>
            </div>
        </div>
    `;
        }
    </script>

</body>

</html>