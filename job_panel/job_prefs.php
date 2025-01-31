<?php
include("../main_header.php");

if ($_POST['submit']) {
	$job_category = $_POST['job_category'];
	$sub_category_id = $_POST['sub_category_id'];

	$biodata = $client_operation->set_job_prefs($jobseek_code, $job_category, $sub_category_id);

	if ($biodata) {
		$message_success = "Job preference set successfully.";
	} else {
		$message_error = "Process wasn't successful.";
	}
}
$job_categories = $zenta_operation->get_job_categories();
$job_subcategories  = $zenta_operation->get_job_sub_categories();
?>
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
		xmlhttp.open("GET", "../xadmin/getJobSubCategories.php?q=" + str, true);
		xmlhttp.send();
	}
</script>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div id="content" role="main">
					<?php include_once("../layouts/feedback_message.php"); ?>
					<h4>Set your Job Preferences</h4>
					<?php include_once("../layouts/feedback_message.php"); ?>
					<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">

						<div class="row mb-3" style="padding:10px	">
							<div class="col-md-5">Job Category <select name="job_category" onfocus="ShowSubCategories(value)" onchange="ShowSubCategories(value)" data-required="true" class="selectpicker" data-live-search="true">
									<option selected disabled value="">Select A Category..</option>
									<?php
									foreach ($job_categories as $row2) :
									?>
										<option <?php if ($row2['category_id'] == $job_category_preference) { ?> selected="selected" <?php } ?> value="<?php echo $row2['category_id']; ?>">
											<?php echo $row2['category_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select></div>

							<div class="col-5">Job Sub category <div id="txtHint1"><select id="subcat" name="sub_category_id" data-required="true" class="selectpicker" data-live-search="true">
										<option value="" selected disabled>Select A Subcategory</option>
										<?php
										foreach ($job_subcategories as $row2) :
										?>
											<option <?php if ($row2['subcat_id'] == $job_subcategory_preference) { ?> selected="selected" <?php } ?> value="<?php echo $row2['subcat_id']; ?>">
												<?php echo $row2['category_name']; ?>
											</option>
										<?php
										endforeach;
										?>
									</select></div>
							</div>
						</div>

						<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">

					</form>
				</div>
			</div>
			<?php include('./jobpanel_sidebar.php') ?>
		</div>
	</div>
</div>

<?php include_once('../main_footer.php'); ?>