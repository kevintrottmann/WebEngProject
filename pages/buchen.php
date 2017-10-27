	<?php
    /* =============================================
        start session and include form class
    ============================================= */

	session_start();
	//$pdo = new PDO('mysql:host=localhost;dbname=db_photocase', 'root', '');

    /* ==================================================
        The Form
    ================================================== */

    print_r($_GET);
    $firstname = "";
    $lastname = "";


    if(isset($_GET['firstname'])){
        $firstname = $_GET['firstname'];
    }
    //Datenbank request speichern
    ?>

<html> 
	<head>
		<title>Buchen</title>
		<?php
			include_once('navbar.php');
		?>
        <link type="text/css" rel="stylesheet" href="../css/booking-form.css"
	</head>
    <body>

    <form action="buchen.php" method="GET" name="buchungssubmit">
        <!--  General -->
        <div class="form-group">
            <h2 class="heading">Booking & contact</h2>
            <div class="grid">
                <div class="col-2-3">
                    <div class="controls">
                        <input type="text" id="sirname" class="floatLabel" name="sirname" placeholder="Vorname">
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="controls">
                        <input type="text" id="firstname" class="floatLabel" name="firstname" placeholder="Nachname">
                    </div>
                </div>
            </div>
            <div class="controls">
                <input type="text" id="email" class="floatLabel" name="email" placeholder="E-Mail">
            </div>
            <div class="controls">
                <input type="tel" id="phone" class="floatLabel" name="phone" placeholder="Telefonnummer">
            </div>
            <div class="grid">
                <div class="col-2-3">
                    <div class="controls">
                        <input type="text" id="street" class="floatLabel" name="street" placeholder="Strasse">
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="controls">
                        <input type="number" id="street-number" class="floatLabel" name="street-number" placeholder="Nr.">
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-2-3">
                    <div class="controls">
                        <input type="text" id="city" class="floatLabel" name="city" placeholder="Ort">
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="controls">
                        <input type="text" id="post-code" class="floatLabel" name="post-code" placeholder="PLZ">
                    </div>
                </div>
            </div>
        </div>
        <!--  Details -->
        <div class="form-group">
            <h2 class="heading">Details</h2>
            <div class="grid">
                <div class="col-1-4 col-1-4-sm">
                    <div class="controls">
                        <input type="datetime-local" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-1-4 col-1-4-sm">
                    <div class="controls">
                        <input type="datetime-local" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                </div>
            </div>
            <div class="grid">
                <p class="info-text">Weitere Informationen</p>
                <br>
                <div class="controls">
                    <textarea name="comments" class="floatLabel" id="comments" placeholder="Ihr Kommentar"></textarea>

                </div>
                <button type="submit" value="Submit" class="col-1-4">Submit</button>
            </div>
        </div> <!-- /.form-group -->
    </form>
    </body>
</html>
