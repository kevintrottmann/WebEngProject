<?PHP
session_start();

// Session beenden 
// damit können wir diese Seite als "Logout" verwenden
session_unset();
session_destroy();
unset($_SESSION); // Session-Array löschen
// Session-Cookie löschen 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
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

<?php
// Session starten oder neu aufnehmen
session_start();


    <div class="login-clean" style="background-color:rgb(97,100,102);">
        <form method="post">
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