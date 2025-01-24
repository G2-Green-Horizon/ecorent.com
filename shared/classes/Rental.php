<?php

include("shared/classes/Item.php");
include("shared/classes/User.php");
class Rental
{
    public $rentalID;
    public $itemID;
    public $renterID;
    public $itemName;
    public $itemDisplayImg;
    public $status;
    public $reservationDate;
    public $pickupDate;
    public $rentalPeriod;
    public $dueDate;
    public $renter;
    public $renterAddress;
    public $itemAddress;
    public $totalSavedCO2;
    public $itemUnitPrice;
    public $itemQuantity;
    public $itemSecurityDeposit;
    public $totalAmountPayable;
    public $renterMessage;
    public function __construct($rentalID, $itemID, $renterID)
    {
        $this->rentalID = $rentalID;
        $this->itemID = $itemID;
        $this->renterID = $renterID;

        // DEFAULT ADDRESS
        $this->itemAddress = 'Brgy. San Antonio, Sto.Tomas, Batangas';
    }

    function getRentalsData()
    {
        $query = "SELECT * FROM rentals 
        LEFT JOIN items ON rentals.itemID = items.itemID
        LEFT JOIN attachments ON items.itemID = attachments.itemID
        ORDER BY rentals.rentalID DESC";
        $result = executeQuery($query);

        $rentals = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $r = new Rental($row['rentalID'], $row['itemID'], $row['renterID']);
            $r->renterID = $row['renterID'];
            $r->itemName = $row['itemName'];
            $r->status = $row['rentalStatus'];
            $r->itemDisplayImg = $row['fileName'];
            $r->reservationDate = $row['reservationDate'];
            $r->pickupDate = $row['startRentalDate'];
            $r->dueDate = $row['endRentalDate'];
            $r->rentalPeriod = $row['rentalPeriod'];
            $r->itemUnitPrice = $row['pricePerDay'];
            $r->itemQuantity = $row['itemQuantity'];
            $r->totalAmountPayable = $row['totalPrice'];

            array_push($rentals, $r);
        }

        return $rentals;
    }

    // BUILD RENTAL STATUS CARD FOR USER VIEW
    function buildRentalCard()
    {
        return '<div class="item-card mt-3 p-3" id="'. $this->rentalID . '">
                                <div class="row">
                                    <div class="top col-12 col-md-8 d-flex order-md-1 order-2">
                                        <img src="shared/assets/img/system/items/' . $this->itemDisplayImg . '" alt=""
                                            class="item-display-img img-fluid">
                                        <div class="item-info ps-2 ps-xl-3 pt-3 pt-md-3 pt-xl-0 d-flex flex-column">
                                            <h3 class="item-name">' . $this->itemName . '</h3>
                                            <div class="location">
                                                <i class="fa-solid fa-location-dot"></i><span
                                                    class="ps-2 location">' . $this->itemAddress . '</span>
                                            </div>
                                            <div class="rental-time">
                                                <i class="fa-regular fa-clock"></i><span class="ps-2 rental-time">Rented
                                                    for
                                                    ' . $this->rentalPeriod . ' days</span>
                                            </div>
                                            <div class="basket">
                                                <i class="fa-solid fa-basket-shopping"></i><span
                                                    class="ps-2 quantity">x' . $this->itemQuantity . '</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 order-md-2 order-1 mb-3">
                                        ' . $this->showBadge($this->status) . '
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="transac">
                                    <div class="p-2 w-100">
                                        <div class="time-period ' . $this->showInfo($this->status) . '">
                                            <div class="time-remaining">
                                                <i class="fa-regular fa-clock"></i>
                                                Time remaining:<span class="ps-2 rental-time">00:00:00</span>
                                                <span class="alert-icon ' . $this->showTimeAlert($this->status) . ' ps-2"><i
                                                        class="fa-solid fa-circle-exclamation"
                                                        style="color:#D10D0D"></i></span>
                                            </div>
                                            <div class="due">
                                                <i class="fa-regular fa-calendar"></i>
                                                Due:<span class="ps-2 rental-time">01/12/2025</span>
                                            </div>
                                        </div>
                                        <div class="status-tip py-2 py-lg-3">
                                            ' . $this->showTip($this->status) . '
                                        </div>
                                    </div>
                                    <div class="p-2 flex-shrink-1">
                                        <div class="total-payment d-flex">
                                            <span class="d-flex align-items-center">
                                                 Total payment upon return:</span>
                                            <span class="payment-number ps-5 text-end">₱' . $this->totalAmountPayable . '</span>
                                        </div>
                                        ' . $this->showActionButton($this->status) . '
                                    </div>
                                </div>
                            </div>';
    }

    // BUILD RENTAL STATUS CARD FOR ADMIN VIEW
    function buildAdminRentalCard()
    {
        return '<div class="row">
                        <a href="#" class="active-rentals">
                            <div class="card-body-rentals">
                                <div class="rentals-content">
                                    <div class="order-content">
                                        <img src="assets/img/system/items/' . $this->itemDisplayImg . '" alt="" class="img-fluid">
                                        <h4>' . $this->itemName . '</h4>
                                    </div>
                                    <div class="actions">
                                        <button class="btn-hand-in d-none btn-update-status rounded-3 mx-2 mx-md-5">RECEIVED</button>
                                        <a href="transaction-page.php?rentalID=' . $this->rentalID . '">
                                            <div class="btn-see-details rounded-4">
                                                <button class=""><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
    }

    // DYNAMIC SETTINGS FUNCTIONS FOR RENTAL STATUS CARD (USER VIEW)
    function showInfo($status)
    {
        switch ($status) {
            case 'pending':
                return 'd-none';
            case 'pickup':
                return 'd-none';
            case 'on rent':
                return 'd-block';
            case 'returned';
                return 'd-none';
            case 'cancelled':
                return 'd-none';
            default:
                return 'd-block';
        }
    }
    function showTip($status)
    {
        switch ($status) {
            case 'pending':
                return 'Waiting for your item to be approved.';
            case 'pickup':
                return 'Please pick-up your item at ' . $this->itemAddress . ' on ' . $this->reservationDate . '.';
            case 'on rent':
                return '';
            case 'overdue';
                return 'Please return the item immediately to prevent penalties!';
            case 'extended':
                return 'Please prepare exact amount upon return.';
            case 'returned':
                return '';
            case 'cancelled':
                return '';
            default:
                return '';
        }
    }

    function showActionButton($status)
    {
        if ($status == 'pending' || $status == 'approved') {
            return '<div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <button type="submit" class="btn-action btn-cancel">Cancel
                                                    Booking</button>
                                            </div>
                                        </div>';
        } else if ($status == 'on rent' || $status == 'overdue' || $status == 'extended') {
            return '
            <div class="action-button">
                <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                    <button type="button" class="btn-action" data-bs-toggle="modal" data-bs-target="#extendModal' . $this->rentalID . '">Extend</button>
                    <div class="modal fade" id="extendModal' . $this->rentalID . '" tabindex="-1" aria-labelledby="extendModalLabel' . $this->rentalID . '" aria-hidden="true" data-bs-theme="dark">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title w-100 text-center fs-4" id="extendModalLabel' . $this->rentalID . '">Extend My Rental Period</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="my-account.php" method="POST">
                                    <div class="modal-body p-4">
                                        <p>Enter the required information to extend your rental period.</p>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Additional rental period:</p>
                                            <div class="quantity-container d-flex align-items-center mx-4 my-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseRentalPeriod(' . $this->rentalID . ')">-</button>
                                                <input id="rentalPeriod' . $this->rentalID . '" type="number" class="form-control text-center" name="periodExtension" min="1" value="1" step="1" readonly>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseRentalPeriod(' . $this->rentalID . ')">+</button>
                                            </div>
                                            <p class="mb-0">days</p>
                                        </div>
                                        <p class="mt-5">Please note that this may result in additional charges upon return. Failure to follow guidelines may result in penalties!</p>
                                        <input type="checkbox" class="mt-3" id="confirmation' . $this->rentalID . '" name="confirmation" value="confirmation" required>
                                        <label for="confirmation' . $this->rentalID . '"> I understand</label><br>
                                        <input type="hidden" name="rentalID" value="' . $this->rentalID . '">
                                    </div>
                                    <div class="modal-footer d-flex justify-content-end my-3">
                                        <div class="container d-flex align-items-center justify-content-end">
                                            <p class="me-5">Total Payment:</p>
                                            <p name="totalPrice" class="price-custom-color" id="totalPrice' . $this->rentalID . '">₱' . $this->itemUnitPrice . '</p>
                                        </div>
                                        <button type="button" class="btn-denied text-center mx-2" data-bs-dismiss="modal" name="btnDenied">Cancel</button>
                                        <input type="hidden" name="priceperDay" id="priceperDay' . $this->rentalID . '" data-unit-price="' . $this->itemUnitPrice . '>" value="' . $this->itemUnitPrice . '">
                                        <button type="submit" class="btn-confirmed text-center" name="btnConfirmed" id="btnContinue' . $this->rentalID . '">Continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
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
    
                document.addEventListener("DOMContentLoaded", function () {
                    const rentalIDs = [/* dynamically populate rental IDs here */];
                    rentalIDs.forEach(rentalID => updateTotalPrice(rentalID));
                });
            </script>';

        } else if ($status == 'returned' || $status == 'cancelled') {
            return '<div class="action-button">
                                            <div class="text-center text-md-end mt-3 mt-lg-5 mb-3">
                                                <a href="product-page.php?id='.$this->itemID.'">
                                                    <button type="submit" class="btn-action">Rent Again</button>
                                                </a>
                                            </div>
                                        </div>';
        } else {
            return '';
        }
    }

    function showBadge($status)
    {
        $badgeStyle = '';

        ($status != 'overdue') ? $badgeStyle = '' : $badgeStyle = 'badge-overdue';

        return '<div class="status-badge ' . $badgeStyle . ' text-center">
                                            ' . strtoupper($status) . '
                                        </div>';
    }

    function showTimeAlert($status)
    {
        ($status != 'overdue') ? 'd-none' : 'd-block';
    }
}
?>