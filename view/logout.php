<?php
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']);
    setcookie('PHPSESSID', '', time() - 3600, '/'); // empty value and old timestamp
}

header("location:http://photoca.se/index.php");
?>

