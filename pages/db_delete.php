<?php include "db.connection.php";
?>
<html>
 <head>
 <title> PHP-Delete </title>
 </head>
 <body>
 
 <form action="db_delete_value.php" method="POST"/>

<?php
 
echo "Tabelle Buchungen</br>";
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
echo "<input type=\"radio\" name=\"loeschen_buchungen\" value=\"".$datensatz["id_buchung"]."\">";
echo "<br />";
}
?>
 <input type="submit" value="Eintrag löschen"/>
</form>
<a href="./pages/db_view.php">db_view.php</a><br/>
 <a href="./pages/db_add.php">db_add.php</a><br/>
 <a href="./pages/db_change.php">db_change.php</a><br/>
 <a href="./pages/db_delete.php">db_delete.php</a><br/>
 
 </body>
 </html>