<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<?php
    include "db.connection.php";
	
	
	$id_einnahme=$_POST['ID'];
	echo("ID: $id_einnahme");

    $delsql =mysqli_query($link,"DELETE FROM einnahmen WHERE ID='$id_einnahme'");
    $eintragen = mysqli_query($link,$delsql);

    echo "<script>window.location.href ='einnahmen.php';</script>";
?>