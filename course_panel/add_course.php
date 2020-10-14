<?php
require("../main_header.php");
//check if the user is logged and has an active recruiting plan. If no, redirect to the buy plan page

// if (!$session_course_prov->is_logged_in() || !$course_prov_object->is_provider_plan_valid($course_prov_code)) {
// 	redirect_to("post_a_course");
// }
if (isset($_POST['add_course']) && !empty($_POST['add_course'])) {

	$course_title = $db_handle->sanitizePost($_POST['course_title']);
	$study_method = $db_handle->sanitizePost($_POST['study_method']);
	$study_level = $db_handle->sanitizePost($_POST['study_level']);
	$course_category = $db_handle->sanitizePost($_POST['category_id']);
	$course_subcategory = $db_handle->sanitizePost($_POST['sub_category_id']);
	$duration = $db_handle->sanitizePost($_POST['duration']);
	$course_fee = $db_handle->sanitizePost($_POST['course_fee']);
	$fee_period = $db_handle->sanitizePost($_POST['fee_period']);
	$course_currency = $db_handle->sanitizePost($_POST['course_currency']);
	$course_institute = $db_handle->sanitizePost($_POST['course_institute']);
	$course_type = $db_handle->sanitizePost($_POST['course_type']);
	$entry_requirements = $db_handle->sanitizePost($_POST['entry_requirements']);
	$location = $db_handle->sanitizePost($_POST['location']);
	$country = $db_handle->sanitizePost($_POST['country_id']);
	$course_overview = $db_handle->sanitizePost($_POST['course_overview']);
	$course_outline = $db_handle->sanitizePost($_POST['course_outline']);
	$description = $db_handle->sanitizePost($_POST['description']);
	$apply_info = $db_handle->sanitizePost($_POST['apply_info']);
	$who_is_course_for = $db_handle->sanitizePost($_POST['who_is_course_for']);
	$career_path = $db_handle->sanitizePost($_POST['career_path']);
	$uploaddir = "../img/courses/";
	$gallery = basename($_FILES['gallery']['name']);
	$gallery1 = $uploaddir . basename($gallery);



	if (empty($course_title) || empty($location) || empty($description)) {
		$message_error = "Please fill all the fields and try again.";
	} else {
		move_uploaded_file($_FILES['gallery']['tmp_name'], $gallery1);
		$result = $zenta_operation->add_course($course_title, $gallery, $study_method, $course_category, $course_subcategory, $course_fee, $fee_period, $course_currency, $course_institute, $course_type, $duration, $entry_requirements, $location, $course_overview, $description, $apply_info, $who_is_course_for, $career_path, $course_prov_code, $country, $course_outline, $study_level);
		if ($result) {
			$message_success = "Course was added successfully.";
		} else {
			$message_error = "Course was not added successfully.";
		}
	}
}
$study_methods = $zenta_operation->get_study_methods();
$study_levels = $zenta_operation->get_study_levels();
$countries = $zenta_operation->get_all_countries();
$course_locations = $zenta_operation->get_all_course_locations();
$course_categories = $zenta_operation->get_course_categories();
$course_subcategories = $zenta_operation->get_course_sub_categories();
$course_types = $zenta_operation->get_course_types();
$course_institutions = $zenta_operation->manage_institutions();
$course_currencies = $zenta_operation->get_all_currencies();
?>



<div class="page-content woocommerce">
	<div class="container clear-fix">
		<div class="grid-col-row">
			<div class="grid-col grid-col-8">
				<h3>Add Course</h3>

				<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
					<?php require_once '../layouts/feedback_message.php'; ?>
					<div class="row m-b-20">
						<div class="col-md-8">
							<label for="user_code" class="control-label">Title</label>
							<input type="text" class="form-control" id="course_title" name="course_title" value="<?php echo $course_title; ?>">
						</div>
					</div>
					<div class="row m-b-20">
						<div class="form-group col-md-5">
							<label for="user_code" class="control-label">Course Image</label>
							<input name="gallery" class="form-control" type="file" id="gallery" size="30" />
						</div>

						<div class="col-md-5">
							<label for="event_author" class="control-label">Course Duration</label>
							<input type="text" class="form-control" id="duration" name="duration" value="<?php echo $duration; ?>">
						</div>


						<div class="col-md-5">
							<label for="course_fee" class="control-label">Course Fee</label>
							<div class='input-group'>
								<input id="course_fee" name="course_fee" type='text' class="form-control" />
								</span>
							</div>
						</div>
						<div class="col-md-5">
							<label for="event_author" class="control-label">Fee Duration (In months)</label>
							<input type="number" class="form-control" id="fee_period" name="fee_period" value="<?php echo $fee_period; ?>">
							` </div>

						<div class="col-md-5">
							<label for="location" class="control-label">Course Location</label>
							<div class='input-group'>
								<select name="location" data-required="true" class="form-control" data-live-search="true">
									<option value="">Select A Location</option>
									<?php
									foreach ($course_locations as $row2) :
									?>
										<option value="<?php echo $row2['location_id']; ?>">
											<?php echo $row2['location_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select>
							</div>
						</div>

					</div>
					<div class="row m-b-20">
						<div class="col-md-6">
							<label class="control-label">Course Category:</label>
							<select name="category_id" data-required="true" onfocus="ShowPageLoc(this.value)" onchange="ShowPageLoc(this.value)" class="form-control" data-live-search="true">
								<option value="">Select A Category</option>
								<?php
								foreach ($course_categories as $row2) :
								?>
									<option value="<?php echo $row2['category_id']; ?>">
										<?php echo $row2['category_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>

						<div class="col-md-6">
							<label class="control-label">Course Sub Category:</label>
							<div id="txtHint1">
								<select name="sub_category_id" data-required="true" class="form-control" data-live-search="true">
									<option value="">Select A Subcategory</option>
									<?php
									foreach ($course_subcategories as $row3) :
									?>
										<option value="<?php echo $row3['subcat_id']; ?>">
											<?php echo $row3['category_name']; ?>
										</option>
									<?php
									endforeach;
									?>
								</select></div>
						</div>
					</div>
					<div class="row m-b-20">
						<div class="col-md-6">
							<label class="control-label">Course Type:</label>
							<select name="course_type" data-required="true" required class="form-control" data-live-search="true">
								<option value="">Select A Course Type</option>
								<?php
								foreach ($course_types as $row2) :
								?>
									<option value="<?php echo $row2['type_id']; ?>">
										<?php echo $row2['type_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="study_method" class="control-label">Study Method</label><br>
							<select name="study_method" data-required="true" class="form-control" data-live-search="true">
								<option value="">Select A Method</option>
								<?php
								foreach ($study_methods as $row4) :
								?>
									<option value="<?php echo $row4['csm_id']; ?>">
										<?php echo $row4['cs_method']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>

						<div class="col-md-6">
							<label for="study_level" class="control-label">Study Level</label><br>
							<select name="study_level" required data-required="true" class="form-control" data-live-search="true">
								<option value="">Select A Level</option>
								<?php
								foreach ($study_levels as $row2) :
								?>
									<option value="<?php echo $row2['sl_id']; ?>">
										<?php echo $row2['sl_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>

						<div class="col-md-6">
							<label for="course_institute" class="control-label">Course Institute</label><br>
							<select name="course_institute" required data-required="true" class="form-control" data-live-search="true">
								<option value="">Select an Institute</option>
								<?php
								foreach ($course_institutions as $row44) :
								?>
									<option value="<?php echo $row44['institute_id']; ?>">
										<?php echo $row44['institute_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="course_currency" class="control-label">Currency</label><br>
							<select name="course_currency" required data-required="true" class="form-control" data-live-search="true">
								<option value="">Select a Currency</option>
								<?php
								foreach ($course_currencies as $row44) :
								?>
									<option value="<?php echo $row44['currency_code']; ?>">
										<?php echo $row44['currency_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>

						<div class="col-md-6">
							<label for="country_id" class="control-label">Country</label><br>
							<select name="country_id" required data-required="true" class="form-control" data-live-search="true">
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
					<div class="row m-b-20">

						<div class="col-md-6">
							<label for="entry_requirements" class="control-label">Qualification</label>
							<textarea id="entry_requirements" name="entry_requirements" rows="5" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('entry_requirements', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>

						<div class="col-md-6">
							<label for="who_is_course_for" class="control-label">Who is the Course For?</label>
							<textarea id="who_is_course_for" name="who_is_course_for" rows="5" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('who_is_course_for', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-6">
							<label for="career_path" class="control-label">Career Path</label>
							<textarea id="career_path" name="career_path" rows="5" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('career_path', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-6">
							<label for="course_overview" class="control-label">Course Overview</label>
							<textarea id="course_overview" name="course_overview" rows="5" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('course_overview', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-12">
							<label for="description" class="control-label">Description</label>
							<textarea id="description" name="description" rows="15" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('description', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-12">
							<label for="course_outline" class="control-label">Course Outline</label>
							<textarea id="course_outline" name="course_outline" rows="15" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('course_outline', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
						<div class="col-md-12">
							<label for="apply_info" class="control-label">Application Info/Link(s)</label>
							<textarea id="apply_info" name="apply_info" rows="15" cols="40"></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('apply_info', {
									filebrowserBrowseUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: '<?= SITE_URL ?>/xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "<?= SITE_URL ?>/xadmin/ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>


					</div>
					<div class="row m-t-30">
						<div class="col-md-12">
							<input name="add_course" type="submit" class="cws-button bt-color-3 border-radius" value="Add Course">
							<button type="reset" class="cws-button bt-color-3 border-radius alt icon-right">Reset <i class="fa fa-angle-right"></i></button>
						</div>
					</div>
				</form>

			</div>
			<?php include_once('cour_sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include_once('../main_footer.php'); ?>