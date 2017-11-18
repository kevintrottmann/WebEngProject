<?php
include 'db.connection.php';

if (isset($_POST['submit'])) {
if(isset($_POST['radio']))
{
echo "<span>You have selected :<b> ".$_POST['radio']."</b></span>";
}
else{ echo "<span>Please choose any radio button.</span>";}
}

$id_buchungen=$_POST['aendern_buchungen'];
echo $id_buchungen;
?>

<html>
<head>
</head>
<body>

<form action="db_change_value_done.php" method="POST"/>
		Startdatum: 	<input type="date" name="ip_startdatum"/><br/>
		Enddatum: 		<input type="date" name="ip_enddatum"/><br/>
		Buchungpreis: 	<input type="text" name="ip_buchungspreis"/><br/>
</form>
</body>
</html>
