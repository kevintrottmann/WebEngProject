<?php
    include "db.connection.php";
 
		$id = $_POST['id'];
        $typ = $_POST['typ'];
        $art = $_POST['art'];
        $rechnungstext = $_POST['rechnungstext'];
        $datum = $_POST['datum'];
        $betrag = $_POST['betrag'];
        
    //Überprüfung, ob Formular korrekte Werte enthält




    //Überprüfung, ob Mieter bereits in Datenbank erfasst


    //Keine Fehler, wir k�nnen den Nutzer registrieren
        
        $chgsql = "UPDATE `rechnungen` SET `Typ` = '".$typ."', `Art` = '".$art."', `Rechnungstext` = '".$rechnungstext."', `Datum` = '".$datum."', `Betrag` = '".$betrag."' WHERE `rechnungen`.`ID` = '".$id."'";
		$eintragen = mysqli_query($link,$chgsql);
		
		
    echo '<script>window.location.href = "rechnungen.php";</script>';
?>