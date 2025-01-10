<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ecorent | Listings</title>

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/style.css">
</head>

<body id="listings">

    <section>

        <div class="container">
            <div class="row my-3 ">
                <div class="col-sm-12 col-md-9 col-lg-3 col-xl-3">
                    <div class="card p-3">
                        <div class="card-title d-flex align-items-center">
                            <i class="bi bi-funnel mx-2"></i>
                            <h2>Search Filter</h2>
                        </div>

                        <div class="card-text mx-3">
                            <p class="my-3">By Category</>
                            <form>
                                <input type="checkbox" class="mt-3" id="category1" name="category1" value="category1">
                                <label for="category1"> Tech & Gadgets</label><br>
                                <input type="checkbox" class="mt-3" id="category2" name="category2" value="category2">
                                <label for="category2"> Sport & Outdoor Gear</label><br>
                                <input type="checkbox" class="mt-3" id="category3" name="category3" value="category3">
                                <label for="category3"> Fashion & Accessories</label><br>
                                <input type="checkbox" class="mt-3" id="category4" name="category4" value="category4">
                                <label for="category4"> Event Suppies</label><br>
                                <input type="checkbox" class="mt-3" id="category5" name="category5" value="category5">
                                <label for="category5"> Others</label><br>
                            </form>

                            <p class="mt-5">Price Range</p>
                            <form>
                                <div class="d-flex align-items-center">
                                    <input type="number" class="form-control custom-price" id="min" name="min"
                                        placeholder="₱ Min">
                                    <h1> - </h1>
                                    <input type="number" class="form-control custom-price" id="max" name="max"
                                        placeholder="₱ Max">
                                </div>
                            </form>
                        </div>

                        <button class="btn-apply btn-dark mt-3 mx-3">
                            Apply
                        </button>
                    </div>
                </div>

                <div class="col-9">
                    <div class="h2 p-3">
                        SEARCH RESULT FOR “BIKE”
                    </div>
                    <div class="row" id="container">
                    </div>
                </div>
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
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex align-items-center justify-content-center">
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