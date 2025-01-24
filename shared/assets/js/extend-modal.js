function updateTotalPrice(rentalID) {
    const rentalPeriod = document.getElementById(`rentalPeriod${rentalID}`);
    const totalPriceElement = document.getElementById(`totalPrice${rentalID}`);
    const pricePerDay = parseFloat(document.getElementById(`priceperDay${rentalID}`).dataset.unitPrice);

    const rentalDays = parseInt(rentalPeriod.value) || 0;
    const total = rentalDays * pricePerDay;
    totalPriceElement.textContent = `₱${total.toFixed(2)}`;
    document.getElementById(`priceperDay${rentalID}`).value = total.toFixed(2);
}

function increaseRentalPeriod(rentalID) {
    const rentalPeriod = document.getElementById(`rentalPeriod${rentalID}`);
    rentalPeriod.stepUp();
    updateTotalPrice(rentalID);
}

function decreaseRentalPeriod(rentalID) {
    const rentalPeriod = document.getElementById(`rentalPeriod${rentalID}`);
    if (rentalPeriod.value > 1) {
        rentalPeriod.stepDown();
        updateTotalPrice(rentalID);
    }
}
