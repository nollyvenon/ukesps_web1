<?php
require_once("../main_header.php");
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$ssid = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
$details = $recruit_object->applicant_detail($ssid);
extract($details);

?>


<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<?php include_once("../layouts/feedback_message.php"); ?>
				<div class="jumbotron text-center">
					<h3>Applicant Detail</h3>
					<p>Applicant Name: <?php echo $first_name . ' ' . $last_name; ?></p>
				</div>
				<div class="container">
					<div class="col-sm-4">
						Applicant Code
					</div>
					<div class="col-sm-8">
						<?= $applicant_code; ?>
					</div>
					<div class="col-sm-4">
						Resume
					</div>
					<div class="col-sm-8">
						<?= $resume; ?>
					</div>
					<div class="col-sm-4">
						Cover Letter
					</div>
					<div class="col-sm-8">
						<?= $cover_letter; ?>
					</div>
					<div class="col-sm-4">
						Place of Birth
					</div>
					<div class="col-sm-8">
						<?= $place_of_birth; ?>
					</div>
					<div class="col-sm-4">
						Country of Residence
					</div>
					<div class="col-sm-8">
						<?= $country_of_residence; ?>
					</div>
					<div class="col-sm-4">
						Nationality
					</div>
					<div class="col-sm-8">
						<?= $country_of_nationality; ?>
					</div>
					<div class="col-sm-8">
						Languages
					</div>
					<div class="col-sm-8">
						<?= $languages; ?>
					</div>
					<div class="col-sm-4">
						Linkedin Profile
					</div>
					<div class="col-sm-8">
						<?= $linkedin_profile; ?>
					</div>
					<div class="col-sm-4">
						Twitter ID
					</div>
					<div class="col-sm-8">
						<?= $twitter_profile; ?>
					</div>
					<div class="col-sm-4">
						Hobbies
					</div>
					<div class="col-sm-8">
						<?= $hobbies; ?>
					</div>
					<div class="col-sm-4">
						Skills
					</div>
					<div class="col-sm-8">
						<?= $skills; ?>
					</div>
					<div class="col-sm-4">
						Institutions Attended with Dates
					</div>
					<div class="col-sm-8">
						<div class="col-sm-12"><?= $education_period_month_from_1 . ' ' . $education_period_year_from_1 . ' - ' . $education_period_month_to_1 . ' ' . $education_period_year_from_1; ?></div>
						<div class="col-sm-12"><?= $education_cert_obtained_1; ?></div>
						<div class="col-sm-12"><?= $education_course_studied_1 . ', ' . $edu_institution_1; ?></div>
						<div class="col-sm-12"><?= $education_course_description_1; ?></div>
					</div>
					<div class="col-sm-8">
						<div class="col-sm-12"><?= $education_period_month_from_2 . ' ' . $education_period_year_from_2 . ' - ' . $education_period_month_to_2 . ' ' . $education_period_year_from_2; ?></div>
						<div class="col-sm-12"><?= $education_cert_obtained_2; ?></div>
						<div class="col-sm-12"><?= $education_course_studied_2 . ', ' . $edu_institution_2; ?></div>
						<div class="col-sm-12"><?= $education_course_description_2; ?></div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-12"><?= $education_period_month_from_3 . ' ' . $education_period_year_from_3 . ' - ' . $education_period_month_to_3 . ' ' . $education_period_year_from_3; ?></div>
						<div class="col-sm-12"><?= $education_cert_obtained_3; ?></div>
						<div class="col-sm-12"><?= $education_course_studied_3 . ', ' . $edu_institution_3; ?></div>
						<div class="col-sm-12"><?= $education_course_description_3; ?></div>
					</div>
					<?php if ($current_work_experience_month_from_1 != "") { ?>
						<div class="col-sm-12">
							<H4>Current Work Experience</H4>
						</div>
						<div class="col-sm-8">
							<div class="col-sm-12"><?= $current_work_experience_month_from_1 . ' ' . $current_work_experience_year_from_1 . ' - ' . $current_work_experience_month_to_1 . ' ' . $current_work_experience_year_to_1; ?></div>
							<div class="col-sm-12"><?= $current_work_experience_position_1; ?></div>
							<div class="col-sm-12"><?= $current_work_experience_company_1; ?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $current_work_experience_duties_1; ?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $current_work_experience_highlights_1; ?>
							</div>
						</div>
					<?php } ?>
					<?php if ($previous_work_experience_month_from_1 != "") { ?>
						<div class="col-sm-12">
							<H4>Previous Work Experience</H4>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-12"><?= $previous_work_experience_month_from_1 . ' ' . $previous_work_experience_year_from_1 . ' - ' . $current_work_experience_month_to_1 . ' ' . $previous_work_experience_year_to_1; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_1; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_1; ?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_1; ?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_1; ?>
							</div>
						</div>
					<?php }

					if ($previous_work_experience_month_from_2 != "") { ?>
						<div class="col-sm-12">
							<div class="col-sm-12"><?= $previous_work_experience_month_from_2 . ' ' . $previous_work_experience_year_from_2 . ' - ' . $current_work_experience_month_to_2 . ' ' . $previous_work_experience_year_to_2; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_2; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_2; ?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_2; ?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_2; ?>
							</div>
						</div>
					<?php }

					if ($previous_work_experience_month_from_3 != "") { ?>
						<div class="col-sm-12">
							<div class="col-sm-12"><?= $previous_work_experience_month_from_3 . ' ' . $previous_work_experience_year_from_3 . ' - ' . $current_work_experience_month_to_3 . ' ' . $previous_work_experience_year_to_3; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_position_3; ?></div>
							<div class="col-sm-12"><?= $previous_work_experience_company_3; ?></div>
							<div class="col-sm-12">
								<h6>WORK DUTIES</h6>
								<?= $previous_work_experience_duties_3; ?>
							</div>
							<div class="col-sm-12">
								<h6>HIGHLIGHTS</h6>
								<?= $previous_work_experience_highlights_3; ?>
							</div>
						</div>
					<?php } ?>



				</div>

			</div>
			<?php include_once('recru_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>