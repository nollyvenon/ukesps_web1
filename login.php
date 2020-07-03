<?php
include("xpanel/z_db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Lf4TPcUAAAAAJMJ3YGsKoAt1uCidDUIRQAU0GW3';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
//print_r($recaptcha);
    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
	$username = $db_handle->sanitizePost($_POST['username']);
   $password = $db_handle->sanitizePost($_POST['password']);
   $remember_me = $db_handle->sanitizePost($_POST['remember_me']);
	
    
  if ( strlen($username) < 6 ){
	  $message_error .="Email must be more than 5 char length<BR>";
  }
  
  if ( strlen($password) < 6 ){ //checking if password is greater then 8 or not
	  $message_error .= "Password must be more than 5 char length<BR>";
  }
 
		  
			  // Check database to see if username/password exist.
				$found_client = $zenta_operation->authenticate($username, $password);
			  if($found_client) {
				  echo $user_code = $found_client[0]['user_code'];
				  if($zenta_operation->user_is_active($user_code)) {
					  $found_client = $found_client[0];
					  $session_client->login($found_client);					
					  redirect_to("xpanel/index");
				  } else {
					  $message_error = "Your profile is currently inactive, suspended or your subscription has expired, please contact support for assistance.";
				  }
			  } else {
				  // username/password combo was not found in the database
				  $message_error = "Username and password combination do not match.";
			  }
	
} else {
    // spam submission
    // show error message
		$message_error .= "Error in your submission.";	

}
		 
		
	 }
$page_title = 'Login';
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/select2.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/styles.css">

	<!--styles -->
	<script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
	<script>
	function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(login.username.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
	</script>
</head>
<body class="">
	<?php include_once('header.php'); ?>
	<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo.png" data-at2x='img/logo@2x.png' alt>
						<h2>UKESPS</h2>
					</div>
					<!--<a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
					<a href="#" class="twitter cws-button border-radius half-button">Twitter</a>-->
					<div class="clear-both"></div>
					<div class="login-or">
						<hr class="hr-or">
						<span class="span-or">or</span>
					</div>
						<form action="" id="login" method="post" class="form-horizontal tasi-form" name="login" enctype="multipart/form-data">
					<?php include_once('layouts/feedback_message.php');?>
						<div class="form-group">
							<input type="text" name="username" class="login-input" placeholder="Email">
							<span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="login-input" placeholder="Pasword">
							<span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
						</div>
						<p class="small">
							<a href="forgot_password">Forgot Password?</a>
						</p>
						 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
						
					
						<input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" onclick="ValidateEmail(document.login.username)" value="Login ">
						<br><br>
						<span class="text-right"><a href="register" class="cws-button bt-color-2 border-radius">Register</a></span>
					</form>
				</div>
			</div>
		</section>
	</main>
	<!-- footer -->
	<?php include_once('footer.php'); ?>
	<!-- footer -->
	<!-- scripts -->
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/select2.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.tweet.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/retina.min.js"></script>
	<!-- scripts -->
</body>
</html>