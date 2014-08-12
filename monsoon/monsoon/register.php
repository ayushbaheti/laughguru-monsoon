<?php
/*use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
FacebookSession::setDefaultApplication('651770824893550','49cff08f4f931b0eee8108e6ac0c0c9d');
$helper = new FacebookRedirectLoginHelper('login_success.php');
$loginUrl = $helper->getLoginUrl();
// Use the login url on a link or button to redirect to Facebook for authentication
$helper = new FacebookRedirectLoginHelper();
try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
if($session) {

  try {

    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());

    echo "Name: " . $user_profile->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}
*/?>

<?php
require_once("connection.php");
// define variables and set to empty values
$nameErr = $emailErr = $passErr = $conpassErr ="";
$name = $email  = $password = $conpass ="";
$confirm_code=md5(uniqid(rand())); 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if (empty($_POST["name"]))
    {$nameErr = "Name is required";}
  else{
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]{3,20}$/",$name))
      {
      $nameErr = "Invalid name.(min 3 chars and max 20 chars)"; 
      }
  }

  if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
  else
    {$email = test_input($_POST["email"]);
    $email=strtolower($email);
    if (!preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i",$email))
      {
      $emailErr = "Invalid email format"; 
      }
    }

  if (empty($_POST["password"]))
    {$passErr = "Password is required";}
  else
    {$password = test_input($_POST["password"]);
    if (!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/",$password))
      {
      $passErr = "Invalid password.Atleast 6 characters required!"; 
      }
    }
    
  if (empty($_POST["conpass"]))
    {$conpassErr = "Confirm your password";}
  else{
    $conpass = test_input($_POST["conpass"]);
    // check if name only contains letters and whitespace
    if ($conpass!=$password)
      {
      $conpassErr = "Passwords don't match!"; 
      }
  }
  
  if($nameErr==""&& $emailErr==""&& $passErr==""&& $conpassErr==""){
    $encpass=sha1($password);
    $query = "SELECT `user_email` FROM `user_reg` WHERE `user_email` = '$email'";
        $query_run = mysql_query($query);
        if(mysql_num_rows($query_run)== 1){
            $emailErr="Email Already Exists!";
        }
        else{
            $query="INSERT INTO `user_temp` VALUES('$confirm_code','$name','$email','$password')";
            if($query_run=mysql_query($query)){
                require 'includes/PHPMailer-master/PHPMailerAutoload.php';
            
                $mail = new PHPMailer;
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'mywebsite.vlab@gmail.com';       // SMTP username
                $mail->Password = 'vlab1234credit';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                $mail->Port = 587;
                
                $mail->From = 'mywebsite.vlab@gmail.com';
                $mail->FromName = 'Gurukul';
                $mail->addAddress($email);  // Add a recipient // Name is optional
                $mail->Subject = 'Your confirmation link here';
                $message="Your Comfirmation link \r\n";
                $message.="Click on this link to activate your account \r\n";
                $message.="<a href='http://localhost/lol/confirmation.php?passkey=$confirm_code'>Click here</a>";
                $mail->Body    = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                if(!$mail->send()) {
                   $msg ='Message could not be sent.<br>'.'Mailer Error: ' . $mail->ErrorInfo;
                }
                $msg='Kindly check your mail!';
                header('Location: register_success.php');
            }
            else{
                echo 'SORRY.';
            }
        }
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
include 'includes/facebook.php';
	$appid 		= "651770824893550";
	$appsecret  = "49cff08f4f931b0eee8108e6ac0c0c9d";
	$facebook   = new Facebook(array(
  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));
	$fbuser = $facebook->getUser();
        echo $fbuser;
	if ($fbuser) {
		try {
		    $user_profile = $facebook->api('/me');
		}
		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		$user_fbid	= $fbuser;
		$user_email = $user_profile["email"];
		$user_fname = $user_profile["first_name"];
		$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
		require 'connection.php';
                $query="INSERT INTO `user_reg` VALUES('$user_fname','$user_email','')";
                if($query_run=mysql_query($query)){
                    echo 'You have successfully registered!';
                }else{
                    echo 'Sorry, we cannot register you now.';
                }
	}
?>

<html>
  <head>
    <title>
      Welcome to Laugh Out Loud
    </title>
  </head>

  <body>
        <a href="index.php"><div style="background-image: url('images/logo_png.png'); width: 100%; height: 30%; background-repeat: no-repeat;background-position: center;">
            
        </div></a>
        <div style="margin-left:auto;margin-right: auto;width: 50%;">
            <form action="register.php" method="POST">
                NAME: <input type="text" name="name" value="<?php if(isset($name)) echo $name;?>"><span class="error"><?php echo $nameErr;?></span><br><br>
                EMAIL: <input type="text" name="email"><span class="error"><?php echo $emailErr;?></span><br><br>
                PASSWORD: <input type="password" name="password"><span class="error"><?php echo $passErr;?></span><br><br>
                CONFIRM PASSWORD: <input type="password" name="conpass"><span class="error"><?php echo $conpassErr;?></span><br><br>
                <input type="submit" value="Sign Up"><br><br>
                <!--<img src="images/fb.png" alt="Fb Connect" title="Login with facebook" onclick="FBLogin();"/>-->
            </form>
        </div>
  </body>
</html>