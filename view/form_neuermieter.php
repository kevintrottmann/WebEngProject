<?php
session_start();
if(!isset($_SESSION['userid'])){
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
            <h3>Neuen Mieter erfassen</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" name="mieterform" action="db_add_mieter.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="vorname">Vorname:</label>
                <div class="col-sm-10">
                    <input type="vorname" class="form-control" name="vorname" placeholder="Vornamen eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="nachname">Nachname:</label>
                <div class="col-sm-10">
                    <input type="nachname" class="form-control" name="nachname" placeholder="Nachnamen eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="strasse">Strasse:</label>
                <div class="col-sm-10">
                    <input type="strasse" class="form-control" name="strasse" placeholder="Strasse eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="plz">PLZ (4 Zahlen):</label>
                <div class="col-sm-10">
                    <input type="plz" class="form-control" name="plz" placeholder="Postleitzahl eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="ort">Ort:</label>
                <div class="col-sm-10">
                    <input type="ort" class="form-control" name="ort" placeholder="Wohnort eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="liegenschaft">Liegenschaft:</label>
                <div class="col-sm-10">
                    <input type="liegenschaft" class="form-control" name="liegenschaft" placeholder="Liegenschaftsnummer eingeben">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="mietzins">Mietzins:</label>
                <div class="col-sm-10">
                    <input type="mietzins" class="form-control" name="mietzins" placeholder="Mietzins eingeben">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" onclick="checkform()">Erfassen</button>
                </div>
            </div>
        </form>
    </div>
</body>

<?php include "footer.php"; ?> 
</html>