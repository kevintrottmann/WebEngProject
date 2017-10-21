<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        require '../pages/home.php';
        break;
	// Booking page
    case '/booking':
        require '../pages/buchen.php';
        break;
	// Login page
    case '/login':
        require '../pages/login.php';
        break;	
	// Register page
    case '/register':
        require '../pages/register.php';
        break;	
    // About page
    case '/about':
        require '../pages/about.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require '../views/404.php';
        break;
}
?>