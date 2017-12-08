<?php
    include "db.connection.php";
 
		$id = $_POST['id'];
        $mieter = $_POST['mieter'];
        $datum = $_POST['datum'];
        $betrag = $_POST['betrag'];
        
    
    //Keine Fehler, wir k�nnen den Nutzer registrieren
        
        $chgsql = "UPDATE `einnahmen` SET `ID_Mieter` = '".$mieter."', `Datum` = '".$datum."', `Betrag` = '".$betrag."' WHERE `einnahmen`.`ID` = '".$id."'";
		$eintragen = mysqli_query($link,$chgsql);
		
		
    echo '<script>window.location.href = "einnahmen.php";</script>';
?>