<?php
	$pageToInclude = './pages/welcome.php';
	if(isset($_GET['page'])){	
		$pageToInclude = './pages/' . $_GET['page'] . '.php';			
	}
?>
<!DOCTYPE html>
<html lang="en">
  
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- Stylesheets 
		<link rel="stylesheet" href="./css/modal.css">	
		-->	
		
	</head>
	
	
	<body>
		<?php
			include('./pages/navbar_new.php');			
		?>
		<div class="container-fluid">
		<?php
			include($pageToInclude);
		?>
		<div>
	</body>
</html>