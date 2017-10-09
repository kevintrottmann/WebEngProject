<?php
if (@$_SESSION['eingeloggt']!='bb2017')
{
    echo "Sie haben keinen Zugriff hier <br/>";
    echo "<a href='index.php'> Zum Login</a>";
    exit();
}
    

