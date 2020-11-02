<?php
require_once("../main_header.php");

// var_dump(explode('Facebook', $pdf->Text)[1]);
// die();
if ($_POST['submit']) {

  $place_of_birth = $_POST['place_of_birth'];
  $location = $_POST['location'];
  $country_of_residence = $_POST['country_of_residence'];
  $country_of_nationality = $_POST['country_of_nationality'];
  $languages = $_POST['languages'];
  $linkedin_profile   = $_POST['linkedin_profile'];
  $twitter_profile = $_POST['twitter_profile'];
  $hobbies = $_POST['hobbies'];
  $skills = $_POST['skills'];
  $resume = ['resume'];
  $cover_letter = ['cover_letter'];

  if (isset($_FILES)) {

    if ($_FILES["resume"]["name"] != NULL) {
      $allowedExts = array("pdf");
      $temp = explode(".", $_FILES["resume"]["name"]);
      $details["serial_number"] = substr(sha1(time()), 0, 7);
      $resume = $jobseek_code . $details['serial_number'] . '.' . end($temp);
      $extension = end($temp);
      switch ($_FILES['resume']['error']) {
        case UPLOAD_ERR_OK:
          break;
        case UPLOAD_ERR_NO_FILE:
          $message_error = "Resume upload wasn't successful.";
        default:
          $message_error = "Resume upload wasn't successful.";
      }
      // You should also check filesize here. 
      if ($_FILES['resume']['size'] > 8107795) {
        $message_error = "Resume file too large";
      }

      $finfo = new finfo(FILEINFO_MIME_TYPE);
      if (false === $ext = array_search(
        $finfo->file($_FILES['resume']['tmp_name']),
        array(
          'pdf' => 'application/pdf'
        ),
        true
      )) {
        $message_error = "Please upload a valid pdf file";
      }
      $file =  move_uploaded_file($_FILES["resume"]["tmp_name"], SITE_ROOT . "/job_panel/docsxxx/" . $resume);
    }
    if ($_FILES["cover_letter"]["name"] != NULL) {
      $allowedExts = array("pdf");
      $temp = explode(".", $_FILES["cover_letter"]["name"]);
      $details["serial_number"] = substr(sha1(time()), 0, 7);
      $cover_letter = $jobseek_code . $details['serial_number'] . '2.' . end($temp);
      $extension = end($temp);
      switch ($_FILES['cover_letter']['error']) {
        case UPLOAD_ERR_OK:
          break;
        case UPLOAD_ERR_NO_FILE:
          $message_error = "cover_letter upload wasn't successful.";
        default:
          $message_error = "cover_letter upload wasn't successful.";
      }
      // You should also check filesize here. 
      if ($_FILES['cover_letter']['size'] > 8107795) {
        $message_error = "cover_letter file too large";
      }

      $finfo = new finfo(FILEINFO_MIME_TYPE);
      if (false === $ext = array_search(
        $finfo->file($_FILES['cover_letter']['tmp_name']),
        array(
          'pdf' => 'application/pdf'
        ),
        true
      )) {
        $message_error = "Please upload a valid pdf file";
      }
      $file =  move_uploaded_file($_FILES["cover_letter"]["tmp_name"], SITE_ROOT . "/job_panel/docsxxx/" . $cover_letter);
    }
  }


  if (['applicant_code'] != NULL) {
    $biodata = $jobsk_operation->update_biodata(
      $jobseek_code,
      $place_of_birth,
      $location,
      $country_of_residence,
      $country_of_nationality,
      $languages,
      $linkedin_profile,
      $twitter_profile,
      $hobbies,
      $skills
    );
  } else {
    $biodata = $jobsk_operation->add_biodata(
      $jobseek_code,
      $place_of_birth,
      $location,
      $country_of_residence,
      $country_of_nationality,
      $languages,
      $linkedin_profile,
      $twitter_profile,
      $hobbies,
      $skills
    );
  }

  if ($biodata) {
    if (['education_period_month_from_1'] == "") {
      redirect_to('upload_edu_experience');
    } else {
      $message_success = "Profile Updated Succesfully!";
    }
  } else {
    $message_error = "Upload wasn't successful.";
  }
}
$countries = $zenta_operation->get_all_countries();
?>


<script>
  $(function() {
    $("#education_period_year_from_1, #education_period_year_to_1").datepicker();
  });
</script>

<!--styles -->

<div class="container">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <h4>Upload Your biodata</h4>
      <?php include_once("../layouts/feedback_message.php"); ?>
      <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
        <div class="row mb-3">
          <input name="applicant_code" class="form-control" type="hidden" id="applicant_code" size="30" value="" />
          <div class="col-md-5 mb-3">First Name <input name="first_name" class="form-control" type="text" id="first_name" value="" /></div>
          <div class="col-md-5 mb-3">Middle Name <input name="middle_name" class="form-control" type="text" id="middle_name" value="" /></div>
          <div class="col-md-5 mb-3"> Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="" /></div>
          <div class="col-md-5 mb-3">Place of Birth <input name="place_of_birth" class="form-control" type="text" id="place_of_birth" size="30" value="" /></div>
          <div class="col-md-5 mb-3">Languages <input name="languages" class="form-control" type="text" id="languages" size="30" value="" /></div>
          <div class="col-md-5 mb-3">Location <input name="location" class="form-control" type="text" id="location" size="30" value="" /></div>
          <div class="columns-row">
            <label class="col-md-9">
              &nbsp;&nbsp;&nbsp;Gender:
            </label>
            <div class="columns-col columns-col-6">
              <div>
                <!-- input radio -->
                <div class="radio">
                  <input type="radio" id="gender_select_0" value="1" name="gender_select">
                  <label for="gender_select_0"></label>
                </div>
                <!-- / input radio -->
                Male
              </div>
              <div>
                <!-- input radio -->
                <div class="radio">
                  <input type="radio" id="gender_select_1" value="2" name="gender_select" checked>
                  <label for="gender_select_1"></label>
                </div>
                <!-- / input radio -->
                Female
              </div>
            </div>

          </div>
          <br>
          <div class="form-group">
            <label class="col-md-9">
              Email:
              <span class="required">*</span>
            </label>
            <div class="col-md-11 col-xs-11"><input name="email" required class="form-control" type="text" id="email" size="30" /></div>
          </div>

          <div class="form-group">
            <label class="col-md-9">
              Phone:
              <span class="required">*</span>
            </label>
            <div class="col-md-11 col-xs-11"><input name="phone" class="form-control" type="text" id="phone" size="30" /></div>
          </div>

          <div class="col-md-5 mb-3">Country of Nationality <select name="country_of_nationality" data-required="true" class="selectpicker" data-live-search="true">
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
            </select></div>

          <div class="col-md-5 mb-3">Country of Residence <select name="country_of_residence" data-required="true" class="selectpicker" data-live-search="true">
              <option value="">Select A Country</option>
              <?php
              foreach ($countries as $row3) :
              ?>
                <option value="<?php echo $row3['country_id']; ?>">
                  <?php echo $row3['country_name']; ?>
                </option>
              <?php
              endforeach;
              ?>
            </select></div>


          <div class="form-group">
            <label class="col-md-9">Source:<span class="required">*</span></label>
            <div class="col-md-11 col-xs-11 message-form-author"><select name="source" data-required="true" class="form-control">
                <option value=''>Please Source</option>
                <option value='Newspaper Advert'>Newspaper Advert</option>
                <option value='Online Advert'>Online Advert</option>
                <option value='Google Ads'>Google Ads</option>
                <option value='Facebook Ads'>Facebook Ads</option>
                <option value='From a friend'>From a friend</option>
                <option value='Online search'>Online search</option>
                <option value='Radio Advert'>Radio Advert</option>
                <option value='TV Advert'>TV Advert</option>
                <option value='Roadside banner'>Roadside banner</option>
                <option value='Other'>Other</option>
              </select></div>
          </div><br><br>
          <div class="col-md-11 mb-3">Linkedin Profile <input name="linkedin_profile" class="form-control" type="text" id="linkedin_profile" size="30" value="" /></div>
          <div class="col-md-11 mb-3">Twitter ID <input name="twitter_profile" class="form-control" type="text" id="twitter_profile" size="30" value="" /> </div>

          <div class="form-group col-md-11 mb-3">
            <label for="hobbies">Hobbies</label>
            <textarea class="form-control" id="hobbies" name="hobbies" rows="5"></textarea>
          </div>
          <div class="form-group col-md-11 mb-3">
            <label for="skills">Skills</label>
            <textarea class="form-control" id="skills" name="skills" rows="5"></textarea>
          </div>
          <div> <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update"></div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once('../main_footer.php'); ?>