<?php 
include "db.connection.login.php"; 
?>
<!DOCTYPE html> 
<html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:rgb(97,100,102);">
 
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
 $error = false;
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 $vorname= $_POST['vorname'];
 $nachname= $_POST['nachname'];
  
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
 $error = true;
 } 
 if(strlen($passwort) == 0) {
 echo 'Bitte ein Passwort angeben<br>';
 $error = true;
 }
 if($passwort != $passwort2) {
 echo 'Die Passwörter müssen übereinstimmen<br>';
 $error = true;
 }
 
 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) { 
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 if($user !== false) {
 echo "alert('Diese E-Mail-Adresse ist bereits vergeben')";
 $error = true;
 } 
 }
 
 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) { 
 //$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
 
 $statement = $pdo->prepare("INSERT INTO users (email, passwort,vorname,nachname) VALUES (:email, :passwort, :vorname, :nachname)");
 $result = $statement->execute(array('email' => $email, 'passwort' => $passwort, 'vorname' => $vorname,'nachname' => $nachname, ));
 
 if($result) { 
 echo 'Du wurdest erfolgreich registriert. <a href="../index.php">Zum Login</a>';
 $showFormular = false;
 } else {
 echo "alert('Beim Abspeichern ist leider ein Fehler aufgetreten')";
 }
 } 
}
 
if($showFormular) {
?>
 
<div class="login-clean" style="background-color:rgb(97,100,102);">
        <form action="?register=1" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color:rgb(244,164,71);">Registrierung</h1></div>
			<div class="form-group">
                <input class="form-control" type="vorname" name="vorname" placeholder="Vorname">
            </div>
			<div class="form-group">
                <input class="form-control" type="nachname" name="nachname" placeholder="Nachname">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="passwort" placeholder="Passwort">
            </div>
			<div class="form-group">
                <input class="form-control" type="password" name="passwort2" placeholder="Passwort wiederholen">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" onClick="www.photoca.se" style="background-color:rgb(244,175,71);">registrieren</button>
            </div>
			</form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>