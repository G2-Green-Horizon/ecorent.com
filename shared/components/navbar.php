<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$categoryQuery = "SELECT * FROM categories";
$categoryResult = executeQuery($categoryQuery);

if (isset($_GET['setCategory'])) {
    $chosenCategory = $_GET['setCategory'];

    $loadItemsQuery = "SELECT items.*, attachments.*, categories.* FROM items INNER JOIN attachments ON items.itemID = attachments.itemID INNER JOIN categories ON items.categoryID = categories.categoryID WHERE items.categoryID = '$chosenCategory' AND items.isDeleted ='No'";
    $loadItemsResult = executeQuery($loadItemsQuery);

    if ($currentPage != 'listings.php') {
        header("Location: listings.php?setCategory=" . $chosenCategory);
        exit();
    }
} else {
    $loadItemsQuery = "SELECT items.*, attachments.*, categories.* FROM items INNER JOIN attachments ON items.itemID = attachments.itemID INNER JOIN categories ON items.categoryID = categories.categoryID WHERE items.isDeleted = 'No'";
    $loadItemsResult = executeQuery($loadItemsQuery);
}

if (isset($_GET['applyFilter'])) {
    if (!empty($_GET['itemFilter']) && is_array($_GET['itemFilter'])) {
        $selectedCategories = $_GET['itemFilter'];
        $categoriesList = implode(",", $selectedCategories);

        $loadItemsQuery = "SELECT items.*, attachments.*, categories.* FROM items INNER JOIN attachments ON items.itemID = attachments.itemID INNER JOIN categories ON items.categoryID = categories.categoryID WHERE items.categoryID IN ($categoriesList) AND items.isDeleted ='No'";

        if (!empty($_GET['min']) && !empty($_GET['max'])) {
            $minPrice = (int)$_GET['min'];
            $maxPrice = (int)$_GET['max'];
            $loadItemsQuery .= " AND items.pricePerDay BETWEEN $minPrice AND $maxPrice";
        }
    } else {
        if (!empty($_GET['min']) && !empty($_GET['max'])) {
            $minPrice = (int)$_GET['min'];
            $maxPrice = (int)$_GET['max'];
            $loadItemsQuery = "SELECT items.*, attachments.*, categories.* FROM items INNER JOIN attachments ON items.itemID = attachments.itemID INNER JOIN categories ON items.categoryID = categories.categoryID WHERE items.isDeleted = 'No' AND items.pricePerDay BETWEEN $minPrice AND $maxPrice";
        } else {
            $loadItemsQuery = "SELECT items.*, attachments.*, categories.* FROM items INNER JOIN attachments ON items.itemID = attachments.itemID INNER JOIN categories ON items.categoryID = categories.categoryID WHERE items.isDeleted = 'No'";
        }
    }
}
$loadItemsResult = executeQuery($loadItemsQuery);
?>

<nav class="navbar navbar-expand-lg border-bottom py-2">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <img src="shared/assets/img/system/ecorent-logo.png" alt="Logo" class="logo me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="input-group mx-auto mb-3">
                <input type="text" class="form-control dark-input" placeholder="Search for items">
                <button class="navbar-btn" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <button class="navbar-btn rounded-5 me-2">
                    <i class="bi bi-cart"></i>
                </button>
                <a href="my-account.php">
                    <button class="navbar-btn rounded-5">
                        <i class="bi bi-person-circle"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="nav2">
        <div class="container">
            <ul class="nav justify-content-center">
                <?php
                if (mysqli_num_rows($categoryResult) > 0) {
                    while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                        <form method="GET" id="submitCategory<?php echo $category['categoryID']; ?>">
                            <input type="hidden" name="setCategory" value="<?php echo $category['categoryID']; ?>">
                            <li class="nav-item">
                                <button class="nav-link text-dark" onclick="submitForm(<?php echo $category['categoryID']; ?>);">
                                    <?php echo $category['categoryName']; ?>
                                </button>
                            </li>
                        </form>
                <?php
                    }
                }
                ?>

            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function submitForm(categoryID) {
        document.getElementById('submitCategory' + categoryID).submit();
    }
</script>