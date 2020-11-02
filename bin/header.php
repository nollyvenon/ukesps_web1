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
                <li class="header-notification">
                    <a href="<?= SITE_URL; ?>/xadmin/logout">
                        <i class="ti-layout-sidebar-left"></i> Logout
                    </a>
                </li>
            </ul>
            <!-- search -->
            <!-- search end -->
        </div>
    </div>
</nav>