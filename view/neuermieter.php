<!DOCTYPE html>
<html>

<?php include "header.php"; 
include "db.connection.php"; ?>
 

<body>
    <div class="container">
        <div class="page-header">
            <h3>Neuen Mieter erfassen</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" action="?erfassen=1" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="vorname">Vorname:</label>
                <div class="col-sm-10">
                    <input type="vorname" class="form-control" id="vorname" placeholder="Vornamen eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="nachname">Nachname:</label>
                <div class="col-sm-10">
                    <input type="nachname" class="form-control" id="nachname" placeholder="Nachnamen eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="strasse">Strasse:</label>
                <div class="col-sm-10">
                    <input type="strasse" class="form-control" id="strasse" placeholder="Strasse eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="plz">PLZ:</label>
                <div class="col-sm-10">
                    <input type="plz" class="form-control" id="plz" placeholder="Postleitzahl eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="ort">Ort:</label>
                <div class="col-sm-10">
                    <input type="ort" class="form-control" id="ort" placeholder="Wohnort eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="liegenschaft">Liegenschaft:</label>
                <div class="col-sm-10">
                    <input type="liegenschaft" class="form-control" id="liegenschaft" placeholder="Liegenschaftsnummer eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="mietzins">Mietzins:</label>
                <div class="col-sm-10">
                    <input type="mietzins" class="form-control" id="mietzins" placeholder="Mietzins eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="periode">Periodizität:</label>
                <div class="col-sm-10">
                    <input type="periode" class="form-control" id="periode" placeholder="jährlich [j] - monatlich [m]">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Erfassen</button>
                </div>
            </div>
        </form>
    </div>


    <div>
    <?php
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
    </div>
</body>

<?php include "footer.php"; ?> 

</html>