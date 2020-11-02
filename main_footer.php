	<!-- <script src="js/platform.js" defer></script>
	<div class="elfsight-app-e7b23910-6657-41f9-9f04-ec0f94de60c8"></div> -->
	<!-- footer -->
	<?php include_once('footer.php'); ?>
	<!-- / footer -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<input name="hidcoucat" type="hidden">
					<div class="fetched-data"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- Modal -->

	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>-->
	<script src="<?= SITE_URL ?>/js/jquery.min.js"></script>
	<script type='text/javascript' src='<?= SITE_URL ?>/js/jquery.validate.min.js'></script>
	<script src="<?= SITE_URL ?>/js/jquery.form.min.js"></script>
	<script src="<?= SITE_URL ?>/js/TweenMax.min.js"></script>
	<script src="<?= SITE_URL ?>/js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="<?= SITE_URL ?>/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="<?= SITE_URL ?>/js/jquery.isotope.min.js"></script>

	<script src="<?= SITE_URL ?>/js/owl.carousel.min.js"></script>
	<script src="<?= SITE_URL ?>/js/jquery-ui.min.js"></script>
	<script src="<?= SITE_URL ?>/js/jflickrfeed.min.js"></script>
	<script src="<?= SITE_URL ?>/js/jquery.fancybox.pack.js"></script>
	<script src="<?= SITE_URL ?>/js/jquery.fancybox-media.js"></script>
	<!-- <script src="<?= SITE_URL ?>/js/retina.min.js"></script> -->
	<script src="<?= SITE_URL ?>/js/jquery.tweet.js"></script>

	<!-- <script>
		$(document).ready(function() {
			$(".owl-carousel").owlCarousel();
		});
	</script> -->
	<script>
		$(document).ready(function() {
			let cookie_id = 0;
			if (localStorage.getItem("cookie_id") == null) {
				localStorage.setItem("cookie_id", JSON.stringify('najcakjsdusiuif'));
				setTimeout(() => {
					$('#cookie_pol').fadeIn();
				}, 4000);
			} else {
				cookie_id = JSON.parse(localStorage.getItem("cookie_id"));
			}

			$('.course_sub_cat').on('click', function(e) {

				var rowid = $(this).data('id');
				$.ajax({
					type: 'post',
					url: 'modal_course_subcat_list.php', //Here you will fetch records 
					data: 'rowid=' + rowid, //Pass $id
					success: function(data) {
						$('.fetched-data').html(data); //Show fetched data from database
						//$("input[name='hidjobcat']").val(data);
					}
				});
			});

			$('.job_sub_cat').on('click', function(e) {

				var rowid = $(this).data('id');
				$.ajax({
					type: 'post',
					url: 'modal_job_subcat_list.php', //Here you will fetch records 
					data: 'rowid=' + rowid, //Pass $id
					success: function(data) {
						$('.fetched-data').html(data); //Show fetched data from database
						//$("input[name='hidjobcat']").val(data);
					}
				});
			});
		});
	</script>
	</body>

	</html>