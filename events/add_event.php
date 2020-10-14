<?php
require("../main_header.php");
//check if the user is logged and has an active recruiting plan. If no, redirect to the buy plan page
if (!$session_event_prov->is_logged_in()) {
	redirect_to("login");
}
if (!$event_prov_object->is_provider_plan_valid($event_prov_code)) {
	redirect_to("post_event");
}

$event_title = "";
$event_author = "";
$event_type = "";
$location = "";
$summary = "";
$content = "";
if (isset($_POST['add_event'])) {
	$event_title = $db_handle->sanitizePost($_POST['event_title']);
	$event_author = $db_handle->sanitizePost($_POST['event_author']);
	$event_type = $db_handle->sanitizePost($_POST['event_type']);
	$startDate = date('Y-m-d', strtotime($_POST['eventStartDate']));
	$startTime = date('H:i:s', strtotime($_POST['eventStartDate']));
	$endDate = date('Y-m-d', strtotime($_POST['eventEndDate']));
	$endTime = date('H:i:s', strtotime($_POST['eventEndDate']));
	$location = $db_handle->sanitizePost($_POST['location']);
	$summary = $db_handle->sanitizePost($_POST['summary']);
	$content = $db_handle->sanitizePost($_POST['content']);
	$uploaddir = "../img/events/";
	$gallery = basename($_FILES['gallery']['name']);
	$gallery1 = $uploaddir . basename($gallery);

	if (empty($event_title) || empty($location) || empty($content)) {
		$message_error = "Please fill all the fields and try again.";
	} else {
		move_uploaded_file($_FILES['gallery']['tmp_name'], $gallery1);
		$result = $zenta_operation->add_event($event_title, '1', $gallery, $event_author, $startDate, $endDate, $startTime, $endTime, $location, $summary, $content);

		if ($result) {
			$message_success = "Event was added successfully.";
		} else {
			$message_error = "Event was not added successfully.";
		}
	}
}
?>

<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-8">
				<h3>Add Events</h3>

				<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
					<?php require_once '../layouts/feedback_message.php'; ?>
					<div class="row m-b-20">
						<div class="form-group col-md-12">
							<label for="user_code" class="control-label">Title</label>
							<input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo $event_title; ?>">
						</div>
					</div>
					<div class="row m-b-20">
						<div class="form-group col-md-12">
							<label for="event_author" class="control-label">Author</label>
							<input type="text" class="form-control" id="event_author" name="event_author" value="<?php echo $event_author; ?>">
						</div>
					</div>
					<div class="row m-b-20">
						<div class="form-group col-md-12">
							<label for="event_type" class="control-label">Event Type</label>
							<select name="event_type" required data-required="true" class="form-control selectpicker" data-live-search="true">
								<option value="">Select A Type</option>
								<option value="1">Free</option>
								<option value="2">Paid</option>
							</select>
						</div>
					</div>
					<br><br>
					<label for="payment_method" class=" text-center control-label">Event Date</label>
					<div class="row m-b-20">
						<div class="col-md-6">
							<label for="eventStartDate" class="control-label">Start Date</label>
							<input id="eventStartDate" name="eventStartDate" type="text" class="form-control">
						</div>
						<div class="col-md-5">
							<label for="eventEndDate" class="control-label">End Date</label>
							<input id="eventEndDate" name="eventEndDate" type="text" class="form-control">
						</div>
						<script>
							jQuery('#eventStartDate').datetimepicker({
								format: 'Y-m-d H:i',
								lang: 'en'
							});
							jQuery('#eventEndDate').datetimepicker({
								format: 'Y-m-d H:i',
								lang: 'en'
							});
						</script>
					</div>
					<br><br>
					<div class="row m-b-20">
						<div class="col-md-6">
							<label for="location" class="control-label">Events Location</label>
							<div class='input-group'>
								<input id="location" name="location" type='text' class="form-control" />
								</span>
							</div>
						</div>
						<div class="col-md-5">
							<label for="gallery" class="control-label">Event Image</label>
							<input name="gallery" class="btn btn-info" type="file" id="gallery" size="30" />
						</div>
						<div class="col-md-12">
							<label for="summary" class="control-label">Events Summary</label>
							<textarea id="summary" name="summary" rows="5" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('summary', {
									filebrowserBrowseUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-12">
							<label for="content" class="control-label">Description</label>
							<textarea id="content" name="content" rows="15" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('content', {
									filebrowserBrowseUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
					</div>
					<div class="row m-t-30">
						<div class="col-md-12">
							<!-- <button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button> -->
							<button type="submit" id="add_event" name="add_event" class="cws-button bt-color-3 border-radius alt icon-right">Add Event <i class="fa fa-angle-right"></i></button>
						</div>
					</div>
				</form>
			</div>
			<?php include('./event_sidebar.php') ?>
		</div>
	</div>
</div>
</div>
<?php include_once('../main_footer.php'); ?>