<?php 
include '../connection.php';
include '../session.php';

    $newDate=date("N",time());
    if($newDate=='1') $newDate1=3;//i.e. if the day is MONDAY
    else{
	if($newDate%2==0) $newDate1=1;
	else $newDate1=2;
    }
?>


&nbsp&nbsp&nbsp&nbsp
<a href="index.php?subject=<?php echo $_GET['subject']?>&topic=" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" style="margin-left: -10px;"><?php echo $_GET['subject']?></a> <img src="images/Sub-subject arrow.png"  width="10" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" ><span onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"><?php echo $_GET['topic']?></span>
STRINGTOBREAKHTML

<?php	if(@$_GET['c']=="1"){

  $_SESSION['subject_id']=$_GET['id'];//used in index.php to insert subject id properly into the feedback table
  //query to check seen/unseen
  $query="SELECT count FROM seen WHERE user_id='$_SESSION[user_id]' and subject_id='$_GET[id]'";
  $query_run=mysql_query($query);
  if(mysql_num_rows($query_run)==1){
    $res=mysql_fetch_array($query_run);
    $count=$res[0];
    $count=$count+1;
    $query="UPDATE seen SET count='$count' WHERE user_id='$_SESSION[user_id]' and subject_id='$_GET[id]'";
    mysql_query($query);
  }
  else{
    $count=1;
    $query="INSERT INTO seen VALUES('$_SESSION[user_id]','$_GET[id]','$count')";
    mysql_query($query);
  }
  ?>
  <style>
    .main_div2{
		width: 257px;
		float: right;
		border-left: 1px solid #CCC;
		text-align: center;
		font-size: 7px;
		height: auto;
		margin: 35px 0px 0px 20px;
		z-index: 1;
		position: relative;
		visibility: hidden; 
	}
  </style>
  <br><div class="lesson" style="border:none;"><object style="height: 200%;width: 400%;margin-left: 20px;margin-top: -20px;" data="swf/<?php echo $_GET['id'];?>.swf"></object></div>
s
<?php	}//if ends here
	
	else{
?>
<div class="heding1" style="border:none;">
<select onChange="type1()" name="type" id="type" style=" border:none; background-color:#e7e6e0; border-radius:3px; width:200px; height:30px;">
  <option id="types">Types</option>
  <option id="lesson">Lesson</option>
  <option id="game">Game</option>
</select>
&nbsp; &nbsp;
</div>


<div class="heding1" style="border:none;">
<?php
		    if($_GET['topic']==""){
			if($_SESSION['user_id']!='1') $query="select * from `topics` where `subject`='$_GET[subject]' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N') order by rand() limit 9";
			else $query="select * from `topics` where `subject`='$_GET[subject]' order by rand() limit 9";
			$query_run=mysql_query($query);
			while($result1=mysql_fetch_assoc($query_run)){
			    if($result1['type1']=='Lesson'){
				echo '<a style="cursor:pointer" onClick="getPage(\'getPage.php?subject='.$_GET['subject'].'&topic=&id='.$result1['subject_id'].'&c=1\')"><div class="lesson"><div style=" background-image:url(chapter_icons/'.$result1['subject_id'].'.jpg); background-size:200px; background-repeat:no-repeat;  width:130px; height:97px; padding:45px 0px 0px 70px; ">';
				echo '<img src="images/book_symbol.png"></div></a>';
			    }
			    else{
				echo '<a style="cursor:pointer" onClick="getPage(\'getPage.php?subject='.$_GET['subject'].'&topic=&id='.$result1['subject_id'].'&c=1\')"><div class="game"><div style=" background-image:url(chapter_icons/'.$result1['subject_id'].'.jpg); background-size:200px; background-repeat:no-repeat;  width:130px; height:97px; padding:45px 0px 0px 70px; ">';
				echo '<img src="images/Game_symbol.png"></div></a>';
			    }
			    echo '<h4 style="font-size: 14px; ">'.$result1['sub_topic'].'</h4><br/>';
			    echo '<p>'.$result1['description'].'</p>';
			    echo '<div class="comment">
				
				<div class="like"><div class="like1">';
				if($result1['likes']!=0) echo '<span class="like_show'.$result1['subject_id'].'" >'.$result1['likes'].'</span>';
				else echo '<span class="like_show'.$result1['subject_id'].'" ></span>';
				echo '</div><span style=" float:left; " ><a onclick="likemessage('.$result1['subject_id'].')" id="'.$result1['subject_id'].'" class="like_button">';
				
				$uid_sql=mysql_query("select * from likes where subject_id='$result1[subject_id]' and user_id='$_SESSION[user_id]'");
				if(mysql_num_rows($uid_sql)==0) echo 'Like';else echo 'Unlike';
				
				echo '</a></span></div>
				</div></div>';
			}
		    }
		    else{
			if($_SESSION['user_id']!='1') $query="select * from `topics` where `subject`='$_GET[subject]' and `topic`='$_GET[topic]' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N') order by rand() limit 9";
			else $query="select * from `topics` where `subject`='$_GET[subject]' and `topic`='$_GET[topic]' order by rand() limit 9";
			$query_run=mysql_query($query);
			while($result1=mysql_fetch_assoc($query_run)){
			    if($result1['type1']=='Lesson'){
				echo '<a style="cursor:pointer" onClick="getPage(\'getPage.php?subject='.$_GET['subject'].'&topic='.$_GET['topic'].'&id='.$result1['subject_id'].'&c=1\')"><div class="lesson"><div style=" background-image:url(chapter_icons/'.$result1['subject_id'].'.jpg); background-size:200px; background-repeat:no-repeat;  width:130px; height:97px; padding:45px 0px 0px 70px; ">';
				echo '<img src="images/book_symbol.png"></div></a>';
			    }
			    else{
				echo '<a style="cursor:pointer" onClick="getPage(\'getPage.php?subject='.$_GET['subject'].'&topic='.$_GET['topic'].'&id='.$result1['subject_id'].'&c=1\')"><div class="game"><div style=" background-image:url(chapter_icons/'.$result1['subject_id'].'.jpg); background-size:200px; background-repeat:no-repeat;  width:130px; height:97px; padding:45px 0px 0px 70px; ">';
				echo '<img src="images/Game_symbol.png"></div></a>';
			    }
			    echo '<h4 style="font-size: 14px;">'.$result1['sub_topic'].'</h4><br/>';
			    echo '<p>'.$result1['description'].'</p>';
			    echo '<div class="comment">
				
				<div class="like"><div class="like1">';
				if($result1['likes']!=0) echo '<span class="like_show'.$result1['subject_id'].'" >'.$result1['likes'].'</span>';
				else echo '<span class="like_show'.$result1['subject_id'].'" ></span>';
				echo '</div><span style=" float:left; " ><a onclick="likemessage('.$result1['subject_id'].')" id="'.$result1['subject_id'].'" class="like_button">';
				
				$uid_sql=mysql_query("select * from likes where subject_id='$result1[subject_id]' and user_id='$_SESSION[user_id]'");
				if(mysql_num_rows($uid_sql)==0) echo 'Like';else echo 'Unlike';
				
				echo '</a></span></div>
				</div></div>';
			}			
		    }
	}//else(for c!=1) ends here
?>

<div style="clear:both;"></div>
</div>


</body>
</html>


