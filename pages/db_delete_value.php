<?php
include 'db.connection.php';

if (isset($_POST['submit'])) {
if(isset($_POST['radio']))
{
echo "<span>You have selected :<b> ".$_POST['radio']."</b></span>";
}
else{ echo "<span>Please choose any radio button.</span>";}
}



$id_buchungen=$_POST['loeschen_buchungen'];
echo $id_buchungen;

$delsql ="DELETE FROM buchungen WHERE id_buchung=".$id_buchungen."";  
		
$eintragen = mysqli_query($link,$delsql);

echo $delsql;

?>