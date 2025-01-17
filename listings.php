<?php
include("connect.php");
include("shared/processes/process-index.php");

$filterCategoryQuery = "SELECT * FROM categories";
$filterCategoryResult = executeQuery($filterCategoryQuery);

$cardID = "0";
$categoryID = "0";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRent | Listings</title>
    <link rel="icon" type="image/png" href="shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
</head>

<body id="listings">

    <?php include 'shared/components/navbar.php'; ?>

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
                            <form method="GET" onsubmit="return validatePriceRange()">
                                <?php
                                if (mysqli_num_rows($filterCategoryResult) > 0) {
                                    while ($filterCategory = mysqli_fetch_assoc($filterCategoryResult)) {
                                        $categoryID++;
                                        $checked = (isset($_GET['itemFilter']) && in_array($filterCategory['categoryID'], $_GET['itemFilter'])) ? 'checked' : ''; ?>
                                        <input type="checkbox" class="mt-3" id="<?php echo $categoryID ?>" name="itemFilter[]" value="<?php echo $filterCategory['categoryID']; ?>" <?php echo $checked ?>>
                                        <label for="category1"> <?php echo $filterCategory['categoryName']; ?></label><br>
                                <?php
                                    }
                                }
                                ?>
                                <p class="mt-5">Price Range</p>
                                <div class="d-flex align-items-center">
                                    <input id="min" type="number" class="form-control custom-price text-center"
                                        name="min" value="" placeholder="₱ Min">
                                    <h1> - </h1>
                                    <input id="max" type="number" class="form-control custom-price text-center"
                                        name="max" value="" placeholder="₱ Max">
                                </div>
                        </div>
                        <button class="btn-apply btn-dark mt-3 mx-3" name="applyFilter" value="true">
                            Apply
                        </button>
                        </form>
                    </div>
                </div>

                <div class="col-9">
                    <div class="h2 p-3">
                        SEARCH RESULT FOR “BIKE”
                    </div>
                    <div class="row" id="container item-container">
                        <?php
                        if (mysqli_num_rows($loadItemsResult) > 0) {
                            while ($chosenCategory = mysqli_fetch_assoc($loadItemsResult)) {
                                $cardID++; ?>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex align-items-center justify-content-center">
                                    <div class="card my-3 custom-card items" id="<?php echo $cardID; ?>">
                                        <img src="shared/assets/img/system/bike1.png" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $chosenCategory['itemName']; ?></h5>
                                            <h5 class="card-text"><?php echo $chosenCategory['itemType']; ?></h5>
                                            <h5 class="card-text price"><?php echo "₱" . $chosenCategory['pricePerDay']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="text-center my-3">
                            <button class="btn btn-dark" id="loadMore" onclick="showMore();">
                                SEE MORE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="shared/assets/js/script.js"></script>
    <script src="shared/assets/js/listing.js"></script>
    <script src="shared/assets/js/filter.js"></script>

</html>