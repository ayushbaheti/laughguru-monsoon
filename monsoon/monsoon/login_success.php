<?php
session_start();
$email=$_SESSION['email'];
$query_run=mysql_query("SELECT `user_name` FROM `user_reg` WHERE `user_email`='$email'");
$query_row=mysql_fetch_array($query_run);
$_SESSION['name']=$query_row['user_name'];
require_once("session.php");
confirm_logged_in();
header('Location: navigation1/index.php?subject=English&topic=');
?>