<html>
    <head>
        <meta charset="UTF-8">
        <title>Login erfassen</title>
        
    </head>
    <body>
        <?php
        if (isset($_POST['benutzer']))
        {
            $login=$_POST['benutzer'].";".$_POST['passwort'].";\n";
            
            // erzeugen eines Login-Eintrags
            $dz= fopen("logins.csv", "a");
            fwrite($dz, $login);
            fclose($dz);     
        }            
        ?>
        <h3> Login erfassen </h3>
        <form onsubmit="return fcheck()" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="text" name="benutzer" value="" />Benutzer <br/>
            <input type="password" name="passwort" value="" />Passwort <br/>
            <input type="password" name="passwort2" value="" />Passwort wiederholen<br/>
            <input type="submit" value="erfassen" />
            <input type="reset" value="reset" />
        </form>
        <br/>
    </body>
</html>
