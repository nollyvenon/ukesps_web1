<?php
include_once("z_db.php");
if (!$session_recruiter->is_logged_in()) {
    redirect_to("login");
}
if ($_POST['submit']){
		foreach($_POST as $key => $value) {
        	$_POST[$key] = $db_handle->sanitizePost(trim($value));
    	}
    	extract($_POST);
	$result = $recruit_object->add_applicant_list($list_name, $list_description, $recruiter_code);
			if($result) {
				 $message_success = "List was added successfully.";
			} else {
				$message_error = "List was not added successfully.";
			}
}
?><!DOCTYPE HTML>
<html>
<head>
	<title>UKESPS - United Kingdom Education & Skills Placement Services Limited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="../img/favicon.png">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" href="../css/styles.css">	

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../js/jquery.min.js"></script>
	<!--styles -->
	
</head>
<body class="">
	<?php include_once('../recru_panel/header.php');?>
	<div class="page-content sitemap container container-fluid clear-fix">

    <div class="col-12">
         <h4>Create New List</h4>
		<?php include_once("../layouts/feedback_message.php");?>
		  
	<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="list_name" class="col-sm-2 col-form-label">List Name</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" id="list_name" name="list_name" value="" placeholder="Enter List Name"> 
            </div>		
        </div>
		<div class="form-group row">
            <label for="list_description" class="col-sm-2 col-form-label">List Description</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" id="list_description" name="list_description" value="" placeholder="Enter List Description"> 
            </div>		
        </div>
        <div class="form-group row">
          <div class="col-sm-4">
            <input id="submit" class="cws-button bt-color-2 border-radius" name="submit" type="submit"> 
			  <input type="reset">
          </div>
        </div>
	</form>
		
				
	</div>
			

	</div>
	<?php include_once('../recru_panel/footer.php');?>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>
</html>