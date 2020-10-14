<?php
require_once("../main_header.php");
if (!$session_client->is_logged_in()) {
  redirect_to(SITE_URL . "/login.php");
}
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender =  $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
  "Female";
?>


<div class="page-content container clear-fix">

  <div class="row">
    <?php include('stu_menu.php') ?>
    <div class="col-md-8">
      <main>
        <section class="clear-fix">
          <h2>Upload Resume</h2>
          <form action="" method="post">
            <?php require_once '../layouts/feedback_message.php'; ?>
            <div class="col-md-6 form-group">
              <label for="resume" class="control-label">Select Resume</label>
              <input name="resume" class="form-control" type="file" id="resume" />
            </div>
            <div class="row m-t-30">
              <div class="col-md-12">
                <input name="upload_resume" type="submit" class="cws-button border-radius bt-color-1 alt" value="Upload Resume">
              </div>
            </div>
          </form>
          <hr>
          <div class="grid-col-row">
            <div class="grid-col grid-col-12">
              <p>Don't have a resume? Fill this form below and get your resume designed to suit the job you're applying for</p>
              <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                <?php require_once '../layouts/feedback_message.php'; ?>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <label for="full_name" class="control-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="">
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <label for=" address" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="">
                  </div>
                  <div class="col-md-12">
                    <label for="plan_discount" class="control-label">Email</label>
                    <div class='input-group'>
                      <input id="plan_discount" name="plan_discount" type='text' class="form-control" value="" />
                      </span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="phone" class="control-label">Phone</label>
                    <div class='input-group'>
                      <input id="phone" name="phone" type='text' class="form-control" value="" />
                      </span>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="career_objectives" class="control-label">Career Objectives</label>
                      <textarea id="career_objectives" class="form-control" name="career_objectives" rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mb-20">
                </div>

                <div class="row m-t-30">
                  <div class="col-md-12">
                    <input name="generate_cv" type="submit" class="cws-button border-radius bt-color-3 alt" value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</div>
<?php include("../main_footer.php") ?>