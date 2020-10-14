<?php
include_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
$rec_plan = $recruit_object->get_recruiting_cv_plans();
$_SESSION['payment_category'] = '2'; //cv search
?>

<div class="page-content sitemap container container-fluid clear-fix">


	<div class="row">
		<div class="col-8">
			<?php include_once("../layouts/feedback_message.php"); ?>
			<h4>CV Matches</h4>

			<div class="row ">
				<div class="col-md-12"><b>Looking for</b></div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6"><b>Top Sectors Applied To</b></div>

				<div class="col-md-6"><b>Skills</b></div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6"><b>Location</b></div>

				<div class="col-md-6"><b>Skills</b></div>
			</div>

			<!-- / search -->
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>