<?php
include("main_header.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

	// Build POST request:
	$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret = '6Lf4TPcUAAAAAJMJ3YGsKoAt1uCidDUIRQAU0GW3';
	$recaptcha_response = $_POST['recaptcha_response'];

	// Make and decode POST request:
	$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	$recaptcha = json_decode($recaptcha);

	// Take action based on the score returned:
	if ($recaptcha->score >= 0.5) {
		// valid submission
		// go ahead and do necessary stuff
		// echo '1';

		$last_name = $_POST['last_name'];
		$middle_name = ($_POST['middle_name']);
		$first_name = ($_POST['first_name']);
		$gender_select = $_POST['gender_select'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		$source = $_POST['source'];
		$mailing_address = $_POST['mailing_address'];
		$courses = $_POST['courses'];
		$universities = $_POST['universities'];


		if (strlen($last_name) < 2) {
			$message_error .= "Surname is compulsory";
		}

		if ($first_name == '') {
			$message_error .= "First Name is compulsory";
		}

		if ($message_error == '') {

			$result = $zenta_operation->new_user($last_name, $middle_name, $first_name, $gender_select, $email, $phone, $country, $source, $mailing_address, $courses, $universities);
			if ($result) {
				$message_success =  "<b>Congratulations!</b><br>Registration Successful. <a href='login'>Click Here to Login</a>";
				$message_success .= "<br>" . $result;
			} else {
				$message_error = "An error occurred, the registration could not be completed.";
			}
		}
	} else {
		// spam submission
		// show error message
		$message_error .= "Error in your submission.";
	}
}
$page_title = 'Register';
$countries = $zenta_operation->get_all_countries();
?>

<script src="https://www.google.com/recaptcha/api.js?render=6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV"></script>
<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('6Lf4TPcUAAAAAG-hxxLb6kiDsFsm2fzmm9w8NJPV', {
			action: 'contact'
		}).then(function(token) {
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
				</div>
				<!-- <a href="#" class="facebook cws-button border-radius half-button">Facebook</a>
				<a href="#" class="twitter cws-button border-radius half-button">Twitter</a> -->
				<div class="clear-both"></div>
				<div class="login-or">
					<hr class="hr-or">
					<span class="span-or">Student Registration</span>
					<hr class="hr-or">
				</div>

				<form action="" method="post" class="form-horizontal tasi-form" name="searchmereg" enctype="multipart/form-data">

					<?php include_once('layouts/feedback_message.php'); ?>


					<div class="form-group">
						<label class="col-md-9">
							Family Name/Surname (as in passport)*:
							<span class="required"></span>
						</label>
						<div class="col-md-11 col-xs-11"><input name="last_name" required class="form-control" type="text" id="last_name" size="30" /></div>
					</div>

					<div class="form-group">
						<label class="col-md-9">
							First Name*:
						</label>
						<div class="col-md-11 col-xs-11"><input name="first_name" class="form-control" type="text" id="first_name" size="30" /></div>
					</div>

					<div class="form-group">
						<label class="col-md-9">
							Middle Name*:
						</label>
						<div class="col-md-11 col-xs-11"><input name="middle_name" class="form-control" type="text" id="middle_name" size="30" /></div>
					</div>
					<br>
					<div class="columns-row">
						<label class="col-md-9">
							&nbsp;&nbsp;&nbsp;Gender:
						</label>
						<div class="columns-col columns-col-6">
							<div>
								<!-- input radio -->
								<div class="radio">
									<input type="radio" id="gender_select_0" value="1" name="gender_select">
									<label for="gender_select_0"></label>
								</div>
								<!-- / input radio -->
								Male
							</div>
							<div>
								<!-- input radio -->
								<div class="radio">
									<input type="radio" id="gender_select_1" value="2" name="gender_select" checked>
									<label for="gender_select_1"></label>
								</div>
								<!-- / input radio -->
								Female
							</div>
						</div>

					</div>
					<br>
					<div class="form-group">
						<label class="col-md-9">
							Email:
							<span class="required">*</span>
						</label>
						<div class="col-md-11 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
					</div>

					<div class="form-group">
						<label class="col-md-9">
							Phone:
							<span class="required">*</span>
						</label>
						<div class="col-md-11 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
					</div>

					<div class="form-group">
						<label class="col-md-9">
							Country:
						</label>
						<div class="col-md-11 col-xs-11">
							<select name="country" data-required="true" class="form-control">
								<option value="">Select Country</option>
								<?php
								foreach ($countries as $row2) {
								?>
									<option value="<?php echo $row2['country_id']; ?>">
										<?php echo $row2['country_name']; ?>
									</option>
								<?php } ?>
							</select></div>
					</div>


					<div class="form-group">
						<label class="col-md-9">Source:<span class="required">*</span></label>
						<div class="col-md-11 col-xs-11 message-form-author"><select name="source" data-required="true" class="form-control">
								<option value=''>Please Source</option>
								<option value='Newspaper Advert'>Newspaper Advert</option>
								<option value='Online Advert'>Online Advert</option>
								<option value='Google Ads'>Google Ads</option>
								<option value='Facebook Ads'>Facebook Ads</option>
								<option value='From a friend'>From a friend</option>
								<option value='Online search'>Online search</option>
								<option value='Radio Advert'>Radio Advert</option>
								<option value='TV Advert'>TV Advert</option>
								<option value='Roadside banner'>Roadside banner</option>
								<option value='Other'>Other</option>
							</select></div>
					</div><br><br>

					<div class="form-group ">
						<label class="col-md-9">Address
							<span class="required">*</span>
						</label>
						<div class="col-md-11 col-xs-11 message-form-message">
							<textarea name="mailing_address" cols="45" rows="8" aria-required="true"></textarea>
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-9">Course Preferences
							<span class="required">*</span>
						</label>
						<div class="col-md-11 col-xs-11 message-form-message ">
							<textarea name="courses" cols="45" rows="8" aria-required="true"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-9">University Preferences:</label>
						<div class="col-md-11 col-xs-11 message-form-message"><textarea name="universities" cols="45" rows="8" aria-required="true"></textarea></div>
					</div>

					<input type="hidden" name="recaptcha_response" id="recaptchaResponse">

					<br>
					<input class="cws-button bt-color-3 border-radius " name="submit" type="submit" id="submit" value="Register ">
					<button type="reset" class="cws-button bt-color-3 border-radius alt icon-right">Reset <i class="fa fa-angle-right"></i></button>

				</form>
			</div>
		</div>
	</section>
</main>
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- footer -->