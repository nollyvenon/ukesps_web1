<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a>
            <a href="index.php">
                <img class="img-40 img-radius" src="../assets/images/logo.png" alt="Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li>
                    <a class="main-search morphsearch-search" href="#">
                        <!-- themify icon -->
                        <i class="ti-search"></i>
                    </a>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>

            </ul>
            <ul class="nav-right">
                <li class="header-notification lng-dropdown">
                    <!--<a href="#" id="dropdown-active-item">
                                <i class="flag-icon flag-icon-gb m-r-5"></i> English
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <a href="#" data-lng="en">
                                        <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="es">
                                        <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="pt">
                                        <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="fr">
                                        <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                    </a>
                                </li>								
                            </ul>-->
                    <!-- <form name="language" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
									<select onchange = "document.language.submit()" name="lang">
										<option selected="selected"><?php echo $lang['select-language']; ?></option>
										<option value="en"><?php echo $lang['en']; ?></option>
										<option value="es"><?php echo $lang['es']; ?></option>
										<option value="fr"><?php echo $lang['fr']; ?></option>
										<option value="pt"><?php echo $lang['pt']; ?></option>
									 </select>
								</form> -->
                </li>
                <li class="header-notification">
                    <a href="#!">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-pink"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>
                        <?php
                        $no_unread_inbox = $zenta_operation->get_number_of_unread_inbox($admin_code);
                        $unread_inbox = $zenta_operation->get_unread_inbox($admin_code, 3);
                        if (isset($unread_inbox) && !empty($unread_inbox)) {
                            foreach ($unread_inbox as $row) {
                        ?>
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="../assets/images/avatar-blank.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user"><?= $row['sender']; ?></h5>
                                            <p class="notification-msg"><?php echo truncate_str($row['message'], 30); ?></p>
                                            <span class="notification-time"><?= time_elapsed_string($row['timestamp']); ?></span>
                                        </div>
                                    </div>
                                </li>
                        <?php }
                        } else {
                            echo "<li><em>No results to display</em> </li>";
                        } ?>
                    </ul>
                </li>
                <li class="header-notification">
                    <a href="#!" class="displayChatbox">
                        <i class="ti-comments"></i>
                        <span class="badge bg-c-green"></span>
                    </a>
                </li>
                <li class="user-profile header-notification">
                    <a href="#!">
                        <?php echo $zenta_operation->get_user_pic($admin_code, 40, '', '', 'round'); ?>
                        <span><?= $fname; ?></span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="<?= SITE_URL; ?>/xadmin/logout">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- search -->
            <div id="morphsearch" class="morphsearch">
                <form class="morphsearch-form">
                    <input class="morphsearch-input" type="search" placeholder="Search..." />
                    <button class="morphsearch-submit" type="submit">Search</button>
                </form>
                <div class="morphsearch-content">
                    <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-1.jpg" alt="Sara Soueidan" />
                            <h3>Sara Soueidan</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-2.jpg" alt="Shaun Dona" />
                            <h3>Shaun Dona</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-3.jpg" alt="PagePreloadingEffect" />
                            <h3>Page Preloading Effect</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-4.jpg" alt="DraggableDualViewSlideshow" />
                            <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-5.jpg" alt="TooltipStylesInspiration" />
                            <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                            <img src="../assets222/images/avatar-6.jpg" alt="NotificationStyles" />
                            <h3>Notification Styles Inspiration</h3>
                        </a>
                    </div>
                </div>
                <!-- /morphsearch-content -->
                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
            </div>
            <!-- search end -->
        </div>
    </div>
</nav>