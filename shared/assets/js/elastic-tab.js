document.addEventListener('DOMContentLoaded', () => {

    const radioButtons = document.querySelectorAll('input[name="tab"]');
    const cards = document.querySelectorAll('.rental-card');

    const filterCards = (selectedStatus) => {
        cards.forEach((card) => {
            if (card.getAttribute('data-status') === selectedStatus || selectedStatus === 'all') {
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

