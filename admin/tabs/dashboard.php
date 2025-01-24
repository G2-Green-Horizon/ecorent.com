<?php
// QUERIES FOR CHARTS
// GET CURRENT YEAR AND MONTH
$currentYear = date('Y');
$currentMonth = date('m');

// QUERY FOR BAR CHART TOTAL GAS EMISSIONS SAVED PER MONTH 
$monthlyCO2Saved = [];
for ($month = 1; $month <= 12; $month++) {
    $co2Query = "SELECT SUM(totalCO2Saved) AS totalCO2Saved FROM rentals WHERE rentalStatus != 'cancelled' AND MONTH(startRentalDate) = $month AND YEAR(startRentalDate) = $currentYear";
    $co2Result = executeQuery($co2Query);
    $co2Data = mysqli_fetch_assoc($co2Result);
    $monthlyCO2Saved[] = $co2Data['totalCO2Saved'] ?? 0;
}
$monthlyCO2SavedJson = json_encode($monthlyCO2Saved);

// QUERY FOR DOUGHNUT CHART TOTAL ITEMS SAVED PER CATEGORY
$categoryQuery = "SELECT categoryName, COUNT(itemID) AS itemCount FROM categories LEFT JOIN items ON categories.categoryID = items.categoryID GROUP BY categories.categoryID;";
$categoryResult = executeQuery($categoryQuery);

$categoryNames = [];
$itemCounts = [];

while ($categoryData = mysqli_fetch_assoc($categoryResult)) {
    $categoryNames[] = $categoryData['categoryName'];
    $itemCounts[] = $categoryData['itemCount'];
}
$categoryNamesJson = json_encode($categoryNames);
$itemCountsJson = json_encode($itemCounts);

// QUERIES FOR ANALYTICS DATA (CO2 SAVED, EARNINGS, PENDING REQUESTS, ACTIVE RENTALS, RETURNS, TOTAL LISTINGS, TOTAL USERS)
// QUERY FOR TOTAL GAS EMISSIONS SAVED THIS MONTH
$co2Query = "SELECT SUM(totalCO2Saved) AS totalCO2Saved FROM rentals WHERE rentalStatus != 'cancelled' AND MONTH(startRentalDate) = $currentMonth AND YEAR(startRentalDate) = $currentYear";
$co2Result = executeQuery($co2Query);
$co2Data = mysqli_fetch_assoc($co2Result);
$totalCO2Saved = $co2Data['totalCO2Saved'] ?? 0;
$formattedCO2Saved = number_format($totalCO2Saved, 0);

// QUERY FOR TOTAL EARNINGS
$earningsQuery = "SELECT SUM(totalPrice) AS totalEarnings FROM rentals WHERE rentalStatus != 'cancelled'";
$earningsResult = executeQuery($earningsQuery);
$earningsData = mysqli_fetch_assoc($earningsResult);
$totalEarnings = $earningsData['totalEarnings'];
$formattedEarnings = '₱' . number_format($totalEarnings, 2);

// QUERY FOR PENDING REQUESTS
$pendingQuery = "SELECT COUNT(*) AS pendingRequests FROM rentals WHERE rentalStatus = 'pending'";
$pendingResult = executeQuery($pendingQuery);
$pendingRequest = mysqli_fetch_assoc($pendingResult);
$pendingRequests = $pendingRequest['pendingRequests'];

// QUERY FOR ACTIVE RENTALS
$rentalsQuery = "SELECT COUNT(*) AS activeRentals FROM rentals WHERE rentalStatus = 'on rent'";
$rentalsResult = executeQuery($rentalsQuery);
$activeRental = mysqli_fetch_assoc($rentalsResult);
$activeRentals = $activeRental['activeRentals'];

// QUERY FOR RETURNS
$returnsQuery = "SELECT COUNT(*) AS returnedRentals FROM rentals WHERE rentalStatus = 'returned'";
$returnsResult = executeQuery($returnsQuery);
$returnedRental = mysqli_fetch_assoc($returnsResult);
$returnedRentals = $returnedRental['returnedRentals'];

// QUERY FOR TOTAL LISTINGS 
$listingsQuery = "SELECT COUNT(itemID) AS totalListings FROM items";
$listingsResult = executeQuery($listingsQuery);
$listingsData = mysqli_fetch_assoc($listingsResult);
$totalListings = $listingsData['totalListings'];

// QUERY FOR TOTAL USERS
$usersQuery = "SELECT COUNT(*) AS totalUsers FROM users";
$usersResult = executeQuery($usersQuery);
$usersData = mysqli_fetch_assoc($usersResult);
$totalUsers = $usersData['totalUsers'];
?>

<!-- DASHBOARD TAB -->
<div class="content-card dashboard me-md-4" id="container1">
    <div class="title">
        <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
            <i class="fa-solid fa-bars"></i>
        </div>
        <h1>Analytics</h1>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2 row-gap-2">
                <div class="col-12 px-0">
                    <div class="analysis-item">
                        <div class="co2-data p-3">
                            <div class="label d-flex">
                                <p class="me-auto">Total gas emissions saved this month</p>
                                <i class="fa-solid fa-leaf"></i>
                            </div>
                            <div class="data text-start">
                                <?php echo $formattedCO2Saved; ?> <span>kg CO₂</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2 row-gap-2">
                <div class="col-12 col-lg-4 ps-0 pe-0 pe-md-0 pe-lg-2">
                    <div class="analysis-item p-3">
                        <div class="label d-flex">
                            <p class="me-auto">Pending Requests</p>
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                        <div class="data">
                            <?php echo $pendingRequests; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 ps-0 pe-0 pe-md-0 pe-lg-2">
                    <div class="analysis-item p-3">
                        <div class="label d-flex">
                            <p class="me-auto">Active Rentals</p>
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div class="data">
                            <?php echo $activeRentals; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 ps-0 pe-0">
                    <div class="analysis-item p-3">
                        <div class="label d-flex">
                            <p class="me-auto">Returns</p>
                            <i class="fa-solid fa-rotate-left"></i>
                        </div>
                        <div class="data">
                            <?php echo $returnedRentals; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-gap-2">
                <div class="col-12 col-lg-6 ps-0 pe-0 pe-md-0 pe-lg-2">
                    <div class="analysis-item p-3">
                        <div class="label d-flex">
                            <p class="me-auto">Total earnings</p>
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="data highlight">
                            <?php echo $formattedEarnings; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 px-0 ps-0">
                    <div class="row row-gap-2 ">
                        <div class="col-12 col-md-12 col-lg-6 pe-2 pe-md-2">
                            <div class="analysis-item p-3">
                                <div class="label d-flex">
                                    <p class="me-auto">Total Listings</p>
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <div class="data highlight">
                                    <?php echo $totalListings; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 ps-2 ps-lg-0 ps-md-2">
                            <div class="analysis-item p-3">
                                <div class="label d-flex">
                                    <p class="me-auto">Total Users</p>
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <div class="data highlight">
                                    <?php echo $totalUsers; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CHARTS -->
            <div class="row row-gap-2 mt-2 mb-4">
                <div class="col-12 col-md-7 px-0">
                    <div class="">
                        <canvas id="bar"></canvas>
                    </div>
                </div>
                <div class="col-12 col-md-5 ps-2 pe-0">
                    <div class=" ps-5">
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const monthlyCO2SavedData = <?php echo $monthlyCO2SavedJson; ?>;
        const categoryNames = <?php echo $categoryNamesJson; ?>;
        const itemCounts = <?php echo $itemCountsJson; ?>;
    </script>
</div>