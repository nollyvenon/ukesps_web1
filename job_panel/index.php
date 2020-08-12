<?php include("header.php") ?>

<main>
	<section class="clear-fix">
		<h2>My Profile</h2>
		<hr>
		<div class="grid-col-row">
			<div class="grid-col grid-col-12">
				<div class="row">

					<div class="col-md-6">
						<div class="info-box">
							<h4><?php echo $first_name . ' ' . $middle_name . ' ' . $last_name ?></h4>
							<span class="instructor-profession"><?php echo $email ?></span>
							<div class="divider"></div>
							<p><?= $phone ?></p>
							<p><?= $mailing_address ?></p>
							<p><?= $mailing_address2 ?></p>



						</div>
					</div>
					<div class="col-md-4">
						<p><b>Country: </b> <?= $zenta_operation->get_country_name_by_id($country) ?></p>
						<p><b>Gender: </b> <?= gender_status($gender) ?></p>
						<p><b>Job Category preference: </b> <?= $zenta_operation->get_job_category_by_id($job_category_preference)['category_name'] ?></p>
						<p><b>Sub Job Category preference: </b> <?= $zenta_operation->get_subjob_category_by_id($job_subcategory_preference)['category_name']; ?></p>

					</div>
				</div>

			</div>

		</div>
		</div>
	</section>




</main>
</div>
</div>
</div>
<?php include("footer.php") ?>