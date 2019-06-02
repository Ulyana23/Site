<?php
$dbhost = 'std-mysql';
$dbuser ='std_840';
$dbpass = 'ul230200';
$dbname = 'std_840';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) { //нашли ошибку
	printf("Connect failed: %s\n", mysqli_connect_error()); //печатаем ошибку
	exit();
}
//session_start();
?>