<?php
if (!isset($_COOKIE['email'])) {
    if (!isset($_COOKIE['userCredentials'])) {
        header("Location: login.php");
        exit();
    }
}
