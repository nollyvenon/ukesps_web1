<?php
require("z_db.php");
//check if the user is logged and has an active recruiting plan. If no, redirect to the buy plan page
if (!$session_event_prov->is_logged_in()) {
    redirect_to("login");
}
if (!$event_prov_object->is_provider_plan_valid($event_prov_code)) {
    redirect_to("post_a_event");
}
if (isset($_POST['add_event']) && !empty($_POST['add_event'])) {
    $event_title = $db_handle->sanitizePost($_POST['event_title']);
    $event_author = $db_handle->sanitizePost($_POST['event_author']);
	$event_type = $db_handle->sanitizePost($_POST['event_type']);
	$startDate = date('Y-m-d', strtotime($_POST['eventStartDate']));
	 $startTime = date('H:i:s', strtotime($_POST['eventStartDate']));
	$endDate = date('Y-m-d', strtotime($_POST['eventEndDate']));
	 $endTime = date('H:i:s', strtotime($_POST['eventEndDate']));
    $location = $db_handle->sanitizePost($_POST['location']);
    $summary = $db_handle->sanitizePost($_POST['summary']);
    $content = $db_handle->sanitizePost($_POST['content']);
	$uploaddir = "../img/events/";
	$gallery = basename($_FILES['gallery']['name']);
	$gallery1 = $uploaddir . basename($gallery);
    
    if(empty($event_title) || empty($location) || empty($content)) {
        $message_error = "Please fill all the fields and try again.";
    } else {
		move_uploaded_file($_FILES['gallery']['tmp_name'], $gallery1);
        $result = $zenta_operation->add_event($event_title,'1', $gallery, $event_author, $startDate, $endDate, $startTime, $endTime, $location, $summary, $content);
        if($result) {
             $message_success = "Event was added successfully.";
        } else {
            $message_error = "Event was not added successfully.";
        }
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
	<link rel="stylesheet" href="../css/select2.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../rs-plugin/css/settings.css" media="screen">
	
	<!--styles -->
	    <script type="text/javascript" src="../xadmin/ckeditor/ckeditor.js"></script>
	<!--styles -->
	<link rel="stylesheet" type="text/css" href="../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css"/ >
<script src="../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

</head>
<body class="shop">

	<?php include_once('header.php');?>
	
	<div class="page-content woocommerce">
		<div class="container clear-fix">
			<div class="grid-col-row">
				<div class="grid-col grid-col-9">
                      <h3>Add Events</h3>
                                
                            <form action="" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
<?php require_once '../layouts/feedback_message.php'; ?>
								<div class="row m-b-20">
                                    <div class="col-md-8">
 										<label for="user_code" class="control-label">Title</label>
										<input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo $event_title;?>"  >
                                    </div>
	 							</div>
	 							<div class="row m-b-20">
                                    <div class="col-md-6">
 										<label for="gallery" class="control-label">Event Image</label>
										<input name="gallery" class="btn btn-info" type="file" id="gallery" size="30" />
                                    </div>
									
                                    <div class="col-md-6">
 										<label for="event_author" class="control-label">Author</label>
										<input type="text" class="form-control" id="event_author" name="event_author" value="<?php echo $event_author;?>"  >
                                    </div>
	 							</div>
	 							</div>
	 <label for="payment_method" class="control-label">Event Date</label>
	 							<div class="row m-b-20">
									<div class="col-md-4">
										<label for="eventStartDate" class="control-label">Start Date</label>
										<input id="eventStartDate" name="eventStartDate" type="text" class="form-control">
									</div>
									<div class="col-md-4">
										<label for="eventEndDate" class="control-label">End Date</label>
										<input id="eventEndDate" name="eventEndDate" type="text" class="form-control" >
									</div>
									<script>
										jQuery('#eventStartDate').datetimepicker(
										{
                                          format:'Y-m-d H:i',
                                          lang:'en'
                                        });
										jQuery('#eventEndDate').datetimepicker(
										{
                                          format:'Y-m-d H:i',
                                          lang:'en'
                                        });
									</script>
											
									
								</div>							
								<div class="row m-b-20">
                                    <div class="col-md-6">
 										<label for="location" class="control-label">Events Location</label>
											<div class='input-group'>
												<input id="location" name="location" type='text' class="form-control" />
												</span>
											</div>
                                    </div>
	 								<div class="col-md-6">
 										<label for="summary" class="control-label">Events Summary</label>
										<textarea id="summary" name="summary" rows="5" cols="40"></textarea>
										<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('summary', {
	filebrowserBrowseUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									<div class="col-md-12">
										<label for="content" class="control-label">Description</label>
										<textarea id="content" name="content" rows="15" cols="40">





			</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
				CKEDITOR.replace('content', {
	filebrowserBrowseUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
	filebrowserUploadUrl : '../xadmin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',					
  "filebrowserImageUploadUrl": "../xadmin/ckeditor/plugins/imgupload/imgupload.php"
});
            </script>
                                    </div>
									
									
								</div>			
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!--<button name="submit" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>-->
										<input name="add_event" type="submit"  class="btn btn-primary btn-md waves-effect text-center m-b-20" value="Add Event">
                                    </div>
                                </div>
</form>

				</div>
				<?php include_once('recru_sidebar.php');?>
			</div>
		</div>
	</div>
	<?php include_once('footer.php');?>
	<script src="../js/jquery.min.js"></script>
	<script type='text/javascript' src='../js/jquery.validate.min.js'></script>
	<script src="../js/jquery.form.min.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<script src="../js/main.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/jflickrfeed.min.js"></script>
	<script src="../js/select2.js"></script>
	<script src="../js/jquery.tweet.js"></script>
	
	<script src="../js/jquery.fancybox.pack.js"></script>
	<script src="../js/jquery.fancybox-media.js"></script>
	<script src="../js/retina.min.js"></script>
</body>
</html>