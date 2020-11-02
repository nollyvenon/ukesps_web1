<?php
require_once("../main_header.php");
if (isset($_SESSION['user_id'])) {
	$details = $clientOperation->applicant_detail($_SESSION['user_id']);
	// $user_details2 = $clientOperation->get_applicant_details($_SESSION['user_id']);
	if ($details == null) {
		$details = $clientOperation->get_user_by_code($_SESSION['user_id']);
	}
	// extract($user_details);
	// var_dump($user_details);
}

$countries = $zenta_operation->get_all_countries();

// var_dump(explode('Facebook', $pdf->Text)[1]);
// die();
if ($_POST['submit']) {

	$place_of_birth = $_POST['place_of_birth'];
	$location = $_POST['location'];
	$country_of_residence = $_POST['country_of_residence'];
	$country_of_nationality = $_POST['country_of_nationality'];
	$languages = $_POST['languages'];
	$linkedin_profile	 = $_POST['linkedin_profile'];
	$twitter_profile = $_POST['twitter_profile'];
	$hobbies = $_POST['hobbies'];
	$skills = $_POST['skills'];
	$resume = $details[0]['resume'];
	$cover_letter = $details[0]['cover_letter'];

	if ($details[0]['applicant_code'] != NULL) {
		$biodata = $clientOperation->update_biodata(
			$details[0]['applicant_code'],
			$place_of_birth,
			$location,
			$country_of_residence,
			$country_of_nationality,
			$languages,
			$linkedin_profile,
			$twitter_profile,
			$hobbies,
			$skills
		);
	} else {
		$user_code = rand_string(11);
		$_SESSION['user_id'] = $user_code;
		$biodata = $clientOperation->add_biodata(
			$user_code,
			$place_of_birth,
			$location,
			$country_of_residence,
			$country_of_nationality,
			$languages,
			$linkedin_profile,
			$twitter_profile,
			$hobbies,
			$skills
		);
	}

	if ($biodata) {
		redirect_to('upload_edu_experience');
	} else {
		$message_error = "Upload wasn't successful.";
	}
}

?>


<script>
	$(function() {
		$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
	});
</script>

<!--styles -->

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8">
			<h4>Personal Details</h4>
			<?php include_once("../layouts/feedback_message.php"); ?>
			<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
				<div class="row mb-3">
					<input name="applicant_code" class="form-control" type="hidden" id="applicant_code" size="30" value="<?php echo $details[0]['user_code']; ?>" />
					<div class="col-md-5 mb-3">First Name <input name="first_name" class="form-control" type="text" id="first_name" value="<?php echo $details[0]['first_name']; ?>" /></div>
					<div class="col-md-5 mb-3">Middle Name <input name="middle_name" class="form-control" type="text" id="middle_name" value="<?php echo $details[0]['middle_name']; ?>" /></div>
					<div class="col-md-5 mb-3"> Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="<?php echo $details[0]['last_name']; ?>" /></div>
					<div class="col-md-5 mb-3">Place of Birth <input name="place_of_birth" class="form-control" type="text" id="place_of_birth" size="30" value="<?php echo $details[0]['place_of_birth']; ?>" /></div>
					<div class="col-md-5 mb-3">Languages <input name="languages" class="form-control" type="text" id="languages" size="30" value="<?php echo $details[0]['languages']; ?>" /></div>
					<div class="col-md-5 mb-3">Location <input name="location" class="form-control" type="text" id="location" size="30" value="<?php echo $details[0]['location']; ?>" /></div>

					<div class="col-md-5 mb-3">Country of Nationality <select name="country_of_nationality" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select A Country</option>
							<?php
							foreach ($countries as $row2) :
							?>
								<option <?php if ($details[0]['country_of_nationality'] == $row2['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['country_id']; ?>">
									<?php echo $row2['country_name']; ?>
								</option>
							<?php
							endforeach;
							?>
						</select></div>

					<div class="col-md-5 mb-3">Country of Residence <select name="country_of_residence" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select A Country</option>
							<?php
							foreach ($countries as $row3) :
							?>
								<option <?php if ($details[0]['country_of_residence'] == $row3['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['country_id']; ?>">
									<?php echo $row3['country_name']; ?>
								</option>
							<?php
							endforeach;
							?>
						</select></div>
					<div class="col-md-11 mb-3">Email Address<input name="linkedin_profile" class="form-control" type="email" id="linkedin_profile" size="30" value="<?php echo $details[0]['linkedin_profile']; ?>" /></div>
					<div class="col-md-11 mb-3">Phone Number<input name="twitter_profile" class="form-control" type="text" id="twitter_profile" size="30" value="<?php echo $details[0]['twitter_profile']; ?>" /> </div>

					<div class="form-group col-md-11 mb-3">
						<label for="hobbies">How to know us?</label>
						<textarea class="form-control" id="hobbies" name="hobbies" rows="5"><?php echo $details[0]['hobbies']; ?></textarea>
					</div>
					<div class="form-group col-md-11 mb-3">
						<label for="skills">Skills</label>
						<textarea class="form-control" id="skills" name="skills" rows="5"><?php echo $details[0]['skills']; ?></textarea>
					</div>
					<div> <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once('../main_footer.php'); ?>