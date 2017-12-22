<?php
include "db.connection.php";

echo "Tabelle Users </br>";
echo "<tr><td>id</td>\n";
echo "<td>email</td>\n";
echo "<td>passwort</td>\n";
echo "<td>vorname</td>\n";
echo "<td>nachname</td>\n";
echo "<td>strasse</td>\n";
echo "<td>plz</td>\n";
echo "<td>ort</td>\n";
echo "<td>created_at</td></tr>\n";
echo "<br />";

$res_users = mysqli_query($link, "SELECT * FROM users");
while ($datensatz = mysqli_fetch_assoc($res_users)) {
    echo "<tr><td>" . $datensatz["id"] . "</td>";
    echo "<td>" . $datensatz["email"] . "</td>";
    echo "<td>" . $datensatz["passwort"] . "</td>";
    echo "<td>" . $datensatz["vorname"] . "</td>";
    echo "<td>" . $datensatz["nachname"] . "</td>";
    echo "<td>" . $datensatz["strasse"] . "</td>";
    echo "<td>" . $datensatz["plz"] . "</td>";
    echo "<td>" . $datensatz["ort"] . "</td>";
    echo "<td>" . $datensatz["created_at"] . "</td>";
    echo "<td>" . $datensatz["changed_at"] . "</td></tr>";
    echo "<br />";
}

echo "</br></br> Tabelle Mieter </br>";
echo "<tr><td>ID</td>\n";
echo "<td>Nachname</td>\n";
echo "<td>Vorname</td>\n";
echo "<td>Strasse</td>\n";
echo "<td>PLZ</td>\n";
echo "<td>Ort</td>\n";
echo "<td>Mietzins</td>\n";
echo "<td>Periode</td></tr>\n";
echo "<br />";

$res_mieter = mysqli_query($link, "SELECT * FROM mieter");
while ($datensatz = mysqli_fetch_assoc($res_mieter)) {
    echo "<tr><td>" . $datensatz["ID"] . "</td>";
    echo "<td>" . $datensatz["Nachname"] . "</td>";
    echo "<td>" . $datensatz["Vorname"] . "</td>";
    echo "<td>" . $datensatz["Strasse"] . "</td>";
    echo "<td>" . $datensatz["PLZ"] . "</td>";
    echo "<td>" . $datensatz["Ort"] . "</td>";
    echo "<td>" . $datensatz["Mietzins"] . "</td>";
    echo "<td>" . $datensatz["Periode"] . "</td></tr>";
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

$res_rechnungen = mysqli_query($link, "SELECT * FROM rechnungen");
while ($datensatz = mysqli_fetch_assoc($res_rechnungen)) {
    echo "<tr><td>" . $datensatz["id"] . "</td>";
    echo "<td>" . $datensatz["typ"] . "</td>";
    echo "<td>" . $datensatz["art"] . "</td>";
    echo "<td>" . $datensatz["extRef"] . "</td>";
    echo "<td>" . $datensatz["datum"] . "</td>";
    echo "<td>" . $datensatz["status"] . "</td>";
    echo "<td>" . $datensatz["betrag"] . "</td>";
    echo "<td>" . $datensatz["bezahltam"] . "</td></tr>";
    echo "<br />";
}
?>

<html>
<head>
</head>
<body>
</body>
</html>
