<?php

//============================================================================================================
//	Name: Welcome Page 
//  Beschreibung: Nach dem Login wird man auf diese Seite weitergeleitet, Infos zu der Funktionalität von photoca.se
//============================================================================================================

//Überprüft ob User eingeloggt
session_start();
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
        <h3>Willkommen auf Photoca.se</h3></div>
    <h4>Was ist Photoca.se?</h4>
    Sie sind Besitzer eines 12-Familienhauses, der die Verwaltung selbständig führen will. Mithilfe von Photoca.se
    erhalten Sie ein praktisches Onlinetool, welches man einfach über den Webbrowser bedienen kann.</br></br>

    <h4>Folgendes können Sie jederzeit online abrufen:</h4>
    -Mieterspiegel (Adressen und Mietzinse)</br>
    -Erfasste Rechnungen (Reparatur-, Oel-, Wasser-, Strom-, Hauswartsrechnungen)</br>
    -Weitere Rechnungen sollen jederzeit erfasst werden können.</br>
    -Mietzinseingänge sollen einfach erfasst werden können.</br>
    -Ende Jahr soll man eine Abrechnung ausdrucken können.</br>
    -Die Heizkostenabrechnung und die Nebenkosten sollen ausgewiesen werden.</br>
    -Über Formulare können Daten eingegeben, mutiert oder gelöscht werden.</br>

</div>
</div>
</body>

<?php include "footer.php"; ?>

</html>