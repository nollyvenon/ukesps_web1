<?php
require("z_db.php");
//check if the user is logged and has an active recruiting plan. If no, redirect to the buy plan page
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
// if (!$recruit_object->is_active_paid($recruiter_code) || !$session_recruiter->is_logged_in()) {
//     redirect_to("post_a_job");
// }
if (isset($_POST['submit'])) {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = $db_handle->sanitizePost(trim($value));
	}
	extract($_POST);
	if (strlen($job_title) < 4) {
		$message_error .= "Title is compulsory";
	}

	if ($category_id == '') {
		$message_error .= "Category is compulsory";
	}

	if ($message_error == '') {

		$result = $zenta_operation->add_job($job_title, $recruiter_code, $email, $phone, $location_id, $country_id, $startDate, $endDate, $category_id, $sub_category_id, $job_type, $job_level, $job_sector, $descript);
		if ($result) {
			$message_success = "Job was added successfully.";
		} else {
			$message_error = "Job was not added successfully.";
		}
	}
}
$page_title = 'Add Job';
$job_categories = $zenta_operation->get_job_categories();
$job_subcategories = $zenta_operation->get_job_sub_categories();
$locations = $zenta_operation->get_all_locations();
$countries = $zenta_operation->get_all_countries();
$job_levels = $zenta_operation->get_all_job_levels();
$job_types = $zenta_operation->get_all_job_types();
$job_sector = $zenta_operation->get_all_job_sectors();
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../fi/flaticon.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/main2.css">

	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/styles.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!--styles -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<!--styles -->
	<script>
		function ShowSubCategories(str) {
			if (str == "") {
				document.getElementById("txtHint1").innerHTML = "";
				return;
			}

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "xadmin/getJobSubCategories.php?q=" + str, true);
			xmlhttp.send();
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
						<img src="../img/logo.png" data-at2x='img/logo@2x.png' alt>
						<h2>Add Job</h2>
					</div>

					<form action="" id="job_form" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
						<?php include_once('../layouts/feedback_message.php'); ?>
						<div class="form-group">
							<div class="col-md-10 col-xs-11"><input name="recruiter_code" class="form-control" type="hidden" id="recruiter_code" size="30" value="<?php echo $_SESSION['recruit_unique_code'] ?>" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">
								Name/Company*:
								<span class="required"></span>
							</label>
							<div class="col-md-9 col-xs-11"><input name="name" required class="form-control" type="text" id="name" size="30" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">
								Email:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
						</div>

						<div class="form-group">
							<label class="col-md-4">
								Phone:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Title:<span class="required">*</span></label>
							<div class="col-md-10 col-xs-11"><input name="job_title" required class="form-control" type="text" size="35" /></div>
						</div>

						<div class="form-group form-inline">
							<label class="col-md-4">Application Deadline*:

							</label>
							<div class="col-md-10 col-xs-11">

								<div class="col-md-12">
									Start Date: <input id="startDate" name="startDate" class="form-control" />
								</div>
								<div class="col-md-12">
									End Date: <input id="endDate" name="endDate" class="form-control" />
								</div>

								<script>
									var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
									$('#startDate').datepicker({
										uiLibrary: 'bootstrap4',
										iconsLibrary: 'fontawesome',
										minDate: today,
										maxDate: function() {
											return $('#endDate').val();
										}
									});
									$('#endDate').datepicker({
										uiLibrary: 'bootstrap4',
										iconsLibrary: 'fontawesome',
										minDate: function() {
											return $('#startDate').val();
										}
									});
								</script>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4">Job Type:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11">

								<select name="job_type" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Job Type</option>
									<?php
									foreach ($job_types as $row2) :
									?>
										<option value="<?php echo $row2['jobtype_id']; ?>">
											<?php echo $row2['jobtype_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4">Job Level:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11">

								<select name="job_level" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Level</option>
									<?php
									foreach ($job_levels as $row2) :
									?>
										<option value="<?php echo $row2['joblevel_id']; ?>">
											<?php echo $row2['joblevel_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Sector:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11">

								<select name="job_sector" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Sector</option>
									<?php
									foreach ($job_sector as $row2) :
									?>
										<option value="<?php echo $row2['sector_id']; ?>">
											<?php echo $row2['sector_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Country:
								<span class="required">*</span>
							</label>
							<div class="col-md-10 col-xs-11">

								<select name="country_id" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Country</option>
									<?php
									foreach ($countries as $row2) :
									?>
										<option value="<?php echo $row2['country_id']; ?>">
											<?php echo $row2['country_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Location:</label>
							<div class="col-md-10 col-xs-11"><select name="location_id" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Location</option>
									<?php
									foreach ($locations as $row2) :
									?>
										<option value="<?php echo $row2['location_id']; ?>">
											<?php echo $row2['location_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select></div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Category:</label>
							<div class="col-md-10 col-xs-11"><select name="category_id" onfocus="ShowSubCategories(this.value)" onchange="ShowSubCategories(this.value)" data-required="true" class="selectpicker" data-live-search="true">
									<option value="">Select A Category</option>
									<?php
									foreach ($job_categories as $row2) :
									?>
										<option value="<?php echo $row2['category_id']; ?>">
											<?php echo $row2['category_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select></div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Sub Category:</label>
							<div class="col-md-10 col-xs-11">
								<div id="txtHint1"><select name="sub_category_id" data-required="true" class="selectpicker" data-live-search="true">
										<option value="">Select A Subcategory</option>
										<?php
										foreach ($job_subcategories as $row2) :
										?>
											<option value="<?php echo $row2['subcat_id']; ?>">
												<?php echo $row2['category_name']; ?>
											</option>
										<?php
										endforeach;
										?>
									</select></div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Job Description:</label>
							<div class="col-md-10 col-xs-11">

								<textarea id="descript" name="descript" style="width: 100%;" rows="10">

								</textarea>
								<script>
									// Replace the <textarea id="editor1"> with a CKEditor
									// instance, using default configuration.
									CKEDITOR.replace('descript', {
										filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
										filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
										"filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
									});
								</script>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-2"></label>
							<div class="col-md-10 col-xs-11"><input type="submit" class="btn btn-success" name="submit" value="Post Job" />

								<input type="reset" onclick="document.getElementById('job_form').reset" name="Reset" class="btn btn-danger" value="  Cancel  " />
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</main>
	<!-- footer -->
	<?php include_once('../footer.php'); ?>
	<!-- footer -->
	<!-- scripts -->
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
	<!-- scripts -->
</body>

</html>