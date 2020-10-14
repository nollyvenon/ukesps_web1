<?php
require_once("../main_header.php");
if (!$session_client->is_logged_in()) {
  redirect_to(SITE_URL . "/login.php");
}
error_reporting(-1);
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
    <div class="col-md-3 sidebar">
      <!-- widget search -->

      <!-- widget categories -->
      <aside class="widget-categories" style="border:1px solid red; padding:10px; border-radius:5px;">
        <h2>Navigations</h2>
        <hr class="divider-big" />
        <ul>
          <li class="cat-item cat-item-1 current-cat">
            <a href="index">My Profile<span> </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="upload_biodata">Update Profile<span> </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="view_courses">VIEW Courses<span> (26) </span></a></li>
          <!-- <li class="cat-item cat-item-1 current-cat">
							<a href="applications">VIEW Application STATUS <span> </span></a></li> -->
          <li class="cat-item cat-item-1 current-cat">
            <a href="last_view_courses">Last viewed courses<span> (14) </span></a></li>
          <li class="cat-item cat-item-1 current-cat">
            <a href="<?= SITE_URL ?>/courses">Buy more courses<span> (14) </span></a></li>

        </ul>
      </aside>
    </div>
    <div class="col-md-8">
      <main>
        <section class="clear-fix">
          <h2>Upload Educational Experience</h2>

          <hr>
          <div class="grid-col-row">
            <div class="grid-col grid-col-12">
              <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                <?php require_once '../layouts/feedback_message.php'; ?>
                <h2>Tetiary Education</h2>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <label for="tertiary_education" class="control-label">School Name</label>
                    <input type="text" class="form-control" id="tertiary_education" name="tertiary_education" value="">
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <label for=" qualification" class="control-label">Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" value="">
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