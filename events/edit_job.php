<?php
require_once("../main_header.php");
if (!$session_event_prov->is_logged_in()) {
  redirect_to("login");
}
$id_encrypted = $db_handle->sanitizePost($_GET['hiss']);
$id_encrypted = decrypt(str_replace(" ", "+", $id_encrypted));
$hiss = preg_replace("/[^A-Za-z0-9 ]/", '', $id_encrypted);
extract($zenta_operation->job_detail($hiss));

$page_title = 'Update Job';
$page_group = 'Admin';

if (isset($_POST['update_job']) && !empty($_POST['update_job'])) {
  $course_title = $db_handle->sanitizePost($_POST['course_title']);
  $study_method = $db_handle->sanitizePost($_POST['study_method']);
  $course_category = $db_handle->sanitizePost($_POST['course_category']);
  $course_subcategory = $db_handle->sanitizePost($_POST['course_subcategory']);
  $course_fee = $db_handle->sanitizePost($_POST['course_fee']);
  $qualification = $db_handle->sanitizePost($_POST['qualification']);
  $location = $db_handle->sanitizePost($_POST['location']);
  $course_overview = $db_handle->sanitizePost($_POST['course_overview']);
  $description = $db_handle->sanitizePost($_POST['description']);
  $who_is_course_for = $db_handle->sanitizePost($_POST['who_is_course_for']);
  $career_path = $db_handle->sanitizePost($_POST['career_path']);
  $uploaddir = "../img/jobs/";
  $gallery = basename($_FILES['gallery']['name']);
  $gallery1 = $uploaddir . basename($gallery);

  if (empty($course_title) || empty($location) || empty($description)) {
    $message_error = "Please fill all the fields and try again.";
  } else {
    move_uploaded_file($_FILES['gallery']['tmp_name'], $gallery1);
    $result = $zenta_operation->update_job($job_title, $event_prov_code, $email, $phone, $gallery, $job_company,  $location_id, $country_id, $startDate, $endDate, $category_id, $sub_category_id, $jobstype, $joblevel, $jobsector, $description);
    if ($result) {
      $message_success = "Job was updated successfully.";
    } else {
      $message_error = "Job was not updated successfully.";
    }
  }
}

$job_categories = $zenta_operation->get_job_categories();
$job_subcategories = $zenta_operation->get_job_sub_categories();
$locations = $zenta_operation->get_all_locations();
$countries = $zenta_operation->get_all_countries();
$job_levels = $zenta_operation->get_all_job_levels();
$job_types = $zenta_operation->get_all_job_types();
?>


<div class="page-content woocommerce">
  <div class="container clear-fix">
    <div class="grid-col-row">
      <div class="grid-col grid-col-9">
        <?php include_once("../layouts/feedback_message.php"); ?>
        <h3>Edit Job</h3>


        <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-md-4">

            </label>
            <div class="col-md-10 col-xs-11"><input name="event_prov_code" class="form-control" type="hidden" id="event_prov_code" size="30" value="<?php echo $event_provider_id; ?>" /></div>
          </div>

          <div class="form-group">
            <label class="col-md-4">
              Email:
              <span class="required">*</span>
            </label>
            <div class="col-md-10 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" value="<?php echo $email; ?>" /></div>
          </div>

          <div class="form-group">
            <label class="col-md-4">
              Phone:
              <span class="required">*</span>
            </label>
            <div class="col-md-10 col-xs-11"><input name="phone" value="<?php echo $phone; ?>" class="form-control" type="text" id="phone" size="30" /></div>
          </div>

          <div class="form-group">
            <label class="col-md-4">
              Company:
              <span class="required">*</span>
            </label>
            <div class="col-md-10 col-xs-11"><input name="job_company" value="<?php echo $job_company; ?>" class="form-control" type="text" id="job_company" /></div>
          </div>

          <div class="form-group">
            <label class="col-md-4">
              Gallery:
              <span class="required">*</span>
            </label>
            <div class="col-md-10 col-xs-11"><input type="image" name="gallery" id="gallery" class="form-control"></div>
          </div>

          <div class="form-group">
            <label class="col-md-4">Job Title:<span class="required">*</span></label>
            <div class="col-md-10 col-xs-11"><input name="job_title" value="<?php echo $job_title; ?>" required class="form-control" type="text" size="35" /></div>
          </div>

          <div class="form-group form-inline">
            <label class="col-md-4">Application Deadline*:

            </label>
            <div class="col-md-10 col-xs-11">

              <div class="col-md-12">
                Start Date: <input name="startDate" id="startDate" value="<?php echo $startDate; ?>" class="form-control" />
              </div>
              <div class="col-md-12">
                End Date: <input name="endDate" id="endDate" value="<?php echo $endDate; ?>" class="form-control" />
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
                  <option <?php if ($job_detail['jobstype'] == $row2['jobtype_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['jobtype_id']; ?>">
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
                  <option <?php if ($job_detail['joblevel'] == $row2['joblevel_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['joblevel_id']; ?>">
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
                  <option <?php if ($job_detail['job_sector'] == $row2['sector_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['sector_id']; ?>">
                    <?php echo $row2['sector_name']; ?>
                  </option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4">Job Location:
              <span class="required">*</span>
            </label>
            <div class="col-md-10 col-xs-11">

              <select name="country_id" data-required="true" class="selectpicker" data-live-search="true">
                <option value="">Select A Country</option>
                <?php
                foreach ($countries as $row2) :
                ?>
                  <option <?php if ($job_detail['country_id'] == $row2['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['country_id']; ?>">
                    <?php echo $row2['country_name']; ?>
                  </option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4">Location:</label>
            <div class="col-md-10 col-xs-11"><select name="location_id" data-required="true" class="selectpicker" data-live-search="true">
                <option value="">Select A Location</option>
                <?php
                foreach ($locations as $row2) :
                ?>
                  <option <?php if ($job_detail['location_id'] == $row2['location_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['location_id']; ?>">
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
                  <option <?php if ($job_detail['job_category'] == $row2['category_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['category_id']; ?>">
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
                  foreach ($job_subcategories as $row3) :
                  ?>
                    <option <?php if ($job_detail['job_subcategory'] == $row3['category_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['category_id']; ?>">
                      <?php echo $row3['category_name']; ?>
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

              <textarea id="descript" name="descript" rows="15" cols="40">
						<?php echo $row2['descript']; ?>
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
            <label class="col-md-2"></label>
            <div class="col-md-10 col-xs-11"><input type="submit" class="btn btn-success" name="update_job" value="Update Job" />

              <input type="reset" name="Reset" class="btn btn-danger" value="  Cancel  " />
            </div>
          </div>
        </form>

      </div>
      <?php include_once('event_sidebar.php'); ?>
    </div>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>