<?php
session_start();
if(!isset($_SESSION['userid'])) {
echo "<script type='text/javascript'>window.document.location.href ='../index.php';</script>";
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;
?>