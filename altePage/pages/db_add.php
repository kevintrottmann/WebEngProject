<?php
include "db.connection.php";

$ergebnis_geraete = mysqli_query($link,"SELECT * FROM `geraete`");
$Anzahl_geraete=mysqli_num_rows($ergebnis_geraete);

$ergebnis_users = mysqli_query($link,"SELECT * FROM `users`");
$Anzahl_users=mysqli_num_rows($ergebnis_users);

?> 

<html>
 <head>
 <title> PHP-Add </title>
 </head>
 <body>
 <form action="db_add_value.php" method="POST"/>
		Startdatum: 	<input type="date" name="ip_startdatum"/><br/>
		Enddatum: 		<input type="date" name="ip_enddatum"/><br/>
		Buchungpreis: 	<input type="text" name="ip_buchungspreis"/><br/>

		<label>ID Geraete
		<select name=ip_id_geraete size=<?php $Anzahl_geraete ?>>
				<?php
				while ($datensatz=mysqli_fetch_assoc($ergebnis_geraete))
				{
				echo "<option>".$datensatz["id_geraete"]."</option>";
				}	
				?>
		</select>
		</label><br/>
		
		<label>ID User
		<select name=ip_id_users size=<?php $Anzahl_users ?>>
				<?php
				while ($datensatz=mysqli_fetch_assoc($ergebnis_users))
				{
				echo "<option>".$datensatz["id_user"]."</option>";
				}	
				?>
		</select>
		</label><br/>
		
		
		<input type="submit" value="Daten hinzufügen"/>
</form>
</html>


