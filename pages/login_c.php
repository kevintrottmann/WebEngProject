<?php
session_start();

include "pruef.inc.php";

echo "Herzlich willkommen ".$_SESSION['name'];
echo "<br/>";
echo "Ihre Session-ID: ".session_id();
echo "<br/>";
?>

<a href="index.php"> Logout</a>

 