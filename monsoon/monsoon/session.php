<?php
session_start();
function logged_in(){
    return isset($_SESSION['user_email']);
}
function confirm_logged_in(){
    if(!logged_in()){
        echo 'Please login first!<br/>';
        echo 'Login ';echo '<a href="/superuser/index.php">here</a>';
        die();
    }
}
?>