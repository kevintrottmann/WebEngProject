<?php
    include "db.connection.php";


        $error=false;
        $typ = $_POST['typ'];
        $art = $_POST['art'];
        $rechnungstext = $_POST['rechnungstext'];
        $datum = $_POST['datum'];
        $betrag = $_POST['betrag'];
        

       //Keine Fehler, wir k�nnen den Nutzer registrieren
        $addsql = "INSERT INTO rechnungen (Typ,Art,Rechnungstext,Datum,Betrag) VALUES ('".$typ."','".$art."','".$rechnungstext."','".$datum."','".$betrag."')";
        $eintragen = mysqli_query($link,$addsql);
    
	echo '<script>window.location.href = "rechnungen.php";</script>';
?>