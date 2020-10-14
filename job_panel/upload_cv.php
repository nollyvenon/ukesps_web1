<?php
require_once("../main_header.php");
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
					'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
					'doc' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
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
					$previous_work_experience_company_1 = explode("Work Experience", $pdf) != null ? substr(explode("Work Experience", $pdf)[1], 0, 60) : substr(explode("work experience", strtolower($pdf))[1], 0, 60);

					$edu_institution_1 = explode("Education", $pdf) != NULL ? substr(explode("Education", $pdf)[1], 0, 60) : substr(explode("education", strtolower($pdf))[1], 0, 60);
					$languages = explode("Languages", $pdf) != NULL ? substr(explode("Languages", $pdf)[1], 3, 30) : substr(explode("language", strtolower($pdf))[1], 3, 30);
					$linkedin_profile =	explode("LinkedIn", $pdf) != NULL ? substr(explode("LinkedIn", $pdf)[1], 0, 60) :	substr(explode("linkedin", strtolower($pdf))[1], 0, 60);
					$twitter_profile = explode("Twitter", $pdf) != NULL ? substr(explode("Twitter", $pdf)[1], 0, 60) : substr(explode("twitter", strtolower($pdf))[1], 0, 60);
					$hobbies = explode("Hobbies", $pdf) != NULL ? substr(explode("Hobbies", $pdf)[1], 0, 100) :	substr(explode("hobbies", strtolower($pdf))[1], 0, 100);
					$skills = explode("Skills", $pdf) != NULL ? substr(explode("Skills", $pdf)[1], 0, 100) :	substr(explode("skills", strtolower($pdf))[1], 0, 100);
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


	$biodata = $jobsk_operation->upload_cv($jobseek_code, $resume, $cover_letter);
	$jobsk_operation->upload_new_cv($jobseek_code, $resume);
	$cv_bio = $jobsk_operation->generate_bio($jobseek_code, $previous_work_experience_company_1, $edu_institution_1, $languages, $linkedin_profile, $twitter_profile, $hobbies, $skills);
	if ($biodata) {
		$message_success = "Upload was successful. Please check to confirm your details";
		redirect_to('upload_biodata');
	} else {
		$message_error .= "Upload wasn't successful please check the file.</br>";
	}
}
?>
<!-- / header -->
<!-- / header -->
<div class="page-content container clear-fix">

	<div class="row">
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
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php include('./jobpanel_sidebar.php') ?>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>