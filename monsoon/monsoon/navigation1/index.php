<?php
include '../connection.php';
require('../session.php');

$query="SELECT * FROM `preferences` WHERE `user_id`='$_SESSION[user_id]'";
$query_run=mysql_query($query);
if(mysql_num_rows($query_run)==0&&$_SESSION['user_id']!=1){
	header("location:../preferences.php");
}

	date_default_timezone_set("Asia/Calcutta");
	//echo date("d-m-Y H:i:s e",time());
    $newDate=date("N",time());
    if($newDate=='1') $newDate1=3;//i.e. if the day is MONDAY
    else{
	if($newDate%2==0) $newDate1=1;
	else $newDate1=2;
    }

//following is feedback code
if($_SERVER["REQUEST_METHOD"]=="POST"){
			    if(@$_POST['q1']==""||@$_POST['q2']==""||@$_POST['q3']==""||@$_POST['q4']==""||@$_POST['q5']==""||@$_POST['q6']==""){
				$error="Q1-Q6 are compulsory";
			    }
			    else{
				$error="";
				date_default_timezone_set('Asia/Kolkata');
				$datetime=date('Y-m-d H:i:s');
				$query="INSERT INTO feedback VALUES('$_SESSION[user_id]','$_SESSION[subject_id]','$datetime','$_POST[q1]','$_POST[q2]','$_POST[q3]','$_POST[q4]','$_POST[q5]','$_POST[q6]','$_POST[q7]')";
				mysql_query($query);
				header("location:index.php?subject=English&topic=#close");
			    }
			}
			
?>
<!DOCTYPE html>
<html>
	<head>
		
	<script type="text/javascript" src="../includes/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="like_message.js"></script>

	
		<?php $subject=$_GET['subject'];?>
		<script>
			
			function getElementsByClassName(classname, node)  {
			if(!node) node = document.getElementsByTagName("body")[0];
			var a = [];
			var re = new RegExp('\\b' + classname + '\\b');
			var els = node.getElementsByTagName("*");
			for(var i=0,j=els.length; i<j; i++)
			    if(re.test(els[i].className))a.push(els[i]);
			return a;
			}
			
			function type1(){
			    var subject='<?php echo $subject;?>';
			    if (subject=="English") {
				document.getElementById('englishcount').style.display="block";
				document.getElementById('mathcount').style.display="none";
				document.getElementById('sciencecount').style.display="none";
				document.getElementById('englishcount1').style.display="block";
				document.getElementById('mathcount1').style.display="none";
				document.getElementById('sciencecount1').style.display="none";
			    }
			    if (subject=="Maths") {
				document.getElementById('englishcount').style.display="none";
				document.getElementById('mathcount').style.display="block";
				document.getElementById('sciencecount').style.display="none";
				document.getElementById('englishcount1').style.display="none";
				document.getElementById('mathcount1').style.display="block";
				document.getElementById('sciencecount1').style.display="none";
			    }
			    if (subject=="Science") {
				document.getElementById('englishcount').style.display="none";
				document.getElementById('mathcount').style.display="none";
				document.getElementById('sciencecount').style.display="block";
				document.getElementById('englishcount1').style.display="none";
				document.getElementById('mathcount1').style.display="none";
				document.getElementById('sciencecount1').style.display="block";
			    }
			    //var type=localStorage.getItem("store");
			    //document.getElementById(type).selected="true";
			    var skillsSelect1 = document.getElementById("type");
			    var selectedText1 = skillsSelect1.options[skillsSelect1.selectedIndex].text;
			    //document.getElementById("example").innerHTML=selectedText1;
			    if (selectedText1=="Types") {
				//type='types';
				//localStorage.setItem("store", type);
				var elements = new Array();
				elements = getElementsByClassName('game');
				for(i in elements ){
				    elements[i].style.display = "inherit";
				}
				elements = getElementsByClassName('lesson');
				for(i in elements ){
				    elements[i].style.display = "inherit";
				}
			    }
			    
			    if (selectedText1=="Lesson") {
				//type='lesson';
				//localStorage.setItem("store", type);
				var elements = new Array();
				elements = getElementsByClassName('game');
				for(i in elements ){
				    elements[i].style.display = "none";
				}
				elements = getElementsByClassName('lesson');
				for(i in elements ){
				    elements[i].style.display = "inherit";
				}
			    }
			    if (selectedText1=="Game") {
				//type='game';
				//localStorage.setItem("store", type);
				var elements = new Array();
				elements = getElementsByClassName('lesson');
				for(i in elements ){
				    elements[i].style.display = "none";
				}
				elements = getElementsByClassName('game');
				for(i in elements ){
				    elements[i].style.display = "inherit";
				}
			    }
			}
		</script>
		<meta charset="UTF-8">
		<title>Laugh Guru</title>
		
		<link rel="stylesheet" href="css/lib/fontello.css" />
		<link rel="stylesheet" href="css/lib/normalize.css" />
		<link rel="stylesheet" href="css/index.css" />
		<link rel="stylesheet" href="css/sidebar.css" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
        	<script src="js/lib/toogel.js"></script>
        	<script src="js/lib/ga_event_tracking.js"></script>
        	<script src="js/lib/open_feedback.js"></script>
        	<script src="js/lib/getpage.js"></script>
		<!--[if lt IE 9]>
			<script src="js/lib/html5shiv.js"></script>
		<![endif]-->
		
	<style>
	a{
		cursor: pointer;
	}
	
	@font-face {
	font-family: '33535gillsansmt';
	src: url('./33535gillsansmt.eot');
	src: local('33535gillsansmt'), url('./33535gillsansmt.woff') format('woff'), url('./33535gillsansmt.ttf') format('truetype');
	}
	/* use this class to attach this font to any element i.e. <p class="fontsforweb_fontid_1416">Text with this font applied</p> */
	.fontsforweb_fontid_1416 {
	font-family: '33535gillsansmt' !important;
	}

	/*CSS for modal here onwards*/
	.modalDialog {
            position: fixed;
            /*font-family: Arial, Helvetica, sans-serif;*/
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 99999;
	    height: 100%;
            opacity:0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
            overflow: scroll;
        }
        .modalDialog:target {
                opacity:1;
                pointer-events: auto;
        }

        .modalDialog > div {
            width: 50%;
            position: relative;
            margin: 2% auto;
            /*padding: 5px 20px 13px 20px;*/
            border-radius: 10px;
            background: rgb(69,186,196);
            /*background: -moz-linear-gradient(#fff, #999);
            background: -webkit-linear-gradient(#fff, #999);
            background: -o-linear-gradient(#fff, #999);*/
        }
        
        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            -webkit-border-radius: 12px;
            -moz-border-radius: 12px;
            border-radius: 12px;
            -moz-box-shadow: 1px 1px 3px #000;
            -webkit-box-shadow: 1px 1px 3px #000;
            box-shadow: 1px 1px 3px #000;
        }

        .close:hover { background: #00d9ff; }

        input[type=submit]{
            background-color: rgb(242,105,44);
            color: white;
            font-family: Microsoft Sans Serif;
            font-size:18pt;
            text-align: center;
            margin-left: 170px;
        }
        
        .questions{
            display: block;
            color: black;
            text-indent: -20px;
            font-size:20px;
        }
/*CSS for modal ends here*/

/*CSS for scrollbar*/
	::-webkit-scrollbar {
	    width: 10px;
	    height:5px;
	}
	 
	/* Track */
	::-webkit-scrollbar-track {
	background:#fff;
	      
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	    background: #eee; 
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
	}
	::-webkit-scrollbar-thumb:window-inactive {
		background: #eee; 
	}
/*CSS for scrollbar ends here*/
	</style>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51970421-1', 'laughguru.com');
  ga('require', 'displayfeatures');
  ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview');

</script>

	</head>
	<body onLoad="type1()">
		

<div class="wrapper jsc-sidebar-content jsc-sidebar-pulled" >

<div  class="heder" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" >
	<div class="logo" ><img src="images/logo.png"  width="150" > </div>
	 
	<div class="logo1" ><img src="images/menu_bar.png" width="20" ></div>
	<div class="logo2" ><a href="../logout.php">Log Out</a></div>
</div>
<div class="main_header" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"  >

<div class="middle_contain" style="
background-image: url('images/profile.png');
background-size: 100px auto;
background-position: center center;
background-repeat: no-repeat;
text-align: right;
padding-top: 31px;">
<?php echo $_SESSION['user_fn'].'<br/>'.$_SESSION['user_board'].' '.$_SESSION['user_std'].'<sup>th</sup> std';?>
<!--<div class="middle_contain2"><img src="images/profile pic.png" width="100px" ></div>-->
<!--<div class="middle_contain3" style="position:absolute; right: 489px;"></div>-->
</div>
</div>



<!--<div class="heding" style="font-family:'33535gillsansmt'; font-weight: lighter; font-size: x-large;" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" id="UpperMainDiv"  >&nbsp&nbsp&nbsp
<a href="index.php?subject=<?php// echo $_GET['subject']?>&topic=" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" ><?php// echo $_GET['subject']?></a> <img src="images/Sub-subject arrow.png"  width="10" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" ><span onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"><?php// echo $_GET['topic']?></span>
</div>-->

<div class="main_div" style="position:relative; " >

<div style="float: left;
width: 269px;
height: 100%;
position: absolute;
z-index: 2147;
">


<nav style="display:block; position: inherit; float:left; min-height:1079px; max-height:3000px;" class="sidebar jsc-sidebar" id="smallDiv" data-sidebar-options="">
        
	<ul class="sidebar-list">
    <li><a style="font-size: 27px;">Syllabus <img src="images/Arrow1.png" width="30px" onClick=" this.src.replace('Arrow1', 'Arrow'); $('#BigDiv').show(400);$('#smallDiv').hide(400);" style="float:right;margin-right:-10px;"></a></li>
		<li id="math" >
		<a onClick="getPage('getPage.php?subject=Maths&topic=');toggleMenu('mathcount','sciencecount','englishcount')"  style="font-family: '33535gillsansmt';  margin-bottom: 10px;margin-top: 10px;" >Math <img id="mathcountImage" src="images/arrow_Side.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" ></a>
		<ul style="	list-style:none;margin:0px;padding:0px;"  id="mathcount">
			<?php
							//$px1 = 30;$px2=20;

				$subject=$_GET['subject'];
				if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='Maths' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
				else $query="select distinct `topic` from `topics` where subject='Maths'";
				$query_run=mysql_query($query);
				while($result=mysql_fetch_assoc($query_run)){
					$topic = $result['topic'];
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);
					$output= '<li style="border-bottom: 1px solid #000;" title="'.$topic.'"><a onclick = "getPage(\'getPage.php?subject=Maths&topic='.$result['topic'].'\');" style=";font-size:14px;
					">'.substr($result['topic'],0,20);
					if(strlen($result['topic'])>20) $output.='..';
					$output.='<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div></a></li>';
					echo $output;
				}
			?>
		</ul>
		</li>
		<li id="science" >
		<a onClick="getPage('getPage.php?subject=Science&topic=');toggleMenu('sciencecount','mathcount','englishcount')" style="font-family: '33535gillsansmt';  margin-bottom: 10px;margin-top: 10px;">Science<img  id="sciencecountImage"  src="images/arrow_Side.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" ></a>
		<ul style="	list-style:none;margin:0px;padding:0px;" id="sciencecount">
			<?php
				$subject=$_GET['subject'];
				if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='Science' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
				else $query="select distinct `topic` from `topics` where subject='Science'";
				$query_run=mysql_query($query);
				while($result=mysql_fetch_assoc($query_run)){
					$topic = $result['topic']; 
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);
					$output= '<li style="border-bottom: 1px solid #000;" title="'.$topic.'"><a style="font-size:14px;" onclick = "getPage(\'getPage.php?subject=Science&topic='.$result["topic"].'\');
					" >'.substr($result['topic'],0,20);
					if(strlen($result['topic'])>20) $output.='..';
					$output.='<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div></a></li>';
					echo $output;
				}
			?>
		 </ul></li>
<li id="english">
        
        <a onClick="getPage('getPage.php?subject=English&topic=');toggleMenu('englishcount','sciencecount','mathcount')" style="font-family: '33535gillsansmt';  margin-bottom: 10px;margin-top: 10px;" >English <img   id="englishcountImage"  src="images/arrow_down.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" >
        </a>
        <ul style="	list-style:none;margin:0px;padding:0px; " id="englishcount">
		<?php
						$px = 20 * 2;

			$subject=$_GET['subject'];
			if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='English' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
			else $query="select distinct `topic` from `topics` where subject='English'";
			$query_run=mysql_query($query);
			while($result=mysql_fetch_assoc($query_run)){
				$topic = $result['topic'];
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);				
				$output='<li style="border-bottom: 1px solid #000;" title="'.$topic.'"><a onclick = "getPage(\'getPage.php?subject=English&topic='.$result['topic'].'\');" style="font-size:14px;" style="font-size:14px;
				">'.substr($result['topic'],0,20);
				if(strlen($result['topic'])>20) $output.='..';
				$output.='<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div></a></li>';
				echo $output;
			}
		?>
		 </ul>
        </li>        
        
        
        
	</ul>
</nav>
<nav style=" display:none; position: absolute; float:left; min-height:1079px; max-height:3000px; width:400px" class="sidebar jsc-sidebar"  data-sidebar-options="" id="BigDiv">
        
	<ul class="sidebar-list">
    <li><a style="font-size: 27px;">Syllabus  <img src="images/Arrow.png" style="float:right;margin-right: -10px;" width="30px"  onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"></a></li>
    
<!--<li><a href="" style="background-color:#c44f4c; padding: 5px 5px;
text-align: center;
border-radius: 3px; width:370px; margin: 0px auto 10px auto;font-family: BebasNeue,Bebas Neue;font-weight: lighter; " >Buy Membership @xyz </a></li>-->
		<li><a onClick="getPage('getPage.php?subject=Maths&topic=');toggleMenu('mathcount','sciencecount','englishcount')"  style="font-family: '33535gillsansmt'; margin-bottom: 10px;margin-top: 10px;" >Math <!--<button style="font-size:12px; background-color:#c44f4c; border:none; border-radius:3px; padding: 5px 15px; color:#fff;font-family:BebasNeue,Bebas Neue; font-weight: lighter; margin-left:55px; margin-bottom:5px;">Buy Now `xyz</button>--> <img id="mathcount1Image" src="images/arrow_Side.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" ></a> 
        <ul style="	list-style:none;margin:0px;padding:0px;"  id="mathcount1">
			<?php
				$subject=$_GET['subject'];
				if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='Maths' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
				else $query="select distinct `topic` from `topics` where subject='Maths'";
				$query_run=mysql_query($query);
				while($result=mysql_fetch_assoc($query_run)){
				$topic = $result['topic'];
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);
				    echo '<li style="border-bottom: 1px solid #000;"><a onclick = "getPage(\'getPage.php?subject=Maths&topic='.$result['topic'].'\');" style="font-size:14px;">'.$result['topic'].'
					<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div>					 
					 </a></li>';
				}
			?>

		</ul>
        </li>
		<li><a onClick="getPage('getPage.php?subject=Science&topic=');toggleMenu('sciencecount','mathcount','englishcount')" style="font-family: '33535gillsansmt';  margin-bottom: 10px;margin-top: 10px;">Science<!--<button style="font-size:12px; background-color:#c44f4c; border:none; border-radius:3px; padding: 5px 15px; color:#fff;font-family:BebasNeue,Bebas Neue; font-weight: lighter; margin-left:38px; margin-bottom:5px;">Buy Now `xyz</button>--><img id="sciencecount1Image" src="images/arrow_Side.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" ></a>
        
        	<ul style="	list-style:none;margin:0px;padding:0px;" id="sciencecount1">
			<?php
				$subject=$_GET['subject'];
				if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='Science' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
				else $query="select distinct `topic` from `topics` where subject='Science'";
				$query_run=mysql_query($query);
				while($result=mysql_fetch_assoc($query_run)){
				$topic = $result['topic'];
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);
				    echo '<li style="border-bottom: 1px solid #000;"><a onclick = "getPage(\'getPage.php?subject=Science&topic='.$result['topic'].'\');" style="font-size:14px;">'.$result['topic'].'
					<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div>					 					  </a></li>';
				}
			?>
		 </ul></li>
        <li> <a onClick="getPage('getPage.php?subject=English&topic=');toggleMenu('englishcount','sciencecount','mathcount')" style="font-family: '33535gillsansmt';  margin-bottom: 10px;margin-top: 10px;" >English<!--<button style="font-size:12px; background-color:#c44f4c; border:none; border-radius:3px; padding: 5px 15px; color:#fff;font-family:BebasNeue,Bebas Neue; font-weight: lighter; margin-left:48px; margin-bottom:5px;">Buy Now `xyz</button>--> <img id="englishcount1Image" src="images/arrow_down.png" style="float:right;margin-bottom: 10px; margin-top: 10px;" ></a>
         <ul style="	list-style:none;margin:0px;padding:0px;" id="englishcount1">
			<?php
				$subject=$_GET['subject'];
				if($_SESSION['user_id']!='1') $query="select distinct `topic` from `topics` where subject='English' and present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N')";
				else $query="select distinct `topic` from `topics` where subject='English'";
				$query_run=mysql_query($query);
				while($result=mysql_fetch_assoc($query_run)){
				$topic = $result['topic'];
						$query1="SELECT subject_id FROM topics WHERE topic='$topic'";$query_run1=mysql_query($query1);
						$total=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `permissions` WHERE user_id = '$_SESSION[user_id]' AND locked = 'N' AND subject_id IN (SELECT subject_id FROM topics WHERE topic =  '$topic')";$query_run1=mysql_query($query1);
						$total1=mysql_num_rows($query_run1);
						$query1="SELECT * FROM  `seen` WHERE user_id = '$_SESSION[user_id]' AND subject_id IN (SELECT subject_id FROM topics WHERE topic = '$topic')";$query_run1=mysql_query($query1);
						$total2=mysql_num_rows($query_run1);
						$px1=($total2/$total)*100;
						$px2=(($total1/$total)*100-$px1);
				    echo '<li style="border-bottom: 1px solid #000;"><a style="font-size:14px;" onclick = "getPage(\'getPage.php?subject=English&topic='.$result['topic'].'\');" >'.$result['topic'].'
					<div style="margin-top:4px;float:right; width:100px; height:11px;background:gray;"><div style="vertical-align:top;display:inline-block;height:11px;background-color:green;width:'.$px1.'px";"></div><div style="display:inline-block;height:11px;background-color:white;width:'.$px2.'px;vertical-align:top"></div></div>					 					  </a></li>';
				}
			?>
		 </ul>
        </li>
        
        
        
	</ul>
</nav>

</div>

<div class="finaly" >
<div class="heding" style="font-family:'33535gillsansmt'; font-weight: lighter; font-size: x-large;" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" id="UpperMainDiv"  >&nbsp&nbsp&nbsp
<a href="index.php?subject=<?php echo $_GET['subject']?>&topic=" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" ><?php echo $_GET['subject']?></a> <img src="images/Sub-subject arrow.png"  width="10" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);" ><span onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"><?php echo $_GET['topic']?></span>
</div>

<div class="main_div1" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);"  id="DownMainDiv" style="width: 70%;"  >




<div class="heding1" style="border:none;">
<select onChange="type1()" name="type" id="type" style=" border:none; background-color:#e7e6e0; border-radius:3px; width:200px; height:30px;">
  <option id="types"><span >Types</span></option>
  <option id="lesson">Lesson</option>
  <option id="game">Game</option>
</select> 
&nbsp; &nbsp;
<!--<select style=" border:none; background-color:#e7e6e0; border-radius:3px; width:200px; height:30px;">
  <option value="volvo">Sort by Popular</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select> 
-->


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
			else $query="select * from `topics` where `subject`='$_GET[subject]' and `topic`='$_GET[topic] order by rand() limit 9";
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
?>
<div style="clear:both;"></div>
</div>






</div>





</div>
<!--- finaly div -->
<div class="main_div2" style="width: 18%;" onClick="$('#BigDiv').hide(400);$('#smallDiv').show(400);">
<br><span style="font-size: 21px;">Recommendations</span>

<div class="heding1" style="border:none; font-size: 20px;width: 78%;margin: 10px 0px 0px 13px;float: left;">

<?php
if($_SESSION['user_id']!='1') $query="select * from `topics` WHERE present='y' and day='$newDate1' and subject_id in (select subject_id from permissions where user_id='$_SESSION[user_id]' and locked='N') order by rand() limit 3";
else $query="select * from `topics` order by rand() limit 3";
$query_run=mysql_query($query);
while($result1=mysql_fetch_assoc($query_run)){
	echo '<a style="cursor:pointer" onClick="getPage(\'getPage.php?subject='.$result1['subject'].'&topic='.$result1['topic'].'&id='.$result1['subject_id'].'&c=1\')"><div style="display: inherit;" class="box_main">
		<div style="background-image: url(chapter_icons/'.$result1['subject_id'].'.jpg);background-size: 200px auto;background-repeat: no-repeat;width: 191px;height: 97px;padding: 47px 0px 0px 9px;">';
	if($result1['type1']=='Lesson') echo '<img src="images/book_symbol.png">';
	else echo '<img src="images/Game_symbol.png">';
	echo '</div></a>
		<h4 style="font-size: 14px; ">'.$result1['sub_topic'].'</h4><br>
		<p>'.$result1['description'].'</p>
		<div class="comment">
				<div class="like"><div class="like1">';
				if($result1['likes']!=0) echo '<span class="like_show'.$result1['subject_id'].'" >'.$result1['likes'].'</span>';
				else echo '<span class="like_show'.$result1['subject_id'].'" ></span>';
				echo '</div><span style=" float:left; " ><a onclick="likemessage('.$result1['subject_id'].')" id="'.$result1['subject_id'].'" class="like_button">';
				
				$uid_sql=mysql_query("select * from likes where subject_id='$result1[subject_id]' and user_id='$_SESSION[user_id]'");
				if(mysql_num_rows($uid_sql)==0) echo 'Like';else echo 'Unlike';
				
				echo '</a></span></div>
				</div></div>';
}
?>

        <div style="clear:both;"></div>
</div>







<!--<div class="box">



</div>

<div class="box">



</div>
<div class="box">



</div>
<div class="box">



</div>-->



</div>

<div style="clear:both;"></div>
</div>


  <!--<nav style="position:absolute; top:125px;">
		<a href="#" class="icon-menu link-menu jsc-sidebar-trigger">
        <img src="images/Arrow.png"  >
        
    </a>
	</nav>-->
    <div style="clear:both;"></div>


		


		<!--<script src="js/lib/jquery.min.js"></script>
		
		<script src="js/sidebar.js"></script>
		
		<script>
			$('#jsi-nav').sidebar({
				trigger: '.jsc-sidebar-trigger',
				scrollbarDisplay: true,
				pullCb: function () { console.log('pull'); },
				pushCb: function () { console.log('push'); }
			});

			$('#api-push').on('click', function (e) {
				e.preventDefault();
				$('#jsi-nav').data('sidebar').push();
			});
			$('#api-pull').on('click', function (e) {
				e.preventDefault();
				$('#jsi-nav').data('sidebar').pull();
			});
		</script>-->
        
 <!--       <div class="footer" style="margin-top: 15px;"  >
        
  Copyright Laugh Out Loud Ventures 2014
  </div>-->
	
	<!--The following code is for MODAL-->
        <div id="openModal" class="modalDialog">
		<div>
			<!--<a href="#close" title="Close" class="close">X</a>-->
			<div style="background-color: #fff;font-family: Bebas Neue;font-size: 22px;padding-top: 2%;padding-bottom: 2%;">&nbsp&nbspFEEDBACK FORM:<img height="40px" style="float: right;margin-top: -10px;margin-right: 10px;" src="images/feedback_logo.png"></div> 
			
			<div style="padding: 35px 20px 13px 40px;font-family: Gill Sans MT;color: white;">
			<span style="color: red;"><?php echo @$error; ?></span>
			<form action="index.php?subject=English&topic=#openModal" method="POST" autocorrect="off" autocapitalize="off" autocomplete="off">
			    <span class="questions">Q.1 Rate how funny you found the content:</span>
			    <input type="radio" name="q1" value="1" <?php if(@$_POST['q1']=='1') echo 'checked'; ?>>Not funny<br><input type="radio" name="q1" value="2" <?php if(@$_POST['q1']=='2') echo 'checked'; ?>>Slightly funny<br><input type="radio" name="q1" value="3" <?php if(@$_POST['q1']=='3') echo 'checked'; ?>>Funny<br><input type="radio" name="q1" value="4" <?php if(@$_POST['q1']=='4') echo 'checked'; ?>>Very funny<br><input type="radio" name="q1" value="5" <?php if(@$_POST['q1']=='5') echo 'checked'; ?>>Extremely funny<br><br>
			    <span class="questions">Q.2 How easy was the lesson to understand?</span>
			    <input type="radio" name="q2" value="1" <?php if(@$_POST['q2']=='1') echo 'checked'; ?>>Very difficult<br><input type="radio" name="q2" value="2" <?php if(@$_POST['q2']=='2') echo 'checked'; ?>>Difficult<br><input type="radio" name="q2" value="3" <?php if(@$_POST['q2']=='3') echo 'checked'; ?>>Easy<br><input type="radio" name="q2" value="4" <?php if(@$_POST['q2']=='4') echo 'checked'; ?>>Very easy<br><input type="radio" name="q2" value="5" <?php if(@$_POST['q2']=='5') echo 'checked'; ?>>Extremely easy<br><br>             
			    <span class="questions">Q.3 Rate how interesting you found the content</span>
			    <input type="radio" name="q3" value="1" <?php if(@$_POST['q3']=='1') echo 'checked'; ?>>Not interesting<br><input type="radio" name="q3" value="2" <?php if(@$_POST['q3']=='2') echo 'checked'; ?>>Slightly interesting<br><input type="radio" name="q3" value="3" <?php if(@$_POST['q3']=='3') echo 'checked'; ?>>Interesting<br><input type="radio" name="q3" value="4" <?php if(@$_POST['q3']=='4') echo 'checked'; ?>>Very interesting<br><input type="radio" name="q3" value="5" <?php if(@$_POST['q3']=='5') echo 'checked'; ?>>Extremely interesting<br><br>
			    <span class="questions">Q.4 What did you think of the characters shown?</span>
			    <input type="radio" name="q4" value="1" <?php if(@$_POST['q4']=='1') echo 'checked'; ?>>Very funny and very cool<br><input type="radio" name="q4" value="2" <?php if(@$_POST['q4']=='2') echo 'checked'; ?>>Very funny and cool<br><input type="radio" name="q4" value="3" <?php if(@$_POST['q4']=='3') echo 'checked'; ?>>Funny and cool<br><input type="radio" name="q4" value="4" <?php if(@$_POST['q4']=='4') echo 'checked'; ?>>Funny but not so cool<br><input type="radio" name="q4" value="5" <?php if(@$_POST['q4']=='5') echo 'checked'; ?>>Neither funny nor cool<br><br>
			    <span class="questions">Q.5 What did you think of the design of the lesson?</span>
			    <input type="radio" name="q5" value="1" <?php if(@$_POST['q5']=='1') echo 'checked'; ?>>I liked the colours and the characters<br><input type="radio" name="q5" value="2" <?php if(@$_POST['q5']=='2') echo 'checked'; ?>>I liked the colours but did not like the characters<br><input type="radio" name="q5" value="3" <?php if(@$_POST['q5']=='3') echo 'checked'; ?>>I did not like the colours but I liked the characters <br><input type="radio" name="q5" value="4" <?php if(@$_POST['q5']=='4') echo 'checked'; ?>>I did not like the colours and I did not like the characters<br><br>
			    <span class="questions">Q.6 Was the lesson easy to use?</span>
			    <input type="radio" name="q6" value="1" <?php if(@$_POST['q6']=='1') echo 'checked'; ?>>Yes, very easy<br><input type="radio" name="q6" value="2" <?php if(@$_POST['q6']=='2') echo 'checked'; ?>>No, I couldn&rsquo;t figure out how to go forward<br><input type="radio" name="q6" value="3" <?php if(@$_POST['q6']=='3') echo 'checked'; ?>>No, I couldn&rsquo;t figure out how to go back<br><input type="radio" name="q6" value="4" <?php if(@$_POST['q6']=='4') echo 'checked'; ?>>No. (Other reasons)<br><br>
			    <span class="questions">Q.7 Is there anything else you would like to tell us? </span>
			    <span style="font-size: 14px;">For example, the best joke, your favourite character etc</span>
			    <textarea autocorrect="off" autocapitalize="off" autocomplete="off" cols="50" rows="5" name="q7"><?php echo @$_POST['q7'];?></textarea><br><br>
			    <input type="submit">
			</form>
			</div>
		</div>	
	</div>
	<!--Modal code ends here-->
</body>
    
</html>
