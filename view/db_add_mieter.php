<?php
    include "db.connection.php";

    if(isset($_GET['erfassen'])) {
        $error = false;
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $strasse = $_POST['strasse'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];
        $liegenschaft = $_POST['liegenschaft'];
        $mietzins = $_POST['mietzins'];
        $periode = $_POST['periode'];
    }
    //Überprüfung, ob Formular korrekte Werte enthält




    //Überprüfung, ob Mieter bereits in Datenbank erfasst


    //Keine Fehler, wir k�nnen den Nutzer registrieren
    if(!$error) {
        $addsql = "INSERT INTO mieter (Vorname,Nachname,Strasse,PLZ,Ort,Liegenschaft,Mietzins,Periode) VALUES ('".$vorname."','".$nachname."','".$strasse."','".$plz."','".$ort."','".$liegenschaft."','".$mietzins."','".$periode."')";
        $eintragen = mysqli_query($link,$addsql);

        echo $addsql;


        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
?>