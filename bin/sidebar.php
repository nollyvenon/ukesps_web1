<?php defined('SITE_URL') ? NULL : define('SITE_URL', 'http://localhost/ukesps.com'); ?>
<nav class="pcoded-navbar">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="">
			<div class="main-menu-header">
				<img class="img-40 img-radius" src="../assets/images/avatar-blank.jpg" alt="User-Profile-Image">
				<div class="user-details">
					<span><?= $fname; ?></span>
					<span id="more-details"><?= ucfirst($accounttype); ?><i class="ti-angle-down"></i></span>
				</div>
			</div>

			<div class="main-menu-content">
				<ul>
					<li class="more-details">
						<a href="<?= SITE_URL; ?>/parent/user-profile"><i class="ti-user"></i>View Profile</a>
						<a href="#!"><i class="ti-settings"></i>Settings</a>
						<a href="<?= SITE_URL; ?>/logout"><i class="ti-layout-sidebar-left"></i>Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="pcoded-search">
			<span class="searchbar-toggle"> </span>
			<div class="pcoded-search-box ">
				<input type="text" placeholder="Search">
				<span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
			</div>
		</div>
		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">
			<li class="">
				<a href="<?= SITE_URL; ?>/xadmin/dashboard">
					<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
				</a>
			</li>

			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-view-grid"></i><b>W</b></span>
					<span class="pcoded-mtext" data-i18n="nav.widget.main">Events</span>
					<!-- <span class="pcoded-badge label label-danger">100+</span>-->
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_event">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_event">Add Event</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_events">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_events">Manage Events</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_event_pricing">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_event_pricings">Add Event Pricing</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_event_pricing">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_event_pricing">Manage Event Pricing</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-view-grid"></i><b>W</b></span>
					<span class="pcoded-mtext" data-i18n="nav.widget.main">Courses</span>
					<!-- <span class="pcoded-badge label label-danger">100+</span>-->
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_course">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_course">Add Course</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_courses">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_courses">Manage Courses</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_course_category">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_course_category">Add Course Category</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_course_category">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_course_category">Manage Courses Category</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_course_subcategory">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_course_subcategory">Add Course SubCategory</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_course_subcategory">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_course_subcategory">Manage Course SubCategory</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_course_location">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_course_location">Add Course Location</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_course_locations">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_course_locations">Manage Course Locations</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_institution">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_institution">Add Course Institution</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_institutions">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_institutions">Manage Course Institution</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_course_pricing">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_course_pricing">Add Course Pricings</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_course_pricings">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_course_pricings">Manage Course Pricings</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-view-grid"></i><b>W</b></span>
					<span class="pcoded-mtext" data-i18n="nav.widget.main">Jobs</span>
					<!-- <span class="pcoded-badge label label-danger">100+</span>-->
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_job">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_job">Add Job</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_jobs">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_jobs">Manage Jobs</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_job_location">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_job_location">Add Job Location</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_job_locations">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_job_locations">Manage Job Location</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_job_pricing">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_job_pricing">Add Job Pricings</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_job_pricings">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_job_pricings">Manage Job Pricings</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-view-grid"></i><b>W</b></span>
					<span class="pcoded-mtext" data-i18n="nav.widget.main">CVs</span>
					<!-- <span class="pcoded-badge label label-danger">100+</span>-->
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_cvs">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_cvs">Manage CVs</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_cv_pricing">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_cv_pricing">Add CV Pricings</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_cv_pricings">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_cv_pricings">Manage CV Pricings</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-view-grid"></i><b>W</b></span>
					<span class="pcoded-mtext" data-i18n="nav.widget.main">States</span>
					<!-- <span class="pcoded-badge label label-danger">100+</span>-->
					<span class="pcoded-mcaret"></span>
				</a>

				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_state">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/add_state">Add State</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_states">
							<span class="pcoded-micon"><i class="icon-chart"></i></span>
							<span class="pcoded-mtext" data-i18n="<?= SITE_URL; ?>/xadmin/manage_states">Manage States</span>
						</a>
					</li>
				</ul>
			</li>
			<!--<li class="">
                <a href="<?= SITE_URL; ?>/xadmin/search">
                    <span class="pcoded-micon"><i class="ti-search"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Search</span>
                </a>
            </li>-->
		</ul>


		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Content</div>
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
					<span class="pcoded-mtext" data-i18n="nav.form-components.main">Content</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/add_content">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext" data-i18n="nav.form-components.form-components">Add Content</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li class=" ">
						<a href="<?= SITE_URL; ?>/xadmin/manage_content">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext" data-i18n="nav.form-components.form-elements-add-on">View Content</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>

				</ul>
			</li>
		</ul>

		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element">Users</div>
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
					<span class="pcoded-mtext" data-i18n="nav.basic-components.main">Users</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<?php if (in_array(20, $my_pages)) {  ?>
						<li class=" ">
							<a href="<?php echo SITE_URL; ?>/xadmin/add_user">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add User</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					<?php } ?>
					<?php if (in_array(19, $my_pages)) {  ?>
						<li class=" ">
							<a href="<?php echo SITE_URL; ?>/xadmin/users">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Users</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					<?php } ?>
					<?php if (in_array(24, $my_pages)) {  ?>
						<li class=" ">
							<a href="<?php echo SITE_URL; ?>/xadmin/add_user_group">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add User Group</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					<?php } ?>
					<?php if (in_array(25, $my_pages)) {  ?>
						<li class=" ">
							<a href="<?php echo SITE_URL; ?>/xadmin/user_groups">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">User Groups</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</li>
		</ul>

		<li class="">
			<a href="">
				<span class="pcoded-mtext" data-i18n="nav.dash.main">&nbsp;</span>
			</a>
		</li>

	</div>
</nav>