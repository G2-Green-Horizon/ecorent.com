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
                                1,500 <span>kg CO₂</span>
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
                            12
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
                            15
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
                            145
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
                            ₱23,000.00
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
                                    235
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
                                    235
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CHARTS -->
            <div class="row row-gap-2 mt-2 mb-4">
                <div class="col-12 col-md-7 px-0">
                    <div class="" >
                        <canvas id="bar"></canvas>
                    </div>
                </div>
                <div class="col-12 col-md-5 ps-2 pe-0">
                    <div class=" ps-5">
                        <canvas id="doughnut"  ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>