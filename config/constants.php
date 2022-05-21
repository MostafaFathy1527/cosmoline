<?php
session_start();
define('SITEURL','http://localhost/cosmoline/');
define('LOCALHOST','localhost');
define('DB_USERNAM','root');
define('DB_PASSWORD','');
define('DB_NAME','cosmoline');
$conn=mysqli_connect(LOCALHOST,DB_USERNAM,DB_PASSWORD)or die(mysqli_error());
$db_select=mysqli_select_db($conn,DB_NAME)or die(mysqli_error());
?>