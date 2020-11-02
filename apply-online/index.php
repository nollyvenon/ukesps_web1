<?php
include_once("../main_header.php");
require_once(LIB_PATH . DS . "class_course_provider.php");
$cour_prov_object = new CoursProvUser();
$schools = $cour_prov_object->get_all_course_providers();
if (isset($_POST['start_application']) && strlen($_POST['start_application']) > 3) {
  $_SESSION['institution'] = $_POST['institution'];
  $_SESSION['user_id'] = $db_handle->sanitizePost($_POST['user_code']);
  $_SESSION['dob'] = $db_handle->sanitizePost($_POST['year']) . "-" . $db_handle->sanitizePost($_POST['month']) . "-" . $db_handle->sanitizePost($_POST['day']);
  return redirect_to('upload_biodata');
}

?>
<!-- <script>
  $(function() {
    $("#education_period_year_from_1, #education_period_year_to_1").datepicker();
  });
</script> -->
<!-- / header -->
<!-- page content -->
<div class="page-title bg-color-4">
  <div class="grid-row">
    <h1>Apply Online</h1>
    <!-- bread crumb -->
    <nav class="bread-crumb">
      <a href="<?= SITE_URL ?>">Home</a>
      <i class="fa fa-long-arrow-right"></i>
      <a>apply-online</a>
    </nav>
    <!-- / bread crumb -->
  </div>
</div>
<section class="container">
  <div class="grid-col-row clear-fix">
    <!-- types input -->
    <div class="grid-col grid-col-8">
      <h2>UKESPS Online Application Form</h2>
      <p>Students wishing to apply for university courses via UKESPS can do so using the online application below. If you are already a member, then please login or fill in your UKESPS member details first, if not you can leave this blank. After you submit your application, a UKESPS counsellor will review your details and be in touch.</p>
      <p>If you are already a UKESPS member, please enter your details below:</p>
      <div class="columns-row">
        <div class="columns-col columns-col-6 ">
          <?php require_once '../layouts/feedback_message.php'; ?>
          <form action="" method="POST">
            <div class="form-group">
              <label for="dob">Date Of Birth:</label>
              <input name="year" type="text" placeholder="YEAR">
              <input name="month" type="text" placeholder="MONTH">
              <input name="day" type="text" placeholder="DAY">
            </div>
            <div class="form-group">
              <label for="dob">UKESPS Members Id:</label>
              <p><input type="text" name="user_code" placeholder="UKESPS Member's Id"> </p>
            </div>
            <div class="form-group">
              <label for="schools">School(s) applying to maximum of six(6):</label>
              <select class="custom-select" name="institution[]" required multiple>
                <?php foreach ($schools as $school) { ?>
                  <option value="<?= $school['company_name'] ?>"><?= $school['company_name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <p class="form-submit rectangle-button green medium">
                <input class="cws-button border-radius alt" name="start_application" type="submit" id="submit" value="Start Application">
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / types input -->
  </div>
</section>
<!-- footer -->
<?php include_once('../main_footer.php'); ?>
<!-- / footer -->