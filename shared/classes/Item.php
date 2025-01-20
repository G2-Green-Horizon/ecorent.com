<?php 
class Item{
    public $itemID;
    public $categoryID;
    public $categoryName;
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
    public $fileName;

    public function __construct($itemID, $categoryID, $itemName, $pricePerDay, $categoryName, $fileName){
        $this->itemID = $itemID;
        $this->categoryID = $categoryID;
        $this->itemName = $itemName;
        $this->pricePerDay = $pricePerDay;
        $this->categoryName = $categoryName;
        $this->fileName = $fileName;
        
    }
}

?>