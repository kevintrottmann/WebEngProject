<?php
include "db.connection.php";


echo "Tabelle Users </br>";
echo "<tr><td>id_user</td>\n";
echo "<td>email</td>\n";
echo "<td>passwort</td>\n";
echo "<td>vorname</td>\n";
echo "<td>nachname</td>\n";
echo "<td>strasse</td>\n";
echo "<td>plz</td>\n";
echo "<td>ort</td>\n";
echo "<td>created_at</td></tr>\n";
echo "<br />";
  
$res_users=mysqli_query($link,"SELECT * FROM users");
while ($datensatz=mysqli_fetch_assoc($res_users))
{
echo "<tr><td>".$datensatz["id_user"]."</td>";
echo "<td>".$datensatz["email"]."</td>";
echo "<td>".$datensatz["passwort"]."</td>";
echo "<td>".$datensatz["vorname"]."</td>";
echo "<td>".$datensatz["nachname"]."</td>";
echo "<td>".$datensatz["strasse"]."</td>";
echo "<td>".$datensatz["plz"]."</td>";
echo "<td>".$datensatz["ort"]."</td>";
echo "<td>".$datensatz["created_at"]."</td></tr>";
echo "<br />";
}



echo "</br></br> Tabelle Gerate </br>";
echo "<tr><td>id_geraete</td>\n";
echo "<td>name</td>\n";
echo "<td>model</td>\n";
echo "<td>preisprotag</td></tr>\n";
echo "<br />";

$res_geraete=mysqli_query($link,"SELECT * FROM geraete");
while ($datensatz=mysqli_fetch_assoc($res_geraete))
{
echo "<tr><td>".$datensatz["id_geraete"]."</td>";
echo "<td>".$datensatz["name"]."</td>";
echo "<td>".$datensatz["model"]."</td>";
echo "<td>".$datensatz["preisprotag"]."</td></tr>";
echo "<br />";
}

echo "</br></br> Tabelle Buchungen</br>";
echo "<tr><td>id_buchung</td>\n";
echo "<td>startdate</td>\n";
echo "<td>enddate</td>\n";
echo "<td>buchungspreis</td></tr>\n";
echo "<br/>";

$res_buchung=mysqli_query($link,"SELECT * FROM buchungen");
while ($datensatz=mysqli_fetch_assoc($res_buchung))
{
echo "<tr><td>".$datensatz["id_buchung"]."</td>";
echo "<td>".$datensatz["startdate"]."</td>";
echo "<td>".$datensatz["enddate"]."</td>";
echo "<td>".$datensatz["buchungspreis"]."</td></tr>";
echo "<br />";
}
?>
<html>
<head>
</head>
<body>
<form action="">
  <input type="radio" name="loeschen_buchungen" value="male"> Male<br>
  <input type="radio" name="loeschen_buchungen" value="female"> Female<br>
  <input type="radio" name="loeschen_buchungen" value="other"> Other
</form>
</body>
</html>
