<?php
require_once("z_db.php");
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
<!DOCTYPE HTML>
<html>

<head>
  <title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <!-- style -->
  <link rel="shortcut icon" href="<?= SITE_URL ?>/img/favicon.png">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/font-awesome.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/fi/flaticon.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/main.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/main2.css">

  <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/css/jquery.fancybox.css" />
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="rs-plugin/<?= SITE_URL ?>/css/settings.css" media="screen">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/animate.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/styles.css">
  <!--styles -->

  <link rel="stylesheet" href="<?= SITE_URL ?>/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--styles -->
</head>

<body class="">

  <?php include("header.php") ?>

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
  <?php include("footer.php") ?>
  <script src="../js/jquery.min.js"></script>
  <script type='text/javascript' src='../js/jquery.validate.min.js'></script>
  <script src="../js/jquery.form.min.js"></script>
  <script src="../js/TweenMax.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/jquery.isotope.min.js"></script>

  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/jflickrfeed.min.js"></script>
  <script src="../js/jquery.tweet.js"></script>

  <script src="../js/jquery.fancybox.pack.js"></script>
  <script src="../js/jquery.fancybox-media.js"></script>
  <script src="../js/retina.min.js"></script>
</body>

</html>