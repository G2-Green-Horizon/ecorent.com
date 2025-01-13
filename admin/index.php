<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="../shared/assets/img/system/ecorent-logo-2.png">

    <!-- STYLINGS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="../shared/assets/font/font.css">
</head>

<body>

    <!-- Sidebar (Off-canvas) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideBar" aria-labelledby="sideBarLabel">
        <div class="offcanvas-header">
            <div class="logo-brand ps-5 pt-3 pb-3"><img src="../shared/assets/img/system/ecorent-logo-2.png"
                    class="logo"></div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="navigations">
                <div class="nav-button dashboard p-3" id="sidebtn1" onclick="showContent('sidebtn1')">
                    <i class="fa-solid fa-chart-line pe-3"></i> Dashboard
                </div>
                <div class="nav-button pendings p-3" id="sidebtn2" onclick="showContent('sidebtn2')">
                    <i class="fa-solid fa-hourglass-half pe-3"></i> Pending Requests
                </div>
                <div class="nav-button pickups p-3" id="sidebtn3" onclick="showContent('sidebtn3')">
                    <i class="fa-solid fa-box-open pe-3"></i> For Pick-Ups
                </div>
                <div class="nav-button rentals p-3" id="sidebtn4" onclick="showContent('sidebtn4')">
                    <i class="fa-solid fa-book pe-3"></i> Active Rentals
                </div>
                <div class="nav-button listings p-3" id="sidebtn5" onclick="showContent('sidebtn5')">
                    <i class="fa-solid fa-list pe-3"></i> Manage Listings
                </div>
            </div>
            <div class="settings ps-2 pt-5">
                <div class="logout p-3"><i class="fa-solid fa-right-from-bracket pe-3 py-3"></i>Log out</div>
            </div>
        </div>
    </div>

    <!-- Side Bar -->
    <div class="sidebar" id="sideBar">
        <div class="top d-flex">
            <div class="exit my-auto px-2 rounded-3" onclick="hideSidebar()"><i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="logo-brand ps-5 pt-3 pb-3"><img src="../shared/assets/img/system/ecorent-logo-2.png"
                    class="logo"></div>
        </div>
        <div class="navigations">
            <div class="nav-button dashboard p-3" id="btn1" onclick="showContent('btn1')">
                <i class="fa-solid fa-chart-line pe-3"></i> Dashboard
            </div>
            <div class="nav-button pendings p-3" id="btn2" onclick="showContent('btn2')">
                <i class="fa-solid fa-hourglass-half pe-3"></i></i> Pending Requests
            </div>
            <div class="nav-button pickups p-3" id="btn3" onclick="showContent('btn3')">
                <i class="fa-solid fa-box-open pe-3"></i></i>For Pick-Ups
            </div>
            <div class="nav-button rentals p-3" id="btn4" onclick="showContent('btn4')">
                <i class="fa-solid fa-book pe-3"></i></i> Active Rentals
            </div>
            <div class="nav-button listings p-3" id="btn5" onclick="showContent('btn5')">
                <i class="fa-solid fa-list pe-3"></i></i> Manage Listings
            </div>
        </div>
        <div class="settings ps-2 pt-5">
            <div class="logout p-3"><i class="fa-solid fa-right-from-bracket pe-3 py-3"></i>Log out</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- DASHBOARD -->
        <div class="content-card dashboard" id="container1">
            <div class="title">
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>Analytics</h1>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed nobis sequi numquam adipisci voluptas
                    dolorum quo ex optio alias dolore porro quaerat earum tempora harum illum sit, possimus aliquid
                    aliquam.</p>
            </div>
        </div>

        <!-- PENDING REQUEST -->
        <div class="content-card pendings" id="container2">
            <div class="title">
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>Pending Requests</h1>
            </div>
            <div class="content">
                <!-- [PUT CONTENTS HERE] -->
            </div>
        </div>

        <!-- FOR PICK-UPS -->
        <div class="content-card pickups" id="container3">
            <div class="title">
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>For Pick-Ups</h1>
            </div>
            <div class="content">
                <!-- [PUT CONTENTS HERE] -->
            </div>
        </div>

        <!-- ACTIVE RENTALS -->
        <div class="content-card rentals" id="container4">
            <div class="title">
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>Active Rentals</h1>
            </div>
            <div class="content">
                <!-- [PUT CONTENTS HERE] -->
            </div>
        </div>

        <!-- MANAGE LISTINGS -->
        <div class="content-card listings" id="container5">
            <div class="title">
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>Manage Listings</h1>
                <!-- ADD FILTER & BUTTON HERE -->
            </div>
            <div class="content">
                <!-- [PUT CONTENTS HERE] -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/49a3347974.js" crossorigin="anonymous"></script>
    <script>
        var containers = [
            document.getElementById("container1"),
            document.getElementById("container2"),
            document.getElementById("container3"),
            document.getElementById("container4"),
            document.getElementById("container5"),
        ];

        var buttons = [
            document.getElementById("btn1"),
            document.getElementById("btn2"),
            document.getElementById("btn3"),
            document.getElementById("btn4"),
            document.getElementById("btn5"),
        ];

        var sidebuttons = [
            document.getElementById("sidebtn1"),
            document.getElementById("sidebtn2"),
            document.getElementById("sidebtn3"),
            document.getElementById("sidebtn4"),
            document.getElementById("sidebtn5"),
        ];

        var offcanvasElement = document.getElementById('sideBar');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);

        function showContent(btnID) {
            offcanvas.hide();
            var index = btnID[btnID.length - 1] - 1;

            buttons.forEach((button, i) => {
                if (i === index) {
                    button.style.backgroundColor = '#7F9D5A';
                } else {
                    button.style.backgroundColor = '';
                }
            });

            sidebuttons.forEach((sidebutton, i) => {
                if (i === index) {
                    sidebutton.style.backgroundColor = '#7F9D5A';
                } else {
                    sidebutton.style.backgroundColor = '';
                }
            });

            containers.forEach((container, i) => {
                container.style.display = i === index ? 'block' : 'none';
            });
        }

        buttons[0].style.backgroundColor = '#7F9D5A';
        containers[0].style.display = 'block';
        for (let i = 1; i < containers.length; i++) {
            containers[i].style.display = 'none';
        }

        sidebuttons[0].style.backgroundColor = '#7F9D5A';
        containers[0].style.display = 'block';
        for (let i = 1; i < containers.length; i++) {
            containers[i].style.display = 'none';
        }
    </script>

</body>

</html>