<?php
$page_title = 'Dashboard';
$page_group = 'Dashboard';
require_once("../includes/initialize_admin.php");
?><!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITE_ACRONYM .' - '. $page_title;?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
    <!--SVG Icons Animated-->
    <link rel="stylesheet" type="text/css" href="../assets/icon/SVG-animated/svg-weather.css">
    <!-- Nvd3 chart css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/nvd3/css/nv.d3.css" media="all">
    <!--Vector Map Css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/vector-maps/css/jquery-jvectormap-2.0.2.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">





    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include('../bin/header.php');?>

            <?php include('../bin/inner_sidebar_chat.php');?>
			
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include('../bin/sidebar.php');?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">

                                            <!-- user card start -->
                                            <div class="col-sm-4">
                                                <div class="card bg-c-pink text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>1,658</h2>
                                                        <h6>Daily user</h6>
                                                        <i class="ti-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card bg-c-blue text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>5,678</h2>
                                                        <h6>Daily visitor</h6>
                                                        <i class="icofont icofont-paper"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card bg-c-yellow text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>5,678</h2>
                                                        <h6>Last month visitor</h6>
                                                        <i class="icofont icofont-ui-alarm"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- user card end -->

                                            <!-- Visitor Chart Start -->
                                            <div class="col-md-12">
                                                <div class="card visitor-chart-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Visitors</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block p-b-40">
                                                        <div id="visitor-list-graph" style="width:100%;height:400px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Visitor Chart End -->

                                            <!-- Tasks Sale Start -->
                                            <div class="col-md-12 col-xl-6 ">
                                                <div class="card task-sale-card ">
                                                    <div class="card-header ">
                                                        <div class="card-header-left ">
                                                            <h5>Today</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-big ">
                                                        <h2 class="text-c-green d-inline-block m-b-40 f-50 ">23</h2>
                                                        <div class="d-inline-block m-l-5 super ">
                                                            <p class="text-muted  m-b-0 f-w-400 ">Task</p>
                                                            <p class="text-muted  m-b-0 f-w-400 ">Done</p>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-sm-5 ">
                                                                <h3 class="text-muted d-inline-block m-b-40 ">23</h3>
                                                                <div class="d-inline-block m-l-5 top m-t-10">
                                                                    <p class=" m-b-0 f-w-400 f-14 text-uppercase">Today task</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 ">
                                                                <h3 class="text-muted d-inline-block m-b-40 ">12</h3>
                                                                <div class="d-inline-block m-l-5 top m-t-10">
                                                                    <p class=" m-b-0 f-w-400 f-14 text-uppercase">Pending task</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="b-t-default p-t-20 m-t-5">
                                                            <img src="../assets/images/widget/user-.png " alt=" " class="img-rounded top ">
                                                            <div class="d-inline-block m-l-10 ">
                                                                <p class="text-muted m-b-5">Most assigned by</p>
                                                                <span class="f-w-400 f-16 text-c-green">James Chukwudi</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Summery Start -->
                                            <div class="col-md-12 col-xl-6">
                                                <div class="card summery-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Summery</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-sm-6 b-r-default p-b-30">
                                                                <h2 class="f-w-400">13</h2>
                                                                <p class="text-muted f-w-400">Active users</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-blue" role="progressbar"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 p-b-30">
                                                                <h2 class="f-w-400">28</h2>
                                                                <p class="text-muted f-w-400">Completed task</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-pink" role="progressbar"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <canvas id="summary" height="80"></canvas>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h2 class="f-w-400">76</h2>
                                                                <p class="text-muted f-w-400">Open task</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-green" role="progressbar"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- summary end -->
                                            <!-- Tasks Sale End -->

                                            <!-- Profit Visitor Start -->
                                            <div class="col-md-6 col-xl-4 ">
                                                <div class="card ">
                                                    <div class="card-block ">
                                                        <h2 class="text-center f-w-400 ">₦45,567,000</h2>
                                                        <p class="text-center text-muted ">Monthly Profit</p>
                                                        <canvas id="monthlyprofit-1" height="30"></canvas>
                                                        <div class="m-t-20">
                                                            <div class="row ">
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">₦1,234,000</h6>
                                                                    <i class="icofont icofont-caret-up text-c-blue f-16"></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0">Today</p>
                                                                </div>
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">₦1,387,400</h6>
                                                                    <i class="icofont icofont-caret-down text-c-blue f-16 "></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0 ">
                                                                        Yesterday</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4 ">
                                                <div class="card ">
                                                    <div class="card-block ">
                                                        <h2 class="text-center f-w-400 ">2,413</h2>
                                                        <p class="text-center text-muted ">Total Sales</p>
                                                        <canvas id="monthlyprofit-2" height="30"></canvas>
                                                        <div class="m-t-20">
                                                            <div class="row ">
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">1578</h6>
                                                                    <i class="icofont icofont-caret-down text-c-pink f-16 "></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0 ">
                                                                        Today</p>
                                                                </div>
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">1028</h6>
                                                                    <i class="icofont icofont-caret-up text-c-pink f-16 "></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0 ">
                                                                        Yesterday</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-4 ">
                                                <div class="card ">
                                                    <div class="card-block ">
                                                        <h2 class="text-center f-w-400 ">8,421</h2>
                                                        <p class="text-center text-muted ">Unique Visitors</p>
                                                        <canvas id="monthlyprofit-3" height="30"></canvas>
                                                        <div class="m-t-20">
                                                            <div class="row ">
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">2,849</h6>
                                                                    <i class="icofont icofont-caret-up text-c-yellow f-16 "></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0 ">
                                                                        Today</p>
                                                                </div>
                                                                <div class="col-6 text-center ">
                                                                    <h6 class="f-20 f-w-400">3,587</h6>
                                                                    <i class="icofont icofont-caret-down text-c-yellow f-16 "></i>
                                                                    <p class="text-muted f-14 d-inline-block m-l-10 m-b-0 ">
                                                                        Yesterday</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Profit Visitor End -->

                                            <!-- Visitor Map Start -->
                                            <div class="col-md-12 col-xl-7 ">
                                                <div class="card unique-visitor-card o-hidden ">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5 class="text-white">Unique visitors</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="text-white icofont icofont-simple-left "></i></li>
                                                                <li><i class="text-white icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="text-white icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="text-white icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="text-white icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block p-0">
                                                        <div class="card-block-small">
                                                            <div id="world-map-vititors" style="width:100%;height:250px;"></div>
                                                        </div>
                                                        <div class="card-block-small footer-card">
                                                            <div class="row justify-content-md-center">
                                                                <div class="col-md-8">
                                                                    <div class="row text-center p-t-15 p-b-15">
                                                                        <div class="col-sm-6 f-prog">
                                                                            <p class="f-16 m-0 f-w-400">Visit</p>
                                                                            <span class="text-muted">29,703 Users (40%)</span>
                                                                            <div class="progress m-t-10">
                                                                                <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:40%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p class="f-16 m-0 f-w-400">Revenue</p>
                                                                            <span class="text-muted">29,703 Users (60%)</span>
                                                                            <div class="progress m-t-10">
                                                                                <div class="progress-bar bg-c-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:60%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <!-- <div class="col-md-12 col-xl-5 ">
                                                <div class="card view-card">
                                                    <div class="card-block-big">
                                                        <button class="btn btn-default btn-icon"><i class="icofont icofont-plus m-0 f-16 f-w-400"></i></button>
                                                        <div class="text-center m-b-40">
                                                            <div class="chart-div">
                                                                <input type="text" class="dial" value="70" data-width="150" data-height="150" data-thickness=".2" data-linecap="round" data-displayprevious="true" data-displayInput="true" data-fgColor="#93BE52" data-angleoffset="180">
                                                                <div class="chart-more-icon">
                                                                    <span>5</span>
                                                                    <p>MORE</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-center f-w-400">Recomended changes</h4>
                                                        <p class="text-center f-w-400 text-muted m-b-40">Latest update</p>
                                                        <div class="border-img-view p-t-20 text-center">
                                                            <a href="#!"><img src="../assets/images/avatar-2.jpg" data-toggle="tooltip" title="Alia" alt="" class="img-40"></a>
                                                            <a href="#!"><img src="../assets/images/avatar-3.jpg" data-toggle="tooltip" title="Suzen" alt="" class="img-40 m-l-10"></a>
                                                            <a href="#!"><img src="../assets/images/avatar-4.jpg" data-toggle="tooltip" title="Lary Doe" alt="" class="img-40 m-l-10"></a>
                                                            <a href="#!"><img src="../assets/images/avatar-2.jpg" data-toggle="tooltip" title="Josephin Doe" alt="" class="img-40 m-l-10"></a>
                                                            <button class="btn btn-success btn-icon m-l-10"><i
                                                                    class="icofont icofont-plus m-0 f-16 f-w-400"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Visitor Map End -->

                                            <!-- blog  Start -->
                                            <!--<div class="col-md-12 col-xl-5 ">
                                                <div class="card bg-c-green green-contain-card ">
                                                    <div class="card-block-big p-t-30 ">
                                                        <h4 class="p-t-0">Summer Hits You Need For Your <br> 2017 Playlist</h4>
                                                    </div>
                                                    <div class="card m-b-0 ">
                                                        <div class=" card-block-big p-t-50 p-b-50 ">
                                                            <img src="../assets/images/widget/user2.png " alt=" " class="img-circle top ">
                                                            <div class="d-inline-block m-l-20 ">
                                                                <h6 class="f-w-400 ">Gregory Doe</h6>
                                                                <p class="text-muted ">CEO of Music shop</p>
                                                            </div>
                                                            <span class="f-w-400 f-right ">8 min ago</span>
                                                            <p class="text-muted ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                                            <div class="icon-card d-inline-block ">
                                                                <i class="icofont icofont-share text-muted "></i>
                                                                <span class="text-muted m-l-10 ">2,578</span>
                                                            </div>
                                                            <div class="icon-card d-inline-block p-l-20 ">
                                                                <i class="icofont icofont-heart-alt text-c-pink "></i>
                                                                <span class="text-c-pink m-l-10 ">5,784</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card summery-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Summery</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-sm-6 b-r-default p-b-40">
                                                                <h2 class="f-w-400">13</h2>
                                                                <p class="text-muted f-w-400">Active users</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 p-b-40">
                                                                <h2 class="f-w-400">28</h2>
                                                                <p class="text-muted f-w-400">Completed task</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-pink" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!-- blog  End -->

                                            <!-- social  Start -->
                                            <div class="col-md-12 col-xl-7 ">
                                                <div class="card social-network">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Social network</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img src="../assets/images/widget/icon-1.png " alt=" " class="img-responsive p-b-20">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Views :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">545,721</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Comments :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">2,256</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Likes :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">4,129</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Subscribe :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">3,451,945</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <img src="../assets/images/widget/icon-2.png " alt=" " class="img-responsive p-b-20">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Engagement :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">1,543</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Shares :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">846</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Likes :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">569</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Comments :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">156</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 m-t-0">
                                                                <img src="../assets/images/widget/icon-3.png " alt=" " class="img-responsive p-b-10 p-t-10">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Tweets :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">103,576</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 m-t-0">
                                                                <img src="../assets/images/widget/icon-4.png " alt=" " class="img-responsive p-b-10 p-t-10">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <p class="text-muted m-b-5">Tweets :</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <p class="m-b-5 f-w-400">103,576</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card whether-card">
                                                    <div class="text-center card-block-big">
                                                        <div class="row text-center daily-whether">
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <div class="daily-whether-block">
                                                                    <h5>Mon</h5>
                                                                    <svg version="1.1" id="sun" class="climacon climacon_sun" viewBox="15 15 70 70">
                                                                        <clipPath id="sunFillClip">
                                                                            <path d="M0,0v100h100V0H0z M50.001,57.999c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C57.999,54.417,54.418,57.999,50.001,57.999z"/>
                                                                        </clipPath>
                                                                        <g class="climacon_iconWrap climacon_iconWrap-sun">
                                                                            <g class="climacon_componentWrap climacon_componentWrap-sun">
                                                                                <g class="climacon_componentWrap climacon_componentWrap-sunSpoke">
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-east" d="M72.03,51.999h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S73.136,51.999,72.03,51.999z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northEast" d="M64.175,38.688c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L64.175,38.688z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M50.034,34.002c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C52.034,33.106,51.136,34.002,50.034,34.002z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northWest" d="M35.893,38.688l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C37.94,39.469,36.674,39.469,35.893,38.688z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-west" d="M34.034,50c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C33.14,48,34.034,48.896,34.034,50z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southWest" d="M35.893,61.312c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L35.893,61.312z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-south" d="M50.034,65.998c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C48.034,66.893,48.929,65.998,50.034,65.998z"/>
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southEast" d="M64.175,61.312l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C62.126,60.531,63.392,60.531,64.175,61.312z"/>
                                                                                </g>
                                                                                <g class="climacon_componentWrap climacon_componentWrap_sunBody" clip-path="url(#sunFillClip)">
                                                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="50.034" cy="50" r="11.999"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <h5>63°</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <div class="daily-whether-block">
                                                                    <h5>Tue</h5>
                                                                    <svg version="1.1" id="cloudHailAltMoon" class="climacon climacon_cloudHailAltMoon" viewBox="15 15 70 70">
                                                                        <clipPath id="cloudFillClip">
                                                                            <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"/>
                                                                        </clipPath>
                                                                        <clipPath id="moonCloudFillClip1">
                                                                            <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"/>
                                                                        </clipPath>
                                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudHailAltMoon">
                                                                            <g clip-path="url(#cloudFillClip)">
                                                                                <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud">
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"/>
                                                                                    <path class="climacon_component climacon_component-fill climacon_component-fill_moon" fill="#FFFFFF" d="M59.235,30.851c-3.556,0.813-6.211,3.989-6.211,7.792c0,4.417,3.581,7.999,7.999,7.999c3.802,0,6.979-2.655,7.791-6.211C63.961,39.527,60.139,35.705,59.235,30.851z"/>
                                                                                </g>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                                                    <circle cx="42" cy="65.498" r="2"/>
                                                                                </g>
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                                                    <circle cx="49.999" cy="65.498" r="2"/>
                                                                                </g>
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                                                    <circle cx="57.998" cy="65.498" r="2"/>
                                                                                </g>
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                                                    <circle cx="42" cy="65.498" r="2"/>
                                                                                </g>
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                                                    <circle cx="49.999" cy="65.498" r="2"/>
                                                                                </g>
                                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                                                    <circle cx="57.998" cy="65.498" r="2"/>
                                                                                </g>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud" clip-path="url(#cloudFillClip)">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M63.999,64.941v-4.381c2.39-1.384,3.999-3.961,3.999-6.92c0-4.417-3.581-8-7.998-8c-1.602,0-3.084,0.48-4.334,1.291c-1.23-5.317-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.55,6.728,3.999,8.924v4.916c-4.776-2.768-7.998-7.922-7.998-13.84c0-8.835,7.162-15.997,15.997-15.997c6.004,0,11.229,3.311,13.966,8.203c0.663-0.113,1.336-0.205,2.033-0.205c6.626,0,11.998,5.372,11.998,12C71.998,58.863,68.656,63.293,63.999,64.941z"/>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <h5>63°</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <div class="daily-whether-block">
                                                                    <h5>Wed</h5>
                                                                    <svg version="1.1" id="cloudLightning" class="climacon climacon_cloudLightning" viewBox="15 15 70 70">
                                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudLightning">
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-lightning">
                                                                                <polygon class="climacon_component climacon_component-stroke climacon_component-stroke_lightning" points="48.001,51.641 57.999,51.641 52,61.641 58.999,61.641 46.001,77.639 49.601,65.641 43.001,65.641 "/>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.999,65.641c-0.28,0-0.649,0-1.062,0l3.584-4.412c3.182-1.057,5.478-4.053,5.478-7.588c0-4.417-3.581-7.998-7.999-7.998c-1.602,0-3.083,0.48-4.333,1.29c-1.231-5.316-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,12c0,5.446,3.632,10.039,8.604,11.503l-1.349,3.777c-6.52-2.021-11.255-8.098-11.255-15.282c0-8.835,7.163-15.999,15.998-15.999c6.004,0,11.229,3.312,13.965,8.204c0.664-0.114,1.338-0.205,2.033-0.205c6.627,0,11.999,5.37 ,11.999,11.999C71.999,60.268,66.626,65.641,59.999,65.641z"/>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <h5>63°</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <div class="daily-whether-block">
                                                                    <h5>Thu</h5>
                                                                    <svg version="1.1" id="cloudSun" class="climacon climacon_cloudSun" viewBox="15 15 70 70">
                                                                        <clipPath id="cloudFillClip1">
                                                                            <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"/>
                                                                        </clipPath>
                                                                        <clipPath id="sunCloudFillClip">
                                                                            <path d="M15,15v70h70V15H15z M57.945,49.641c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C65.943,46.059,62.362,49.641,57.945,49.641z"/>
                                                                        </clipPath>
                                                                        <g class="climacon_iconWrap climacon_cloudSun-iconWrap">
                                                                            <g clip-path="url(#cloudFillClip)">
                                                                                <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud"  >
                                                                                    <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-orth" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z"/>
                                                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z"/>
                                                                                    </g>
                                                                                    <g class="climacon_wrapperComponent climacon_wrapperComponent-sunBody" clip-path="url(#sunCloudFillClip)">
                                                                                        <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud" clip-path="url(#cloudFillClip)">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M44.033,65.641c-8.836,0-15.999-7.162-15.999-15.998c0-8.835,7.163-15.998,15.999-15.998c6.006,0,11.233,3.312,13.969,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.26,65.641,47.23,65.641,44.033,65.641z"/>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <h5>63°</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <h5>Sat</h5>
                                                                <svg version="1.1" id="cloudRain" class="climacon climacon_cloudRain" viewBox="15 15 70 70">
                                                                        <clipPath id="cloudFillClip2">
                                                                            <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                                                                        </clipPath>
                                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudRain">
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-rain">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"></path>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent_cloud" clip-path="url(#cloudFillClip)">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M63.943,64.941v-4.381c2.389-1.384,4-3.961,4-6.92c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.48-4.334,1.291c-1.23-5.317-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.551,6.728,4,8.924v4.916c-4.777-2.768-8-7.922-8-13.84c0-8.835,7.163-15.997,15.998-15.997c6.004,0,11.229,3.311,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.372,11.998,12C71.941,58.863,68.602,63.293,63.943,64.941z">
                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                <h5>63°</h5>
                                                            </div>
                                                            <div class="col-xl-2 col-md-4 col-6">
                                                                <h5>Sun</h5>
                                                                <svg version="1.1" id="cloudFogMoonAlt" class="climacon climacon_cloudFogMoonAlt" viewBox="15 15 70 70">
                                                                        <clipPath id="moonCloudFillClip">
                                                                            <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                                                                        </clipPath>
                                                                        <clipPath id="newMoonCloudFillClip">
                                                                            <path d="M15,15v70h70V15H15z M59.943,65.638c-2.775,0-12.801,0-15.998,0c-8.836,0-15.998-7.162-15.998-15.998c0-8.835,7.162-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12C71.941,60.265,66.57,65.638,59.943,65.638z"></path>
                                                                        </clipPath>
                                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudFogMoon">
                                                                            <g clip-path="url(#newMoonCloudFillClip)">
                                                                                <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip)">
                                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-Fog">
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M29.177,55.641c-0.262-0.646-0.473-1.314-0.648-2h43.47c0,0.685-0.069,1.349-0.181,2H29.177z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M36.263,35.643c2.294-1.271,4.93-1.999,7.738-1.999c2.806,0,5.436,0.73,7.728,1.999H36.263z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M28.142,47.642c0.085-0.682,0.218-1.347,0.387-1.999h40.396c0.552,0.613,1.039,1.281,1.455,1.999H28.142z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M29.177,43.643c0.281-0.693,0.613-1.359,0.984-2h27.682c0.04,0.068,0.084,0.135,0.123,0.205c0.664-0.114,1.339-0.205,2.033-0.205c2.451,0,4.729,0.738,6.627,2H29.177z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M31.524,39.643c0.58-0.723,1.225-1.388,1.92-2h21.123c0.689,0.61,1.326,1.28,1.902,2H31.524z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M71.816,51.641H28.142c-0.082-0.656-0.139-1.32-0.139-1.999h43.298C71.527,50.285,71.702,50.953,71.816,51.641z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M71.301,57.641c-0.246,0.699-0.555,1.367-0.921,2H31.524c-0.505-0.629-0.957-1.299-1.363-2H71.301z"></path>
                                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_fogLine" d="M33.444,61.641h35.48c-0.68,0.758-1.447,1.435-2.299,2H36.263C35.247,63.078,34.309,62.4,33.444,61.641z"></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                <h5>63°</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer card-bg-inverce text-white">
                                                        <div class="card-block-small">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <h4>California USA <small>Yesterday, 12th May 2017</small></h4>
                                                                    <h5 class="text-white">Hot &amp; Sunny</h5>
                                                                    <i class="icofont icofont-clouds f-20 m-r-10 text-muted"></i>
                                                                    <h5 class="text-white">57 MPH</h5>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <i class="icofont icofont-clouds f-60 text-muted"></i>
                                                                    <div class="d-inline-block m-l-10">
                                                                        <h5 class="text-white">Currently</h5>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- social  End -->


                                        </div>
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="../bower_components/modernizr/js/css-scrollbars.js"></script>

    <!-- peity Chart js -->
    <script src="../bower_components/peity/js/jquery.peity.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="../bower_components/chart.js/js/Chart.js"></script>
    <!-- NVD3 chart -->
    <script src="../bower_components/d3/js/d3.js"></script>
    <script src="../bower_components/nvd3/js/nv.d3.js"></script>
    <script src="../assets/pages/chart/nv-chart/js/stream_layers.js"></script>
    <!-- amchart js -->
    <script src="../assets/pages/widget/amchart/amcharts.js"></script>
    <script src="../assets/pages/widget/amchart/gauge.js"></script>
    <script src="../assets/pages/widget/amchart/pie.js"></script>
    <script src="../assets/pages/widget/amchart/serial.js"></script>
    <script src="../assets/pages/widget/amchart/ammap.js"></script>
    <script src="../assets/pages/widget/amchart/light.js"></script>
    <script src="../assets/pages/widget/amchart/worldLow.js"></script>
    <script src="../assets/pages/widget/amchart/continentsLow.js"></script>
    <!-- Morris Chart js -->
    <script src="../bower_components/raphael/js/raphael.min.js"></script>
    <script src="../bower_components/morris.js/js/morris.js"></script>
    <!-- knob js -->
    <script src="../assets/pages/chart/knob/jquery.knob.js"></script>

    <!-- i18next.min.js -->
    <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="../assets/pages/dashboard/analytic-dashboard.js"></script>

    <script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/demo-12.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>

</html>
