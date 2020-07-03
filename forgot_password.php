<?php
include("z_db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdaI-EUAAAAAFrfMqwMroK6DhiNIy_tvccg-dFP';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
		 echo '6666';

   		$email = $db_handle->sanitizePost($_POST['femail']);
		$result = $zenta_operation->forgot_password($email);
				if($result) {
					$message_success =  "<b>Congratulations!</b><br>Password Reset Successful. ";
					$message_success .= $result;
					
				} else {
					$message_error = "An error occurred, the reset action could not be completed.";
				}
	
	} else {
		// spam submission
		// show error message
			$message_error .= "Error in your submission.";	

	}
		 
		
	 }
$page_title = 'Forgot Password';
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
	<script src="https://www.google.com/recaptcha/api.js?render=6LdaI-EUAAAAAG-t2cO81OpJC-0k0klWShhOaTnY"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdaI-EUAAAAAG-t2cO81OpJC-0k0klWShhOaTnY', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
	<script>
	function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fpass.femail.value))
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
						<form name="fpass" class="form-horizontal form-material" id="fpass" action="" method="post">
								<h3 class="box-title m-b-20">Recover Password</h3>
								<?php require_once 'layouts/feedback_message.php'; ?>
								<div class="form-group">
								  <div class="col-xs-12">
									<input class="form-control" type="text" required="" id="femail" name="femail" placeholder="Email">
								  </div>
								</div>
								<br>
							          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">


									<input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" onclick="ValidateEmail(document.fpass.femail)" value="Reset ">
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