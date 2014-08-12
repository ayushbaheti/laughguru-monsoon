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

$q11=$q12=$q13=$q14=$q15=0;
$q21=$q22=$q23=$q24=$q25=0;
$q31=$q32=$q33=$q34=$q35=0;
$q41=$q42=$q43=$q44=$q45=0;
$q51=$q52=$q53=$q54=0;
$q61=$q62=$q63=$q64=0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST['subject1']!="") $subject=$_POST['subject1'];
    if($_POST['subject2']!="") $subject=$_POST['subject2'];
    if($_POST['subject3']!="") $subject=$_POST['subject3'];

    $query4="SELECT * FROM topics WHERE subject_id='$subject'";
    $query_run4=mysql_query($query4);
    $subjects=mysql_fetch_assoc($query_run4);
//question 1 queries
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q1 =  '1' AND subject_id ='$subject' GROUP BY q1";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q11=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q1 =  '2' AND subject_id ='$subject' GROUP BY q1";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q12=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q1 =  '3' AND subject_id ='$subject' GROUP BY q1";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q13=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q1 =  '4' AND subject_id ='$subject' GROUP BY q1";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q14=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q1 =  '5' AND subject_id ='$subject' GROUP BY q1";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q15=$temp[0];
    }

//question 2 queries
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q2 =  '1' AND subject_id ='$subject' GROUP BY q2";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q21=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q2 =  '2' AND subject_id ='$subject' GROUP BY q2";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q22=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q2 =  '3' AND subject_id ='$subject' GROUP BY q2";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q23=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q2 =  '4' AND subject_id ='$subject' GROUP BY q2";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q24=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q2 =  '5' AND subject_id ='$subject' GROUP BY q2";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q25=$temp[0];
    }
    
 //question 3 queries   
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q3 =  '1' AND subject_id ='$subject' GROUP BY q3";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q31=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q3 =  '2' AND subject_id ='$subject' GROUP BY q3";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q32=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q3 =  '3' AND subject_id ='$subject' GROUP BY q3";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q33=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q3 =  '4' AND subject_id ='$subject' GROUP BY q3";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q34=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q3 =  '5' AND subject_id ='$subject' GROUP BY q3";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q35=$temp[0];
    }

//question 4 queries    
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q4 =  '1' AND subject_id ='$subject' GROUP BY q4";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q41=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q4 =  '2' AND subject_id ='$subject' GROUP BY q4";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q42=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q4 =  '3' AND subject_id ='$subject' GROUP BY q4";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q43=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q4 =  '4' AND subject_id ='$subject' GROUP BY q4";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q44=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q4 =  '5' AND subject_id ='$subject' GROUP BY q4";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q45=$temp[0];
    }
    
//question 5 queries    
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q5 =  '1' AND subject_id ='$subject' GROUP BY q5";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q51=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q5 =  '2' AND subject_id ='$subject' GROUP BY q5";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q52=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q5 =  '3' AND subject_id ='$subject' GROUP BY q5";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q53=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q5 =  '4' AND subject_id ='$subject' GROUP BY q5";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q54=$temp[0];
    }
    
//question 6 queries    
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q6 =  '1' AND subject_id ='$subject' GROUP BY q6";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q61=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q6 =  '2' AND subject_id ='$subject' GROUP BY q6";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q62=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q6 =  '3' AND subject_id ='$subject' GROUP BY q6";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q63=$temp[0];
    }
    $query="SELECT COUNT( * ) AS sum FROM feedback WHERE q6 =  '4' AND subject_id ='$subject' GROUP BY q6";
    $query_run=mysql_query($query);
    if(mysql_num_rows($query_run)){
        $temp=mysql_fetch_array($query_run);
        $q64=$temp[0];
    }
}
?>

<html>
<head>
    <title>Feedback Viewer</title>
    <style>
        h2{
            display: inline;
        }
        table{
            width: 500px;
            margin-right:20px;
            float: left;
            border: 1px solid black;
        }
        .col1{
            width: 45%;
            background-color: red;
        }
        .col2{
            width: 45%;
        }
        table tr:first-child td:first-child{
            color: white;
            font-size: 18px;
        }
    </style>
    <script>
        function type1(){
			    var skillsSelect1 = document.getElementById("type");
			    var selectedText1 = skillsSelect1.options[skillsSelect1.selectedIndex].text;
			    //document.getElementById("example").innerHTML=selectedText1;
			    if (selectedText1=="English") {
                                document.getElementById('e1').style.display="inherit";
                                document.getElementById('m1').style.display="none";
                                document.getElementById('s1').style.display="none";
			    }
			    
			    if (selectedText1=="Maths") {
                                document.getElementById('m1').style.display="inherit";
                                document.getElementById('e1').style.display="none";
                                document.getElementById('s1').style.display="none";
			    }
			    if (selectedText1=="Science") {
                                document.getElementById('s1').style.display="inherit";
                                document.getElementById('e1').style.display="none";
                                document.getElementById('m1').style.display="none";
			    }
			}
    </script>
</head>
<body>
    <datalist id="english"><?php while($e=mysql_fetch_array($query_run1)){echo "<option value=$e[0]>";}?></datalist>
    <datalist id="maths"><?php while($e=mysql_fetch_array($query_run2)){echo "<option value=$e[0]>";}?></datalist>
    <datalist id="science"><?php while($e=mysql_fetch_array($query_run3)){echo "<option value=$e[0]>";}?></datalist>
    <div style="width: 80%;margin-left: auto;margin-right: auto;">
        <form action="view_feedback.php" method="POST">
            <h1>Select subject: </h1>
            <select onChange="type1()" name="type" id="type" style=" border:none; background-color:#e7e6e0; border-radius:3px; width:200px; height:30px;">
                <option></option>
                <option id="e">English</option>
                <option id="m">Maths</option>
                <option id="s">Science</option>
            </select> 
            <input id="e1" name="subject1" list="english" style="display: none;" value="<?php echo @$_POST['e1'];?>"><br><br>
            <input id="m1" name="subject2" list="maths" style="display: none;" value="<?php echo @$_POST['m1'];?>"><br><br>
            <input id="s1" name="subject3" list="science" style="display: none;" value="<?php echo @$_POST['s1'];?>"><br><br>
            <input type="submit">
        </form>    
    </div>
    <h1><?php echo @$subjects['subject'].' --> '.@$subjects['topic'].' --> '.@$subjects['sub_topic']; ?></h1>
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="5">Q.1- Rate how funny you found the content:</td>
        <td>Not funny</td><td><?php echo $q11?></td></tr>
        <tr><td>Slightly funny</td><td><?php echo $q12?></td></tr>
        <tr><td>Funny</td><td><?php echo $q13?></td></tr>
        <tr><td>Very funny</td><td><?php echo $q14?></td></tr>
        <tr><td>Extremely funny</td><td><?php echo $q15?></td></tr>
    </table>
    
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="5">Q.2 How easy was the lesson to understand?</td>
        <td>Very Difficult</td><td><?php echo $q21?></td></tr>
        <tr><td>Difficult</td><td><?php echo $q22?></td></tr>
        <tr><td>Easy</td><td><?php echo $q23?></td></tr>
        <tr><td>Very easy</td><td><?php echo $q24?></td></tr>
        <tr><td>Extremely easy</td><td><?php echo $q25?></td></tr>
    </table>
    
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="5">Q.3 Rate how interesting you found the content</td>
        <td>Not interesting</td><td><?php echo $q31?></td></tr>
        <tr><td>Slightly interesting</td><td><?php echo $q32?></td></tr>
        <tr><td>Interesting</td><td><?php echo $q33?></td></tr>
        <tr><td>Very interesting</td><td><?php echo $q34?></td></tr>
        <tr><td>Extremely interesting</td><td><?php echo $q35?></td></tr>
    </table>
    
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="5">Q.4 What did you think of the characters shown?</td>
        <td>Very funny and very cool</td><td><?php echo $q41?></td></tr>
        <tr><td>Very funny and cool</td><td><?php echo $q42?></td></tr>
        <tr><td>Funny and cool</td><td><?php echo $q43?></td></tr>
        <tr><td>Funny but not so cool</td><td><?php echo $q44?></td></tr>
        <tr><td>Neither funny nor cool</td><td><?php echo $q45?></td></tr>
    </table>
    
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="4">Q.5 What did you think of the design of the lesson?</td>
        <td>I liked the colours and the characters</td><td><?php echo $q51?></td></tr>
        <tr><td>I liked the colours but did not like the characters</td><td><?php echo $q52?></td></tr>
        <tr><td>I did not like the colours but I liked the characters </td><td><?php echo $q53?></td></tr>
        <tr><td>I did not like the colours and I did not like the characters</td><td><?php echo $q54?></td></tr>
    </table>
    
    <table>
        <colgroup>
            <col class="col1">
            <col class="col2">
        </colgroup>
        <tr><td rowspan="4">Q.6 Was the lesson easy to use?</td>
        <td>Yes, very easy</td><td><?php echo $q61?></td></tr>
        <tr><td>No, I couldn’t figure out how to go forward</td><td><?php echo $q62?></td></tr>
        <tr><td>No, I couldn’t figure out how to go back</td><td><?php echo $q63?></td></tr>
        <tr><td>No. (Other reasons)</td><td><?php echo $q64?></td></tr>
    </table>    

    
</body>
</html>