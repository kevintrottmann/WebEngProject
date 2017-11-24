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
echo "<tr><td>".$datensatz["id"]."</td>";
echo "<td>".$datensatz["email"]."</td>";
echo "<td>".$datensatz["passwort"]."</td>";
echo "<td>".$datensatz["vorname"]."</td>";
echo "<td>".$datensatz["nachname"]."</td>";
echo "<td>".$datensatz["strasse"]."</td>";
echo "<td>".$datensatz["plz"]."</td>";
echo "<td>".$datensatz["ort"]."</td>";
echo "<td>".$datensatz["created_at"]."</td>";
echo "<td>".$datensatz["changed_at"]."</td></tr>";
echo "<br />";
}

echo "</br></br> Tabelle Mieter </br>";
echo "<tr><td>id</td>\n";
echo "<td>name</td>\n";
echo "<td>vorname</td>\n";
echo "<td>mietzins</td>\n";
echo "<td>liegenschaft</td></tr>\n";
echo "<br />";

$res_mieter=mysqli_query($link,"SELECT * FROM mieter");
while ($datensatz=mysqli_fetch_assoc($res_mieter))
{
echo "<tr><td>".$datensatz["id"]."</td>";
echo "<td>".$datensatz["name"]."</td>";
echo "<td>".$datensatz["vorname"]."</td>";
echo "<td>".$datensatz["mietzins"]."</td>";
echo "<td>".$datensatz["liegenschaft"]."</td></tr>";
echo "<br />";
}

echo "</br></br> Tabelle Rechnungen</br>";
echo "<tr><td>id</td>\n";
echo "<td>typ</td>\n";
echo "<td>art</td>\n";
echo "<td>extRef</td>\n";
echo "<td>datum</td>\n";
echo "<td>status</td>\n";
echo "<td>betrag</td>\n";
echo "<td>bezahltam</td></tr>\n";
echo "<br/>";

$res_rechnungen=mysqli_query($link,"SELECT * FROM rechnungen");
while ($datensatz=mysqli_fetch_assoc($res_rechnungen))
{
echo "<tr><td>".$datensatz["id"]."</td>";
echo "<td>".$datensatz["typ"]."</td>";
echo "<td>".$datensatz["art"]."</td>";
echo "<td>".$datensatz["extRef"]."</td>";
echo "<td>".$datensatz["datum"]."</td>";
echo "<td>".$datensatz["status"]."</td>";
echo "<td>".$datensatz["betrag"]."</td>";
echo "<td>".$datensatz["bezahltam"]."</td></tr>";
echo "<br />";
}
?>

<html>
<head>
</head>
<body>
</body>
</html>
