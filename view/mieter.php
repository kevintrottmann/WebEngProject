<!DOCTYPE html>
<html>

<?php include "header.php"; 
include "db.connection.php"; ?>
 

<body>
    <div class="container">
        <div class="page-header">
            <h3>Mieter</h3></div>
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
						<th>Liegenschafts-Nr.</th>
						<th>Mietzins</th>
                        <th>Periodizität</th>
						<th>Bearbeiten</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $res_mieter=mysqli_query($link,"SELECT * FROM mieter");
                        while ($datensatz=mysqli_fetch_assoc($res_mieter)){

                            echo "<tr><td>".$datensatz["ID"]."</td>";
                            echo "<td>".$datensatz["Nachname"]."</td>";
                            echo "<td>".$datensatz["Vorname"]."</td>";
                            echo "<td>".$datensatz["Strasse"]."</td>";
                            echo "<td>".$datensatz["PLZ"]."</td>";
                            echo "<td>".$datensatz["Ort"]."</td>";
                            echo "<td>".$datensatz["Liegenschaft"]."</td>";
                            echo "<td>".$datensatz["Mietzins"]."</td>";
                            echo "<td>".$datensatz["Periode"]."</td>";
                            echo "<td><a href=\"#\" class='btn btn-primary'> <span class='glyphicon glyphicon-pencil'></span></a>
                                    <a href=\"#\" class='btn btn-primary'> <span class='glyphicon glyphicon-remove-circle'></span></a></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
			<a href="neuermieter.php" class="btn btn-primary" type="button"> Mieter erfassen </a>
			</br>
			</br>
			</br>

        </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>