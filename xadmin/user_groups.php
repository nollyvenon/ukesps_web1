<?php
$page_title = 'List User Groups';
$page_group = 'User Groups';
require_once("../includes/initialize_admin.php");
//require_once("../securimage/securimage.php");		
if (!$session_admin->is_logged_in()) {
    redirect_to("log-in");
}
if (!contains( '24',$allowed_pages)) {
	 $message_error .= "You do not have right to that page or feature. Regards.";
	redirect_to("dashboard?msg=10");
 }


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
	
	<link href="../bower_components/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bower_components/bootstrap-select.min.css" />
	
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datedropper/css/datedropper.min.css" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">


	 <script type="text/javascript">
		function showtownVillage(str)
		{
			if (str=="") {
			  document.getElementById("txtHint1").innerHTML="";
			  return;
			}
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}else{// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","<?php echo SITE_URL;?>/includes/gettownVillages.php?qr="+str,true);
			xmlhttp.send();
		}
		 
		 
    </script>
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
                                                <div class="card">
                                                    <div class="card-header table-card-header">
                                                        <h5><?php echo $page_title;?></h5>
                                                    </div>
                                                    <div class="card-block">
                                 						<?php include_once('views/user_groups.php');?>
                                                    </div>
                                                </div>
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
  <script src="../bower_components/bootstrap.min.js"></script>
  <script src="../bower_components/bootstrap-select.min.js"></script>
	
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="../bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="../assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="../bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <!-- Date-dropper js -->
    <script type="text/javascript" src="../bower_components/datedropper/js/datedropper.min.js"></script>
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
