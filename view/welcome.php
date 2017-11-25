<!DOCTYPE html>
<html>

<?php include "header.php"; 
include "db.connection.php"; 

if(!isset($_SESSION['userid'])) {
echo $_SESSION['userid'];
//echo "<script type='text/javascript'>window.document.location.href ='../index.php';</script>";
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
?>
 

<body>
    <div class="container">
        <div class="page-header">
            <h3>Willkommen auf Photoca.se</h3></div>
        
        </div>
    </div>
</body>

<?php include "footer.php"; ?> 

</html>