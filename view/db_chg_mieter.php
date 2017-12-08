<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "db.connection.php";
	
	$id_buchungen=$_POST['ID'];
	
	$chg_mieter =mysqli_query($link,"SELECT * FROM mieter WHERE ID='$id_buchungen'");
	$datensatz=mysqli_fetch_assoc($chg_mieter);
	
	
	
?>


<body>
    <div class="container">
        <div class="page-header">
            <h3> Mieter bearbeiten</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" name="mieterform" action="db_chg_mieter_value.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Mieter_ID:</label>
                <div class="col-sm-10">
                    <input type="id" class="form-control" name="id" value="<?php echo $datensatz["ID"]; ?>" readonly>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-2" for="vorname">Vorname:</label>
                <div class="col-sm-10">
                    <input type="vorname" class="form-control" name="vorname" value="<?php echo $datensatz["Vorname"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="nachname">Nachname:</label>
                <div class="col-sm-10">
                    <input type="nachname" class="form-control" name="nachname" value="<?php echo $datensatz["Nachname"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="strasse">Strasse:</label>
                <div class="col-sm-10">
                    <input type="strasse" class="form-control" name="strasse" value="<?php echo $datensatz["Strasse"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="plz">PLZ:</label>
                <div class="col-sm-10">
                    <input type="plz" class="form-control" name="plz" value="<?php echo $datensatz["PLZ"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="ort">Ort:</label>
                <div class="col-sm-10">
                    <input type="ort" class="form-control" name="ort" value="<?php echo $datensatz["Ort"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="liegenschaft">Liegenschaft:</label>
                <div class="col-sm-10">
                    <input type="liegenschaft" class="form-control" name="liegenschaft" value="<?php echo $datensatz["Liegenschaft"]; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="mietzins">Mietzins:</label>
                <div class="col-sm-10">
                    <input type="mietzins" class="form-control" name="mietzins" value="<?php echo $datensatz["Mietzins"]; ?>">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" onclick="checkform()">Mieter speichern</button>
                </div>
            </div>
        </form>
    </div>
</body>

<?php include "footer.php"; ?> 
</html>