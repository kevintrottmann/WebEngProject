<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
$jahr = $_POST['jahr'];
?>

<!DOCTYPE html>
<html>

<?php
    //include "authorized.php";
    include "header.php";
    include "db.connection.php";
?>
 

<body>
    <div class="container">
        <div class="table-responsive">
	<h3>Jahr</h3>
	<?php echo "Abrechnung aus dem folgendem Jahr:";
		
		
		echo $jahr;
	?>
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
            $res_rechnungenheiz=mysqli_query($link,"SELECT * FROM rechnungen WHERE Typ='Heizkosten' AND YEAR(Datum)='$jahr'");
            while ($datensatz=mysqli_fetch_assoc($res_rechnungenheiz)){

                echo "<tr><td>".$datensatz["ID"]."</td>";
                echo "<td>".$datensatz["Typ"]."</td>";
                echo "<td>".$datensatz["Art"]."</td>";
                echo "<td>".$datensatz["Rechnungstext"]."</td>";
                echo "<td>".$datensatz["Datum"]."</td>";
                echo "<td>".$datensatz["Betrag"]."</td></tr>";
				}
			$res_resultatheiz=mysqli_query($link,"SELECT SUM(Betrag) FROM rechnungen WHERE Typ='Heizkosten' AND YEAR(Datum)='$jahr'");
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
            $res_rechnungenneben=mysqli_query($link,"SELECT * FROM rechnungen WHERE Typ='Nebenkosten' AND YEAR(Datum)='$jahr'");
            while ($datensatz2=mysqli_fetch_assoc($res_rechnungenneben)){

                echo "<tr><td>".$datensatz2["ID"]."</td>";
                echo "<td>".$datensatz2["Typ"]."</td>";
                echo "<td>".$datensatz2["Art"]."</td>";
                echo "<td>".$datensatz2["Rechnungstext"]."</td>";
                echo "<td>".$datensatz2["Datum"]."</td>";
                echo "<td>".$datensatz2["Betrag"]."</td></tr>";
				}
			$res_resultatneben=mysqli_query($link,"SELECT SUM(Betrag) FROM rechnungen WHERE Typ='Nebenkosten' AND YEAR(Datum)='$jahr'");
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

		<h3>Abrechnung</h3>
		<h4>Ausgaben</h4>
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
            $res_rechnungenall=mysqli_query($link,"SELECT * FROM rechnungen WHERE YEAR(Datum)='$jahr'");
            while ($datensatz4=mysqli_fetch_assoc($res_rechnungenall)){

                echo "<tr><td>".$datensatz4["ID"]."</td>";
                echo "<td>".$datensatz4["Typ"]."</td>";
                echo "<td>".$datensatz4["Art"]."</td>";
                echo "<td>".$datensatz4["Rechnungstext"]."</td>";
                echo "<td>".$datensatz4["Datum"]."</td>";
                echo "<td>".$datensatz4["Betrag"]."</td></tr>";
				}
			$res_resultatall=mysqli_query($link,"SELECT SUM(Betrag)FROM rechnungen WHERE YEAR(Datum)='$jahr'");
            while ($datensatz5=mysqli_fetch_assoc($res_resultatall)){
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><h4>Total:</h4></td>";
					echo "<td></td>";
					echo "<td><h4>".$datensatz5["SUM(Betrag)"]."</h4></td>";
					$ausgaben=$datensatz5["SUM(Betrag)"];
										
                 }
            ?>
            </tbody>
        </table>

		
		<h4>Einnahmen</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Typ</th>
                <th>Art</th>
                <th>Rechnungstext</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $res_einnahmen=mysqli_query($link,"SELECT * FROM einnahmen WHERE YEAR(Datum)='$jahr'");
                        while ($datensatz6=mysqli_fetch_assoc($res_einnahmen)){

                            echo "<tr><td>".$datensatz6["ID"]."</td>";
                            echo "<td>";
							$id_mieter = $datensatz6["ID_Mieter"];
							$res_mieter=mysqli_query($link,"SELECT * FROM mieter WHERE ID='$id_mieter'");
							$datensatz7=mysqli_fetch_assoc($res_mieter);
							echo $datensatz7["Vorname"]." ".$datensatz7["Nachname"];
							echo "</td>";
                            echo "<td>".$datensatz6["Datum"]."</td>";
                            echo "<td>".$datensatz6["Betrag"]."</td></tr>";
                            
							}
			$res_resultatall=mysqli_query($link,"SELECT SUM(Betrag)FROM einnahmen WHERE YEAR(Datum)='$jahr'");
            while ($datensatz8=mysqli_fetch_assoc($res_resultatall)){
					echo "<tr><td></td>";
					echo "<td><h4>Total:</h4></td>";
					echo "<td></td>";
					echo "<td><h4>".$datensatz8["SUM(Betrag)"]."</h4></td></tr>";
					$einnahmen=$datensatz8["SUM(Betrag)"];					
                 }
				 
				 
            ?>
            </tbody>
        </table>
		<?php echo "<h3>Gesamttotal:</h3>"; 
		 $total=$einnahmen-$ausgaben;
		 echo "<h3>$total</h3>";
		?>
		
		
    </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>