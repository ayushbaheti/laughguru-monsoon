<?php
include 'connection.php';
include_once('admin.php');

$newDate1=9;//to return nothing initially
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $date=$_POST['date'];
    $newDate=date("N",strtotime($date));
    if($newDate%2==0) $newDate1=1;
    else $newDate1=2;
}
?>

<html>
<head>
    <title>Notify</title>
    <style>
        table{
            border: 1px solid black;
            border-spacing:10px;
        }
    </style>
</head>
<body>
    <div style="width: 70%;margin-left: auto;margin-right: auto;"><br><br>
            <form style="text-align: center;" action="notification.php" method="POST">
                Choose a date: <input type="date" name="date" value="<?php echo @$_POST['date']?>">
                <input type="submit" value="Get Users"/>
            </form>
        <form action="enter_notification.php" method="POST">
            <input type="hidden" value="<?php echo $_POST['date'];?>" name="date">
            <table style="margin-left: auto;margin-right: auto;margin-top: -55%;">
                <colgroup>
                    <col style="">
                    <col style="color:green;">
                    <col style="color:blue;">
                    <col style="">
                </colgroup>
                <tr style="color: red;font-weight:bold;text-align: center;"><td>NAME</td><td>CONTACT</td><td>SMS SENT?</td><td>SUBJECT</td><td>TOPIC</td><td>SUB-TOPIC</td></tr>
                <?php $query="SELECT * FROM user_reg";$query_run=mysql_query($query);
                while($result=mysql_fetch_assoc($query_run)){
                    echo '<tr><td>'.$result['user_fn'].'</td><td>'.$result['user_contact'].'</td><td><input type="checkbox" value="'.$result['user_id'].'" name="user[]"></td><br>';
                    $query1="SELECT * FROM topics WHERE day=$newDate1 AND subject_id IN (SELECT subject_id FROM preferences WHERE user_id=$result[user_id])";
                    $query_run1=mysql_query($query1);
                    while($result1=mysql_fetch_assoc($query_run1)){
                        echo '<td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td></tr><tr><td></td><td></td><td></td>';
                    }
                }
                ?>
            </table><br><br>
            <div style="width: 20px;margin-left: auto;margin-right: auto;"><input type="submit"></div>
        </form>
    </div>
</body>