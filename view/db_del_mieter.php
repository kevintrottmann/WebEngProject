<?php
    include "db.connection.php";

    $row_id = $_POST['name'];

    //Keine Fehler, wir k�nnen den Nutzer registrieren
    $addsql = "DELETE FROM mieter WHERE ID='$row_id';
    $eintragen = mysqli_query($link,$addsql);

    echo '<script>window.location.href = "mieter.php";</script>';
?>