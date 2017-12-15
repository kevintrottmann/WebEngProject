<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<?php
    include "db.connection.php";
	
	
	$id_rechnung=$_POST['ID'];
	echo("ID: $id_rechnung");

    $delsql =mysqli_query($link,"DELETE FROM rechnungen WHERE ID='$id_rechnung'");
    $eintragen = mysqli_query($link,$delsql);

    echo "<script>window.location.href ='rechnungen.php';</script>";
?>