<?php
include 'connection.php';
include_once('admin.php');
//$date=$_POST['date'];
//$newDate=date("l",strtotime($date));
$query1="SELECT `subject_id` FROM `topics` WHERE `subject`='English'";
$query_run1=mysql_query($query1);
$query2="SELECT `subject_id` FROM `topics` WHERE `subject`='Maths'";
$query_run2=mysql_query($query2);
$query3="SELECT `subject_id` FROM `topics` WHERE `subject`='Science'";
$query_run3=mysql_query($query3);

//filling in data
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $empty=false;
    foreach($_POST as $var){
        if($var=="") $empty=true;
    }
    if($empty){
        echo '<br><br><span style="font-weight:bold;color:blue">Please fill in all the fields</span>';
    }
    elseif($_POST['e1']==$_POST['e2']||$_POST['e1']==$_POST['e3']||$_POST['e2']==$_POST['e3']||$_POST['m1']==$_POST['m2']||$_POST['m1']==$_POST['m3']||$_POST['m2']==$_POST['m3']||$_POST['s1']==$_POST['s2']||$_POST['s1']==$_POST['s3']||$_POST['s2']==$_POST['s3']){
        echo '<br><br><span style="font-weight:bold;color:blue">All the values are not distinct!</span>';
    }
    else{
        $date=$_POST['date'];
        $newDate=date("N",strtotime($date)); //Tuesday=2
        echo $newDate;
        if($newDate!='1'){
            if($newDate%2==0){
                foreach($_POST as $ex){
                    $query="UPDATE `topics` SET  `day` =  '1' WHERE  `subject_id` =$ex";
                    mysql_query($query);
                }
            }
            else{
                foreach($_POST as $ex){
                    $query="UPDATE `topics` SET  `day` =  '2' WHERE  `subject_id` =$ex";
                    mysql_query($query);
                }
            }
            echo '<br><br><span style="font-weight:bold;color:blue">Succesfully updated data!</span>';
        }
        else{
            echo '<br><br><span style="font-weight:bold;color:blue">It\'s a MONDAY!!!!!</span>';
        }
        //header("location:schedule.php");
    }
}
?>

<html>
<head>
    <title>Schedule</title>
    <style>
        h2{
            display: inline;
        }
    </style>
</head>
<body>
    <datalist id="english"><?php while($e=mysql_fetch_array($query_run1)){echo "<option value=$e[0]>";}?></datalist>
    <datalist id="maths"><?php while($e=mysql_fetch_array($query_run2)){echo "<option value=$e[0]>";}?></datalist>
    <datalist id="science"><?php while($e=mysql_fetch_array($query_run3)){echo "<option value=$e[0]>";}?></datalist>
    <h1 style="text-align: center;">Enter the schedule:</h1>
    <div style="width: 80%;margin-left: auto;margin-right: auto;">
        <form action="schedule.php" method="POST">
            <h2>Date: </h2><input type="date" name="date" value="<?php echo @$_POST['date'];?>"><br><br>
            <h2>English:  </h2><input name="e1" list="english" value="<?php echo @$_POST['e1'];?>"><input name="e2" list="english" value="<?php echo @$_POST['e2'];?>"><input name="e3" list="english" value="<?php echo @$_POST['e3'];?>"><br><br>
            <h2>Maths:  </h2><input name="m1" list="maths" value="<?php echo @$_POST['m1'];?>"><input name="m2" list="maths" value="<?php echo @$_POST['m2'];?>"><input name="m3" list="maths" value="<?php echo @$_POST['m3'];?>"><br><br>
            <h2>Science:  </h2><input name="s1" list="science" value="<?php echo @$_POST['s1'];?>"><input name="s2" list="science" value="<?php echo @$_POST['s2'];?>"><input name="s3" list="science" value="<?php echo @$_POST['s3'];?>"><br><br>
            <input type="submit">
        </form>    
    </div>
</body>
</html>