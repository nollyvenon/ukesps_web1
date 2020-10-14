<?php
require_once("../main_header.php");
if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
// error_reporting(-1);

if (isset($_POST['submit'])) {

	foreach ($_POST as $key => $value) {
		$_POST[$key] = $db_handle->sanitizePost(trim($value));
	}
	extract($_POST);
	if (strlen($first_name) < 2) {
		$message_error .= "First Name is compulsory";
	}

	if ($last_name == '') {
		$message_error .= "Last Name is compulsory";
	}

	if ($message_error == '') {

		$result = $zenta_operation->update_user($user_code, $first_name, $last_name, $country, $state, $phone, $mailing_address, $course_preference, $university_preference);
		if ($result) {
			redirect_to('index');
		} else {
			$message_error = "Upload wasn't successful.";
		}
	}
}


$countries = $zenta_operation->get_all_countries();
$first_name = $zenta_operation->get_user_by_code($user_code)['first_name'];
$last_name = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$state = $zenta_operation->get_user_by_code($user_code)['state'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
// $course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course_preference = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$university_preference = $zenta_operation->get_user_by_code($user_code)['university_preference'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
	"Female";
?>
<!-- <script>
		$(function() {
			$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
		});
	</script> -->

<!--styles -->

<div class="page-content container">
	<div class="row">
		<?php include('stu_menu.php') ?>
		<div class="col-md-8 col-lg-8 col-sm-12">
			<h4>Upload Your biodata</h4>
			<?php include_once("../layouts/feedback_message.php"); ?>
			<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
				<div class="row mb-3 ">
					<div class="col-md-5 py-2">First Name<input name="first_name" class="form-control" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>
					<div class="col-md-5 py-2">Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="<?php echo $last_name; ?>" /> </div>
				</div>
				<div class="row mb-3">
					<div class="col-md-5 py-2">Email<input name="email" class="form-control" type="text" disabled id="email" value="<?php echo $email; ?>" /></div>

					<div class="col-md-5 py-2">Phone<input name="phone" class="form-control" type="text" id="phone" value="<?php echo $phone; ?>" /> </div>
				</div>
				<div class="row mb-3">
					<div class="col-md-5 py-2">Country of Residence <select name="country" data-required="true" class="selectpicker" data-live-search="true" onchange="ShowStatebyCountry(this.value)">
							<option value="">Select A Country</option>
							<?php
							foreach ($countries as $row3) :
							?>
								<option <?php if ($country == $row3['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['country_id']; ?>">
									<?php echo $row3['country_name']; ?>
								</option>
							<?php
							endforeach;
							?>
						</select></div>
					<div class="col-md-5 py-2">State of Residence <select id="txtHint1" name="state" data-required="true" class="selectpicker" data-live-search="true">
							<option value="<?= $state ?>"><?= $zenta_operation->get_state_by_id($state) ?></option>
						</select></div>
				</div>
				<div class="row">
					<div class="col-md-5 py-2">Course Preference <input name="course_preference" class="form-control" type="text" id="course_preference" value="<?php echo $course_preference; ?>" /></div>

					<div class="col-md-5 py-2">University Preference <input name="university_preference" class="form-control" type="text" id="university_preference" value="<?php echo $university_preference; ?>" /> </div>
				</div>
				<div class="row mb-3">
					<div class="col-md-10 py-2">Address<input name="mailing_address" class="form-control" type="text" id="mailing_address" value="<?php echo $address; ?>" /></div>
				</div>
				<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update Profile">

			</form>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>