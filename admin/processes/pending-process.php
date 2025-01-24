<?php 

if (isset($_GET['rentalID'])) {
    $rentalID = $_GET['rentalID'];
    if (isset($_POST['btnApprove'])) {
        $approveQuery = "UPDATE rentals SET rentalStatus='pickup' WHERE rentalID = '$rentalID'";
        executeQuery($approveQuery);
    
        header('Location: index.php');
        exit();
      
    }
    
    if (isset($_POST['btnReject'])) {
        $approveQuery = "UPDATE rentals SET rentalStatus='cancelled' WHERE rentalID = '$rentalID'";
        executeQuery($approveQuery);
    
        header('Location: index.php');
        exit();
       
    }
}





?>