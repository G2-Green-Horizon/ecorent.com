<?php 

class Item{
    public $itemID;
    public $categoryID;
    public $itemName;
    public $itemType;
    public $gasEmissionSaved;
    public $pricePerDay;
    public $itemCondition;
    public $itemSpecifications;
    public $description;
    public $location;
    public $securityDeposit;
    public $listingDate;
    public $listingUpdateDate;
    public $isFeatured;
    public $isDeleted;

    public function __construct(){
        
    }
}

?>