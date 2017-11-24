<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=db_photocase', 'db_root', 'aVu8k&13');
 
if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 //Überprüfung des Passworts
 if ($user !== false && password_verify($passwort, $user['passwort'])) {
 $_SESSION['userid'] = $user['id'];
 die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
 } else {
 $errorMessage = "E-Mail oder Passwort war ungültig<br>";
 }
 
}
?><!DOCTYPE html>
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

<?php 
if(isset($errorMessage)) {
 echo $errorMessage;
}
?>

    <div class="login-clean" style="background-color:rgb(97,100,102);">
        <form action="?login=1" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color:rgb(244,164,71);">Login</h1></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(244,175,71);">Log In</button>
            </div>
			<a href="view/registrieren.php" class="forgot">Registrieren?</a>
			<a href="view/mieter.php" class="forgot">Überspringen</a></form>
    </div>
    <script src="view/assets/js/jquery.min.js"></script>
    <script src="view/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>