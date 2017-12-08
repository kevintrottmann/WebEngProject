<?php
    include "db.connection.php";


        $error=false;
        $id = $_POST['id'];
        $datum = $_POST['datum'];
        $betrag = $_POST['betrag'];
        

       //Keine Fehler, wir k�nnen den Nutzer registrieren
        $addsql = "INSERT INTO einnahmen (ID_Mieter,Datum,Betrag) VALUES ('".$id."','".$datum."','".$betrag."')";
        $eintragen = mysqli_query($link,$addsql);
    
	echo '<script>window.location.href = "einnahmen.php";</script>';
?>