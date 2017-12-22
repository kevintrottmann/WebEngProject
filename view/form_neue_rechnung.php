<?php

//============================================================================================================
//	Name: Formular neue Rechnung 
//  Beschreibung: Hier kann man neue Rechnungen erfassen
//============================================================================================================

session_start();

//Überprüft ob User eingeloggt
if (!isset($_SESSION['userid'])) {
    header("location:http://photoca.se/index.php");
}
?>

<!DOCTYPE html>
<html>

<?php
include "header.php";
include "db.connection.php";
?>


<body>
<div class="container">
    <div class="page-header">
        <h3>Neue Rechnung erfassen</h3>
    </div>
</div>

<div class="container">
    <form class="form-horizontal" name="mieterform" action="db_add_rechnung.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="typ">Typ:</label>
            <div class="col-sm-10">
                <!-- <input type="text" class="form-control" name="typ" placeholder="Typ auswählen">-->
                <select name="typ" style="height:42px;width:220px;font-size:20px;">
                    <option value="Heizkosten">Heizkosten</option>
                    <option value="Nebenkosten">Nebenkosten</option>
                </select>

            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="art">Art:</label>
            <div class="col-sm-10">
                <!--  <input type="text" class="form-control" name="art" placeholder="Art auswählen">-->
                <select name="art" style="height:40px;width:220px;font-size:20px;">
                    <option value="Reparaturrechnung">Reparaturrechnung</option>
                    <option value="Oelrechnung">Oelrechnung</option>
                    <option value="Wasserrechnung">Wasserrechnung</option>
                    <option value="Stromrechnung">Stromrechnung</option>
                    <option value="Hauswartsrechnung">Hauswartsrechnung</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="rechnungstext">Rechnungstext (max. 200 Zeichen):</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="rechnungstext" placeholder="Rechnungstext eingeben">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="datum">Datum:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="datum" placeholder="Datum auswählen">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="betrag">Betrag:</label>
            <div class="col-sm-10">
                <input type="number_format" class="form-control" name="betrag" placeholder="Betrag eingeben">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Erfassen</button>
            </div>
        </div>
    </form>
</div>
</body>

<?php include "footer.php"; ?>
</html>