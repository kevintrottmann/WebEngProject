<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "db.connection.php";
?>

<body>
    <div class="container-fluid">
        <div class="page-header">
            <h3>Mieter</h3></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mieter ID</th>
                        <th>Nachname</th>
                        <th>Vorname</th>
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
					<form action="db_del_mieter.php" method="post">
                    <?php
							
                        $res_mieter=mysqli_query($link,"SELECT * FROM mieter");
                        while ($datensatz=mysqli_fetch_assoc($res_mieter)) {

                            echo "<tr><td>" . $datensatz["ID"] . "</td>";
                            echo "<td>" . $datensatz["Nachname"] . "</td>";
                            echo "<td>" . $datensatz["Vorname"] . "</td>";
                            echo "<td>" . $datensatz["Strasse"] . "</td>";
                            echo "<td>" . $datensatz["PLZ"] . "</td>";
                            echo "<td>" . $datensatz["Ort"] . "</td>";
                            echo "<td>" . $datensatz["Liegenschaft"] . "</td>";
                            echo "<td>" . $datensatz["Mietzins"] . "</td>";
                            echo "<td>" . $datensatz["Periode"] . "</td>";
                            echo "<td><input type='submit' btn class='btn btn-primary' id='changebtn' name='.$datensatz.ID.' value='change'><span class='glyphicon glyphicon-pencil'></span></btn>
                                      <input type='submit' btn class='btn btn-primary' id='deletebtn' name='.$datensatz.ID.' value='delete'><span class='glyphicon glyphicon-remove-circle'></span></btn></td></tr>";
                        }
                    ?>
					</form>
                </tbody>
            </table>
			<a href="form_neuermieter.php" class="btn btn-primary" type="button"> Mieter erfassen </a>
        </div>
    </div>
</body>

<?php include "footer.php"; ?>

</html>