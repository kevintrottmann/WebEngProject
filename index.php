<?php

//============================================================================================================
//	Name: 			Login Page 
//  Beschreibung: 	Startseite von Photoca.se hier kann man sich einlogen oder zur Registrierung weiter gehen
//============================================================================================================

session_start();

include ("view/db.connection.login.php");
include ("view/db.connection.php");

//Abfrage der Formulareingabe
if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort = md5($passwort);
 
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 //Überprüfung des Passworts
 if ($user !== false && $passwort == $user['passwort']) {
 $_SESSION['userid'] = $user['id'];
echo "<script type='text/javascript'>window.document.location.href ='view/welcome.php';</script>";
 } else {
 $message = "Passwort und Benutzername sind nicht korrekt";
 echo "<script type='text/javascript'>alert('$message');</script>";
 }
 
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="view/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="view/assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="view/assets/css/styles.css">
</head>


<body style="background-color:rgb(97,100,102);">

    <div class="login-clean" style="background-color:rgb(97,100,102);">
        <form action="?login=1" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color:rgb(244,164,71);">Login</h1></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="passwort" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(244,175,71);">Log In</button>
            </div>
			<a href="view/registrieren.php" class="forgot">Registrieren?</a>
			</form>
    </div>
    <script src="view/assets/js/jquery.min.js"></script>
    <script src="view/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>