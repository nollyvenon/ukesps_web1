       
        <!-- Top Navigation: The main navigation of the Web site  -->
        <nav id="top-nav" class="navbar navbar-inverse">
            <div class="navbar-header">
                <span class="visible-xs navbar-brand">Menu <i class="fa fa-fw fa-long-arrow-right"></i></span>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div  class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if ($thisPage == "Home") { echo "class=\"active\""; } ?>><a href="./" title="Home Page"><i title="Home Page" class="fa fa-home"></i> </a></li>
                    <li class="dropdown <?php if ($thisPage == "About") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-history fa-fw"></i> About
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://7bforex.ng/about_us.php?x=BBLR" title="7bForex" target="_blank">7bForex</a></li>
                            <li><a href="view_news.php" title="7bForex Nigeria News Centre">Company News</a></li>
                            <li><a href="photo_gallery.php" title="Photo Gallery">Photo Gallery</a></li>
                            <li><a href="video_gallery.php" title="Video Gallery">Video Gallery</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if ($thisPage == "Traders") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-line-chart fa-fw"></i> Traders
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="deposit_funds.php" title="Deposit Funds">Deposit Funds</a></li>
                            <li><a href="withdraw_funds.php" title="Withdraw Funds">Withdraw Funds</a></li>
                            <li><a href="deposit_notify.php" title="Payment Notification">Payment Notification</a></li>
                            <li><a href="forex_bonus.php" title="30% Bonus On Deposit">30% Bonus On Deposit</a></li>
                            <li><a href="view_signal.php" title="Free Forex Signals">Forex Signals</a></li>
                            <li><a href="7bforex_tv.php" title="7bForex TV">7bForex TV</a></li>
                            <li><a href="https://www.7bforex.ng/55bonus.php?x=BBLR" title="55% Deposit Bonus" target="_blank">55% Deposit Bonus</a></li>
                            <li><a href="https://www.7bforex.ng/nodeposit_bonus.php?x=BBLR" title="No Deposit Bonus" target="_blank">No Deposit Bonus</a></li>
                            <li><a href="https://7bforex.ng/trading_conditions.php?x=BBLR" title="7bForex Trading Conditions" target="_blank">Trading Conditions</a></li>
                            <li><a href="https://7bforex.ng/pamm_system.php?x=BBLR" title="PAMM System" target="_blank">PAMM System</a></li>
                            <li><a href="https://7bforex.ng/forex_options.php?x=BBLR" title="Forex Options" target="_blank">Forex Options</a></li>
                            <li><a href="https://7bforex.ng/forexcopy_system.php?x=BBLR" title="ForexCopy System" target="_blank">ForexCopy System</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if ($thisPage == "Education") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book fa-fw"></i> Education
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="forex_profit_academy.php" title="Forex Profit Academy">Forex Profit Academy</a></li>
                            <li><a href="traders_forum.php" title="Forex Traders Forum">Traders Forum</a></li>
                            <!--<li><a href="beginner_traders_course.php" title="Beginner Trader Course">Beginner Trader Course</a></li>
                            <li><a href="advanced_traders_course.php" title="Advance Trader Course">Advance Trader Course</a></li>
                            <li><a href="course.php" title="Forex Freedom Course">Forex Freedom Course</a></li>
                            <li><a href="private_course.php" title="Forex Private Course">Forex Private Course</a></li>
                            <li><a href="investor_course.php" title="Investor Course">Investor Course</a></li>-->
                        </ul>
                    </li>
                    <li class="<?php if ($thisPage == "Promotion") { echo " active"; } ?>"><a href="promo.php" title="7bForex Promotions"><i class="fa fa-bookmark fa-fw"></i> Promo</a></li>
                    <li class="dropdown <?php if ($thisPage == "Account") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-dollar fa-fw"></i> Open Account
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="live_account.php" title="Open live Account">Live Account</a></li>
                            <li><a href="bonus.php" title="Bonus Offers">Bonus Offers</a></li>
                            <li><a href="https://7bforex.ng/open_demo_account.php?x=BBLR" title="Demo Account" target="_blank">Demo Account</a></li>
                            <li><a href="https://7bforex.ng/downloads.php?x=BBLR" title="Download Trading Terminal" target="_blank">Download Trading Terminal</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if ($thisPage == "Support") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-phone fa-fw"></i> Support
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="contact_info.php" title="Contact">Contact Info</a></li>
                            <li><a href="faq.php" title="Frequently Asked Questions">FAQ</a></li>
                            <li><a href="careers.php" title="Careers" target="_blank">Careers</a></li>
                        </ul>
                    </li>
<!--                    <li class="dropdown <?php if ($thisPage == "Partner") { echo " active"; } ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-money fa-fw"></i> Partner
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="partner/" title="Instafxng Partnership Program">How it Works</a></li>
                            <li><a href="partner/signup.php" title="">Registration</a></li>
                            <li><a href="partner/login.php" title="">Partner Login</a></li>
                            <li><a href="partner/banners.php" title="">Banners</a></li>
                        </ul>
                    </li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://cabinet.7bforex.ng/client/login?x=BBLR" title="Login into Client Cabinet" target="_blank"><i class="fa fa-lock fa-fw"></i> Client Login</a></li>
                </ul>
            </div>
        </nav>
        