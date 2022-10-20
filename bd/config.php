<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', ''); // IP SERVER or localhost if u used xampp - lampp ...
define('DB_USERNAME', ''); // Username
define('DB_PASSWORD', ''); // Password
define('DB_NAME', ''); //Database

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link->set_charset("utf8mb4");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>