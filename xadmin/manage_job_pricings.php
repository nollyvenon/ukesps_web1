<?php
require_once("../includes/initialize_admin.php");
if (!$session_admin->is_logged_in()) {
  redirect_to("log-in");
}

$page_title = 'Manage Job Pricings';
$page_group = 'Job Pricings';
$limit = 10;

if (isset($_POST['search_text']) && strlen($_POST['search_text']) > 3) {
  $search_text = $_POST['search_text'];
  $query = "SELECT * FROM recruiting_plans WHERE plan_id LIKE '%$search_text%' OR plan_name LIKE '%$search_text%'  ORDER BY plan_id DESC ";
} else {
  $query = "SELECT * FROM recruiting_plans order by plan_id DESC ";
}
$numrows = $db_handle->numRows($query);

// For search, make rows per page equal total rows found, meaning, no pagination
// for search results
if (isset($_POST['search_text'])) {
  $rowsperpage = $numrows;
} else {
  $rowsperpage = 20;
}

$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
  $currentpage = (int) $_GET['pg'];
} else {
  $currentpage = 1;
}
if ($currentpage > $totalpages) {
  $currentpage = $totalpages;
}
if ($currentpage < 1) {
  $currentpage = 1;
}

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if ($prespagehigh > $numrows) {
  $prespagehigh = $numrows;
}

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$content = $db_handle->fetchAssoc($result);
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
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

                            <?php require_once '../layouts/feedback_message.php'; ?>

                            <table class="table table-responsive table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th width="10%">ID</th>
                                  <th>Name</th>
                                  <th>Cost</th>
                                  <th>Discount</th>
                                  <th>Currency</th>
                                  <th>Period</th>
                                  <th>Highlights</th>
                                  <th width="10%">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (isset($content) && !empty($content)) {
                                  foreach ($content as $row) { ?>
                                    <tr>
                                      <td><?php echo $row['plan_id']; ?></td>
                                      <td><?php echo $row['plan_name']; ?></td>
                                      <td><?= $row['plan_cost'] ?></td>
                                      <td><?= $row['plan_discount_cost'] ?></td>
                                      <td><?= $row['plan_currency'] ?></td>
                                      <td><?= $row['plan_period'] ?></td>
                                      <td><?php echo limit_text($row['highlights'], $limit); ?></td>
                                      <td><a class="btn btn-border green" href="update_recruiter_pricing.php?action=view&sid=<?php echo $row['plan_id']; ?>"><span> Update</span></a>
                                        <a class="btn btn-border dark" href="del_recruiter_pricing.php?action=view&sid=<?php echo $row['plan_id']; ?>"><span> Delete</span></a></td>
                                    </tr>
                                <?php }
                                } else {
                                  echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>";
                                } ?>
                              </tbody>
                            </table>

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
  <script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
  <script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
  <script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap.min.js"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="../bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="../bower_components/modernizr/js/modernizr.js"></script>
  <script type="text/javascript" src="../bower_components/modernizr/js/css-scrollbars.js"></script>

  <!-- data-table js -->
  <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/pages/data-table/js/jszip.min.js"></script>
  <script src="../assets/pages/data-table/js/pdfmake.min.js"></script>
  <script src="../assets/pages/data-table/js/vfs_fonts.js"></script>
  <script src="../assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
  <script src="../assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
  <script src="../assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>
  <script src="../bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
  <!-- i18next.min.js -->
  <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <!-- Custom js -->
  <script src="../assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>
  <script src="../assets/js/pcoded.min.js"></script>
  <script src="../assets/js/demo-12.js"></script>
  <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <?php include('../includes/bottom-cache.php'); ?>
</body>

</html>