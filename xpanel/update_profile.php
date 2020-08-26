<?php
require_once("z_db.php");
if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
// error_reporting(-1);

if (isset($_POST['submit'])) {

	foreach ($_POST as $key => $value) {
		$_POST[$key] = $db_handle->sanitizePost(trim($value));
	}
	extract($_POST);
	if (strlen($first_name) < 2) {
		$message_error .= "First Name is compulsory";
	}

	if ($last_name == '') {
		$message_error .= "Last Name is compulsory";
	}

	if ($message_error == '') {

		$result = $zenta_operation->update_user($user_code, $first_name, $last_name, $country, $state, $phone, $mailing_address, $course_preference, $university_preference);
		if ($result) {
			redirect_to('index');
		} else {
			$message_error = "Upload wasn't successful.";
		}
	}
}


$countries = $zenta_operation->get_all_countries();
$first_name = $zenta_operation->get_user_by_code($user_code)['first_name'];
$last_name = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$state = $zenta_operation->get_user_by_code($user_code)['state'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
// $course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course_preference = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$university_preference = $zenta_operation->get_user_by_code($user_code)['university_preference'];
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
	<script>
		function ShowStatebyCountry(str) {
			if (str == "") {
				document.getElementById("txtHint1").innerHTML = "";
				return;
			}

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "getStates.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>
	<!--styles -->
</head>

<body class="">
	<?php
	require_once("header.php");
	?>


	<!-- <script>
		$(function() {
			$("#education_period_year_from_1, #education_period_year_to_1").datepicker();
		});
	</script> -->

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
								<a href="index">Profile<span> </span></a></li>
							<!-- <li class="cat-item cat-item-1 current-cat">
								<a href="upload_biodata">Update Profile<span> </span></a></li> -->
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
						<div class="col-md-5">First Name<input name="first_name" class="form-control" type="text" id="first_name" value="<?php echo $first_name; ?>" /></div>

						<div class="col-md-5">Last Name <input name="last_name" class="form-control" type="text" id="last_name" value="<?php echo $last_name; ?>" /> </div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Email<input name="email" class="form-control" type="text" disabled id="email" value="<?php echo $email; ?>" /></div>

						<div class="col-md-5">Phone<input name="phone" class="form-control" type="text" id="phone" value="<?php echo $phone; ?>" /> </div>
					</div>
					<div class="row mb-3">
						<div class="col-md-5">Country of Residence <select name="country" data-required="true" class="selectpicker" data-live-search="true" onchange="ShowStatebyCountry(this.value)">
								<option value="">Select A Country</option>
								<?php
								foreach ($countries as $row3) :
								?>
									<option <?php if ($country == $row3['country_id']) { ?> selected="selected" <?php } ?> value="<?php echo $row3['country_id']; ?>">
										<?php echo $row3['country_name']; ?>
									</option>
								<?php
								endforeach;
								?>
							</select></div>
						<div class="col-md-5">State of Residence <select id="txtHint1" name="state" data-required="true" class="selectpicker" data-live-search="true">
								<option value="<?= $state ?>"><?= $zenta_operation->get_state_by_id($state) ?></option>
							</select></div>
					</div>
					<div class="row mb-4">
						<div class="col-md-5">Course Preference <input name="course_preference" class="form-control" type="text" id="course_preference" value="<?php echo $course_preference; ?>" /></div>

						<div class="col-md-5">University Preference <input name="university_preference" class="form-control" type="text" id="university_preference" value="<?php echo $university_preference; ?>" /> </div>
					</div>
					<div class="row mb-3">
						<div class="col-md-10">Address<input name="mailing_address" class="form-control" type="text" id="mailing_address" value="<?php echo $address; ?>" /></div>
					</div>
					<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Update Profile">

				</form>
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