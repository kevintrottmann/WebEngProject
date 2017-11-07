<?php
	$pageToInclude = './pages/welcome.php';
	if(isset($_GET['page'])){	
		$pageToInclude = './pages/' . $_GET['page'] . '.php';			
	}
    /*Session-Check
    session_start();
    if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
    }

    //Abfrage der Nutzer ID vom Login
    $userid = $_SESSION['userid'];

    echo "Hallo User: ".$userid;
    */
?>

<!DOCTYPE html>
<html lang="en">
  
	<head>
	    <?php
            include('./pages/header.php');
        ?>
	</head>
	
	
	<body>
        <div class="container-fluid">
            <div class="row">
                <?php
                include('./pages/navbar.php');
                ?>
            </div>

            <div class="row">
                <?php
                include($pageToInclude);
                ?>
            </div>
        </div>
	</body>
</html>