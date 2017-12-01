<?php
    include "db.connection.php";


        $error=false;
		$ID = $_POST['id'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $strasse = $_POST['strasse'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];
        $liegenschaft = $_POST['liegenschaft'];
        $mietzins = $_POST['mietzins'];
        $periode = $_POST['periode'];

    //Überprüfung, ob Formular korrekte Werte enthält




    //Überprüfung, ob Mieter bereits in Datenbank erfasst


    //Keine Fehler, wir k�nnen den Nutzer registrieren
        
        $chgsql = "UPDATE `mieter` SET `Nachname` = '".$nachname."', `Vorname` = '".$vorname."', `Strasse` = '".$strasse."', `PLZ` = '".$plz."', `Ort` = '".$ort."', `Liegenschaft` = '".$liegenschaft."', `Mietzins` = '".$mietzins."', `Periode` = '".$periode."' WHERE `mieter`.`ID` = '".$id."'";
		$eintragen = mysqli_query($link,$chgsql);
		echo $chgsql;
		
    //echo '<script>window.location.href = "mieter.php";</script>';
?>