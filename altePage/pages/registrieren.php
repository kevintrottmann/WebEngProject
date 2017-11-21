	<?php 
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=db_photocase', 'db_root', 'aVu8k&13');
	?>

<html> 
	<head>
		<title>Registrierung</title>
		<?php
			include_once('navbar.php');
		?>  
	</head> 
	
	<body>
		<?php
		$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
		 
		if(isset($_GET['register'])) {
		 $error = false;
		 $email = $_POST['email'];
		 $passwort = $_POST['passwort'];
		 $passwort2 = $_POST['passwort2'];
		  
		 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 echo 'Bitte eine g�ltige E-Mail-Adresse eingeben<br>';
		 $error = true;
		 } 
		 if(strlen($passwort) == 0) {
		 echo 'Bitte ein Passwort angeben<br>';
		 $error = true;
		 }
		 if($passwort != $passwort2) {
		 echo 'Die Passw�rter m�ssen �bereinstimmen<br>';
		 $error = true;
		 }
		 
		 //�berpr�fe, dass die E-Mail-Adresse noch nicht registriert wurde
		 if(!$error) { 
		 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		 $result = $statement->execute(array('email' => $email));
		 $user = $statement->fetch();
		 
		 if($user !== false) {
		 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
		 $error = true;
		 } 
		 }
		 
		 //Keine Fehler, wir k�nnen den Nutzer registrieren
		 if(!$error) { 
		 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		 
		 $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
		 $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));
		 
		 if($result) { 
		 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
		 $showFormular = false;
		 } else {
		 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		 }
		 } 
		}
		if($showFormular) {
		?>
		<form action="?register=1" method="post">
		<br><br><br><br><br>E-Mail:<br>
		<input type="email" size="40" maxlength="250" name="email"><br><br>Dein Passwort:<br>
		<input type="password" size="40"  maxlength="250" name="passwort"><br><br>Passwort wiederholen:<br>
		<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
		<input type="submit" value="Abschicken">
		</form>
		
		<h2> Benutzerangaben </h2>
		<form>
			<div class="form-group">
				<label for="lastname">Nachname:</label>
				<input type="lastname" class="form-control" id="lastname">
			</div>
			
			<div class="form-group">
				<label for="firstname">Vorname:</label>
				<input type="firstname" class="form-control" id="firstname">
			</div>
		
			<div class="form-group">
				<label for="street">Strasse:</label>
				<input type="street" class="form-control" id="street">
			</div>
			
			<div class="form-group">
				<label for="zipcode">PLZ:</label>
				<input type="zipcode" class="form-control" id="zipcode">
			</div>
			
			<div class="form-group">
				<label for="place">Ort:</label>
				<input type="place" class="form-control" id="place">
			</div>
		</form>

		
		<h2> Benutzerkonto </h2>
		<form>	
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email">
			</div>
			
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd">
			</div>
			
			<div class="checkbox">
				<label><input type="checkbox"> Direkt zur Buchung </label>
			</div>
			
			<div class="checkbox">
				<label><input type="checkbox"> Mail-Newsletter erhalten </label>
			</div>
			
			<button type="submit" class="btn btn-default">Registrieren</button>
		</form>
 
		<?php
		} //Ende von if($showFormular)
		?>
 
	</body>
</html>