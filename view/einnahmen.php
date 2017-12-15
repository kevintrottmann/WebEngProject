<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<!DOCTYPE html>
<html>

<?php include "header.php"; 
include "db.connection.php"; ?>
 

<body>
    <div class="container">
        <div class="page-header">
            <h3>Einnahmen</h3></div>
			
			<div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Einnahmen ID</th>
                        <th>Vorname / Nachname</th>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Löschen</th>
						<th>Bearbeiten</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $res_einnahmen=mysqli_query($link,"SELECT * FROM einnahmen");
                        while ($datensatz=mysqli_fetch_assoc($res_einnahmen)){

                            echo "<tr><td>".$datensatz["ID"]."</td>";
                            echo "<td>";
							$id_mieter = $datensatz["ID_Mieter"];
							$res_mieter=mysqli_query($link,"SELECT * FROM mieter WHERE ID='$id_mieter'");
							$datensatz1=mysqli_fetch_assoc($res_mieter);
							echo $datensatz1["Vorname"]." ".$datensatz1["Nachname"];
							echo "</td>";
                            echo "<td>".$datensatz["Datum"]."</td>";
                            echo "<td>".$datensatz["Betrag"]."</td>";
                            echo "<td><form action='db_del_einnahme.php' method='POST'/><input type='submit' class='btn btn-primary' name='löschen' value='DEL'> <input type='hidden' name='ID' value='". $datensatz["ID"] ."'></form></td>";
							echo "<td><form action='db_chg_einnahme.php' method='POST'/><input type='submit' class='btn btn-primary' name='bearbeiten' value='CHG'> <input type='hidden' name='ID' value='". $datensatz["ID"] ."'></form></td></tr>";
							
							}
                    ?>
                </tbody>
            </table>
			<a href="form_neue_einnahme.php" class="btn btn-primary" type="button"> Einnahmen erfassen </a> <a href="pdfgeneratoreinnahmen.php" target="_blank" class="btn btn-primary">Drucken</a>
			</br>
			</br>
			</br>
		
        
        </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>