<?php
include 'connection.php';
require 'session.php';
$query="SELECT * FROM `preferences` WHERE `user_id`='$_SESSION[user_id]'";
$query_run=mysql_query($query);
if(mysql_num_rows($query_run)>0){
	header("location:navigation1/index.php?subject=English&topic=");
}
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    @$english= $_POST['english'];
    @$maths=$_POST['maths'];
    @$science=$_POST['science'];
    //if(in_array('2371',$english)){
    //    echo '2370 is there in $english';
    //}
    if(isset($_POST['english'])){
        $esize=sizeof($_POST['english']);
    }
    else{
        $esize=0; //if this if-else is not done and directly sizeof is used and there is no value selected,then it doesn't return 0
                  //instead,it shows Undefined index: english...Error
    }
    if(isset($_POST['maths'])){
        $msize=sizeof($_POST['maths']);
    }
    else{
        $msize=0; 
    }
    if(isset($_POST['science'])){
        $ssize=sizeof($_POST['science']);
    }
    else{
        $ssize=0; 
    }
    if($esize>=6 && $msize>=6 && $ssize>=6){
        $time=time();
        $month=date('M',$time);
        foreach($_POST['english'] as $english){
            mysql_query("INSERT INTO `preferences` VALUES('$_SESSION[user_id]','$english')");
        }
        foreach($_POST['maths'] as $english){
            mysql_query("INSERT INTO `preferences` VALUES('$_SESSION[user_id]','$english')");
        }
        foreach($_POST['science'] as $english){
            mysql_query("INSERT INTO `preferences` VALUES('$_SESSION[user_id]','$english')");
        }
        header("location:navigation1/index.php?subject=English&topic=");
    }
    if($esize<6){
        $Eerror= 'Please select atleast 6 topics from English';
    }
    if($msize<6){
        $Merror= 'Please select atleast 6 topics from Maths';
    }
    if($ssize<6){
        $Serror= 'Please select atleast 6 topics from Science';
    }
}
?>
<html>
<head>
    <title>Preferences</title>
    <style>
        body{
            height: 95%;
            width: 1200px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0px;
        }
        table{
            border: 3px solid rgb(215,215,215);
            width: 100%;
            height: 90%;
        }
        td{
            vertical-align: text-top;
            text-indent: -20px; /*This and the next line are used to align all the lines to start after the checkbox*/
            padding-left: 20px;
        }
        #firstline{
            font-family: Gill Sans MT;
            font-size:12pt;
            font-weight:bold;
        }
        #secondline{
            font-family: Gill Sans MT;
            font-size: 9pt;
        }
        .submit{
            margin-left: auto;
            margin-right: auto;
            width: 10%;
        }
        input[type=submit]{
            background-color: rgb(196,79,76);
            color: white;
            font-family: Bebas Neue;
            font-size:18pt;
            width: 100%;
            height: 6%;
        }
    </style>
</head>
<body>
	<?php include_once("includes/analyticstracking.php") ?>
    <div style="background-color:rgb(119,219,220);text-align: center;font-family: Bebas Neue;font-size:18pt;">
        PREFERENCE FORM FOR <?php echo $_SESSION['user_board'];?>
    </div>
    <div style="float: left;height: 100%;width: 5%;background-color: rgb(49,47,47)">
        
    </div>
    <form  style="display: inline;" action="preferences.php" method="POST">
    <?php $query="select * from topics where subject='English'";$query_run=mysql_query($query);$i=0;
        while($result=mysql_fetch_assoc($query_run)){
        $query1="select * from board where subject_id='$result[subject_id]'";
        $query_run1=mysql_query($query1);
        $result1=mysql_fetch_assoc($query_run1);
	$board=$_SESSION['user_board'];
        if($result1[$board]=='Y'){
            $englishId[$i]=$result['subject_id'];$english1[$i]=$result['topic'];$english2[$i]=$result['sub_topic'];$i++;    
        }
        }
    ?>
    <?php $query="select * from topics where subject='Maths'";$query_run=mysql_query($query);$i=0;
	while($result=mysql_fetch_assoc($query_run)){
        $query1="select * from board where subject_id='$result[subject_id]'";
        $query_run1=mysql_query($query1);
        $result1=mysql_fetch_assoc($query_run1);
	$board=$_SESSION['user_board'];
        if($result1[$board]=='Y'){
	    $mathsId[$i]=$result['subject_id'];$maths1[$i]=$result['topic'];$maths2[$i]=$result['sub_topic'];$i++;
	}
	}
    ?>
    <?php $query="select * from topics where subject='Science'";$query_run=mysql_query($query);$i=0;
	while($result=mysql_fetch_assoc($query_run)){
        $query1="select * from board where subject_id='$result[subject_id]'";
        $query_run1=mysql_query($query1);
        $result1=mysql_fetch_assoc($query_run1);
	$board=$_SESSION['user_board'];
        if($result1[$board]=='Y'){
		$scienceId[$i]=$result['subject_id'];$science1[$i]=$result['topic'];$science2[$i]=$result['sub_topic'];$i++;
	}
	}
    ?>
    <div style="width: 90%;height: 100%;float: left;">
    <div style="font-family: Gill Sans MT;font-size:12pt;text-align: center;">Please select at least 6 topics from each subject</div>
    <div style="height: 90%;width:33.33%;float: left;">
        <span style="font-family: Bebas Neue;font-size:14pt;<?php if(isset($Eerror)) echo 'color: red;'?>"><br>&nbsp&nbsp&nbspENGLISH GRAMMAR</span><?php if(isset($Eerror)) echo'<span style="color: red;">&nbsp(Select at least 6 topics)</span>';?>
        <table>
            <?php
            for($i=0;$i<12;$i++){
                $string='<tr><td><span id="firstline"><input type="checkbox" name="english[]" class="english"';
                if(@in_array($englishId[$i],$english)) $string.=' checked  ';
                $string.='value="'.$englishId[$i].'">'.$english1[$i].'</span><br><span id="secondline">'.$english2[$i].'</span></td><td><span id="firstline"><input type="checkbox" name="english[]" class="english"';
                if(@in_array($englishId[$i+1],$english)) $string.=' checked ';
                $string.='value="'.@$englishId[$i+1].'">'.@$english1[$i+1].'</span><br><span id="secondline">'.@$english2[$i+1].'</span></td></tr>';
                echo $string;
                $i++;
            }
            ?>
        </table>
    </div>
    <div style="height: 90%;width:33.33%;float: left;">
        <span style="font-family: Bebas Neue;font-size:14pt;<?php if(isset($Merror)) echo 'color: red;'?>"><br>&nbsp&nbsp&nbspMATHEMATICS</span><?php if(isset($Merror)) echo'<span style="color: red;">&nbsp(Select at least 6 topics)</span>';?>
        <table>
            <?php
            for($i=0;$i<12;$i++){
                $string='<tr><td><span id="firstline"><input type="checkbox" name="maths[]" class="maths"';
                if(@in_array($mathsId[$i],$maths)) $string.=' checked  ';
                $string.='value="'.$mathsId[$i].'">'.$maths1[$i].'</span><br><span id="secondline">'.$maths2[$i].'</span></td><td><span id="firstline"><input type="checkbox" name="maths[]" class="maths"';
                if(@in_array($mathsId[$i+1],$maths)) $string.=' checked  ';
                $string.='value="'.$mathsId[$i+1].'">'.$maths1[$i+1].'</span><br><span id="secondline">'.$maths2[$i+1].'</span></td></tr>';
                echo $string;
                $i++;
            }
            ?>
        </table>
    </div>
    <div style="height: 90%;width:33.33%;float: left;">
        <span style="font-family: Bebas Neue;font-size:14pt;<?php if(isset($Serror)) echo 'color: red;'?>"><br>&nbsp&nbsp&nbspSCIENCE</span><?php if(isset($Serror)) echo'<span style="color: red;">&nbsp(Select at least 6 topics)</span>';?>
        <table>
            <?php
            for($i=0;$i<12;$i++){
                $string='<tr><td><span id="firstline"><input type="checkbox" name="science[]" class="science"';
                if(@in_array($scienceId[$i],$science)) $string.=' checked  ';
                $string.='value="'.$scienceId[$i].'">'.$science1[$i].'</span><br><span id="secondline">'.$science2[$i].'</span></td><td><span id="firstline"><input type="checkbox" name="science[]" class="science"';
                if(@in_array($scienceId[$i+1],$science)) $string.=' checked  ';
                $string.='value="'.$scienceId[$i+1].'">'.$science1[$i+1].'</span><br><span id="secondline">'.$science2[$i+1].'</span></td></tr>';
                echo $string;
                $i++;
            }
            ?>
        </table>
    </div>
    <div class="submit">
        <input type="submit">
    </div>
    </form>
    </div>
    <div style="float: left;height: 100%;width: 5%;background-color: rgb(49,47,47)">
        
    </div>
</body>
</html>