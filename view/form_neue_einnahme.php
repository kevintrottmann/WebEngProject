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
?>


<body>
    <div class="container">
        <div class="page-header">
            <h3>Neue Einnahmen erfassen</h3>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal" name="mieterform" action="db_add_einnahme.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Mieter:</label>
                <div class="col-sm-10">
                   <!--  <input type="text" class="form-control" name="id" placeholder="Mieter auswählen"> -->
					<select name="id" style="height:40px;width:220px;font-size:20px;">
					
					<?php 
					$res_mieter=mysqli_query($link,"SELECT * FROM mieter");
                     while ($datensatz=mysqli_fetch_assoc($res_mieter)){

							echo '<option value=';
							echo $datensatz["ID"];
							echo '>';
							echo $datensatz["Vorname"].' '; 
							echo $datensatz["Nachname"];
							echo '</option>';  
					}
					?>
					</select>
				</div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="datum">Datum:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="datum" placeholder="Datum auswählen">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="betrag">Betrag:</label>
                <div class="col-sm-10">
                    <input type="number_format" class="form-control" name="betrag" placeholder="Betrag eingeben">
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Erfassen</button>
                </div>
            </div>
        </form>
    </div>
</body>
<?php include "footer.php"; ?> 
</html>