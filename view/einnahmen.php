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
                        <th>Nachname / Vorname</th>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Optionen</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $res_einnahmen=mysqli_query($link,"SELECT * FROM einnahmen");
                        while ($datensatz=mysqli_fetch_assoc($res_einnahmen)){

                            echo "<tr><td>".$datensatz["ID"]."</td>";
                            echo "<td>".$datensatz["ID_Mieter"]."</td>";
                            echo "<td>".$datensatz["Datum"]."</td>";
                            echo "<td>".$datensatz["Betrag"]."</td>";
                            echo "<td><form action='db_del_einnahme.php' method='POST'/><input type='submit' class='btn btn-primary' name='löschen' value='DEL'> <input type='hidden' name='ID' value='". $datensatz["ID"] ."'></form></td>";
							echo "<td><form action='db_chg_einnahme.php' method='POST'/><input type='submit' class='btn btn-primary' name='bearbeiten' value='CHG'> <input type='hidden' name='ID' value='". $datensatz["ID"] ."'></form></td></tr>";
                          
							
							}
                    ?>
                </tbody>
            </table>
			<a href="form_neue_einnahme.php" class="btn btn-primary" type="button"> Einnahmen erfassen </a>
			</br>
			</br>
			</br>
		
        
        </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>