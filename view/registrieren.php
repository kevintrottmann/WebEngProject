
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
// Session starten oder neu aufnehmen
session_start();

if (isset($_POST['erfassen']) OR isset($_POST['anpassen']))
{
		
  if (isset($_POST['email']) AND isset($_POST['passwort1']))
  {
  $vonwo = $_POST["vonwo"];
  $email = $_POST["email"];
  $benutzername = $_POST["benutzername"];
  $passwort1 = $_POST["passwort1"];
  $passwort2 = $_POST["passwort2"];
  $pass = md5($passwort1);

    if (($passwort1 == $passwort2) && (strlen($passwort1) >= 8))
    {
    // Datenbankverbindung
    include "db.inc.php";
	$link=mysqli_connect("localhost", $benutzer, $passwort) or die("Keine Verbindung zur Datenbank!");
    mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");

    // damit ä,ö,ü und é richtig dargestellt werden! --> auf utf8 stellen
    mysqli_query($link, "SET NAMES 'utf8'");
	
	// falls vom Formular anpassen 
    if ($vonwo == "anpassen")      
    { 
      $anpassung = "UPDATE users SET `password`='$pass', `user_name`='$benutzername' WHERE `email`='$email'";
      $angepasst = mysqli_query($link,$anpassung);
      if ($angepasst == TRUE)
	  {
	    echo "Die Daten wurden angepasst<br/>";
	    echo "Ihre Session_id ist:".session_id();
        echo "<br/> <a href=\"login_c.php\">Zu den geheimen Daten</a>";
	    echo "<br/> <a href=\"index.php\">Logout</a>";
	    $_SESSION['name']=$email;
        $_SESSION['eingeloggt']= true;
	  }
    } 
	
    // falls vom Formular "Neues Login" 
    if ($vonwo == "erfassung")
    {
    // prüfen ob email bereits vorhanden
    $abfrage="SELECT email FROM `users` WHERE email='$email'";
	$ergebnis=mysqli_query($link,$abfrage) or die("Abfrage hat nicht geklappt!");
	$count=mysqli_num_rows($ergebnis);
	
	if ($count == 1) 
	  { echo "<font>Diese E-Mail-Adresse wurde bereits erfasst!</font>";}
	else
	  {
	// Benutzer erfassen, weil noch nicht in DB vorhanden
	$insert="INSERT INTO users (`user_id`, `user_name`, `password`, `email`) VALUES('','$benutzername','$pass','$email')";
    mysqli_query($link,$insert)or die("DB-Eintrag hat nicht geklappt!");
	echo "<font>Daten wurden erfasst!!</font><br/>";
	  }
	}
    // Datenbankverbindung beenden
    mysqli_close($link);  	    
	} // end if passwörter gleich und länger als 8 Zeichen
	else
	{
			echo "Passwörter waren nicht identisch";
	} // end if passwörter gleich und länger als 8 Zeichen
  } // end if isset email, passwort1
}  // end if isset $submit
?>




    <div class="login-clean" style="background-color:rgb(97,100,102);">
        <form  method="post">
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
                <input class="form-control" type="passwort" name="passwort1" placeholder="Passwort">
            </div>
			<div class="form-group">
                <input class="form-control" type="passwort" name="passwort2" placeholder="Passwort wiederholen">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" onClick="www.photoca.se" style="background-color:rgb(244,175,71);">registrieren</button>
            </div>
			</form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
 
</body>
</html>