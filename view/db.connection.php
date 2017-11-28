<?php
$host="localhost";
$benutzer="db_root";
$passwort="aVu8k&13";
$dbname="db_photocase";

$link=mysqli_connect($host,$benutzer,$passwort,$dbname) or die
("Keine Verbindung zur DB moeglich");
mysqli_set_charset($link, 'utf8');
?>