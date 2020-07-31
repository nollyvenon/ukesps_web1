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
	<?php
	require_once("header.php");

	if (!$session_client->is_logged_in()) {
		// redirect_to("../login.php");
	}

	$details = $client_operation->applicant_detail($user_code);

	if (isset($_POST['submit'])) {

		$resume = $_FILES['resume']['name'];
		$cover_letter = $_FILES['cover_letter']['name'];
		$place_of_birth = $_POST['place_of_birth'];
		$location = $_POST['location'];
		$country_of_residence = $_POST['country_of_residence'];
		$country_of_nationality = $_POST['country_of_nationality'];
		$languages = $_POST['languages'];
		$linked_profile	 = $_POST['linked_profile'];
		$twitter_profile = $_POST['twitter_profile'];
		$hobbies = $_POST['hobbies'];
		$skills = $_POST['skills'];

		$biodata = $client_operation->add_biodata(
			$user_code,
			$resume,
			$cover_letter,
			$place_of_birth,
			$location,
			$country_of_residence,
			$country_of_nationality,
			$languages,
			$linked_profile,
			$twitter_profile,
			$hobbies,
			$skills
		);

		if ($biodata) {
			redirect_to('upload_edu_experience');
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

	<div class="page-content container">
		<div class="row">
			<div class="col-md-3 sidebar">
				<!-- widget search -->

				<!-- widget categories -->
				<aside class="widget-categories" style="border:1px solid red; padding:10px;border-radius:5px;">
					<div class="container-fluid">
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
					</div>
				</aside>
			</div>
			<div class="col-md-8 col-lg-8 col-sm-12">
				<h4>Upload Your biodata</h4>
				<?php include_once("../layouts/feedback_message.php"); ?>
				<form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
					<div class="row mb-3">
						<input name="applicant_code" class="form-control" type="hidden" id="applicant_code" size="30" value="<?php echo $user_code; ?>" />
						<div class="col-md-4">First Name <input name="first_name" class="form-control" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>
						<div class="col-md-3">Middle Name <input name="middle_name" class="form-control" type="text" id="middle_name" value="<?php echo $middle_name; ?>" /></div>
						<div class="col-md-3"> Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="<?php echo $last_name; ?>" /></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Resume <input type="file" name="resume" id="resume" class="form-control">
							<a href="docsxxx/<?= $user_code; ?>/<?= $resume; ?>"><?= $resume; ?></a></div>

						<div class="col-md-5">Cover Letter <input type="file" name="cover_letter" id="cover_letter" class="form-control">
							<a href="docsxxx/<?= $user_code; ?>/<?= $cover_letter; ?>"><?= $cover_letter; ?></a></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Place of Birth <input name="place_of_birth" class="form-control" type="text" id="place_of_birth" size="30" value="<?php echo $place_of_birth; ?>" /></div>

						<div class="col-md-5">Languages <input name="languages" class="form-control" type="text" id="languages" size="30" value="<?php echo $languages; ?>" /></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Location <input name="location" class="form-control" type="text" id="location" size="30" value="<?php echo $location; ?>" /></div>

						<div class="col-md-5">Country of Nationality <select name="country_of_nationality" data-required="true" class="selectpicker" data-live-search="true">
								<option value="">Select A Country</option>
								<?php
								foreach ($countries as $row2) :
								?>
									<option <?php if ($details['country_of_nationality'] == $row2['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row2['country_id']; ?>">
										<?php echo $row2['country_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select></div>

						<div class="col-md-10">Country of Residence <select name="country_of_residence" data-required="true" class="selectpicker" data-live-search="true">
								<option value="">Select A Country</option>
								<?php
								foreach ($countries as $row3) :
								?>
									<option <?php if ($details['country_of_residence'] == $row3['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['country_id']; ?>">
										<?php echo $row3['country_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Linkedin Profile <input name="linkedin_profile" class="form-control" type="text" id="linkedin_profile" size="30" value="<?php echo $linkedin_profile; ?>" /></div>

						<div class="col-md-5">Twitter ID <input name="twitter_profile" class="form-control" type="text" id="twitter_profile" size="30" value="<?php echo $twitter_profile; ?>" /> </div>
					</div>
					<div class="row mb-4">
						<div class="col-md-5">Hobbies <input name="hobbies" class="form-control" type="text" id="hobbies" value="<?php echo $hobbies; ?>" /></div>

						<div class="col-md-5">Skills <input name="skills" class="form-control" type="text" id="skills" value="<?php echo $skills; ?>" /> </div>
					</div>
					<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Upload">

				</form>
				<?php if ($education_period_month_from_1 == "") {
					echo "<a href=\"upload_edu_experience\">Upload Educational Experience</a>";
				} else {
					echo "<a href=\"upload_edu_experience\">Update Educational Experience</a>";
				}
				?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
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