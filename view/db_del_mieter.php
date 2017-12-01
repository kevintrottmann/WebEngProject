<?php
    include "db.connection.php";
	
	$ID=$_POST['ID'];
	echo("ID: $ID");
	echo("</br>");
	$action=$_POST['action'];
	echo("Action: $action");
	echo("</br>");
	$button = array_search('delete', $_POST);
	echo("Button: $button");
	
    //$row_id = $_POST['name'];

    //Keine Fehler, wir k�nnen den Nutzer registrieren
    //$addsql = "DELETE FROM mieter WHERE ID='$row_id';
    //$eintragen = mysqli_query($link,$addsql);

    //echo '<script>window.location.href = "mieter.php";</script>';
?>