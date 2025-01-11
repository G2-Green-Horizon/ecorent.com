var preferenceItems = [
    { name: "Tech and Gadgets", pic: "shared/assets/img/preferences/tech-and-gadgets.png" },
    { name: "Photography", pic: "shared/assets/img/preferences/photography.png" },
    { name: "Transporation", pic: "shared/assets/img/preferences/transportation.png" },
    { name: "Sports", pic: "shared/assets/img/preferences/sports.png" },
    { name: "Fashion", pic: "shared/assets/img/preferences/fashion.png" },
    { name: "Event Supplies", pic: "shared/assets/img/preferences/event-supplies.png" },
    { name: "Furnitures", pic: "shared/assets/img/preferences/furnitures.png" },
    { name: "Gaming", pic: "shared/assets/img/preferences/gaming.png" }
];

function displayPreferences() {
    var cardContainer = document.getElementById("cardContainer");

    preferenceItems.forEach(function (item, index) {
        cardContainer.innerHTML += `

            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card my-3" id="preference${index}" onmouseenter="addShadow('preference${index}')" onmouseleave="removeShadow('preference${index}')">
                    <label for="checkbox${index}" class="card-label">
                        <input type="checkbox" id="checkbox${index}" class="checkbox">
                        <div class="checkbox-container">
                                <img src="${item.pic}" class="card-img-top" alt="${item.name}">
                                    <div class="card-title-overlay">
                                        <h5 class="text-white">${item.name}</h5>
                                    </div>
                        </div>
                    </label>
                </div>
            </div>`;
    });
}

function addShadow(id) {
    document.getElementById(id).classList.add("shadow");
}

function removeShadow(id) {
    document.getElementById(id).classList.remove("shadow");
}

displayPreferences();