<?php
include("z_db.php");
$testimonials = $zenta_operation->get_testimonials();
$job_sector = $zenta_operation->get_job_sector(3);
$banners = $zenta_operation->getBanner();
$pages = $zenta_operation->get_page_name();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <!-- style -->
  <link rel="shortcut icon" href="<?= SITE_URL ?>/img/favicon.png">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/font-awesome.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/fi/flaticon.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/main.css">
  <!-- <link rel="stylesheet" href="<?= SITE_URL ?>/css/main2.css"> -->

  <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/css/jquery.fancybox.css" />
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/rs-plugin/css/settings.css" media="screen">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/animate.css">
  <link rel="stylesheet" href="<?= SITE_URL ?>/css/styles.css">
  <!--styles -->

  <link rel="stylesheet" href="<?= SITE_URL ?>/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--styles -->
  <script type="text/javascript" src="<?= SITE_URL ?>/xadmin/ckeditor/ckeditor.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css" />
  <script src="<?= SITE_URL ?>/node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
  <!--styles -->
  <script>
    function ShowPageLoc(str) {
      if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
      }

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "<?= SITE_URL ?>/xadmin/getCourseSubCategories.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
  <script>
    function ShowStatebyCountry(str) {
      if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
      }

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "getStates.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>

  <script>
    function ShowSubCategories(str) {
      if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
      }

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "getJobSubCategories.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
  <script>
    const ROOT = '<?= SITE_URL ?>/'
  </script>
</head>

<body>
  <!-- page header -->
  <?php include_once('header.php'); ?>