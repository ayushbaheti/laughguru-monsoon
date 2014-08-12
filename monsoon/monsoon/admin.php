<?php
require 'session.php';
if($_SESSION['user_id']!='1'){
    die("<b>You are not allowed to access this page</b>");
}
?>
<html>
<head>
    <title>Hello Admin</title>
    <link rel="stylesheet" href="navigation1/css/index.css" />
    <style>
        a.link{
            color: red;
            margin-left:20px;
        }
    </style>
</head>
<body style="height: 780px;width: 1200px;margin-left:auto;margin-right: auto;">
    <div  class="heder" >
        <div class="logo" ><img src="navigation1/images/logo.png"  width="150" > </div>
        <div class="logo1" ><img src="navigation1/images/menu_bar.png" width="20" ></div>
        <div class="logo2" ><a href="logout.php"><img src="navigation1/images/logout.png" width="100"  ></a></div>
    </div><br>
    <a style="color: red;" href="schedule.php">SCHEDULE</a>
    <a class="link" href="notification.php">NOTIFICATION</a>
    <a class="link" href="view_feedback.php">FEEDBACK</a>
    <a class="link" href="get_preferences.php">PREFERENCES</a>
    <a class="link" href="navigation1/index.php?subject=English&topic=">NAVIGATION</a>
</body>
</html>