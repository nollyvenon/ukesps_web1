<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}
$User_Type = 'Admin';
$page_group = 'Banners and Ads';
$page_title = 'Update Slider';
$title = "";
$position = "";
$bid = $_GET['id'];
$slider = $zenta_operation->getSlider($bid);
extract($slider);
if (isset($_POST['update_slider'])) {
  $title = $db_handle->sanitizePost($_POST['title']);
  $sub_title = $db_handle->sanitizePost($_POST['sub_title']);
  $updated_at = date('Y-m-d');


  if (empty($sub_title) || empty($title)) {
    $message_error = "Title and Position must not be empty";
  } else {
    if ($_FILES['image']['name'] == NULL) {
      // var_dump($banner_url);
      // die();
      $result = $zenta_operation->update_slider($bid, $title, $sub_title, $image, $updated_at);
      if ($result) {
        $message_success = "slider was successfully updated.";
        header("Location:manage_sliders.php");
      } else {
        $message_error = "slider was not successfully updated.";
      }
    } else {
      $serial_number = substr(sha1(time()), 0, 10);
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      if (false === array_search(
        $finfo->file($_FILES['image']['tmp_name']),
        array(
          'jpeg' => 'image/jpeg',
          'png' => 'image/png',
          'jpg' => 'image/jpg'
        ),
        true
      )) {
        $message_error += 'Invalid file type';
      }
      $ext_prop = explode(".", $_FILES['image']['name']);
      $image = $serial_number . '.' . end($ext_prop);
      if (!move_uploaded_file($_FILES['image']['tmp_name'], SITE_ROOT . '/img/sliders/' . $image)) {
        $message_error += "Image could not be uploaded. try again";
      } else {
        $result = $zenta_operation->update_banner($bid, $title, $sub_title, $image, $updated_at);
        if ($result) {
          $message_success = "slider was successfully updated.";
          header("Location:manage_sliders.php");
        } else {
          $message_error = "slider was not successfully updated.";
        }
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo SITE_ACRONYM . ' - ' . $page_title ?></title>
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
  <meta name="keywords" content="">
  <meta name="author" content="#">
  <!-- Favicon icon -->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
  <!-- Required Fremwork -->
  <!-- themify-icons line icon -->
  <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
  <!-- Font Awesome -->
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
  <!-- flag icon framework css -->
  <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
  <!-- Menu-Search css -->
  <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">

  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <?php include('../bin/header.php'); ?>

      <?php include('../bin/inner_sidebar_chat.php'); ?>

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
                            <h5><?= $page_title ?></h5>
                          </div>
                          <div class="card-block">
                            <div class="dt-responsive table-responsive">
                              <?php include_once('views/updateslider.php'); ?>
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

  <!-- Custom js -->


  <script src="../assets/js/pcoded.min.js"></script>
  <script src="../assets/js/demo-12.js"></script>
  <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <?php include('../includes/bottom-cache.php'); ?>
</body>

</html>