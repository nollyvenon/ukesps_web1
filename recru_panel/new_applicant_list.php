<?php
include_once("../main_header.php");
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}
if ($_POST['submit']) {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = $db_handle->sanitizePost(trim($value));
	}
	extract($_POST);
	$result = $recruit_object->add_applicant_list($list_name, $list_description, $recruiter_code);
	if ($result) {
		$message_success = "List was added successfully.";
	} else {
		$message_error = "List was not added successfully.";
	}
}
?>

<div class="page-content sitemap container container-fluid clear-fix">

	<div class="col-12">
		<h4>Create New List</h4>
		<?php include_once("../layouts/feedback_message.php"); ?>

		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="list_name" class="col-sm-2 col-form-label">List Name</label>
				<div class="col-sm-4">
					<input type="text" readonly class="form-control-plaintext" id="list_name" name="list_name" value="" placeholder="Enter List Name">
				</div>
			</div>
			<div class="form-group row">
				<label for="list_description" class="col-sm-2 col-form-label">List Description</label>
				<div class="col-sm-4">
					<input type="text" readonly class="form-control-plaintext" id="list_description" name="list_description" value="" placeholder="Enter List Description">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<input id="submit" class="cws-button bt-color-2 border-radius" name="submit" type="submit">
					<input type="reset">
				</div>
			</div>
		</form>


	</div>


</div>
<?php include_once('../main_footer.php'); ?>