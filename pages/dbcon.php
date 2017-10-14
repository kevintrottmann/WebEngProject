<?php

$servername = 'localhost:3306';
$username ='db_root';
$password = 'kXrl50%0';

$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
	echo 'Connection Error '.mysqli_connect_error();
}

echo 'connect successfully';

