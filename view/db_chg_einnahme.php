<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "db.connection.php";
	
	$id_einnahme=$_POST['ID'];
	
	$chg_einnahme =mysqli_query($link,"SELECT * FROM einnahmen WHERE ID='$id_einnahme'");
	$datensatz=mysqli_fetch_assoc($chg_einnahme);
	
	
	
?>


<body>
    <div class="container">
        <div class="page-header">
            <h3> Einnahme bearbeiten</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" name="mieterform" action="db_chg_einnahme_value.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Einnahme_ID:</label>
                <div class="col-sm-10">
                    <input type="id" class="form-control" name="id" value="<?php echo $datensatz["ID"]; ?>" readonly>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-2" for="mieter">Mieter_ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mieter" readonly value="<?php echo $datensatz["ID_Mieter"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="datum">Datum:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="datum" value="<?php echo $datensatz["Datum"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="betrag">Betrag:</label>
                <div class="col-sm-10">
                    <input type="number_format" class="form-control" name="betrag" value="<?php echo $datensatz["Betrag"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" onclick="checkform()">Einnahme speichern</button>
                </div>
            </div>
        </form>
    </div>
</body>

<?php include "footer.php"; ?> 
</html>