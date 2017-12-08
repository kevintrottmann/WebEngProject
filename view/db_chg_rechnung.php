<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "db.connection.php";
	
	$id_rechnung=$_POST['ID'];
	
	$chg_rechnung =mysqli_query($link,"SELECT * FROM rechnungen WHERE ID='$id_rechnung'");
	$datensatz=mysqli_fetch_assoc($chg_rechnung);
	
	
	
?>


<body>
    <div class="container">
        <div class="page-header">
            <h3> Rechnung bearbeiten</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" name="mieterform" action="db_chg_rechnung_value.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Rechnungs_ID:</label>
                <div class="col-sm-10">
                    <input type="id" class="form-control" name="id" value="<?php echo $datensatz["ID"]; ?>" readonly>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-2" for="typ">Typ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="typ" value="<?php echo $datensatz["Typ"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="art">Art:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="art" value="<?php echo $datensatz["Art"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="rechnungstext">Rechnungstext:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="rechnungstext" value="<?php echo $datensatz["Rechnungstext"]; ?>">
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
                    <button type="submit" class="btn btn-primary" onclick="checkform()">Mieter ändern</button>
                </div>
            </div>
        </form>
    </div>
</body>

<?php include "footer.php"; ?> 
</html>