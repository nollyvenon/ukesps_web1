<?php
include("../main_header.php");
if (!$session_client->is_logged_in()) {
	redirect_to(SITE_URL . "/login.php");
}
$firstname = $zenta_operation->get_user_by_code($user_code)['first_name'];
$lastn = $zenta_operation->get_user_by_code($user_code)['last_name'];
$middlename = $zenta_operation->get_user_by_code($user_code)['middle_name'];
$email = $zenta_operation->get_user_by_code($user_code)['email'];
$country = $zenta_operation->get_user_by_code($user_code)['country'];
$state = $zenta_operation->get_user_by_code($user_code)['state'];
$phone = $zenta_operation->get_user_by_code($user_code)['phone'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$course = $zenta_operation->get_user_by_code($user_code)['course_preference'];
$university_preference = $zenta_operation->get_user_by_code($user_code)['university_preference'];
$address = $zenta_operation->get_user_by_code($user_code)['mailing_address'];
$gender = $zenta_operation->get_user_by_code($user_code)['gender'] == 1 ? 'Male' :
	"Female";
?>

<div class="page-content container clear-fix">
	<div class="row">
		<?php include('stu_menu.php') ?>
		<div class="col-md-8 col-lg-8 col-sm-12">
			<main>
				<section class="clear-fix">
					<h2>My Profile</h2>
					<hr>
					<div class="grid-col-row ml-2">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="info-box">
										<h5><?php echo $firstname . ' ' . $middlename . ' ' . $lastn ?></h5>
										<span class="instructor-profession"><?php echo $email ?></span>
										<div class="divider"></div>
										<p><?= $phone ?></p>
										<p><?= $address ?></p>
									</div>
									<br>
									<!-- <p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country) ?></p>
										<p><b>State: </b> <?= $zenta_operation->get_state_by_id($state) ?></p>
										<p><b>Gender: </b> <?= $gender ?></p><br> -->
								</div>
								<div class="col-md-4">
									<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country) ?></p>
									<p><b>State: </b> <?= $zenta_operation->get_state_by_id($state) ?></p>
									<p><b>Gender: </b> <?= $gender ?></p>
									<p><b>Course preference: </b> <?= $course ?></p>
									<p><b>University preference: </b> <?= $university_preference ?></p>

								</div>
							</div>

						</div>

					</div>
				</section>
			</main>
		</div>
	</div>
</div>
<?php include("../main_footer.php") ?>