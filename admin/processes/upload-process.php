<?php
//include __DIR__ . '/../../connect.php';

function uploadImage($fileInput, $itemID, $processType)
{
    //Image Upload
    $htmlFileUpload = $_FILES[$fileInput]['name'];
    $htmlFileUploadTMP = $_FILES[$fileInput]['tmp_name'];

    $htmlFileName = '-' . $htmlFileUpload;
    $htmlNewName = date("YMdHisu");

    $htmlNewFileName = $htmlNewName . $htmlFileName;

    $htmlFolder = "../shared/assets/img/system/items/";

    move_uploaded_file($htmlFileUploadTMP, $htmlFolder . $htmlNewFileName);

    if ($processType == "addItem") {
        $insertAttachmentQuery = "INSERT INTO attachments(`itemID`, `fileName`) VALUES ('$itemID', '$htmlNewFileName')";
        executeQuery($insertAttachmentQuery);
    } else if ($processType == "editItem") {
        if ($htmlFileUpload !== "") {
            $updateAttachmentQuery = "UPDATE `attachments` SET `fileName`='$htmlNewFileName' WHERE itemID = '$itemID'";
            executeQuery($updateAttachmentQuery);
        }
    }
}
