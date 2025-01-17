function validatePriceRange() {
    const minPrice = document.getElementById('min');
    const maxPrice = document.getElementById('max');

    if (minPrice.value == "0" || maxPrice.value == "0") {
        minPrice.value = "";
        maxPrice.value = "";
        minPrice.placeholder = "Can't Be";
        maxPrice.placeholder = "Zero";
        return false;
    }

    if ((minPrice.value && !maxPrice.value) || (!minPrice.value && maxPrice.value)) {
        minPrice.value = "";
        maxPrice.value = "";
        minPrice.placeholder = "Can't Be";
        maxPrice.placeholder = "Zero";
        return false;
    }

    return true;
}