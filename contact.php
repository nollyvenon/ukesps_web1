<?php
include_once("main_header.php");
$contact = $zenta_operation->get_contact_details();
?>

<!-- / page header -->
<!-- page content -->
<div class="page-content woocommerce">
	<!-- map -->
	<div class="container clear-fix">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="map wow fadeInUp">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2485.0767620937227!2d-0.06873978458190112!3d51.47510527962986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s19%20Richland%20house%2C%20Goldsmith%20Road%2C%20London%20Se15%205SZ.!5e0!3m2!1sen!2sng!4v1598547303351!5m2!1sen!2sng" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<!-- / map -->
	<!-- contact form section -->
	<div class="grid-row clear-fix">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<section>
					<h2>Contact us</h2>
					<div class="widget-contact-form">
						<!-- contact-form -->
						<div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
							<strong>Attention!</strong>
							<div class="message"></div>
						</div>
						<div class="email_server_responce"></div>
						<form action="php/contacts-process.php" method="post" class="contact-form alt clear-fix">
							<input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true">
							<input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true">
							<input type="text" name="phone" value="" size="40" placeholder="Phone" aria-invalid="false" aria-required="true">
							<textarea name="message" cols="40" rows="3" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>
							<input type="submit" value="Send" class="cws-button border-radius alt">
						</form>
						<!--/contact-form -->
					</div>
				</section>
			</div>
			<div class="col-lg-5 col-md-5 widget-address">
				<section>
					<h2>Our Offices</h2>
					<address>
						<p>Visit us to find out more</p>
						<div class="row">
							<?php $i = 1;
							foreach ($contact as $cont_info) : ?>
								<div class="col-lg-3 col-md-6">
									<p><strong class="fs-18">Address<?= $i ?>:</strong><br /><?= $cont_info['address'] ?></p>
									<p><strong class="fs-18">Phone number:</strong><br />
										<a href="tel:<?= $cont_info['phone'] ?>"><?= $cont_info['phone'] ?></a><br />
										<!-- <a href="tel:+2348112851444">234(811) 285 1444</a> -->
									</p>
									<p><strong class="fs-18">E-mail:</strong><br />
										<a href="mailto:<?= $cont_info['email'] ?>"><?= $cont_info['email'] ?></a><br />
										<!-- <a href="mailto:sales@ukesps.com">sales@ukesps.com</a> -->
									</p>
								</div>
							<?php $i++;
							endforeach ?>
						</div>

					</address>
				</section>
			</div>
		</div>
	</div>
	<!-- / contact form section -->
</div>
<!-- / page content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->