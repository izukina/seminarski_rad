<?php

header('Content-Type: text/html; charset=utf-8');


$dbc = mysqli_connect('localhost', 'root', '', 'seminarska_baza') or die('Error
connecting to MySQL server.'.mysqli_error());
mysqli_set_charset($dbc, "utf8");

echo "Connection succesfull";


//Ako se zelis automatski spojit na bazu u drugom file-u:
//<?php 
// include 'connect.php'
// ?
// >


?>