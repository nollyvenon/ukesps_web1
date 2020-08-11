<?php
require_once("header.php"); ?>
<script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<?php
if (!$session_jobseek->is_logged_in()) {
	redirect_to("login.php");
}
$details = $jobsk_operation->applicant_detail($jobseek_code);
extract($details);

// var_dump($details);
// die();
if ($_POST['submit']) {
	$edu_institution_1 = $_POST['edu_institution_1'];
	$education_period_month_from_1 = $_POST['education_period_month_from_1'];
	$education_period_month_to_1 = $_POST['education_period_month_to_1'];
	$education_period_year_from_1 = $_POST['education_period_year_from_1'];
	$education_period_year_to_1 = $_POST['education_period_year_to_1'];
	$education_cert_obtained_1 = $_POST['education_cert_obtained_1'];
	$education_course_studied_1 = $_POST['education_course_studied_1'];
	$education_course_description_1 = $_POST['education_course_description_1'];

	$edu_institution_2 = $_POST['edu_institution_2'];
	$education_period_month_from_2 = $_POST['education_period_month_from_2'];
	$education_period_month_to_2 = $_POST['education_period_month_to_2'];
	$education_period_year_from_2 = $_POST['education_period_year_from_2'];
	$education_period_year_to_2 = $_POST['education_period_year_to_2'];
	$education_cert_obtained_2 = $_POST['education_cert_obtained_2'];
	$education_course_studied_2 = $_POST['education_course_studied_2'];
	$education_course_description_2 = $_POST['education_course_description_2'];

	$edu_institution_3 = $_POST['edu_institution_2'];
	$education_period_month_from_3 = $_POST['education_period_month_from_3'];
	$education_period_month_to_3 = $_POST['education_period_month_to_3'];
	$education_period_year_from_3 = $_POST['education_period_year_from_3'];
	$education_period_year_to_3 = $_POST['education_period_year_to_3'];
	$education_cert_obtained_3 = $_POST['education_cert_obtained_3'];
	$education_course_studied_3 = $_POST['education_course_studied_3'];
	$education_course_description_3 = $_POST['education_course_description_3'];

	$edu_exper = $jobsk_operation->add_edu_experience($jobseek_code, $edu_institution_1, $education_period_month_from_1, $education_period_month_to_1, $education_period_year_from_1, $education_period_year_to_1, $education_cert_obtained_1, $education_course_studied_1, $education_course_description_1, $edu_institution_2, $education_period_month_from_2, $education_period_month_to_2, $education_period_year_from_2, $education_period_year_to_2, $education_cert_obtained_2, $education_course_studied_2, $education_course_description_2, $edu_institution_3, $education_period_month_from_3, $education_period_month_to_3, $education_period_year_from_3, $education_period_year_to_3, $education_cert_obtained_3, $education_course_studied_3, $education_course_description_3);

	if ($edu_exper) {
		redirect_to('upload_work_experience');
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


<div class="page-content sitemap container container-fluid clear-fix">
	<div class="row">
		<div class="col-12">
			<?php include_once("../layouts/feedback_message.php"); ?>
			<h4>Upload Your Educational Experience</h4>
			<form action="" method="post" name="form1">
				<div class="row ">
					<div class="col-md-12"><b>Institutions Attended with Dates</b></div>
				</div>
				<h4>1</h4>
				<div class="row mb-3">
					<div class="col-md-4">From Month: <select name="education_period_month_from_1" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select Month</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_from_1'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">From Date: <input type="text" name="education_period_year_from_1" id="education_period_year_from_1" value="<?= $details[0]['education_period_year_from_1'] ?>"></div>
					<div class="col-md-4">To Month: <select name="education_period_month_to_1" data-required="true" class="selectpicker" data-live-search="true">
							<option <?php if ($details[0]['education_period_month_to_1'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_to'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_to_1'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">To Date: <input type="text" name="education_period_year_to_1" id="education_period_year_to_1"> </div>
				</div>
				<div class="row mb-3">
					<div class="col-md-4 ">
						Certificate Obtained: <select name="education_cert_obtained_1" data-required="true" data-live-search="true">
							<option value="">Select Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '1') { ?> selected="selected" <?php } ?> value="1">Primary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '2') { ?> selected="selected" <?php } ?> value="2">Secondary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '3') { ?> selected="selected" <?php } ?> value="3">Diploma Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '4') { ?> selected="selected" <?php } ?> value="4">Bachelor Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '5') { ?> selected="selected" <?php } ?> value="5">Master Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '6') { ?> selected="selected" <?php } ?> value="6">Doctorate Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_1'] == '7') { ?> selected="selected" <?php } ?> value="7">Others</option>
						</select>
					</div>

					<div class="col-md-6">
						Course Studied <input name="education_course_studied_1" class="form-control" type="text" id="education_course_studied_1" placeholder="Enter Course Studied" value="<?php echo $details[0]['education_course_studied_1']; ?>" />
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						Institution Attended
						<input name="edu_institution_1" class="form-control" type="text" id="edu_institution_1" value="<?php echo $details[0]['edu_institution_1']; ?>" placeholder="Enter Institution Attended" />
					</div>
					<div class="col-md-6">
						Course Description <textarea id="education_course_description_1" name="education_course_description_1" class="form-control" cols="45" rows="5" aria-required="true" placeholder="Enter Course Description"><?php echo $details[0]['education_course_description_1']; ?></textarea>
					</div>
				</div>
				<h4>2</h4>
				<div class="row mb-3">
					<div class="col-md-4">From Month: <select name="education_period_month_from_2" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select Month</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_from_2'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">From Date: <input type="text" name="education_period_year_from_2" id="education_period_year_from_2"> </div>
					<div class="col-md-4">To Month: <select name="education_period_month_to_2" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select Month</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_to_2'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">To Date: <input type="text" name="education_period_year_to_2" id="education_period_year_to_2"> </div>
				</div>
				<div class="row mb-3">
					<div class="col-md-4 ">
						Certificate Obtained <select name="education_cert_obtained_2" data-required="true" data-live-search="true">
							<option value="">Select Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '1') { ?> selected="selected" <?php } ?> value="1">Primary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '2') { ?> selected="selected" <?php } ?> value="2">Secondary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '3') { ?> selected="selected" <?php } ?> value="3">Diploma Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '4') { ?> selected="selected" <?php } ?> value="4">Bachelor Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '5') { ?> selected="selected" <?php } ?> value="5">Master Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '6') { ?> selected="selected" <?php } ?> value="6">Doctorate Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_2'] == '7') { ?> selected="selected" <?php } ?> value="7">Others</option>
						</select>
					</div>

					<div class="col-md-6">
						Course Studied <input name="education_course_studied_2" class="form-control" type="text" id="education_course_studied_2" placeholder="Enter Course Studied" value="<?php echo $details[0]['education_course_studied_1']; ?>" />
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4">
						Institution Attended
						<input name="edu_institution_2" class="form-control" type="text" id="edu_institution_2" value="<?php echo $details[0]['edu_institution_1']; ?>" placeholder="Enter Institution Attended" />
					</div>
					<div class="col-md-6">
						Course Description <textarea id="education_course_description_2" name="education_course_description_2" class="form-control" cols="45" rows="5" aria-required="true" placeholder="Enter Course Description"><?php echo $details[0]['education_course_description_2']; ?></textarea>
					</div>
				</div>

				<h4>3</h4>
				<div class="row mb-3">
					<div class="col-md-4">From Month: <select name="education_period_month_from_3" id="education_period_month_from_3" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select Month</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_from_3'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">From Date: <input type="text" name="education_period_year_from_3" id="education_period_year_from_3"> </div>
					<div class="col-md-4">To Month: <select name="education_period_month_to_3" data-required="true" class="selectpicker" data-live-search="true">
							<option value="">Select Month</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '1') { ?> selected="selected" <?php } ?> value="1">January</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '2') { ?> selected="selected" <?php } ?> value="2">February</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '3') { ?> selected="selected" <?php } ?> value="3">March</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '4') { ?> selected="selected" <?php } ?> value="4">April</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '5') { ?> selected="selected" <?php } ?> value="5">May</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '6') { ?> selected="selected" <?php } ?> value="6">June</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '7') { ?> selected="selected" <?php } ?> value="7">July</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '8') { ?> selected="selected" <?php } ?> value="8">August</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '9') { ?> selected="selected" <?php } ?> value="9">September</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '10') { ?> selected="selected" <?php } ?> value="10">October</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '11') { ?> selected="selected" <?php } ?> value="11">November</option>
							<option <?php if ($details[0]['education_period_month_to_3'] == '12') { ?> selected="selected" <?php } ?> value="12">December</option>

						</select> </div>

					<div class="col-md-6">To Date: <input type="text" name="education_period_year_to_3" id="education_period_year_to_3"> </div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6 ">
						Certificate Obtained: <select name="education_cert_obtained_3" data-required="true" data-live-search="true">
							<option value="">Select Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '1') { ?> selected="selected" <?php } ?> value="1">Primary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '2') { ?> selected="selected" <?php } ?> value="2">Secondary School Leaving Certificate</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '3') { ?> selected="selected" <?php } ?> value="3">Diploma Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '4') { ?> selected="selected" <?php } ?> value="4">Bachelor Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '5') { ?> selected="selected" <?php } ?> value="5">Master Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '6') { ?> selected="selected" <?php } ?> value="6">Doctorate Degree</option>
							<option <?php if ($details[0]['education_cert_obtained_3'] == '7') { ?> selected="selected" <?php } ?> value="7">Others</option>
						</select>
					</div>

					<div class="col-md-4">
						Course Studied <input name="education_course_studied_3" class="form-control" type="text" id="education_course_studied_3" placeholder="Enter Course Studied" value="<?php echo $details[0]['education_course_studied_3']; ?>" />
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-4">
						Institution Attended
						<input name="edu_institution_3" class="form-control" type="text" id="edu_institution_3" value="<?php echo $details[0]['edu_institution_1']; ?>" placeholder="Enter Institution Attended" />
					</div>
					<div class="col-md-6">
						Course Description <textarea id="education_course_description_3" name="education_course_description_3" class="form-control" cols="45" rows="5" aria-required="true" placeholder="Enter Course Description"><?php echo $details[0]['education_course_description_3']; ?></textarea>
					</div>
				</div>
				<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">

			</form>
			<?php if ($details[0]['current_work_experience_company_1'] == "") {
				echo "<a href=\"upload_work_experience\">Upload Work Experience</a>";
			} else {
				echo "<a href=\"upload_work_experience\">Update Work Experience</a>";
			}
			?>


		</div>

	</div>
</div>
</div>
</div>
</div>


<?php include_once('footer.php'); ?>