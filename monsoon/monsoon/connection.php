<?php
//connect.php
$server = '127.0.0.1';
$username   = 'lolland';
$password   = 'lordmonk';
$database   = 'laughguru';
$connection=mysql_connect($server, $username,  $password);
$connectDb=mysql_select_db($database);
if(!$connection)
{
    error_reporting(-1);
	ini_set('display_errors', '1');
    exit('Error: could not establish database connection!');
}
if(!$connectDb)
{
	error_reporting(-1);
	ini_set('display_errors', '1');
    exit('Error: could not select the database');
}

// error_reporting(E_ALL);
?>

