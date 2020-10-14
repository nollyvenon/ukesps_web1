<?php
require("../main_header.php");
//check if the user is logged and has an active recruiting plan. If no, redirect to the buy plan page
if (!$session_recruiter->is_logged_in()) {
	redirect_to("login");
}

if (!$recruit_object->is_active_paid($recruiter_code, "1")) {
	redirect_to("post_a_job");
}
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

		$result = $zenta_operation->add_job($job_title, $recruiter_code, $email, $phone, $location_id, $country_id, $startDate, $endDate, $category_id, $sub_category_id, $job_type, $job_level, $job_sector, $descript, $requirements, $job_company, $amount_per_period, $salary_period, $apply_info, $job_img);
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
$job_companies = $zenta_operation->get_job_companies();
$job_company = $zenta_operation->get_job_company($recruiter_code);
?>


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
					<input type="hidden" name="job_img" value="<?= $job_company[0]['company_img'] ?>">
					<div class="form-group">
						<label class="col-md-3">
							Company Name*:
							<span class="required"></span>
						</label>
						<div class="col-md-10 col-xs-11">

							<select name="job_company" id="job_company" required data-required="true" class="selectpicker" data-live-search="true">
								<option value="">Select your company</option>
								<?php
								foreach ($job_companies as $row2) :
								?>
									<option value="<?php echo $row2['company_id']; ?>">
										<?php echo $row2['company_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select>
						</div>
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
					<div class="form-group">
						<label class="col-md-4">
							Amount Per Period:
							<span class="required">*</span>
						</label>
						<div class="col-md-10 col-xs-11"><input name="amount_per_period" class="form-control" type="text" id="amount_per_period" size="30" /></div>
					</div>
					<div class="form-group">
						<label class="col-md-4">
							Salary Period:
							<span class="required">*</span>
						</label>
						<div class="col-md-10 col-xs-11"><input name="salary_period" class="form-control" type="text" id="salary_period" size="30" /></div>
					</div>
					<div class="form-group form-inline">
						<label class="col-md-4">Application Timeframe*:

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
						<label class="col-md-4">Application Info:</label>
						<div class="col-md-10 col-xs-11">

							<textarea id="apply_info" name="apply_info" style="width: 100%;" rows="10">

								</textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('apply_info', {
									filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
									"filebrowserImageUploadUrl": "ckeditor/plugins/imgupload/imgupload.php"
								});
							</script>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4">Job Requirements:</label>
						<div class="col-md-10 col-xs-11">

							<textarea id="requirements" name="requirements" style="width: 100%;" rows="10">

								</textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace('requirements', {
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
<?php include_once('../main_footer.php'); ?>
<!-- footer -->