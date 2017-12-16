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
		<form class="form-horizontal" action="abrechnungen_value.php" name="abrechnungform" method="post">
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
		<button type="submit" class="btn btn-primary">Abrechnung Drucken</button>
		</form>
		</br>
		</br>
		<form class="form-horizontal" action="abrechnungen_value1.php" name="abrechnungform1" method="post">
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
		<button type="submit" class="btn btn-primary">Heizkosten Drucken</button>
		</form>
		</br>
		</br>
		<form class="form-horizontal" action="abrechnungen_value2.php" name="abrechnungform2" method="post">
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
		<button type="submit" class="btn btn-primary">Nebenkosten Drucken</button>
		</form>
	
        
    </div>
    
</div>
</body>

<?php include "footer.php"; ?>

</html>