	<!-- header top panel -->
	<div class="page-header-top">
		<div class="grid-row clear-fix">
			<address>
				<a href="tel:+44 7448 443723" class="phone-number"><i class="fa fa-phone"></i>+44 7448 443723</a>
				<a href="mailto:info@ukesps.com" class="email"><i class="fa fa-envelope-o"></i>info@ukesps.com</a>
			</address>
			<div class="header-top-panel">

				<a href="<?= SITE_URL ?>/cart" class="fa fa-shopping-cart"><sup><?= isset($cart_volume) ? $cart_volume : '0'  ?></sup></a>
				<?= $user_code ? '<a href="logout" class="fa fa-user login-icon"></a>' : '<a href="login" class="fa fa-user login-icon"></a>' ?>
				<div id="top_social_links_wrapper">
					<div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
					<div class="cws_social_links"><a href="https://plus.google.com/" class="cws_social_link" title="Google +"><i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i></a><a href="http://twitter.com/" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a><a href="http://facebook.com" class="cws_social_link" title="Facebook"><i class="share-icon fa fa-facebook"></i></a><a href="http://dribbble.com" class="cws_social_link" title="Dribbble"><i class="share-icon fa fa-dribbble"></i></a></div>
				</div>
				<a href="#" class="search-open"><i class="fa fa-search"></i></a>
				<form action="#" class="clear-fix">
					<input type="text" placeholder="Search" class="clear-fix">
				</form>

			</div>
		</div>
	</div>
	<!-- / header top panel -->