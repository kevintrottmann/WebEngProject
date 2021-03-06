<?php
//============================================================================================================
//	Name: Menü Mieter 
//  Beschreibung: Zeigt alle Mieter an, mit Buttons kann man erstellen, löschen, verändern oder PDF generieren
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
        <h3>Mieter</h3></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Mieter ID</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Strasse</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Liegenschafts-Nr.</th>
                <th>Mietzins</th>
                <th>Löschen</th>
                <th>Bearbeiten</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $res_mieter = mysqli_query($link, "SELECT * FROM mieter");
            while ($datensatz = mysqli_fetch_assoc($res_mieter)) {

                echo "<tr><td>" . $datensatz["ID"] . "</td>";
                echo "<td>" . $datensatz["Nachname"] . "</td>";
                echo "<td>" . $datensatz["Vorname"] . "</td>";
                echo "<td>" . $datensatz["Strasse"] . "</td>";
                echo "<td>" . $datensatz["PLZ"] . "</td>";
                echo "<td>" . $datensatz["Ort"] . "</td>";
                echo "<td>" . $datensatz["Liegenschaft"] . "</td>";
                echo "<td>" . $datensatz["Mietzins"] . "</td>";
                echo "<td><form action='db_del_mieter.php' method='POST'/><input type='submit' class='btn btn-primary' name='löschen' value='DEL'> <input type='hidden' name='ID' value='" . $datensatz["ID"] . "'></form></td>";
                echo "<td><form action='db_chg_mieter.php' method='POST'/><input type='submit' class='btn btn-primary' name='bearbeiten' value='CHG'> <input type='hidden' name='ID' value='" . $datensatz["ID"] . "'></form></td></tr>";


            }
            ?>
            </tbody>
        </table>
        <a href="form_neuermieter.php" class="btn btn-primary" type="button"> Mieter erfassen </a> 
		<a href="pdfgeneratormieter.php" target="_blank" class="btn btn-primary">Drucken</a>

        </br>
        </br>
        </br>

    </div>
</div>
</body>

<?php include "footer.php"; ?>

</html>