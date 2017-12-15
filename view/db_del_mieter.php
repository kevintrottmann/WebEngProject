<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:http://photoca.se/index.php");
}
?>

<?php
    include "db.connection.php";
	
	
	$id_buchungen=$_POST['ID'];
	echo("ID: $id_buchungen");

    $delsql =mysqli_query($link,"DELETE FROM mieter WHERE ID='$id_buchungen'");
    $eintragen = mysqli_query($link,$delsql);

    echo "<script>window.location.href ='mieter.php';</script>";
?>