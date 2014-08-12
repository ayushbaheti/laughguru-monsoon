<?php

include("../session.php");
include("../connection.php");

if($_POST['like_id']){
    $subject_id=$_POST['like_id'];
    $subject_id = mysql_escape_String($subject_id);
        
    $sql=mysql_query("SELECT * from topics where subject_id='$subject_id'");
    $data=mysql_fetch_assoc($sql);
    $like=$data['likes'];
    
    $uid_sql=mysql_query("select * from likes where subject_id='$subject_id' and user_id='$_SESSION[user_id]'");
    $count=mysql_num_rows($uid_sql);
    
    if($count==0){
    
        $like_update=$like+1;
        
        $sql="UPDATE topics SET likes='$like_update' WHERE subject_id='$subject_id'";
        $sql_update=mysql_query($sql);
        
        $sql_in=mysql_query("INSERT into likes (subject_id,user_id) values ('$subject_id','$_SESSION[user_id]')");
        echo $like_update;
    }
    
    else{
        $like_update=$like-1;
        
        $sql="UPDATE topics SET likes='$like_update' WHERE subject_id=$subject_id";
        $sql_update=mysql_query($sql);
        $sql_in=mysql_query("DELETE from likes WHERE user_id='$_SESSION[user_id]' and subject_id='$subject_id'");
        
        echo $like_update;
    }
}
?>