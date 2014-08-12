<!DOCTYPE html>
<html lang="en">
  <head>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <title>Laugh Guru</title>
       <link rel="stylesheet" href="css/style.css"/>
	   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gill Sans">
	   <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	   
	     <link href="js-image-slider.css" rel="stylesheet" type="text/css" />
	     <link href="js-image-slider1.css" rel="stylesheet" type="text/css" />
    <script src="js-image-slider.js" type="text/javascript"></script>
    
    <link href="generic.css" rel="stylesheet" type="text/css" />
	<script>
   
<!----- JQUERY FOR SLIDING NAVIGATION --->   
$(document).ready(function() {
  $('a[href*=#]').each(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname
    && this.hash.replace(/#/,'') ) {
      var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
      var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
       if ($target) {
         var targetOffset = $target.offset().top;

<!----- JQUERY CLICK FUNCTION REMOVE AND ADD CLASS "ACTIVE" + SCROLL TO THE #DIV--->   
         $(this).click(function() {
            $("#nav li a").removeClass("active");
            $(this).addClass('active');
           $('html, body').animate({scrollTop: targetOffset}, 1000);
           return false;
         });
      }
    }
  });

});

function register() {
  document.getElementById("error").innerHTML="This feature is currently disabled!";
}
</script>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>

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
	
<body>
  <?php include_once("includes/analyticstracking.php") ?>
<!----- LINK BACK TO THE TUTORIAL--->  


<!----- HEADER START--->   
<!--<header id="header">
<div class="content">
<div id="logo"><a href=""> PARALLAX </a></div>

<nav id="nav">
	<ul>
		<li><a href="#slide1" class="active" title="Next Section" >Slide 1</a></li>
		<li><a href="#slide2" title="Next Section">Slide 2</a></li>
		<li><a href="#slide3" title="Next Section">Slide 3</a></li>
		<li><a  href="#slide4" title="Next Section">Slide 4</a></li>
		<li><a href="#slide5" title="Next Section">Slide 5</a></li>
	</ul>
</nav>
</div>
</header>	-->
<!----- HEADER END--->   

<!----- SLIDES START --->   	
	<div id="slide1" >
		<div class="content" >      
        <div class="header_div" >
        <img src="img/logo.jpg" width="250px" >
        </div> 
        
        <div class="header_div2" >
        <div class="sociallink" >
        <!--<a href="#" ><img src="img/facebook.png" width="20px" ></a>&nbsp;&nbsp;&nbsp;
       <a href="#" > <img src="img/google.png" width="22px" ></a>&nbsp;&nbsp;&nbsp;
        <a href="#" ><img src="img/twitter.png" width="23px" ></a>-->
       <a href="#" > <img src="img/contact.png" width="130"  style="float:right; margin-top: 8px;" ></a>
        </div>
        </div> 
        
        <div class="header_div3"  >
        <div class="login1">
        <a onclick="register()" style="text-decoration: none; color: #666;">Sign up and Hop on the Ride!</a>
        </div>
        <div class="login">
	  <br/>
        <!--<img src="img/FB_logo.png" width="20" style="float: left; position: relative; left: 5%;"  />-->
	<font style="font-size:16px;">Already a Member?</font><br/><br/>
        
       <div style="clear:both; border-bottom:1px solid #ffffff; width:100%; margin-bottom:10px;"></div>
	<form action="login_check.php" method="POST">
	  <input type="text" class="input" placeholder="Username" name="user_email" value="<?php if(isset($_GET['email'])) echo $_GET['email'];?>">
	  <input type="password" class="input" placeholder="Password" name="user_pass"><br>
	  <span id="error" style="margin-left: -26px;font-weight: bold;font-size: 80%;color: black;text-align: left;"><?php if(isset($_GET['email'])) echo 'The email or password is incorrect.';?></span><br>
	  <input type="submit" name="Go!" value="Go!" class="input1" >
	</form>
        </div>
        
        </div>
          
		</div> 
    </div> 

	<div id="slide2" >
    <div class="contentnam" ></div>
		<div class="content"   >
            
     <nav id="nav nav_op" style=" margin-top:40px;">
	<ul>
		
		<li class="hello" style=""><a href="#slide2" title="Next Section" style=" color: #403006;text-shadow: 2px 2px #fff; text-decoration:none;  font-size: 26px;">ABOUT US</a></li>
		
	</ul>
</nav>
<div class="clear"></div>
     <div  class="box">
     <div  class="box1" style="position:relative;">
     <a href="#slide3" class="active" title="Next Section" ><img src="images/do_button.png" width="160"  ></a>
	 <img  class="loopimages1"src="images/what we do_Q.png" width="40" style="">
     <br/> 
     <br/>
     <h3 class="whatwedo" style=" " >What we do</h3>
     
     </div>
     <div  class="box1" style="position:relative;">
     <a href="#slide4" title="Next Section"><img src="images/better_button.png" width="160" ></a>
	 <img src="images/better_search.png" class="loopimages2" width="40" style="">
     <br/> <br/>
     <h3 class="whyitis" style="">Why it is better?</h3>
     
     </div>
     <div  class="box1" style="position:relative;">
     <a  href="#slide5" title="Next Section"><img src="images/works_button.png" width="160" ></a>
	  <img src="images/works_spanner.png" width="40" class="loopimages3" style="">
     <br/> <br/>
	 
     <h3 class="itreally" style="">It really works!</h3>
     </div>
     <div  class="box1" style="position:relative;">
     <a href="#slide6" title="Next Section"><img src="images/Testimonial_button.png" width="160" ></a>
	 <img src="images/Testimonial_bubble.png"  width="40" class="loopimages4"  style="">
     <br/>
     <h3 class="tesmimoni" style="">Testimonials</h3>
     </div>
     
     
     </div> 
     <div class="clear"></div>     
     <a href="#slide1" title="Next Section"><img src="img/Sign_up_button.png"  class="laugh_guru" style="" width="200" ></a>       
            
            
            
             
		</div> 
    </div> 
	
	
   <div id="slide3" >
		<div class="content">
			

<nav id="nav" class="nav_c" >
	<ul>
		<li><a href="#slide3" class="active" title="Next Section" ><img src="img/what we do.png" width="100" ></a></li>
		<li><a href="#slide4" title="Next Section">
        
        <img src="img/why it is better unselected.png" width="137" >
        </a></li>
		<li><a href="#slide1" title="Next Section">
        <img src="img/sign up button.png" width="130" >
        </a></li>
		<li><a  href="#slide5" title="Next Section">
        <img src="img/it really works unselected.png" width="120" >
        </a></li>
		<li><a href="#slide6" title="Next Section">
        
        <img src="img/Testimonial unselected.png" width="112" >
        </a></li>
	</ul>
</nav>
<div class="clear" ></div>
<br/>
<h3 style=" color:#000; text-decoration: none; font-size: 26px;  text-shadow: 1px 1px #FFF; color: #202020;">  WHAT WE DO</h3>
<br/>
<!--<div class="contain" style="border:1px solid red;"> 
<div class="video" >
  <div id="sliderFrame">
        <div id="slider">
  <img src="img/Screen1.png" width="870">
  <img src="img/Screen2.png" width="870">
  <img src="img/Screen3.png" width="870">

	</div>
	 <div class="group1-Wrapper">
            <a onClick="imageSlider.previous()" class="group1-Prev"></a>
            <a onClick="imageSlider.next()" class="group1-Next"></a>
        </div>
  </div>
</div>
</div>-->
<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/screen1.png" alt="" title="" id="wows1_0"/></li>
<li><img src="data1/images/screen2.png" alt="" title="" id="wows1_1"/></li>
<li><img src="data1/images/screen3.png" alt="" title="" id="wows1_2"/></li>
</ul></div>
<div class="ws_bullets" ><div>
<a href="#" title="Screen1"><img src="data1/tooltips/screen1.png" alt=""/>1</a>
<a href="#" title="Screen2"><img src="data1/tooltips/screen2.png" alt=""/>2</a>
<a href="#" title="Screen3"><img src="data1/tooltips/screen3.png" alt=""/>3</a>

</div></div>
<!--<span class="wsl"><a href="http://wowslider.com">slider html</a> by WOWSlider.com v5.4</span>-->
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

              
              
              
		</div> 
    </div> 
	
	
	<div id="slide4" >
		<div class="content">
              
         <nav id="nav" class="slide4nav" >
	<ul>
		<li><a href="#slide3" class="active" title="Next Section" ><img src="img/what we do unselected.png" width="100" ></a></li>
		<li><a href="#slide4" title="Next Section">
        
        <img src="img/why it is better.png" width="137" >
        </a></li>
		<li><a href="#slide1" title="Next Section">
        <img src="img/sign up button.png" width="130" >
        </a></li>
		<li><a  href="#slide5" title="Next Section">
        <img src="img/it really works unselected.png" width="120" >
        </a></li>
		<li><a href="#slide6" title="Next Section">
        
        <img src="img/Testimonial unselected.png" width="112" >
        </a></li>
	</ul>
</nav>
<div class="clear" ></div>
<br/>
<h3 style="  text-decoration: none;  color: #FFFFFF; font-size: 26px;">   WHY IT IS BETTER?</h3>
<br/>
<img src="img/white boy button.png" >
<div class="clear" ></div>
     <br/><br/><br/><br/>
  <p class="pera1" style="    line-height: 24px;
" >In the current  educational system, learning usually happens through one of three       methods: rote learning, laborious practice or trial and error. LaughGuru replaces rote learning with funny mnemonics,laborious practice with exercises that are more fun than Temple Run, and trial and error with fun checks and balances.</p>            
              
              
              
               
		</div> 
    </div> 
	
	
	<div id="slide5" >
		<div class="content">
        
        <nav id="nav" class="slide5nav" style=" ">
	<ul>
		<li><a href="#slide3" class="active" title="Next Section" ><img src="img/what we do unselected.png" width="100" ></a></li>
		<li><a href="#slide4" title="Next Section">
        
        <img src="img/why it is better unselected.png" width="137" >
        </a></li>
		<li><a href="#slide1" title="Next Section">
        <img src="img/sign up button.png" width="130" >
        </a></li>
		<li><a  href="#slide5" title="Next Section">
        <img src="img/it really works.png" width="120" >
        </a></li>
		<li><a href="#slide6" title="Next Section">
        
        <img src="img/Testimonial unselected.png" width="112" >
        </a></li>
	</ul>
</nav>
<div class="clear" ></div>
<br/><br/><br/>
<h3 style="text-decoration: none;  color: #FFFFFF; font-size: 26px;">  IT REALLY WORKS!</h3>
<br/><br/>
<div class="contain12" > 

<p class="pera">In our own testing, 1600 children in 40+ large classroom / focus group sessions benefited from our product - over 40% increase in average test scores after using our material. We conduct             research on humour in education; scholarly literature (over 100 citations) indicates positive impact of humour on memory, cognition and application.</p>
</div>



        
        
        
		</div> 
		

    </div> 
    
    
    <div id="slide6" >
		<div class="content">
        
               <nav id="nav" class="slide6nav"  style=" ">
	<ul>
		<li><a href="#slide3" class="active" title="Next Section" ><img src="img/what we do unselected.png" width="100" ></a></li>
		<li><a href="#slide4" title="Next Section">
        
        <img src="img/why it is better unselected.png" width="137" >
        </a></li>
		<li><a href="#slide1" title="Next Section">
        <img src="img/sign up button.png" width="130" >
        </a></li>
		<li><a  href="#slide5" title="Next Section">
        <img src="img/it really works unselected.png" width="120" >
        </a></li>
		<li><a href="#slide6" title="Next Section">
        
        <img src="img/Testimonial.png" width="112" >
        </a></li>
	</ul>
</nav>
<div class="clear" ></div>
<br/><br/>
<h3 style="text-decoration: none; color: #FFFFFF; font-size: 26px;"> TESTIMONIALS</h3> 
 <div class="contain1">
  <br/>
 <div  class="pera_1"> <p style="position: relative; left: 10%; font-size:22px;">
 “The kids really enjoyed themselves during the class. When can we have the complete module?”<br/>
Ruksana Irani, <br/>
Principal, Ashok Academy
 </p></div>
 <br/><br/>
 
  <div  class="pera_2" style="position: relative; left: 2%;"><p style=" position: relative; left: 8%; font-size:22px;">
These humorous images are sure to strike a chord with students.”<br/>
Sharmila Sunny, <br/>
Vice Principal, St. Xavier’s School
 </p>
 </div> 
 
 </div>     
        
        
		</div> 
		

    </div> 
	<div style="clear:both"> </div>
	<div class="footer" >
  Copyright Laugh Out Loud Ventures 2014
  </div>
<!----- SLIDES END -->

</body>


</html>
