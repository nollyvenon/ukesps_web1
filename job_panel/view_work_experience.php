<?php
require_once("../main_header.php");
if (!$session_jobseek->is_logged_in()) {
	redirect_to("login.php");
}
$details = $client_operation->applicant_detail($jobseek_code);
extract($details);

?>
<script>
	$(function() {
		$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
	});
</script>


<div class="page-content sitemap container container-fluid clear-fix">
	<div class="row">
		<div class="col-9">
			<?php include_once("../layouts/feedback_message.php"); ?>
			<h4>Upload Work Experience data</h4>
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
			<?php } else { ?>

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
		<div class="col-3">
			<?php include_once('../sidebar.php'); ?>
		</div>

	</div>



</div>

<?php include_once('../main_footer.php'); ?>