		<?php 
		session_start();
		$pdo = new PDO('mysql:host=localhost';'db_photocase','db_root','aVu8k&13');
		 
		if(isset($_GET['login'])) {
		 $email = $_POST['email'];
		 $passwort = $_POST['passwort'];
		 
		 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		 $result = $statement->execute(array('email' => $email));
		 $user = $statement->fetch();
		 
		 //�berpr�fung des Passworts
		 if ($user !== false && password_verify($passwort, $user['passwort'])) {
		 $_SESSION['userid'] = $user['id'];
		 die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
		 } else {
		 $errorMessage = "E-Mail oder Passwort war ung�ltig<br>";
		 }
		?>

		<?php 
		if(isset($errorMessage)) {
		 echo $errorMessage;
		}
		?>

		<form action="?login=1" method="post">
		<br><br><br><br><br>E-Mail:<br>
		<input type="email" size="40" maxlength="250" name="email"><br><br>Dein Passwort:<br>
		<input type="password" size="40"  maxlength="250" name="passwort"><br><br>
		<input type="submit" value="Abschicken">
		</form>