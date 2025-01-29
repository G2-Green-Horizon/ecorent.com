<?php
setcookie("userID", "", time() - 3600, "/"); 
setcookie("email", "", time() - 3600, "/"); 
setcookie("firstName", "", time() - 3600, "/"); 
setcookie("lastName", "", time() - 3600, "/"); 
setcookie("PHPSESSID", "", time() - 3600, "/"); 
setcookie("userCredentials", "", time() - 3600, "/"); 
header("Location: index.php"); 
exit();
?>