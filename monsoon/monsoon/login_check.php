<?php
include("connection.php");
$email=strtolower($_POST['user_email']);
$password=$_POST['user_pass'];

// To protect MySQL injection 
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
//$password=sha1($password);
if($_POST['user_pass']==""){
    header("location:index.php?email=$email");
}
$sql="SELECT * FROM `user_reg` WHERE user_email='$email' and user_pass='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
    session_start();
    $userDetails=mysql_fetch_assoc($result);
    $_SESSION['user_email']=$email;//set a session
    $_SESSION['user_fn']=$userDetails['user_fn'];
    $_SESSION['user_name']=$userDetails['user_fn'].' '.$userDetails['user_ln'];
    $_SESSION['user_std']=$userDetails['user_std'];
    $_SESSION['user_board']=$userDetails['user_board'];
    $_SESSION['user_id']=$userDetails['user_id'];
    if($userDetails['user_id']=='1'){
       header("location:admin.php"); 
    }
    else{
        header("location:navigation1/index.php?subject=English&topic=");
    }
}
else{
    header("location:index.php?email=$email");
}
?>