<?php
$page_title = 'All Users';
$page_group = 'Course Providers';
$User_Type = 'Admin';
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
// if (!contains( '19',$allowed_pages)) {
// 	 $message_error .= "You do not have right to that page or feature. Regards.";
// 	redirect_to("dashboard?msg=10");
//  }
// $hiss = $_GET['id'];
$user_list = $zenta_operation->course_providers();
if (isset($_GET['did'])) {
  $del_users = $zenta_operation->del_course_provider($_GET['did']);
  if ($del_users) {
    $message_success = "You have successfully deleted the user's data";
  } else {
    $message_error = "Something went wrong. Please try again.";
  }
  header("Location:course_providers.php");
} else if (isset($_GET['act'])) {
  $del_users = $zenta_operation->activate_course_provider($_GET['act']);
  if ($del_users) {
    $message_success = "You have successfully deleted the user's data";
  } else {
    $message_error = "Something went wrong. Please try again.";
  }
  header("Location:course_providers.php");
} else if (isset($_GET['deact'])) {
  $del_users = $zenta_operation->deactivate_course_provider($_GET['deact']);
  if ($del_users) {
    $message_success = "You have successfully deleted the user's data";
  } else {
    $message_error = "Something went wrong. Please try again.";
  }
  header("Location:course_providers.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo SITE_ACRONYM . ' - ' . $page_title; ?></title>
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="plugins/popper/popper.min.js"></script>
  <!-- <link rel="stylesheet" href="../bower_components/excess/bootstrap.min.css">
    <script src="../bower_components/excess/jquery.min.js"></script>
    <script src="../bower_components/excess/popper.min.js"></script>
    <script src="../bower_components/excess/bootstrap.min.js"></script> -->
  <!-- Data Tables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- sweet alert framework -->
  <link rel="stylesheet" type="text/css" href="../bower_components/sweetalert/css/sweetalert.css">
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
     Pre-loader end -->

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <?php include('../bin/header.php'); ?>

      <?php //include('../bin/inner_sidebar_chat.php');
      ?>

      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <?php include('../bin/sidebar.php'); ?>
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
                            <h4><?= $page_group; ?></h4>
                            <span><?php echo $page_title; ?></span>
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
                            <li class="breadcrumb-item"><a href="#!"><?= $User_Type; ?></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"><?= $page_group; ?></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!"><?php echo $page_title; ?></a>
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
                            <h5><?php echo $page_title; ?></h5>
                          </div>
                          <div class="card-block">
                            <div class="dt-responsive table-responsive">
                              <?php include_once('views/course_providers.php'); ?>
                            </div>
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
                    <img src="../assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../assets/images/browser/ie.png" alt="">
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
    $(".select2").select2({
      placeholder: "",
      maximumSelectionSize: 6
    });
  </script>
  <!-- Required Jquery -->
  <script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
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
  <!-- i18next.min.js -->
  <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <!-- Data Tables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Custom js -->
  <script src="../assets/pages/data-table/js/data-table-custom.js"></script>

  <script src="../assets/js/pcoded.min.js"></script>
  <script src="../assets/js/demo-12.js"></script>
  <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

  });
</script>

</html>