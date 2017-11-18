<?php
include 'db.connection.php';

$id_buchungen=$_REQUEST['loeschen_buchungen'];

$delsql ="DELETE FROM buchungen WHERE id_buchung=".$id_buchung."";  
		
$eintragen = mysqli_query($link,$delsqlsql);

echo $delsql;

?>