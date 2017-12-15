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
        <h3>Abrechnungen</h3>
		</br>
		<div class="form-group">
                <label class="control-label col-sm-2" for="id">Jahr der Abrechnung:</label>
                <div class="col-sm-10">
                   
					<select name="jahr" style="height:40px;width:220px;font-size:20px;">
				
					<?php   echo '<option value=';
							echo (date("Y")-1);
							echo '>'; 
							echo (date("Y")-1);
							echo '</option>';
							echo '<option value=';
							echo date("Y");
							echo '>'; 
							echo date("Y");
							echo '</option>';
							echo '<option value=';
							echo (date("Y")+1);
							echo '>'; 
							echo (date("Y")+1);
							echo '</option>';
							?>
					

					</select>
				</div>
            </div>
			
		</br>
		</br>
        <a href="pdfgeneratorabrechnung.php" target="_blank" class="btn btn-primary">Abrechnung Drucken</a>
		<a href="pdfgeneratorheizkosten.php" target="_blank" class="btn btn-primary">Heizkosten Drucken</a>
		<a href="pdfgeneratornebenkosten.php" target="_blank" class="btn btn-primary">Nebenkosten Drucken</a>
    </div>
    <div class="table-responsive">
	<h3>Heizkosten</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Typ</th>
                <th>Art</th>
                <th>Rechnungstext</th>
                <th>Datum</th>
                <th>Betrag</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $res_rechnungenheiz=mysqli_query($link,"SELECT * FROM rechnungen WHERE Typ='Heizkosten'");
            while ($datensatz=mysqli_fetch_assoc($res_rechnungenheiz)){

                echo "<tr><td>".$datensatz["ID"]."</td>";
                echo "<td>".$datensatz["Typ"]."</td>";
                echo "<td>".$datensatz["Art"]."</td>";
                echo "<td>".$datensatz["Rechnungstext"]."</td>";
                echo "<td>".$datensatz["Datum"]."</td>";
                echo "<td>".$datensatz["Betrag"]."</td></tr>";
				}
			$res_resultatheiz=mysqli_query($link,"SELECT SUM(Betrag) FROM rechnungen WHERE Typ='Heizkosten'");
            while ($datensatz1=mysqli_fetch_assoc($res_resultatheiz)){
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><h3>Total:</h3></td>";
					echo "<td></td>";
					echo "<td><h3>".$datensatz1["SUM(Betrag)"]."</h3></td>";
										
                 }
            ?>
            </tbody>
        </table>

        </br>
        </br>
        </br>

    
	<h3>Nebenkosten</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Typ</th>
                <th>Art</th>
                <th>Rechnungstext</th>
                <th>Datum</th>
                <th>Betrag</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $res_rechnungenneben=mysqli_query($link,"SELECT * FROM rechnungen WHERE Typ='Nebenkosten'");
            while ($datensatz2=mysqli_fetch_assoc($res_rechnungenneben)){

                echo "<tr><td>".$datensatz2["ID"]."</td>";
                echo "<td>".$datensatz2["Typ"]."</td>";
                echo "<td>".$datensatz2["Art"]."</td>";
                echo "<td>".$datensatz2["Rechnungstext"]."</td>";
                echo "<td>".$datensatz2["Datum"]."</td>";
                echo "<td>".$datensatz2["Betrag"]."</td></tr>";
				}
			$res_resultatneben=mysqli_query($link,"SELECT SUM(Betrag) FROM rechnungen WHERE Typ='Nebenkosten'");
            while ($datensatz3=mysqli_fetch_assoc($res_resultatneben)){
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><h3>Total:</h3></td>";
					echo "<td></td>";
					echo "<td><h3>".$datensatz3["SUM(Betrag)"]."</h3></td>";
										
                 }
            ?>
            </tbody>
        </table>

        </br>
        </br>
        </br>

    </div>
</div>
</body>

<?php include "footer.php"; ?>

</html>