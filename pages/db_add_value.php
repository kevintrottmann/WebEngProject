<?php
include 'db.connection.php';

$ergebnis_der_query = mysqli_query($link,"SELECT * FROM `buchungen`");
$id_buchungen=mysqli_num_rows($ergebnis_der_query)+1;
if ($id_buchungen==0) {echo "keine Datensätze gefunden";}


$startdatum = date('Y-m-d', strtotime($_POST['ip_startdatum']));
$enddatum =date('Y-m-d', strtotime($_POST['ip_enddatum']));
$buchungspreis =$_POST['ip_buchungspreis'];
$id_geraete =$_POST['ip_id_geraete'];
$id_user =$_POST['ip_id_users'];

$addsql ="INSERT INTO buchungen (id_buchung, startdate, enddate, buchungspreis, fk_geraete, fk_users)VALUES ('".$id_buchungen."','".$startdatum."','".$enddatum."','".$buchungspreis."','".$id_geraete."','".$id_user."')";
		
$eintragen = mysqli_query($link,$addsql);

echo $addsql;


?> 

 <a href="./pages/db_view.php">db_view.php</a><br>