<!DOCTYPE html>
<html>

<?php include "header.php"; 
include "db.connection.php"; ?>
 

<body>
    <div class="container">
        <div class="page-header">
            <h3>Abrechnungen</h3></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mieter ID</th>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Strasse</th>
                        <th>PLZ</th>
                        <th>Ort</th>
                        <th>Liegenschaft</th>
                        <th>Mietzins</th>
                        <th>Periode</th>
                        <th>Optionen</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $res_mieter=mysqli_query($link,"SELECT * FROM mieter");
                        while ($datensatz=mysqli_fetch_assoc($res_mieter))
                        {

                            echo "<tr><td>".$datensatz["ID"]."</td>";
                            echo "<td>".$datensatz["Nachname"]."</td>";
                            echo "<td>".$datensatz["Vorname"]."</td>";
                            echo "<td>".$datensatz["Strasse"]."</td>";
                            echo "<td>".$datensatz["PLZ"]."</td>";
                            echo "<td>".$datensatz["Ort"]."</td>";
                            echo "<td>".$datensatz["Mietzins"]."</td>";
                            echo "<td>".$datensatz["Periode"]."</td></tr>";
                            //"<td>"<button class=\"btn btn-primary\" type=\"button\"> DEL </button><button class=\"btn btn-primary\" type=\"button\"> CHG </button>"</td></tr>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>