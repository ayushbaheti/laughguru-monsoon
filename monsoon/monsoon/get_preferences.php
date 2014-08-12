<?php
include 'connection.php';
include 'admin.php';
?>

<html>
<head>
    <title>Preferences</title>
    <style>
        table{
            border: 1px solid black;
            border-spacing:10px;
        }
    </style>
</head>
<body>
    <br><br>
    <table style="margin-left: auto;margin-right: auto;">
        <tr style="color: red;font-weight:bold;text-align: center;"><td>SUBJECT</td><td>TOPIC</td><td>SUB-TOPIC</td><td>NO.OF PREFERENCES</td></tr>
            <?php
            $query="SELECT subject_id, COUNT( * ) as count1 FROM preferences GROUP BY subject_id ORDER BY COUNT( * ) DESC ";
            $query_run=mysql_query($query);
            while($result=mysql_fetch_assoc($query_run)){
                $query1="SELECT * FROM topics WHERE subject_id='$result[subject_id]'";
                $query_run1=mysql_query($query1);
                $result1=mysql_fetch_assoc($query_run1);
                if($result1['subject']=="English")
                echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>'.$result['count1'].'</td></tr>';
            }
                $query1="SELECT * FROM topics WHERE subject='English' and subject_id NOT IN(SELECT subject_id FROM preferences)";
                $query_run1=mysql_query($query1);
                while($result1=mysql_fetch_assoc($query_run1)){    
                    echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>0</td></tr>';
                }
            echo '<tr style="background-color:blue"><td><td><td><td>';
            $query="SELECT subject_id, COUNT( * ) as count1 FROM preferences GROUP BY subject_id ORDER BY COUNT( * ) DESC ";
            $query_run=mysql_query($query);
            while($result=mysql_fetch_assoc($query_run)){
                $query1="SELECT * FROM topics WHERE subject_id='$result[subject_id]'";
                $query_run1=mysql_query($query1);
                $result1=mysql_fetch_assoc($query_run1);
                if($result1['subject']=="Maths")
                echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>'.$result['count1'].'</td></tr>';
            }
                $query1="SELECT * FROM topics WHERE subject='Maths' and subject_id NOT IN(SELECT subject_id FROM preferences)";
                $query_run1=mysql_query($query1);
                while($result1=mysql_fetch_assoc($query_run1)){    
                    echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>0</td></tr>';
                }            
            echo '<tr style="background-color:blue"><td><td><td><td>';
            $query="SELECT subject_id, COUNT( * ) as count1 FROM preferences GROUP BY subject_id ORDER BY COUNT( * ) DESC ";
            $query_run=mysql_query($query);
            while($result=mysql_fetch_assoc($query_run)){
                $query1="SELECT * FROM topics WHERE subject_id='$result[subject_id]'";
                $query_run1=mysql_query($query1);
                $result1=mysql_fetch_assoc($query_run1);
                if($result1['subject']=="Science")
                echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>'.$result['count1'].'</td></tr>';
            }
                $query1="SELECT * FROM topics WHERE subject='Science' and subject_id NOT IN(SELECT subject_id FROM preferences)";
                $query_run1=mysql_query($query1);
                while($result1=mysql_fetch_assoc($query_run1)){    
                    echo '<tr><td>'.$result1['subject'].'</td><td>'.$result1['topic'].'</td><td>'.$result1['sub_topic'].'</td><td>0</td></tr>';
                }
            ?>
    </table>
</body>