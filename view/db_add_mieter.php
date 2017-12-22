<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<?php
    include "db.connection.php";


        $error=false;
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $strasse = $_POST['strasse'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];
        $liegenschaft = $_POST['liegenschaft'];
        $mietzins = $_POST['mietzins'];


    //Keine Fehler, wir k�nnen den Nutzer registrieren
        $addsql = "INSERT INTO mieter (Vorname,Nachname,Strasse,PLZ,Ort,Liegenschaft,Mietzins) VALUES ('".$vorname."','".$nachname."','".$strasse."','".$plz."','".$ort."','".$liegenschaft."','".$mietzins."')";
        $eintragen = mysqli_query($link,$addsql);

    echo '<script>window.location.href = "mieter.php";</script>';
?>