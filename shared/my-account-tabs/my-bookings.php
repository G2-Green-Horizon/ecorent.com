<div class="content-card bookings" id="container2">
    <div class="content">
        <div class="my-bookings d-block rounded-4">
            <div class="wrapper">
                <nav>
                    <input type="radio" name="tab" id="pending" checked>
                    <input type="radio" name="tab" id="pickup">
                    <input type="radio" name="tab" id="onrent">
                    <input type="radio" name="tab" id="returned">
                    <input type="radio" name="tab" id="cancelled">
                    <label for="pending" class="pending"><a href="#"><span class="tab-text">Pending</span></a></label>
                    <label for="pickup" class="pickup"><a href="#"><span class="tab-text">For
                                Pick-Up</span></a></label>
                    <label for="onrent" class="onrent"><a href="#"><span class="tab-text">On
                                Rent</span></a></label>
                    <label for="returned" class="returned"><a href="#"><span
                                class="tab-text">Returned</span></a></label>
                    <label for="cancelled" class="cancelled"><a href="#"><span
                                class="tab-text">Cancelled</span></a></label>
                    <div class="tab">
                    </div>
                </nav>
            </div>
            <div class="item-status-list">
                <!-- RENTAL STATUS CARDS -->
                <?php foreach ($rentalList as $rentalCard) { ?>
                    <div class="rental-card" data-status="<?= $rentalCard->status; ?>">
                        <?= $rentalCard->buildRentalCard(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>