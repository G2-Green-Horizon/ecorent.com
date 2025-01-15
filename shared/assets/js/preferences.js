var preferenceItems = [
    { id: 1, name: "Tech and Gadgets", pic: "shared/assets/img/preferences/tech-and-gadgets.png" },
    { id: 1, name: "Photography", pic: "shared/assets/img/preferences/photography.png" },
    { id: 2, name: "Transporation", pic: "shared/assets/img/preferences/transportation.png" },
    { id: 4, name: "Sports", pic: "shared/assets/img/preferences/sports.png" },
    { id: 3, name: "Fashion", pic: "shared/assets/img/preferences/fashion.png" },
    { id: 5, name: "Event Supplies", pic: "shared/assets/img/preferences/event-supplies.png" },
    { id: 5, name: "Furnitures", pic: "shared/assets/img/preferences/furnitures.png" },
    { id: 1, name: "Gaming", pic: "shared/assets/img/preferences/gaming.png" }
];

function displayPreferences() {
    var cardContainer = document.getElementById("cardContainer");

    preferenceItems.forEach(function (item, index) {
        cardContainer.innerHTML += `

            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card my-3" id="preference${index}" onmouseenter="addShadow('preference${index}')" onmouseleave="removeShadow('preference${index}')">
                    <label for="checkbox${index}" class="card-label">
                        <input type="checkbox" id="checkbox${index}" class="checkbox" name="preferences[]" value="${item.id}">
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

// Validate form function to check if the user selected a category on preferences page.
function validateForm() {
    const selectedCategories = document.querySelectorAll('input[name="preferences[]"]:checked');
    const categoryCards = document.querySelectorAll('.card');
    const errorMessage = document.getElementById('errorMessage'); 

    categoryCards.forEach(card => {
        card.classList.remove('highlight');
    });

    // If no categories are selected.
    if (selectedCategories.length === 0) {
        categoryCards.forEach(card => {
            card.classList.add('highlight');
        });

        //Display error message.
        errorMessage.style.display = 'block';

        document.getElementById('errorFlag').value = '1'; 
        return false;  
    }

    // Hide error message if categories are selected.
    errorMessage.style.display = 'none';
    return true; 
}

displayPreferences();