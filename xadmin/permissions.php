<?php
$page_title = 'Edit User Group';
$page_group = 'User Groups';
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
if (!contains( '36',$allowed_pages)) {
	 $message_error .= "You do not have right to that page or feature. Regards.";
	redirect_to("dashboard?msg=10");
 }
$get_params = allowed_get_params(['hiss']);
$admin_code_encrypted = $get_params['hiss'];
$admin_code = decrypt(str_replace(" ", "+", $admin_code_encrypted));
$admin_code = preg_replace("/[^A-Za-z0-9 ]/", '', $admin_code);
$admin_detail = $admin_object->get_admin_detail_by_code($admin_code);

$grp_info = $zenta_operation->get_group_by_id($admin_code);
$group_name = $grp_info['name'];
//$grp_info = $zenta_operation->get_permissions_by_permissionid($hiss);

if (isset($_POST['approve'])) {
    
    $admin_id = $_POST["admin_id"];
    $admin_id = decrypt(str_replace(" ", "+", $admin_id));
    $admin_code = preg_replace("/[^A-Za-z0-9 ]/", '', $admin_id);
    $pageid = $_POST["pageid"];
    
    for ($i = 0; $i < count($pageid); $i++) {
        $totpageid = $totpageid . "," . $pageid[$i];
    }
    
    $allowed_pages = substr_replace($totpageid, "", 0, 1);
    
    $privilege_modified = $admin_object->modify_admin_privilege($admin_code, $allowed_pages);
    
    if($privilege_modified) {
        $message_success = "You have successfully modified the privileges for this admin.";
    } else {
        $message_error = "Something went wrong, the modifications were not saved.";
    }
    
}

$my_pages = $admin_object->get_privileges($admin_code);
$my_pages = explode(",", $my_pages['allowed_pages']);
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
    <meta name="keywords" content="skultins, school app, vendor, school management system, schools, admin, applicant, school crm, videos, mobile, android, apple, revolution, Video Conferencing
, online training, digital classroom, teacher, assignment submission, events, gallery, hr manager">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="../bower_components/sweetalert/css/sweetalert.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/component.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">


    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <!--<div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
		<?php include('../bin/header.php');?>
			
			<?php //include('../bin/inner_sidebar_chat.php');?>
            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                     <?php include('../bin/sidebar.php');?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-spreadsheet bg-c-green"></i>
                                                    <div class="d-inline">
                                                        <h4><?=$page_group;?></h4>
                                                        <span><?php echo $page_title;?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="#">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!"><?=$User_Type;?></a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!"><?=$page_group;?></a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!"><?php echo $page_title;?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
                                                    <div class="card-header table-card-header">
                                                        <h5><?php echo $page_title;?></h5>
                                                    </div>
                                                    <div class="card-block">
                                 						<?php include_once('views/permissions.php');?>
                                                    </div>
                                                </div>
                                                <!-- HTML5 Export Buttons end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                        <!-- Main-body end -->
                        
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
	 <script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
</script>
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
    <!-- sweet alert js -->
    <script type="text/javascript" src="../bower_components/sweetalert/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../assets/js/modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="../assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="../assets/js/classie.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="../assets/pages/advance-elements/custom-picker.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/demo-12.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
	<?php include('../includes/bottom-cache.php');?>
	<script>
	$("#dropper-min-year1").dateDropper( {
        dropWidth: 200,      
		format: "d/m/Y",
        dropPrimaryColor: "#1abc9c", 
        dropBorder: "1px solid #1abc9c",
        minYear: "1920"
    })</script>
</body>

</html>
