<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<?php
    include "db.connection.php";


        
		$id = $_POST['id'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $strasse = $_POST['strasse'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];
        $liegenschaft = $_POST['liegenschaft'];
        $mietzins = $_POST['mietzins'];

    //Überprüfung, ob Formular korrekte Werte enthält




    //Überprüfung, ob Mieter bereits in Datenbank erfasst


    //Keine Fehler, wir k�nnen den Nutzer registrieren
        
        $chgsql = "UPDATE `mieter` SET `Nachname` = '".$nachname."', `Vorname` = '".$vorname."', `Strasse` = '".$strasse."', `PLZ` = '".$plz."', `Ort` = '".$ort."', `Liegenschaft` = '".$liegenschaft."', `Mietzins` = '".$mietzins."' WHERE `mieter`.`ID` = '".$id."'";
		$eintragen = mysqli_query($link,$chgsql);
	
		
    echo '<script>window.location.href = "mieter.php";</script>';
?>