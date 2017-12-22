<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:http://photoca.se/index.php");
}
?>

<!DOCTYPE html>
<html>

<?php include "header.php";
include "db.connection.php"; ?>


<body>
<div class="container">
    <div class="page-header">
        <h3>Rechnungen</h3></div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Rechnungs ID</th>
                <th>Typ</th>
                <th>Art</th>
                <th>Rechnungstext</th>
                <th>Datum</th>
                <th>Betrag</th>
                <th>Löschen</th>
                <th>Bearbeiten</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $res_rechnung = mysqli_query($link, "SELECT * FROM rechnungen");
            while ($datensatz = mysqli_fetch_assoc($res_rechnung)) {

                echo "<tr><td>" . $datensatz["ID"] . "</td>";
                echo "<td>" . $datensatz["Typ"] . "</td>";
                echo "<td>" . $datensatz["Art"] . "</td>";
                echo "<td>" . $datensatz["Rechnungstext"] . "</td>";
                echo "<td>" . $datensatz["Datum"] . "</td>";
                echo "<td>" . $datensatz["Betrag"] . "</td>";
                echo "<td><form action='db_del_rechnung.php' method='POST'/><input type='submit' class='btn btn-primary' name='löschen' value='DEL'> <input type='hidden' name='ID' value='" . $datensatz["ID"] . "'></form></td>";
                echo "<td><form action='db_chg_rechnung.php' method='POST'/><input type='submit' class='btn btn-primary' name='bearbeiten' value='CHG'> <input type='hidden' name='ID' value='" . $datensatz["ID"] . "'></form></td></tr>";


            }
            ?>
            </tbody>
        </table>
        <a href="form_neue_rechnung.php" class="btn btn-primary" type="button"> Rechnung erfassen </a> <a
                href="pdfgeneratorrechnung.php" target="_blank" class="btn btn-primary">Drucken</a>

        </br>
        </br>
        </br>

    </div>
</div>
</body>

<?php include "footer.php"; ?>

</html>