<?php
require_once("../main_header.php");
$study_levels = $zenta_operation->get_study_levels();
// var_dump(explode('Facebook', $pdf->Text)[1]);
// die();
if ($_POST['submit']) {

  $course_id = $db_handle->sanitizePost($_POST['course_id']);
  $application_title = $db_handle->sanitizePost($_POST['application_title']);
  $couprov_code = $db_handle->sanitizePost($_POST['couprov_code']);
  $applicant_code = $_SESSION['user_id'];
  $mode_of_study = $db_handle->sanitizePost($_POST['study_mode']);
  $study_level = $db_handle->sanitizePost($_POST['study_level']);
  $duration = $db_handle->sanitizePost($_POST['duration']);
  $universities = implode(',', $_SESSION['institution']);
  $courses = $db_handle->sanitizePost($_POST['courses']);
  $student_id = $db_handle->sanitizePost($_POST['student_id']);
  $student = $db_handle->sanitizePost($_POST['student']);
  $start_date = $db_handle->sanitizePost($_POST['start_date']);
  $dob = $_SESSION['dob'];
  if ($_POST['terms'] == '0') {
    $message_error = "Please accept the terms to continue";
  }
  if ($message_error == null) {
    $result = $clientOperation->apply_now($course_id, $application_title, $couprov_code, $applicant_code, $mode_of_study, $study_level, $duration, $universities, $courses, $student, $student_id, $start_date, $dob);
    if ($result) {
      $_SESSION['user_id'] = null;
      $message_success = "Course Application Succesfully!";
    } else {
      $message_error = "Application wasn't successful.";
    }
  }
}

?>


<!--styles -->

<div class="container">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <h4>Course Details</h4>
      <?php include_once("../layouts/feedback_message.php"); ?>
      <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-md-5 mb-3">Study Level<select name="study_levels" data-required="true" class="selectpicker" data-live-search="true">
              <option value="">Select</option>
              <?php
              foreach ($study_levels as $row2) :
              ?>
                <option value="<?php echo $row2['sl_name']; ?>">
                  <?php echo $row2['sl_name']; ?>
                </option>
              <?php
              endforeach;
              ?>
            </select></div>
          <div class="col-md-5 mb-3">Start Date<input name="start_date" class="form-control" type="date" id="start_date" value="" /></div>
          <div class="col-md-5 mb-3">expected duration of programme in Months<input name="duration" class="form-control" type="text" id="duration" value="" /></div>
          <div class="columns-row">
            <label class="col-md-9">
              &nbsp;&nbsp;&nbsp;Mode Of Study:
            </label>
            <div class="columns-row">
              <div class="columns-col columns-col-4">
                <div>
                  <!-- input radio -->
                  <div class="radio">
                    <input type="radio" id="full_tme" name="study_mode" value="Full Time" checked>
                    <label for="full_tme"></label>
                  </div>
                  <!-- / input radio -->
                  Full Time
                </div>
                <p></p>

              </div>
              <div class="columns-col columns-col-4">
                <div>
                  <!-- input radio -->
                  <div class="radio">
                    <input type="radio" id="part_time" name="study_mode" value="Part Time">
                    <label for="part_time"></label>
                  </div>
                  <!-- / input radio -->
                  Part Time
                </div>
              </div>
              <div class="columns-col columns-col-4">
                <div>
                  <!-- input radio -->
                  <div class="radio">
                    <input type="radio" id="distance" name="study_mode" value="Distance Learning">
                    <label for="distance"></label>
                  </div>
                  <!-- / input radio -->
                  Distance Learning
                </div>
              </div>
            </div>

          </div>
          <br>
          <div class="col-md-5">
            <div class="columns-row">
              <label class="col-md-9">
                &nbsp;&nbsp;&nbsp;Have you been a student at this university before?:
              </label>
              <div class="columns-row">
                <div class="columns-col columns-col-4">
                  <div>
                    <!-- input radio -->
                    <div class="radio">
                      <input type="radio" id="student_yes" name="student" value="Yes">
                      <label for="student_yes"></label>
                    </div>
                    <!-- / input radio -->
                    Yes
                  </div>
                  <p></p>
                </div>
                <div class="columns-col columns-col-4">
                  <div>
                    <!-- input radio -->
                    <div class="radio">
                      <input type="radio" id="student_no" name="student" value="No" checked>
                      <label for="student_no"></label>
                    </div>
                    <!-- / input radio -->
                    No
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-5 mb-3">If yes, please give your Student Identification Number, if known<input name="student_id" class="form-control" type="text" id="middle_name" value="" /></div>

          <div class="form-group col-md-11 mb-3">
            <label for="courses">Enter Courses you like to study in the selected universities</label>
            <textarea class="form-control" id="courses" name="courses" rows="5"></textarea>
          </div>
        </div>
        <div class="disclaimer-section">
          I confirm that the information I have given in this form is true, complete and accurate and no information requested or other material information has been omitted. I acknowledge that the information on this form will be used in accordance with the Data Protection Act 1988 and will be used to form the basis of my student record. I give my consent to the processing of my data by the university. I accept that, if I do not fully comply with these requirements, the university shall have the right to cancel my application and I shall have no claim against the university in relation thereto.
        </div>

        <div class="py-5 text-center">
          <h5> I agree to the terms and conditions above</h5>
        </div>
        <div class="text-center mb-3">
          <div class="columns-row">
            <div class="columns-col columns-col-2">
              <div>
                <!-- input radio -->
                <div class="radio">
                  <input type="radio" id="consent_yes" name="terms" value="1" required checked>
                  <label for="consent_yes"></label>
                </div>
                <!-- / input radio -->
                Yes
              </div>
              <p></p>

            </div>
            <div class="columns-col columns-col-2">
              <div>
                <!-- input radio -->
                <div class="radio">
                  <input type="radio" id="consent_no" name="terms" value="0">
                  <label for="consent_no"></label>
                </div>
                <!-- / input radio -->
                No
              </div>
            </div>
          </div>
        </div>
        <div> <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Apply"></div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../main_footer.php'); ?>