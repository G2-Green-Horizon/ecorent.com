document.addEventListener('DOMContentLoaded', () => {
    const radioButtons = document.querySelectorAll('input[name="tab"]');
    const cards = document.querySelectorAll('.rental-card');

    const filterCards = (selectedStatus) => {
        cards.forEach((card) => {
            const cardStatus = card.getAttribute('data-status');

            // FILTER LOGICS
            if (
                selectedStatus === 'all' ||
                (selectedStatus === 'pending' && (cardStatus === 'pending' || cardStatus === 'pickup')) || 
                (selectedStatus === 'onrent' && (cardStatus === 'onrent' || cardStatus === 'overdue' || cardStatus === 'extended')) || 
                cardStatus === selectedStatus 
            ) {
                card.style.display = 'block'; 
            } else {
                card.style.display = 'none';
            }
        });
    };

    const checkedRadio = document.querySelector('input[name="tab"]:checked');
    if (checkedRadio) {
        filterCards(checkedRadio.id);
    }

    radioButtons.forEach((radio) => {
        radio.addEventListener('change', () => {
            filterCards(radio.id);
        });
    });
});

