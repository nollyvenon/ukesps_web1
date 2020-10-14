<?php
include("../main_header.php");
if ($session_recruiter->is_logged_in()) {
	redirect_to("index");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

	// Build POST request:
	$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret = '6LfXhrQZAAAAAI-p5NCr45YOozGy0bV1yp6I5ofE';
	$recaptcha_response = $_POST['recaptcha_response'];

	// Make and decode POST request:
	$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	$recaptcha = json_decode($recaptcha);

	// Take action based on the score returned:
	if ($recaptcha->score >= 0.5) {
		$username = $db_handle->sanitizePost($_POST['username']);
		$password = $db_handle->sanitizePost($_POST['password']);
		$remember_me = $db_handle->sanitizePost($_POST['remember_me']);


		if (strlen($username) < 6) {
			$message_error .= "Email must be more than 5 char length<BR>";
		}

		if (strlen($password) < 6) { //checking if password is greater then 8 or not
			$message_error .= "Password must be more than 5 char length<BR>";
		}


		// Check database to see if username/password exist.
		$found_client = $recruit_object->authenticate($username, $password);

		if ($found_client) {
			$recruiter_code = $found_client[0]['recruiter_code'];
			if ($recruit_object->recruiter_is_active($recruiter_code)) {
				$found_client = $found_client[0];
				$session_recruiter->login($found_client);
				redirect_to("index");
				// //redirect_to("checkout");
				// if (!$recruit_object->get_cart_info($unique)) { //check if there's an active uniqueID of this session in the order table, if yes redirect to payment page 
				// 	//redirect_to("index");
				// 	if (!$recruit_object->get_cvsearch_cart_info($unique)) { //check if there's an active uniqueID of this session in the order table
				// 		redirect_to("index");
				// 	} else {
				// 		redirect_to("payment?xxid=$xxid");
				// 	}
				// } else {
				// 	redirect_to("payment?xxid=$xxid");
				// }
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
?>

<script src="https://www.google.com/recaptcha/api.js?render=6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm"></script>


<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('6LfXhrQZAAAAANTAOfhy3HFEQdm0UJqB_fSSInTm', {
			action: 'submit'
		}).then(function(token) {
			// Add your logic to submit to your backend server here.
			var recaptchaResponse = document.getElementById('recaptchaResponse');
			recaptchaResponse.value = token;
		});
	});
</script>
<main>
	<section class="fullwidth-background bg-2">
		<div class="grid-row">
			<div class="login-block">
				<div class="logo_login text-center" style='padding:20px;'>
					<img class="img-fluid rounded mx-auto d-block" src="<?= SITE_URL ?>/img/logo.jpg" alt>
					<!--<h2>UKESPS</h2>-->
				</div>
				<!-- <a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
				<a href="#" class="twitter cws-button border-radius half-button">Twitter</a> -->
				<div class="clear-both"></div>
				<div class="login-or">
					<hr class="hr-or">
					<span class="span-or">Recruiter Login</span>
					<hr class="hr-or">
				</div>
				<form action="" id="login" method="post" class="form-horizontal tasi-form" name="login" enctype="multipart/form-data">
					<?php include_once('../layouts/feedback_message.php'); ?>
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


					<input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" value="Login ">
					<br><br>
					<p align="right"><a href="register" class=" cws-button bt-color-4 border-radius">Click to Register</a></p>
				</form>
			</div>
		</div>
	</section>
</main>
<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- footer -->