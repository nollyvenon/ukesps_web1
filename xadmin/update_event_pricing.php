<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
$page_title = 'Update Event Pricing';
$page_group = 'Admin';
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$sidi = $_GET['sid'];
$content = $zenta_operation->get_event_detail($sidi);
extract($content);

if (isset($_POST['update_event']) && !empty($_POST['update_event'])) {
  $event_id = $db_handle->sanitizePost($_POST['event_id']);
  $event_title = $db_handle->sanitizePost($_POST['event_title']);
  $startDate = $db_handle->sanitizePost($_POST['startDate']);
  $endDate = $db_handle->sanitizePost($_POST['endDate']);
  $location = $db_handle->sanitizePost($_POST['location']);
  $summary = $db_handle->sanitizePost($_POST['summary']);
  $content = $db_handle->sanitizePost($_POST['content']);
  $uploaddir = "../img/events/";
  $gallery = basename($_FILES['gallery']['name']);
  $gallery1 = $uploaddir . basename($gallery);

  if (empty($event_title) || empty($location) || empty($content)) {
    $message_error = "Please fill all the fields and try again.";
  } else {
    move_uploaded_file($_FILES['gallery']['tmp_name'], $gallery1);
    $result = $zenta_operation->update_event($event_id, $event_title, $event_author, $gallery, $startDate, $endDate, $location, $summary, $content);
    if ($result) {
      $message_success = "Event Pricing was updated successfully.";
    } else {
      $message_error = "Event Pricing was not updated successfully.";
    }
  }
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
  <!-- Data Table Css -->
  <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/pages/data-table/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css">
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
                        <!-- HTML5 Export Buttons table start -->
                        <div class="card">
                          <div class="card-header table-card-header">
                            <h5><?php echo $page_title; ?></h5>
                          </div>
                          <div class="card-block">
                            <div class="dt-responsive table-responsive">
                              <?php include_once('views/update_event_pricing.php'); ?>
                            </div>
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
    $(".select2").select2({
      placeholder: "",
      maximumSelectionSize: 6
    });
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

  <!-- i18next.min.js -->
  <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <!-- Custom js -->
  <script src="../assets/pages/data-table/js/data-table-custom.js"></script>

  <script src="../assets/js/pcoded.min.js"></script>
  <script src="../assets/js/demo-12.js"></script>
  <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <?php include('../includes/bottom-cache.php'); ?>
</body>

</html>