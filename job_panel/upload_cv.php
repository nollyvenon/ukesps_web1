<?php
require_once("z_db.php");
if (!$session_jobseek->is_logged_in()) {
	redirect_to("login");
}
$details = $jobsk_operation->applicant_detail($jobseek_code);
extract($details);
if ($_POST['submit']) {

	if (isset($_FILES)) {

		if ($_FILES["resume"]["name"] != NULL) {
			$allowedExts = array("pdf");
			$temp = explode(".", $_FILES["resume"]["name"]);
			$details["serial_number"] = substr(sha1(time()), 0, 7);
			$resume = $jobseek_code . $details['serial_number'] . '.' . end($temp);
			$extension = end($temp);
			switch ($_FILES['resume']['error']) {
				case UPLOAD_ERR_OK:
					break;
				case UPLOAD_ERR_NO_FILE:
					$message_error .= "Resume upload wasn't successful.</br>";
				default:
					$message_error .= "Resume upload wasn't successful.</br>";
			}
			// You should also check filesize here. 
			if ($_FILES['resume']['size'] > 8107795) {
				$message_error .= "Resume file too large";
			}

			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $ext = array_search(
				$finfo->file($_FILES['resume']['tmp_name']),
				array(
					'pdf' => 'application/pdf',
					'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
				),
				true
			)) {
				$message_error .= "Please upload a valid pdf file for resume.</br>";
				$resume = NULL;
			} else {
				if (end($temp) != "pdf") {
					$file =	move_uploaded_file($_FILES["resume"]["tmp_name"], SITE_ROOT . "/job_panel/docsxxx/" . $resume);
				} else {
					$pdf 	=  new PdfToText($_FILES["resume"]["tmp_name"]);
					$file =	move_uploaded_file($_FILES["resume"]["tmp_name"], SITE_ROOT . "/job_panel/docsxxx/" . $resume);
				}
			}
		}
		if ($_FILES["cover_letter"]["name"] != NULL) {
			$allowedExts = array("pdf");
			$temp = explode(".", $_FILES["cover_letter"]["name"]);
			$details["serial_number"] = substr(sha1(time()), 0, 7);
			$cover_letter = $jobseek_code . $details['serial_number'] . '2.' . end($temp);
			$extension = end($temp);
			switch ($_FILES['cover_letter']['error']) {
				case UPLOAD_ERR_OK:
					break;
				case UPLOAD_ERR_NO_FILE:
					$message_error .= "cover_letter upload wasn't successful.</br>";
				default:
					$message_error .= "cover_letter upload wasn't successful.</br>";
			}
			// You should also check filesize here. 
			if ($_FILES['cover_letter']['size'] > 8107795) {
				$message_error .= "cover_letter file too large";
			}

			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $ext = array_search(
				$finfo->file($_FILES['cover_letter']['tmp_name']),
				array(
					'pdf' => 'application/pdf',
					'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
					'doc' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

				),
				true
			)) {
				$message_error .= "Please upload a valid document file for cover letter.</br>";
			} else {
				$file =	move_uploaded_file($_FILES["cover_letter"]["tmp_name"], SITE_ROOT . "/job_panel/docsxxx/" . $cover_letter);
			}
		}
	}


	// $uploaddir = "../img/cover_letters/";
	// $cover_letter = basename($_FILES['cover_letter']['name']);
	// $cover_letter1 = $uploaddir . basename($cover_letter);
	// move_uploaded_file($_FILES['cover_letter']['tmp_name'], $cover_letter1);

	// $uploaddir = "../img/resumes/";
	// $cover_letter = basename($_FILES['resume']['name']);
	// $resume1 = $uploaddir . basename($resume);
	// move_uploaded_file($_FILES['resume']['tmp_name'], $resume1);

	$biodata = $jobsk_operation->upload_cv($jobseek_code, $resume, $cover_letter);
	if ($biodata) {
		$message_success = "Upload was successful. Please check to confirm your details";
		redirect_to('upload_biodata');
	} else {
		$message_error .= "Upload wasn't successful please check the file.</br>";
	}
}
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
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/styles.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	<!--styles -->
</head>

<body class="">
	<!-- header -->
	<!-- header -->
	<?php include_once('header2.php'); ?>
	<!-- / header -->


	<!-- / header -->
	<div class="page-content container clear-fix">

		<div class="row">
			<div class="col-md-3 sidebar">
				<!-- widget search -->

				<!-- widget categories -->
				<aside class="widget-categories" style="border:1px solid red; border-radius:5px; padding:10px">
					<h2>Navigations</h2>
					<hr class="divider-big" />
					<ul>
						<li class="cat-item cat-item-1 current-cat">
							<a href="index">My Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="upload_cv">Upload CV <span></span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="upload_biodata">Update Profile<span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="applications">VIEW Application STATUS <span> </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="last_view_jobs">Last viewed Jobs<span> (14) </span></a></li>
						<li class="cat-item cat-item-1 current-cat">
							<a href="job_prefs">My job Preference <span></span></a></li>

						<li class="cat-item cat-item-1 current-cat">
							<a href="past_applied_jobs">VIEW Past Applied Jobs<span> (11) </span></a></li>
						<!-- <li class="cat-item cat-item-1 current-cat">
                        <a href="#">Settings <span> </span></a></li> -->
					</ul>
				</aside>
			</div>
			<div class="col-md-8">

				<main>
					<section class="clear-fix">
						<h2>Upload your CV</h2>
						<hr>
						<div class="grid-col-row">
							<div class="grid-col grid-col-11">
								<div class="row">
									<?php include_once("../layouts/feedback_message.php"); ?>
									<div class="col-md-12">
										<h5>Dear <?= $first_name . ' ' . $last_name; ?></h5>
									</div>
									<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
										<div class="row mb-3">
											<div class="col-md-5">Resume <input type="file" name="resume" id="resume" class="form-control">
												<small>upload in pdf format</small>
												<a href="docsxxx/<?= $details[0]['resume']; ?>">Your current CV</a>
											</div>
											<div class="col-md-5 col-lg-5" style="margin-top: 20px; margin-bottom: 20px;">
												<h4>You can download our sample resume here and edit.</h4>
												<a href="docsxxx/sample.docx">Download Sample here</a>
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-md-8">Cover Letter <input type="file" name="cover_letter" id="cover_letter" class="form-control">
												<a href="docsxxx/<?= $details[0]['cover_letter']; ?>">Your current cover Letter</a></div>
										</div>
										<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">

									</form>
								</div>
								<hr>
								<!-- <div class="grid-col-row">
									<div class="grid-col grid-col-12">
										<p>Don't have a resume? Fill this form below and get your resume designed to suit the job you're applying for</p>
										<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
											<?php require_once '../layouts/feedback_message.php'; ?>
											<div class="row mb-20">
												<div class="col-md-12">
													<label for="full_name" class="control-label">Full Name</label>
													<input type="text" class="form-control" id="full_name" name="full_name" value="">
												</div>
											</div>
											<div class="row mb-20">
												<div class="col-md-12">
													<label for=" address" class="control-label">Address</label>
													<input type="text" class="form-control" id="address" name="address" value="">
												</div>
												<div class="col-md-12">
													<label for="plan_discount" class="control-label">Email</label>
													<div class='input-group'>
														<input id="plan_discount" name="plan_discount" type='text' class="form-control" value="" />
														</span>
													</div>
												</div>
												<div class="col-md-12">
													<label for="phone" class="control-label">Phone</label>
													<div class='input-group'>
														<input id="phone" name="phone" type='text' class="form-control" value="" />
														</span>
													</div>
												</div>
												<div class="col-md-12 col-lg-12">
													<div class="form-group">
														<label for="career_objectives" class="control-label">Career Objectives</label>
														<textarea id="career_objectives" class="form-control" name="career_objectives" rows="5"></textarea>
													</div>
												</div>
											</div>
											<div class="row mb-20">
											</div>

											<div class="row m-t-30">
												<div class="col-md-12">
													<input name="generate_cv" type="submit" class="cws-button border-radius bt-color-3 alt" value="Submit">
												</div>
											</div>
										</form>
									</div>
								</div> -->
							</div>
						</div>
					</section>
				</main>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>

	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>

</html>