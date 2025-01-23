<?php
include("connect.php");
include("shared/processes/process-index.php");

$filterCategoryQuery = "SELECT * FROM categories";
$filterCategoryResult = executeQuery($filterCategoryQuery);

$itemID = isset($_GET['itemID']) ? $_GET['itemID'] : null;

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="shared/assets/css/my-account.css">
    <link rel="stylesheet" href="shared/assets/css/listings.css">
    <link rel="stylesheet" href="shared/assets/css/footerNav.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="shared/assets/font/font.css">
</head>

<body class="listings">

    <?php include 'shared/components/navbar.php'; ?>

    <div class="container listing-container">
        <div class="row my-2 p-2">
            <!-- Search Filter (Sidebar) -->
            <div class="col-12 col-md-5 col-lg-4 col-xl-3 mb-3">
                <div class="card-filter p-3">
                    <div class="card-title d-flex align-items-center">
                        <i class="bi bi-funnel mx-2"></i>
                        <h4>Search Filter</h4>
                    </div>
                    <div class="card-text">
                        <p class="my-3">By Category</p>
                        <form method="GET" onsubmit="return validatePriceRange()">
                            <?php
                            if (mysqli_num_rows($filterCategoryResult) > 0) {
                                while ($filterCategory = mysqli_fetch_assoc($filterCategoryResult)) {
                                    $categoryID++;
                                    $checked = (isset($_GET['itemFilter']) && in_array($filterCategory['categoryID'], $_GET['itemFilter'])) ? 'checked' : ''; ?>
                                    <input type="checkbox" class="mt-3" id="<?php echo $categoryID ?>" name="itemFilter[]"
                                        value="<?php echo $filterCategory['categoryID']; ?>" <?php echo $checked ?>>
                                    <label for="category<?php echo $categoryID; ?>">
                                        <?php echo $filterCategory['categoryName']; ?></label><br>
                                    <?php
                                }
                            }
                            ?>
                            <p class="mt-5">Price Range</p>
                            <div class="d-flex align-items-center">
                                <input id="min" type="number" step="0.01" class="form-control custom-price text-center"
                                    name="min" value="" placeholder="₱ Min">
                                <h1> - </h1>
                                <input id="max" type="number" step="0.01" class="form-control custom-price text-center"
                                    name="max" value="" placeholder="₱ Max">
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn-apply btn-dark mt-3 mx-3" name="applyFilter" value="true">
                                    Apply
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Search Results (Main Content) -->
            <div class="col-sm-12 col-md-7 col-lg-8  col-xl-9">

                <div class="h4 p-3 text-uppercase">
                    <?php
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $searchTerm = htmlspecialchars($_GET['search']);
                        echo "SEARCH RESULT FOR " . $searchTerm . "";
                    } elseif (isset($_GET['setCategory']) && !empty($_GET['setCategory'])) {
                        $categoryID = $_GET['setCategory'];
                        $categoryQuery = "SELECT categoryName FROM categories WHERE categoryID = '$categoryID'";
                        $categoryResult = executeQuery($categoryQuery);

                        if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
                            $category = mysqli_fetch_assoc($categoryResult);
                            $categoryName = htmlspecialchars($category['categoryName']);
                            echo "" . $categoryName . "";
                        } else {
                            echo "CATEGORY: Unknown";
                        }
                    } else {
                        echo "Search Filter";
                    }
                    ?>
                </div>
                <div class="row" class="container item-container" id="container item-container">
                    <?php
                    if (mysqli_num_rows($loadItemsResult) > 0) {
                        while ($chosenCategory = mysqli_fetch_assoc($loadItemsResult)) {
                            $cardID++; ?>
                            <div
                                class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 my-3 mx-0 d-flex align-items-center justify-content-center flex-wrap">
                                <<input type="hidden" name="itemID" value="<?php echo $chosenCategory['itemID']; ?>">
                                    <a href="product-page.php?id=<?php echo $chosenCategory['itemID']; ?>" style="text-decoration: none;">
                                        <div class="card custom-card items" id="<?php echo $cardID; ?>">
                                            <img src="shared/assets/img/system/items/<?php echo $chosenCategory['fileName']; ?>"
                                                class="card-img-top" alt="">
                                            <div class="card-body">
                                                <h6 class="card-title item"><?php echo $chosenCategory['itemName']; ?></h6>
                                                <h6 class="card-text"><?php echo $chosenCategory['itemType']; ?></h6>
                                            </div>
                                            <div class="card-footer">
                                                <h6 class="card-text price ms-3">
                                                    <?php echo "₱" . $chosenCategory['pricePerDay']; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12 d-flex align-items-center justify-content-center text-white">';
                        echo '<p>No items found matching your search or filter criteria.</p>';
                        echo '</div>';
                    }
                    ?>
                    <div class="text-center mt-4">
                        <button class="btn btn-dark" id="loadMore" onclick="showMore();">
                            SEE MORE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="shared/assets/js/script.js"></script>
    <script src="shared/assets/js/listing.js"></script>
    <script src="shared/assets/js/filter.js"></script>
</body>

</html>